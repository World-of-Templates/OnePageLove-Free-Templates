<?php
/**
* The template for displaying the sidebar footer
*
* @package ThemeHunk
* @subpackage Featuredlite
* @since Featuredlite 1.0
*/
?>
   <?php
          if ( ! is_active_sidebar( 'first-footer-widget-area'  )
          && ! is_active_sidebar( 'second-footer-widget-area' )
          && ! is_active_sidebar( 'third-footer-widget-area'  )
          && ! is_active_sidebar( 'fourth-footer-widget-area'  )
          ){  ?>
          <?php  return; } ?>

<div class="footer-wrapper">
  <!-- Footer wrapper start -->
<div class="container">
  <div class="footer">
    <div class="footer-widget-column <?php echo esc_attr(get_theme_mod('footer_layout','footer-widget-4column-active')); ?> wow fadeInUp" data-wow-duration="1s">

          <div class="widget">
            <?php
            if ( is_active_sidebar( 'first-footer-widget-area' ) ){
            dynamic_sidebar( 'first-footer-widget-area' );
          }
            ?>
          </div>
          <div class="widget">
            <?php
            if ( is_active_sidebar( 'second-footer-widget-area' ) ){
            dynamic_sidebar( 'second-footer-widget-area' );
          }
            ?>
          </div>
          <div class="widget">
            <?php
            if ( is_active_sidebar( 'third-footer-widget-area' ) ){
            dynamic_sidebar( 'third-footer-widget-area' );
          }
            ?>
          </div>
          <div class="widget">
            <?php
            if ( is_active_sidebar( 'fourth-footer-widget-area' ) ){
            dynamic_sidebar( 'fourth-footer-widget-area' );
          }
            ?>
          </div>
    </div>
  </div>
</div>
</div>