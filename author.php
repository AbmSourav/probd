<?php
/**
 * The template for displaying the author pages.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row mt-5">

			<div class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8 pr-5
							<?php else : ?>col-md-12<?php endif; ?> content-area"
				 id="primary">

				<main class="site-main" id="main">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

					<header class="page-header author-header mb-5">

						<div class="author-detail mb-5">
							
							<div class="author-avatar mr-3">

								<?php if ( ! empty( $curauth->ID ) ) : ?>

									<?php echo get_avatar( $curauth->ID ); ?>

								<?php endif; ?>

							</div><!-- .author-avatar -->

							<div class="author-meta">

								<h4><?php echo esc_html( $curauth->nickname ); ?></h4>

								<?php if ( ! empty( $curauth->user_description ) ) : ?>

									<p><?php echo esc_html( $curauth->user_description ); ?></p>

								<?php endif; ?>

								<?php if ( ! empty( $curauth->user_url ) ) : ?>

									<a href="<?php echo esc_url( $curauth->user_url ); ?>">

										<?php echo esc_html( $curauth->user_url ); ?>
										
									</a>

								<?php endif; ?>

							</div><!-- .author-meta -->

						</div><!-- .author-detail -->

						<h3>
							<?php esc_html_e( 'Posts by ', 'probd' ); ?> 
							<?php echo esc_html( $curauth->nickname ); ?>
						</h3>

					</header><!-- .page-header -->
					
					<?php if ( have_posts() ) : ?>

						<!-- Start the Loop -->
						<?php while ( have_posts() ) : the_post(); 

							get_template_part( 'loop-templates/content', 'archive' );
							
							?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<div class="post-pagination d-flex justify-content-center mt-4">
						<!-- The pagination component -->
						<?php probd_pagination(); ?>
					</div>

				</main><!-- #main -->
			</div><!-- .col -->

			<!-- right sidebar -->
			<?php get_sidebar('right-sidebar') ?>

		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>