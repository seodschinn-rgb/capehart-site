# GitHub to Rocket.net live deployment

This repository deploys only the `capehart-custom` WordPress theme. It never
syncs the WordPress database, uploads, plugins, configuration, or another theme.

## Deployment behavior

- Every push to `main` deploys automatically to the live Rocket.net site.
- Manual deployments require the confirmation text `DEPLOY_LIVE` and may target
  a specific 40-character commit SHA already contained in `main`.
- The workflow builds an allowlisted package and validates JSON and PHP before
  opening an SSH connection.
- The destination is fixed in code to
  `$HOME/public_html/wp-content/themes/capehart-custom`; it cannot be replaced
  with a broad path through a secret.
- Files upload into an isolated incoming directory, are checked again on the
  server, backed up, and atomically swapped into place.
- An optional HTTPS health check can restore the previous files automatically.
- WordPress and Rocket.net CDN caches are purged after a successful deployment.

Deploying files does not activate the theme. **Capehart Custom** must be activated
once in WordPress under **Appearance → Themes**. Astra should remain installed
during the initial rollback window.

## Required GitHub repository secrets

Create these under **Settings → Secrets and variables → Actions**:

| Secret | Value |
| --- | --- |
| `ROCKET_HOST` | Live SSH/SFTP address from Rocket.net Overview |
| `ROCKET_USER` | Live SSH/SFTP username |
| `ROCKET_PRIVATE_KEY` | Complete contents of the dedicated production private key |
| `ROCKET_KNOWN_HOSTS` | Verified SSH known-host entry for the live host |
| `ROCKET_SITE_URL` | `https://capeharthc.com` for the post-deploy health check |

Do not commit any private key, application password, `.env` file, or Rocket.net
credential. The deployment key should be authorized only for Capehart and
revoked when it is no longer used.

## First live deployment

1. Verify that a current Rocket.net backup exists.
2. Enable SSH for the live site.
3. Import and authorize the dedicated production public key in Rocket.net.
4. Add all five repository secrets in GitHub.
5. Push the prepared deployment commit to `main`.
6. Review the result under the repository's **Actions** tab.
7. Activate Capehart Custom once under **Appearance → Themes**.
8. Complete the relevant checks in `STAGING-CHECKLIST.md` directly on the live
   site and reactivate Astra immediately if a blocking issue appears.

## Normal updates

Commit the reviewed theme changes and push `main`. GitHub Actions validates,
backs up, deploys, checks, and clears caches automatically.

## Rollback

Open **Actions → Deploy Capehart theme to Rocket.net → Run workflow**, enter a
known-good 40-character commit SHA from `main`, type `DEPLOY_LIVE`, and run the
workflow. If WordPress itself is unavailable, use Rocket.net's backup restore or
reactivate Astra from the Rocket.net file/admin tooling.
