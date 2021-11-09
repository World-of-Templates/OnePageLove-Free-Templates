<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1920; /* pixels */
}

function serenity_lite_setup() {
	
    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'serenity-lite-post-thumbnails', 1000, 600, true);
    add_image_size( 'serenity-lite-home-post-thumbnails', 720, 360, true);
    add_image_size( 'serenity-lite-gallery-thumbnails', 600, 400, true);
    
    // Add default posts and comments RSS feed links to head. 
    add_theme_support( 'automatic-feed-links' );
    
    // Let WordPress manage the document title. By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
    add_theme_support("title-tag");
    
    // This theme uses wp_nav_menu() in one location.
  	register_nav_menus( array(
  		'main-menu'     => esc_html__( 'Main Menu', 'serenity-lite' ),
  	) );
    
    // Make theme available for translation. Translations can be filed in the /languages/ directory.
    load_theme_textdomain( 'serenity-lite', get_template_directory() . '/languages' );

    // Set up the WordPress core custom logo feature.
    add_theme_support( 'custom-logo', array(
       'height'      => 50,
       'width'       => 300,
       'flex-width' => true,
       'flex-height' => true,
       'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Add support for custom backgrounds
    $defaults = array(
        'default-color'          => '#dfe3e8',
        'default-image'          => '',
        'default-repeat'         => '',
        'default-position-x'     => '',
        'default-attachment'     => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );

    // Selective Refresh
    add_theme_support( 'customize-selective-refresh-widgets' );
    
}
add_action( 'after_setup_theme', 'serenity_lite_setup' );

function serenity_lite_update_user_notices() {
  //remove notice dismissal flags from all users that might have it.
  delete_metadata( 'user', null, 'serenity_lite_welcome_admin_notice', null, true );
}
add_action( 'switch_theme', 'serenity_lite_update_user_notices' );