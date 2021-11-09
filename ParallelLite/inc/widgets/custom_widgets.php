<?php
include( get_template_directory() . '/inc/widgets/feature_widget.php');
include( get_template_directory() . '/inc/widgets/service_widget.php');
include( get_template_directory() . '/inc/widgets/testimonials_widget.php');
include( get_template_directory() . '/inc/widgets/brands_widget.php');
include( get_template_directory() . '/inc/widgets/our_team_widget.php');
add_action( 'admin_enqueue_scripts', 'parallel_wcp_upload_script' );
add_action( 'wp_head', 'parallel_wcp_image_styles' );
/*
*	Script for Media uploader
 */
function parallel_wcp_upload_script($hook){
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'wcp_uploader', get_template_directory_uri(). '/js/admin.js', array('jquery') );
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('jquery-ui-core');
}
function parallel_wcp_image_styles(){
	wp_register_style( 'wcp-caption-styles', get_template_directory_uri() .'/css/widgets.css' );
}

?>