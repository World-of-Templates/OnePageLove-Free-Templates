<?php
/**
 * Template for displaying search forms in Ministudio
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */
?>
<div class="search_form">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
		<input type="search" class="form-control aside_search" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ministudio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<span class="input-group-addon">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
		</span>
		</div>
	</form>
</div>
