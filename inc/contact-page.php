<?php
/**
 * Custom Contact page presentation, metadata, and structured data.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the authored SEO fields for the Contact page.
 *
 * @return array<string, string>
 */
function capehart_custom_contact_page_data() {
	return array(
		'title' => 'Contact Capehart Heating & Cooling | Call or Book Online',
		'meta'  => 'Call Capehart Heating & Cooling at (918) 771-1218 or book AC, heating or dryer vent service online. Kiefer-based, serving Greater Tulsa homeowners.',
		'h1'    => 'Contact Capehart Heating & Cooling',
	);
}

/**
 * Return visible Contact-page FAQs used by both HTML and JSON-LD.
 *
 * @return array<int, array<string, string>>
 */
function capehart_custom_contact_faqs() {
	return array(
		array(
			'question' => 'Can I call instead of booking online?',
			'answer'   => 'Yes. Call Capehart at (918) 771-1218 and describe the property and service need. You can also use the Book online buttons to start the booking form.',
		),
		array(
			'question' => 'How does Capehart online booking work?',
			'answer'   => 'The online booking form shows the current air conditioning, heating and dryer vent cleaning categories and guides you through the scheduling steps.',
		),
		array(
			'question' => 'What should I include when scheduling service?',
			'answer'   => 'Include the property address, whether the request involves cooling, heating or a dryer vent, what changed and when you first noticed it. Equipment details are useful only when they are easy to read safely.',
		),
		array(
			'question' => 'Is Capehart based in Tulsa?',
			'answer'   => 'Capehart Heating & Cooling is based in Kiefer, Oklahoma, and serves homeowners throughout the Greater Tulsa area. Include the service address so current coverage can be confirmed.',
		),
		array(
			'question' => 'How can I confirm service for my address?',
			'answer'   => 'Share the property address when you call or book online. Capehart can then confirm whether the property is within the current service area and which category best fits the request.',
		),
		array(
			'question' => 'Which service category should I choose?',
			'answer'   => 'Start with air conditioning, heating or dryer vent cleaning based on the system or vent involved. You do not need to identify the technical cause before contacting Capehart.',
		),
	);
}

/**
 * Return one static Contact-page interface icon.
 *
 * @param string $icon Icon key.
 * @return string
 */
function capehart_custom_contact_icon( $icon ) {
	$icons = array(
		'calendar' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="m9 15 2 2 4-5"/></svg>',
		'phone'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8.2 4.2 10 8.4 7.8 9.8a15.3 15.3 0 0 0 6.4 6.4l1.4-2.2 4.2 1.8v2.7a1.5 1.5 0 0 1-1.5 1.5A14.3 14.3 0 0 1 4 5.7a1.5 1.5 0 0 1 1.5-1.5h2.7Z"/></svg>',
		'location' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>',
		'home'     => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m3 11 9-8 9 8"/><path d="M5.5 9.5V21h13V9.5M9.5 21v-6h5v6"/></svg>',
		'message'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 4h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H10l-5 4v-4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z"/><path d="M8 9h8M8 13h5"/></svg>',
		'check'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m5 12 4 4L19 6"/></svg>',
		'cooling'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2v20M4.2 6.5l15.6 11M4.2 17.5l15.6-11M9.5 4.5 12 7l2.5-2.5M9.5 19.5 12 17l2.5 2.5M4.4 10l3.4.9-.9 3.4M19.6 14l-3.4-.9.9-3.4"/></svg>',
		'heating'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M13.4 2.8c.5 3.3-1.7 4.8-3 6.4-1.2 1.4-1.9 2.8-1.1 4.8.5-1.5 1.5-2.4 2.7-3.3-.1 2.2 1.9 3.1 2 5.2.1 1.5-.8 3-2 4.1 4.3 0 7.3-2.7 7.3-6.6 0-3.7-2.8-7.8-5.9-10.6Z"/></svg>',
		'dryer'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M7 6h2M12 6h5"/><circle cx="12" cy="14" r="4.5"/><path d="M9.2 13c1.1-1 2.2.6 3.3-.4 1.1-1 1.8.2 2.3.7"/></svg>',
		'person'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M4.5 21a7.5 7.5 0 0 1 15 0"/></svg>',
		'arrow'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M14 7l5 5-5 5"/></svg>',
	);

	return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}

/**
 * Render the primary booking and phone actions.
 *
 * @param string $booking_label Booking label.
 */
function capehart_custom_render_contact_actions( $booking_label = 'Book online' ) {
	?>
	<div class="ch-contact-page-actions" role="group" aria-label="Capehart contact options">
		<a class="ch-contact-page-action ch-contact-page-action--primary ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">
			<span class="ch-contact-page-action__icon"><?php echo capehart_custom_contact_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span class="ch-contact-page-action__copy"><strong><?php echo esc_html( $booking_label ); ?></strong><small>Open the booking form</small></span>
			<span class="ch-contact-page-action__arrow"><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
		<a class="ch-contact-page-action ch-contact-page-action--secondary" href="tel:+19187711218">
			<span class="ch-contact-page-action__icon"><?php echo capehart_custom_contact_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span class="ch-contact-page-action__copy"><strong>Call Capehart</strong><small>(918) 771-1218</small></span>
			<span class="ch-contact-page-action__arrow"><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
	</div>
	<?php
}

/**
 * Render the custom Contact page.
 */
function capehart_custom_render_contact_page() {
	$data = capehart_custom_contact_page_data();
	$faqs = capehart_custom_contact_faqs();
	?>
	<div class="ch-contact-page">
		<section class="ch-contact-page-hero" aria-labelledby="contact-page-title">
			<div class="ch-contact-page-shell ch-contact-page-hero__grid">
				<div class="ch-contact-page-hero__copy">
					<p class="ch-contact-page-kicker">Kiefer-based · Serving Greater Tulsa</p>
					<h1 id="contact-page-title"><?php echo esc_html( $data['h1'] ); ?></h1>
					<p class="ch-contact-page-hero__lead">Tell Capehart what is happening at your home and where the property is located. Call the team to describe the request, or open online booking to choose a service category and follow the form.</p>
					<?php capehart_custom_render_contact_actions(); ?>
				</div>
				<div class="ch-contact-page-hero__visual">
					<figure>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capehart-team.webp' ) ); ?>" width="1091" height="1600" fetchpriority="high" decoding="async" alt="Bailey and Brock Capehart of Capehart Heating and Cooling">
					</figure>
					<div class="ch-contact-page-hero__detail">
						<span class="ch-contact-page-hero__detail-icon"><?php echo capehart_custom_contact_icon( 'location' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
						<div><small>Company home base</small><strong>Kiefer, Oklahoma</strong><span>Serving Greater Tulsa homeowners</span></div>
					</div>
				</div>
			</div>
		</section>

		<nav class="ch-contact-page-jump" aria-label="Contact page sections">
			<div class="ch-contact-page-shell">
				<span>On this page</span>
				<a href="#contact-options">Contact options</a>
				<a href="#contact-request">What to share</a>
				<a href="#contact-services">Service routes</a>
				<a href="#contact-questions">Questions</a>
			</div>
		</nav>

		<section id="contact-options" class="ch-contact-page-section ch-contact-page-options" aria-labelledby="contact-options-title">
			<div class="ch-contact-page-shell">
				<div class="ch-contact-page-heading ch-contact-page-heading--split">
					<div><p class="ch-contact-page-kicker">Two direct ways to start</p><h2 id="contact-options-title">Choose the contact path that works for you</h2></div>
					<p>Online booking lets you choose a published service category. Calling is useful when you want to describe the situation before selecting a category.</p>
				</div>
				<div class="ch-contact-page-options__grid">
					<article class="ch-contact-page-option ch-contact-page-option--booking">
						<span class="ch-contact-page-option__icon"><?php echo capehart_custom_contact_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
						<p class="ch-contact-page-option__eyebrow">Online scheduling</p>
						<h3>Book service online</h3>
						<p>Open the Amelia booking form, select cooling, heating or dryer vent cleaning, and follow the steps shown in the form.</p>
						<ul><li>Cooling, heating and dryer vent categories</li><li>Direct booking access</li></ul>
						<a class="ch-contact-page-option__link ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">Open online booking <span><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
					</article>
					<article class="ch-contact-page-option ch-contact-page-option--phone">
						<span class="ch-contact-page-option__icon"><?php echo capehart_custom_contact_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
						<p class="ch-contact-page-option__eyebrow">Direct phone contact</p>
						<h3>Call Capehart</h3>
						<p>Describe the property, the system or vent involved, what changed and when you first noticed it.</p>
						<ul><li>Kiefer-based local team</li><li>Share the property address</li></ul>
						<a class="ch-contact-page-option__link" href="tel:+19187711218">(918) 771-1218 <span><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
					</article>
				</div>
				<p class="ch-contact-page-options__note">Not sure where to start? <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Browse the complete service directory</a>.</p>
			</div>
		</section>

		<section id="contact-request" class="ch-contact-page-section ch-contact-page-request" aria-labelledby="contact-request-title">
			<div class="ch-contact-page-shell">
				<div class="ch-contact-page-heading ch-contact-page-heading--center">
					<p class="ch-contact-page-kicker">Helpful before you contact us</p>
					<h2 id="contact-request-title">What to include in your service request</h2>
					<p>You do not need to diagnose the equipment. A few practical details help you choose the closest service category.</p>
				</div>
				<ol class="ch-contact-page-request__grid">
					<li><span class="ch-contact-page-request__number">01</span><span class="ch-contact-page-request__icon"><?php echo capehart_custom_contact_icon( 'location' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>Property location</h3><p>Include the service address and city so Capehart can confirm coverage for the property.</p></li>
					<li><span class="ch-contact-page-request__number">02</span><span class="ch-contact-page-request__icon"><?php echo capehart_custom_contact_icon( 'home' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>System or vent</h3><p>Say whether the request involves air conditioning, heating or a dryer vent.</p></li>
					<li><span class="ch-contact-page-request__number">03</span><span class="ch-contact-page-request__icon"><?php echo capehart_custom_contact_icon( 'message' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>What changed</h3><p>Describe the symptom, when you first noticed it and whether it is constant or intermittent.</p></li>
					<li><span class="ch-contact-page-request__number">04</span><span class="ch-contact-page-request__icon"><?php echo capehart_custom_contact_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>Equipment details</h3><p>Include the equipment type or model only when the information is easy to read safely.</p></li>
				</ol>
			</div>
		</section>

		<section id="contact-services" class="ch-contact-page-section ch-contact-page-services" aria-labelledby="contact-services-title">
			<div class="ch-contact-page-shell">
				<div class="ch-contact-page-heading">
					<p class="ch-contact-page-kicker">Choose a starting point</p>
					<h2 id="contact-services-title">Which part of your home needs attention?</h2>
					<p>The service hubs explain repair, maintenance and equipment-planning options in more detail.</p>
				</div>
				<div class="ch-contact-page-services__grid">
					<a href="<?php echo esc_url( home_url( '/air-conditioning/' ) ); ?>"><span class="ch-contact-page-services__icon ch-contact-page-services__icon--cooling"><?php echo capehart_custom_contact_icon( 'cooling' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><span><small>Cooling</small><strong>Air conditioning services</strong><span class="ch-contact-page-services__description">Problems, seasonal care and equipment planning</span></span><span class="ch-contact-page-services__arrow"><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
					<a href="<?php echo esc_url( home_url( '/heating/' ) ); ?>"><span class="ch-contact-page-services__icon ch-contact-page-services__icon--heating"><?php echo capehart_custom_contact_icon( 'heating' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><span><small>Heating</small><strong>Heating and furnace services</strong><span class="ch-contact-page-services__description">Problems, maintenance and replacement planning</span></span><span class="ch-contact-page-services__arrow"><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
					<a href="<?php echo esc_url( home_url( '/dryer-vent-cleaning-tulsa/' ) ); ?>"><span class="ch-contact-page-services__icon ch-contact-page-services__icon--dryer"><?php echo capehart_custom_contact_icon( 'dryer' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><span><small>Home service</small><strong>Dryer vent cleaning</strong><span class="ch-contact-page-services__description">Residential dryer vent cleaning requests</span></span><span class="ch-contact-page-services__arrow"><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
				</div>
				<a class="ch-contact-page-text-link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Browse all services <span><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
			</div>
		</section>

		<section class="ch-contact-page-section ch-contact-page-area" aria-labelledby="contact-area-title">
			<div class="ch-contact-page-shell ch-contact-page-area__grid">
				<div class="ch-contact-page-area__copy">
					<p class="ch-contact-page-kicker">Local service area</p>
					<h2 id="contact-area-title">Based in Kiefer, serving Greater Tulsa homeowners</h2>
					<p>Capehart Heating & Cooling is based in Kiefer, Oklahoma, and serves homeowners throughout the Greater Tulsa area. Include the property address so the team can confirm current coverage for the location.</p>
					<a class="ch-contact-page-text-link ch-contact-page-text-link--light" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">Meet Bailey and Brock Capehart <span><?php echo capehart_custom_contact_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
				</div>
				<aside class="ch-contact-page-area__card" aria-label="Capehart local contact summary">
					<span class="ch-contact-page-area__icon"><?php echo capehart_custom_contact_icon( 'location' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
					<p>Company home base</p>
					<h3>Kiefer, Oklahoma</h3>
					<div><span>Service area</span><strong>Greater Tulsa</strong></div>
					<div><span>Team</span><strong><span>Bailey Capehart, CEO</span><span>Brock Capehart, Vice President</span></strong></div>
				</aside>
			</div>
		</section>

		<section id="contact-questions" class="ch-contact-page-section ch-contact-page-faq" aria-labelledby="contact-faq-title">
			<div class="ch-contact-page-shell ch-contact-page-faq__grid">
				<div class="ch-contact-page-heading">
					<p class="ch-contact-page-kicker">Contact questions</p>
					<h2 id="contact-faq-title">Before you call or book online</h2>
					<p>These answers cover the practical details people most often need before contacting Capehart.</p>
				</div>
				<div class="ch-contact-page-faq__items">
					<?php foreach ( $faqs as $index => $faq ) : ?>
						<details<?php echo 0 === $index ? ' open' : ''; ?>>
							<summary><span><?php echo esc_html( $faq['question'] ); ?></span><span aria-hidden="true">+</span></summary>
							<div><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="ch-contact-page-final" aria-labelledby="contact-final-title">
			<div class="ch-contact-page-shell ch-contact-page-final__grid">
				<div><p class="ch-contact-page-kicker">Choose how to get started</p><h2 id="contact-final-title">Share the address and what is happening</h2><p>Open online booking or call Capehart at (918) 771-1218. If you are unsure which category fits, begin with the system or vent involved and the change you noticed.</p></div>
				<?php capehart_custom_render_contact_actions( 'Open online booking' ); ?>
			</div>
		</section>
	</div>
	<?php
}

/**
 * Shortcode callback for the Contact page template.
 *
 * @return string
 */
function capehart_custom_contact_page_shortcode() {
	if ( ! is_page( 'contact' ) ) {
		return '';
	}

	ob_start();
	capehart_custom_render_contact_page();

	return trim( (string) ob_get_clean() );
}
add_shortcode( 'capehart_contact_page', 'capehart_custom_contact_page_shortcode' );

/**
 * Add page-specific body classes.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function capehart_custom_contact_body_classes( $classes ) {
	if ( is_page( 'contact' ) ) {
		$classes[] = 'ch-contact-hub';
	}

	return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'capehart_custom_contact_body_classes', 20 );

/**
 * Remove Spectra assets tied only to the hidden database content.
 */
function capehart_custom_contact_dequeue_legacy_assets() {
	if ( ! is_page( 'contact' ) ) {
		return;
	}

	$page_id = get_queried_object_id();

	foreach ( array( 'spectra-pro-block-css', 'uagb-block-positioning-css', 'uagb-slick-css', 'uagb-swiper-css', 'uag-style-' . $page_id ) as $handle ) {
		wp_dequeue_style( $handle );
	}

	foreach ( array( 'uagb-loop-builder', 'uagb-block-positioning-js', 'uagb-image-gallery-js', 'uagb-masonry', 'uagb-imagesloaded', 'uagb-slick-js', 'uagb-swiper-js', 'uagb-tabs-js', 'uagb-forms-js', 'uag-script-' . $page_id ) as $handle ) {
		wp_dequeue_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_contact_dequeue_legacy_assets', 100 );

/**
 * Apply the authored title to Yoast outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_contact_seo_title( $title ) {
	if ( is_page( 'contact' ) ) {
		return capehart_custom_contact_page_data()['title'];
	}

	return $title;
}
add_filter( 'wpseo_title', 'capehart_custom_contact_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_contact_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_contact_seo_title', 20 );

/**
 * Apply the authored description to Yoast outputs.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_contact_seo_description( $description ) {
	if ( is_page( 'contact' ) ) {
		return capehart_custom_contact_page_data()['meta'];
	}

	return $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_contact_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_contact_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_contact_seo_description', 20 );

/**
 * Use the real team image for social previews.
 *
 * @param string $image Existing image URL.
 * @return string
 */
function capehart_custom_contact_social_image( $image ) {
	if ( is_page( 'contact' ) ) {
		return get_theme_file_uri( 'assets/images/capehart-team.webp' );
	}

	return $image;
}
add_filter( 'wpseo_opengraph_image', 'capehart_custom_contact_social_image', 20 );
add_filter( 'wpseo_twitter_image', 'capehart_custom_contact_social_image', 20 );

/**
 * Provide a core title when Yoast is unavailable.
 *
 * @param array<string, string> $parts Existing title parts.
 * @return array<string, string>
 */
function capehart_custom_contact_document_title( $parts ) {
	if ( is_page( 'contact' ) && ! defined( 'WPSEO_VERSION' ) ) {
		$parts['title'] = capehart_custom_contact_page_data()['title'];
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_contact_document_title', 20 );

/**
 * Print meta and social fallbacks when Yoast is unavailable.
 */
function capehart_custom_contact_meta_fallback() {
	if ( ! is_page( 'contact' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$data  = capehart_custom_contact_page_data();
	$url   = get_permalink( get_queried_object_id() );
	$image = get_theme_file_uri( 'assets/images/capehart-team.webp' );
	?>
	<meta name="description" content="<?php echo esc_attr( $data['meta'] ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $data['title'] ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $data['meta'] ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $data['title'] ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $data['meta'] ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
	<?php
}
add_action( 'wp_head', 'capehart_custom_contact_meta_fallback', 5 );

/**
 * Mark Yoast's WebPage entity as a ContactPage about the organization.
 *
 * @param array<string, mixed> $data Existing schema piece.
 * @return array<string, mixed>
 */
function capehart_custom_contact_webpage_schema( $data ) {
	if ( ! is_page( 'contact' ) || ! is_array( $data ) ) {
		return $data;
	}

	$data['@type']      = array( 'WebPage', 'ContactPage' );
	$data['about']      = array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' );
	$data['mainEntity'] = array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' );

	return $data;
}
add_filter( 'wpseo_schema_webpage', 'capehart_custom_contact_webpage_schema', 20 );

/**
 * Keep the Contact-page organization node precise and connectable.
 *
 * @param array<string, mixed> $data Existing organization piece.
 * @return array<string, mixed>
 */
function capehart_custom_contact_organization_schema( $data ) {
	if ( ! is_page( 'contact' ) || ! is_array( $data ) ) {
		return $data;
	}

	$data['@type']      = 'HVACBusiness';
	$data['name']       = 'Capehart Heating & Cooling';
	$data['telephone']  = '+1-918-771-1218';
	$data['address']    = array(
		'@type'           => 'PostalAddress',
		'addressLocality' => 'Kiefer',
		'addressRegion'   => 'OK',
		'addressCountry'  => 'US',
	);
	$data['areaServed'] = array(
		'@type' => 'Place',
		'name'  => 'Greater Tulsa, Oklahoma',
	);
	$data['contactPoint'] = array(
		'@type'       => 'ContactPoint',
		'telephone'   => '+1-918-771-1218',
		'contactType' => 'service scheduling',
		'areaServed'  => array(
			'@type' => 'Place',
			'name'  => 'Greater Tulsa, Oklahoma',
		),
	);

	return $data;
}
add_filter( 'wpseo_schema_organization', 'capehart_custom_contact_organization_schema', 20 );

/**
 * Build FAQ schema from the exact visible answers.
 *
 * @return array<string, mixed>
 */
function capehart_custom_contact_faq_schema() {
	$page_url  = trailingslashit( get_permalink( get_queried_object_id() ) );
	$questions = array();

	foreach ( capehart_custom_contact_faqs() as $faq ) {
		$questions[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $faq['question'] ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $faq['answer'] ),
			),
		);
	}

	return array(
		'@type'      => 'FAQPage',
		'@id'        => $page_url . '#contact-questions',
		'name'       => 'Contact questions for Capehart Heating & Cooling',
		'url'        => $page_url . '#contact-questions',
		'inLanguage' => 'en-US',
		'isPartOf'   => array( '@id' => $page_url ),
		'mainEntity' => $questions,
	);
}

/**
 * Add the Contact FAQ entity to Yoast's graph.
 *
 * @param array<int, array<string, mixed>> $graph Existing graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_contact_schema_graph( $graph ) {
	if ( ! is_page( 'contact' ) || ! is_array( $graph ) ) {
		return $graph;
	}

	$has_faq = false;

	foreach ( $graph as $piece ) {
		$types = isset( $piece['@type'] ) ? (array) $piece['@type'] : array();

		if ( in_array( 'FAQPage', $types, true ) ) {
			$has_faq = true;
			break;
		}
	}

	if ( ! $has_faq ) {
		$graph[] = capehart_custom_contact_faq_schema();
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_contact_schema_graph', 20 );

/**
 * Print equivalent schema when Yoast is unavailable.
 */
function capehart_custom_contact_schema_fallback() {
	if ( ! is_page( 'contact' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$page_url   = trailingslashit( get_permalink( get_queried_object_id() ) );
	$company_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$data       = capehart_custom_contact_page_data();
	$area       = array(
		'@type' => 'Place',
		'name'  => 'Greater Tulsa, Oklahoma',
	);
	$schema     = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'       => array( 'WebPage', 'ContactPage' ),
				'@id'         => $page_url,
				'url'         => $page_url,
				'name'        => $data['title'],
				'description' => $data['meta'],
				'inLanguage'  => 'en-US',
				'about'       => array( '@id' => $company_id ),
				'mainEntity'  => array( '@id' => $company_id ),
			),
			array(
				'@type'        => 'HVACBusiness',
				'@id'          => $company_id,
				'name'         => 'Capehart Heating & Cooling',
				'url'          => trailingslashit( home_url( '/' ) ),
				'telephone'    => '+1-918-771-1218',
				'address'      => array(
					'@type'           => 'PostalAddress',
					'addressLocality' => 'Kiefer',
					'addressRegion'   => 'OK',
					'addressCountry'  => 'US',
				),
				'areaServed'   => $area,
				'contactPoint' => array(
					'@type'       => 'ContactPoint',
					'telephone'   => '+1-918-771-1218',
					'contactType' => 'service scheduling',
					'areaServed'  => $area,
				),
			),
			capehart_custom_contact_faq_schema(),
		),
	);

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
add_action( 'wp_head', 'capehart_custom_contact_schema_fallback', 20 );
