<?php
/**
 * Title: Six HVAC service cards
 * Slug: capehart/service-cards
 * Categories: capehart, services
 * Keywords: services, cards, heating, cooling
 * Description: Six linked service cards for the Capehart homepage.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"full","className":"ch-section ch-section--soft","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ch-section ch-section--soft"><!-- wp:group {"align":"wide","className":"ch-section-heading ch-section-heading--center","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide ch-section-heading ch-section-heading--center"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Choose your starting point', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'HVAC services without the guesswork', 'capehart-custom' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Clear paths for active problems, planned maintenance, and equipment decisions.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"ch-service-grid","layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group alignwide ch-service-grid"><!-- wp:group {"tagName":"article","className":"ch-service-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group ch-service-card"><!-- wp:paragraph {"className":"ch-icon ch-service-card__icon"} -->
<p class="ch-icon ch-service-card__icon"><?php esc_html_e( 'Cooling', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Air Conditioning Services', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Start here for cooling problems, maintenance planning, and replacement information.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"ch-service-card__link"} -->
<p class="ch-service-card__link"><a href="<?php echo esc_url( home_url( '/air-conditioning/' ) ); ?>"><?php esc_html_e( 'Explore air conditioning', 'capehart-custom' ); ?> →</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"ch-service-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group ch-service-card"><!-- wp:paragraph {"className":"ch-icon ch-service-card__icon"} -->
<p class="ch-icon ch-service-card__icon"><?php esc_html_e( 'Heating', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Furnace Repair', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'For no heat, repeated stopping, weak airflow, or another active furnace problem.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"ch-service-card__link"} -->
<p class="ch-service-card__link"><a href="<?php echo esc_url( home_url( '/furnace-repair/' ) ); ?>"><?php esc_html_e( 'Explore furnace repair', 'capehart-custom' ); ?> →</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"ch-service-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group ch-service-card"><!-- wp:paragraph {"className":"ch-icon ch-service-card__icon"} -->
<p class="ch-icon ch-service-card__icon"><?php esc_html_e( 'Seasonal care', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Furnace Maintenance', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Plan professional care before peak weather while the heating system is operating normally.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"ch-service-card__link"} -->
<p class="ch-service-card__link"><a href="<?php echo esc_url( home_url( '/furnace-maintenance/' ) ); ?>"><?php esc_html_e( 'View furnace maintenance', 'capehart-custom' ); ?> →</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"ch-service-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group ch-service-card"><!-- wp:paragraph {"className":"ch-icon ch-service-card__icon"} -->
<p class="ch-icon ch-service-card__icon"><?php esc_html_e( 'Equipment', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Furnace Replacement', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Compare next steps when equipment age, repair history, or comfort problems raise a larger decision.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"ch-service-card__link"} -->
<p class="ch-service-card__link"><a href="<?php echo esc_url( home_url( '/furnace-replacement/' ) ); ?>"><?php esc_html_e( 'Plan a replacement evaluation', 'capehart-custom' ); ?> →</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"ch-service-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group ch-service-card"><!-- wp:paragraph {"className":"ch-icon ch-service-card__icon"} -->
<p class="ch-icon ch-service-card__icon"><?php esc_html_e( 'Airflow', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'AC Maintenance', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Prepare the cooling system for seasonal use and discuss airflow or performance concerns.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"ch-service-card__link"} -->
<p class="ch-service-card__link"><a href="<?php echo esc_url( home_url( '/air-conditioning-maintenance/' ) ); ?>"><?php esc_html_e( 'View AC maintenance', 'capehart-custom' ); ?> →</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"ch-service-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group ch-service-card"><!-- wp:paragraph {"className":"ch-icon ch-service-card__icon"} -->
<p class="ch-icon ch-service-card__icon"><?php esc_html_e( 'Home care', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Dryer Vent Cleaning', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Learn when a dryer vent may need professional cleaning and how the service works.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"ch-service-card__link"} -->
<p class="ch-service-card__link"><a href="<?php echo esc_url( home_url( '/dryer-vent-cleaning-tulsa/' ) ); ?>"><?php esc_html_e( 'Explore dryer vent cleaning', 'capehart-custom' ); ?> →</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
