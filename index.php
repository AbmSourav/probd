<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="index-wrapper">

	<div class="container" id="content" tabindex="-1">
		<main class="site-main mt-5" id="main">

			<div class="row">
				<div class="card-columns mt-5">

					<?php if ( have_posts() ) : ?>

						<!-- Start the Loop -->
						<?php 
						while ( have_posts() ) : the_post();
							/**
							 * Include the Post-Format-specific template for the content.
							 */
							get_template_part( 'loop-templates/content', get_post_format() );
							?>

						<?php endwhile; ?>

						<?php else :  get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</div><!-- .card-columns -->
			</div><!-- .row -->
			
			<div class="post-pagination d-flex justify-content-center  mt-4">
				<!-- The pagination component -->
				<?php probd_pagination(); ?>
			</div><!-- .post-pagination -->

			<div class="all-tax mt-5 px-3 text-center">
				<?php 
				if ( is_home() || is_front_page() && has_tag() ) {
					$probd_tags = get_tags();
					foreach ( $probd_tags as $probd_tag ) {
						$probd_tag_link = get_tag_link( $probd_tag->term_id ); ?>
						<a class="all-tags badge badge-secondary text-white" href="<?php echo esc_url( $probd_tag_link ); ?>">
							<?php echo esc_html( $probd_tag->name ); ?>
						</a>
				<?php }
				} else {
					the_tags('', '', '');
				}
				?>
			</div><!-- .all-tax -->

		</main><!-- #main -->
	</div><!-- Container end -->

</div><!-- .wrapper -->

<?php get_footer(); ?>