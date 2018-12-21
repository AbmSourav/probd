<?php
/**
 * probd enqueue scripts
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'probd_scripts' ) ) {
	
	 // Load theme's JavaScript and CSS sources.
	function probd_scripts() {
		wp_enqueue_style( 'probd-default-style', get_template_directory_uri() . '/assets/css/probd.min.css', array(), '4.1.0' );
		wp_enqueue_style( 'probd-block', get_template_directory_uri() . '/assets/css/block.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'probd-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
		
		wp_enqueue_script( 'probd-default-js', get_template_directory_uri() . '/assets/js/probd.min.js', array( 'jquery' ), '4.1.0', true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
} // endif function_exists( 'probd_scripts' ).
add_action( 'wp_enqueue_scripts', 'probd_scripts' );