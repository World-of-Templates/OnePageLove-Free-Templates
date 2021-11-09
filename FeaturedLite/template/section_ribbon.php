<?php if(!th_checkbox_filter('ribbon','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="ribbon" class="ribbon-section">
	<div class="container">
		<?php do_shortcode('[themehunk-customizer section="ribbon"]'); ?>
	</div>
</section>
<?php endif;
 endif; ?>