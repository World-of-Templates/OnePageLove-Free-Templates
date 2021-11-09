<?php
/**
 * Parallel enqueue scripts
 *
 * @package Parallel
 */

function parallel_scripts() {  
    wp_enqueue_style( 'parallel-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style( 'parallel-multicolumnsrow', get_template_directory_uri().'/css/multi-columns-row.css');
    wp_enqueue_style( 'parallel-slick', get_template_directory_uri().'/css/slick.css');
    wp_enqueue_style( 'parallel-slick-theme', get_template_directory_uri().'/css/slick-theme.css');
    wp_enqueue_style( 'parallel-basestylesheet', get_stylesheet_uri() );
    wp_enqueue_style( 'parallel-fontawesome', get_template_directory_uri().'/css/font-awesome.min.css');
    wp_enqueue_style( 'parallel-googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,700,700italic,600italic,400italic|Cabin:400,500,600,700|Montserrat:400,700');
    wp_enqueue_script('jquery-effects-core');
    wp_enqueue_script('parallel-navigation', get_template_directory_uri().'/js/navigation.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('parallel-parallax', get_template_directory_uri().'/js/parallax.js', array('jquery'), '1.1.3', true );
    wp_enqueue_script('parallel-bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '3.3.4', true );
    wp_enqueue_script('parallel-slick', get_template_directory_uri().'/js/slick.min.js', array('jquery'), '1.6.0', true );

    if( is_front_page() && !wp_is_mobile() ) {
        wp_enqueue_script('parallel-smoothscroll', get_template_directory_uri().'/js/smooth-scroll.js', array('jquery'), '1.0', true );
        wp_enqueue_script('parallel-header', get_template_directory_uri().'/js/header.js', array('jquery'), '1.0', true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}  
add_action('wp_enqueue_scripts', 'parallel_scripts');