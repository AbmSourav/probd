<?php
/**
 * Partial template for content in page.php
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('overflow-hidden pt-5'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header my-5">

		<?php the_title( '<h1 class="entry-title mb-5 text-center">', '</h1>' ); ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="page-featured-img text-center">
				<?php echo get_the_post_thumbnail( $post->ID, 'single-img', array( 'class' => 'mb-3' ) ); ?>
			</div>
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'probd' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'probd' ), '<span class="edit-link pl-3">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
