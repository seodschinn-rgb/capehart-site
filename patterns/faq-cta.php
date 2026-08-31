<?php
/**
 * Title: Service FAQs and CTA
 * Slug: capehart/faq-cta
 * Categories: capehart, text, call-to-action
 * Keywords: faq, questions, service, contact
 * Description: Editable core Details blocks followed by a contact call to action.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"wide","className":"ch-faq-section","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignwide ch-faq-section"><!-- wp:group {"className":"ch-section-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group ch-section-heading"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Common questions', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Before you request HVAC service', 'capehart-custom' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ch-faq ch-faq-list","layout":{"type":"constrained"}} -->
<div class="wp-block-group ch-faq ch-faq-list"><!-- wp:details {"className":"ch-faq-item"} -->
<details class="wp-block-details ch-faq-item"><summary><?php esc_html_e( 'How do I know which service to choose?', 'capehart-custom' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Start with the current symptom. An active heating or cooling fault generally belongs on a repair path, while normally operating equipment may be suited to seasonal maintenance. Capehart can help clarify the request when you call.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"ch-faq-item"} -->
<details class="wp-block-details ch-faq-item"><summary><?php esc_html_e( 'What information should I have ready?', 'capehart-custom' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Share the property location, what the system is doing, when the issue began, and the equipment type or model if it is readily available. Do not remove panels or handle electrical, gas, or refrigerant components to find this information.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"ch-faq-item"} -->
<details class="wp-block-details ch-faq-item"><summary><?php esc_html_e( 'Does Capehart serve my location?', 'capehart-custom' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Capehart is based in Kiefer and serves communities throughout the greater Tulsa area. Contact the team with the service address to confirm coverage and availability.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ch-inline-cta","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group ch-inline-cta"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Ready to discuss the system?', 'capehart-custom' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph --><p><?php esc_html_e( 'Request an appointment or call Capehart directly.', 'capehart-custom' ); ?></p><!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"ch-button"} -->
<div class="wp-block-button ch-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>"><?php esc_html_e( 'Request an Appointment', 'capehart-custom' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost"><a class="wp-block-button__link wp-element-button" href="tel:+19187711218"><?php esc_html_e( 'Call (918) 771-1218', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
