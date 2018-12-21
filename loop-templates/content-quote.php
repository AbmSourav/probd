<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article class="mb-3">

	<div <?php post_class( 'card' ); ?> id="post-<?php the_ID(); ?>">
	
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>">	
				<?php echo get_the_post_thumbnail( $post->ID, 'card-img' ); ?>
			</a>
		<?php endif; ?>
		
		<div class="card-body">
			<header class="entry-header">

				<?php the_title( sprintf( '<h2 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">
						<?php probd_posted_on(); ?>			
					</div><!-- .entry-meta -->

				<?php endif; ?>
				
			</header><!-- .entry-header -->

			<div class="entry-content card-text">

				<?php
				the_excerpt();
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'probd' ),
					'after'  => '</div>',
				) );
				?>
				
			</div><!-- .entry-content -->	
		</div><!-- .card-body -->

		<footer class="entry-footer card-footer">
			<?php probd_entry_footer(); ?>
		</footer><!-- .entry-footer -->	
		
	</div><!-- .card -->

</article><!-- #post-## -->
