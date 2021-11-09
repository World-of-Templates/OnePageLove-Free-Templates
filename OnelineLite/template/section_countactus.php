<?php
if(!oneline_lite_checkbox_filter('contact','section_on_off')) :
if( shortcode_exists( 'lead-form' ) ) {
$heading = get_theme_mod('contactus_heading','');
$subheading = get_theme_mod('contactus_subheading','');
$addresshead = get_theme_mod('contactus_address_heading','');
$address = get_theme_mod('contactus_address','');
$contactus_shortcode = get_theme_mod('contactus_shortcode','[lead-form form-id=1 title=Contact Us]');
?>
<div class="contact-wrapper">
  <?php
  echo  oneline_lite_svg_enable();
  ?>
  <section id="contact" class="<?php echo svg_active();?>" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" >
    <div class="container">
      <div class="page-contact">
        <?php if($heading!=''){ ?>
        <h2 class="cnt-main-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo esc_html($heading); ?></h2>
        <?php } else { ?>
        <h2 class="cnt-main-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php 
                if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {

        echo do_shortcode("[themehunk-customizer-oneline-lite did='333']"); ?></h2>
        <?php } } ?>
        <?php if($subheading!=''){ ?>
        <p class="cnt-sub-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo esc_html($subheading); ?></p>
        <?php } else {                 
          if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) { ?>

        <p class="cnt-sub-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo do_shortcode("[themehunk-customizer-oneline-lite did='6']"); ?> </p>
        <?php } } ?>
        <div class="contact-block ">
          <div class="addrs wow thunk-fadeInLeft" data-wow-delay="0s">
            <?php if($addresshead!=''){ ?>
            <div class="add-heading"><h3><?php echo esc_html($addresshead); ?></h3></div>
            <?php } else {            
             if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) { ?>
            <div class="add-heading"><h3><?php                 
            do_shortcode("[themehunk-customizer-oneline-lite did='444']");  ?>
           </h3></div>
            <?php }  } ?>
            <?php if($address!=''){ ?>
            <p><?php echo esc_html($address); ?></p>
            <?php } else { ?>
            <p><?php 
                if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {

            echo do_shortcode("[themehunk-customizer-oneline-lite did='7']"); 
}
            ?>
            </p>
            <?php } ?>
          </div>
          <div class="cnt-div  wow fadeInRight" data-wow-delay="0s">
            <?php echo do_shortcode($contactus_shortcode); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php endif; ?>