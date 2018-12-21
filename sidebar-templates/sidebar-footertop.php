<?php
/**
 * Sidebar setup for footer full.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'footertop' ) ) {
	return;
}

?>

<?php if ( is_active_sidebar( 'footertop' ) ) : ?>

	<!-- The Footer Top Full-width Widget Area -->

	<div class="wrapper bg-dark text-white px-3 mt-5" id="wrapper-footer-full">

		<div class="container-fluid" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'footertop' ); ?>

			</div><!-- .row -->

		</div><!-- .container end -->

	</div><!-- #wrapper-footer-full -->

<?php endif; ?>
