<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Integral
 */
?>

<?php if ( is_active_sidebar( 'rightbar' )  ) : ?>

<div class="col-md-4">
			
    <div class="sidebar">
		
		<?php dynamic_sidebar( 'rightbar' ); ?>

	</div><!--sidebar-->

</div>

<?php endif; ?>