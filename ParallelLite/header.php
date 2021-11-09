<?php
/**
 * Header section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
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
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>  

    <?php if($parallel['header-section-toggle']==1) { ?>

    <nav class="navbar <?php if ( is_front_page() ) : ?>navbar-transparent navbar-fixed-top<?php else : ?>navbar-default<?php endif; ?>" role="navigation">

        <div class="container">

            <div class="row">

                <div class="col-md-12 top-navbar">

                    <header id="masthead" class="site-header" role="banner">

                    <div class="navbar-header main-navigation">

                        <button type="button" class="menu-toggle navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">

                            <span class="sr-only"><?php _e( 'Toggle navigation', 'parallel' ); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>

                        <?php if (!has_custom_logo()) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <?php the_custom_logo() ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link-dark" rel="home" itemprop="url">
                                <img class="custom-dark-logo" src="<?php echo get_theme_mod( 'parallel_dark_logo', '' ); ?>">
                            </a>
                        <?php endif; ?>

                    </div>

                    <?php if ( has_nav_menu( 'top' ) ) : ?>

                    <div class="navigation-top">

                        <div class="wrap">

                                <div id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'parallel' ); ?>">
                                    
                                    <?php wp_nav_menu( array(
                                        'theme_location' => 'top',
                                        'menu_id'        => 'top-menu',
                                    ) ); ?>

                                </div><!-- #site-navigation -->
            					
                            </div><!-- .wrap -->

                    </div><!-- .navigation-top -->

                    <?php endif; ?>

                    </header>

                </div>

           </div>

        </div>

    </nav>

    <?php } ?>