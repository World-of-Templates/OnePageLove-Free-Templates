<?php
/**
* The template for displaying all pages.
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*/
get_header();
?>
<?php $layout = featuredlite_get_layout(); ?>
<div id="page" class="clearfix <?php echo $layout; ?>">
      <div class="content-wrapper clearfix">
            <div class="content">
            <div class="breadcrumb">
                  <?php echo featuredlite_breadcrumb(); ?>
            </div>
                  <div class="page-description">
                        <?php woocommerce_content(); ?>
                  </div>
            </div>
            <?php if ( $layout != 'no-sidebar' ) { ?>
            <div class="sidebar-wrapper"><!--Sidebar wrapper start-->
            <?php
            if ( is_active_sidebar( 'th-woo-widget-area' ) ) :
            dynamic_sidebar( 'th-woo-widget-area' );
            endif;
            ?>
      </div>
      <?php } ?>
</div>
</div>
<?php get_footer(); ?>