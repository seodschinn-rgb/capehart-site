<?php
/**
 * Cooling-cluster page renderer and search metadata.
 *
 * The seven cooling URLs use dedicated FSE slug templates containing the
 * [capehart_cooling_page] shortcode. Keeping the renderer in PHP lets the
 * repository own each page layout while preserving selected long-form WordPress
 * content exactly as it is stored in the database.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the page slugs that form the cooling service cluster.
 *
 * @return string[]
 */
function capehart_custom_cooling_slugs() {
	return array(
		'air-conditioning',
		'ac-repair-kiefer-ok',
		'ac-repair-tulsa-ok',
		'air-conditioning-maintenance',
		'ac-installation-tulsa-ok',
		'air-conditioning-replacement',
		'emergency-ac-repair',
	);
}

/**
 * Return the current cooling page slug, or an empty string off-cluster.
 *
 * @return string
 */
function capehart_custom_cooling_current_slug() {
	if ( ! is_singular( 'page' ) ) {
		return '';
	}

	$page_id = get_queried_object_id();
	$slug    = $page_id ? (string) get_post_field( 'post_name', $page_id ) : '';

	return in_array( $slug, capehart_custom_cooling_slugs(), true ) ? $slug : '';
}

/**
 * Return page-specific copy and SEO values for the cooling cluster.
 *
 * @param string $slug Cooling page slug.
 * @return array<string, mixed>
 */
function capehart_custom_cooling_page_data( $slug ) {
	$pages = array(
		'air-conditioning' => array(
			'title'        => 'Air Conditioning Services Kiefer, OK | Capehart',
			'h1'           => 'Air Conditioning Services for Kiefer and Greater Tulsa',
			'meta'         => 'Explore AC repair, maintenance, installation and replacement from Kiefer-based Capehart, serving homeowners across the Greater Tulsa area.',
			'eyebrow'      => 'Kiefer-based cooling service',
			'lead'         => 'Start with the service that matches what your air conditioner is doing now. Capehart serves homeowners in Kiefer and communities throughout the Greater Tulsa area.',
			'service_type' => 'Residential air conditioning services',
		),
		'ac-repair-kiefer-ok' => array(
			'title'        => 'AC Repair Kiefer, OK | Capehart Heating & Cooling',
			'h1'           => 'AC Repair for Kiefer, Oklahoma Homeowners',
			'meta'         => 'Need AC repair in Kiefer, OK? Capehart diagnoses cooling problems and helps homeowners choose a practical repair or replacement path.',
			'eyebrow'      => 'Local air conditioner troubleshooting',
			'lead'         => 'When your home is not cooling normally, the first step is a clear evaluation of the symptoms and system condition. Capehart is based in Kiefer and helps local homeowners understand the practical next step.',
			'service_type' => 'Residential air conditioning repair in Kiefer, Oklahoma',
			'snapshot'     => array(
				'Kiefer-based residential service',
				'Troubleshooting guided by the system symptoms',
				'Repair-versus-replacement guidance when needed',
			),
		),
		'ac-repair-tulsa-ok' => array(
			'title'        => 'AC Repair Tulsa, OK | Capehart Heating & Cooling',
			'h1'           => 'AC Repair for Tulsa, Oklahoma Homeowners',
			'meta'         => 'Schedule AC repair for a Tulsa-area home with Capehart. Learn common warning signs, repair options and what to share before your visit.',
			'eyebrow'      => 'Residential cooling repair',
			'lead'         => 'Cooling problems can look similar while having very different causes, so useful repair work begins with diagnosis. Capehart serves Tulsa-area homeowners from its Kiefer base.',
			'service_type' => 'Residential air conditioning repair in Tulsa, Oklahoma',
			'snapshot'     => array(
				'Residential service across the Tulsa area',
				'Diagnosis based on symptoms and system condition',
				'Online scheduling or direct phone contact',
			),
		),
		'air-conditioning-maintenance' => array(
			'title'        => 'AC Maintenance in Greater Tulsa | Capehart Heating & Cooling',
			'h1'           => 'Air Conditioning Maintenance for Kiefer and Greater Tulsa',
			'meta'         => 'Plan air conditioning maintenance for a Kiefer or Greater Tulsa home. See what seasonal service covers and when to schedule an evaluation.',
			'eyebrow'      => 'Seasonal cooling care',
			'lead'         => 'Maintenance is intended for an air conditioner that is operating and needs seasonal attention. Capehart helps Kiefer and Greater Tulsa homeowners review system condition before peak cooling demand.',
			'service_type' => 'Residential air conditioning maintenance in Greater Tulsa',
			'snapshot'     => array(
				'For systems that are currently operating',
				'Seasonal inspection and care',
				'Findings explained before next-step decisions',
			),
		),
		'ac-installation-tulsa-ok' => array(
			'title'        => 'AC Installation Tulsa, OK | Capehart Heating & Cooling',
			'h1'           => 'Air Conditioning Installation for Tulsa-Area Properties',
			'meta'         => 'Plan an AC installation for a Tulsa-area property with Capehart. Compare system types, sizing factors and the professional installation process.',
			'eyebrow'      => 'New cooling system planning',
			'lead'         => 'A successful installation starts with the property, comfort priorities and equipment requirements rather than a one-size-fits-all recommendation. Capehart works with Tulsa-area property owners on a clear installation path.',
			'service_type' => 'Air conditioning installation in the Tulsa, Oklahoma area',
			'snapshot'     => array(
				'Planning for Tulsa-area properties',
				'Sizing and home-condition factors considered',
				'Replacement and new-installation pathways',
			),
		),
		'air-conditioning-replacement' => array(
			'title'        => 'AC Replacement Tulsa, OK | Capehart Heating & Cooling',
			'h1'           => 'Air Conditioner Replacement for Greater Tulsa Homes',
			'meta'         => 'Considering AC replacement in Greater Tulsa? Learn when replacement may make sense and what affects system selection for your home.',
			'eyebrow'      => 'Cooling equipment decisions',
			'lead'         => 'Replacement planning becomes useful when equipment condition, comfort, repair history or long-term priorities create a larger decision. Capehart helps Greater Tulsa homeowners compare that decision without assuming replacement is always the answer.',
			'service_type' => 'Residential air conditioner replacement in Greater Tulsa',
			'snapshot'     => array(
				'Current equipment and repair history reviewed',
				'Home needs guide system selection',
				'Installation planning after the decision',
			),
		),
		'emergency-ac-repair' => array(
			'title'        => 'Emergency AC Repair Tulsa, OK | Capehart',
			'h1'           => 'Emergency AC Repair for Kiefer and Greater Tulsa',
			'meta'         => 'AC stopped cooling or showing an urgent fault? Call Capehart for emergency AC repair in Kiefer and the Greater Tulsa area.',
			'eyebrow'      => 'Urgent cooling help',
			'lead'         => 'When a cooling failure cannot wait for a routine appointment, call Capehart and describe what the system is doing. The team can confirm current emergency service availability for Kiefer and the Greater Tulsa area.',
			'service_type' => 'Emergency air conditioning repair in Greater Tulsa',
			'snapshot'     => array(
				'Phone contact for urgent cooling problems',
				'Kiefer and Greater Tulsa service area',
				'Safety-first guidance for abnormal conditions',
			),
		),
	);

	return isset( $pages[ $slug ] ) ? $pages[ $slug ] : array();
}

/**
 * Return the verified service areas shared with the homepage schema.
 *
 * @return string[]
 */
function capehart_custom_cooling_service_areas() {
	if ( function_exists( 'capehart_custom_homepage_service_areas' ) ) {
		return capehart_custom_homepage_service_areas();
	}

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
		'Catoosa',
		'Mounds',
		'Kellyville',
		'Bristow',
		'Mannford',
	);
}

/**
 * Return the hub FAQs used for both visible copy and JSON-LD.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_cooling_hub_faqs() {
	return array(
		array(
			'question' => 'What air conditioning services does Capehart provide?',
			'answer'   => 'Capehart provides residential air conditioning repair, seasonal maintenance, installation planning, and replacement service. Choose the page that matches whether the system has an active fault, is operating and needs care, or is part of a larger equipment decision.',
		),
		array(
			'question' => 'Does Capehart serve Tulsa if the company is based in Kiefer?',
			'answer'   => 'Yes. Capehart is based in Kiefer and serves homeowners across the Greater Tulsa area, including Tulsa, Broken Arrow, Bixby, Jenks, Glenpool, Sapulpa, Sand Springs, Owasso, Catoosa, Mounds, Kellyville, Bristow, and Mannford.',
		),
		array(
			'question' => 'When should I schedule AC repair?',
			'answer'   => 'Request repair when the system is not cooling normally, stops running, cycles unusually, produces weak airflow, leaks water, freezes, or makes a new sound. Describe the symptom and when it began when you schedule.',
		),
		array(
			'question' => 'Is AC maintenance the same as AC repair?',
			'answer'   => 'No. Maintenance is intended for equipment that is currently operating and needs seasonal inspection and care. An active comfort problem or system fault belongs on the repair path so the cause can be evaluated.',
		),
		array(
			'question' => 'How do I decide between AC repair and replacement?',
			'answer'   => 'The decision depends on system condition, age, repair history, comfort performance, and the scope of the current problem. A professional evaluation can identify the immediate fault and give you better information before you compare repair with replacement.',
		),
		array(
			'question' => 'How much will air conditioning service cost?',
			'answer'   => 'Cost depends on the service requested, the equipment, the diagnosis, and any work the system needs. Capehart can evaluate the situation and explain the applicable next step; contact the team for current scheduling and pricing information.',
		),
	);
}

/**
 * Return FAQs for a generated child page.
 *
 * Child-page FAQs remain visible content. The hub is the only cooling URL that
 * receives FAQPage schema so the graph does not overstate the site-wide FAQ use.
 *
 * @param string $slug Cooling page slug.
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_cooling_child_faqs( $slug ) {
	$faqs = array(
		'air-conditioning-maintenance' => array(
			array(
				'question' => 'When should I plan air conditioning maintenance?',
				'answer'   => 'Many homeowners plan maintenance around the cooling season while the system is operating normally. Timing can also depend on equipment condition, use, and prior service history, so contact Capehart if you are unsure which appointment type fits.',
			),
			array(
				'question' => 'Can maintenance fix an air conditioner that is not cooling?',
				'answer'   => 'An active cooling problem should be scheduled as repair rather than routine maintenance. That gives the technician the right context to diagnose the fault instead of treating the visit as seasonal care.',
			),
			array(
				'question' => 'Does maintenance guarantee that an AC system will not break down?',
				'answer'   => 'No service can guarantee that equipment will never fail. Maintenance can document current condition and surface issues that deserve attention, but future operation still depends on the system and how it is used.',
			),
			array(
				'question' => 'What should I share before an AC maintenance appointment?',
				'answer'   => 'Share the service address, equipment type if known, any recent changes in comfort or sound, and the date of the last service if available. Do not remove panels or handle electrical or refrigerant components to gather information.',
			),
		),
		'air-conditioning-replacement' => array(
			array(
				'question' => 'When should I consider replacing an air conditioner?',
				'answer'   => 'Replacement may be worth evaluating when age, repeated repair needs, uneven comfort, equipment condition, or changing home needs create a bigger decision. An evaluation should still determine whether a practical repair path exists.',
			),
			array(
				'question' => 'Does an older AC system always need to be replaced?',
				'answer'   => 'No. Age is one factor, not a diagnosis. System condition, the current fault, repair history, comfort performance, and your plans for the property all matter when comparing repair and replacement.',
			),
			array(
				'question' => 'How is the right replacement AC size determined?',
				'answer'   => 'System selection should reflect the home and its cooling needs rather than automatically copying the old equipment size. Property characteristics, existing distribution, comfort concerns, and equipment compatibility can all affect the recommendation.',
			),
			array(
				'question' => 'Does Capehart provide AC replacement in Tulsa?',
				'answer'   => 'Yes. Capehart is based in Kiefer and provides air conditioner replacement planning for homeowners in Tulsa and the wider Greater Tulsa service area.',
			),
		),
		'emergency-ac-repair' => array(
			array(
				'question' => 'What counts as an emergency AC problem?',
				'answer'   => 'A complete loss of cooling during dangerous heat, electrical warning signs, smoke, a burning odor, or another condition that may affect household safety can require urgent attention. If there is fire, visible smoke, or immediate danger, leave the area and contact emergency services first.',
			),
			array(
				'question' => 'How do I request emergency AC repair from Capehart?',
				'answer'   => 'Call Capehart and explain the system symptoms and service address. The team can confirm current emergency service coverage and availability for Kiefer and the Greater Tulsa area.',
			),
			array(
				'question' => 'What should I do if the AC smells like it is burning?',
				'answer'   => 'Turn the system off if you can do so safely. Do not open equipment panels or touch damaged electrical components. If you see fire or smoke or believe anyone is in danger, leave the area and call emergency services before contacting an HVAC provider.',
			),
			array(
				'question' => 'Does an emergency cooling failure always mean replacement?',
				'answer'   => 'No. The immediate goal is to identify the fault and assess system condition. Repair may be possible, while replacement planning becomes relevant only when the findings and broader equipment history support that discussion.',
			),
		),
	);

	return isset( $faqs[ $slug ] ) ? $faqs[ $slug ] : array();
}

/**
 * Render the cooling-cluster subnavigation.
 *
 * @param string $current_slug Current page slug.
 */
function capehart_custom_render_cooling_subnav( $current_slug ) {
	$items = array(
		'air-conditioning'             => 'Overview',
		'ac-repair-kiefer-ok'           => 'Kiefer Repair',
		'ac-repair-tulsa-ok'            => 'Tulsa Repair',
		'air-conditioning-maintenance' => 'Maintenance',
		'ac-installation-tulsa-ok'      => 'Installation',
		'air-conditioning-replacement' => 'Replacement',
	);
	?>
	<nav class="ch-cooling-subnav" aria-label="Cooling services">
		<div class="ch-cooling-subnav__inner">
			<p class="ch-cooling-subnav__label">Cooling services</p>
			<ul class="ch-cooling-subnav__list">
				<?php foreach ( $items as $slug => $label ) : ?>
					<li>
						<a
							href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"
							<?php echo $current_slug === $slug ? 'aria-current="page"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						>
							<?php echo esc_html( $label ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</nav>
	<?php
}

/**
 * Render the shared schedule and call controls.
 *
 * @param string $schedule_label Schedule link label.
 * @param string $call_label     Phone link label.
 */
function capehart_custom_render_cooling_actions( $schedule_label = 'Schedule service', $call_label = 'Call (918) 771-1218' ) {
	?>
	<div class="ch-cooling-actions">
		<a class="ch-cooling-button ch-cooling-button--primary ch-booking-trigger" href="<?php echo esc_url( home_url( '/book-appointment/' ) ); ?>" aria-haspopup="dialog">
			<?php echo esc_html( $schedule_label ); ?>
		</a>
		<a class="ch-cooling-button ch-cooling-button--secondary" href="tel:+19187711218">
			<?php echo esc_html( $call_label ); ?>
		</a>
	</div>
	<?php
}

/**
 * Render a visible FAQ accordion.
 *
 * @param array<int, array{question: string, answer: string}> $faqs FAQs.
 * @param string                                               $id    Section ID.
 * @param string                                               $title Section heading.
 */
function capehart_custom_render_cooling_faqs( $faqs, $id, $title ) {
	if ( empty( $faqs ) ) {
		return;
	}
	?>
	<section id="<?php echo esc_attr( $id ); ?>" class="ch-cooling-section ch-cooling-faq" aria-labelledby="<?php echo esc_attr( $id ); ?>-title">
		<div class="ch-cooling-section__intro">
			<p class="ch-cooling-kicker">Clear answers</p>
			<h2 id="<?php echo esc_attr( $id ); ?>-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<div class="ch-cooling-faq__list">
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<details class="ch-cooling-faq__item"<?php echo 0 === $index ? ' open' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<summary><?php echo esc_html( $faq['question'] ); ?></summary>
					<div class="ch-cooling-faq__answer">
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</section>
	<?php
}

/**
 * Render the shared compact child-page hero.
 *
 * @param string               $slug Current page slug.
 * @param array<string, mixed> $page Page data.
 */
function capehart_custom_render_cooling_child_hero( $slug, $page ) {
	?>
	<section class="ch-cooling-hero ch-cooling-hero--child" aria-labelledby="ch-cooling-title">
		<div class="ch-cooling-container ch-cooling-hero__grid">
			<div class="ch-cooling-hero__copy">
				<p class="ch-cooling-kicker"><?php echo esc_html( $page['eyebrow'] ); ?></p>
				<h1 id="ch-cooling-title"><?php echo esc_html( $page['h1'] ); ?></h1>
				<p class="ch-cooling-hero__lead"><?php echo esc_html( $page['lead'] ); ?></p>
				<?php
				if ( 'emergency-ac-repair' === $slug ) {
					capehart_custom_render_cooling_actions( 'Schedule cooling service', 'Call (918) 771-1218' );
				} else {
					capehart_custom_render_cooling_actions();
				}
				?>
			</div>
			<aside class="ch-cooling-snapshot" aria-label="Service snapshot">
				<p class="ch-cooling-snapshot__eyebrow">Service snapshot</p>
				<h2>What this page helps you do</h2>
				<ul>
					<?php foreach ( $page['snapshot'] as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</aside>
		</div>
	</section>
	<?php
}

/**
 * Render the full cooling hub.
 */
function capehart_custom_render_cooling_hub() {
	$page = capehart_custom_cooling_page_data( 'air-conditioning' );
	?>
	<div class="ch-cooling-page-content ch-cooling-hub-layout">
		<section class="ch-cooling-hero ch-cooling-hero--hub" aria-labelledby="ch-cooling-title">
			<div class="ch-cooling-container ch-cooling-hero__grid">
				<div class="ch-cooling-hero__copy">
					<p class="ch-cooling-kicker"><?php echo esc_html( $page['eyebrow'] ); ?></p>
					<h1 id="ch-cooling-title"><?php echo esc_html( $page['h1'] ); ?></h1>
					<p class="ch-cooling-hero__lead"><?php echo esc_html( $page['lead'] ); ?></p>
					<?php capehart_custom_render_cooling_actions(); ?>
				</div>
				<aside class="ch-cooling-snapshot ch-cooling-snapshot--hub" aria-label="Cooling service guide">
					<p class="ch-cooling-snapshot__eyebrow">Choose by situation</p>
					<h2>A clear route to the right service</h2>
					<ol>
						<li><span>01</span><strong>Active problem</strong><small>Start with repair.</small></li>
						<li><span>02</span><strong>Working system</strong><small>Choose maintenance.</small></li>
						<li><span>03</span><strong>Equipment decision</strong><small>Compare installation or replacement.</small></li>
					</ol>
				</aside>
			</div>
		</section>

		<?php capehart_custom_render_cooling_subnav( 'air-conditioning' ); ?>

		<div class="ch-cooling-container ch-cooling-content-shell">
			<section class="ch-cooling-section ch-cooling-router" aria-labelledby="cooling-router-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Find your starting point</p>
					<h2 id="cooling-router-title">Choose the service that matches the situation</h2>
					<p>You do not need to diagnose the equipment before contacting Capehart. Use the system behavior and the decision you are facing to pick the most useful page.</p>
				</div>
				<div class="ch-cooling-router__grid">
					<article class="ch-cooling-route-card ch-cooling-route-card--repair">
						<p class="ch-cooling-route-card__number">01</p>
						<h3>Your system is not cooling</h3>
						<p>Start with a repair page when cooling is weak, inconsistent, noisy, leaking, frozen, or completely unavailable.</p>
						<div class="ch-cooling-route-card__links">
							<a href="<?php echo esc_url( home_url( '/ac-repair-kiefer-ok/' ) ); ?>">AC repair in Kiefer</a>
							<a href="<?php echo esc_url( home_url( '/ac-repair-tulsa-ok/' ) ); ?>">AC repair in Tulsa</a>
						</div>
					</article>
					<article class="ch-cooling-route-card">
						<p class="ch-cooling-route-card__number">02</p>
						<h3>Your system needs seasonal maintenance</h3>
						<p>Choose maintenance for equipment that is operating and needs seasonal inspection and care rather than fault diagnosis.</p>
						<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/air-conditioning-maintenance/' ) ); ?>">Explore AC maintenance</a>
					</article>
					<article class="ch-cooling-route-card">
						<p class="ch-cooling-route-card__number">03</p>
						<h3>You are planning a new system</h3>
						<p>Installation planning connects equipment options with the property, comfort priorities, and compatibility requirements.</p>
						<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/ac-installation-tulsa-ok/' ) ); ?>">Plan an AC installation</a>
					</article>
					<article class="ch-cooling-route-card">
						<p class="ch-cooling-route-card__number">04</p>
						<h3>You are replacing aging equipment</h3>
						<p>Replacement planning helps compare the current system, repair history, comfort needs, and the next equipment decision.</p>
						<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/air-conditioning-replacement/' ) ); ?>">Explore AC replacement</a>
					</article>
				</div>
			</section>

			<section class="ch-cooling-section ch-cooling-symptoms" aria-labelledby="cooling-symptoms-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Start with what you notice</p>
					<h2 id="cooling-symptoms-title">Cooling symptoms that deserve attention</h2>
					<p>A symptom does not identify the cause by itself. It does give the technician a better starting point when you describe where, when, and how often it occurs.</p>
				</div>
				<div class="ch-cooling-symptoms__grid">
					<article><h3>Warm air</h3><p>The system runs, but the air from the vents does not feel cool.</p></article>
					<article><h3>Weak airflow</h3><p>Some or all rooms receive less airflow than expected.</p></article>
					<article><h3>Frequent cycling</h3><p>The equipment starts and stops in a new or unusual pattern.</p></article>
					<article><h3>Water or ice</h3><p>Moisture appears near the system, or visible components begin to freeze.</p></article>
					<article><h3>New sounds or odors</h3><p>A sudden change in sound or smell can signal a condition that should be evaluated.</p></article>
					<article class="ch-cooling-symptoms__urgent"><h3>Cooling stops during extreme heat</h3><p>Call if the household needs urgent cooling help. <a href="<?php echo esc_url( home_url( '/emergency-ac-repair/' ) ); ?>">Review emergency AC repair</a>.</p></article>
				</div>
				<aside class="ch-cooling-safety-note">
					<strong>Safety first:</strong> If you see smoke, fire, sparking, or damaged electrical components, leave the equipment alone. Move away from immediate danger and contact emergency services when needed before calling an HVAC provider.
				</aside>
			</section>

			<section class="ch-cooling-section ch-cooling-decision" aria-labelledby="cooling-decision-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Repair, maintain, or replace</p>
					<h2 id="cooling-decision-title">Three services, three different starting conditions</h2>
				</div>
				<div class="ch-cooling-decision__grid">
					<article>
						<p class="ch-cooling-decision__label">Active fault</p>
						<h3>Choose repair</h3>
						<p>The system is not cooling normally, has stopped, or shows a new symptom. Diagnosis comes before the repair decision.</p>
					</article>
					<article>
						<p class="ch-cooling-decision__label">Operating equipment</p>
						<h3>Choose maintenance</h3>
						<p>The system is currently working and the goal is seasonal inspection, care, and a clearer view of present condition.</p>
					</article>
					<article>
						<p class="ch-cooling-decision__label">Larger equipment choice</p>
						<h3>Compare replacement</h3>
						<p>Age, condition, repair history, comfort, or property plans make the next equipment decision more important than a single fault.</p>
					</article>
				</div>
			</section>

			<section class="ch-cooling-section ch-cooling-area" aria-labelledby="cooling-area-title">
				<div class="ch-cooling-area__copy">
					<p class="ch-cooling-kicker">Local service area</p>
					<h2 id="cooling-area-title">Based in Kiefer, serving Greater Tulsa homeowners</h2>
					<p>Capehart provides residential cooling service from its Kiefer base across the verified communities below. Share the property address when scheduling so the team can confirm current coverage and availability.</p>
				</div>
				<ul class="ch-cooling-area__list" aria-label="Capehart cooling service areas">
					<?php foreach ( capehart_custom_cooling_service_areas() as $area ) : ?>
						<li><?php echo esc_html( $area ); ?></li>
					<?php endforeach; ?>
				</ul>
			</section>

			<?php capehart_custom_render_cooling_faqs( capehart_custom_cooling_hub_faqs(), 'cooling-faq', 'Air conditioning service questions' ); ?>

			<section class="ch-cooling-final-cta" aria-labelledby="cooling-final-cta-title">
				<div>
					<p class="ch-cooling-kicker">Ready for the next step?</p>
					<h2 id="cooling-final-cta-title">Tell Capehart what your cooling system is doing</h2>
					<p>Share the service address, the symptom or project, and when it began. You can schedule online or speak with the team by phone.</p>
				</div>
				<?php capehart_custom_render_cooling_actions(); ?>
			</section>
		</div>
	</div>
	<?php
}

/**
 * Render the complete maintenance article for the formerly empty page.
 */
function capehart_custom_render_cooling_maintenance() {
	$faqs = capehart_custom_cooling_child_faqs( 'air-conditioning-maintenance' );
	?>
	<article class="ch-cooling-article ch-cooling-article--generated">
		<section class="ch-cooling-intro-panel" aria-labelledby="maintenance-purpose-title">
			<p class="ch-cooling-kicker">Seasonal service, clearly defined</p>
			<h2 id="maintenance-purpose-title">What air conditioning maintenance is designed to do</h2>
			<p>Maintenance gives you a structured look at a working cooling system before an active fault becomes the reason for the appointment. The focus is present condition, routine care, and useful information about anything that may deserve further attention.</p>
		</section>

		<section class="ch-cooling-section" aria-labelledby="maintenance-fit-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Pick the right appointment</p>
				<h2 id="maintenance-fit-title">Maintenance fits a working system; repair fits an active problem</h2>
			</div>
			<div class="ch-cooling-comparison">
				<article>
					<p class="ch-cooling-decision__label">Choose maintenance when</p>
					<h3>The system is cooling normally</h3>
					<ul>
						<li>You are planning seasonal care.</li>
						<li>You want the current condition reviewed.</li>
						<li>There is no known comfort failure to diagnose.</li>
					</ul>
				</article>
				<article>
					<p class="ch-cooling-decision__label">Choose repair when</p>
					<h3>Something has changed</h3>
					<ul>
						<li>The home is not cooling normally.</li>
						<li>Airflow, cycling, sound, or moisture has changed.</li>
						<li>The system has stopped or shows a fault.</li>
					</ul>
				</article>
			</div>
		</section>

		<section class="ch-cooling-section" aria-labelledby="maintenance-focus-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">A practical system review</p>
				<h2 id="maintenance-focus-title">Areas a maintenance visit may evaluate</h2>
				<p>The exact scope should match the equipment and current service offering. A cooling maintenance visit commonly centers on the following system-level questions.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Operating condition</h3><p>Is the equipment starting, running, and shutting down in a normal pattern during the visit?</p></article>
				<article><h3>Air movement</h3><p>Are accessible airflow-related conditions or visible restrictions affecting system operation?</p></article>
				<article><h3>Electrical condition</h3><p>Do accessible components show conditions that warrant attention by a qualified technician?</p></article>
				<article><h3>Outdoor equipment</h3><p>Is the accessible outdoor unit clear enough for evaluation and routine care?</p></article>
				<article><h3>Drainage and moisture</h3><p>Are there visible moisture or drainage conditions that should be documented?</p></article>
				<article><h3>Observed findings</h3><p>Does anything discovered support a separate repair conversation or continued monitoring?</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="maintenance-prepare-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Before the appointment</p>
				<h2 id="maintenance-prepare-title">How to prepare without opening the equipment</h2>
			</div>
			<ol>
				<li><span>01</span><div><h3>Share the property and system basics</h3><p>Provide the service address, system type if known, and the date of prior service when available.</p></div></li>
				<li><span>02</span><div><h3>Note recent comfort changes</h3><p>Mention changes in sound, cycling, airflow, moisture, or room-to-room comfort even if the system still runs.</p></div></li>
				<li><span>03</span><div><h3>Keep access reasonably clear</h3><p>Make sure the thermostat and accessible indoor and outdoor equipment can be reached. Do not remove panels or handle electrical or refrigerant components.</p></div></li>
			</ol>
		</section>

		<section class="ch-cooling-section ch-cooling-local-note" aria-labelledby="maintenance-local-title">
			<div>
				<p class="ch-cooling-kicker">Kiefer and Greater Tulsa</p>
				<h2 id="maintenance-local-title">Seasonal AC care for the local cooling season</h2>
				<p>Capehart is based in Kiefer and serves homeowners in Tulsa and surrounding communities. Contact the team with the service address to confirm current coverage and appointment availability.</p>
			</div>
			<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/air-conditioning/' ) ); ?>">View all cooling services</a>
		</section>

		<?php capehart_custom_render_cooling_faqs( $faqs, 'maintenance-faq', 'AC maintenance questions' ); ?>

		<section class="ch-cooling-final-cta" aria-labelledby="maintenance-cta-title">
			<div>
				<p class="ch-cooling-kicker">Plan seasonal service</p>
				<h2 id="maintenance-cta-title">Schedule AC maintenance with Capehart</h2>
				<p>If the system is operating normally, choose maintenance. If it is not cooling or shows an active fault, describe that problem and request repair instead.</p>
			</div>
			<?php capehart_custom_render_cooling_actions( 'Schedule AC maintenance' ); ?>
		</section>
	</article>
	<?php
}

/**
 * Render the complete replacement article for the formerly empty page.
 */
function capehart_custom_render_cooling_replacement() {
	$faqs = capehart_custom_cooling_child_faqs( 'air-conditioning-replacement' );
	?>
	<article class="ch-cooling-article ch-cooling-article--generated">
		<section class="ch-cooling-intro-panel" aria-labelledby="replacement-purpose-title">
			<p class="ch-cooling-kicker">A considered equipment decision</p>
			<h2 id="replacement-purpose-title">AC replacement should begin with the home and the current system</h2>
			<p>Replacement is not simply a newer version of the same box. A useful plan considers what the existing equipment is doing, how the home feels, which problems have repeated, and what the next system needs to accomplish.</p>
		</section>

		<section class="ch-cooling-section" aria-labelledby="replacement-signs-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">When to evaluate the option</p>
				<h2 id="replacement-signs-title">Reasons replacement may enter the conversation</h2>
				<p>No single item automatically determines the answer. These factors become more useful when considered together.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Repair history</h3><p>Repeated faults can change how the next repair compares with a longer-term equipment plan.</p></article>
				<article><h3>Current condition</h3><p>The immediate diagnosis and overall system condition help define whether a practical repair path remains.</p></article>
				<article><h3>Uneven comfort</h3><p>Persistent room-to-room differences may deserve a broader look at equipment and distribution rather than a size assumption.</p></article>
				<article><h3>Changing home needs</h3><p>Renovations, household use, or comfort priorities can affect what the next cooling system should support.</p></article>
				<article><h3>Equipment compatibility</h3><p>Indoor, outdoor, control, electrical, and distribution requirements need to work together as a system.</p></article>
				<article><h3>Ownership plans</h3><p>Your expected time in the home and priorities for the property belong in the decision.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section" aria-labelledby="replacement-compare-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Repair or replace</p>
				<h2 id="replacement-compare-title">Compare the immediate fix with the larger plan</h2>
			</div>
			<div class="ch-cooling-comparison">
				<article>
					<p class="ch-cooling-decision__label">Repair can remain practical when</p>
					<h3>The problem is defined and the system still fits the home</h3>
					<p>A repair evaluation may identify a contained fault while the equipment condition, comfort, and repair history still support continued use.</p>
				</article>
				<article>
					<p class="ch-cooling-decision__label">Replacement deserves evaluation when</p>
					<h3>The decision extends beyond one component</h3>
					<p>Condition, repeated faults, comfort concerns, compatibility, or property plans can make a system-level comparison more useful.</p>
				</article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="replacement-process-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">From evaluation to plan</p>
				<h2 id="replacement-process-title">A practical AC replacement planning sequence</h2>
			</div>
			<ol>
				<li><span>01</span><div><h3>Describe the current problem</h3><p>Share comfort concerns, repair history, equipment information if known, and what has changed.</p></div></li>
				<li><span>02</span><div><h3>Evaluate the home and system</h3><p>The current equipment, property characteristics, existing distribution, and compatibility requirements inform the options.</p></div></li>
				<li><span>03</span><div><h3>Compare the paths</h3><p>Review whether repair remains practical and what a replacement would need to address.</p></div></li>
				<li><span>04</span><div><h3>Plan the installation</h3><p>Once a system path is selected, confirm the project scope and current scheduling details before work begins.</p></div></li>
			</ol>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band" aria-labelledby="replacement-sizing-title">
			<div>
				<p class="ch-cooling-kicker">System selection</p>
				<h2 id="replacement-sizing-title">Why the old equipment label is not the whole answer</h2>
			</div>
			<div>
				<p>Replacing equipment with the same nominal size does not by itself confirm that the next system fits the home. Property characteristics, existing ducts or distribution, equipment pairing, electrical requirements, and comfort goals can all influence selection.</p>
				<p>A professional assessment should connect those factors before a recommendation is finalized.</p>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-local-note" aria-labelledby="replacement-local-title">
			<div>
				<p class="ch-cooling-kicker">Greater Tulsa service area</p>
				<h2 id="replacement-local-title">Replacement planning from a Kiefer-based HVAC company</h2>
				<p>Capehart serves homeowners in Kiefer, Tulsa, Broken Arrow, Bixby, Jenks, Glenpool, Sapulpa, and other verified Greater Tulsa communities. Share the property address to confirm current coverage.</p>
			</div>
			<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/ac-installation-tulsa-ok/' ) ); ?>">Read the installation guide</a>
		</section>

		<?php capehart_custom_render_cooling_faqs( $faqs, 'replacement-faq', 'AC replacement questions' ); ?>

		<section class="ch-cooling-final-cta" aria-labelledby="replacement-cta-title">
			<div>
				<p class="ch-cooling-kicker">Compare the next step</p>
				<h2 id="replacement-cta-title">Plan an air conditioner evaluation</h2>
				<p>Tell Capehart what the current system is doing and why replacement is being considered. The evaluation can begin with the equipment, home, and decision in front of you.</p>
			</div>
			<?php capehart_custom_render_cooling_actions( 'Schedule an evaluation' ); ?>
		</section>
	</article>
	<?php
}

/**
 * Render safe, verified emergency service content in place of the legacy page.
 */
function capehart_custom_render_cooling_emergency() {
	$faqs = capehart_custom_cooling_child_faqs( 'emergency-ac-repair' );
	?>
	<article class="ch-cooling-article ch-cooling-article--generated ch-cooling-article--emergency">
		<section class="ch-cooling-intro-panel" aria-labelledby="emergency-start-title">
			<p class="ch-cooling-kicker">Urgent cooling contact</p>
			<h2 id="emergency-start-title">Start with safety, then describe the cooling problem</h2>
			<p>Call Capehart when an urgent air conditioning failure needs attention in Kiefer or the Greater Tulsa area. Explain the service address, what the system is doing, when the problem began, and whether you noticed smoke, burning odors, sparking, water, or ice.</p>
		</section>

		<section class="ch-cooling-section" aria-labelledby="emergency-conditions-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Urgent cooling situations</p>
				<h2 id="emergency-conditions-title">Problems that may need prompt professional attention</h2>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Complete loss of cooling</h3><p>The system stops providing cooling when household conditions make a routine appointment impractical.</p></article>
				<article><h3>Electrical warning signs</h3><p>Sparking, repeated electrical interruption, or damaged components should not be handled by the homeowner.</p></article>
				<article><h3>Smoke or burning odor</h3><p>Turn the system off if safe, move away from immediate danger, and contact emergency services first if there is fire or visible smoke.</p></article>
				<article><h3>Water near equipment</h3><p>Unexpected water can affect surrounding materials or electrical areas and should be described when you call.</p></article>
				<article><h3>Ice or abnormal operation</h3><p>Visible freezing, new loud sounds, or unusual cycling can indicate a fault that requires diagnosis.</p></article>
				<article><h3>Unsafe indoor heat</h3><p>Household health, age, and indoor conditions can make a cooling failure more urgent. Move vulnerable people to a safe environment when needed.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-safety-panel" aria-labelledby="emergency-safety-title">
			<div>
				<p class="ch-cooling-kicker">Before touching the system</p>
				<h2 id="emergency-safety-title">What you can do safely while arranging help</h2>
			</div>
			<ul>
				<li><strong>Use the thermostat or normal disconnect only if it is safe.</strong> Do not reach through water or approach visibly damaged electrical equipment.</li>
				<li><strong>Do not remove panels.</strong> Electrical, moving, and refrigerant components require qualified handling.</li>
				<li><strong>Protect people first.</strong> If indoor heat or equipment conditions put anyone at risk, move to a safe place and contact emergency services as appropriate.</li>
				<li><strong>Leave a frozen system alone.</strong> Do not chip ice or force the equipment to continue running.</li>
			</ul>
		</section>

		<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="emergency-call-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Make the call useful</p>
				<h2 id="emergency-call-title">Information to share for emergency AC repair</h2>
			</div>
			<ol>
				<li><span>01</span><div><h3>Give the service address</h3><p>Start with the city and property address so current service coverage can be confirmed.</p></div></li>
				<li><span>02</span><div><h3>Describe the symptom</h3><p>Explain whether the system stopped, runs without cooling, shows ice or water, or produced a new sound or odor.</p></div></li>
				<li><span>03</span><div><h3>Share the timeline</h3><p>Say when the issue began, whether it is constant, and what normal control changes you already tried.</p></div></li>
				<li><span>04</span><div><h3>Mention safety concerns first</h3><p>Report smoke, burning odors, sparking, water near electrical equipment, or vulnerable household conditions immediately.</p></div></li>
			</ol>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band" aria-labelledby="emergency-diagnosis-title">
			<div>
				<p class="ch-cooling-kicker">Diagnosis before assumptions</p>
				<h2 id="emergency-diagnosis-title">An urgent failure does not automatically mean replacement</h2>
			</div>
			<div>
				<p>The immediate task is to identify the fault and assess system condition. A contained repair may be possible; replacement planning belongs in the conversation only when the findings and broader equipment history support it.</p>
				<p><a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/air-conditioning-replacement/' ) ); ?>">Learn how replacement decisions are evaluated</a></p>
			</div>
		</section>

		<?php capehart_custom_render_cooling_faqs( $faqs, 'emergency-faq', 'Emergency AC repair questions' ); ?>

		<section class="ch-cooling-final-cta ch-cooling-final-cta--urgent" aria-labelledby="emergency-cta-title">
			<div>
				<p class="ch-cooling-kicker">Emergency cooling contact</p>
				<h2 id="emergency-cta-title">Call Capehart about an urgent cooling problem</h2>
				<p>Use emergency services first for fire, visible smoke, or immediate danger. For urgent HVAC help, call Capehart and describe the address, symptoms, and safety concerns.</p>
			</div>
			<?php capehart_custom_render_cooling_actions( 'Schedule cooling service', 'Call (918) 771-1218' ); ?>
		</section>
	</article>
	<?php
}

/**
 * Render one cooling child page.
 *
 * @param string $slug Current page slug.
 */
function capehart_custom_render_cooling_child( $slug ) {
	$page = capehart_custom_cooling_page_data( $slug );

	if ( empty( $page ) ) {
		return;
	}
	?>
	<div class="ch-cooling-page-content ch-cooling-child-layout">
		<?php capehart_custom_render_cooling_child_hero( $slug, $page ); ?>
		<?php capehart_custom_render_cooling_subnav( $slug ); ?>
		<div class="ch-cooling-container ch-cooling-content-shell">
			<?php
			if ( 'air-conditioning-maintenance' === $slug ) {
				capehart_custom_render_cooling_maintenance();
			} elseif ( 'air-conditioning-replacement' === $slug ) {
				capehart_custom_render_cooling_replacement();
			} elseif ( 'emergency-ac-repair' === $slug ) {
				capehart_custom_render_cooling_emergency();
			} else {
				$page_id     = get_queried_object_id();
				$raw_content = $page_id ? (string) get_post_field( 'post_content', $page_id ) : '';
				?>
				<article class="ch-cooling-article ch-cooling-article--legacy">
					<?php echo apply_filters( 'the_content', $raw_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</article>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}

/**
 * Render the cooling page selected by the current queried page slug.
 *
 * @return string
 */
function capehart_custom_cooling_page_shortcode() {
	static $rendering = false;

	if ( $rendering ) {
		return '';
	}

	$slug = capehart_custom_cooling_current_slug();

	if ( ! $slug ) {
		return '';
	}

	$rendering = true;
	ob_start();

	if ( 'air-conditioning' === $slug ) {
		capehart_custom_render_cooling_hub();
	} else {
		capehart_custom_render_cooling_child( $slug );
	}

	$output    = (string) ob_get_clean();
	$rendering = false;

	return $output;
}
add_shortcode( 'capehart_cooling_page', 'capehart_custom_cooling_page_shortcode' );

/**
 * Add stable styling hooks to each cooling page.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function capehart_custom_cooling_body_classes( $classes ) {
	$slug = capehart_custom_cooling_current_slug();

	if ( ! $slug ) {
		return $classes;
	}

	$classes[] = 'ch-cooling-page';
	$classes[] = 'air-conditioning' === $slug ? 'ch-cooling-hub' : 'ch-cooling-child';
	$classes[] = 'ch-cooling-' . sanitize_html_class( $slug );

	return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'capehart_custom_cooling_body_classes', 20 );

/**
 * Set the configured SEO title in Yoast outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_cooling_seo_title( $title ) {
	$page = capehart_custom_cooling_page_data( capehart_custom_cooling_current_slug() );

	return isset( $page['title'] ) ? $page['title'] : $title;
}
add_filter( 'wpseo_title', 'capehart_custom_cooling_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_cooling_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_cooling_seo_title', 20 );

/**
 * Set the configured SEO description in Yoast outputs.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_cooling_seo_description( $description ) {
	$page = capehart_custom_cooling_page_data( capehart_custom_cooling_current_slug() );

	return isset( $page['meta'] ) ? $page['meta'] : $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_cooling_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_cooling_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_cooling_seo_description', 20 );

/**
 * Provide document titles when Yoast SEO is not active.
 *
 * @param array<string, string> $parts Document title parts.
 * @return array<string, string>
 */
function capehart_custom_cooling_document_title( $parts ) {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return $parts;
	}

	$page = capehart_custom_cooling_page_data( capehart_custom_cooling_current_slug() );

	if ( isset( $page['title'] ) ) {
		$parts['title'] = $page['title'];
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_cooling_document_title', 20 );

/**
 * Print description and social metadata when Yoast SEO is unavailable.
 */
function capehart_custom_cooling_meta_fallback() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$page = capehart_custom_cooling_page_data( capehart_custom_cooling_current_slug() );

	if ( empty( $page ) ) {
		return;
	}

	$url = get_permalink( get_queried_object_id() );
	?>
	<meta name="description" content="<?php echo esc_attr( $page['meta'] ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $page['title'] ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $page['meta'] ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php echo esc_attr( $page['title'] ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $page['meta'] ); ?>">
	<?php
}
add_action( 'wp_head', 'capehart_custom_cooling_meta_fallback', 5 );

/**
 * Build the Service schema entity for one cooling page.
 *
 * @param string $slug Cooling page slug.
 * @return array<string, mixed>
 */
function capehart_custom_cooling_service_schema( $slug ) {
	$page = capehart_custom_cooling_page_data( $slug );

	if ( empty( $page ) ) {
		return array();
	}

	$page_url    = trailingslashit( get_permalink( get_queried_object_id() ) );
	$provider_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$area_served = array();

	foreach ( capehart_custom_cooling_service_areas() as $area ) {
		$area_served[] = array(
			'@type' => 'City',
			'name'  => $area . ', Oklahoma',
		);
	}

	return array(
		'@type'            => 'Service',
		'@id'              => $page_url . '#service',
		'name'             => $page['h1'],
		'description'      => $page['meta'],
		'url'              => $page_url,
		'serviceType'      => $page['service_type'],
		'provider'         => array(
			'@type'     => 'HVACBusiness',
			'@id'       => $provider_id,
			'name'      => 'Capehart Heating & Cooling',
			'telephone' => '+1-918-771-1218',
		),
		'areaServed'       => $area_served,
		'mainEntityOfPage' => array( '@id' => $page_url ),
	);
}

/**
 * Build the hub FAQPage entity from the same copy visitors can read.
 *
 * @return array<string, mixed>
 */
function capehart_custom_cooling_faq_schema() {
	$page_url   = trailingslashit( get_permalink( get_queried_object_id() ) );
	$questions  = array();

	foreach ( capehart_custom_cooling_hub_faqs() as $faq ) {
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
		'@id'        => $page_url . '#cooling-faq',
		'url'        => $page_url . '#cooling-faq',
		'name'       => 'Air conditioning service questions',
		'isPartOf'   => array( '@id' => $page_url ),
		'inLanguage' => 'en-US',
		'mainEntity' => $questions,
	);
}

/**
 * Add one Service node per cluster page and the matching hub FAQPage to Yoast.
 * Existing matching types are enriched instead of duplicated.
 *
 * @param array<int, array<string, mixed>> $graph Yoast schema graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_cooling_schema_graph( $graph ) {
	$slug = capehart_custom_cooling_current_slug();

	if ( ! $slug || ! is_array( $graph ) ) {
		return $graph;
	}

	$service     = capehart_custom_cooling_service_schema( $slug );
	$has_service = false;
	$has_faq     = false;

	foreach ( $graph as &$piece ) {
		if ( ! is_array( $piece ) ) {
			continue;
		}

		$types = isset( $piece['@type'] ) ? (array) $piece['@type'] : array();

		if ( ! $has_service && in_array( 'Service', $types, true ) ) {
			foreach ( $service as $key => $value ) {
				$piece[ $key ] = $value;
			}
			$has_service = true;
		}

		if ( 'air-conditioning' === $slug && ! $has_faq && in_array( 'FAQPage', $types, true ) ) {
			$faq = capehart_custom_cooling_faq_schema();
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

	if ( 'air-conditioning' === $slug && ! $has_faq ) {
		$graph[] = capehart_custom_cooling_faq_schema();
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_cooling_schema_graph', 20 );

/**
 * Print equivalent cooling schema when Yoast SEO is unavailable.
 */
function capehart_custom_cooling_schema_fallback() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$slug = capehart_custom_cooling_current_slug();

	if ( ! $slug ) {
		return;
	}

	$graph = array( capehart_custom_cooling_service_schema( $slug ) );

	if ( 'air-conditioning' === $slug ) {
		$graph[] = capehart_custom_cooling_faq_schema();
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
add_action( 'wp_head', 'capehart_custom_cooling_schema_fallback', 20 );
