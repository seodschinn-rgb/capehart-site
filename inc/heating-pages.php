<?php
/**
 * Heating-cluster page renderer and search metadata.
 *
 * The four heating URLs use dedicated FSE slug templates containing the
 * [capehart_heating_page] shortcode. The renderer deliberately reuses the
 * Cooling cluster's proven layout primitives while giving Heating its own
 * content, warmer visual accent, search intent, and structured data.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the page slugs that form the heating service cluster.
 *
 * @return string[]
 */
function capehart_custom_heating_slugs() {
	return array(
		'heating',
		'furnace-repair',
		'furnace-maintenance',
		'furnace-replacement',
	);
}

/**
 * Return the current heating page slug, or an empty string off-cluster.
 *
 * @return string
 */
function capehart_custom_heating_current_slug() {
	if ( ! is_singular( 'page' ) ) {
		return '';
	}

	$page_id = get_queried_object_id();
	$slug    = $page_id ? (string) get_post_field( 'post_name', $page_id ) : '';

	return in_array( $slug, capehart_custom_heating_slugs(), true ) ? $slug : '';
}

/**
 * Return page-specific copy, media, and SEO values for the heating cluster.
 *
 * @param string $slug Heating page slug.
 * @return array<string, mixed>
 */
function capehart_custom_heating_page_data( $slug ) {
	$pages = array(
		'heating' => array(
			'title'         => 'Heating Services in Kiefer & Greater Tulsa | Capehart',
			'h1'            => 'Heating Services for Kiefer and Greater Tulsa Homes',
			'meta'          => 'Explore furnace repair, maintenance and replacement from Kiefer-based Capehart Heating & Cooling, serving homeowners across the Greater Tulsa area in Oklahoma.',
			'eyebrow'       => 'Kiefer-based heating service',
			'lead'          => 'Choose the service that matches what your heating system is doing now. Capehart is based in Kiefer and serves homeowners throughout the Greater Tulsa area.',
			'service_type'  => 'Residential heating and furnace services',
			'image_id'      => 3144,
			'image_alt'     => 'Residential furnace and ductwork illustrating home heating service',
		),
		'furnace-repair' => array(
			'title'         => 'Furnace Repair in Kiefer & Greater Tulsa | Capehart',
			'h1'            => 'Furnace Repair for Kiefer and Greater Tulsa Homeowners',
			'meta'          => 'Furnace not heating, short cycling or making unusual noises? Capehart is based in Kiefer and provides furnace repair across the Greater Tulsa area in Oklahoma.',
			'eyebrow'       => 'Residential heating repair',
			'lead'          => 'When a furnace stops heating normally, useful repair work begins with the symptom and a professional diagnosis. Capehart helps Kiefer and Greater Tulsa homeowners find the practical next step.',
			'service_type'  => 'Residential furnace repair in Greater Tulsa',
			'image_id'      => 3142,
			'image_alt'     => 'Technician using diagnostic equipment to evaluate a residential furnace',
			'snapshot'      => array(
				'For active no-heat or heating-performance problems',
				'Diagnosis before a repair or replacement decision',
				'Safety-first guidance for gas and carbon monoxide concerns',
			),
		),
		'furnace-maintenance' => array(
			'title'         => 'Furnace Maintenance in Kiefer & Greater Tulsa | Capehart',
			'h1'            => 'Furnace Maintenance for Kiefer and Greater Tulsa Homes',
			'meta'          => 'Schedule preventive furnace maintenance and a seasonal tune-up with Kiefer-based Capehart Heating & Cooling, serving homeowners throughout Greater Tulsa.',
			'eyebrow'       => 'Seasonal heating care',
			'lead'          => 'Maintenance is intended for a furnace that is operating and needs preventive attention. Capehart helps Kiefer and Greater Tulsa homeowners prepare for the heating season.',
			'service_type'  => 'Residential furnace maintenance in Greater Tulsa',
			'image_id'      => 3141,
			'image_alt'     => 'Technician performing seasonal maintenance on a residential furnace',
			'snapshot'      => array(
				'For furnaces that are currently operating',
				'Annual inspection and seasonal care',
				'Observed findings explained before next-step decisions',
			),
		),
		'furnace-replacement' => array(
			'title'         => 'Furnace Replacement in Kiefer & Greater Tulsa | Capehart',
			'h1'            => 'Furnace Replacement for Kiefer and Greater Tulsa Homes',
			'meta'          => 'Compare furnace replacement, sizing, efficiency and installation factors with Kiefer-based Capehart, serving homeowners across Greater Tulsa, Oklahoma.',
			'eyebrow'       => 'Heating equipment decisions',
			'lead'          => 'Replacement planning should consider the current furnace, the home, comfort priorities and repair history—not age alone. Capehart helps Greater Tulsa homeowners compare the options.',
			'service_type'  => 'Residential furnace replacement in Greater Tulsa',
			'image_id'      => 3143,
			'image_alt'     => 'Modern residential furnace prepared for a replacement project',
			'snapshot'      => array(
				'Current equipment and repair history considered',
				'Home needs guide sizing and system selection',
				'Project scope reviewed before installation planning',
			),
		),
	);

	return isset( $pages[ $slug ] ) ? $pages[ $slug ] : array();
}

/**
 * Return the verified Capehart service areas.
 *
 * @return string[]
 */
function capehart_custom_heating_service_areas() {
	if ( function_exists( 'capehart_custom_cooling_service_areas' ) ) {
		return capehart_custom_cooling_service_areas();
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
 * Return the hub FAQs used for visible copy and JSON-LD.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_heating_hub_faqs() {
	return array(
		array(
			'question' => 'What heating services does Capehart provide?',
			'answer'   => 'Capehart provides residential furnace repair, seasonal furnace maintenance, furnace replacement planning, and heat pump service. Choose repair for an active furnace problem, maintenance for operating equipment that needs preventive care, or replacement when you are comparing a larger furnace decision. Share the equipment type when requesting heat pump service.',
		),
		array(
			'question' => 'Does Capehart serve Tulsa if the company is based in Kiefer?',
			'answer'   => 'Yes. Capehart is based in Kiefer and serves homeowners across the Greater Tulsa area, including Tulsa, Broken Arrow, Bixby, Jenks, Glenpool, Sapulpa, Sand Springs, Owasso, Catoosa, Mounds, Kellyville, Bristow, and Mannford.',
		),
		array(
			'question' => 'When should I request furnace repair?',
			'answer'   => 'Request repair when the furnace will not heat, blows cold air, cycles in a new pattern, produces weak airflow, makes a new sound, or shows another active operating problem. A symptom is a useful starting point, but diagnosis is needed before the cause and scope are known.',
		),
		array(
			'question' => 'Is furnace maintenance the same as furnace repair?',
			'answer'   => 'No. Maintenance is preventive service for equipment that is operating normally. A no-heat call, unusual operation, or active comfort problem belongs on the repair path so the fault can be evaluated.',
		),
		array(
			'question' => 'How do I decide between furnace repair and replacement?',
			'answer'   => 'The decision depends on the diagnosed problem, overall condition, repair history, comfort performance, equipment fit, and plans for the home. Age can be relevant, but it should not be treated as an automatic replacement rule.',
		),
		array(
			'question' => 'What should I do if a carbon monoxide alarm sounds?',
			'answer'   => 'Move everyone outside to fresh air and call 911. Tell responders that carbon monoxide exposure is suspected, follow their instructions, and do not re-enter or restart fuel-burning equipment until trained professionals say it is safe.',
		),
	);
}

/**
 * Return visible FAQs for a heating child page.
 *
 * @param string $slug Heating page slug.
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_heating_child_faqs( $slug ) {
	$faqs = array(
		'furnace-repair' => array(
			array(
				'question' => 'When should I call for furnace repair?',
				'answer'   => 'Request repair for an active problem such as no heat, cold air, unusual cycling, weak airflow, a new sound, or a system that behaves differently than normal. Describe what changed and when it began rather than guessing at the failed part.',
			),
			array(
				'question' => 'Why cannot furnace repair cost be confirmed from the symptom alone?',
				'answer'   => 'The same symptom can have different causes, and each cause can require a different scope of work. Diagnosis identifies the actual condition so the applicable repair and pricing can be explained before you make a decision.',
			),
			array(
				'question' => 'Should I book maintenance if my furnace is not heating?',
				'answer'   => 'No. An active no-heat or performance problem should be booked as repair. Maintenance is intended for a furnace that is operating normally and needs preventive seasonal care.',
			),
			array(
				'question' => 'What can I check before a furnace repair appointment?',
				'answer'   => 'Limit checks to normal user controls and conditions you can observe safely. The furnace no-start guide explains seven homeowner-level checks. Never remove panels, handle wiring, work on combustion components, or repeatedly reset a system.',
			),
			array(
				'question' => 'Does Capehart provide furnace repair in Tulsa?',
				'answer'   => 'Yes. Capehart is based in Kiefer and provides residential furnace repair for homeowners in Tulsa and throughout the verified Greater Tulsa service area. Share the property address when scheduling so current coverage can be confirmed.',
			),
		),
		'furnace-maintenance' => array(
			array(
				'question' => 'How often should a furnace receive professional maintenance?',
				'answer'   => 'The U.S. Department of Energy advises professional maintenance each year for a furnace or heat pump. Equipment instructions, condition, and use can also affect timing, so ask Capehart which appointment fits your system.',
			),
			array(
				'question' => 'When is a good time to schedule furnace maintenance?',
				'answer'   => 'Many homeowners plan service before or around the heating season while the furnace is operating normally. If the system already has an active fault, choose repair instead of waiting for a maintenance visit.',
			),
			array(
				'question' => 'Can furnace maintenance fix a no-heat problem?',
				'answer'   => 'A no-heat problem requires a repair appointment and diagnosis. Maintenance has a preventive purpose and is not a substitute for troubleshooting an active failure.',
			),
			array(
				'question' => 'Does maintenance guarantee that the furnace will not break down?',
				'answer'   => 'No service can guarantee that equipment will never fail. Maintenance can document present condition and identify issues that deserve attention, but future operation depends on the equipment and how it is used.',
			),
			array(
				'question' => 'Does Capehart offer furnace maintenance across Greater Tulsa?',
				'answer'   => 'Capehart is based in Kiefer and serves homeowners in Tulsa and surrounding Greater Tulsa communities. Provide the property address and equipment type when scheduling so current coverage and appointment fit can be confirmed.',
			),
		),
		'furnace-replacement' => array(
			array(
				'question' => 'When should I consider furnace replacement?',
				'answer'   => 'Replacement may be worth evaluating when repair history, equipment condition, uneven comfort, age, efficiency priorities, or changing home needs create a larger decision. Diagnosis should still determine whether a practical repair path exists.',
			),
			array(
				'question' => 'Does an older furnace always need to be replaced?',
				'answer'   => 'No. Age is one factor, not a diagnosis. The current problem, overall condition, repair history, comfort, system fit, and your plans for the home all belong in the comparison.',
			),
			array(
				'question' => 'How is the right furnace size determined?',
				'answer'   => 'The next furnace should be selected for the home rather than automatically copying the old equipment label. Property characteristics, existing distribution, equipment pairing, and comfort priorities can all affect the recommendation.',
			),
			array(
				'question' => 'What affects the cost of furnace replacement?',
				'answer'   => 'Cost depends on the selected equipment, home and distribution requirements, compatibility, labor, and the project scope. A property-specific evaluation is needed before a meaningful proposal can be prepared.',
			),
			array(
				'question' => 'Does Capehart replace furnaces in Tulsa-area homes?',
				'answer'   => 'Yes. Capehart provides furnace replacement planning for homeowners in Kiefer, Tulsa, and the wider Greater Tulsa service area. Share the address and current equipment details when requesting an evaluation.',
			),
		),
	);

	return isset( $faqs[ $slug ] ) ? $faqs[ $slug ] : array();
}

/**
 * Render the Heating cluster navigation.
 *
 * @param string $current_slug Current page slug.
 */
function capehart_custom_render_heating_subnav( $current_slug ) {
	$items = array(
		'heating'            => 'Overview',
		'furnace-repair'     => 'Repair',
		'furnace-maintenance'=> 'Maintenance',
		'furnace-replacement'=> 'Replacement',
	);
	?>
	<nav class="ch-cooling-subnav ch-heating-subnav" aria-label="Heating services">
		<div class="ch-cooling-subnav__inner">
			<p class="ch-cooling-subnav__label">Heating services</p>
			<ul class="ch-cooling-subnav__list">
				<?php foreach ( $items as $slug => $label ) : ?>
					<li>
						<a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>" <?php echo $current_slug === $slug ? 'aria-current="page"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $label ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</nav>
	<?php
}

/**
 * Render shared Heating schedule and phone controls.
 *
 * @param string $schedule_label Schedule link label.
 */
function capehart_custom_render_heating_actions( $schedule_label = 'Schedule heating service' ) {
	if ( function_exists( 'capehart_custom_render_cooling_actions' ) ) {
		capehart_custom_render_cooling_actions( $schedule_label );
	}
}

/**
 * Render a responsive Heating image from an existing WordPress attachment.
 *
 * @param array<string, mixed> $page Page data.
 * @param string               $class Figure modifier class.
 */
function capehart_custom_render_heating_image( $page, $class = '' ) {
	if ( empty( $page['image_id'] ) ) {
		return;
	}

	$figure_class = trim( 'ch-cooling-feature-photo ' . $class );
	$image        = wp_get_attachment_image(
		(int) $page['image_id'],
		'large',
		false,
		array(
			'alt'      => isset( $page['image_alt'] ) ? $page['image_alt'] : '',
			'loading'  => 'lazy',
			'decoding' => 'async',
			'sizes'    => '(max-width: 760px) calc(100vw - 56px), 430px',
		)
	);

	if ( ! $image ) {
		return;
	}
	?>
	<figure class="<?php echo esc_attr( $figure_class ); ?>">
		<?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Core returns escaped image markup. ?>
	</figure>
	<?php
}

/**
 * Render visible FAQs using the shared accessible accordion component.
 *
 * @param array<int, array{question: string, answer: string}> $faqs FAQs.
 * @param string                                               $id Section ID.
 * @param string                                               $title Section heading.
 */
function capehart_custom_render_heating_faqs( $faqs, $id, $title ) {
	if ( function_exists( 'capehart_custom_render_cooling_faqs' ) ) {
		capehart_custom_render_cooling_faqs( $faqs, $id, $title );
	}
}

/**
 * Render the shared child-page hero.
 *
 * @param array<string, mixed> $page Page data.
 */
function capehart_custom_render_heating_child_hero( $page ) {
	?>
	<section class="ch-cooling-hero ch-cooling-hero--child ch-heating-hero" aria-labelledby="ch-heating-title">
		<div class="ch-cooling-container ch-cooling-hero__grid">
			<div class="ch-cooling-hero__copy">
				<p class="ch-cooling-kicker"><?php echo esc_html( $page['eyebrow'] ); ?></p>
				<h1 id="ch-heating-title"><?php echo esc_html( $page['h1'] ); ?></h1>
				<p class="ch-cooling-hero__lead"><?php echo esc_html( $page['lead'] ); ?></p>
				<?php capehart_custom_render_heating_actions(); ?>
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
 * Render the Heating service hub.
 */
function capehart_custom_render_heating_hub() {
	$page = capehart_custom_heating_page_data( 'heating' );
	?>
	<div class="ch-cooling-page-content ch-heating-page-content ch-cooling-hub-layout">
		<section class="ch-cooling-hero ch-cooling-hero--hub ch-heating-hero" aria-labelledby="ch-heating-title">
			<div class="ch-cooling-container ch-cooling-hero__grid">
				<div class="ch-cooling-hero__copy">
					<p class="ch-cooling-kicker"><?php echo esc_html( $page['eyebrow'] ); ?></p>
					<h1 id="ch-heating-title"><?php echo esc_html( $page['h1'] ); ?></h1>
					<p class="ch-cooling-hero__lead"><?php echo esc_html( $page['lead'] ); ?></p>
					<?php capehart_custom_render_heating_actions(); ?>
				</div>
				<aside class="ch-cooling-snapshot ch-cooling-snapshot--hub" aria-label="Heating service guide">
					<p class="ch-cooling-snapshot__eyebrow">Choose by situation</p>
					<h2>A clear route to the right service</h2>
					<ol>
						<li><span>01</span><strong>Active problem</strong><small>Start with repair.</small></li>
						<li><span>02</span><strong>Working furnace</strong><small>Choose maintenance.</small></li>
						<li><span>03</span><strong>Equipment decision</strong><small>Compare replacement.</small></li>
					</ol>
				</aside>
			</div>
		</section>

		<?php capehart_custom_render_heating_subnav( 'heating' ); ?>

		<div class="ch-cooling-container ch-cooling-content-shell">
			<section class="ch-cooling-section ch-cooling-router" aria-labelledby="heating-router-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Find your starting point</p>
					<h2 id="heating-router-title">Choose the heating service that fits the situation</h2>
					<p>You do not need to identify the failed part before contacting Capehart. Start with whether the furnace has an active problem, is working and needs preventive care, or is part of a larger equipment decision.</p>
				</div>
				<div class="ch-cooling-router__grid ch-heating-router__grid">
					<article class="ch-cooling-route-card ch-cooling-route-card--repair">
						<p class="ch-cooling-route-card__number">01</p>
						<h3>Your furnace is not heating normally</h3>
						<p>Choose repair for no heat, cold air, short cycling, weak airflow, or another new operating problem. Diagnosis comes before the scope is known.</p>
						<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-repair/' ) ); ?>">Explore furnace repair</a>
					</article>
					<article class="ch-cooling-route-card">
						<p class="ch-cooling-route-card__number">02</p>
						<h3>Your working furnace needs seasonal care</h3>
						<p>Choose maintenance when the system is operating normally and the goal is annual professional inspection and preventive attention.</p>
						<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-maintenance/' ) ); ?>">Explore furnace maintenance</a>
					</article>
					<article class="ch-cooling-route-card">
						<p class="ch-cooling-route-card__number">03</p>
						<h3>You are comparing a furnace replacement</h3>
						<p>Choose replacement planning when condition, repair history, comfort, or home needs make the next equipment decision more important than a single fault.</p>
						<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-replacement/' ) ); ?>">Explore furnace replacement</a>
					</article>
					<article class="ch-cooling-route-card">
						<p class="ch-cooling-route-card__number">04</p>
						<h3>Your home uses a heat pump</h3>
						<p>Tell Capehart that the request involves a heat pump, what the system is doing, and whether the issue affects heating, cooling, or both.</p>
						<a class="ch-cooling-text-link" href="tel:+19187711218">Ask about heat pump service</a>
					</article>
				</div>
			</section>

			<section class="ch-cooling-intro-panel ch-cooling-intro-panel--media ch-heating-overview-panel" aria-labelledby="heating-overview-title">
				<div class="ch-cooling-intro-panel__copy">
					<p class="ch-cooling-kicker">Comfort starts with context</p>
					<h2 id="heating-overview-title">A practical heating plan begins with what changed</h2>
					<p>Heating systems combine controls, airflow, electrical components and, in some furnaces, fuel-burning components. Similar symptoms can have different causes. A clear description helps the service conversation begin with useful evidence instead of an assumed part.</p>
				</div>
				<?php capehart_custom_render_heating_image( $page, 'ch-cooling-feature-photo--maintenance' ); ?>
			</section>

			<section class="ch-cooling-section ch-cooling-symptoms" aria-labelledby="heating-symptoms-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Start with what you notice</p>
					<h2 id="heating-symptoms-title">Heating symptoms that deserve attention</h2>
					<p>A symptom is not a diagnosis, but it helps you choose the right starting point and gives the technician useful context.</p>
				</div>
				<div class="ch-cooling-symptoms__grid">
					<article><h3>Furnace will not start</h3><p>Use the <a href="<?php echo esc_url( home_url( '/furnace-wont-turn-on/' ) ); ?>">seven safe no-start checks</a>, then request repair if heat does not return.</p></article>
					<article><h3>Cold air from vents</h3><p>Review the <a href="<?php echo esc_url( home_url( '/furnace-blowing-cold-air/' ) ); ?>">cold-air guide</a> for safe observations and repair warning signs.</p></article>
					<article><h3>Frequent cycling</h3><p>The furnace starts and stops in a new or unusually short pattern.</p></article>
					<article><h3>Weak or uneven airflow</h3><p>Rooms heat unevenly or airflow feels different from normal.</p></article>
					<article><h3>New sounds or odors</h3><p>A sudden operating change deserves attention; a gas odor requires immediate safety action.</p></article>
					<article class="ch-cooling-symptoms__urgent"><h3>CO alarm or suspected gas leak</h3><p>Leave the home, move to fresh air and call 911 from a safe location. Follow emergency and gas-utility instructions.</p></article>
				</div>
				<aside class="ch-cooling-safety-note"><strong>Safety first:</strong> Do not remove furnace panels, touch wiring, inspect burners, or work on venting. If a carbon monoxide alarm sounds, tell emergency responders that CO exposure is suspected and do not re-enter until they say it is safe.</aside>
			</section>

			<section class="ch-cooling-section ch-cooling-decision" aria-labelledby="heating-decision-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Repair, maintain, or replace</p>
					<h2 id="heating-decision-title">Three services with three different purposes</h2>
				</div>
				<div class="ch-cooling-decision__grid">
					<article><p class="ch-cooling-decision__label">Active fault</p><h3>Choose repair</h3><p>The system has stopped, does not heat normally, or shows a new symptom. The immediate goal is diagnosis.</p></article>
					<article><p class="ch-cooling-decision__label">Operating equipment</p><h3>Choose maintenance</h3><p>The furnace is working and the goal is annual inspection, seasonal care, and a clearer view of current condition.</p></article>
					<article><p class="ch-cooling-decision__label">Larger equipment choice</p><h3>Compare replacement</h3><p>Condition, repair history, comfort, equipment fit, or property plans make a system-level evaluation useful.</p></article>
				</div>
			</section>

			<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="heating-contact-title">
				<div class="ch-cooling-section__intro">
					<p class="ch-cooling-kicker">Prepare for the conversation</p>
					<h2 id="heating-contact-title">What to share when you contact Capehart</h2>
				</div>
				<ol>
					<li><span>01</span><div><h3>Give the service address</h3><p>Share the city and property address so current coverage can be confirmed.</p></div></li>
					<li><span>02</span><div><h3>Describe what changed</h3><p>Explain whether there is no heat, cold air, unusual cycling, weak airflow, a new sound, or another symptom.</p></div></li>
					<li><span>03</span><div><h3>Add the timeline</h3><p>Note when the change began and whether it is constant or intermittent.</p></div></li>
					<li><span>04</span><div><h3>Share safe equipment details</h3><p>Provide the system type or approximate age if known without opening cabinets or approaching unsafe equipment.</p></div></li>
				</ol>
			</section>

			<section class="ch-cooling-section ch-cooling-area" aria-labelledby="heating-area-title">
				<div class="ch-cooling-area__copy">
					<p class="ch-cooling-kicker">Local service area</p>
					<h2 id="heating-area-title">Based in Kiefer, serving Greater Tulsa homeowners</h2>
					<p>Capehart provides residential heating service from its Kiefer base across the verified communities below. Share the property address and equipment type so the team can confirm current coverage and appointment fit.</p>
				</div>
				<ul class="ch-cooling-area__list" aria-label="Capehart heating service areas">
					<?php foreach ( capehart_custom_heating_service_areas() as $area ) : ?>
						<li><?php echo esc_html( $area ); ?></li>
					<?php endforeach; ?>
				</ul>
			</section>

			<?php capehart_custom_render_heating_faqs( capehart_custom_heating_hub_faqs(), 'heating-faq', 'Heating service questions' ); ?>

			<section class="ch-cooling-final-cta ch-heating-final-cta" aria-labelledby="heating-final-cta-title">
				<div><p class="ch-cooling-kicker">Ready for the next step?</p><h2 id="heating-final-cta-title">Tell Capehart what your heating system is doing</h2><p>Share the service address, system behavior, and when the change began. Schedule online or speak with the team by phone.</p></div>
				<?php capehart_custom_render_heating_actions(); ?>
			</section>
		</div>
	</div>
	<?php
}

/**
 * Render the furnace repair service page.
 */
function capehart_custom_render_heating_repair() {
	$page = capehart_custom_heating_page_data( 'furnace-repair' );
	$faqs = capehart_custom_heating_child_faqs( 'furnace-repair' );
	?>
	<article class="ch-cooling-article ch-cooling-article--generated ch-heating-article ch-heating-article--repair">
		<section class="ch-cooling-intro-panel ch-cooling-intro-panel--media" aria-labelledby="furnace-repair-start-title">
			<div class="ch-cooling-intro-panel__copy">
				<p class="ch-cooling-kicker">Diagnosis before assumptions</p>
				<h2 id="furnace-repair-start-title">Furnace repair starts with the active problem</h2>
				<p>A no-heat call, cold air, short cycling, weak airflow, or a new sound can each have more than one possible cause. Describe what the furnace is doing and when it changed; a professional evaluation can then connect the symptom to the actual condition and a practical repair path.</p>
			</div>
			<?php capehart_custom_render_heating_image( $page, 'ch-cooling-feature-photo--maintenance' ); ?>
		</section>

		<section class="ch-cooling-section ch-cooling-safety-panel ch-heating-safety-panel" aria-labelledby="furnace-safety-title">
			<div>
				<p class="ch-cooling-kicker">Safety comes first</p>
				<h2 id="furnace-safety-title">Leave gas, combustion, and electrical hazards alone</h2>
			</div>
			<ul>
				<li><strong>Carbon monoxide alarm:</strong> Move everyone outside to fresh air, call 911, and tell responders that CO exposure is suspected. Do not re-enter until they say it is safe.</li>
				<li><strong>Possible gas leak:</strong> Leave immediately. Do not operate switches, electronics, or phones inside. From a safe location, call 911 and your gas utility.</li>
				<li><strong>Smoke, sparking, or fire:</strong> Move away from danger and call emergency services. Do not touch or restart the equipment.</li>
				<li><strong>Water near electrical equipment:</strong> Do not touch wet equipment, switches, or panels. Treat wet energized equipment, sparking, or smoke as an emergency.</li>
			</ul>
		</section>

		<section class="ch-cooling-section" aria-labelledby="furnace-repair-signs-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">When to request repair</p>
				<h2 id="furnace-repair-signs-title">Signs your furnace needs professional attention</h2>
				<p>Choose repair when something has changed in the way the system starts, heats, moves air, or shuts down.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>No heat</h3><p>The thermostat calls for heat, but the furnace does not begin or complete a normal heating cycle.</p></article>
				<article><h3>Cold air</h3><p>The system runs, but the air at the vents remains cool beyond a normal startup period.</p></article>
				<article><h3>Short cycling</h3><p>The furnace starts and stops more frequently than usual or cannot sustain a normal cycle.</p></article>
				<article><h3>Weak airflow</h3><p>Air movement is noticeably lower, or some rooms no longer receive normal heat.</p></article>
				<article><h3>New sound or odor</h3><p>A change in operation should be described when you call; gas or burning odors require immediate safety action.</p></article>
				<article><h3>Unreliable operation</h3><p>The problem comes and goes, controls behave differently, or heat returns only temporarily.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band" aria-labelledby="furnace-guides-title">
			<div><p class="ch-cooling-kicker">Safe homeowner guidance</p><h2 id="furnace-guides-title">Use the symptom guide that matches what you see</h2></div>
			<div>
				<p>If the furnace does not begin a heating cycle, start with the <a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-wont-turn-on/' ) ); ?>">seven safe furnace no-start checks</a>. If it runs but sends cold air through the vents, use the <a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-blowing-cold-air/' ) ); ?>">furnace blowing cold-air guide</a>.</p>
				<p>Those guides stop at homeowner-safe observations. Do not remove panels, touch wiring, inspect burners, work on venting, or repeatedly reset the system.</p>
			</div>
		</section>

		<section class="ch-cooling-section" aria-labelledby="furnace-diagnosis-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">A system-level evaluation</p>
				<h2 id="furnace-diagnosis-title">What a furnace diagnosis may need to evaluate</h2>
				<p>The exact testing depends on the equipment and symptom. A qualified technician may need to assess several connected parts of the heating system before recommending work.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Controls and call for heat</h3><p>Whether the thermostat and system controls are communicating and responding as expected.</p></article>
				<article><h3>Airflow conditions</h3><p>Whether accessible restrictions, distribution, or blower-related conditions affect operation.</p></article>
				<article><h3>Electrical operation</h3><p>Whether accessible electrical components and safety controls support normal furnace operation.</p></article>
				<article><h3>Ignition and combustion</h3><p>For applicable equipment, whether fuel-burning and ignition systems require qualified testing.</p></article>
				<article><h3>Venting and safety</h3><p>Whether visible or measured conditions indicate a concern that must be addressed before normal use.</p></article>
				<article><h3>Complete operating cycle</h3><p>How the furnace starts, heats, moves air, and shuts down under the conditions present during the visit.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-comparison-section" aria-labelledby="repair-or-replace-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Repair or replacement</p>
				<h2 id="repair-or-replace-title">Let the diagnosis define the decision</h2>
			</div>
			<div class="ch-cooling-comparison">
				<article><p class="ch-cooling-decision__label">Repair can remain practical when</p><h3>The fault is defined and the system still fits the home</h3><p>A contained problem, reasonable overall condition, and a useful repair path can support continued service. Ask what was found, what work is proposed, and what the repair is expected to address.</p></article>
				<article><p class="ch-cooling-decision__label">Replacement deserves evaluation when</p><h3>The decision is larger than one failed component</h3><p>Condition, repeated faults, comfort problems, system fit, or repair history can justify a broader comparison. Review the <a href="<?php echo esc_url( home_url( '/furnace-replacement/' ) ); ?>">furnace replacement planning page</a> before assuming either outcome.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="furnace-repair-process-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">A clear service path</p><h2 id="furnace-repair-process-title">What to expect when you request furnace repair</h2></div>
			<ol>
				<li><span>01</span><div><h3>Describe the problem</h3><p>Share the address, symptom, timeline, equipment type if known, and any safety concerns.</p></div></li>
				<li><span>02</span><div><h3>Evaluate the system</h3><p>The visit begins with the reported behavior and the testing needed to identify the actual condition.</p></div></li>
				<li><span>03</span><div><h3>Review the findings</h3><p>Ask for a plain-language explanation of what was found and which work is being recommended.</p></div></li>
				<li><span>04</span><div><h3>Choose the next step</h3><p>Compare the scope, current pricing, and any larger equipment considerations before authorizing work.</p></div></li>
			</ol>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band ch-heating-cost-band" aria-labelledby="furnace-repair-cost-title">
			<div><p class="ch-cooling-kicker">Pricing needs context</p><h2 id="furnace-repair-cost-title">Why furnace repair cost requires diagnosis</h2></div>
			<div><p>A reported symptom cannot confirm the failed component or required labor. The price depends on the condition found, the proposed scope, parts or materials, and what is included. Ask how diagnostic pricing works and request the applicable repair details before deciding.</p><p>Capehart can explain current scheduling and pricing for the service address after the request is understood.</p></div>
		</section>

		<section class="ch-cooling-section ch-cooling-local-note" aria-labelledby="furnace-repair-local-title">
			<div><p class="ch-cooling-kicker">Kiefer and Greater Tulsa</p><h2 id="furnace-repair-local-title">Local furnace repair from a Kiefer-based team</h2><p>Capehart serves homeowners in Tulsa and surrounding Greater Tulsa communities from its Kiefer base. Share the property address and equipment type so the team can confirm current coverage and appointment fit. If the furnace is operating normally and only needs preventive care, choose <a href="<?php echo esc_url( home_url( '/furnace-maintenance/' ) ); ?>">furnace maintenance</a>; for broader service questions, visit the <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">HVAC FAQ</a>.</p></div>
			<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/heating/' ) ); ?>">View all heating services</a>
		</section>

		<?php capehart_custom_render_heating_faqs( $faqs, 'furnace-repair-faq', 'Furnace repair questions' ); ?>

		<section class="ch-cooling-final-cta ch-heating-final-cta" aria-labelledby="furnace-repair-cta-title">
			<div><p class="ch-cooling-kicker">Active heating problem?</p><h2 id="furnace-repair-cta-title">Request furnace repair from Capehart</h2><p>Tell the team what the furnace is doing, when the problem began, and where the home is located. Use emergency services first for immediate danger.</p></div>
			<?php capehart_custom_render_heating_actions( 'Schedule furnace repair' ); ?>
		</section>
	</article>
	<?php
}

/**
 * Render the furnace maintenance service page.
 */
function capehart_custom_render_heating_maintenance() {
	$page = capehart_custom_heating_page_data( 'furnace-maintenance' );
	$faqs = capehart_custom_heating_child_faqs( 'furnace-maintenance' );
	?>
	<article class="ch-cooling-article ch-cooling-article--generated ch-heating-article ch-heating-article--maintenance">
		<section class="ch-cooling-intro-panel ch-cooling-intro-panel--media" aria-labelledby="furnace-maintenance-purpose-title">
			<div class="ch-cooling-intro-panel__copy">
				<p class="ch-cooling-kicker">Preventive seasonal care</p>
				<h2 id="furnace-maintenance-purpose-title">Furnace maintenance is designed for a working system</h2>
				<p>Maintenance gives you a structured look at present furnace condition before an active failure becomes the reason for the visit. It supports seasonal readiness, routine professional care, and an informed conversation about findings that may deserve attention.</p>
			</div>
			<?php capehart_custom_render_heating_image( $page, 'ch-cooling-feature-photo--maintenance' ); ?>
		</section>

		<section class="ch-cooling-section" aria-labelledby="maintenance-fit-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">Pick the right appointment</p><h2 id="maintenance-fit-title">Maintenance fits preventive care; repair fits an active fault</h2></div>
			<div class="ch-cooling-comparison">
				<article>
					<p class="ch-cooling-decision__label">Choose maintenance when</p>
					<h3>The furnace is operating normally</h3>
					<ul><li>You are planning annual professional service.</li><li>You want the current condition reviewed before colder weather.</li><li>There is no known no-heat or safety problem to diagnose.</li></ul>
				</article>
				<article>
					<p class="ch-cooling-decision__label">Choose repair when</p>
					<h3>Something has changed</h3>
					<ul><li>The furnace will not heat or blows cold air.</li><li>Cycling, airflow, sound, smell, or controls have changed.</li><li>The system stops, behaves unreliably, or shows a fault.</li></ul>
					<p><a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-repair/' ) ); ?>">Request furnace repair instead</a></p>
				</article>
			</div>
		</section>

		<section class="ch-cooling-section" aria-labelledby="maintenance-focus-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">A practical system review</p>
				<h2 id="maintenance-focus-title">Areas a furnace maintenance visit may evaluate</h2>
				<p>The exact service scope should match the equipment and Capehart's current offering. Depending on the furnace, a maintenance visit may consider the following system-level areas.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Operating cycle</h3><p>Whether the furnace starts, runs, moves air, and shuts down normally during the visit.</p></article>
				<article><h3>Accessible airflow conditions</h3><p>Whether an accessible filter or visible restriction may affect air movement and operation.</p></article>
				<article><h3>Controls and safety devices</h3><p>Whether accessible system controls and safety functions require attention from a qualified technician.</p></article>
				<article><h3>Ignition or heating operation</h3><p>How applicable heating components operate under the conditions present at the appointment.</p></article>
				<article><h3>Visible venting conditions</h3><p>Whether accessible venting or surrounding conditions show a concern that needs further evaluation.</p></article>
				<article><h3>Documented findings</h3><p>What appears normal, what should be monitored, and what may justify a separate repair conversation.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band" aria-labelledby="maintenance-frequency-title">
			<div><p class="ch-cooling-kicker">Annual professional care</p><h2 id="maintenance-frequency-title">How often should a furnace be serviced?</h2></div>
			<div><p>The U.S. Department of Energy advises professional maintenance each year for a furnace or heat pump. Many homeowners plan the visit before or around the heating season while the equipment is still operating normally.</p><p>Manufacturer instructions, system condition, and prior service history can also influence timing. If an active problem appears first, schedule repair rather than waiting for routine maintenance.</p></div>
		</section>

		<section class="ch-cooling-section ch-cooling-decision" aria-labelledby="maintenance-timing-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">When to schedule a tune-up</p><h2 id="maintenance-timing-title">Three useful furnace maintenance reminders</h2></div>
			<div class="ch-cooling-decision__grid">
				<article><p class="ch-cooling-decision__label">Annual timing</p><h3>About a year has passed</h3><p>Annual professional care is a practical scheduling cue when the furnace is operating normally.</p></article>
				<article><p class="ch-cooling-decision__label">Unknown history</p><h3>Prior service details are unclear</h3><p>A maintenance visit can create a current snapshot when you recently moved in or do not know the equipment history.</p></article>
				<article><p class="ch-cooling-decision__label">Seasonal planning</p><h3>Heating season is approaching</h3><p>Scheduling before heavier use can be convenient, provided there is no active fault that belongs on the repair path.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section" aria-labelledby="maintenance-between-visits-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Support normal operation</p>
				<h2 id="maintenance-between-visits-title">Safe furnace care between professional tune-ups</h2>
				<p>Homeowner care should stay within normal-use tasks described by the equipment manufacturer. These observations can support airflow and help you notice changes without opening the furnace.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Follow filter instructions</h3><p>Check an accessible filter only as the manufacturer directs, and use the correct type and size for the system.</p></article>
				<article><h3>Keep vents accessible</h3><p>Avoid blocking supply and return openings with furniture, rugs, or stored items.</p></article>
				<article><h3>Use normal controls</h3><p>Operate the thermostat as intended rather than repeatedly resetting controls to force the furnace to run.</p></article>
				<article><h3>Protect the equipment area</h3><p>Keep normal access clear and do not store flammable materials beside heating equipment.</p></article>
				<article><h3>Maintain household alarms</h3><p>Test and replace carbon monoxide and smoke alarms according to their manufacturer instructions.</p></article>
				<article><h3>Report a change early</h3><p>New cycling, airflow, sound, smell, or comfort behavior belongs on the repair path rather than the next routine visit.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="maintenance-prepare-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">Before the appointment</p><h2 id="maintenance-prepare-title">How to prepare without opening the furnace</h2></div>
			<ol>
				<li><span>01</span><div><h3>Share the property and equipment basics</h3><p>Provide the service address, furnace type if known, approximate age, and date of prior service when available.</p></div></li>
				<li><span>02</span><div><h3>Note recent changes</h3><p>Mention changes in cycling, airflow, room comfort, sound, or smell even if the system still runs.</p></div></li>
				<li><span>03</span><div><h3>Keep normal access clear</h3><p>Make sure the thermostat and accessible equipment area can be reached. Do not remove panels or handle electrical, gas, burner, or venting components.</p></div></li>
				<li><span>04</span><div><h3>Separate maintenance from repair</h3><p>If the furnace stops heating before the appointment, contact Capehart and explain the active fault so the service type can be updated.</p></div></li>
			</ol>
		</section>

		<section class="ch-cooling-section ch-cooling-decision" aria-labelledby="maintenance-value-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">Useful expectations</p><h2 id="maintenance-value-title">What maintenance can—and cannot—tell you</h2></div>
			<div class="ch-cooling-decision__grid">
				<article><p class="ch-cooling-decision__label">Present condition</p><h3>It can create a current snapshot</h3><p>Observed operation and accessible conditions can be documented at the time of service.</p></article>
				<article><p class="ch-cooling-decision__label">Developing concerns</p><h3>It can surface items to discuss</h3><p>Findings may support monitoring, a repair conversation, or a broader equipment evaluation.</p></article>
				<article><p class="ch-cooling-decision__label">Future operation</p><h3>It cannot guarantee no breakdowns</h3><p>No maintenance visit can promise that equipment will never fail after the service date.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-local-note" aria-labelledby="maintenance-local-title">
			<div><p class="ch-cooling-kicker">Kiefer and Greater Tulsa</p><h2 id="maintenance-local-title">Plan seasonal furnace care with a Kiefer-based team</h2><p>Capehart serves homeowners across the Greater Tulsa area from Kiefer. Share the property address, equipment type, and whether the system is currently operating normally when you schedule. For the full repair, maintenance, and replacement routes, visit the <a href="<?php echo esc_url( home_url( '/heating/' ) ); ?>">Heating service overview</a>; broader answers are available in the <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">HVAC FAQ</a>.</p></div>
			<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-replacement/' ) ); ?>">Compare furnace replacement planning</a>
		</section>

		<?php capehart_custom_render_heating_faqs( $faqs, 'furnace-maintenance-faq', 'Furnace maintenance questions' ); ?>

		<section class="ch-cooling-final-cta ch-heating-final-cta" aria-labelledby="furnace-maintenance-cta-title">
			<div><p class="ch-cooling-kicker">Plan seasonal service</p><h2 id="furnace-maintenance-cta-title">Schedule furnace maintenance with Capehart</h2><p>Choose maintenance for an operating furnace that needs preventive care. If the system is not heating normally, describe the problem and request repair instead.</p></div>
			<?php capehart_custom_render_heating_actions( 'Schedule furnace maintenance' ); ?>
		</section>
	</article>
	<?php
}

/**
 * Render the furnace replacement service page.
 */
function capehart_custom_render_heating_replacement() {
	$page = capehart_custom_heating_page_data( 'furnace-replacement' );
	$faqs = capehart_custom_heating_child_faqs( 'furnace-replacement' );
	?>
	<article class="ch-cooling-article ch-cooling-article--generated ch-heating-article ch-heating-article--replacement">
		<section class="ch-cooling-intro-panel ch-cooling-intro-panel--media" aria-labelledby="replacement-purpose-title">
			<div class="ch-cooling-intro-panel__copy">
				<p class="ch-cooling-kicker">A considered equipment decision</p>
				<h2 id="replacement-purpose-title">Furnace replacement should begin with the home and current system</h2>
				<p>A useful replacement plan considers what the existing furnace is doing, how the home feels, which problems have repeated, and what the next system needs to accomplish. Equipment age can matter, but it should not decide the answer by itself.</p>
			</div>
			<?php capehart_custom_render_heating_image( $page, 'ch-cooling-feature-photo--maintenance' ); ?>
		</section>

		<section class="ch-cooling-section" aria-labelledby="replacement-signs-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">When to evaluate the option</p>
				<h2 id="replacement-signs-title">Reasons furnace replacement may enter the conversation</h2>
				<p>No single factor automatically determines the answer. The decision becomes clearer when the current diagnosis and the larger equipment picture are considered together.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Repair history</h3><p>Repeated faults can change how another repair compares with a longer-term equipment plan.</p></article>
				<article><h3>Current condition</h3><p>The immediate diagnosis helps define whether a practical repair path remains.</p></article>
				<article><h3>Uneven comfort</h3><p>Persistent room-to-room differences may justify a broader look at equipment and distribution.</p></article>
				<article><h3>Efficiency priorities</h3><p>Fuel use and operating goals can belong in the comparison without relying on unsupported savings promises.</p></article>
				<article><h3>Equipment compatibility</h3><p>The furnace, controls, electrical or fuel requirements, venting, and distribution need to work together.</p></article>
				<article><h3>Changing home needs</h3><p>Renovations, household use, and ownership plans can affect what the next system should support.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-decision" aria-labelledby="replacement-compare-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">What the evaluation clarifies</p><h2 id="replacement-compare-title">Build the replacement decision around the whole system</h2><p>If an active fault has not been diagnosed, start with <a href="<?php echo esc_url( home_url( '/furnace-repair/' ) ); ?>">furnace repair</a>. When replacement is already under consideration, the evaluation should clarify these broader questions.</p></div>
			<div class="ch-cooling-decision__grid">
				<article><p class="ch-cooling-decision__label">Home fit</p><h3>What does the property need?</h3><p>Comfort patterns, home characteristics, distribution, and equipment relationships help define a suitable system.</p></article>
				<article><p class="ch-cooling-decision__label">Longer-term choice</p><h3>What changes the repair comparison?</h3><p>Overall condition, recurring faults, repair history, and ownership plans can make continued repair more or less practical.</p></article>
				<article><p class="ch-cooling-decision__label">Complete scope</p><h3>What will the project include?</h3><p>Equipment, compatibility work, installation requirements, pricing, and written terms should be understood together.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band" aria-labelledby="replacement-sizing-title">
			<div><p class="ch-cooling-kicker">System selection</p><h2 id="replacement-sizing-title">Furnace sizing should reflect the home</h2></div>
			<div><p>Replacing a furnace with the same nominal size does not by itself confirm that the next system fits the property. Home characteristics, existing ductwork or distribution, equipment pairing, controls, fuel and electrical requirements, and comfort goals can all influence selection.</p><p>A professional assessment should connect those factors before a recommendation is finalized. Oversized and undersized equipment can both create performance and comfort problems.</p></div>
		</section>

		<section class="ch-cooling-section ch-cooling-decision" aria-labelledby="replacement-efficiency-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Compare more than the model name</p>
				<h2 id="replacement-efficiency-title">Efficiency, compatibility, and scope belong in one proposal</h2>
				<p>AFUE describes how efficiently a furnace converts fuel into usable heat under standardized conditions. It is useful, but it is not a complete prediction of a home's bill or comfort.</p>
			</div>
			<div class="ch-cooling-decision__grid">
				<article><p class="ch-cooling-decision__label">Equipment</p><h3>Know what is being proposed</h3><p>Ask for the equipment type, efficiency information, relevant controls, and why the option fits the property.</p></article>
				<article><p class="ch-cooling-decision__label">Compatibility</p><h3>Review the connected system</h3><p>Confirm how the furnace will work with existing distribution, controls, utilities, venting, and other applicable equipment.</p></article>
				<article><p class="ch-cooling-decision__label">Project scope</p><h3>Compare what is included</h3><p>Understand labor, removal, materials, modifications, startup, and any other items listed in the property-specific proposal.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section" aria-labelledby="replacement-proposal-title">
			<div class="ch-cooling-section__intro">
				<p class="ch-cooling-kicker">Compare complete proposals</p>
				<h2 id="replacement-proposal-title">Questions to ask before choosing a new furnace</h2>
				<p>A useful comparison makes both the equipment and the work around it understandable. Ask how each recommendation addresses the home rather than comparing model labels alone.</p>
			</div>
			<div class="ch-cooling-feature-grid">
				<article><h3>Why this size?</h3><p>Ask which home and system factors support the proposed capacity instead of simply matching the old label.</p></article>
				<article><h3>What efficiency level?</h3><p>Review the AFUE rating, operating features, and why the option fits your priorities without assuming a guaranteed bill reduction.</p></article>
				<article><h3>What must be compatible?</h3><p>Confirm how controls, distribution, utilities, venting, and connected equipment affect the plan.</p></article>
				<article><h3>What work is included?</h3><p>Look for removal, materials, labor, modifications, startup, and other property-specific items in the written scope.</p></article>
				<article><h3>What terms apply?</h3><p>Ask for the applicable equipment, workmanship, payment, and warranty terms in writing before approving the project.</p></article>
				<article><h3>What happens next?</h3><p>Confirm scheduling, homeowner preparation, access, and how system operation will be reviewed after the work.</p></article>
			</div>
		</section>

		<section class="ch-cooling-section ch-cooling-steps" aria-labelledby="replacement-process-title">
			<div class="ch-cooling-section__intro"><p class="ch-cooling-kicker">From evaluation to installation</p><h2 id="replacement-process-title">A practical furnace installation planning sequence</h2></div>
			<ol>
				<li><span>01</span><div><h3>Describe the current situation</h3><p>Share comfort concerns, repair history, equipment information if known, and why replacement is being considered.</p></div></li>
				<li><span>02</span><div><h3>Evaluate the home and system</h3><p>The current furnace, property characteristics, distribution, compatibility, and utilities help define appropriate options.</p></div></li>
				<li><span>03</span><div><h3>Compare repair and replacement</h3><p>Review whether repair remains practical and what a replacement would need to address beyond the current fault.</p></div></li>
				<li><span>04</span><div><h3>Review the proposal</h3><p>Compare equipment, efficiency, full project scope, current pricing, and scheduling details before deciding.</p></div></li>
				<li><span>05</span><div><h3>Plan installation and startup</h3><p>Once the system path is selected, confirm the work sequence and any homeowner preparation with Capehart.</p></div></li>
			</ol>
		</section>

		<section class="ch-cooling-section ch-cooling-info-band ch-heating-cost-band" aria-labelledby="replacement-cost-title">
			<div><p class="ch-cooling-kicker">Property-specific pricing</p><h2 id="replacement-cost-title">What affects furnace replacement cost?</h2></div>
			<div><p>The selected equipment is only one part of the total. Cost can also depend on home and distribution requirements, fuel or electrical compatibility, controls, venting, materials, labor, removal, and modifications included in the scope.</p><p>Ask for a written proposal that makes the equipment and included work clear. Capehart can discuss current pricing after the property and project needs are evaluated.</p></div>
		</section>

		<section class="ch-cooling-section ch-cooling-local-note" aria-labelledby="replacement-local-title">
			<div><p class="ch-cooling-kicker">Greater Tulsa service area</p><h2 id="replacement-local-title">Furnace replacement planning from a Kiefer-based team</h2><p>Capehart helps homeowners in Kiefer, Tulsa, and surrounding Greater Tulsa communities compare furnace replacement needs. Share the property address, current equipment, comfort concerns, and repair history when requesting an evaluation. Review <a href="<?php echo esc_url( home_url( '/heating/' ) ); ?>">all Heating service paths</a> or learn more <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">about the Capehart team</a>.</p></div>
			<a class="ch-cooling-text-link" href="<?php echo esc_url( home_url( '/furnace-maintenance/' ) ); ?>">Explore preventive furnace maintenance</a>
		</section>

		<?php capehart_custom_render_heating_faqs( $faqs, 'furnace-replacement-faq', 'Furnace replacement questions' ); ?>

		<section class="ch-cooling-final-cta ch-heating-final-cta" aria-labelledby="furnace-replacement-cta-title">
			<div><p class="ch-cooling-kicker">Compare the next step</p><h2 id="furnace-replacement-cta-title">Plan a furnace replacement evaluation</h2><p>Tell Capehart what the current system is doing, why replacement is being considered, and where the home is located.</p></div>
			<?php capehart_custom_render_heating_actions( 'Request a replacement consultation' ); ?>
		</section>
	</article>
	<?php
}

/**
 * Render one Heating child page.
 *
 * @param string $slug Current page slug.
 */
function capehart_custom_render_heating_child( $slug ) {
	$page = capehart_custom_heating_page_data( $slug );

	if ( empty( $page ) ) {
		return;
	}
	?>
	<div class="ch-cooling-page-content ch-heating-page-content ch-cooling-child-layout">
		<?php capehart_custom_render_heating_child_hero( $page ); ?>
		<?php capehart_custom_render_heating_subnav( $slug ); ?>
		<div class="ch-cooling-container ch-cooling-content-shell">
			<?php
			if ( 'furnace-repair' === $slug ) {
				capehart_custom_render_heating_repair();
			} elseif ( 'furnace-maintenance' === $slug ) {
				capehart_custom_render_heating_maintenance();
			} elseif ( 'furnace-replacement' === $slug ) {
				capehart_custom_render_heating_replacement();
			}
			?>
		</div>
	</div>
	<?php
}

/**
 * Render the Heating page selected by the current queried page slug.
 *
 * @return string
 */
function capehart_custom_heating_page_shortcode() {
	static $rendering = false;

	if ( $rendering ) {
		return '';
	}

	$slug = capehart_custom_heating_current_slug();

	if ( ! $slug ) {
		return '';
	}

	$rendering = true;
	ob_start();

	if ( 'heating' === $slug ) {
		capehart_custom_render_heating_hub();
	} else {
		capehart_custom_render_heating_child( $slug );
	}

	$output    = (string) ob_get_clean();
	$rendering = false;

	return $output;
}
add_shortcode( 'capehart_heating_page', 'capehart_custom_heating_page_shortcode' );

/**
 * Add stable layout and page-specific hooks to Heating body classes.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function capehart_custom_heating_body_classes( $classes ) {
	$slug = capehart_custom_heating_current_slug();

	if ( ! $slug ) {
		return $classes;
	}

	$classes[] = 'ch-cooling-page';
	$classes[] = 'ch-heating-page';
	$classes[] = 'heating' === $slug ? 'ch-cooling-hub' : 'ch-cooling-child';
	$classes[] = 'heating' === $slug ? 'ch-heating-hub' : 'ch-heating-child';
	$classes[] = 'ch-heating-' . sanitize_html_class( $slug );

	return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'capehart_custom_heating_body_classes', 20 );

/**
 * Set the configured SEO title in Yoast outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_heating_seo_title( $title ) {
	$page = capehart_custom_heating_page_data( capehart_custom_heating_current_slug() );

	return isset( $page['title'] ) ? $page['title'] : $title;
}
add_filter( 'wpseo_title', 'capehart_custom_heating_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_heating_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_heating_seo_title', 20 );

/**
 * Set the configured description in Yoast search and social outputs.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_heating_seo_description( $description ) {
	$page = capehart_custom_heating_page_data( capehart_custom_heating_current_slug() );

	return isset( $page['meta'] ) ? $page['meta'] : $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_heating_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_heating_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_heating_seo_description', 20 );

/**
 * Give the Heating pages a deliberate social image.
 *
 * @param string $image Existing image URL.
 * @return string
 */
function capehart_custom_heating_social_image( $image ) {
	$page = capehart_custom_heating_page_data( capehart_custom_heating_current_slug() );

	if ( empty( $page['image_id'] ) ) {
		return $image;
	}

	$page_image = wp_get_attachment_image_url( (int) $page['image_id'], 'large' );

	return $page_image ? $page_image : $image;
}
add_filter( 'wpseo_opengraph_image', 'capehart_custom_heating_social_image', 20 );
add_filter( 'wpseo_twitter_image', 'capehart_custom_heating_social_image', 20 );

/**
 * Provide document titles when Yoast SEO is unavailable.
 *
 * @param array<string, string> $parts Document title parts.
 * @return array<string, string>
 */
function capehart_custom_heating_document_title( $parts ) {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return $parts;
	}

	$page = capehart_custom_heating_page_data( capehart_custom_heating_current_slug() );

	if ( isset( $page['title'] ) ) {
		$parts['title'] = $page['title'];
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_heating_document_title', 20 );

/**
 * Print description and social metadata when Yoast SEO is unavailable.
 */
function capehart_custom_heating_meta_fallback() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$page = capehart_custom_heating_page_data( capehart_custom_heating_current_slug() );

	if ( empty( $page ) ) {
		return;
	}

	$url   = get_permalink( get_queried_object_id() );
	$image = ! empty( $page['image_id'] ) ? wp_get_attachment_image_url( (int) $page['image_id'], 'large' ) : '';
	?>
	<meta name="description" content="<?php echo esc_attr( $page['meta'] ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $page['title'] ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $page['meta'] ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<?php if ( $image ) : ?><meta property="og:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $page['title'] ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $page['meta'] ); ?>">
	<?php if ( $image ) : ?><meta name="twitter:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<?php
}
add_action( 'wp_head', 'capehart_custom_heating_meta_fallback', 5 );

/**
 * Build the Service schema entity for one Heating page.
 *
 * @param string $slug Heating page slug.
 * @return array<string, mixed>
 */
function capehart_custom_heating_service_schema( $slug ) {
	$page = capehart_custom_heating_page_data( $slug );

	if ( empty( $page ) ) {
		return array();
	}

	$page_url    = trailingslashit( get_permalink( get_queried_object_id() ) );
	$provider_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$area_served = array();

	foreach ( capehart_custom_heating_service_areas() as $area ) {
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
 * Build the hub FAQPage schema from the exact visible answers.
 *
 * @return array<string, mixed>
 */
function capehart_custom_heating_faq_schema() {
	$page_url  = trailingslashit( get_permalink( get_queried_object_id() ) );
	$questions = array();

	foreach ( capehart_custom_heating_hub_faqs() as $faq ) {
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
		'@id'        => $page_url . '#heating-faq',
		'url'        => $page_url . '#heating-faq',
		'name'       => 'Heating service questions',
		'isPartOf'   => array( '@id' => $page_url ),
		'inLanguage' => 'en-US',
		'mainEntity' => $questions,
	);
}

/**
 * Add one Service node per Heating page and the matching hub FAQPage to Yoast.
 * Existing matching types are enriched instead of duplicated.
 *
 * @param array<int, array<string, mixed>> $graph Yoast schema graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_heating_schema_graph( $graph ) {
	$slug = capehart_custom_heating_current_slug();

	if ( ! $slug || ! is_array( $graph ) ) {
		return $graph;
	}

	$service     = capehart_custom_heating_service_schema( $slug );
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

		if ( 'heating' === $slug && ! $has_faq && in_array( 'FAQPage', $types, true ) ) {
			$faq = capehart_custom_heating_faq_schema();
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

	if ( 'heating' === $slug && ! $has_faq ) {
		$graph[] = capehart_custom_heating_faq_schema();
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_heating_schema_graph', 20 );

/**
 * Print equivalent Heating schema when Yoast SEO is unavailable.
 */
function capehart_custom_heating_schema_fallback() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$slug = capehart_custom_heating_current_slug();

	if ( ! $slug ) {
		return;
	}

	$graph = array( capehart_custom_heating_service_schema( $slug ) );

	if ( 'heating' === $slug ) {
		$graph[] = capehart_custom_heating_faq_schema();
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
add_action( 'wp_head', 'capehart_custom_heating_schema_fallback', 20 );
