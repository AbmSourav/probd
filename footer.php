<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

	<?php get_template_part( 'sidebar-templates/sidebar', 'footertop' ); ?>

	<div class="wrapper bg-dark text-center" id="wrapper-footer">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">
						
						<div class="site-info text-white">

							<?php probd_site_info(); ?>

						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!-- .col -->

			</div><!-- .row -->

		</div><!-- container end -->

	</div><!-- .wrapper -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>