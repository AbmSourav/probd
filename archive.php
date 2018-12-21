<?php
/**
 * The template for displaying archive pages.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div class="wrapper mt-3" id="archive-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row mt-5">

			<div class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8
							<?php else : ?>col-md-12<?php endif; ?> content-area"
				id="primary">

				<main class="site-main" id="main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header mb-5">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<!-- Start the Loop -->
						<?php while ( have_posts() ) : the_post(); 

							get_template_part( 'loop-templates/content', 'archive' );

							?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>

					<div class="post-pagination d-flex justify-content-center  mt-4">
						<!-- The pagination component -->
						<?php probd_pagination(); ?>
					</div>

				</main><!-- #main -->
				
			</div><!-- .col -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>