<?php
/**
 * Declaring widgets
 */

/** Register Sidebars and Custom Widget Areas **/
function parallel_widgets_init() {
    
    global $parallel;

    register_sidebar( array(
		'name' => __( 'Sidebar', 'parallel' ),
		'id' => 'sidebar-1',
		'description'   => __('Widgets in this area will be shown in the default sidebar.', 'parallel' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    $features_layout = $parallel['features-layout'];

	register_sidebar( array(
		'name' => __( 'Homepage Features Section', 'parallel' ),
		'id' => 'feature-widgets',
		'description' => __( 'The FEATURES section which appears on the homepage. Drag and drop widgets titled [Parallel  - Feature Widget] here to add features.', 'parallel' ),
		'before_widget' => '<div class="col-sm-'.$features_layout.' col-md-'.$features_layout.' col-lg-'.$features_layout.'"><div class="feature">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
    
    register_sidebar( array(
		'name' =>__( 'Homepage Testimonials Section', 'parallel'),
		'id' => 'testimonial-widgets',
		'description' => __( 'The TESTIMONIALS section which appears on the homepage. Drag and drop widgets titled [Parallel  - Testimonial Widget]  here to add testimonials.', 'parallel' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
    
    $services_layout = $parallel['services-layout'];
    
    register_sidebar( array(
		'name' =>__( 'Homepage Services Section', 'parallel'),
		'id' => 'service-widgets',
		'description' => __( 'The SERVICES section which appears on the homepage. Drag and drop widgets titled [Parallel  - Service Widget] here to add services.', 'parallel' ),
		'before_widget' => '<div class="col-sm-'.$services_layout.' col-md-'.$services_layout.' col-lg-'.$services_layout.' service">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	$brands_layout = $parallel['brands-layout'];
    
    register_sidebar( array(
		'name' =>__( 'Homepage Brands Section', 'parallel'),
		'id' => 'brands-widgets',
		'description' => __( 'The Brands section which appears on the homepage. Drag and drop widgets titled [Parallel - Brand Widget] here to add brands.', 'parallel' ),
		'before_widget' => '<div class="col-sm-'.$brands_layout.' col-md-'.$brands_layout.' col-lg-'.$brands_layout.'">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
    
    $team_layout = $parallel['team-layout'];
    
    register_sidebar( array(
		'name' =>__( 'Homepage Team Section', 'parallel'),
		'id' => 'team-widgets',
		'description' => __( 'The OUR TEAM section which appears on the homepage. Drag and drop widgets titled [Parallel  - Team Member Widget] here to add team members.', 'parallel' ),
		'before_widget' => '<div class="col-sm-'.$team_layout.' col-md-'.$team_layout.' col-lg-'.$team_layout.' member">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="name">',
		'after_title' => '</h3>',
	) );
    
}

add_action( 'widgets_init', 'parallel_widgets_init' );

/** Load Custom Widgets **/
require_once get_template_directory() . '/inc/widgets/custom_widgets.php';