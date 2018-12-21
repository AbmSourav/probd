<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="error-404-wrapper">
	<div class="container" id="content" tabindex="-1">

		<div class="row mt-5">
			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">
					<section class="error-404 not-found">

						<header class="page-header mt-3">
							<h1 class="page-title">
								<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'probd' ); ?>
							</h1>
						</header><!-- .page-header -->

						<div class="page-content">

							<p class="my-3">
								<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'probd' ); ?>
							</p>

							<?php get_search_form(); ?>

							<div class="row mt-5">

								<div class="col-md-3">
									<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
								</div><!-- .col -->

								<?php if ( probd_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
									<div class="col-md-3">
										<div class="widget widget_categories">

											<h2 class="widget-title">
												<?php esc_html_e( 'Most Used Categories', 'probd' ); ?>
											</h2>
											<ul>
												<?php
												wp_list_categories( array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												) );
												?>
											</ul>

										</div><!-- .widget -->
									</div><!-- .col -->

								<?php endif; ?>

								<div class="col-md-3">
									<?php
									/* translators: %1$s: smiley */
									$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'probd' ), convert_smilies( ':)' ) ) . '</p>';
									the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
									?>
								</div><!-- .col -->

								<div class="col-md-3">	
									<?php
									the_widget( 'WP_Widget_Tag_Cloud' );
									?>
								</div><!-- .col -->

							</div><!-- .row -->

						</div><!-- .page-content -->

					</section><!-- .error-404 -->
				</main><!-- #main -->

			</div><!-- .col #primary -->
		</div><!-- .row -->

	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>