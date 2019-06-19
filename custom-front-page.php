<?php
/**
 * This is a custom template for theme.
 * 
 * Template Name: Front Page
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<?php get_template_part( 'page-templates/hero' ); ?>

<div class="wrapper pt-0" id="page-wrapper">
	
	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'frontpage' ); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- .container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>