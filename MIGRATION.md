# Migration from Astra and Spectra

This is a staged theme migration, not a one-click redesign of every legacy block. The safe sequence below avoids URL, SEO, and booking regressions.

## 1. Prepare staging

1. Create a full database and file backup.
2. Clone production to a password-protected staging domain.
3. Block staging from indexing at both WordPress and server level.
4. Record the current homepage, posts page, menus, widgets, permalinks, and logo.
5. Capture desktop and mobile screenshots of the homepage, one service page, one article, the blog archive, contact, and booking pages.

## 2. Activate the custom theme

1. Upload and activate the theme ZIP on staging.
2. Keep Yoast SEO, Simply Schedule Appointments, Spectra, and Spectra Pro active.
3. Confirm **Settings → Reading** still points to the existing homepage and blog page.
4. Open **Appearance → Editor → Navigation** and confirm all menu destinations.
5. Confirm the site logo is visible in both header and footer.
6. Regenerate image sizes on staging so existing featured images receive the theme's 720×405 archive crop.

Astra and Astra Pro are no longer used while Capehart Custom is active, but do not uninstall them until production has passed the rollback window.

For a legacy Spectra page that already contains its own hero and H1, temporarily select **Capehart Legacy Builder Page** in the page template settings. This avoids an extra theme-generated page title while the page is waiting to be rebuilt. Do not use that transitional template for newly rebuilt pages.

The bundled `front-page.html` intentionally replaces the old homepage body with the new Capehart patterns. Activating the theme therefore changes the homepage immediately; approve the complete staging homepage before production activation. The block-navigation header is also a new menu and does not automatically mirror Astra's classic menu locations.

## 3. Migrate page types

Work in this order:

1. Homepage
2. Header and footer navigation
3. Highest-value heating and cooling service pages
4. Blog archive and single-post template
5. Booking and contact pages
6. Remaining legacy and location pages

The theme intentionally does not display public comments. In staging, disable comments for new posts and bulk-close comments on existing posts so the back end matches the visible design.

For each migrated page:

- Preserve its slug, canonical URL, Yoast title, meta description, index setting, featured image, and meaningful internal links.
- Rebuild the layout with WordPress core blocks and the Capehart patterns.
- Use one H1 only. The selected page template already renders the page title unless the page is intentionally using a legacy full-content layout.
- Keep the lead image inside article content; the single-post template intentionally does not output a second featured image. Continue setting a featured image for archive cards and sharing metadata.
- Remove duplicate forms and retain one clear phone/appointment path.
- Check desktop, tablet, and mobile before moving to the next page.

## 4. Spectra removal

Do not deactivate Spectra while any published page still contains `uagb` or Spectra blocks. Deactivating it early can leave missing styles or block-validation warnings.

After every published Spectra page has been converted:

1. Search page content for remaining `uagb` block names/classes.
2. Check reusable blocks, synced patterns, headers, footers, and drafts as well.
3. Deactivate Spectra on staging and re-run the full page checklist.
4. Only then remove Spectra and Spectra Pro from production.

## 5. SEO and functional checks

- Existing URLs return 200 and no unintended redirects were introduced.
- Canonicals remain self-referencing where intended.
- Yoast schema and metadata still appear once in the document.
- There is exactly one visible H1 on each indexable page.
- `robots` directives and sitemap inclusion are unchanged.
- Phone links use `tel:+19187711218`.
- Appointment CTAs open `/book-appointment/` and the scheduler works end to end.
- Forms expose labels, validation, error/success states, and privacy text.
- Header navigation, mobile menu, keyboard focus, and mobile CTA bar work.
- No verified business claim was accidentally changed or invented.

## 6. Production launch

1. Schedule a low-traffic launch window.
2. Take a fresh backup.
3. Upload the same tested ZIP and activate Capehart Custom.
4. Clear WordPress, host, CDN, and browser caches.
5. Repeat the launch checklist on production.
6. Monitor Search Console, analytics, form submissions, phone tracking, 404s, and Core Web Vitals.
7. Retain Astra and the pre-launch backup through the rollback window.
