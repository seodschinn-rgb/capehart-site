# Capehart block patterns

These patterns use WordPress core blocks only. They contain no Astra, Spectra,
shortcode, form-plugin, or custom-block dependency.

## Pattern inventory

| File | Pattern slug | Intended placement |
| --- | --- | --- |
| `home-hero.php` | `capehart/home-hero` | Front page |
| `emergency-strip.php` | `capehart/emergency-strip` | Front page, immediately after hero |
| `service-cards.php` | `capehart/service-cards` | Front page |
| `local-team-trust.php` | `capehart/local-team-trust` | Front page or About page |
| `three-step-process.php` | `capehart/three-step-process` | Front page |
| `service-area.php` | `capehart/service-area` | Front page or contact page |
| `latest-guides.php` | `capehart/latest-guides` | Front page; dynamic Query block |
| `contact-schedule-cta.php` | `capehart/contact-schedule-cta` | Front page or landing pages |
| `service-hero.php` | `capehart/service-hero` | Service-page template |
| `service-process.php` | `capehart/service-process` | Service-page template |
| `faq-cta.php` | `capehart/faq-cta` | Service-page template or manual insertion |
| `post-final-cta.php` | `capehart/post-final-cta` | Single-post template |

## Contracts

- Namespace: `capehart`
- Text domain: `capehart-custom`
- Shared CSS prefix: `ch-`
- The only referenced theme image is
  `assets/images/capehart-team.webp`, resolved with `get_theme_file_uri()`.
- Appointment buttons point to `/book-appointment/`; phone buttons use
  `tel:+19187711218`.
- Service-card URLs match currently configured or observed Capehart pages.
- `service-hero.php` reads the current page's title and excerpt dynamically.
- `latest-guides.php` displays the three newest posts and needs no manual card
  maintenance.

## Editing notes

The FAQ questions are intentionally general so the pattern is safe in a shared
service template. Add service-specific questions in the page content when they
can be answered accurately. If a structured-data plugin creates FAQ schema,
ensure that its answers remain identical to the visible copy.

The copy deliberately avoids review counts, response-time guarantees,
certification claims, prices, savings, and promises about availability. Confirm
any future business claim with the owner before adding it to a reusable pattern.
