<?php
/**
 * Title: Local team and trust section
 * Slug: capehart/local-team-trust
 * Categories: capehart, about
 * Keywords: local, team, about, trust
 * Description: A two-column section pairing real team photography with verifiable local context.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"full","className":"ch-section ch-local-team","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ch-section ch-local-team"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"ch-split"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center ch-split"><!-- wp:column {"verticalAlignment":"center","className":"ch-split__media"} -->
<div class="wp-block-column is-vertically-aligned-center ch-split__media"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capehart-team.webp' ) ); ?>" alt="<?php esc_attr_e( 'Capehart Heating and Cooling team members', 'capehart-custom' ); ?>" width="1091" height="1600"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"ch-split-copy"} -->
<div class="wp-block-column is-vertically-aligned-center ch-split-copy"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Kiefer-based, locally focused', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Useful answers before the next HVAC decision', 'capehart-custom' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Capehart Heating & Cooling serves homeowners in Kiefer and across the greater Tulsa area. Start with the symptom or service you need, then contact the team to discuss the property and current availability.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"ch-checks"} -->
<ul class="ch-checks"><!-- wp:list-item -->
<li><?php esc_html_e( 'Local service-area context on every important page', 'capehart-custom' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'Clear explanations for repair, maintenance, and replacement paths', 'capehart-custom' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'Straightforward phone and appointment options', 'capehart-custom' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"ch-hero__actions","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons ch-hero__actions"><!-- wp:button {"className":"ch-button ch-button--navy"} -->
<div class="wp-block-button ch-button ch-button--navy"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Capehart', 'capehart-custom' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About the team', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
