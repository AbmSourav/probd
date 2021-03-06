<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
?>
<div class="site" id="page">

	<!-- The Navbar Area -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content">
			<?php esc_html_e( 'Skip to content', 'probd' ); ?>
		</a>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			
			<div class="container-fluid" >

				<!-- Site title as branding in the menu -->
				<?php if ( ! has_custom_logo() ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="site-branding navbar-brand mb-0" id="site-title">
							<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>

					<?php else : ?>
						<span class="site-branding mb-0" id="site-title">
							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
								<?php bloginfo( 'name' ); ?>
							</a>
						</span>

					<?php endif; ?>


				<?php } else {
					the_custom_logo();
				} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'probd' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>

			</div><!-- .container -->

		</nav><!-- .site-navigation -->
			
	</div><!-- #wrapper-navbar end -->
