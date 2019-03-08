<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

?>

<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>

	<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">

		<?php dynamic_sidebar( 'right-sidebar' ); ?>

	</div><!-- #right-sidebar -->
	
<?php endif; ?>