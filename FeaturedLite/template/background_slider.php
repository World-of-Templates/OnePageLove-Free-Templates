<?php if( shortcode_exists( 'themehunk-customizer' ) ): ?>
	<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('featured_slider_speed','') != '') { echo stripslashes(get_theme_mod('featured_slider_speed')); } else { ?>3000<?php } ?>"/>
 <div class="slider-container">
      <?php do_shortcode('[themehunk-customizer section="slider"]'); ?>
</div>
<?php endif; ?>