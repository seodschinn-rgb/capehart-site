<?php
/**
 * Repository-owned services hub.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the authored SEO fields for the services hub.
 *
 * @return array<string, string>
 */
function capehart_custom_services_page_data() {
	return array(
		'title' => 'HVAC Services in Kiefer, OK | Capehart Heating & Cooling',
		'meta'  => 'Compare HVAC services in Kiefer and Greater Tulsa, including air conditioning, heating, seasonal maintenance, equipment planning and dryer vent cleaning.',
		'h1'    => 'HVAC Services for Kiefer and Greater Tulsa Homeowners',
	);
}

/**
 * Return the service categories represented by published hub pages.
 *
 * @return array<int, array<string, string>>
 */
function capehart_custom_services_categories() {
	return array(
		array(
			'key'         => 'cooling',
			'name'        => 'Air conditioning services',
			'short_name'  => 'Cooling',
			'description' => 'AC repair, maintenance, installation and replacement planning.',
			'url'         => home_url( '/air-conditioning/' ),
		),
		array(
			'key'         => 'heating',
			'name'        => 'Heating services',
			'short_name'  => 'Heating',
			'description' => 'Furnace repair, seasonal maintenance and replacement planning.',
			'url'         => home_url( '/heating/' ),
		),
		array(
			'key'         => 'dryer',
			'name'        => 'Dryer vent cleaning',
			'short_name'  => 'Dryer vent',
			'description' => 'A dedicated cleaning service for residential dryer vent systems.',
			'url'         => home_url( '/dryer-vent-cleaning-tulsa/' ),
		),
	);
}

/**
 * Return visible FAQ copy used by both the page and its schema.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_services_faqs() {
	return array(
		array(
			'question' => 'What HVAC services can I schedule with Capehart?',
			'answer'   => 'Capehart offers air conditioning and heating service paths for repair, maintenance and equipment planning, along with dryer vent cleaning. The individual service pages explain the most appropriate starting point for each need.',
		),
		array(
			'question' => 'Should I request HVAC repair or maintenance?',
			'answer'   => 'Choose repair when heating or cooling performance has changed, the system has stopped, or a new symptom needs diagnosis. Maintenance is the better starting point when the equipment is operating normally and you are planning routine seasonal care.',
		),
		array(
			'question' => 'Does Capehart serve Tulsa if the company is based in Kiefer?',
			'answer'   => 'Yes. Capehart Heating & Cooling is based in Kiefer and serves homeowners throughout the Greater Tulsa area. Include the property address when you contact the team so current service coverage can be confirmed.',
		),
		array(
			'question' => 'Can I schedule every service online?',
			'answer'   => 'The online booking form shows the currently available service categories and appointment options. You can also call Capehart at (918) 771-1218 if you are unsure which service best matches the situation.',
		),
		array(
			'question' => 'What information should I provide when requesting service?',
			'answer'   => 'Share the service address, whether the issue involves cooling, heating or a dryer vent, what has changed, and when you first noticed it. Equipment details are useful when they can be read without opening panels or approaching unsafe components.',
		),
	);
}

/**
 * Return one decorative service icon.
 *
 * @param string $icon Icon key.
 * @return string
 */
function capehart_custom_services_icon( $icon ) {
	$icons = array(
		'calendar' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="m9 15 2 2 4-5"/></svg>',
		'phone'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8.2 4.2 10 8.4 7.8 9.8a15.3 15.3 0 0 0 6.4 6.4l1.4-2.2 4.2 1.8v2.7a1.5 1.5 0 0 1-1.5 1.5A14.3 14.3 0 0 1 4 5.7a1.5 1.5 0 0 1 1.5-1.5h2.7Z"/></svg>',
		'cooling'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2v20M4.2 6.5l15.6 11M4.2 17.5l15.6-11M9.5 4.5 12 7l2.5-2.5M9.5 19.5 12 17l2.5 2.5M4.4 10l3.4.9-.9 3.4M19.6 14l-3.4-.9.9-3.4M6.9 9.7l.9 3.4-3.4.9M17.1 14.3l-.9-3.4 3.4-.9"/></svg>',
		'heating'  => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M13.4 2.8c.5 3.3-1.7 4.8-3 6.4-1.2 1.4-1.9 2.8-1.1 4.8.5-1.5 1.5-2.4 2.7-3.3-.1 2.2 1.9 3.1 2 5.2.1 1.5-.8 3-2 4.1 4.3 0 7.3-2.7 7.3-6.6 0-3.7-2.8-7.8-5.9-10.6ZM9.4 20c-2.8-.8-4.7-3.1-4.7-6 0-2.3 1.1-4.4 2.7-6.2-.2 2.4 1 3.3 2 4.6-1.4 2.6-1 5.2 0 7.6Z"/></svg>',
		'dryer'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M7 6h2M12 6h5"/><circle cx="12" cy="14" r="4.5"/><path d="M9.2 13c1.1-1 2.2.6 3.3-.4 1.1-1 1.8.2 2.3.7"/></svg>',
		'arrow'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M14 7l5 5-5 5"/></svg>',
	);

	return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}

/**
 * Render the shared schedule and call action cards.
 *
 * @param string $schedule_label Schedule action label.
 */
function capehart_custom_render_services_actions( $schedule_label = 'Schedule HVAC service' ) {
	?>
	<div class="ch-services-actions" role="group" aria-label="Service contact options">
		<a class="ch-services-action ch-services-action--primary ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">
			<span class="ch-services-action__icon"><?php echo capehart_custom_services_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span class="ch-services-action__copy">
				<strong><?php echo esc_html( $schedule_label ); ?></strong>
				<small>Open online booking</small>
			</span>
			<span class="ch-services-action__arrow"><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
		<a class="ch-services-action ch-services-action--secondary" href="tel:+19187711218">
			<span class="ch-services-action__icon"><?php echo capehart_custom_services_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span class="ch-services-action__copy">
				<strong>Call Capehart</strong>
				<small>(918) 771-1218</small>
			</span>
			<span class="ch-services-action__arrow"><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
	</div>
	<?php
}

/**
 * Render the complete services hub.
 */
function capehart_custom_render_services_page() {
	$data       = capehart_custom_services_page_data();
	$categories = capehart_custom_services_categories();
	$faqs       = capehart_custom_services_faqs();
	?>
	<div class="ch-services-page">
		<section class="ch-services-hero" aria-labelledby="services-page-title">
			<div class="ch-services-shell ch-services-hero__grid">
				<div class="ch-services-hero__copy">
					<p class="ch-services-kicker">Kiefer-based HVAC service · Greater Tulsa</p>
					<h1 id="services-page-title"><?php echo esc_html( $data['h1'] ); ?></h1>
					<p class="ch-services-hero__lead">Choose the service path that matches what is happening now—an active heating or cooling problem, planned maintenance, an equipment decision, or dryer vent cleaning. Each page below gives you a clear next step.</p>
					<?php capehart_custom_render_services_actions(); ?>
					<ul class="ch-services-hero__proof" aria-label="Capehart service facts">
						<li>Kiefer-based local team</li>
						<li>Serving Greater Tulsa homeowners</li>
						<li>Online and phone scheduling</li>
					</ul>
				</div>

				<aside class="ch-services-router" aria-labelledby="services-router-title">
					<p class="ch-services-router__kicker">Choose a starting point</p>
					<h2 id="services-router-title">What needs attention?</h2>
					<div class="ch-services-router__links">
						<?php foreach ( $categories as $index => $category ) : ?>
							<a href="<?php echo esc_url( $category['url'] ); ?>">
								<span class="ch-services-router__number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<span class="ch-services-router__icon ch-services-router__icon--<?php echo esc_attr( $category['key'] ); ?>"><?php echo capehart_custom_services_icon( $category['key'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
								<span class="ch-services-router__copy">
									<strong><?php echo esc_html( $category['short_name'] ); ?></strong>
									<small><?php echo esc_html( $category['description'] ); ?></small>
								</span>
								<span class="ch-services-router__arrow"><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				</aside>
			</div>
		</section>

		<nav class="ch-services-jumpnav" aria-label="Services page sections">
			<div class="ch-services-shell">
				<span>On this page</span>
				<a href="#service-directory">Service directory</a>
				<a href="#choose-a-service">Choose by situation</a>
				<a href="#service-area">Service area</a>
				<a href="#services-faq">Questions</a>
			</div>
		</nav>

		<section id="service-directory" class="ch-services-section ch-services-directory" aria-labelledby="service-directory-title">
			<div class="ch-services-shell">
				<div class="ch-services-heading">
					<p class="ch-services-kicker">Service directory</p>
					<h2 id="service-directory-title">Heating, cooling and dryer vent services</h2>
					<p>Start with the broad service hub when you want an overview. If you already know the type of appointment you need, use the direct repair, maintenance, installation or replacement links.</p>
				</div>

				<div class="ch-services-catalog">
					<article class="ch-services-catalog-card ch-services-catalog-card--cooling">
						<div class="ch-services-catalog-card__top">
							<span class="ch-services-catalog-card__icon"><?php echo capehart_custom_services_icon( 'cooling' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
							<p>Cooling</p>
						</div>
						<h3>Air conditioning services</h3>
						<p>Get help with a cooling problem, plan seasonal care, or compare installation and replacement paths for your home.</p>
						<a class="ch-services-primary-link" href="<?php echo esc_url( home_url( '/air-conditioning/' ) ); ?>">Explore all air conditioning services <span><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
						<ul class="ch-services-link-list">
							<li><a href="<?php echo esc_url( home_url( '/ac-repair-kiefer-ok/' ) ); ?>"><strong>AC repair in Kiefer</strong><small>Cooling problems near Capehart's home base</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/ac-repair-tulsa-ok/' ) ); ?>"><strong>AC repair in Tulsa</strong><small>Repair information for Tulsa homeowners</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/air-conditioning-maintenance/' ) ); ?>"><strong>AC maintenance</strong><small>Seasonal care for a working system</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/ac-installation-tulsa-ok/' ) ); ?>"><strong>AC installation</strong><small>Plan a new cooling system</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/air-conditioning-replacement/' ) ); ?>"><strong>AC replacement</strong><small>Compare the current system and next option</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/emergency-ac-repair/' ) ); ?>"><strong>Urgent AC problems</strong><small>Safety-first guidance and contact options</small></a></li>
						</ul>
					</article>

					<article class="ch-services-catalog-card ch-services-catalog-card--heating">
						<div class="ch-services-catalog-card__top">
							<span class="ch-services-catalog-card__icon"><?php echo capehart_custom_services_icon( 'heating' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
							<p>Heating</p>
						</div>
						<h3>Heating and furnace services</h3>
						<p>Start with repair for an active comfort problem, choose maintenance for planned seasonal care, or begin a replacement evaluation.</p>
						<a class="ch-services-primary-link" href="<?php echo esc_url( home_url( '/heating/' ) ); ?>">Explore all heating services <span><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
						<ul class="ch-services-link-list">
							<li><a href="<?php echo esc_url( home_url( '/furnace-repair/' ) ); ?>"><strong>Furnace repair</strong><small>Diagnosis for no heat or changed operation</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/furnace-maintenance/' ) ); ?>"><strong>Furnace maintenance</strong><small>Planned care for normally operating equipment</small></a></li>
							<li><a href="<?php echo esc_url( home_url( '/furnace-replacement/' ) ); ?>"><strong>Furnace replacement</strong><small>Evaluate an aging or repeatedly repaired system</small></a></li>
							<li><a class="ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog"><strong>Schedule heating service</strong><small>Open the full online booking form</small></a></li>
						</ul>
					</article>

					<article class="ch-services-catalog-card ch-services-catalog-card--dryer">
						<div class="ch-services-catalog-card__dryer-copy">
							<div class="ch-services-catalog-card__top">
								<span class="ch-services-catalog-card__icon"><?php echo capehart_custom_services_icon( 'dryer' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
								<p>Additional home service</p>
							</div>
							<h3>Dryer vent cleaning</h3>
							<p>Choose this service when the request concerns the home's dryer vent rather than heating or air conditioning equipment.</p>
						</div>
						<a class="ch-services-primary-link" href="<?php echo esc_url( home_url( '/dryer-vent-cleaning-tulsa/' ) ); ?>">View dryer vent cleaning <span><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
					</article>
				</div>
			</div>
		</section>

		<section id="choose-a-service" class="ch-services-section ch-services-decision" aria-labelledby="choose-service-title">
			<div class="ch-services-shell">
				<div class="ch-services-heading ch-services-heading--light">
					<p class="ch-services-kicker">Start with the situation</p>
					<h2 id="choose-service-title">Which HVAC service should you choose?</h2>
					<p>You do not need to diagnose the equipment first. Choose the description closest to what is happening, then share the exact symptom when you schedule.</p>
				</div>
				<div class="ch-services-decision-grid">
					<article>
						<span>01</span>
						<p class="ch-services-decision-card__label">Active problem</p>
						<h3>Heating or cooling performance has changed</h3>
						<p>Start with repair when the home is not heating or cooling normally, the equipment has stopped, or a new symptom needs professional diagnosis.</p>
						<div><a href="<?php echo esc_url( home_url( '/ac-repair-kiefer-ok/' ) ); ?>">AC repair</a><a href="<?php echo esc_url( home_url( '/furnace-repair/' ) ); ?>">Furnace repair</a></div>
					</article>
					<article>
						<span>02</span>
						<p class="ch-services-decision-card__label">Planned care</p>
						<h3>The system works and needs seasonal maintenance</h3>
						<p>Maintenance fits normally operating equipment when the goal is routine care and a structured review before a more demanding season.</p>
						<div><a href="<?php echo esc_url( home_url( '/air-conditioning-maintenance/' ) ); ?>">AC maintenance</a><a href="<?php echo esc_url( home_url( '/furnace-maintenance/' ) ); ?>">Furnace maintenance</a></div>
					</article>
					<article>
						<span>03</span>
						<p class="ch-services-decision-card__label">Equipment planning</p>
						<h3>Repair and replacement need to be compared</h3>
						<p>Begin an equipment evaluation when condition, repair history, comfort or future plans make the next decision larger than one component.</p>
						<div><a href="<?php echo esc_url( home_url( '/air-conditioning-replacement/' ) ); ?>">AC replacement</a><a href="<?php echo esc_url( home_url( '/furnace-replacement/' ) ); ?>">Furnace replacement</a></div>
					</article>
					<article>
						<span>04</span>
						<p class="ch-services-decision-card__label">Dryer vent</p>
						<h3>The request is about dryer airflow or the vent path</h3>
						<p>Dryer vent cleaning is separate from HVAC system service. Use its dedicated page to review the service and request an appointment.</p>
						<div><a href="<?php echo esc_url( home_url( '/dryer-vent-cleaning-tulsa/' ) ); ?>">Dryer vent cleaning</a></div>
					</article>
				</div>
				<aside class="ch-services-safety-note">
					<strong>Safety comes first.</strong>
					<p>If you see fire, visible smoke, sparking or immediate danger, move away from the equipment and contact emergency services before an HVAC provider.</p>
				</aside>
			</div>
		</section>

		<section id="service-area" class="ch-services-section ch-services-local" aria-labelledby="services-local-title">
			<div class="ch-services-shell ch-services-local__grid">
				<figure class="ch-services-local__photo">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capehart-team.webp' ) ); ?>" width="1091" height="1600" loading="lazy" decoding="async" alt="Capehart Heating and Cooling team members in Kiefer, Oklahoma">
					<figcaption><strong>Kiefer, Oklahoma</strong><span>Home base for Capehart Heating & Cooling</span></figcaption>
				</figure>
				<div class="ch-services-local__copy">
					<p class="ch-services-kicker">Local service, clearly positioned</p>
					<h2 id="services-local-title">Based in Kiefer and serving homeowners throughout Greater Tulsa</h2>
					<p>Capehart Heating & Cooling has one clear home base in Kiefer, Oklahoma. The team helps homeowners across the Greater Tulsa area with the published heating, cooling and dryer vent services listed on this page.</p>
					<p>Service coverage and appointment availability can depend on the property address and request. Include the address when booking online or calling so the team can confirm the right service path.</p>
					<div class="ch-services-local__facts" aria-label="Local service facts">
						<div><strong>Kiefer, OK</strong><span>Company home base</span></div>
						<div><strong>Greater Tulsa</strong><span>Residential service area</span></div>
						<div><strong>3 categories</strong><span>Cooling, heating and dryer vent</span></div>
					</div>
					<a class="ch-services-text-link" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">Meet the Capehart team <span><?php echo capehart_custom_services_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span></a>
				</div>
			</div>
		</section>

		<section class="ch-services-section ch-services-process" aria-labelledby="services-process-title">
			<div class="ch-services-shell">
				<div class="ch-services-heading ch-services-heading--center">
					<p class="ch-services-kicker">A simple way to begin</p>
					<h2 id="services-process-title">From service need to appointment request</h2>
					<p>A useful request starts with the property and symptom—not a homeowner diagnosis.</p>
				</div>
				<ol class="ch-services-process__steps">
					<li><span>01</span><div><h3>Choose the closest service</h3><p>Pick cooling, heating or dryer vent cleaning, then select the repair, maintenance or equipment path when applicable.</p></div></li>
					<li><span>02</span><div><h3>Share the practical details</h3><p>Provide the service address, what changed, when it began and any equipment information that is easy to read safely.</p></div></li>
					<li><span>03</span><div><h3>Schedule online or call</h3><p>Use the booking form to see current service options, or call Capehart when you need help choosing the most sensible starting point.</p></div></li>
				</ol>
			</div>
		</section>

		<section id="services-faq" class="ch-services-section ch-services-faq" aria-labelledby="services-faq-title">
			<div class="ch-services-shell ch-services-faq__grid">
				<div class="ch-services-heading">
					<p class="ch-services-kicker">Service questions</p>
					<h2 id="services-faq-title">Answers before you schedule</h2>
					<p>Use these answers to choose a starting point. The individual service pages provide more detail about each request type.</p>
				</div>
				<div class="ch-services-faq__list">
					<?php foreach ( $faqs as $index => $faq ) : ?>
						<details<?php echo 0 === $index ? ' open' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="ch-services-faq__item">
							<summary><?php echo esc_html( $faq['question'] ); ?></summary>
							<div><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="ch-services-final-cta" aria-labelledby="services-final-title">
			<div class="ch-services-shell ch-services-final-cta__grid">
				<div>
					<p class="ch-services-kicker">Ready for the next step?</p>
					<h2 id="services-final-title">Choose a service or tell Capehart what is happening</h2>
					<p>Share the property address, the equipment or vent involved and the symptom. You can start with the full online booking form or speak with the team by phone.</p>
				</div>
				<?php capehart_custom_render_services_actions( 'Schedule service' ); ?>
			</div>
		</section>
	</div>
	<?php
}

/**
 * Shortcode callback for the exact services page template.
 *
 * @return string
 */
function capehart_custom_services_page_shortcode() {
	if ( ! is_page( 'services' ) ) {
		return '';
	}

	ob_start();
	capehart_custom_render_services_page();

	return (string) ob_get_clean();
}
add_shortcode( 'capehart_services_page', 'capehart_custom_services_page_shortcode' );

/**
 * Add page-specific body classes.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function capehart_custom_services_body_classes( $classes ) {
	if ( is_page( 'services' ) ) {
		$classes[] = 'ch-services-hub';
	}

	return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'capehart_custom_services_body_classes', 20 );

/**
 * Remove legacy Spectra assets tied only to the hidden database content.
 */
function capehart_custom_services_dequeue_legacy_assets() {
	if ( ! is_page( 'services' ) ) {
		return;
	}

	$page_id = get_queried_object_id();

	foreach ( array( 'spectra-pro-block-css', 'uagb-block-positioning-css', 'uag-style-' . $page_id ) as $handle ) {
		wp_dequeue_style( $handle );
	}

	foreach ( array( 'uagb-loop-builder', 'uagb-block-positioning-js', 'uagb-forms-js', 'uag-script-' . $page_id ) as $handle ) {
		wp_dequeue_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_services_dequeue_legacy_assets', 100 );

/**
 * Apply the authored title to Yoast outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_services_seo_title( $title ) {
	if ( is_page( 'services' ) ) {
		return capehart_custom_services_page_data()['title'];
	}

	return $title;
}
add_filter( 'wpseo_title', 'capehart_custom_services_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_services_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_services_seo_title', 20 );

/**
 * Apply the authored description to Yoast outputs.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_services_seo_description( $description ) {
	if ( is_page( 'services' ) ) {
		return capehart_custom_services_page_data()['meta'];
	}

	return $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_services_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_services_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_services_seo_description', 20 );

/**
 * Use the real team image for social previews.
 *
 * @param string $image Existing image URL.
 * @return string
 */
function capehart_custom_services_social_image( $image ) {
	if ( is_page( 'services' ) ) {
		return get_theme_file_uri( 'assets/images/capehart-team.webp' );
	}

	return $image;
}
add_filter( 'wpseo_opengraph_image', 'capehart_custom_services_social_image', 20 );
add_filter( 'wpseo_twitter_image', 'capehart_custom_services_social_image', 20 );

/**
 * Provide a core title when Yoast is unavailable.
 *
 * @param array<string, string> $parts Existing document-title parts.
 * @return array<string, string>
 */
function capehart_custom_services_document_title( $parts ) {
	if ( is_page( 'services' ) && ! defined( 'WPSEO_VERSION' ) ) {
		$parts['title'] = capehart_custom_services_page_data()['title'];
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_services_document_title', 20 );

/**
 * Print meta and social fallbacks when Yoast is unavailable.
 */
function capehart_custom_services_meta_fallback() {
	if ( ! is_page( 'services' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$data  = capehart_custom_services_page_data();
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
add_action( 'wp_head', 'capehart_custom_services_meta_fallback', 5 );

/**
 * Build the visible service-directory ItemList entity.
 *
 * @return array<string, mixed>
 */
function capehart_custom_services_item_list_schema() {
	$page_url     = trailingslashit( get_permalink( get_queried_object_id() ) );
	$provider_id  = trailingslashit( home_url( '/' ) ) . '#organization';
	$list_items   = array();
	$area_served  = array(
		array(
			'@type' => 'City',
			'name'  => 'Kiefer, Oklahoma',
		),
		array(
			'@type' => 'AdministrativeArea',
			'name'  => 'Greater Tulsa, Oklahoma',
		),
	);

	foreach ( capehart_custom_services_categories() as $index => $category ) {
		$service_url = trailingslashit( $category['url'] );
		$list_items[] = array(
			'@type'    => 'ListItem',
			'position' => $index + 1,
			'item'     => array(
				'@type'       => 'Service',
				'@id'         => $service_url . '#service',
				'name'        => $category['name'],
				'description' => $category['description'],
				'url'         => $service_url,
				'serviceType' => $category['name'],
				'provider'    => array(
					'@id'  => $provider_id,
					'name' => 'Capehart Heating & Cooling',
				),
				'areaServed'  => $area_served,
			),
		);
	}

	return array(
		'@type'           => 'ItemList',
		'@id'             => $page_url . '#service-directory',
		'name'            => 'Capehart residential service directory',
		'url'             => $page_url . '#service-directory',
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
function capehart_custom_services_faq_schema() {
	$page_url  = trailingslashit( get_permalink( get_queried_object_id() ) );
	$questions = array();

	foreach ( capehart_custom_services_faqs() as $faq ) {
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
		'@id'        => $page_url . '#services-faq',
		'name'       => 'Capehart HVAC service questions',
		'url'        => $page_url . '#services-faq',
		'inLanguage' => 'en-US',
		'isPartOf'   => array( '@id' => $page_url ),
		'mainEntity' => $questions,
	);
}

/**
 * Add the service directory and FAQ entities to Yoast's graph.
 *
 * @param array<int, array<string, mixed>> $graph Existing graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_services_schema_graph( $graph ) {
	if ( ! is_page( 'services' ) || ! is_array( $graph ) ) {
		return $graph;
	}

	$has_item_list = false;
	$has_faq       = false;

	foreach ( $graph as $piece ) {
		$types = isset( $piece['@type'] ) ? (array) $piece['@type'] : array();

		if ( in_array( 'ItemList', $types, true ) ) {
			$has_item_list = true;
		}

		if ( in_array( 'FAQPage', $types, true ) ) {
			$has_faq = true;
		}
	}

	if ( ! $has_item_list ) {
		$graph[] = capehart_custom_services_item_list_schema();
	}

	if ( ! $has_faq ) {
		$graph[] = capehart_custom_services_faq_schema();
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_services_schema_graph', 20 );

/**
 * Print equivalent schema when Yoast is unavailable.
 */
function capehart_custom_services_schema_fallback() {
	if ( ! is_page( 'services' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$page_url = trailingslashit( get_permalink( get_queried_object_id() ) );
	$data     = capehart_custom_services_page_data();
	$schema   = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'       => array( 'WebPage', 'CollectionPage' ),
				'@id'         => $page_url,
				'url'         => $page_url,
				'name'        => $data['title'],
				'description' => $data['meta'],
				'inLanguage'  => 'en-US',
				'mainEntity'  => array( '@id' => $page_url . '#service-directory' ),
			),
			capehart_custom_services_item_list_schema(),
			capehart_custom_services_faq_schema(),
		),
	);

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
add_action( 'wp_head', 'capehart_custom_services_schema_fallback', 20 );
