<?php
/**
 * Capehart Custom theme functions.
 *
 * @package Capehart_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CAPEHART_CUSTOM_VERSION', '1.0.0' );

$capehart_cooling_pages_file = __DIR__ . '/inc/cooling-pages.php';
$capehart_heating_pages_file = __DIR__ . '/inc/heating-pages.php';
$capehart_services_page_file = __DIR__ . '/inc/services-page.php';
$capehart_about_page_file    = __DIR__ . '/inc/about-page.php';
$capehart_contact_page_file  = __DIR__ . '/inc/contact-page.php';

if ( is_readable( $capehart_cooling_pages_file ) ) {
	require_once $capehart_cooling_pages_file;
}

if ( is_readable( $capehart_heating_pages_file ) ) {
	require_once $capehart_heating_pages_file;
}

if ( is_readable( $capehart_services_page_file ) ) {
	require_once $capehart_services_page_file;
}

if ( is_readable( $capehart_about_page_file ) ) {
	require_once $capehart_about_page_file;
}

if ( is_readable( $capehart_contact_page_file ) ) {
	require_once $capehart_contact_page_file;
}

/**
 * Set up theme support shared by the front end and block editor.
 */
function capehart_custom_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 160,
			'width'                => 480,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => false,
		)
	);

	add_editor_style(
		array(
			'assets/css/theme.css',
			'assets/css/editor.css',
		)
	);

	add_image_size( 'capehart-card', 720, 405, true );
	add_image_size( 'capehart-hero', 1440, 810, true );

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'capehart-custom' ),
			'footer'  => __( 'Footer navigation', 'capehart-custom' ),
		)
	);
}
add_action( 'after_setup_theme', 'capehart_custom_setup' );

/**
 * Keep Yoast as the single document-title source when it is active.
 *
 * WordPress core's classic and block-template title renderers can both be
 * registered after the theme is loaded. Removing them at the start of
 * wp_head keeps Yoast as the only title source while preserving WordPress'
 * native fallback whenever Yoast is unavailable.
 */
function capehart_custom_prevent_duplicate_document_title() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		remove_action( 'wp_head', '_wp_render_title_tag', 1 );
		remove_action( 'wp_head', '_block_template_render_title_tag', 1 );
	}
}
add_action( 'wp_head', 'capehart_custom_prevent_duplicate_document_title', 0 );

/**
 * Load the dependency-free front-end theme assets.
 */
function capehart_custom_enqueue_assets() {
	wp_enqueue_style(
		'capehart-custom',
		get_theme_file_uri( 'assets/css/theme.css' ),
		array(),
		file_exists( get_theme_file_path( 'assets/css/theme.css' ) )
			? (string) filemtime( get_theme_file_path( 'assets/css/theme.css' ) )
			: CAPEHART_CUSTOM_VERSION
	);

	$cooling_stylesheet = get_theme_file_path( 'assets/css/cooling.css' );

	if (
		is_page(
			array(
				'air-conditioning',
				'ac-repair-kiefer-ok',
				'ac-repair-tulsa-ok',
				'air-conditioning-maintenance',
				'ac-installation-tulsa-ok',
				'air-conditioning-replacement',
				'emergency-ac-repair',
				'heating',
				'furnace-repair',
				'furnace-maintenance',
				'furnace-replacement',
			)
		)
		&& is_readable( $cooling_stylesheet )
	) {
		wp_enqueue_style(
			'capehart-cooling-pages',
			get_theme_file_uri( 'assets/css/cooling.css' ),
			array( 'capehart-custom' ),
			(string) filemtime( $cooling_stylesheet )
		);
	}

	$heating_stylesheet = get_theme_file_path( 'assets/css/heating.css' );

	if (
		is_page(
			array(
				'heating',
				'furnace-repair',
				'furnace-maintenance',
				'furnace-replacement',
			)
		)
		&& is_readable( $heating_stylesheet )
	) {
		wp_enqueue_style(
			'capehart-heating-pages',
			get_theme_file_uri( 'assets/css/heating.css' ),
			array( 'capehart-cooling-pages' ),
			(string) filemtime( $heating_stylesheet )
		);
	}

	$services_stylesheet = get_theme_file_path( 'assets/css/services.css' );

	if ( is_page( 'services' ) && is_readable( $services_stylesheet ) ) {
		wp_enqueue_style(
			'capehart-services-page',
			get_theme_file_uri( 'assets/css/services.css' ),
			array( 'capehart-custom' ),
			(string) filemtime( $services_stylesheet )
		);
	}

	$about_stylesheet = get_theme_file_path( 'assets/css/about.css' );

	if ( is_page( 'about-us' ) && is_readable( $about_stylesheet ) ) {
		wp_enqueue_style(
			'capehart-about-page',
			get_theme_file_uri( 'assets/css/about.css' ),
			array( 'capehart-custom' ),
			(string) filemtime( $about_stylesheet )
		);
	}

	$contact_stylesheet = get_theme_file_path( 'assets/css/contact.css' );

	if ( is_page( 'contact' ) && is_readable( $contact_stylesheet ) ) {
		wp_enqueue_style(
			'capehart-contact-page',
			get_theme_file_uri( 'assets/css/contact.css' ),
			array( 'capehart-custom' ),
			(string) filemtime( $contact_stylesheet )
		);
	}

	$floating_cta_script = get_theme_file_path( 'assets/js/floating-cta.js' );

	if ( file_exists( $floating_cta_script ) ) {
		wp_enqueue_script(
			'capehart-floating-cta',
			get_theme_file_uri( 'assets/js/floating-cta.js' ),
			array(),
			(string) filemtime( $floating_cta_script ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}

	$booking_modal_script = get_theme_file_path( 'assets/js/booking-modal.js' );

	if ( file_exists( $booking_modal_script ) ) {
		wp_enqueue_script(
			'capehart-booking-modal',
			get_theme_file_uri( 'assets/js/booking-modal.js' ),
			array(),
			(string) filemtime( $booking_modal_script ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}

	$mobile_navigation_script = get_theme_file_path( 'assets/js/mobile-navigation.js' );

	if ( file_exists( $mobile_navigation_script ) ) {
		wp_enqueue_script(
			'capehart-mobile-navigation',
			get_theme_file_uri( 'assets/js/mobile-navigation.js' ),
			array(),
			(string) filemtime( $mobile_navigation_script ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_enqueue_assets' );

/**
 * Catch appointment clicks before the deferred modal controller is available.
 *
 * The small head bridge prevents a fast tap from following the fallback URL
 * while Amelia's larger JavaScript bundle is still loading. The full modal
 * controller takes over the pending request as soon as it executes.
 */
function capehart_custom_output_booking_click_bridge() {
	if ( is_admin() || is_page( 'book-appointment' ) || ! shortcode_exists( 'ameliastepbooking' ) ) {
		return;
	}
	?>
	<script id="capehart-booking-click-bridge">
	(function () {
		'use strict';

		var pending = null;
		var fallbackTimer = 0;
		var bookingPath = '/book-appointment';

		function clearPending() {
			if (fallbackTimer) {
				window.clearTimeout(fallbackTimer);
			}

			if (pending && pending.link && pending.link.isConnected) {
				pending.link.removeAttribute('aria-busy');
				pending.link.classList.remove('is-booking-pending');
			}

			pending = null;
			fallbackTimer = 0;
		}

		function isBookingLink(link) {
			var url;

			try {
				url = new URL(link.href, window.location.href);
			} catch (error) {
				return false;
			}

			return url.origin === window.location.origin &&
				url.pathname.replace(/\/+$/, '') === bookingPath;
		}

		function shouldPreserveNavigation(event, link) {
			return event.defaultPrevented ||
				event.button !== 0 ||
				event.metaKey ||
				event.ctrlKey ||
				event.shiftKey ||
				event.altKey ||
				link.hasAttribute('download') ||
				(link.target && link.target.toLowerCase() !== '_self');
		}

		function interceptClick(event) {
			var target = event.target instanceof Element ? event.target : null;
			var link = target ? target.closest('a.ch-booking-trigger[href]') : null;
			var fallbackUrl;

			if (!link || !isBookingLink(link) || shouldPreserveNavigation(event, link)) {
				return;
			}

			event.preventDefault();

			if (pending) {
				return;
			}

			fallbackUrl = link.href;
			pending = {
				link: link,
				url: fallbackUrl,
				startedAt: Date.now()
			};
			link.setAttribute('aria-busy', 'true');
			link.classList.add('is-booking-pending');
			fallbackTimer = window.setTimeout(function () {
				clearPending();
				window.location.assign(fallbackUrl);
			}, 10000);
		}

		function cancelPendingOnEscape(event) {
			if (event.key !== 'Escape' || event.defaultPrevented || !pending) {
				return;
			}

			event.preventDefault();
			clearPending();
		}

		document.addEventListener('click', interceptClick, true);
		document.addEventListener('keydown', cancelPendingOnEscape, true);
		window.capehartBookingBridge = {
			take: function () {
				var request = pending;

				document.removeEventListener('click', interceptClick, true);
				document.removeEventListener('keydown', cancelPendingOnEscape, true);
				if (fallbackTimer) {
					window.clearTimeout(fallbackTimer);
				}
				pending = null;
				fallbackTimer = 0;

				return request;
			},
			cancel: clearPending
		};

		window.addEventListener('pagehide', clearPending);
	})();
	</script>
	<?php
}
add_action( 'wp_head', 'capehart_custom_output_booking_click_bridge', 1 );

/**
 * Build Amelia's native dialog for the global booking triggers.
 *
 * The standalone appointment page keeps its own form as a no-JavaScript
 * fallback, so the modal copy is intentionally omitted there.
 *
 * @return string Rendered Amelia booking form or an empty string.
 */
function capehart_custom_booking_modal_shortcode() {
	static $markup = null;

	if ( null !== $markup ) {
		return $markup;
	}

	if ( is_admin() || is_page( 'book-appointment' ) || ! shortcode_exists( 'ameliastepbooking' ) ) {
		$markup = '';

		return $markup;
	}

	$page_id   = get_queried_object_id();
	$page_slug = $page_id ? (string) get_post_field( 'post_name', $page_id ) : '';

	$category_by_page = array(
		'air-conditioning'             => 1,
		'air-conditioning-maintenance' => 1,
		'air-conditioning-replacement' => 1,
		'ac-installation-tulsa-ok'      => 1,
		'ac-repair-kiefer-ok'           => 1,
		'ac-repair-tulsa-ok'            => 1,
		'emergency-ac-repair'           => 1,
		'heating'                       => 2,
		'furnace-repair'                => 2,
		'furnace-maintenance'           => 2,
		'furnace-replacement'           => 2,
		'dryer-vent-cleaning-tulsa'     => 3,
	);

	$category_id = isset( $category_by_page[ $page_slug ] )
		? (int) $category_by_page[ $page_slug ]
		: 0;

	if ( ! $category_id && 0 === strpos( $page_slug, 'air-conditioning-' ) ) {
		$category_id = 1;
	} elseif ( ! $category_id && 0 === strpos( $page_slug, 'furnace-' ) ) {
		$category_id = 2;
	} elseif ( ! $category_id && 0 === strpos( $page_slug, 'dryer-vent-cleaning-' ) ) {
		$category_id = 3;
	}

	$shortcode_attributes = 'trigger=ch-amelia-native-trigger trigger_type=id in_dialog=1';
	$shortcode            = $category_id
		? sprintf( '[ameliastepbooking %s category=%d]', $shortcode_attributes, $category_id )
		: sprintf( '[ameliastepbooking %s]', $shortcode_attributes );

	$trigger = '<button id="ch-amelia-native-trigger" type="button" hidden tabindex="-1" aria-hidden="true" style="pointer-events:none"></button>';
	$markup  = '<div id="ch-amelia-native-host">' . $trigger . do_shortcode( $shortcode ) . '</div>';

	return $markup;
}
/**
 * Let Amelia enqueue its dialog stylesheet before wp_head prints styles.
 */
function capehart_custom_prime_booking_modal() {
	capehart_custom_booking_modal_shortcode();
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_prime_booking_modal', 20 );

/**
 * Print the cached dialog markup before footer scripts execute.
 */
function capehart_custom_output_booking_modal() {
	// Amelia returns the executable markup required to mount its Vue dialog.
	echo capehart_custom_booking_modal_shortcode(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_footer', 'capehart_custom_output_booking_modal', 5 );

/**
 * Turn every same-site appointment link into an Amelia dialog trigger.
 *
 * The href remains in place as a no-JavaScript fallback and direct target for
 * the standalone booking page.
 *
 * @param string $block_content Rendered block markup.
 * @return string
 */
function capehart_custom_add_booking_trigger_class( $block_content ) {
	if (
		is_admin()
		|| is_page( 'book-appointment' )
		|| ! shortcode_exists( 'ameliastepbooking' )
		|| ! class_exists( 'WP_HTML_Tag_Processor' )
		|| false === stripos( $block_content, 'book-appointment' )
	) {
		return $block_content;
	}

	$processor = new WP_HTML_Tag_Processor( $block_content );
	$home_host = (string) wp_parse_url( home_url( '/' ), PHP_URL_HOST );

	while ( $processor->next_tag( 'a' ) ) {
		$href = $processor->get_attribute( 'href' );

		if ( ! is_string( $href ) || '' === $href ) {
			continue;
		}

		$link_host = (string) wp_parse_url( $href, PHP_URL_HOST );
		$link_path = (string) wp_parse_url( $href, PHP_URL_PATH );

		if ( ( $link_host && 0 !== strcasecmp( $link_host, $home_host ) ) || '/book-appointment' !== untrailingslashit( $link_path ) ) {
			continue;
		}

		$processor->add_class( 'ch-booking-trigger' );
		$processor->set_attribute( 'aria-haspopup', 'dialog' );
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block', 'capehart_custom_add_booking_trigger_class', 20 );

/**
 * Give the header navigation one concise landmark label.
 *
 * Core can duplicate a Navigation block's ariaLabel while merging wrapper
 * attributes, so the label is applied to the rendered header navigation.
 *
 * @param string $block_content Rendered Navigation block markup.
 * @param array  $block         Parsed block data.
 * @return string
 */
function capehart_custom_label_primary_navigation( $block_content, $block ) {
	$class_name = isset( $block['attrs']['className'] ) ? (string) $block['attrs']['className'] : '';

	if (
		! class_exists( 'WP_HTML_Tag_Processor' )
		|| ! preg_match( '/(?:^|\s)ch-nav(?:\s|$)/', $class_name )
	) {
		return $block_content;
	}

	$processor = new WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag( 'nav' ) ) {
		$processor->set_attribute( 'aria-label', __( 'Primary navigation', 'capehart-custom' ) );
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block_core/navigation', 'capehart_custom_label_primary_navigation', 10, 2 );

/**
 * Group the bundled theme patterns and expose the theme button variants.
 */
function capehart_custom_register_block_assets() {
	add_post_type_support( 'page', 'excerpt' );

	register_block_pattern_category(
		'capehart',
		array(
			'label' => __( 'Capehart', 'capehart-custom' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'ch-navy',
			'label' => __( 'Capehart Navy', 'capehart-custom' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'ch-outline',
			'label' => __( 'Capehart Outline', 'capehart-custom' ),
		)
	);
}
add_action( 'init', 'capehart_custom_register_block_assets' );

/**
 * Keep archive cards concise while leaving hand-written excerpts untouched.
 *
 * @param int $length Existing excerpt length.
 * @return int
 */
function capehart_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}

	return 28;
}
add_filter( 'excerpt_length', 'capehart_custom_excerpt_length', 20 );

/**
 * Use a clear text continuation for generated excerpts.
 *
 * @param string $more Existing continuation string.
 * @return string
 */
function capehart_custom_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	return '&hellip;';
}
add_filter( 'excerpt_more', 'capehart_custom_excerpt_more' );

/**
 * Add a stable namespace hook without depending on a page builder.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function capehart_custom_body_classes( $classes ) {
	$classes[] = 'capehart-site';

	return $classes;
}
add_filter( 'body_class', 'capehart_custom_body_classes' );

/**
 * Output a copyright line that never needs a manual year update.
 *
 * @return string
 */
function capehart_custom_copyright_shortcode() {
	return sprintf(
		/* translators: 1: current year, 2: site name. */
		esc_html__( '© %1$s %2$s. All rights reserved.', 'capehart-custom' ),
		esc_html( wp_date( 'Y' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);
}
add_shortcode( 'capehart_copyright', 'capehart_custom_copyright_shortcode' );

/**
 * Return the verified residential service area used on the homepage and in
 * structured data. Keeping one source prevents the visible copy and schema
 * from drifting apart.
 *
 * @return string[]
 */
function capehart_custom_homepage_service_areas() {
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
 * Return the visible homepage FAQs for both the Details blocks and JSON-LD.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function capehart_custom_homepage_faqs() {
	return array(
		array(
			'question' => __( 'Where is Capehart Heating & Cooling based?', 'capehart-custom' ),
			'answer'   => __( 'Capehart Heating & Cooling is based in Kiefer, Oklahoma. The company serves homeowners in Kiefer and communities throughout the Greater Tulsa area.', 'capehart-custom' ),
		),
		array(
			'question' => __( 'What areas does Capehart serve?', 'capehart-custom' ),
			'answer'   => __( 'The residential service area includes Kiefer, Tulsa, Broken Arrow, Bixby, Jenks, Glenpool, Sapulpa, Sand Springs, Owasso, Catoosa, Mounds, Kellyville, Bristow, and Mannford. Contact Capehart with the property address to confirm current coverage and availability.', 'capehart-custom' ),
		),
		array(
			'question' => __( 'What heating and cooling services can I schedule?', 'capehart-custom' ),
			'answer'   => __( 'Capehart provides air conditioning and heating repair, seasonal maintenance, installation, and replacement planning. Dryer vent cleaning is also available as a separate home-care service.', 'capehart-custom' ),
		),
		array(
			'question' => __( 'Should I request repair, maintenance, or replacement planning?', 'capehart-custom' ),
			'answer'   => __( 'Choose repair for an active fault such as no cooling, no heat, or unreliable operation. Maintenance is intended for equipment that is currently operating, while replacement planning makes sense when age, comfort, efficiency concerns, or repair history create a larger decision.', 'capehart-custom' ),
		),
		array(
			'question' => __( 'What information should I provide when scheduling?', 'capehart-custom' ),
			'answer'   => __( 'Provide the service address, the type of equipment involved, what the system is doing, and when the problem began. Include model information only when it is easy to read safely; do not remove panels or handle electrical, gas, or refrigerant components.', 'capehart-custom' ),
		),
	);
}

/**
 * Give the homepage a focused local-company title in Yoast SEO outputs.
 *
 * @param string $title Existing title.
 * @return string
 */
function capehart_custom_homepage_seo_title( $title ) {
	if ( is_front_page() ) {
		return __( 'HVAC Company in Kiefer, OK | Capehart Heating & Cooling', 'capehart-custom' );
	}

	return $title;
}
add_filter( 'wpseo_title', 'capehart_custom_homepage_seo_title', 20 );
add_filter( 'wpseo_opengraph_title', 'capehart_custom_homepage_seo_title', 20 );
add_filter( 'wpseo_twitter_title', 'capehart_custom_homepage_seo_title', 20 );

/**
 * Give the homepage a concise description that matches the visible offer.
 *
 * @param string $description Existing description.
 * @return string
 */
function capehart_custom_homepage_seo_description( $description ) {
	if ( is_front_page() ) {
		return __( 'Kiefer-based Capehart provides heating and air conditioning repair, maintenance and replacement across Greater Tulsa. Call or schedule HVAC service online.', 'capehart-custom' );
	}

	return $description;
}
add_filter( 'wpseo_metadesc', 'capehart_custom_homepage_seo_description', 20 );
add_filter( 'wpseo_opengraph_desc', 'capehart_custom_homepage_seo_description', 20 );
add_filter( 'wpseo_twitter_description', 'capehart_custom_homepage_seo_description', 20 );

/**
 * Provide core title and description fallbacks when Yoast SEO is unavailable.
 *
 * @param array<string, string> $parts Document title parts.
 * @return array<string, string>
 */
function capehart_custom_homepage_document_title( $parts ) {
	if ( is_front_page() && ! defined( 'WPSEO_VERSION' ) ) {
		$parts['title'] = __( 'HVAC Company in Kiefer, OK | Capehart Heating & Cooling', 'capehart-custom' );
		unset( $parts['site'], $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'capehart_custom_homepage_document_title', 20 );

/**
 * Output a description fallback only when no Yoast head presenter is active.
 */
function capehart_custom_homepage_meta_fallback() {
	if ( ! is_front_page() || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	printf(
		'<meta name="description" content="%s">' . "\n",
		esc_attr( capehart_custom_homepage_seo_description( '' ) )
	);
}
add_action( 'wp_head', 'capehart_custom_homepage_meta_fallback', 5 );

/**
 * Enrich Yoast's existing Organization entity as an HVAC business and append
 * FAQ schema generated from the same answers visitors can read on the page.
 *
 * @param array<int, array<string, mixed>> $graph Yoast schema graph.
 * @return array<int, array<string, mixed>>
 */
function capehart_custom_homepage_schema_graph( $graph ) {
	if ( ! is_front_page() || ! is_array( $graph ) ) {
		return $graph;
	}

	$home_url     = trailingslashit( home_url( '/' ) );
	$area_served  = array();
	$has_business = false;
	$has_faq      = false;

	foreach ( capehart_custom_homepage_service_areas() as $area ) {
		$area_served[] = array(
			'@type' => 'City',
			'name'  => $area . ', Oklahoma',
		);
	}

	foreach ( $graph as &$piece ) {
		$types = isset( $piece['@type'] ) ? (array) $piece['@type'] : array();
		$id    = isset( $piece['@id'] ) ? (string) $piece['@id'] : '';

		if ( in_array( 'FAQPage', $types, true ) ) {
			$has_faq = true;
		}

		if ( in_array( 'Organization', $types, true ) || $home_url . '#organization' === $id ) {
			$piece['@type']      = 'HVACBusiness';
			$piece['name']       = 'Capehart Heating & Cooling';
			$piece['legalName']  = 'Capehart Heating & Cooling';
			$piece['url']        = $home_url;
			$piece['telephone']  = '+1-918-771-1218';
			$piece['address']    = array(
				'@type'           => 'PostalAddress',
				'addressLocality' => 'Kiefer',
				'addressRegion'   => 'OK',
				'addressCountry'  => 'US',
			);
			$piece['areaServed'] = $area_served;
			$has_business        = true;
		}
	}
	unset( $piece );

	if ( ! $has_business ) {
		$graph[] = array(
			'@type'      => 'HVACBusiness',
			'@id'        => $home_url . '#organization',
			'name'       => 'Capehart Heating & Cooling',
			'legalName'  => 'Capehart Heating & Cooling',
			'url'        => $home_url,
			'telephone'  => '+1-918-771-1218',
			'address'    => array(
				'@type'           => 'PostalAddress',
				'addressLocality' => 'Kiefer',
				'addressRegion'   => 'OK',
				'addressCountry'  => 'US',
			),
			'areaServed' => $area_served,
		);
	}

	if ( ! $has_faq ) {
		$main_entity = array();

		foreach ( capehart_custom_homepage_faqs() as $faq ) {
			$main_entity[] = array(
				'@type'          => 'Question',
				'name'           => wp_strip_all_tags( $faq['question'] ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => wp_strip_all_tags( $faq['answer'] ),
				),
			);
		}

		$graph[] = array(
			'@type'      => 'FAQPage',
			'@id'        => $home_url . '#homepage-faq',
			'url'        => $home_url . '#homepage-faq',
			'name'       => 'Capehart Heating & Cooling service FAQs',
			'isPartOf'   => array( '@id' => $home_url ),
			'inLanguage' => 'en-US',
			'mainEntity' => $main_entity,
		);
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'capehart_custom_homepage_schema_graph', 20 );

/**
 * Print equivalent homepage schema when Yoast SEO is unavailable.
 */
function capehart_custom_homepage_schema_fallback() {
	if ( ! is_front_page() || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$home_url    = trailingslashit( home_url( '/' ) );
	$area_served = array();
	$questions   = array();

	foreach ( capehart_custom_homepage_service_areas() as $area ) {
		$area_served[] = array(
			'@type' => 'City',
			'name'  => $area . ', Oklahoma',
		);
	}

	foreach ( capehart_custom_homepage_faqs() as $faq ) {
		$questions[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $faq['question'] ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $faq['answer'] ),
			),
		);
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'      => 'HVACBusiness',
				'@id'        => $home_url . '#organization',
				'name'       => 'Capehart Heating & Cooling',
				'legalName'  => 'Capehart Heating & Cooling',
				'url'        => $home_url,
				'telephone'  => '+1-918-771-1218',
				'address'    => array(
					'@type'           => 'PostalAddress',
					'addressLocality' => 'Kiefer',
					'addressRegion'   => 'OK',
					'addressCountry'  => 'US',
				),
				'areaServed' => $area_served,
			),
			array(
				'@type'      => 'FAQPage',
				'@id'        => $home_url . '#homepage-faq',
				'url'        => $home_url . '#homepage-faq',
				'name'       => 'Capehart Heating & Cooling service FAQs',
				'inLanguage' => 'en-US',
				'mainEntity' => $questions,
			),
		),
	);

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
add_action( 'wp_head', 'capehart_custom_homepage_schema_fallback', 20 );

/**
 * Render the repository-owned homepage layout without relying on the theme
 * pattern registry. Some persistent WordPress object-cache configurations can
 * lag behind a deployment when a brand-new pattern file is introduced.
 *
 * @return string Rendered homepage blocks.
 */
function capehart_custom_homepage_shortcode() {
	$pattern_file = get_theme_file_path( 'patterns/home-seo-landing.php' );

	if ( ! is_readable( $pattern_file ) ) {
		return '';
	}

	ob_start();
	include $pattern_file;
	$pattern_content = (string) ob_get_clean();

	return do_blocks( $pattern_content );
}
add_shortcode( 'capehart_homepage', 'capehart_custom_homepage_shortcode' );

/**
 * Replace the media-library placeholder alt text on the shared site logo.
 *
 * @param string $html Rendered custom-logo markup.
 * @return string
 */
function capehart_custom_logo_alt_text( $html ) {
	if ( ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $html;
	}

	$processor = new WP_HTML_Tag_Processor( $html );

	if ( $processor->next_tag( 'img' ) ) {
		$processor->set_attribute( 'alt', __( 'Capehart Heating & Cooling', 'capehart-custom' ) );
	}

	return $processor->get_updated_html();
}
add_filter( 'get_custom_logo', 'capehart_custom_logo_alt_text', 20 );
