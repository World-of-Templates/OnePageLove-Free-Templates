<!---RIBBON SECTION START- -->
<?php
if(!oneline_lite_checkbox_filter('ribbon','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
$heading = get_theme_mod('ribbon_heading','');
$ribbon_button_text = get_theme_mod('ribbon_button_text','');
$oneline_plx = get_theme_mod('parallax_opt');
if($oneline_plx =='' || $oneline_plx =='0'){  
$prlx_class = 'parallax-lite';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = ''; 
$prlx_data_center = '';
$prlx_top_bottom =''; 
}  
?>
<div class="ribbon-wrapper <?php echo $prlx_class;?>">
<section id="ribbon" data-center="<?php echo esc_attr($prlx_data_center);?>" data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background: url('<?php echo esc_attr(get_theme_mod('ribbon_bg_image')); ?>')" >
            <div class="container">
                <div class="ribon-box ">
                    <div class="ribbon-content wow thunk-fadeInLeft" data-wow-delay="0s">
                        <?php if($heading!=''){ ?>
                        <h3 class="main-heading"><?php echo esc_html($heading); ?></h3>
                        <?php } else { ?>
                        <h3 class="main-heading">
                        <?php 
                             echo do_shortcode("[themehunk-customizer-oneline-lite did='5']");
                        ?>
                        </h3>
                        <?php } ?>
                    </div>
                       <?php if($ribbon_button_text!=''){ ?>
                        <div class="ribbon-button wow thunk-fadeInLeft" data-wow-delay="0s">
                         <a class="button header-button left-button" href="<?php echo esc_url(get_theme_mod('ribbon_button_link','#')); ?>"><?php echo esc_html($ribbon_button_text); ?></a>
                         </div>
                    <?php } else { ?>
                      <div class="ribbon-button wow thunk-fadeInLeft" data-wow-delay="0s">
                        <a class="button header-button left-button" href="#"><?php _e('Start here','oneline-lite'); ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
</div>
<?php } ?>
<?php endif ;?>