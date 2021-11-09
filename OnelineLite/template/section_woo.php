<!-- LATEST POST START-->
<?php 
if(!oneline_lite_checkbox_filter('woocommerce','section_on_off')) :
if(class_exists( 'woocommerce' )) :
$heading = get_theme_mod('woo_heading','');
$subheading = get_theme_mod('woo_subheading','');
?>
<div class="woo-wrapper">
<?php 
echo  oneline_lite_svg_enable(); 
?>
</div>
<section id="woo-section" class="<?php echo svg_active();?>" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;">
<div class="container">
  <div class="page-woo">
      <?php if($heading!=''){ ?>
            <h2 class="main-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php echo esc_html($heading); ?></h2>
            <?php } else { ?>
            <h2 class="main-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php _e('Woocommerce','oneline-lite'); ?></h2>
            <?php } ?>
            <?php if($subheading!=''){ ?>
            <p class="sub-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php echo esc_html($subheading); ?></p>
            <?php } else { 
                if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
                ?>

            <p class="sub-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php echo do_shortcode("[themehunk-customizer-oneline-lite did='6']"); ?> </p>
        <?php } } ?>
        
    <div class="woo-block wow thunk-fadeInLeft" data-wow-delay="0s">
        <?php  if ( shortcode_exists( 'themehunk-customizer-woo' ) ){
                    do_shortcode( '[themehunk-customizer-woo]' );
                 }  ?>
    </div>
  </div>
</div>
</section>
</div>
<!-- LATEST POST END -->
<div class="clearfix"></div>
<?php endif; ?>
<?php endif ;?>