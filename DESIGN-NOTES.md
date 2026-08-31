# Capehart Custom Theme — design notes

The theme uses a single system-led font stack, a 1180 px site container, a 760 px default reading width, and Capehart's blue/red/navy palette. The CSS is designed for WordPress core blocks and the `ch-` utility/component classes supplied by the bundled patterns.

## Accessibility defaults

- Body text is 17 px desktop and never below 16 px mobile.
- All interactive elements receive a visible focus outline.
- Buttons and mobile actions are at least 50 px high.
- Motion is disabled for visitors who prefer reduced motion.
- Bright brand blue is decorative; the darker `#006da8` is used for small links and controls.

## Migration behavior

Existing scoped `.ch-article` and `.chf-guide` exports remain usable during the Astra/Spectra migration. They are allowed to expand beyond the standard 760 px reading column on larger screens, while returning to full-width-within-content on mobile.

The mobile fixed CTA should be checked against chat, cookie, and accessibility widgets before production activation.
