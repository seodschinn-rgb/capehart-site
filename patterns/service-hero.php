<?php
/**
 * Title: Service page hero
 * Slug: capehart/service-hero
 * Categories: capehart, featured, services
 * Keywords: service, hero, title, appointment
 * Description: A dynamic service-page hero using the current page title and excerpt.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"full","className":"ch-service-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ch-service-hero"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"ch-shell ch-service-hero__grid"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center ch-shell ch-service-hero__grid"><!-- wp:column {"verticalAlignment":"center","className":"ch-service-hero__copy"} -->
<div class="wp-block-column is-vertically-aligned-center ch-service-hero__copy"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Kiefer-based HVAC service', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:post-title {"level":1} /-->

<!-- wp:post-excerpt {"moreText":"","className":"ch-service-hero__lead"} /-->

<!-- wp:buttons {"className":"ch-hero__actions","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons ch-hero__actions"><!-- wp:button {"className":"ch-button"} -->
<div class="wp-block-button ch-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>"><?php esc_html_e( 'Schedule Service', 'capehart-custom' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost"><a class="wp-block-button__link wp-element-button" href="tel:+19187711218"><?php esc_html_e( 'Call (918) 771-1218', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:list {"className":"ch-trust-list"} -->
<ul class="ch-trust-list"><!-- wp:list-item --><li><?php esc_html_e( 'Kiefer-based', 'capehart-custom' ); ?></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><?php esc_html_e( 'Greater Tulsa service area', 'capehart-custom' ); ?></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><?php esc_html_e( 'Clear repair and planning information', 'capehart-custom' ); ?></li><!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"ch-service-hero__aside"} -->
<div class="wp-block-column is-vertically-aligned-center ch-service-hero__aside"><!-- wp:group {"className":"ch-service-summary-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group ch-service-summary-card"><!-- wp:paragraph {"className":"ch-service-summary-card__title","fontSize":"large"} -->
<p class="ch-service-summary-card__title has-large-font-size"><strong><?php esc_html_e( 'A useful place to start', 'capehart-custom' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Review the service details below, then contact Capehart with the symptom, property location, and equipment type if known.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ch-service-summary-card__phone"} -->
<p class="ch-service-summary-card__phone"><a href="tel:+19187711218"><strong><?php esc_html_e( '(918) 771-1218', 'capehart-custom' ); ?></strong></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
