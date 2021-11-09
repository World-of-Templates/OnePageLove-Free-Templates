<?php
function ministudio_theme_customizer( $wp_customize ) {
	/*About Section*/
    $wp_customize->add_section( 'ministudio_about_section' , array(
		'title'       => __( 'About Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change about options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_about_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_about_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_about_section',
	) );
	$wp_customize->add_setting( 'ministudio_about_title' , array ( 'default' => 'Who we are','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_about_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_about_section',
	) );
	$wp_customize->add_setting( 'ministudio_about_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_about_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_about_section',
	) );
	
	/*Services Section*/
    $wp_customize->add_section( 'ministudio_services_section' , array(
		'title'       => __( 'Services Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change Services options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_services_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_services_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_services_section',
	) );
	$wp_customize->add_setting( 'ministudio_services_title' , array ( 'default' => 'What we do','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_services_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_services_section',
	) );
	$wp_customize->add_setting( 'ministudio_services_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_services_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_services_section',
	) );
	
	/*Portfolio Section*/
    $wp_customize->add_section( 'ministudio_portfolio_section' , array(
		'title'       => __( 'Portfolio Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change Portfolio options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_portfolio_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_portfolio_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_portfolio_section',
	) );
	$wp_customize->add_setting( 'ministudio_portfolio_title' , array ( 'default' => 'Our Recent Works','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_portfolio_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_portfolio_section',
	) );
	$wp_customize->add_setting( 'ministudio_portfolio_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_portfolio_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_portfolio_section',
	) );
	
	/*Pricing Section*/
    $wp_customize->add_section( 'ministudio_pricing_section' , array(
		'title'       => __( 'Pricing Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change Pricing options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_pricing_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_pricing_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_pricing_section',
	) );
	$wp_customize->add_setting( 'ministudio_pricing_title' , array ( 'default' => 'Pricing Table','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_pricing_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_pricing_section',
	) );
	$wp_customize->add_setting( 'ministudio_pricing_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_pricing_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_pricing_section',
	) );
	
	/*Team Section*/
    /*$wp_customize->add_section( 'ministudio_team_section' , array(
		'title'       => __( 'Team Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change Team options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_team_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_team_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_team_section',
	) );
	$wp_customize->add_setting( 'ministudio_team_title' , array ( 'default' => 'Our Team','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_team_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_team_section',
	) );
	$wp_customize->add_setting( 'ministudio_team_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_team_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_team_section',
	) );*/
	
	/*Shop Section*/
	$wp_customize->add_section( 'ministudio_shop_section' , array(
		'title'       => __( 'Shop Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change Shop options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_shop_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_shop_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_shop_section',
	) );
	$wp_customize->add_setting( 'ministudio_shop_title' , array ( 'default' => 'Our Latest Product','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_shop_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_shop_section',
	) );
	$wp_customize->add_setting( 'ministudio_shop_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_shop_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_shop_section',
	) );
	
	/*Testimonial Section*/
	/*$wp_customize->add_section( 'ministudio_testimonial_section' , array(
		'title'       => __( 'Testimonial Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change testimonial options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_testimonial_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_testimonial_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_testimonial_section',
	) );
	$wp_customize->add_setting( 'ministudio_testimonial_title' , array ( 'default' => 'What Our Clients Says','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_testimonial_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_testimonial_section',
	) );
	$wp_customize->add_setting( 'ministudio_testimonial_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_testimonial_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_testimonial_section',
	) );*/
	
	/*FAQ Section*/
	/*$wp_customize->add_section( 'ministudio_faq_section' , array(
		'title'       => __( 'FAQ Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change faq options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_faq_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_faq_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_faq_section',
	) );
	$wp_customize->add_setting( 'ministudio_faq_title' , array ( 'default' => 'Do you need help?','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_faq_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_faq_section',
	) );
	$wp_customize->add_setting( 'ministudio_faq_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_faq_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_faq_section',
	) );*/
	
	/*Blog Section*/
	$wp_customize->add_section( 'ministudio_blog_section' , array(
		'title'       => __( 'Blog Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change blog options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_blog_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_blog_active', array(
	  'label' => __( 'Active', 'ministudio' ),
	  'type' => 'checkbox',
	  'section' => 'ministudio_blog_section',
	) );
	$wp_customize->add_setting( 'ministudio_blog_title' , array ( 'default' => 'Latest News','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_blog_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_blog_section',
	) );
	$wp_customize->add_setting( 'ministudio_blog_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_blog_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_blog_section',
	) );
	
	/*Contact Section*/
	$wp_customize->add_section( 'ministudio_contact_section' , array(
		'title'       => __( 'Contact Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change Contact options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_contact_title' , array ( 'default' => 'Get in Touch','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_contact_title', array(
	  'label' => __( 'Title', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_contact_section',
	) );
	$wp_customize->add_setting( 'ministudio_contact_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_contact_desc', array(
	  'label' => __( 'Description', 'ministudio' ),
	  'type' => 'textarea',
	  'section' => 'ministudio_contact_section',
	) );
	
	
	
	
	/*Site Option Section*/
    $wp_customize->add_section( 'ministudio_site_option_section' , array(
		'title'       => __( 'Site Option Section', 'ministudio' ),
		'priority'    => 200,
		'description' => __('Change site options here.', 'ministudio'),
	) );
	
	$wp_customize->add_setting( 'ministudio_blog_layout' , array ( 'default' => 'rightsidebar','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_blog_layout', array(
	  'label' => __( 'Select Blog Layout', 'ministudio' ),
	  'type' => 'select',
	  'choices' => array(
		'rightsidebar' => 'Right Sidebar',
		'leftsidebar' => 'Left Sidebar',
		'nosidebar' => 'Full Width',
	  ),
	  'default' => 'Hide',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_formshortcode' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_formshortcode', array(
	  'label' => __( 'Contact Form Shortcode ID', 'ministudio' ),
	  'type' => 'number',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_address' , array ( 'default' => 'Lorem ipsum dolor sit amet,consectetur adipiscing elit','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_address', array(
	  'label' => __( 'Footer Address', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_email' , array ( 'default' => 'contact@site.com','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_email', array(
	  'label' => __( 'Footer Email', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_telephone' , array ( 'default' => '(555)6666','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_telephone', array(
	  'label' => __( 'Footer Telephone', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_social_media_fb' , array ( 'default' => '#/','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_social_media_fb', array(
	  'label' => __( 'Facebook Link', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_social_media_tw' , array ( 'default' => '#/','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_social_media_tw', array(
	  'label' => __( 'Twitter Link', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) );
	
	$wp_customize->add_setting( 'ministudio_social_media_in' , array ( 'default' => '#/','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_social_media_in', array(
	  'label' => __( 'Linkdine Link', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) ); 
	
	$wp_customize->add_setting( 'ministudio_social_media_gp' , array ( 'default' => '#/','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_social_media_gp', array(
	  'label' => __( 'GooglePlus Link', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) ); 
	
	$wp_customize->add_setting( 'ministudio_footer_copyright' , array ( 'default' => 'Copyright 2016. All Rights Reserved.','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'ministudio_footer_copyright', array(
	  'label' => __( 'Copyright Text', 'ministudio' ),
	  'type' => 'text',
	  'section' => 'ministudio_site_option_section',
	) );
}
add_action( 'customize_register', 'ministudio_theme_customizer' );
?>