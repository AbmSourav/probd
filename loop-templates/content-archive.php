<?php
/**
 * author post partial template.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article class="mb-3">
    <div <?php post_class( 'card' ); ?> id="post-<?php the_ID(); ?>">

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

            <div class="entry-summary card-text">
                <?php the_excerpt(); ?>
            </div>

        </div><!-- .card-body -->

    </div><!-- .card #post -->
</article>