#!/usr/bin/env bash

set -Eeuo pipefail

action="${1:-}"
deploy_sha="${2:-}"

if [[ ! "$deploy_sha" =~ ^[0-9a-f]{40}$ ]]; then
  echo 'Refusing an invalid deployment SHA.' >&2
  exit 64
fi

for command_name in realpath rsync tar php wp; do
  command -v "$command_name" >/dev/null || {
    echo "Required Rocket.net command is unavailable: $command_name" >&2
    exit 69
  }
done

wp_root="$(realpath -e "$HOME/public_html")"
themes_root="$(realpath -e "$wp_root/wp-content/themes")"

if [[ "$themes_root" != "$wp_root/wp-content/themes" ]]; then
  echo 'The resolved WordPress themes directory is outside the expected installation.' >&2
  exit 64
fi

test -f "$wp_root/wp-config.php"
wp core is-installed --path="$wp_root"

target="$themes_root/capehart-custom"
incoming="$themes_root/.capehart-custom.incoming-$deploy_sha"
previous="$themes_root/.capehart-custom.previous-$deploy_sha"
backup_root="$HOME/deploy-backups/capehart-custom"
failed_root="$HOME/deploy-failed/capehart-custom"

restore_previous() {
  local failed_path
  failed_path="$failed_root/$(date -u +%Y%m%dT%H%M%SZ)-$deploy_sha"
  mkdir -p "$failed_root"
  if [[ -d "$target" ]]; then
    mv "$target" "$failed_path"
  fi
  if [[ -d "$previous" ]]; then
    mv "$previous" "$target"
  fi
  wp cache flush --path="$wp_root" || true
  wp cdn purge --path="$wp_root" || true
}

case "$action" in
  prepare)
    if [[ -e "$previous" ]]; then
      echo 'A previous deployment with this SHA still awaits finalization or rollback.' >&2
      exit 73
    fi
    if [[ -e "$incoming" ]]; then
      rm -rf -- "$incoming"
    fi
    mkdir -p "$incoming"
    ;;

  activate)
    test -f "$incoming/style.css"
    test -f "$incoming/theme.json"
    test -f "$incoming/functions.php"
    test -d "$incoming/templates"
    test -d "$incoming/parts"
    grep -Fq 'Theme Name: Capehart Custom' "$incoming/style.css"

    php -r 'json_decode(file_get_contents($argv[1]), true, 512, JSON_THROW_ON_ERROR);' "$incoming/theme.json"
    find "$incoming" -type f -name '*.php' -exec php -l {} \; >/dev/null

    mkdir -p "$backup_root"
    if [[ -d "$target" ]]; then
      backup_archive="$backup_root/$(date -u +%Y%m%dT%H%M%SZ)-$deploy_sha.tar.gz"
      tar -C "$themes_root" -czf "$backup_archive" capehart-custom
      mv "$target" "$previous"
    fi

    trap 'status=$?; restore_previous; exit "$status"' ERR
    mv "$incoming" "$target"
    wp theme is-installed capehart-custom --path="$wp_root"
    wp core is-installed --path="$wp_root"
    trap - ERR
    ;;

  rollback)
    restore_previous
    ;;

  finalize)
    test -d "$target"
    wp theme is-installed capehart-custom --path="$wp_root"
    wp cache flush --path="$wp_root"
    wp cdn purge --path="$wp_root"
    if [[ -d "$previous" ]]; then
      rm -rf -- "$previous"
    fi
    ;;

  *)
    echo 'Expected one of: prepare, activate, rollback, finalize.' >&2
    exit 64
    ;;
esac
