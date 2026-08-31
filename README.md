# Capehart Custom

Capehart Custom is a standalone WordPress block theme for Capehart Heating & Cooling. It replaces Astra at the presentation layer while keeping WordPress, existing URLs, posts, pages, media, Yoast metadata, and the booking plugin in place.

## What is included

- Full-site-editing templates for the homepage, pages, posts, archives, search, and 404 pages
- Custom service-page and landing-page templates
- Core-block patterns for the homepage, service pages, FAQs, blog CTAs, and contact sections
- Responsive header, navigation, footer, and mobile call/schedule bar
- One local optimized team image; WordPress continues to manage normal content media
- No Astra, Astra Pro, Spectra, or JavaScript framework dependency in the theme itself

## Requirements

- WordPress 6.8 or newer
- PHP 7.4 or newer
- A configured site logo
- Existing booking page at `/book-appointment/`

The current site contains legacy Spectra blocks. Keep Spectra and Spectra Pro active until those pages have been rebuilt with WordPress core blocks. Astra can be replaced by activating this theme, but the first activation should happen on staging.

## Installation and deployment

The canonical theme source lives in Git. Pushes to `main` are automatically
synchronized to the exact Capehart theme directory on Rocket.net. See
`DEPLOYMENT.md` for the one-time GitHub and Rocket.net setup and rollback flow.

1. Create or verify a current Rocket.net backup of files and database.
2. Configure the dedicated Rocket.net production SSH key and GitHub secrets.
3. Push `main` and let GitHub Actions install the theme files.
4. In WordPress, activate **Capehart Custom** once under **Appearance → Themes**.
5. Open **Appearance → Editor** and verify the logo, navigation, header, and footer.
6. Under **Settings → Reading**, verify the static homepage and posts-page assignments.
7. Follow `MIGRATION.md` and keep Astra installed during the rollback window.

## Content editing

Reusable layouts appear in the block inserter under the **Capehart** pattern category. Service pages can use **Capehart Service Page**, and focused campaign pages can use **Capehart Landing Page**. **Capehart Legacy Builder Page** renders existing builder content without adding another title or content wrapper; use it only while a Spectra page is waiting to be rebuilt.

The theme deliberately does not create review counts, response-time promises, licenses, certifications, prices, or guarantees. Add those only after the owner has verified them.

Single posts follow Capehart's existing article-body convention: the article content owns its lead/hero image, while the featured image is used for archive cards and social/SEO metadata. Do not insert the same image twice at the start of a post.

## Rollback

If staging exposes a compatibility problem, reactivate Astra. Content and SEO data remain in WordPress; this theme does not delete or rewrite them.
