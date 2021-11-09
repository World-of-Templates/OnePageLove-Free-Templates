<?php
/**
 * Hero Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<section id="welcome" class="hero default">

    <div class="blacklayer"></div>

    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                
                <h1><?php echo esc_html(get_theme_mod( 'integral_default_header_title1', __( 'Elegant', 'integral' ) ) ); ?></h1>
                
                <h2><?php echo esc_html(get_theme_mod( 'integral_default_header_title2', __( 'Business Theme', 'integral' ) ) ); ?></h2>
                
                <div class="lead text-center">
                    <p><?php echo wp_kses_post(get_theme_mod( 'integral_default_header_tagline', __( 'A one-page theme for professionals, agencies and businesses.<br />Create a stunning website in minutes.', 'integral' ) ) ); ?></p>
                </div>              
                
                <?php if ( get_theme_mod( 'integral_default_header_btn1_toggle' ) == '' && get_theme_mod( 'integral_default_header_btn2_toggle' ) == '1' ) { ?>
                <div class="col-md-12 text-center">
                    <a href="<?php echo esc_url(get_theme_mod( 'integral_default_header_btn1url', 'https://www.themely.com/themes/integral/' ) ); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html(get_theme_mod( 'integral_default_header_btn1', __( 'View Features', 'integral' ) ) ); ?></a>
                </div>
                <?php } else if ( get_theme_mod( 'integral_default_header_btn1_toggle' ) == '') { ?>
                <div class="col-md-6 text-right">
                    <a href="<?php echo esc_url(get_theme_mod( 'integral_default_header_btn1url', 'https://www.themely.com/themes/integral/' ) ); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html(get_theme_mod( 'integral_default_header_btn1', __( 'View Features', 'integral' ) ) ); ?></a>
                </div>
                <?php } ?>
                
                <?php if ( get_theme_mod( 'integral_default_header_btn2_toggle' ) == '' && get_theme_mod( 'integral_default_header_btn1_toggle' ) == '1' ) { ?>
                <div class="col-md-12 text-center">
                    <a href="<?php echo esc_url(get_theme_mod( 'integral_default_header_btn2url', 'https://www.themely.com/themes/integral/' ) ); ?>" class="btn btn-lg btn-primary"><?php echo esc_html(get_theme_mod( 'integral_default_header_btn2', __( 'Download Now', 'integral' ) ) ); ?></a>
                </div>
                <?php } else if ( get_theme_mod( 'integral_default_header_btn2_toggle' ) == '') { ?>
                <div class="col-md-6 text-left">
                    <a href="<?php echo esc_url(get_theme_mod( 'integral_default_header_btn2url', 'https://www.themely.com/themes/integral/' ) ); ?>" class="btn btn-lg btn-primary"><?php echo esc_html(get_theme_mod( 'integral_default_header_btn2', __( 'Download Now', 'integral' ) ) ); ?></a>
                </div>
                <?php } ?>
            
            </div>
        
        </div>
    
    </div>

</section>