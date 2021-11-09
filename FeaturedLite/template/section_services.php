<?php if(!th_checkbox_filter('services','section_on_off')) : 
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="multifeature" class="multi-feature">
	<!-- feature section -->
	<div class="multi-feature-area">
		<div class="container">
			<?php do_shortcode('[themehunk-customizer section="service"]'); ?>
		</div>
	</div>
</section>
<?php endif; 
endif; ?>