<?php
/**
 * The template for displaying all single posts.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="single-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'single' ); ?>
						
						<div class="single-post-nav">
							<?php probd_post_nav(); ?>												
						</div>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- .col -->
			
			<!-- Do the right sidebar check -->
			<?php // get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	
	</div><!-- .container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
