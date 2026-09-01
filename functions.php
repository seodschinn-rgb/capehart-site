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
}
add_action( 'wp_enqueue_scripts', 'capehart_custom_enqueue_assets' );

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
