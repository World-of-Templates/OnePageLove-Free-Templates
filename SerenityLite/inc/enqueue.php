<?php
/**
 * Enqueue scripts
 */

function serenity_lite_scripts() {  
    wp_enqueue_style('serenity-lite-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '4.1.3' );
    wp_enqueue_style('serenity-lite-bootstrap-grid', get_template_directory_uri().'/css/bootstrap-grid.min.css', array(), '4.1.3' );
    wp_enqueue_style('serenity-lite-multicolumnsrow', get_template_directory_uri().'/css/multi-columns-row.css', array(), '1.0.0' );
    wp_enqueue_style('serenity-lite-slick', get_template_directory_uri().'/css/slick.css', array(), '1.6.0' );
    wp_enqueue_style('serenity-lite-slick-theme', get_template_directory_uri().'/css/slick-theme.css', array(), '1.6.0' );
    wp_enqueue_style('serenity-lite-fontawesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), '5.0.13' );
    wp_enqueue_style('serenity-lite-googlefonts', 'https://fonts.googleapis.com/css?family=Rubik:100,300,400,500,600,700,800|Lato:100,300,400,500,600,700,800|Poppins:100,300,400,500,600,700,800' );
    wp_enqueue_style('serenity-lite-base', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_script('jquery-effects-core');
    wp_enqueue_script('serenity-lite-bootstrap-bundle', get_template_directory_uri().'/js/bootstrap.bundle.min.js', array('jquery'), '4.1.3', true );
    wp_enqueue_script('serenity-lite-slick', get_template_directory_uri().'/js/slick.min.js', array('jquery'), '1.6.0', true );

    if( is_page_template( 'template-onepage.php' ) ) {
        wp_enqueue_script('serenity-lite-smoothscroll', get_template_directory_uri().'/js/smooth-scroll.js', array('jquery'), '1.0', true );
        wp_enqueue_script('serenity-lite-header', get_template_directory_uri().'/js/header.js', array('jquery'), '1.0', true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}  
add_action('wp_enqueue_scripts', 'serenity_lite_scripts');

/**
 * Registers an editor stylesheet for the theme.
 */
function serenity_lite_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'serenity_lite_editor_styles' );