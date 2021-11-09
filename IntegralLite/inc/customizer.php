<?php
/**
 * integral Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function integral_customize_register( $wp_customize ) {
	$wp_customize->get_section('title_tagline')->priority = 100;
    $wp_customize->remove_section( 'header_image' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'colors' );

}
add_action( 'customize_register', 'integral_customize_register' );

function integral_theme_customize_register( $wp_customize ) {
    
    // Custom Logo //
    $wp_customize->add_setting( 'integral_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'integral_logo', array(
		'label'    => __( 'Logo', 'integral' ),
		'section'  => 'title_tagline',
		'settings' => 'integral_logo',
        'description' => __( 'Upload a logo to replace the default site name and description in the header. Recommended size of 250px in width by 40px in height. However, if you upload a larger logo the header will adjust.', 'integral' ),
	) ) );
    
    // Default Header //
    $wp_customize->add_section( 'integral_default_header_section' , array(
            'title'       => __( 'Homepage Default Header', 'integral' ),
            'priority'    => 120,
            'description' => __( 'This section controls the default header on the homepage of your website when the One-Page Template has NOT been setup. For instructions on how to setup the One-Page Template go to <a href="themes.php?page=integral-welcome#getting_started">APPEARANCE > Setup Integral</a>.', 'integral' ),
	) );
    
	$wp_customize->add_setting( 'integral_default_header_background', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => get_template_directory_uri() . '/images/bg-welcome.jpg'
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'integral_default_header_background', array(
            'label'    => __( 'Background Image', 'integral' ),
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_background',
	) ) );
    
    $wp_customize->add_setting( 'integral_default_header_title1', array(
            'default' => __( 'Elegant', 'integral' ),
            'sanitize_callback'	=> 'sanitize_text'
    ) );
    
	$wp_customize->add_control( 'integral_default_header_title1', array(
            'label'    => __( 'Title Line 1', 'integral' ),
            'type'      => 'text',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_title1',
	) );
    
    $wp_customize->add_setting( 'integral_default_header_title2', array(
            'default' => __( 'Business Theme', 'integral' ),
            'sanitize_callback'	=> 'sanitize_text'
    ) );
    
	$wp_customize->add_control( 'integral_default_header_title2', array(
            'label'    => __( 'Title Line 2', 'integral' ),
            'type'      => 'text',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_title2',
	) );
    
    $wp_customize->add_setting( 'integral_default_header_tagline', array(
            'default' => __( 'A one page theme for professionals, agencies and businesses.<br />Create a stunning website in minutes.', 'integral' ),
            'sanitize_callback'	=> 'esc_html',
    ) );
    
	$wp_customize->add_control( 'integral_default_header_tagline', array(
            'label'    => __( 'Title Line 1', 'integral' ),
            'type'      => 'textarea',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_tagline',
	) );
    
    $wp_customize->add_setting( 'integral_default_header_btn1', array(
            'default' => __( 'View Features', 'integral' ),
            'sanitize_callback'	=> 'sanitize_text'
    ) );
    
	$wp_customize->add_control( 'integral_default_header_btn1', array(
            'label'    => __( 'Button 1 Text', 'integral' ),
            'type'      => 'text',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_btn1',
	) );
    
    $wp_customize->add_setting( 'integral_default_header_btn1url', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
    ) );
    
	$wp_customize->add_control( 'integral_default_header_btn1url', array(
            'label'    => __( 'Button 1 Link', 'integral' ),
            'type'      => 'text',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_btn1url',
	) );
    
    $wp_customize->add_setting( 'integral_default_header_btn1_toggle', array( 
        'sanitize_callback'	=> 'esc_attr',
	) );
    
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'integral_default_header_btn1_toggle',
        array(
            'label'     => __('Disable Button 1', 'integral'),
            'description' => __('Check the box to disable this button.', 'integral'),
            'section'   => 'integral_default_header_section',
            'settings'  => 'integral_default_header_btn1_toggle',
            'type'      => 'checkbox',
        )
    ) );
    
    $wp_customize->add_setting( 'integral_default_header_btn2', array(
            'default' => __( 'Download Now', 'integral' ),
            'sanitize_callback'	=> 'sanitize_text'
    ) );
    
	$wp_customize->add_control( 'integral_default_header_btn2', array(
            'label'    => __( 'Button 2 Text', 'integral' ),
            'type'      => 'text',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_btn2',
	) );
    
    
    $wp_customize->add_setting( 'integral_default_header_btn2url', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
    ) );
    
	$wp_customize->add_control( 'integral_default_header_btn2url', array(
            'label'    => __( 'Button 2 Link', 'integral' ),
            'type'      => 'text',
            'section'  => 'integral_default_header_section',
            'settings' => 'integral_default_header_btn2url',
	) );
    
    $wp_customize->add_setting( 'integral_default_header_btn2_toggle', array( 
        'sanitize_callback'	=> 'esc_attr',
	) );
    
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'integral_default_header_btn2_toggle',
        array(
            'label'     => __('Disable Button 2', 'integral'),
            'description' => __('Check the box to disable this button.', 'integral'),
            'section'   => 'integral_default_header_section',
            'settings'  => 'integral_default_header_btn2_toggle',
            'type'      => 'checkbox',
        )
    ) );
    
    // Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}
add_action( 'customize_register', 'integral_theme_customize_register' );


/**
 * Output the styles from the customizer
 */
function integral_customizer_css() {
    ?>
    <style type="text/css">
        .hero.default {background: url(<?php echo esc_url( get_theme_mod( 'integral_default_header_background', get_template_directory_uri() . '/images/bg-welcome.jpg' ) ); ?>) no-repeat center top; background-size: cover;}
    </style>
    <?php
}
add_action( 'wp_head', 'integral_customizer_css' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function integral_customize_preview_js() {
	wp_enqueue_script( 'integral_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'integral_customize_preview_js' );
