<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

function parallel_setup() {
	
    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'parallel-post-thumbnails', 1000, 600, true);
    add_image_size( 'parallel-home-post-thumbnails', 720, 360, true);
    
    // Add default posts and comments RSS feed links to head. 
    add_theme_support( 'automatic-feed-links' );
    
    // Let WordPress manage the document title. By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
    add_theme_support("title-tag");
    
    // This theme uses wp_nav_menu() in one location.
  	register_nav_menus( array(
  		'top'      => esc_html__( 'Top Menu', 'parallel' ),
  	) );
    
    // Make theme available for translation. Translations can be filed in the /languages/ directory.
    load_theme_textdomain( 'parallel', get_template_directory() . '/languages' );

    // Set up the WordPress core custom logo feature.
    add_theme_support( 'custom-logo', array(
       'height'      => 50,
       'width'       => 300,
       'flex-width' => true,
       'flex-height' => true,
    ) );
    
}

function parallel_update_user_notices(){
	//remove notice dismissal flags from all users that might have it.
	delete_metadata( 'user', null, 'parallel_welcome_admin_notice', null, true );
}

add_action( 'after_setup_theme', 'parallel_setup' );
add_action( 'switch_theme', 'parallel_update_user_notices' );