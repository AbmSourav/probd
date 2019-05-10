<?php
/**
 * Partial template for content in front-page.php
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('overflow-hidden pt-5'); ?> id="post-<?php the_ID(); ?>">

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
