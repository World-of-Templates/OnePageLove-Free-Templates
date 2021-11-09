<?php
/**
* The template for displaying woocommerce pages
*
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
get_header(); ?>



<?php $layout = oneline_lite_get_layout();


$oneline_plx = get_theme_mod('parallax_opt');
if($oneline_plx =='' || $oneline_plx =='0'){  
$prlx_class = 'parallax-lite';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = ''; 
$prlx_data_center = '';
$prlx_top_bottom =''; 

}  
?>




<div  class="page-title <?php echo svg_active();?> <?php echo $prlx_class;?>">
<?php echo oneline_lite_page_svg_top_enable(); ?>

<div style= "<?php echo oneline_lite_shop_header_image(); ?>" data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>" class="demo-image" >


    <div class="overlay-demo"></div>
    <div class="full-fs-caption">
        <div class="caption-container">
            <h2 class="title overtext"><?php woocommerce_page_title(); ?></h2>
        </div>
    </div>
</div>



<?php echo oneline_lite_page_svg_bottom_enable(); ?>
<?php echo oneline_lite_breadcrumb(); ?>
<?php echo oneline_lite_page_svg_top_enable(); ?>
</div>
<div id="page" class="clearfix <?php echo $layout; ?> <?php echo svg_active();?>">
<div class="content-wrapper">
<div class="content">
<div class="page-content">
    <div class="page-description">
        <?php woocommerce_content(); ?>
    </div>
</div>
</div>
</div>
<?php if ( $layout != 'no-sidebar' ) { ?>
<div class="sidebar-wrapper">

<aside class="sidebar">
  <div class="widget">
  <?php
if ( is_active_sidebar( 'th-woo-widget-area' ) ) :
dynamic_sidebar( 'th-woo-widget-area' );
endif;
?>
</div>
</aside>
</div>
<?php } ?>
</div> <!--page class end -->
<div class="clear"></div>
<?php get_footer(); ?>