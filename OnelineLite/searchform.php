<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div><i class="icon-search"></i>
		<input type="text" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'oneline-lite' ); ?>" name="s" id="s" value="<?php the_search_query(); ?>"/>
		<input type="submit" value="<?php echo esc_attr_x( 'Search', 'text', 'oneline-lite' ); ?>" />
	</div>
</form>