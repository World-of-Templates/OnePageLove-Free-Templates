<?php if(!th_checkbox_filter('testimonial','section_on_off')) : 
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="testimonials" class="client-testimonial-section">
	<div class="container">
		<?php do_shortcode('[themehunk-customizer section="testimonial"]'); ?>
	</div>
</section>
<?php endif;
endif; ?>