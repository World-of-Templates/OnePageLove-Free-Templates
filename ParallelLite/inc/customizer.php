<?php
/**
 * integral Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function parallel_customize_register( $wp_customize ) {
	$wp_customize->get_section('title_tagline')->priority = 100;
    $wp_customize->remove_section( 'header_image' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'colors' );

}
add_action( 'customize_register', 'parallel_customize_register' );

function parallel_theme_customize_register( $wp_customize ) {
    
    // Custom Logo //
    $wp_customize->add_setting( 'parallel_dark_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'parallel_logo', array(
		'label'    => __( 'Dark Logo', 'parallel' ),
		'section'  => 'title_tagline',
		'settings' => 'parallel_dark_logo',
        'description' => __( 'Upload a dark version of your logo which will be displayed when the user scrolls down the page. Recommended size of 300px in width by 50px in height. However, if you upload a larger logo the header will adjust.', 'parallel' ),
	) ) );
    
    // Default Header //
    $wp_customize->add_section( 'parallel_default_header_section' , array(
            'title'       => __( 'Homepage Default Header', 'parallel' ),
            'priority'    => 120,
            'description' => __( 'This section controls the default header on the homepage of your website when the One-page Layout Template has not been configured. For instructions on how to configure your homepage go to <a href="themes.php?page=parallel-welcome">APPEARANCE > Getting Started with Parallel</a>.', 'parallel' ),
	) );
    
	$wp_customize->add_setting( 'parallel_default_header_background', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => get_template_directory_uri() . '/images/bg-demo.jpg'
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'parallel_default_header_background', array(
            'label'    => __( 'Background Image', 'parallel' ),
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_background',
	) ) );
    
    $wp_customize->add_setting( 'parallel_default_header_title1', array(
            'default' => __( 'One-page Business Theme', 'parallel' ),
            'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_title1', array(
            'label'    => __( 'Title Line 1', 'parallel' ),
            'type'      => 'text',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_title1',
	) );
    
    $wp_customize->add_setting( 'parallel_default_header_title2', array(
            'default' => __( '', 'parallel' ),
            'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_title2', array(
            'label'    => __( 'Title Line 2', 'parallel' ),
            'type'      => 'text',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_title2',
	) );
    
    $wp_customize->add_setting( 'parallel_default_header_tagline', array(
            'default' => __( 'A one page theme for professionals, agencies and businesses.<br />Create a stunning website in minutes.', 'parallel' ),
            'sanitize_callback'	=> 'esc_html',
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_tagline', array(
            'label'    => __( 'Title Line 1', 'parallel' ),
            'type'      => 'textarea',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_tagline',
	) );
    
    $wp_customize->add_setting( 'parallel_default_header_btn1', array(
            'default' => __( 'View Features', 'parallel' ),
            'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_btn1', array(
            'label'    => __( 'Button 1 Text', 'parallel' ),
            'type'      => 'text',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_btn1',
	) );
    
    $wp_customize->add_setting( 'parallel_default_header_btn1url', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_btn1url', array(
            'label'    => __( 'Button 1 Link', 'parallel' ),
            'type'      => 'text',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_btn1url',
	) );
    
    $wp_customize->add_setting( 'parallel_default_header_btn1_toggle', array( 
            'sanitize_callback'	=> 'esc_attr',
            'default' => '1',
	) );
    
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'parallel_default_header_btn1_toggle',
        array(
            'label'     => __('Disable Button 1', 'parallel'),
            'description' => __('Check the box to disable this button.', 'parallel'),
            'section'   => 'parallel_default_header_section',
            'settings'  => 'parallel_default_header_btn1_toggle',
            'type'      => 'checkbox',
        )
    ) );
    
    $wp_customize->add_setting( 'parallel_default_header_btn2', array(
            'default' => __( 'Download Now', 'parallel' ),
            'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_btn2', array(
            'label'    => __( 'Button 2 Text', 'parallel' ),
            'type'      => 'text',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_btn2',
	) );
    
    
    $wp_customize->add_setting( 'parallel_default_header_btn2url', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
    ) );
    
	$wp_customize->add_control( 'parallel_default_header_btn2url', array(
            'label'    => __( 'Button 2 Link', 'parallel' ),
            'type'      => 'text',
            'section'  => 'parallel_default_header_section',
            'settings' => 'parallel_default_header_btn2url',
	) );
    
    $wp_customize->add_setting( 'parallel_default_header_btn2_toggle', array( 
        'sanitize_callback'	=> 'esc_attr',
	) );
    
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'parallel_default_header_btn2_toggle',
        array(
            'label'     => __('Disable Button 2', 'parallel'),
            'description' => __('Check the box to disable this button.', 'parallel'),
            'section'   => 'parallel_default_header_section',
            'settings'  => 'parallel_default_header_btn2_toggle',
            'type'      => 'checkbox',
        )
    ) );

}
add_action( 'customize_register', 'parallel_theme_customize_register' );


/**
 * Output the styles from the customizer
 */
function parallel_customizer_css() {
    ?>
    <style type="text/css">
        .hero.default {background: url(<?php echo get_theme_mod( 'parallel_default_header_background', get_template_directory_uri() . '/images/bg-demo.jpg' ); ?>) no-repeat center top; background-size: cover;}
    </style>
    <?php
}
add_action( 'wp_head', 'parallel_customizer_css' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function parallel_customize_preview_js() {
	wp_enqueue_script( 'parallel_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'parallel_customize_preview_js' );
