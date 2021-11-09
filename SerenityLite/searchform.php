<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	
	<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search', 'serenity-lite' ); ?></label>
	
	<div class="input-group input-group-lg">
	
		<input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter term &hellip;', 'serenity-lite' ); ?>" />
	
		<div class="input-group-append">
	
			<input type="submit" class="submit btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'serenity-lite' ); ?>" />
	
		</div>
	
	</div>

</form>