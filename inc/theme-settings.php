<?php
/**
 * Check and setup theme's default settings
 *
 * @package probd
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists ( 'probd_setup_theme_default_settings' ) ) {
	function probd_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$probd_posts_index_style = get_theme_mod( 'probd_posts_index_style' );
		if ( '' == $probd_posts_index_style ) {
			set_theme_mod( 'probd_posts_index_style', 'default' );
		}

		// Sidebar position.
		$probd_sidebar_position = get_theme_mod( 'probd_sidebar_position' );
		if ( '' == $probd_sidebar_position ) {
			set_theme_mod( 'probd_sidebar_position', 'right' );
		}
		
	}
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if ( ! function_exists ( 'probd_pingback_header' ) ) {
	function probd_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
add_action( 'wp_head', 'probd_pingback_header' );