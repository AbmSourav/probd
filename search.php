<?php
/**
 * The template for displaying search results pages.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="search-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row mt-3">

			<div class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8
							<?php else : ?>col-md-12<?php endif; ?> content-area"
				 id="primary">

				<main class="site-main" id="main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header mb-5">
							
							<h1 class="page-title">
								<?php printf( esc_html__( 'Search Results for: %s', 'probd' ),
								'<span>' . get_search_query() . '</span>' ); ?>
							</h1>

						</header><!-- .page-header -->

						<!-- Start the Loop -->
						<?php while ( have_posts() ) : the_post(); ?>
						
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #main -->

			</div><!-- .col -->

			<!-- The pagination component -->
			<?php probd_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
