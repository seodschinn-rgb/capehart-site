# GitHub to Rocket.net deployment

This repository deploys only the `capehart-custom` WordPress theme. It never
syncs the WordPress database, uploads, plugins, configuration, or another theme.

## Deployment behavior

- Every push to the `staging` branch deploys automatically to Rocket.net staging.
- Production is available only through the manual **Deploy Capehart WordPress
  theme** workflow. It requires the exact tested staging commit SHA and the
  confirmation text `DEPLOY_PRODUCTION`.
- The workflow validates JSON and PHP before opening an SSH connection.
- The destination is fixed in code to
  `$HOME/public_html/wp-content/themes/capehart-custom`; it cannot be replaced
  with a broad path through a secret.
- Files are uploaded to an isolated incoming directory, checked again on the
  server, backed up, and swapped into place only after validation.
- After deployment, the workflow checks the site response and purges the
  WordPress and Rocket.net CDN caches.

## Required GitHub repository secrets

Create the following under **Settings → Secrets and variables → Actions**:

| Secret | Value |
| --- | --- |
| `ROCKET_STAGING_HOST` | Staging SSH/SFTP address from Rocket.net Overview |
| `ROCKET_STAGING_USER` | Staging SSH/SFTP username |
| `ROCKET_STAGING_PRIVATE_KEY` | Complete contents of the dedicated staging private key |
| `ROCKET_STAGING_KNOWN_HOSTS` | Verified SSH known-host entry for the staging host |
| `ROCKET_STAGING_SITE_URL` | Optional staging HTTPS origin for a post-deploy health check |
| `ROCKET_PRODUCTION_HOST` | Production SSH/SFTP address from Rocket.net Overview |
| `ROCKET_PRODUCTION_USER` | Production SSH/SFTP username |
| `ROCKET_PRODUCTION_PRIVATE_KEY` | Complete contents of the separate production private key |
| `ROCKET_PRODUCTION_KNOWN_HOSTS` | Verified SSH known-host entry for the production host |
| `ROCKET_PRODUCTION_SITE_URL` | Optional production HTTPS origin for a post-deploy health check |

Do not commit any private key, application password, `.env` file, or Rocket.net
credential. Staging and production use separate deployment keys. Each key should
be authorized only for its Capehart environment and revoked when no longer used.

## First staging deployment

1. Create the Rocket.net staging copy and enable SSH access.
2. Import and authorize the dedicated public deployment key in Rocket.net.
3. Add the staging values and private key as GitHub repository secrets.
4. Create and push the `staging` branch.
5. Review the workflow under the repository's **Actions** tab.
6. In staging WordPress, activate Capehart Custom once under **Appearance → Themes**.
7. Complete `STAGING-CHECKLIST.md` before a production deployment.

## Production deployment

1. Enable production SSH and authorize a separate production public key.
2. Add the production-specific GitHub secrets.
3. Open **Actions → Deploy Capehart WordPress theme → Run workflow**.
4. Choose `production`, enter the complete tested 40-character staging commit
   SHA, type `DEPLOY_PRODUCTION`, and start the workflow.
5. Activate Capehart Custom once in production if it is not already active.

## Rollback

Revert to a known-good Git commit and run the workflow again. If WordPress itself
is unavailable, use Rocket.net's backup restore and reactivate Astra during the
migration rollback window.
