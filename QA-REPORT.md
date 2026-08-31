# Capehart Custom — QA report

## Automated checks

- `theme.json` validates against the official WordPress 6.8 schema.
- All PHP files parse successfully with an independent PHP AST parser: `functions.php` plus 12 pattern files.
- All theme CSS parses successfully with `css-tree`.
- Template, part, and pattern block-comment stacks are balanced and all embedded block-attribute JSON is valid.
- Every referenced `capehart/*` pattern exists and every pattern slug is unique.
- All block names used by the theme are WordPress core blocks.
- Visitor-facing theme markup contains no third-party or external links.
- Every normal template resolves to one H1; the transitional legacy template deliberately leaves the H1 to its existing page content.
- Primary text/button color pairs meet WCAG AA contrast; focus indicators use a two-color ring for light and dark surfaces.

## Visual checks

- The homepage concept was rendered with the production theme stylesheet at desktop and narrow widths.
- Hero, service cards, local-team split, process cards, contact CTA, footer, and 16:9 archive treatment were visually inspected.
- The mobile/tablet navigation switches to the WordPress core overlay menu at 900 px, and the fixed Call/Schedule bar is enabled at the same breakpoint.
- The WordPress theme screenshot is 1200×900 and the bundled team image is an optimized 1091×1600 WebP.

## Integration fixes completed during review

- Query-grid classes now sit on Post Template lists so pagination and empty states remain below the cards.
- Sticky behavior is applied to the outer header template-part wrapper with correct 32/46 px admin-bar offsets.
- Hero media styling applies only to the image, not both the figure and image.
- Non-serializable manual image-loading markup was removed.
- Single posts follow the existing Capehart convention: article content owns the lead image; templates do not duplicate it.
- Custom thumbnail crops match the 16:9 card ratio.
- Front-end component CSS is also loaded in the editor before editor-specific overrides.
- A legacy builder template and explicit Astra/Spectra transition process were added.

## Must still be verified on WordPress staging

- Real WordPress 6.8 rendering and Site Editor save/reload behavior
- Logo and new block-navigation assignment
- Every legacy Spectra page before Spectra is disabled
- Yoast title, canonical, robots, schema, and sitemap output
- Booking scheduler and form delivery
- Caches, analytics/conversion events, responsive navigation, and Core Web Vitals
- Regenerated image sizes for existing media

No production site changes were made during this build or QA pass.
