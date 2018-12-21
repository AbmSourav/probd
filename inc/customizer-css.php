<?php
/**
 * Customizer css style
 */

function probd_customize_css() { 
    ?>
         <style type="text/css">
            
			#page { color: <?php echo esc_attr( get_theme_mod('probd_text_color', '#212529') ); ?>; }

            .wrapper a { color: <?php echo esc_attr( get_theme_mod('probd_theme_options_link_color', '#17a2b8') ); ?>; }

         </style>
    <?php
}
add_action( 'wp_head', 'probd_customize_css');