<?php
/**
 * Header section
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open() ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="body-wrap <?php echo esc_attr( get_theme_mod( 'serenity_lite_layout_site_width', 'fullwidth-container' ) ); ?>">

        <nav class="navbar <?php if( is_page_template( 'template-onepage.php' ) ) { echo 'navbar-dark bg-transparent fixed-top'; } else { echo 'navbar-light bg-white border-bottom'; } ?> navbar-expand-lg justify-content-between px-5 py-4 <?php echo esc_attr( get_theme_mod( 'serenity_lite_layout_site_width', 'fullwidth-container' ) ); ?>">

                <div class="navbar-brand py-0 mb-0">
                    
                    <?php if ( has_custom_logo()) : ?><?php the_custom_logo() ?><?php endif; ?>

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="site-title <?php if( !is_page_template( 'template-onepage.php' ) ) { echo 'text-dark'; } else { echo 'text-light'; } ?>"><?php bloginfo( 'name' ); ?></a>

                </div>

                <span class="navbar-text site-description text-info small d-none d-md-block"><?php esc_html(bloginfo( 'description' )); ?></span>

            <?php if ( has_nav_menu( 'main-menu' ) ) : ?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'serenity-lite' ); ?>"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbar-content">
                    
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'depth'          => 3,
                            'menu_class'     => 'navbar-nav ml-auto',
                            'walker'         => 'Bootstrap_NavWalker'
                        ) );
                    ?>
                
                </div>

            <?php endif; ?>

        </nav>   