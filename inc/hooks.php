<?php
/**
 * Custom hooks.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'probd_site_info' ) ) {
  /**
   * Add site info hook to WP hook library.
   */
  function probd_site_info() {
    do_action( 'probd_site_info' );
  }
}

if ( ! function_exists( 'probd_add_site_info' ) ) {

  // Add site info content.
  function probd_add_site_info() {
    $the_theme = wp_get_theme();
    
    $site_info = sprintf(
      '<span>%1$s</span>
      <span class="sep"> | </span>
      <a href="%2$s">%3$s</a>
      <a href="%4$s">%5$s</a>
      <a href="%6$s">%7$s</a>',
      esc_html( 'Copyright &copy; 2018 ', 'probd' ),
      esc_url( 'https://wordpress.org/' ),
      sprintf(
        /* translators:*/
        esc_html__( 'Powered by %s. ', 'probd' ), 'WordPress'
      ),
      esc_url( 'https://abmsourav.com/probd' ),
      sprintf(
        /* translators:*/
        esc_html__( '%s - ', 'probd' ), 'proBD'
      ),
      esc_url( 'https://abmsourav.com' ),
      sprintf(
        /* translators:*/
        esc_html__( '%s', 'probd' ), 'Keramot UL Islam'
      )
    );
    echo apply_filters( 'probd_site_info_content', $site_info ); // WPCS: XSS ok.

  }
  add_action( 'probd_site_info', 'probd_add_site_info' );
}
