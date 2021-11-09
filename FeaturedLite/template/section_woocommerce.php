<?php if(!th_checkbox_filter('woocommerce','section_on_off') && class_exists( 'WooCommerce' )) :
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="woocommerce" class="woocommerce-section">
    <?php do_shortcode('[themehunk-customizer section="woocommerce"]'); ?>

</section>
<?php endif;
endif; ?>