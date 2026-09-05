<?php
/**
 * Title: Contact and schedule CTA
 * Slug: capehart/contact-schedule-cta
 * Categories: capehart, call-to-action
 * Keywords: contact, appointment, schedule, phone
 * Description: A high-contrast contact section that links to the existing appointment flow.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"full","className":"ch-contact","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ch-contact"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"ch-shell ch-contact__grid"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center ch-shell ch-contact__grid"><!-- wp:column {"verticalAlignment":"center","className":"ch-contact__copy"} -->
<div class="wp-block-column is-vertically-aligned-center ch-contact__copy"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Request service', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Tell Capehart what your system is doing.', 'capehart-custom' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Share the symptom, property location, and equipment type if you know it. The team will confirm availability and the appropriate next step.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ch-contact__phone"} -->
<p class="ch-contact__phone"><a href="tel:+19187711218"><?php esc_html_e( '(918) 771-1218', 'capehart-custom' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ch-contact-email"} -->
<p class="ch-contact-email"><a href="mailto:info@capeharthc.com">info@capeharthc.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"ch-contact-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group ch-contact-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Choose how to get in touch', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:list {"className":"ch-checks"} -->
<ul class="ch-checks"><!-- wp:list-item --><li><?php esc_html_e( 'Use the appointment page for a written request', 'capehart-custom' ); ?></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><?php esc_html_e( 'Call when you want to explain the symptom directly', 'capehart-custom' ); ?></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><?php esc_html_e( 'Capehart confirms timing and service details', 'capehart-custom' ); ?></li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"ch-contact-card__actions","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons ch-contact-card__actions"><!-- wp:button {"className":"ch-button"} -->
<div class="wp-block-button ch-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>"><?php esc_html_e( 'Request an Appointment', 'capehart-custom' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost"><a class="wp-block-button__link wp-element-button" href="tel:+19187711218"><?php esc_html_e( 'Call Capehart', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
