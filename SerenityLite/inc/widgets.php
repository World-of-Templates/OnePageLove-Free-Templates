<?php
/**
 * Widgets
 */

/** Register Sidebars and Custom Widget Areas **/
function serenity_lite_widgets_init() {

    register_sidebar( array(
		'name' => __( 'Sidebar', 'serenity-lite' ),
		'id' => 'sidebar-1',
		'description'   => __('Widgets in this area will be shown in the default sidebar.', 'serenity-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-5">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mt-0">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'One-Page Hero Section', 'serenity-lite' ),
		'id' => 'hero-widgets',
		'description'   => __('Widgets in this sidebar will appear in the Hero section. Drag and drop a Text Widget here to add a tagline or paragraph beneath the titles in the Hero section.', 'serenity-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title d-none">',
		'after_title'   => '</h3>',
	) );

	if ( get_theme_mod( 'serenity_lite_brands_section_toggle' ) == '' ) {
    
	    register_sidebar( array(
			'name' =>__( 'One-Page Brands Section', 'serenity-lite'),
			'id' => 'brands-widgets',
			'description' => __( 'Widgets in this area will be shown in the Brands section of the One-Page Template. Add Image Widgets here to display brands. View the <a target="_blank" href="http://demo.themely.com/serenity/#brands">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s mx-3 mb-5">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title d-none">',
			'after_title' => '</h3>',
		) );

	}

	if ( get_theme_mod( 'serenity_lite_cta_section_toggle' ) == '' ) {
    
	    register_sidebar( array(
			'name' =>__( 'One-Page Call-to-Action Section', 'serenity-lite'),
			'id' => 'cta-widgets',
			'description' => __( 'The Call-to-Action section which appears in the One-Page Template. Drag and drop Text Widgets here to add calls-to-action.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s cta lead">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title display-4 mb-4">',
			'after_title' => '</h3>',
		) );

	}

	if ( get_theme_mod( 'serenity_lite_contact_section_toggle' ) == '' ) {
    
	    register_sidebar( array(
			'name' =>__( 'One-Page Contact Form Section', 'serenity-lite'),
			'id' => 'contact-form-widgets',
			'description' => __( 'Widgets in this area will be shown in the form area of the Contact section of the One-Page Template. Add a WPForms Widget here to display a contact form. View the <a target="_blank" href="http://demo.themely.com/serenity/#contact">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s contact-form">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title mb-4">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' =>__( 'One-Page Contact Info Section', 'serenity-lite'),
			'id' => 'contact-info-widgets',
			'description' => __( 'Widgets in this area will be shown in the Contact Info area of the Contact section of the One-Page Template. Add a Text Widget here to display your address, tel#, email, etc. View the <a target="_blank" href="http://demo.themely.com/serenity/#contact">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s contact-info">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title mb-4">',
			'after_title' => '</h3>',
		) );

	}
    
    if ( get_theme_mod( 'serenity_lite_features_section_toggle' ) == '' ) {

    	$features_layout = esc_attr( get_theme_mod( 'serenity_lite_onepage_features_layout', 'col-sm-6 col-md-6 col-lg-4' ) );
    
		register_sidebar( array(
			'name' => __( 'One-Page Features Section', 'serenity-lite' ),
			'id' => 'feature-widgets',
			'description' => __( 'Widgets in this area will be shown in the Features section of the One-Page Template. Add Feature Widgets here to display features. View the <a target="_blank" href="http://demo.themely.com/serenity/#features">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s ' . $features_layout . ' text-center mb-5"><div class="card shadow"><div class="card-body px-4 py-5">',
			'after_widget' => '</div></div></div>',
			'before_title' => '<h6 class="widget-title mb-3">',
			'after_title' => '</h6>',
		) );

	}

	if ( get_theme_mod( 'serenity_lite_gallery_section_toggle' ) == '' ) {
    
		register_sidebar( array(
			'name' => __( 'One-Page Gallery Section', 'serenity-lite' ),
			'id' => 'gallery-widgets',
			'description' => __( 'Widgets in this area will be shown in the Photo Gallery section of the One-Page Template. Add a Gallery Widget here to display a photo gallery. View the <a target="_blank" href="http://demo.themely.com/serenity/#gallery">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title d-none">',
			'after_title' => '</h3>',
		) );

	}

	if ( get_theme_mod( 'serenity_lite_newsletter_section_toggle' ) == '' ) {

		register_sidebar( array(
			'name' =>__( 'One-Page Newsletter Section', 'serenity-lite'),
			'id' => 'newsletter-form-widgets',
			'description' => __( 'Widgets in this area will be shown in the Newsletter section of the One-Page Template. Add a Newsletter Widget here to display a signup form. View the <a target="_blank" href="http://demo.themely.com/serenity/#newsletter">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s mt-2">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title d-none">',
			'after_title' => '</h3>',
		) );

	}

	if ( get_theme_mod( 'serenity_lite_services_section_toggle' ) == '' ) {

		$services_layout = esc_attr( get_theme_mod( 'serenity_lite_onepage_services_layout', 'col-sm-12 col-md-12 col-lg-4' ) );
	    
	    register_sidebar( array(
			'name' =>__( 'One-Page Services Section', 'serenity-lite'),
			'id' => 'service-widgets',
			'description' => __( 'Widgets will be shown in the Services section of the One-Page Template. Add Service Widgets here to display services. View the <a target="_blank" href="http://demo.themely.com/serenity/#services">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s ' . $services_layout . ' text-center mb-5"><div class="card shadow">',
			'after_widget' => '</div></div>',
			'before_title' => '<h5 class="widget-title mb-3 w-75 mx-auto">',
			'after_title' => '</h5>',
		) );

	}

	if ( get_theme_mod( 'serenity_lite_team_section_toggle' ) == '' ) {

	    $team_layout = esc_attr( get_theme_mod( 'serenity_lite_onepage_team_layout', 'col-sm-12 col-md-12 col-lg-4' ) );
	    
	    register_sidebar( array(
			'name' =>__( 'One-Page Team Section', 'serenity-lite'),
			'id' => 'team-widgets',
			'description' => __( 'Widgets will be shown in the Team Members section of the One-Page Template. Add Team Member Widgets here to display members of your team or employees of your company. View the <a target="_blank" href="http://demo.themely.com/serenity/#team">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s ' . $team_layout . ' text-center mb-4"><div class="card shadow">',
			'after_widget' => '</div></div>',
			'before_title' => '<h5 class="widget-title w-75 mx-auto mb-0">',
			'after_title' => '</h5>',
		) );

	}
    
    if ( get_theme_mod( 'serenity_lite_testimonials_section_toggle' ) == '' ) {

	    register_sidebar( array(
			'name' =>__( 'One-Page Testimonials Section', 'serenity-lite'),
			'id' => 'testimonial-widgets',
			'description' => __( 'Widgets will be shown in the Testimonials section of the One-Page Template. Add Testimonial Widgets here to display client testimonials. View the <a target="_blank" href="http://demo.themely.com/serenity/#testimonials">live demo</a> for ideas and examples. You can also <a href="themes.php?page=serenity-lite-welcome#import_demo">import widgets from the live demo</a> to help you get started.', 'serenity-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s mx-3 mb-3"><div class="card shadow">',
			'after_widget' => '</div></div>',
			'before_title' => '<h3 class="widget-title d-none">',
			'after_title' => '</h3>',
		) );

	}
    
}

add_action( 'widgets_init', 'serenity_lite_widgets_init' );