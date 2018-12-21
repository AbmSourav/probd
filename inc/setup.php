<?php
/**
 * Theme basic setup.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 1024; /* pixels */
}

if ( ! function_exists ( 'probd_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function probd_setup() {
		
		// Make theme available for translation.
		load_theme_textdomain( 'probd', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'probd' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Adding Thumbnail basic support
		add_theme_support( 'post-thumbnails' );

		// Adding custom image size
		add_image_size('card-img', 450, 250, true);
		add_image_size('single-img', 99999, 700, true);
		
		// Add support editor stylesheet.
		add_theme_support( 'editor-styles' );

		// Add supports for responsive Embed fields
		add_theme_support( 'responsive-embeds' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'probd' ),
					'shortName' => __( 'S', 'probd' ),
					'size'      => 12,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'probd' ),
					'shortName' => __( 'M', 'probd' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'probd' ),
					'shortName' => __( 'L', 'probd' ),
					'size'      => 22,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'probd' ),
					'shortName' => __( 'XL', 'probd' ),
					'size'      => 25,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'probd' ),
					'slug'  => 'primary',
					'color' => '#17a2b8',
				),
				array(
					'name'  => __( 'Secondary', 'probd' ),
					'slug'  => 'secondary',
					'color' => '#7bdcb5',
				),
				array(
					'name'  => __( 'Dark Gray', 'probd' ),
					'slug'  => 'dark-gray',
					'color' => '#212529',
				),
				array(
					'name'  => __( 'Light Gray', 'probd' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'probd' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Adding support for Widget edit icons in customizer
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 90,
			'flex-height' => false,
			'flex-width'  => true,
			'header-text' => array( 'site-title' ),
		) );

		// Check and setup theme default settings.
		probd_setup_theme_default_settings();

	}
}
add_action( 'after_setup_theme', 'probd_setup' );


if ( ! function_exists( 'probd_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function probd_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}
add_filter( 'excerpt_more', 'probd_custom_excerpt_more' );


if ( ! function_exists( 'probd_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function probd_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . '...<p><a class="btn btn-outline-info probd-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More',
			'probd' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}
add_filter( 'wp_trim_excerpt', 'probd_all_excerpts_get_more_link' );


if ( ! function_exists( 'probd_custom_excerpt_length' ) && !has_excerpt() ) {
	
	// Filter the except length to 20 words.
	function probd_custom_excerpt_length( $length ) {
		return 20;
	}
}
add_filter( 'excerpt_length', 'probd_custom_excerpt_length', 10 );