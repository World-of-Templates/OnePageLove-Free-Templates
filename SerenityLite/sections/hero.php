<?php
/**
 * Hero Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_onepage_hero_section_toggle' ) == '' ) : ?>

<section id="welcome" class="hero position-relative py-15">

    <div class="blacklayer"></div>

    <div class="container h-100">
        
        <div class="row h-100">
            
            <div class="col-12 my-auto">
                
                <div class="title text-center text-light">

                    <h1 class="mb-3"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_hero_title1', __( 'LAUNCH. YOUR. BUSINESS.', 'serenity-lite' ) ) ); ?></h1>

                    <h2 class="mb-5"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_hero_title2', __( 'Discover more possibilities for your success!', 'serenity-lite' ) ) ); ?></h2>

                </div>
                                
                <?php if ( is_active_sidebar( 'hero-widgets' ) ) : ?>

                <div class="lead text-center text-light font-weight-normal mb-5">

                    <?php dynamic_sidebar( 'hero-widgets' ); ?>
                
                </div>

                <?php endif; ?>

                <div class="row">           
                
                    <?php if ( get_theme_mod( 'serenity_lite_onepage_hero_section_btn1_toggle' ) == '' && get_theme_mod( 'serenity_lite_onepage_hero_section_btn2_toggle' ) == '1' ) { ?>
                    <div class="col-md-12 text-center">
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_onepage_hero_section_btn1url', '#' )); ?>" class="btn btn-lg btn-pill btn-light"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_hero_section_btn1', __( 'Learn More', 'serenity-lite' ) ) ); ?></a>
                    </div>
                    <?php } else if ( get_theme_mod( 'serenity_lite_onepage_hero_section_btn1_toggle', '' ) == '') : ?>
                    <div class="col-md-6 text-center text-md-right mb-4 mb-md-0">
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_onepage_hero_section_btn1url', '#' )); ?>" class="btn btn-lg btn-pill btn-light"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_hero_section_btn1', __( 'Learn More', 'serenity-lite' ) ) ); ?></a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ( get_theme_mod( 'serenity_lite_onepage_hero_section_btn2_toggle' ) == '' && get_theme_mod( 'serenity_lite_onepage_hero_section_btn1_toggle', '' ) == '1' ) { ?>
                    <div class="col-md-12 text-center">
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_onepage_hero_section_btn2url', '#' )); ?>" class="btn btn-lg btn-pill btn-primary"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_hero_section_btn2', __( 'Download Now', 'serenity-lite' ) ) ); ?></a>
                    </div>
                    <?php } else if ( get_theme_mod( 'serenity_lite_onepage_hero_section_btn2_toggle' ) == '') : ?>
                    <div class="col-md-6 text-center text-md-left">
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_onepage_hero_section_btn2url', '#' )); ?>" class="btn btn-lg btn-pill btn-primary"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_hero_section_btn2', __( 'Download Now', 'serenity-lite' ) ) ); ?></a>
                    </div>
                    <?php endif; ?>

                </div>
            
            </div>
        
        </div>
    
    </div>

</section>

<?php endif; ?>