<?php
/**
 * Searchform
 *
 * Custom template for search form
 */
?>

<form method="get" class="searchform input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" id="s" class="form-control" placeholder="<?php esc_attr_e( 'Search' ); ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php esc_attr_e( 'Search' ); ?>'" />
	<span class="input-group-btn">
		<input type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search' ); ?>" />
	</span>
</form>