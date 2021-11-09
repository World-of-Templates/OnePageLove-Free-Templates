<!-- TEAM SECTION START -->
<?php 
if(!oneline_lite_checkbox_filter('team','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
    $heading = get_theme_mod('team_heading','');
    $subheading = get_theme_mod('team_subheading','');
?>
<div class="team-wrapper">
<?php
echo oneline_lite_svg_enable();
?>
<section id="team" class="<?php echo svg_active();?>" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;">
    <div class="container">
        <div class="page-team">
               <?php if($heading!=''){ ?>
            <h2 class="main-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo esc_html($heading); ?></h2>
            <?php } else { ?>
            <h2 class="main-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo do_shortcode("[themehunk-customizer-oneline-lite did='222']"); ?></h2>
            <?php } ?>
            <?php if($subheading!=''){ ?>
            <p class="sub-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo esc_html($subheading); ?></p>
            <?php } else { ?>
            <p class="sub-heading wow thunk-fadeInLeft" data-wow-delay="0s"><?php echo do_shortcode("[themehunk-customizer-oneline-lite did='6']"); ?> </p>
        <?php } ?>
            <div class="team-block">
                <ul class="team-grid wow thunk-fadeInRight" data-wow-delay="0s">
                <?php
            if ( is_active_sidebar( 'multi-team-widget' ) ){
                    dynamic_sidebar( 'multi-team-widget' );
                 } else {
                 echo do_shortcode("[themehunk-customizer-oneline-lite did='2']");
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