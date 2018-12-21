<?php
/**
 * probd Theme Customizer
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'probd_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function probd_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport	= 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '#site-title a',
					'render_callback' => 'probd_customize_partial_blogname',
				)
			);
			$wp_customize->selective_refresh->add_partial( 
				'blogdescription', 
				array(
				'selector'            => '#site-description',
				'container_inclusive' => false,
				'render_callback'     => 'probd_customize_partial_blogdescription',
			) );
		}

	}
}
add_action( 'customize_register', 'probd_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function probd_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function probd_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


if ( ! function_exists( 'probd_color_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function probd_color_customize_register( $wp_customize ) {

		$wp_customize->add_section( 'probd_color_schemes', array(
			'title'      => __( 'Color Scheme', 'probd' ),
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'priority'   => 30,
		) );

		$wp_customize->add_setting( 'probd_text_color', array(
			'default'           => '#212529',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
			'label'    => __( 'Text Color', 'probd' ),
			'section'  => 'probd_color_schemes',
			'settings' => 'probd_text_color',
		) ) );

		$wp_customize->add_setting( 'probd_theme_options_link_color', array(
			'default'           => '#17a2b8',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		) );		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label'    => __( 'Link Color', 'probd' ),
			'section'  => 'probd_color_schemes',
			'settings' => 'probd_theme_options_link_color',
		) ) );

	}
}
add_action( 'customize_register', 'probd_color_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'probd_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function probd_customize_preview_js() {
		wp_enqueue_script( 'probd_customizer', get_template_directory_uri() . '/assets/js/customizer.js',
			array( 'jquery', 'customize-preview' ), time(), true
		);
	}
}
add_action( 'customize_preview_init', 'probd_customize_preview_js' );
