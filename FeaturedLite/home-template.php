<?php
/* Template Name: Home Page Layout */
get_header();
?>
<?php if( shortcode_exists( 'themehunk-customizer' ) ):
$background = '';
 if(get_theme_mod( 'parallax_image_video','image')=='image'){
 $imgurl = get_theme_mod( 'parallax_image_upload',get_template_directory_uri().'/images/bg.jpg');
 $background = "style='background: url(".esc_url($imgurl).")'";  
}
?>
<div class="custom-background-wrapper">
<div class="main custom-background" data-type="background" <?php echo  $background;?> >
<!-- background slider call -->
<?php if(get_theme_mod( 'parallax_image_video')=='slider'){?>
<?php get_template_part( 'template/background_slider'); ?> 
<?php } ?>
<!-- background slider call -->
</div> 
</div>
<?php
do_shortcode('[themehunk-customizer section="parallax"]');
endif; ?>
<!-- top  three feature parallax section -->
<?php  get_template_part( 'template/section', 'topthree' ); ?>
</div>
<div class="clearfix"></div>
<?php
$section = array('section_ribbon','section_services','section_aboutus','section_bottom_ribbon','section_team','section_woocommerce','section_testimonial','section_blogslider','section_contact');
foreach(get_theme_mod('section_sorting',$section) as $value):
get_template_part( 'template/'.$value);
endforeach;
?>
<div class="clearfix"></div>
<?php get_footer(); ?>