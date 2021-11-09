<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

function integral_setup() {
	
    // This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'integral-post-thumbnails', 750, 9999);
    add_image_size( 'integral-home-post-thumbnails', 720, 360, true);
    
    // Add default posts and comments RSS feed links to head. 
    add_theme_support( 'automatic-feed-links' );
    
    // Let WordPress manage the document title. By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
    add_theme_support("title-tag");
    
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'      => esc_html__( 'Primary Menu', 'integral' ),
	) );
    
    // Make theme available for translation. Translations can be filed in the /languages/ directory.
    load_theme_textdomain( 'integral', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'integral_setup' );

// remove notice dismissal flags from all users that might have it.
function integral_update_user_notices() {
	
	delete_metadata( 'user', null, 'integral_welcome_admin_notice', null, true );
}
add_action( 'switch_theme', 'integral_update_user_notices' );

// redirect to setup page after activation
function integral_redirect_after_activation() {
  wp_safe_redirect(admin_url('themes.php?page=integral-welcome#getting_started'));
}
add_action( 'after_switch_theme', 'integral_redirect_after_activation' );