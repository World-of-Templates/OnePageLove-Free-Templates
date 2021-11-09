<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Parallel
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>

<div class="col-md-4">
			
    <div class="sidebar">
		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</div><!--sidebar-->

</div>

<?php endif; ?>