<?php
/**
* The template for displaying the sidebar
*/
?>
<aside class="sidebar">
  <div class="widget">
    <?php
    if ( is_active_sidebar( 'primary-sidebar' ) ){
    dynamic_sidebar( 'primary-sidebar' );
    }
    ?>
  </div>
  <div class="widget">
    <?php
    if ( is_active_sidebar( 'secondary-sidebar' ) ){
    dynamic_sidebar( 'secondary-sidebar' );
    }
    ?>
  </div>
</aside>