# Staging acceptance checklist

## Site configuration

- [ ] Staging is blocked from indexing.
- [ ] Site logo and favicon are correct.
- [ ] Static homepage and posts page are assigned correctly.
- [ ] Header, footer, and mobile navigation use the intended links.
- [ ] The new block navigation was compared manually with the former Astra menu.
- [ ] Permalink structure is unchanged.
- [ ] Existing and future blog comments are intentionally closed.

## Page quality

- [ ] Homepage has exactly one H1.
- [ ] Pages and posts have exactly one H1.
- [ ] No page shows raw shortcode text or “unsupported block” notices.
- [ ] Existing `.ch-article` and `.chf-guide` articles remain readable during migration.
- [ ] Featured images use a consistent 16:9 presentation.
- [ ] No unsupported review totals, guarantees, certifications, prices, or response-time claims appear.

## Responsive and accessible behavior

- [ ] No horizontal overflow at 320, 375, 768, 1024, and 1440 px.
- [ ] Body copy is at least 16 px on mobile.
- [ ] Mobile menu opens, closes, and is keyboard accessible.
- [ ] Focus indicators are clearly visible.
- [ ] Buttons and links have meaningful labels and adequate touch targets.
- [ ] Call and Schedule controls do not cover chat or accessibility widgets.
- [ ] Reduced-motion preference is respected.

## Booking and conversion

- [ ] `(918) 771-1218` displays correctly and phone links dial `+1-918-771-1218`.
- [ ] `/book-appointment/` loads without layout shift or clipped content.
- [ ] A complete test appointment reaches the expected confirmation state.
- [ ] Contact forms validate and deliver a test submission.
- [ ] Success, error, and privacy messages are visible.

## SEO and tracking

- [ ] Yoast title, meta description, canonical, and schema render once.
- [ ] Production pages retain their original index/noindex settings.
- [ ] XML sitemaps and `robots.txt` remain reachable.
- [ ] No internal production URL returns an unexpected 3xx, 4xx, or 5xx.
- [ ] Analytics and conversion events fire only once.
- [ ] Search Console verification remains intact.

## Performance

- [ ] Hero/LCP image has correct dimensions and is not lazy-loaded.
- [ ] Below-fold images are optimized and lazy-loaded.
- [ ] Mobile PageSpeed is tested on homepage, service page, post, and booking page.
- [ ] No material CLS is caused by header, fonts, media, or scheduler.
- [ ] Cache/CDN has been tested after theme activation.

## Launch and rollback

- [ ] Production backup is current and restore-tested.
- [ ] Astra remains installed during the rollback window.
- [ ] A named owner is available to verify phone, form, and booking leads after launch.
- [ ] Post-launch monitoring is prepared for 404s, forms, rankings, and Core Web Vitals.
