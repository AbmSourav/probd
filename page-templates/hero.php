<?php
/**
 * Hero section of Front Page template.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$sticky = get_option( 'sticky_posts' );
$args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 5,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'post__not_in'        => $sticky,
    'order'               => 'DESC',
    'orderby'             => 'comment_count',
    'comment_count'       => array(
        array(
            'value'   => 1,
            'compare' => '>=',
        ),
    )
);

?>

<div class="hero bg-white">
    <?php 
    // The Query
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) :
    ?>

        <div id="owl-carousel" class="owl-carousel owl-theme">
            <?php
            while ( $loop->have_posts() ) : 
            $loop->the_post();

            $cat = get_the_category();
            ?>
                <div class="item">
                    <div class="post-content">

                        <?php the_title( sprintf( '<h4 class="entry-title mb-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

                        <?php if ( ! empty( $cat ) ) { ?>
                            <strong>
                                <?php 
                                $data = '<a href="' . esc_url( get_category_link( $cat[0]->term_id ) ) . '">' . esc_html( $cat[0]->name ) . '</a>'; 
                                echo wp_kses_post( $data );
                                ?>
                            </strong>
                        <?php } ?>

                    </div>

                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php echo get_the_post_thumbnail( $post->ID, 'card-img' ); ?>
                    </a>

                </div><!-- .item -->
            <?php
            endwhile; 
            wp_reset_query();
            ?>

        </div><!-- .carousel -->

    <?php 
        else : 
        ?>
        <h1 class="page-title">
            <?php esc_html_e( 'Nothing Found', 'probd' ); ?>
        </h1>
    <?php 
    endif; 
    ?>

</div><!-- .hero -->
