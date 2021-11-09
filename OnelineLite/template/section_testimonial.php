<?php
if(!oneline_lite_checkbox_filter('testimonial','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
$heading = get_theme_mod('our_testm_heading','');
$subheading = get_theme_mod('our_testm_subheading','');
?>
<input type="hidden" id="testimonial_slidespeed" value="<?php if (get_theme_mod('test_slider_speed','') != '') { echo stripslashes(get_theme_mod('test_slider_speed')); } else { ?>3000<?php } ?>"/>
<div class="testimonials-wrapper">
	<?php 
echo  oneline_lite_svg_enable(); 
?>
<section class="testimonials <?php echo svg_active();?>" id="testimonials" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;">
		<div class="container" >
		<?php if($heading!==''|| $subheading!=='') { ?>
		      <h2 class="main-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php echo esc_html($heading); ?></h2>
               <p class="sub-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo esc_html($subheading); ?></p>
         <?php } ?>

			<div class="testimonials-box">
				<div class="testimonials-div">
					<ul class="bxslider wow thunk-fadeInUp" data-wow-delay=".5s">
						<?php
						if ( is_active_sidebar( 'testimonial-widget' ) ){
						dynamic_sidebar( 'testimonial-widget' );
						} else {
						echo do_shortcode("[themehunk-customizer-oneline-lite did='3']");

						 } ?>
</ul>
</div>
</div>
</div>

</section>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php endif ;?>