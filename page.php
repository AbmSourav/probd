<?php
/**
 * This is the template that displays all pages by default.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="page-wrapper">
	
	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						
						?>

					<?php endwhile; // end of the loop.  
					$gmb_text = get_post_meta( get_the_ID(), '_gmb_text_field', true );
					$gmb_textarea = get_post_meta( get_the_ID(), '_gmb_textarea_field', true );
					echo "<h2>$gmb_text</h2>";
					echo "<p>$gmb_textarea</p>";
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- .container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>