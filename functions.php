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
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_enqueue_assets' );

/**
 * Register Amelia's native dialog for the global booking triggers.
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
	$markup  = $trigger . do_shortcode( $shortcode );

	return $markup;
}
add_shortcode( 'capehart_amelia_booking_modal', 'capehart_custom_booking_modal_shortcode' );

/**
 * Let Amelia enqueue its dialog stylesheet before wp_head prints styles.
 */
function capehart_custom_prime_booking_modal() {
	capehart_custom_booking_modal_shortcode();
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_prime_booking_modal', 20 );

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
