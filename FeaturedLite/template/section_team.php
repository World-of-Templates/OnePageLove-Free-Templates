<?php if(!th_checkbox_filter('team','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="team" class="client-team-section">
  <div class="container">
        <?php do_shortcode('[themehunk-customizer section="team"]'); 
        ?>
  </div>
</section>
<?php endif;
endif; ?>