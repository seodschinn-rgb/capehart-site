<?php
/**
 * Title: Post final CTA
 * Slug: capehart/post-final-cta
 * Categories: capehart, call-to-action, posts
 * Keywords: blog, post, contact, schedule
 * Description: A concise final call to action for HVAC guide articles.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"aside","align":"full","className":"ch-final-cta","layout":{"type":"constrained"}} -->
<aside class="wp-block-group alignfull ch-final-cta"><!-- wp:group {"align":"wide","className":"ch-shell ch-post-final-cta","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide ch-shell ch-post-final-cta"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Need help with your system?', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Tell Capehart what you are seeing or hearing.', 'capehart-custom' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Online guidance can help you describe a symptom, but equipment condition and repair scope may require an on-site evaluation. Capehart is based in Kiefer and serves the greater Tulsa area.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"ch-post-final-cta__actions","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons ch-post-final-cta__actions"><!-- wp:button {"className":"ch-button"} -->
<div class="wp-block-button ch-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>"><?php esc_html_e( 'Request an Appointment', 'capehart-custom' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost-light"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost-light"><a class="wp-block-button__link wp-element-button" href="tel:+19187711218"><?php esc_html_e( 'Call (918) 771-1218', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></aside>
<!-- /wp:group -->
