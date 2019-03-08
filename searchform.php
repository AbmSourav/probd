<?php
/**
 * The template for displaying search forms in probd
 *
 * @package probd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'probd' ); ?></label>

	<div class="input-group">

		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search', 'probd' ); ?>" value="<?php the_search_query(); ?>">

		<span class="input-group-append">
			<input class="submit btn btn-info" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Search', 'probd' ); ?>">
		</span>

	</div><!-- .input-group -->

</form>