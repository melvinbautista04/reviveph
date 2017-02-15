<?php
/**
 * The template for displaying a standard search form.
 *
 * @package Listify
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_attr_e( 'Search for:', 'churchwp' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'churchwp' ); ?>" value=""
		name="s" title="<?php echo esc_attr_e( 'Search for:', 'churchwp' ); ?>" />
	</label>
	<input class="search-submit" value="<?php echo esc_attr_e( '', 'churchwp' ); ?>" type="submit">
</form>