<?php if(!th_checkbox_filter('bottom-ribbon','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="bottom-ribbon" class="bottom-ribbon-section">
<div class="container">
<?php do_shortcode('[themehunk-customizer section="bottom_ribbon"]'); 
        ?>
</div>
</section>
<?php endif;
endif; ?>