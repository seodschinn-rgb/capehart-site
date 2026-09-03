<?php
/**
 * Repository-owned dryer vent cleaning service page.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the authored SEO fields for the dryer vent service page.
 *
 * @return array<string, string>
 */
function capehart_custom_dryer_page_data() {
	return array(
		'title'        => 'Dryer Vent Cleaning in Tulsa, OK | Capehart',
		'meta'         => 'Clothes taking longer to dry? Capehart provides dryer vent cleaning for Kiefer and Greater Tulsa homes. See warning signs, cost factors and book service.',
		'h1'           => 'Professional Dryer Vent Cleaning in Tulsa, OK',
		'breadcrumb'   => 'Dryer Vent Cleaning Tulsa',
		'service_type' => 'Residential dryer vent cleaning',
	);
}

/**
 * Return the repository-owned dryer vent service image.
 *
 * @return string
 */
function capehart_custom_dryer_image_url() {
	return get_theme_file_uri( 'assets/images/dryer-vent-cleaning-service-hero.webp' );
}

/**
 * Return visible FAQ copy used by both the page and its schema.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_dryer_faqs() {
	return array(
		array(
			'question' => 'How do I know whether my dryer vent needs cleaning?',
			'answer'   => 'Common warning signs include loads taking longer than usual, clothing or the dryer becoming unusually hot, weak airflow at the exterior hood, visible lint near the termination, or a Check Vent or AF message. These symptoms can also involve the appliance, so continued problems after vent service may require an appliance technician.',
		),
		array(
			'question' => 'How often should a dryer vent be cleaned?',
			'answer'   => 'An annual whole-vent check and cleaning is a practical baseline for many homes. The dryer manufacturer\'s instructions, laundry volume, vent length, number of turns and any warning signs can justify earlier attention. The lint screen should be cleaned every time the dryer is used.',
		),
		array(
			'question' => 'What affects dryer vent cleaning cost in Tulsa?',
			'answer'   => 'The quote can depend on the vent length and number of turns, access behind the dryer and at the exterior termination, whether the vent exits through a wall or roof, the amount and type of obstruction, and whether damaged ducting or another issue needs separate work. Capehart confirms the appropriate scope for the home instead of publishing a one-size-fits-all price.',
		),
		array(
			'question' => 'Can I clean my dryer vent myself?',
			'answer'   => 'Homeowners can clean the lint screen and visually check an accessible exterior hood while following the dryer manual. Long, concealed, multi-turn, upper-story or rooftop runs are harder to evaluate safely. Stop and request professional help when the vent is inaccessible, damaged, persistently restricted or connected to a gas dryer that may need to be moved or disconnected.',
		),
		array(
			'question' => 'Is dryer vent cleaning the same as HVAC air-duct cleaning?',
			'answer'   => 'No. For a vented clothes dryer, the exhaust duct carries heat, moisture and lint to the outdoors. HVAC ducts distribute conditioned air through the home. Dryer vent cleaning is a separate service with a different purpose and vent path.',
		),
		array(
			'question' => 'What should I do if I smell burning or see smoke near the dryer?',
			'answer'   => 'Stop using the dryer. If there is smoke, fire, sparking or immediate danger, move everyone to safety and call 911. Do not restart the appliance to test it. A gas odor also requires leaving the area and contacting emergency services or the gas utility from a safe location.',
		),
		array(
			'question' => 'Does Capehart provide dryer vent cleaning outside Tulsa?',
			'answer'   => 'Capehart Heating & Cooling is based in Kiefer and serves homeowners throughout the Greater Tulsa area. Share the property address when booking so the team can confirm current coverage and appointment availability.',
		),
	);
}

/**
 * Return a compact set of service-area names for visible copy and schema.
 *
 * @return string[]
 */
function capehart_custom_dryer_service_areas() {
	return array(
		'Kiefer',
		'Tulsa',
		'Broken Arrow',
		'Bixby',
		'Jenks',
		'Glenpool',
		'Sapulpa',
		'Sand Springs',
		'Owasso',
	);
}

/**
 * Return one decorative icon.
 *
 * @param string $icon Icon key.
 * @return string
 */
function capehart_custom_dryer_icon( $icon ) {
	$icons = array(
		'dryer'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M7 6h2M12 6h5"/><circle cx="12" cy="14" r="4.5"/><path d="M9.2 13c1.1-1 2.2.6 3.3-.4 1.1-1 1.8.2 2.3.7"/></svg>',
		'clock'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="8.5"/><path d="M12 7v5l3.5 2"/></svg>',
		'heat'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 20c-2-1.6-3-3.7-3-6.1 0-2.6 1.5-5.1 3.8-7.1-.2 2.1.8 3.3 2 4.2.5-2.7 2.2-4.8 4.8-7 0 3.3 3.4 5.2 3.4 9.5 0 3.2-2 5.7-5.1 6.5 1.2-1.2 1.7-2.6 1.3-4.1-.4-1.3-1.3-2.1-2.1-3.1-.2 2.2-1.6 3.2-2.1 4.3-.4.9-.3 1.9.2 2.9H8Z"/></svg>',
		'airflow' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 8h10.5a2.5 2.5 0 1 0-2.2-3.7M3 12h15.5a2.5 2.5 0 1 1-2.2 3.7M3 16h7"/></svg>',
		'alert'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 3 2.8 20h18.4L12 3Z"/><path d="M12 9v5M12 17.3v.2"/></svg>',
		'eye'     => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M2.7 12s3.4-5.5 9.3-5.5 9.3 5.5 9.3 5.5-3.4 5.5-9.3 5.5S2.7 12 2.7 12Z"/><circle cx="12" cy="12" r="2.4"/></svg>',
		'check'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m5 12.5 4.2 4.2L19 7"/></svg>',
		'quote'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 4.5h14v15H5zM8 8h8M8 12h8M8 16h4"/></svg>',
		'calendar'=> '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="m9 15 2 2 4-5"/></svg>',
		'phone'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8.2 4.2 10 8.4 7.8 9.8a15.3 15.3 0 0 0 6.4 6.4l1.4-2.2 4.2 1.8v2.7a1.5 1.5 0 0 1-1.5 1.5A14.3 14.3 0 0 1 4 5.7a1.5 1.5 0 0 1 1.5-1.5h2.7Z"/></svg>',
		'arrow'   => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M14 7l5 5-5 5"/></svg>',
		'home'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m3 11 9-7 9 7M5.5 10v10h13V10M9 20v-6h6v6"/></svg>',
	);

	return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}

/**
 * Render the schedule and call action cards.
 *
 * @param string $schedule_label Schedule action label.
 */
function capehart_custom_render_dryer_actions( $schedule_label = 'Schedule dryer vent cleaning' ) {
	?>
	<div class="ch-dryer-actions" role="group" aria-label="Dryer vent service contact options">
		<a class="ch-dryer-action ch-dryer-action--primary ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">
			<span class="ch-dryer-action__icon"><?php echo capehart_custom_dryer_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span><strong><?php echo esc_html( $schedule_label ); ?></strong><small>Open online booking</small></span>
			<span class="ch-dryer-action__arrow"><?php echo capehart_custom_dryer_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
		<a class="ch-dryer-action ch-dryer-action--secondary" href="tel:+19187711218">
			<span class="ch-dryer-action__icon"><?php echo capehart_custom_dryer_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
			<span><strong>Call Capehart</strong><small>(918) 771-1218</small></span>
			<span class="ch-dryer-action__arrow"><?php echo capehart_custom_dryer_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
		</a>
	</div>
	<?php
}

/**
 * Render the complete dryer vent cleaning service page.
 */
function capehart_custom_render_dryer_page() {
	$data       = capehart_custom_dryer_page_data();
	$faqs       = capehart_custom_dryer_faqs();
	$hero_image = capehart_custom_dryer_image_url();
	?>
	<div class="ch-dryer-page">
		<section class="ch-dryer-hero" aria-labelledby="dryer-page-title">
			<div class="ch-dryer-shell ch-dryer-hero__grid">
				<div class="ch-dryer-hero__copy">
					<p class="ch-dryer-kicker"><span></span> Kiefer-based home service · Greater Tulsa</p>
					<h1 id="dryer-page-title"><?php echo esc_html( $data['h1'] ); ?></h1>
					<p class="ch-dryer-hero__lead">When loads need extra cycles, the dryer runs hotter than usual, or airflow at the exterior hood feels weak, the exhaust path deserves attention. Capehart provides professional dryer vent cleaning for homes in Kiefer and throughout the Greater Tulsa area.</p>
					<?php capehart_custom_render_dryer_actions(); ?>
					<ul class="ch-dryer-hero__proof" aria-label="Capehart dryer vent service facts">
						<li><?php echo capehart_custom_dryer_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?> Residential dryer vent service</li>
						<li><?php echo capehart_custom_dryer_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?> Direct online booking</li>
						<li><?php echo capehart_custom_dryer_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?> Kiefer-based local team</li>
					</ul>
				</div>

				<div class="ch-dryer-hero__visual">
					<figure>
						<img src="<?php echo esc_url( $hero_image ); ?>" width="1672" height="941" loading="eager" fetchpriority="high" decoding="async" alt="Technician cleaning a residential dryer vent in a laundry room">
					</figure>
					<div class="ch-dryer-hero__signal">
						<span><?php echo capehart_custom_dryer_icon( 'airflow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
						<div><small>Start with the symptom</small><strong>Long dry times · excess heat · weak airflow</strong></div>
					</div>
				</div>
			</div>
		</section>

		<nav class="ch-dryer-jumpnav" aria-label="Dryer vent cleaning page sections">
			<div class="ch-dryer-shell">
				<span>On this page</span>
				<a href="#dryer-signs">Warning signs</a>
				<a href="#dryer-service">The service</a>
				<a href="#dryer-cost">Cost factors</a>
				<a href="#dryer-upkeep">DIY or professional?</a>
				<a href="#dryer-faq">FAQs</a>
			</div>
		</nav>

		<section id="dryer-signs" class="ch-dryer-section ch-dryer-signs" aria-labelledby="dryer-signs-title">
			<div class="ch-dryer-shell">
				<div class="ch-dryer-heading ch-dryer-heading--split">
					<div><p class="ch-dryer-kicker">Know when airflow may be restricted</p><h2 id="dryer-signs-title">Signs your dryer vent may need cleaning</h2></div>
					<p>A vent restriction is one possible cause—not a remote diagnosis. If the warning signs continue after the vent has been addressed, the dryer itself may need appliance service.</p>
				</div>

				<div class="ch-dryer-sign-grid">
					<article><span><?php echo capehart_custom_dryer_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>01</p><h3>Loads take longer</h3><p>A normal load needs an extra cycle or stays damp after the usual program.</p></article>
					<article><span><?php echo capehart_custom_dryer_icon( 'heat' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>02</p><h3>Unusual heat builds up</h3><p>Clothing, the dryer cabinet, or the laundry area feels hotter than it normally does.</p></article>
					<article><span><?php echo capehart_custom_dryer_icon( 'airflow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>03</p><h3>Exterior airflow is weak</h3><p>The accessible outside hood barely opens or airflow appears reduced while the dryer runs.</p></article>
					<article><span><?php echo capehart_custom_dryer_icon( 'eye' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><p>04</p><h3>A warning is visible</h3><p>The dryer shows a Check Vent or AF message, or lint is collecting near the exterior termination.</p></article>
				</div>

				<aside class="ch-dryer-safety" aria-label="Dryer emergency safety guidance">
					<span class="ch-dryer-safety__icon"><?php echo capehart_custom_dryer_icon( 'alert' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span>
					<div><p class="ch-dryer-kicker">Stop before troubleshooting</p><h3>Smoke, fire, sparking, a strong burning odor, or a gas smell changes the next step.</h3><p>Stop using the dryer. For smoke, fire, sparking, gas odor, or immediate danger, move everyone to safety and call 911 or the gas utility from a safe location. Do not restart the appliance to test it.</p></div>
				</aside>
			</div>
		</section>

		<section id="dryer-service" class="ch-dryer-section ch-dryer-service" aria-labelledby="dryer-service-title">
			<div class="ch-dryer-shell ch-dryer-service__grid">
				<div class="ch-dryer-service__intro">
					<p class="ch-dryer-kicker">A service built around the actual vent</p>
					<h2 id="dryer-service-title">What to expect from professional dryer vent cleaning</h2>
					<p>Vent routes differ from home to home. Access, length, turns, termination location, and the type of obstruction all affect the appropriate work. Capehart confirms the cleaning scope after reviewing accessible conditions instead of assuming every vent is identical.</p>
					<div class="ch-dryer-service__fact"><strong>Important scope note</strong><p>If damaged ducting, a reroute, appliance repair, or work outside the cleaning scope is found, the next step is discussed separately. Cleaning is not presented as a cure for every dryer symptom.</p></div>
				</div>

				<ol class="ch-dryer-process">
					<li><span>01</span><div><h3>Describe the home and symptom</h3><p>Share the property address, dryer type, where the vent exits, and what changed during normal use.</p></div></li>
					<li><span>02</span><div><h3>Confirm accessible conditions and scope</h3><p>Before work begins, the team reviews which connections, route sections, and termination points can be safely serviced.</p></div></li>
					<li><span>03</span><div><h3>Clear the agreed vent run</h3><p>The cleaning approach is matched to the accessible layout and the lint or debris found in the serviceable vent path.</p></div></li>
					<li><span>04</span><div><h3>Confirm the practical next step</h3><p>Visible concerns and continued symptoms are explained so you know whether cleaning is complete or separate work should be considered.</p></div></li>
				</ol>
			</div>
		</section>

		<section class="ch-dryer-section ch-dryer-why" aria-labelledby="dryer-why-title">
			<div class="ch-dryer-shell">
				<div class="ch-dryer-heading ch-dryer-heading--center ch-dryer-heading--light">
					<p class="ch-dryer-kicker">Why the vent path matters</p>
					<h2 id="dryer-why-title">A clearer exhaust path supports safer, more predictable drying</h2>
					<p>Good maintenance cannot eliminate every appliance or fire risk, but it addresses a documented and preventable source of restriction.</p>
				</div>

				<div class="ch-dryer-why__grid">
					<article class="ch-dryer-why__stat"><strong>31%</strong><h3>Failure to clean was the leading factor recorded</h3><p>U.S. Fire Administration data for residential clothes-dryer fires from 2018–2020 identified failure to clean as the leading contributing factor. That finding supports regular lint-screen care and whole-vent maintenance; it does not mean cleaning removes every possible fire cause.</p><small>Source: U.S. Fire Administration, 2018–2020</small></article>
					<article><span><?php echo capehart_custom_dryer_icon( 'airflow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>Restore the intended airflow path</h3><p>Lint, a crushed transition connection, excessive turns, or a restricted exterior hood can interfere with a vented dryer exhausting heat and moisture outdoors.</p></article>
					<article><span><?php echo capehart_custom_dryer_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>Address avoidable extra cycles</h3><p>Longer drying time is a practical warning sign. Clearing a restricted vent may help, while persistent symptoms point toward appliance service or another condition.</p></article>
					<article><span><?php echo capehart_custom_dryer_icon( 'home' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><h3>Keep separate systems separate</h3><p>The dryer exhaust is not part of the home\'s heating and cooling ductwork. Dryer vent cleaning and HVAC air-duct work are different services.</p></article>
				</div>
			</div>
		</section>

		<section id="dryer-cost" class="ch-dryer-section ch-dryer-cost" aria-labelledby="dryer-cost-title">
			<div class="ch-dryer-shell ch-dryer-cost__grid">
				<div class="ch-dryer-cost__copy">
					<p class="ch-dryer-kicker">A useful quote starts with the layout</p>
					<h2 id="dryer-cost-title">What affects dryer vent cleaning cost in Tulsa?</h2>
					<p>There is no honest one-price answer for every home. A short, accessible wall run is different from a concealed route with several turns or a rooftop termination. Capehart uses the property and vent details to identify the right scope.</p>
					<?php capehart_custom_render_dryer_actions( 'Request dryer vent service' ); ?>
				</div>

				<div class="ch-dryer-cost__factors" aria-label="Dryer vent cleaning quote factors">
					<article><span>01</span><div><h3>Length and turns</h3><p>Longer routes and multiple changes in direction can require a different cleaning approach.</p></div></article>
					<article><span>02</span><div><h3>Access points</h3><p>Access behind the dryer and at a ground-level wall, upper wall, or roof termination changes the work.</p></div></article>
					<article><span>03</span><div><h3>Restriction found</h3><p>Loose lint, compacted buildup, nesting material, or another obstruction can affect scope.</p></div></article>
					<article><span>04</span><div><h3>Work beyond cleaning</h3><p>Damaged ducting, rerouting, termination repair, or appliance problems are separate from routine cleaning.</p></div></article>
				</div>
			</div>
		</section>

		<section id="dryer-upkeep" class="ch-dryer-section ch-dryer-upkeep" aria-labelledby="dryer-upkeep-title">
			<div class="ch-dryer-shell">
				<div class="ch-dryer-heading ch-dryer-heading--center">
					<p class="ch-dryer-kicker">The right level of maintenance</p>
					<h2 id="dryer-upkeep-title">Routine homeowner upkeep or professional service?</h2>
					<p>Keep the everyday tasks simple and leave difficult access, gas connections, damaged venting, and persistent restrictions to qualified help.</p>
				</div>

				<div class="ch-dryer-upkeep__grid">
					<article class="ch-dryer-upkeep__card ch-dryer-upkeep__card--home">
						<div class="ch-dryer-upkeep__top"><span><?php echo capehart_custom_dryer_icon( 'home' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><div><small>Routine care</small><h3>Reasonable homeowner checks</h3></div></div>
						<ul><li>Clean the lint screen every time the dryer is used.</li><li>Follow the exact dryer manufacturer\'s maintenance instructions.</li><li>From a safe, accessible location, look for visible lint or a hood that does not move freely.</li><li>Notice changes in drying time, heat, alerts, or exterior airflow.</li></ul>
						<a class="ch-dryer-text-link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Compare Capehart home services <?php echo capehart_custom_dryer_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></a>
					</article>

					<article class="ch-dryer-upkeep__card ch-dryer-upkeep__card--pro">
						<div class="ch-dryer-upkeep__top"><span><?php echo capehart_custom_dryer_icon( 'quote' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></span><div><small>Professional path</small><h3>Good reasons to schedule service</h3></div></div>
						<ul><li>Warning signs persist or return after routine lint-screen care.</li><li>The route is long, concealed, has several turns, or exits above safe ground-level reach.</li><li>The visible connection is crushed, damaged, disconnected, or cannot be accessed safely.</li><li>A gas dryer would need to be moved or disconnected, or the correct next step is unclear.</li></ul>
						<a class="ch-dryer-text-link ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">Schedule professional dryer vent cleaning <?php echo capehart_custom_dryer_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></a>
					</article>
				</div>
			</div>
		</section>

		<section class="ch-dryer-section ch-dryer-local" aria-labelledby="dryer-local-title">
			<div class="ch-dryer-shell ch-dryer-local__grid">
				<figure class="ch-dryer-local__photo">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capehart-team.webp' ) ); ?>" width="1091" height="1600" loading="lazy" decoding="async" alt="Capehart Heating and Cooling team members in Kiefer, Oklahoma">
					<figcaption><strong>Kiefer, Oklahoma</strong><span>Home base for Capehart Heating & Cooling</span></figcaption>
				</figure>
				<div class="ch-dryer-local__copy">
					<p class="ch-dryer-kicker">Local service with a clear home base</p>
					<h2 id="dryer-local-title">Kiefer-based dryer vent service for Greater Tulsa homes</h2>
					<p>Capehart Heating & Cooling is based in Kiefer and helps homeowners throughout the Greater Tulsa area. Share the service address, where the dryer is located, and where the vent appears to exit so the team can confirm coverage and the most useful appointment path.</p>
					<ul class="ch-dryer-local__areas" aria-label="Selected dryer vent service areas">
						<?php foreach ( capehart_custom_dryer_service_areas() as $area ) : ?>
							<li><?php echo esc_html( $area ); ?></li>
						<?php endforeach; ?>
					</ul>
					<a class="ch-dryer-text-link" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">Meet Bailey and Brock Capehart <?php echo capehart_custom_dryer_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></a>
				</div>
			</div>
		</section>

		<section id="dryer-faq" class="ch-dryer-section ch-dryer-faq" aria-labelledby="dryer-faq-title">
			<div class="ch-dryer-shell ch-dryer-faq__grid">
				<div class="ch-dryer-heading">
					<p class="ch-dryer-kicker">Questions before you schedule</p>
					<h2 id="dryer-faq-title">Dryer vent cleaning FAQs</h2>
					<p>These answers cover the most common service, cost, safety, and maintenance questions from Tulsa-area homeowners.</p>
				</div>
				<div class="ch-dryer-faq__list">
					<?php foreach ( $faqs as $index => $faq ) : ?>
						<details<?php echo 0 === $index ? ' open' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="ch-dryer-faq__item">
							<summary><?php echo esc_html( $faq['question'] ); ?><span aria-hidden="true"></span></summary>
							<div><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="ch-dryer-final" aria-labelledby="dryer-final-title">
			<div class="ch-dryer-shell ch-dryer-final__grid">
				<div><p class="ch-dryer-kicker">Ready for a clearer next step?</p><h2 id="dryer-final-title">Tell Capehart what your dryer and vent are doing</h2><p>Share the property address, the dryer type, where the vent exits, and the warning signs you have noticed. Start online or call the Kiefer-based team.</p></div>
				<?php capehart_custom_render_dryer_actions(); ?>
			</div>
		</section>
	</div>
	<?php
}

/**
 * Shortcode callback for the exact dryer vent service page template.
 *
 * @return string
 */
function capehart_custom_dryer_page_shortcode() {
	if ( ! is_page( 'dryer-vent-cleaning-tulsa' ) ) {
		return '';
	}

	ob_start();
	capehart_custom_render_dryer_page();

	return (string) ob_get_clean();
}
add_shortcode( 'capehart_dryer_vent_page', 'capehart_custom_dryer_page_shortcode' );

/**
 * Add stable page styling hooks.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function capehart_custom_dryer_body_classes( $classes ) {
	if ( is_page( 'dryer-vent-cleaning-tulsa' ) ) {
		$classes[] = 'ch-dryer-vent-service-page';
	}

	return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'capehart_custom_dryer_body_classes', 20 );

/**
 * Remove legacy Spectra assets that the repository-owned template does not use.
 */
function capehart_custom_dryer_dequeue_legacy_assets() {
	if ( ! is_page( 'dryer-vent-cleaning-tulsa' ) ) {
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
add_action( 'wp_enqueue_scripts', 'capehart_custom_dryer_dequeue_legacy_assets', 100 );

/**
 * Apply the authored title to Yoast outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_dryer_seo_title( $title ) {
	if ( is_page( 'dryer-vent-cleaning-tulsa' ) ) {
		return capehart_custom_dryer_page_data()['title'];
	}

	return $title;
}
add_filter( 'wpseo_title', 'capehart_custom_dryer_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_dryer_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_dryer_seo_title', 20 );

/**
 * Apply the authored description to Yoast outputs.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_dryer_seo_description( $description ) {
	if ( is_page( 'dryer-vent-cleaning-tulsa' ) ) {
		return capehart_custom_dryer_page_data()['meta'];
	}

	return $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_dryer_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_dryer_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_dryer_seo_description', 20 );

/**
 * Use the repository-owned service image for social previews.
 *
 * @param string $image Existing image URL.
 * @return string
 */
function capehart_custom_dryer_social_image( $image ) {
	if ( ! is_page( 'dryer-vent-cleaning-tulsa' ) ) {
		return $image;
	}

	return capehart_custom_dryer_image_url();
}
add_filter( 'wpseo_opengraph_image', 'capehart_custom_dryer_social_image', 20 );
add_filter( 'wpseo_twitter_image', 'capehart_custom_dryer_social_image', 20 );

/**
 * Provide a core title when Yoast is unavailable.
 *
 * @param array<string, string> $parts Existing document-title parts.
 * @return array<string, string>
 */
function capehart_custom_dryer_document_title( $parts ) {
	if ( is_page( 'dryer-vent-cleaning-tulsa' ) && ! defined( 'WPSEO_VERSION' ) ) {
		$parts['title'] = capehart_custom_dryer_page_data()['title'];
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_dryer_document_title', 20 );

/**
 * Print metadata fallbacks when Yoast is unavailable.
 */
function capehart_custom_dryer_meta_fallback() {
	if ( ! is_page( 'dryer-vent-cleaning-tulsa' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$data  = capehart_custom_dryer_page_data();
	$url   = get_permalink( get_queried_object_id() );
	$image = capehart_custom_dryer_image_url();
	?>
	<meta name="description" content="<?php echo esc_attr( $data['meta'] ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $data['title'] ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $data['meta'] ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<?php if ( $image ) : ?><meta property="og:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $data['title'] ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $data['meta'] ); ?>">
	<?php if ( $image ) : ?><meta name="twitter:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<?php
}
add_action( 'wp_head', 'capehart_custom_dryer_meta_fallback', 5 );

/**
 * Build the Service entity for the dryer vent page.
 *
 * @return array<string, mixed>
 */
function capehart_custom_dryer_service_schema() {
	$data        = capehart_custom_dryer_page_data();
	$page_url    = trailingslashit( get_permalink( get_queried_object_id() ) );
	$provider_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$area_served = array();

	foreach ( capehart_custom_dryer_service_areas() as $area ) {
		$area_served[] = array(
			'@type' => 'City',
			'name'  => $area . ', Oklahoma',
		);
	}

	return array(
		'@type'            => 'Service',
		'@id'              => $page_url . '#service',
		'name'             => 'Residential Dryer Vent Cleaning in Greater Tulsa',
		'description'      => $data['meta'],
		'url'              => $page_url,
		'serviceType'      => $data['service_type'],
		'provider'         => array(
			'@type'    => 'HVACBusiness',
			'@id'       => $provider_id,
			'name'      => 'Capehart Heating & Cooling',
			'telephone' => '+1-918-771-1218',
		),
		'areaServed'       => $area_served,
		'mainEntityOfPage' => array( '@id' => $page_url ),
	);
}

/**
 * Build FAQ schema from the exact visible answers.
 *
 * @return array<string, mixed>
 */
function capehart_custom_dryer_faq_schema() {
	$page_url  = trailingslashit( get_permalink( get_queried_object_id() ) );
	$questions = array();

	foreach ( capehart_custom_dryer_faqs() as $faq ) {
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
		'@id'        => $page_url . '#dryer-faq',
		'name'       => 'Dryer vent cleaning questions',
		'url'        => $page_url . '#dryer-faq',
		'inLanguage' => 'en-US',
		'isPartOf'   => array( '@id' => $page_url ),
		'mainEntity' => $questions,
	);
}

/**
 * Add Service and FAQ entities to Yoast's graph without duplicates.
 *
 * @param array<int, array<string, mixed>> $graph Existing graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_dryer_schema_graph( $graph ) {
	if ( ! is_page( 'dryer-vent-cleaning-tulsa' ) || ! is_array( $graph ) ) {
		return $graph;
	}

	$data        = capehart_custom_dryer_page_data();
	$service     = capehart_custom_dryer_service_schema();
	$faq         = capehart_custom_dryer_faq_schema();
	$provider_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$has_service = false;
	$has_faq     = false;

	foreach ( $graph as &$piece ) {
		if ( ! is_array( $piece ) ) {
			continue;
		}

		$types = isset( $piece['@type'] ) ? (array) $piece['@type'] : array();

		if ( in_array( 'WebPage', $types, true ) ) {
			$piece['mainEntity'] = array( '@id' => $service['@id'] );
		}

		if ( in_array( 'BreadcrumbList', $types, true ) && ! empty( $piece['itemListElement'] ) && is_array( $piece['itemListElement'] ) ) {
			$last_index = array_key_last( $piece['itemListElement'] );
			if ( null !== $last_index && is_array( $piece['itemListElement'][ $last_index ] ) ) {
				$piece['itemListElement'][ $last_index ]['name'] = $data['breadcrumb'];
			}
		}

		if ( isset( $piece['@id'] ) && $piece['@id'] === $provider_id && in_array( 'Organization', $types, true ) && ! in_array( 'HVACBusiness', $types, true ) ) {
			$piece['@type'] = array_values( array_unique( array_merge( $types, array( 'HVACBusiness' ) ) ) );
		}

		if ( ! $has_service && in_array( 'Service', $types, true ) ) {
			foreach ( $service as $key => $value ) {
				$piece[ $key ] = $value;
			}
			$has_service = true;
		}

		if ( ! $has_faq && in_array( 'FAQPage', $types, true ) ) {
			foreach ( $faq as $key => $value ) {
				$piece[ $key ] = $value;
			}
			$has_faq = true;
		}
	}
	unset( $piece );

	if ( ! $has_service ) {
		$graph[] = $service;
	}

	if ( ! $has_faq ) {
		$graph[] = $faq;
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_dryer_schema_graph', 20 );

/**
 * Print equivalent schema when Yoast is unavailable.
 */
function capehart_custom_dryer_schema_fallback() {
	if ( ! is_page( 'dryer-vent-cleaning-tulsa' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			capehart_custom_dryer_service_schema(),
			capehart_custom_dryer_faq_schema(),
		),
	);

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
add_action( 'wp_head', 'capehart_custom_dryer_schema_fallback', 20 );
