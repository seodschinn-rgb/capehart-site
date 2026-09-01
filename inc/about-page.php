<?php
/**
 * Repository-owned About page.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the authored SEO fields for the About page.
 *
 * @return array<string, string>
 */
function capehart_custom_about_page_data() {
	return array(
		'title' => 'About Capehart Heating & Cooling | Kiefer HVAC Team',
		'meta'  => 'Meet Bailey and Brock Capehart, the Kiefer-based team serving homeowners across Greater Tulsa with air conditioning, heating and dryer vent services.',
		'h1'    => 'Meet Capehart Heating & Cooling',
	);
}

/**
 * Return the two named team members already shown on the live company site.
 *
 * Roles and credentials are intentionally omitted until independently verified.
 *
 * @return array<int, array<string, string>>
 */
function capehart_custom_about_team_members() {
	return array(
		array(
			'id'    => 'bailey-capehart',
			'name'  => 'Bailey Capehart',
			'image' => 'https://capeharthc.com/wp-content/uploads/2026/04/IMG_5474.webp',
		),
		array(
			'id'    => 'brock-capehart',
			'name'  => 'Brock Capehart',
			'image' => 'https://capeharthc.com/wp-content/uploads/2026/04/IMG_5475.webp',
		),
	);
}

/**
 * Return visible FAQ copy used by both the page and its schema.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_about_faqs() {
	return array(
		array(
			'question' => 'Who is featured on the Capehart team page?',
			'answer'   => 'Bailey Capehart and Brock Capehart are the two named team members featured by Capehart Heating & Cooling. Their real team and profile photos are shown on this page.',
		),
		array(
			'question' => 'What does Kiefer-based mean for Capehart?',
			'answer'   => 'Kiefer, Oklahoma, is Capehart Heating & Cooling\'s home base. The company serves homeowners throughout the Greater Tulsa area and confirms current coverage from the service address.',
		),
		array(
			'question' => 'Where can I compare all published Capehart services?',
			'answer'   => 'Use the Services page to compare Capehart\'s published cooling, heating and dryer vent categories, then follow the relevant link for repair, maintenance or equipment-planning details.',
		),
		array(
			'question' => 'What should I have ready before contacting the team?',
			'answer'   => 'Share the property address, whether the request involves cooling, heating or a dryer vent, what changed and when you first noticed it. Equipment details are useful only when they can be read safely.',
		),
		array(
			'question' => 'Can I open the booking form from this About page?',
			'answer'   => 'Yes. The Schedule service buttons open Capehart\'s full online booking form on this page. You can also call (918) 771-1218 if you need help choosing a service category.',
		),
	);
}

/**
 * Return one static interface icon.
 *
 * @param string $icon Icon key.
 * @return string
 */
function capehart_custom_about_icon( $icon ) {
	$icons = array(
		'calendar' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="m9 15 2 2 4-5"/></svg>',
		'phone'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8.2 4.2 10 8.4 7.8 9.8a15.3 15.3 0 0 0 6.4 6.4l1.4-2.2 4.2 1.8v2.7a1.5 1.5 0 0 1-1.5 1.5A14.3 14.3 0 0 1 4 5.7a1.5 1.5 0 0 1 1.5-1.5h2.7Z"/></svg>',
		'location' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>',
		'person'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M4.5 21a7.5 7.5 0 0 1 15 0"/></svg>',
		'check'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m5 12 4 4L19 6"/></svg>',
		'cooling'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2v20M4.2 6.5l15.6 11M4.2 17.5l15.6-11M9.5 4.5 12 7l2.5-2.5M9.5 19.5 12 17l2.5 2.5M4.4 10l3.4.9-.9 3.4M19.6 14l-3.4-.9.9-3.4"/></svg>',
		'heating'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M13.4 2.8c.5 3.3-1.7 4.8-3 6.4-1.2 1.4-1.9 2.8-1.1 4.8.5-1.5 1.5-2.4 2.7-3.3-.1 2.2 1.9 3.1 2 5.2.1 1.5-.8 3-2 4.1 4.3 0 7.3-2.7 7.3-6.6 0-3.7-2.8-7.8-5.9-10.6Z"/></svg>',
		'dryer'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M7 6h2M12 6h5"/><circle cx="12" cy="14" r="4.5"/><path d="M9.2 13c1.1-1 2.2.6 3.3-.4 1.1-1 1.8.2 2.3.7"/></svg>',
		'arrow'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M14 7l5 5-5 5"/></svg>',
	);

	return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}

/**
 * Render shared schedule and call action cards.
 *
 * @param string $schedule_label Schedule card label.
 */
function capehart_custom_render_about_actions( $schedule_label = 'Schedule service' ) {
	?>
	<div class="ch-about-actions" role="group" aria-label="Capehart contact options">
		<a class="ch-about-action ch-about-action--primary ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">
			<span class="ch-about-action__icon"><?php echo capehart_custom_about_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span class="ch-about-action__copy"><strong><?php echo esc_html( $schedule_label ); ?></strong><small>Open online booking</small></span>
			<span class="ch-about-action__arrow"><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
		<a class="ch-about-action ch-about-action--secondary" href="tel:+19187711218">
			<span class="ch-about-action__icon"><?php echo capehart_custom_about_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span class="ch-about-action__copy"><strong>Call Capehart</strong><small>(918) 771-1218</small></span>
			<span class="ch-about-action__arrow"><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
	</div>
	<?php
}

/**
 * Render the complete About page.
 */
function capehart_custom_render_about_page() {
	$data    = capehart_custom_about_page_data();
	$members = capehart_custom_about_team_members();
	$faqs    = capehart_custom_about_faqs();
	?>
	<div class="ch-about-page">
		<section class="ch-about-hero" aria-labelledby="about-page-title">
			<div class="ch-about-shell ch-about-hero__grid">
				<div class="ch-about-hero__copy">
					<p class="ch-about-kicker">Kiefer-based HVAC team · Serving Greater Tulsa</p>
					<h1 id="about-page-title"><?php echo esc_html( $data['h1'] ); ?></h1>
					<p class="ch-about-hero__lead">Meet Bailey and Brock Capehart, the people behind Capehart Heating &amp; Cooling. From Kiefer, the team helps homeowners across Greater Tulsa find the right air conditioning, heating or dryer vent service path.</p>
					<?php capehart_custom_render_about_actions(); ?>
				</div>
				<figure class="ch-about-hero__visual">
					<span class="ch-about-hero__shape" aria-hidden="true"></span>
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capehart-team.webp' ) ); ?>" width="1091" height="1600" fetchpriority="high" decoding="async" alt="Bailey and Brock Capehart wearing Capehart Heating and Cooling work shirts">
					<figcaption><span>Home base</span><strong>Kiefer, Oklahoma</strong></figcaption>
				</figure>
			</div>
		</section>

		<nav class="ch-about-jump" aria-label="About page sections">
			<div class="ch-about-shell">
				<span>On this page</span>
				<a href="#about-team">The team</a>
				<a href="#about-verify">At a glance</a>
				<a href="#about-services">Services</a>
				<a href="#about-questions">Questions</a>
			</div>
		</nav>

		<section id="about-team" class="ch-about-section ch-about-team" aria-labelledby="about-team-title">
			<div class="ch-about-shell">
				<div class="ch-about-heading ch-about-heading--split">
					<div><p class="ch-about-kicker">The people behind the name</p><h2 id="about-team-title">Meet Bailey and Brock Capehart</h2></div>
					<p>Bailey and Brock Capehart are the people behind Capehart Heating &amp; Cooling. Their real team and profile photos give homeowners a clear view of the Kiefer-based company they are contacting.</p>
				</div>
				<div class="ch-about-team__grid">
					<?php foreach ( $members as $member ) : ?>
						<article id="<?php echo esc_attr( $member['id'] ); ?>" class="ch-about-profile">
							<div class="ch-about-profile__photo">
								<img src="<?php echo esc_url( $member['image'] ); ?>" width="960" height="960" loading="lazy" decoding="async" alt="<?php echo esc_attr( $member['name'] . ' of Capehart Heating and Cooling' ); ?>">
							</div>
							<div class="ch-about-profile__copy">
								<span>Capehart Heating &amp; Cooling</span>
								<h3><?php echo esc_html( $member['name'] ); ?></h3>
								<p>Capehart Heating &amp; Cooling team member</p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section id="about-verify" class="ch-about-section ch-about-verify" aria-labelledby="about-verify-title">
			<div class="ch-about-shell">
				<div class="ch-about-heading ch-about-heading--center">
					<p class="ch-about-kicker">At a glance</p>
					<h2 id="about-verify-title">Capehart's local details</h2>
					<p>A few practical facts make it easier to confirm the company, understand its service area and choose a contact option.</p>
				</div>
				<div class="ch-about-verify__grid">
					<article><span class="ch-about-verify__icon"><?php echo capehart_custom_about_icon( 'location' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>Home base</p><h3>Kiefer, Oklahoma</h3><p class="ch-about-verify__detail">Capehart is locally positioned in Kiefer.</p></article>
					<article><span class="ch-about-verify__icon"><?php echo capehart_custom_about_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>Service area</p><h3>Greater Tulsa</h3><p class="ch-about-verify__detail">Include the property address so current coverage can be confirmed.</p></article>
					<article><span class="ch-about-verify__icon"><?php echo capehart_custom_about_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>Call Capehart</p><h3>(918) 771-1218</h3><p class="ch-about-verify__detail">Use the direct published phone number.</p></article>
					<article><span class="ch-about-verify__icon"><?php echo capehart_custom_about_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>Online scheduling</p><h3>Book on the site</h3><p class="ch-about-verify__detail">Open the current service categories without leaving the page.</p></article>
				</div>
			</div>
		</section>

		<section class="ch-about-section ch-about-process" aria-labelledby="about-process-title">
			<div class="ch-about-shell ch-about-process__grid">
				<div class="ch-about-heading ch-about-heading--light">
					<p class="ch-about-kicker">A practical starting point</p>
					<h2 id="about-process-title">From a system problem to the next service step</h2>
					<p>You do not need to diagnose the equipment before contacting Capehart. A useful request begins with the property, the system and what changed.</p>
				</div>
				<ol class="ch-about-process__steps">
					<li><span>01</span><div><h3>Tell Capehart what is happening</h3><p>Share the property address, the equipment or vent involved, the symptom and when you first noticed it.</p></div></li>
					<li><span>02</span><div><h3>Choose the closest published service</h3><p>Start with cooling, heating or dryer vent cleaning. The service directory explains the repair, maintenance and equipment-planning paths.</p></div></li>
					<li><span>03</span><div><h3>Confirm coverage and scheduling</h3><p>Use the online form or call so the team can confirm the appropriate category and current options for the address.</p></div></li>
				</ol>
			</div>
		</section>

		<section id="about-services" class="ch-about-section ch-about-services" aria-labelledby="about-services-title">
			<div class="ch-about-shell">
				<div class="ch-about-heading">
					<p class="ch-about-kicker">Published service categories</p>
					<h2 id="about-services-title">How Capehart helps Greater Tulsa homeowners</h2>
					<p>This About page provides a short overview. The Services hub and individual pages contain the detailed repair, maintenance and equipment information.</p>
				</div>
				<div class="ch-about-services__grid">
						<a href="<?php echo esc_url( home_url( '/air-conditioning/' ) ); ?>"><span class="ch-about-services__icon ch-about-services__icon--cooling"><?php echo capehart_custom_about_icon( 'cooling' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><span><small>Cooling</small><strong>Air conditioning services</strong><span class="ch-about-service-desc">Repair, maintenance and equipment-planning routes</span></span><span class="ch-about-service-arrow" aria-hidden="true"><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
						<a href="<?php echo esc_url( home_url( '/heating/' ) ); ?>"><span class="ch-about-services__icon ch-about-services__icon--heating"><?php echo capehart_custom_about_icon( 'heating' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><span><small>Heating</small><strong>Heating and furnace services</strong><span class="ch-about-service-desc">Repair, maintenance and replacement-planning routes</span></span><span class="ch-about-service-arrow" aria-hidden="true"><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
						<a href="<?php echo esc_url( home_url( '/dryer-vent-cleaning-tulsa/' ) ); ?>"><span class="ch-about-services__icon ch-about-services__icon--dryer"><?php echo capehart_custom_about_icon( 'dryer' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><span><small>Home service</small><strong>Dryer vent cleaning</strong><span class="ch-about-service-desc">A dedicated residential dryer vent service page</span></span><span class="ch-about-service-arrow" aria-hidden="true"><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
				</div>
				<a class="ch-about-text-link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Explore the complete service directory <span><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
			</div>
		</section>

		<section class="ch-about-section ch-about-area" aria-labelledby="about-area-title">
			<div class="ch-about-shell ch-about-area__grid">
				<div>
					<p class="ch-about-kicker">One clear home base</p>
					<h2 id="about-area-title">Based in Kiefer, serving the Greater Tulsa area</h2>
					<p>Capehart is based in Kiefer and serves homeowners throughout Greater Tulsa. Contact the team with the property address so current coverage and scheduling options can be confirmed.</p>
					<a class="ch-about-text-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Ask about your address <span><?php echo capehart_custom_about_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
				</div>
				<aside aria-label="Capehart service area summary">
					<span><?php echo capehart_custom_about_icon( 'location' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
					<p>Company home base</p>
					<strong>Kiefer, OK</strong>
					<hr>
					<p>Residential service area</p>
					<strong>Greater Tulsa</strong>
				</aside>
			</div>
		</section>

		<section id="about-questions" class="ch-about-section ch-about-faq" aria-labelledby="about-faq-title">
			<div class="ch-about-shell ch-about-faq__grid">
				<div class="ch-about-heading">
					<p class="ch-about-kicker">Company questions</p>
					<h2 id="about-faq-title">Answers about Capehart</h2>
					<p>These short answers cover the business details people most often look for before choosing a service page or opening the booking form.</p>
				</div>
				<div class="ch-about-faq__items">
					<?php foreach ( $faqs as $index => $faq ) : ?>
						<details<?php echo 0 === $index ? ' open' : ''; ?>>
							<summary><span><?php echo esc_html( $faq['question'] ); ?></span><b aria-hidden="true"></b></summary>
							<div><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="ch-about-final" aria-labelledby="about-final-title">
			<div class="ch-about-shell ch-about-final__grid">
				<div><p class="ch-about-kicker">Ready for the next step?</p><h2 id="about-final-title">Tell Capehart what your home needs</h2><p>Share the address and what is happening. You can open the full booking form on this page or speak with the team by phone.</p></div>
				<?php capehart_custom_render_about_actions( 'Schedule with Capehart' ); ?>
			</div>
		</section>
	</div>
	<?php
}

/**
 * Shortcode callback for the exact About page template.
 *
 * @return string
 */
function capehart_custom_about_page_shortcode() {
	if ( ! is_page( 'about-us' ) ) {
		return '';
	}

	ob_start();
	capehart_custom_render_about_page();

	return trim( (string) ob_get_clean() );
}
add_shortcode( 'capehart_about_page', 'capehart_custom_about_page_shortcode' );

/**
 * Add page-specific body classes.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function capehart_custom_about_body_classes( $classes ) {
	if ( is_page( 'about-us' ) ) {
		$classes[] = 'ch-about-hub';
	}

	return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'capehart_custom_about_body_classes', 20 );

/**
 * Remove Spectra assets tied only to the hidden database content.
 */
function capehart_custom_about_dequeue_legacy_assets() {
	if ( ! is_page( 'about-us' ) ) {
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
add_action( 'wp_enqueue_scripts', 'capehart_custom_about_dequeue_legacy_assets', 100 );

/**
 * Apply the authored title to Yoast outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_about_seo_title( $title ) {
	if ( is_page( 'about-us' ) ) {
		return capehart_custom_about_page_data()['title'];
	}

	return $title;
}
add_filter( 'wpseo_title', 'capehart_custom_about_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_about_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_about_seo_title', 20 );

/**
 * Apply the authored description to Yoast outputs.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_about_seo_description( $description ) {
	if ( is_page( 'about-us' ) ) {
		return capehart_custom_about_page_data()['meta'];
	}

	return $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_about_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_about_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_about_seo_description', 20 );

/**
 * Use the real team image for social previews.
 *
 * @param string $image Existing image URL.
 * @return string
 */
function capehart_custom_about_social_image( $image ) {
	if ( is_page( 'about-us' ) ) {
		return get_theme_file_uri( 'assets/images/capehart-team.webp' );
	}

	return $image;
}
add_filter( 'wpseo_opengraph_image', 'capehart_custom_about_social_image', 20 );
add_filter( 'wpseo_twitter_image', 'capehart_custom_about_social_image', 20 );

/**
 * Provide a core title when Yoast is unavailable.
 *
 * @param array<string, string> $parts Existing title parts.
 * @return array<string, string>
 */
function capehart_custom_about_document_title( $parts ) {
	if ( is_page( 'about-us' ) && ! defined( 'WPSEO_VERSION' ) ) {
		$parts['title'] = capehart_custom_about_page_data()['title'];
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_about_document_title', 20 );

/**
 * Print meta and social fallbacks when Yoast is unavailable.
 */
function capehart_custom_about_meta_fallback() {
	if ( ! is_page( 'about-us' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$data  = capehart_custom_about_page_data();
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
add_action( 'wp_head', 'capehart_custom_about_meta_fallback', 5 );

/**
 * Mark Yoast's WebPage entity as an AboutPage about the organization.
 *
 * @param array<string, mixed> $data Existing schema piece.
 * @return array<string, mixed>
 */
function capehart_custom_about_webpage_schema( $data ) {
	if ( ! is_page( 'about-us' ) || ! is_array( $data ) ) {
		return $data;
	}

	$data['@type']      = array( 'WebPage', 'AboutPage' );
	$data['about']      = array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' );
	$data['mainEntity'] = array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' );

	return $data;
}
add_filter( 'wpseo_schema_webpage', 'capehart_custom_about_webpage_schema', 20 );

/**
 * Keep the organization node precise on the About page.
 *
 * @param array<string, mixed> $data Existing organization piece.
 * @return array<string, mixed>
 */
function capehart_custom_about_organization_schema( $data ) {
	if ( ! is_page( 'about-us' ) || ! is_array( $data ) ) {
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
		'@type' => 'AdministrativeArea',
		'name'  => 'Greater Tulsa, Oklahoma',
	);

	return $data;
}
add_filter( 'wpseo_schema_organization', 'capehart_custom_about_organization_schema', 20 );

/**
 * Build the named team ItemList entity.
 *
 * @return array<string, mixed>
 */
function capehart_custom_about_team_schema() {
	$page_url    = trailingslashit( get_permalink( get_queried_object_id() ) );
	$company_id  = trailingslashit( home_url( '/' ) ) . '#organization';
	$list_items  = array();

	foreach ( capehart_custom_about_team_members() as $index => $member ) {
		$list_items[] = array(
			'@type'    => 'ListItem',
			'position' => $index + 1,
			'item'     => array(
				'@type'       => 'Person',
				'@id'         => $page_url . '#' . $member['id'],
				'name'        => $member['name'],
				'image'       => $member['image'],
				'description' => 'Capehart Heating & Cooling team member',
				'worksFor'    => array( '@id' => $company_id ),
			),
		);
	}

	return array(
		'@type'           => 'ItemList',
		'@id'             => $page_url . '#about-team',
		'name'            => 'Capehart Heating & Cooling team',
		'numberOfItems'   => count( $list_items ),
		'itemListOrder'   => 'https://schema.org/ItemListOrderAscending',
		'itemListElement' => $list_items,
		'isPartOf'        => array( '@id' => $page_url ),
	);
}

/**
 * Build FAQ schema from the exact visible answers.
 *
 * @return array<string, mixed>
 */
function capehart_custom_about_faq_schema() {
	$page_url  = trailingslashit( get_permalink( get_queried_object_id() ) );
	$questions = array();

	foreach ( capehart_custom_about_faqs() as $faq ) {
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
		'@id'        => $page_url . '#about-questions',
		'name'       => 'Questions about Capehart Heating & Cooling',
		'url'        => $page_url . '#about-questions',
		'inLanguage' => 'en-US',
		'isPartOf'   => array( '@id' => $page_url ),
		'mainEntity' => $questions,
	);
}

/**
 * Add team and FAQ entities to Yoast's graph.
 *
 * @param array<int, array<string, mixed>> $graph Existing graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_about_schema_graph( $graph ) {
	if ( ! is_page( 'about-us' ) || ! is_array( $graph ) ) {
		return $graph;
	}

	$has_team = false;
	$has_faq  = false;

	foreach ( $graph as $piece ) {
		$piece_id = isset( $piece['@id'] ) ? (string) $piece['@id'] : '';
		$types    = isset( $piece['@type'] ) ? (array) $piece['@type'] : array();

		if ( '#about-team' === substr( $piece_id, -11 ) ) {
			$has_team = true;
		}

		if ( in_array( 'FAQPage', $types, true ) ) {
			$has_faq = true;
		}
	}

	if ( ! $has_team ) {
		$graph[] = capehart_custom_about_team_schema();
	}

	if ( ! $has_faq ) {
		$graph[] = capehart_custom_about_faq_schema();
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_about_schema_graph', 20 );

/**
 * Print equivalent schema when Yoast is unavailable.
 */
function capehart_custom_about_schema_fallback() {
	if ( ! is_page( 'about-us' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$page_url   = trailingslashit( get_permalink( get_queried_object_id() ) );
	$company_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$data       = capehart_custom_about_page_data();
	$schema     = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'       => array( 'WebPage', 'AboutPage' ),
				'@id'         => $page_url,
				'url'         => $page_url,
				'name'        => $data['title'],
				'description' => $data['meta'],
				'inLanguage'  => 'en-US',
				'about'       => array( '@id' => $company_id ),
				'mainEntity'  => array( '@id' => $company_id ),
			),
			array(
				'@type'      => 'HVACBusiness',
				'@id'        => $company_id,
				'name'       => 'Capehart Heating & Cooling',
				'url'        => trailingslashit( home_url( '/' ) ),
				'telephone'  => '+1-918-771-1218',
				'address'    => array(
					'@type'           => 'PostalAddress',
					'addressLocality' => 'Kiefer',
					'addressRegion'   => 'OK',
					'addressCountry'  => 'US',
				),
				'areaServed' => array(
					'@type' => 'AdministrativeArea',
					'name'  => 'Greater Tulsa, Oklahoma',
				),
			),
			capehart_custom_about_team_schema(),
			capehart_custom_about_faq_schema(),
		),
	);

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
add_action( 'wp_head', 'capehart_custom_about_schema_fallback', 20 );
