<?php
/**
 * The sidebar containing the main widget area.
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>

<div class="col-md-12 col-lg-3 ml-auto">
			
    <div class="sidebar my-5">
		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</div>

</div>

<?php endif; ?>