<?php
/**
 * Title: Homepage hero
 * Slug: capehart/home-hero
 * Categories: capehart, featured
 * Keywords: home, hero, hvac, cape hart
 * Description: A locally focused homepage hero with two clear contact options.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"full","className":"ch-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ch-hero"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"ch-hero__grid"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center ch-hero__grid"><!-- wp:column {"verticalAlignment":"center","className":"ch-hero__copy"} -->
<div class="wp-block-column is-vertically-aligned-center ch-hero__copy"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Heating & cooling, handled clearly', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><?php esc_html_e( 'Reliable HVAC help for Kiefer and Greater Tulsa.', 'capehart-custom' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"ch-hero__lead"} -->
<p class="ch-hero__lead"><?php esc_html_e( 'Tell us what your system is doing. Capehart Heating & Cooling helps homeowners find the right next step, from repair and seasonal maintenance to replacement planning.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"ch-hero__actions","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons ch-hero__actions"><!-- wp:button {"className":"ch-button"} -->
<div class="wp-block-button ch-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>"><?php esc_html_e( 'Schedule HVAC Service', 'capehart-custom' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost"><a class="wp-block-button__link wp-element-button" href="tel:+19187711218"><?php esc_html_e( 'Call (918) 771-1218', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:list {"className":"ch-trust-list"} -->
<ul class="ch-trust-list"><!-- wp:list-item -->
<li><?php esc_html_e( 'Kiefer-based local team', 'capehart-custom' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Heating and cooling service', 'capehart-custom' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Greater Tulsa service area', 'capehart-custom' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"ch-hero__visual"} -->
<div class="wp-block-column is-vertically-aligned-center ch-hero__visual"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"ch-hero__photo"} -->
<figure class="wp-block-image size-full ch-hero__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capehart-team.webp' ) ); ?>" alt="<?php esc_attr_e( 'Capehart Heating and Cooling team members', 'capehart-custom' ); ?>" width="1091" height="1600"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"ch-float-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group ch-float-card"><!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Start with the symptom', 'capehart-custom' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'We will help you identify the right service path.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
