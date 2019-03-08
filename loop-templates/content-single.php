<?php
/**
 * Single post partial template.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('single-post pt-5 overflow-hidden'); ?> id = "post-<?php the_ID(); ?>">

	<header class="entry-header px-3 my-5 text-center">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php probd_posted_on(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="single-post-img text-center mb-3">
			<?php echo get_the_post_thumbnail( $post->ID, 'single-img' ); ?>
		</div><!-- .single-post-img -->
	<?php endif; ?>

	<div class="entry entry-content mt-1">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'probd' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer text-center post-footer-bg py-3">
		<?php probd_entry_footer(); ?>	
	</footer><!-- .entry-footer -->

</article><!-- #post-# -->