<?php
/**
 * Ministudio functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */
 
//Include Files 
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/theme-options.php';

//Set Excerpt Length
function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Add Welcome Screen
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
	require get_template_directory() . '/inc/tgm-plugin-activation/tgm-plugin-activation.php';
}

//Add Woccommerce Theme Support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if ( ! function_exists( 'ministudio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own ministudio_setup() function to override in a child theme.
 *
 * @since Ministudio 1.0.5
 */
function ministudio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ministudio, use a find and replace
	 * to change 'ministudio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ministudio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Ministudio 1.0.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ministudio' ),
		'social'  => __( 'Social Links Menu', 'ministudio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', ministudio_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // ministudio_setup
add_action( 'after_setup_theme', 'ministudio_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Ministudio 1.0.5
 */
function ministudio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ministudio_content_width', 840 );
}
add_action( 'after_setup_theme', 'ministudio_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Ministudio 1.0.5
 */
function ministudio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ministudio' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ministudio' ),
		'before_widget' => '<section id="%1$s" class="sidebar_wrap category-detail wow  fadeInUp animated">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'ministudio_widgets_init' );

/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'ministudio_register_widgets');

function ministudio_register_widgets() {   

	register_widget('ministudio_slider');
	register_widget('ministudio_about');
	register_widget('ministudio_services');
	register_widget('ministudio_portfolio');
	register_widget('ministudio_pricing');
	
	$ministudio_sidebars = array ( 'sidebar-slider' => 'sidebar-slider', 'sidebar-about' => 'sidebar-about', 'sidebar-services' => 'sidebar-services', 'sidebar-portfolio' => 'sidebar-portfolio', 'sidebar-pricing' => 'sidebar-pricing' );
	
	/* Register sidebars */
	foreach ( $ministudio_sidebars as $ministudio_sidebar ):
	
		if( $ministudio_sidebar == 'sidebar-slider' ):
		
			$ministudio_name = __('Slider widget', 'ministudio');
		
		elseif( $ministudio_sidebar == 'sidebar-about' ):
		
			$ministudio_name = __('About widget', 'ministudio');
			
		elseif( $ministudio_sidebar == 'sidebar-services' ):
		
			$ministudio_name = __('Services widget', 'ministudio');
			
		elseif( $ministudio_sidebar == 'sidebar-portfolio' ):
		
			$ministudio_name = __('Portfolio widget', 'ministudio');
			
		elseif( $ministudio_sidebar == 'sidebar-pricing' ):
		
			$ministudio_name = __('Pricing widget', 'ministudio');
			
		else:
		
			$ministudio_name = $ministudio_sidebar;
			
		endif;
		
        register_sidebar(
            array (
                'name'          => $ministudio_name,
                'id'            => $ministudio_sidebar,
                'before_widget' => '',
                'after_widget'  => ''
            )
        );
		
    endforeach;	
}

/**
 * Add default widgets
 */
add_action('after_switch_theme', 'ministudio_register_default_widgets');
	
function ministudio_register_default_widgets() {
	
	$ministudio_sidebars = array ( 'sidebar-slider' => 'sidebar-slider', 'sidebar-about' => 'sidebar-about', 'sidebar-services' => 'sidebar-services', 'sidebar-portfolio' => 'sidebar-portfolio', 'sidebar-pricing' => 'sidebar-pricing' );
	
	$active_widgets = get_option( 'sidebars_widgets' );	
	
	/**
     * Default Slider widgets
     */
	if ( empty ( $active_widgets[ $ministudio_sidebars['sidebar-slider'] ] ) ):

		$ministudio_counter = 1;

        /* slider widget #1 */
		$active_widgets[ 'sidebar-slider' ][0] = 'ministudio-slider-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Expression Digital Agency', 'subtitle' => 'Premium Multipurpose Theme', 'link' => '#/', 'image_uri' => get_template_directory_uri()."/images/slide1.jpg" );
        update_option( 'widget_ministudio-slider-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* slider widget #2 */
		$active_widgets[ 'sidebar-slider' ][] = 'ministudio-slider-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Template for Professionals', 'subtitle' => 'Premium Multipurpose Theme', 'link' => '#/', 'image_uri' => get_template_directory_uri()."/images/slide2.jpg" );
        update_option( 'widget_ministudio-slider-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* slider widget #3 */
		$active_widgets[ 'sidebar-slider' ][] = 'ministudio-slider-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'We Are Creative & Innovative', 'subtitle' => 'Premium Multipurpose Theme', 'link' => '#/', 'image_uri' => get_template_directory_uri()."/images/slide3.jpg" );
        update_option( 'widget_ministudio-slider-widget', $ourfocus_content );
        $ministudio_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	
	/**
     * Default About widgets
     */
	if ( empty ( $active_widgets[ $ministudio_sidebars['sidebar-about'] ] ) ):

		$ministudio_counter = 1;

        /* about widget #1 */
		$active_widgets[ 'sidebar-about' ][0] = 'ministudio-about-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Agency History', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'image_uri' => get_template_directory_uri()."/images/about1.jpg" );
        update_option( 'widget_ministudio-about-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* about widget #2 */
		$active_widgets[ 'sidebar-about' ][] = 'ministudio-about-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Our Mission', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'image_uri' => get_template_directory_uri()."/images/about2.jpg" );
        update_option( 'widget_ministudio-about-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* about widget # */
		$active_widgets[ 'sidebar-about' ][] = 'ministudio-about-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Achievements', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'image_uri' => get_template_directory_uri()."/images/about3.jpg" );
        update_option( 'widget_ministudio-about-widget', $ourfocus_content );
        $ministudio_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	 
	/**
     * Default Services widgets
     */
	if ( empty ( $active_widgets[ $ministudio_sidebars['sidebar-services'] ] ) ):

		$ministudio_counter = 1;

        /* services widget #1 */
		$active_widgets[ 'sidebar-services' ][0] = 'ministudio-services-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Branding', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'fa-lightbulb-o', 'image_uri' => get_template_directory_uri()."/images/service1.jpg" );
        update_option( 'widget_ministudio-services-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* services widget #2 */
		$active_widgets[ 'sidebar-services' ][] = 'ministudio-services-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Development', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'fa-desktop', 'image_uri' => get_template_directory_uri()."/images/service2.jpg" );
        update_option( 'widget_ministudio-services-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* services widget #3 */
		$active_widgets[ 'sidebar-services' ][] = 'ministudio-services-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Web Design', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'fa-paint-brush', 'image_uri' => get_template_directory_uri()."/images/service3.jpg" );
        update_option( 'widget_ministudio-services-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* services widget #4 */
		$active_widgets[ 'sidebar-services' ][] = 'ministudio-services-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Photography', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'fa-camera', 'image_uri' => get_template_directory_uri()."/images/service4.jpg" );
        update_option( 'widget_ministudio-services-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* services widget #5 */
		$active_widgets[ 'sidebar-services' ][] = 'ministudio-services-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Marketing', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'fa-line-chart', 'image_uri' => get_template_directory_uri()."/images/service5.jpg" );
        update_option( 'widget_ministudio-services-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* services widget #6 */
		$active_widgets[ 'sidebar-services' ][] = 'ministudio-services-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Support', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'fa-headphones', 'image_uri' => get_template_directory_uri()."/images/service6.jpg" );
        update_option( 'widget_ministudio-services-widget', $ourfocus_content );
        $ministudio_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	
	/**
     * Default Portfolio widgets
     */
	if ( empty ( $active_widgets[ $ministudio_sidebars['sidebar-portfolio'] ] ) ):

		$ministudio_counter = 1;

        /* portfolio widget #1 */
		$active_widgets[ 'sidebar-portfolio' ][0] = 'ministudio-portfolio-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Project 1', 'portfoliotype' => 'web-design', 'image_uri' => get_template_directory_uri()."/images/portfolio1.jpg" );
        update_option( 'widget_ministudio-portfolio-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* portfolio widget #2 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'ministudio-portfolio-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Project 2', 'portfoliotype' => 'photography', 'image_uri' => get_template_directory_uri()."/images/portfolio2.jpg" );
        update_option( 'widget_ministudio-portfolio-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* portfolio widget #3 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'ministudio-portfolio-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Project 3', 'portfoliotype' => 'web-design', 'image_uri' => get_template_directory_uri()."/images/portfolio3.jpg" );
        update_option( 'widget_ministudio-portfolio-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* portfolio widget #4 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'ministudio-portfolio-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Project 4', 'portfoliotype' => 'development', 'image_uri' => get_template_directory_uri()."/images/portfolio4.jpg" );
        update_option( 'widget_ministudio-portfolio-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* portfolio widget #5 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'ministudio-portfolio-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Project 5', 'portfoliotype' => 'photography', 'image_uri' => get_template_directory_uri()."/images/portfolio5.jpg" );
        update_option( 'widget_ministudio-portfolio-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* portfolio widget #6 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'ministudio-portfolio-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Creative Project 6', 'portfoliotype' => 'marketing', 'image_uri' => get_template_directory_uri()."/images/portfolio6.jpg" );
        update_option( 'widget_ministudio-portfolio-widget', $ourfocus_content );
        $ministudio_counter++;
		
    endif;
	
	/**
     * Default Pricing widgets
     */
	if ( empty ( $active_widgets[ $ministudio_sidebars['sidebar-pricing'] ] ) ):

		$ministudio_counter = 1;

        /* pricing widget #1 */
		$active_widgets[ 'sidebar-pricing' ][0] = 'ministudio-pricing-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Basic Plan', 'text' => '<ul><li>15 Users</li><li>10 Projects</li><li>30 GB of Storage</li><li>5 Workspaces</li><li>Private Forums</li><li>Enhanced Security</li></ul>', 'discount' => '25', 'price' => '9.99' );
        update_option( 'widget_ministudio-pricing-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* pricing widget #2 */
		$active_widgets[ 'sidebar-pricing' ][] = 'ministudio-pricing-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Standard', 'text' => '<ul><li>25 Users</li><li>15 Projects</li><li>40 GB of Storage</li><li>5 Workspaces</li><li>Private Forums</li><li>Enhanced Security</li></ul>', 'discount' => '30', 'price' => '19.99' );
        update_option( 'widget_ministudio-pricing-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* pricing widget #3 */
		$active_widgets[ 'sidebar-pricing' ][] = 'ministudio-pricing-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Premium', 'text' => '<ul><li>55 Users</li><li>40 Projects</li><li>80 GB of Storage</li><li>5 Workspaces</li><li>Private Forums</li><li>Enhanced Security</li></ul>', 'discount' => '15', 'price' => '29.99' );
        update_option( 'widget_ministudio-pricing-widget', $ourfocus_content );
        $ministudio_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	
	/**
     * Default Team widgets
     */
	if ( empty ( $active_widgets[ $ministudio_sidebars['sidebar-team'] ] ) ):

		$ministudio_counter = 1;

        /* team widget #1 */
		$active_widgets[ 'sidebar-team' ][0] = 'ministudio-team-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'John doe', 'designation' => 'CEO-Founder', 'facebook' => '#/', 'twitter' => '#/', 'linkedin' => '#/', 'googlep' => '#/', 'image_uri' => get_template_directory_uri()."/images/team1.png" );
        update_option( 'widget_ministudio-team-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* team widget #2 */
		$active_widgets[ 'sidebar-team' ][] = 'ministudio-team-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Dany Michel', 'designation' => 'CEO-Founder', 'facebook' => '#/', 'twitter' => '#/', 'linkedin' => '#/', 'googlep' => '#/', 'image_uri' => get_template_directory_uri()."/images/team2.png" );
        update_option( 'widget_ministudio-team-widget', $ourfocus_content );
        $ministudio_counter++;
		
		/* team widget #3 */
		$active_widgets[ 'sidebar-team' ][] = 'ministudio-team-widget-' . $ministudio_counter;
        $ourfocus_content[ $ministudio_counter ] = array ( 'title' => 'Mike Rose', 'designation' => 'Marketing Head', 'facebook' => '#/', 'twitter' => '#/', 'linkedin' => '#/', 'googlep' => '#/', 'image_uri' => get_template_directory_uri()."/images/team3.png" );
        update_option( 'widget_ministudio-team-widget', $ourfocus_content );
        $ministudio_counter++;
		
    endif;

}

/**************************/
/****** slider widget */
/************************/

class ministudio_slider extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ministudio-slider-widget',
			__( 'Ministudio - Slider widget', 'ministudio' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('ministudio_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>
		<?php if( !empty($instance['image_uri']) ): ?>
		<div class="banner-slide">
        	<img src="<?php echo esc_url($instance['image_uri']); ?>"/>
            <div class="banner_text">
				<?php if( !empty($instance['title']) ): echo "<h1>".apply_filters('widget_title', $instance['title'])."</h1>"; endif; ?>
				<?php if( !empty($instance['subtitle']) ): echo "<h3>".apply_filters('widget_title', $instance['subtitle'])."</h3>"; endif; ?>
				<?php if( !empty($instance['link']) ): ?><a class="btn banner_btn" href="<?php echo esc_url($instance['link']); ?>"> <?php _e( 'Read More', 'ministudio' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a><?php endif; ?>
            </div>
        </div>
		<?php endif; ?>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['link'] = strip_tags( $new_instance['link'] );
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Sub Title', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('subtitle'); ?>" id="<?php echo $this->get_field_id('subtitle'); ?>" value="<?php if( !empty($instance['subtitle']) ): echo $instance['subtitle']; endif; ?>" class="widefat">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Button Link','ministudio'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo esc_url($instance['link']); endif; ?>" class="widefat">
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'ministudio'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'ministudio' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','ministudio'); ?>" style="margin-top:5px;"/>
        </p>
		
		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />
		
    <?php

    }

}

/**************************/
/****** about widget */
/************************/

class ministudio_about extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ministudio-about-widget',
			__( 'Ministudio - About widget', 'ministudio' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('ministudio_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>
		<?php if( !empty($instance['image_uri']) ): ?>
		<div class="col-md-4 col-sm-4">
			<div class="we_are_detail wow animated fadeInUp">
				<div class="about_us_img">
					<img src="<?php echo esc_url($instance['image_uri']); ?>"/>
				</div>
				<?php if( !empty($instance['title']) ): echo "<h5>".apply_filters('widget_title', $instance['title'])."</h5>"; endif; ?>
				<?php if( !empty($instance['text']) ) { echo '<p>'; echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); echo '</p>'; } ?>
			</div>
		</div>
		<?php endif; ?>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'ministudio'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'ministudio'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'ministudio' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','ministudio'); ?>" style="margin-top:5px;"/>
        </p>
		
		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />
		
    <?php

    }

}

/**************************/
/****** services widget */
/************************/

class ministudio_services extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ministudio-services-widget',
			__( 'Ministudio - Services widget', 'ministudio' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('ministudio_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>
		<?php if( !empty($instance['image_uri']) ): ?>
		<div class="col-md-4 col-sm-6">
			<div class="we_do_detail wow animated fadeInUp" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat; background-size:100%" >
				<div class="we_do_detail_m">
					<i class="fa <?php echo apply_filters('widget_title', $instance['iconclass']); ?>" aria-hidden="true"></i>
					<?php if( !empty($instance['title']) ): echo "<h6 class='heading'>".apply_filters('widget_title', $instance['title'])."</h6>"; endif; ?>
					<div class="we_do_content">
						<?php if( !empty($instance['text']) ) { echo '<p>'; echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); echo '</p>'; } ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['iconclass'] = strip_tags($new_instance['iconclass']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'ministudio'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('iconclass'); ?>"><?php _e('Icon Class', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('iconclass'); ?>" id="<?php echo $this->get_field_id('iconclass'); ?>" value="<?php if( !empty($instance['iconclass']) ): echo $instance['iconclass']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'ministudio'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'ministudio' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','ministudio'); ?>" style="margin-top:5px;"/>
        </p>
		
		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />
		
    <?php

    }
}

/**************************/
/****** portfolio widget */
/************************/

class ministudio_portfolio extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ministudio-portfolio-widget',
			__( 'Ministudio - Portfolio widget', 'ministudio' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('ministudio_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>
		<?php if( !empty($instance['image_uri']) ): ?>
		<div class="element-item recent_work_detail <?php echo apply_filters('widget_title', $instance['portfoliotype']);?>">
			<div class="recent_wrap">
				<div class="recent_img">
					<a href="#/"> <img src="<?php echo esc_url($instance['image_uri']); ?>"/> </a>	
				</div>
				<div class="recent_hover">
					<?php if( !empty($instance['title']) ): echo "<h5>".apply_filters('widget_title', $instance['title'])."</h5>"; endif; ?>
					<?php if( !empty($instance['portfoliotype']) ): echo "<p>".apply_filters('widget_title', $instance['portfoliotype'])."</p>"; endif; ?>
				</div>
			</div>                        
		</div>
		<?php endif; ?>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['portfoliotype'] = strip_tags($new_instance['portfoliotype']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

        return $instance;

    }

    function form($instance) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('portfoliotype'); ?>"><?php _e('Portfolio Type', 'ministudio'); ?></label><br/>
            <select name="<?php echo $this->get_field_name('portfoliotype'); ?>" id="<?php echo $this->get_field_id('portfoliotype'); ?>" class="widefat">
				<option value="web-design" <?php if($instance['portfoliotype']=="web-design"){ echo "selected"; }?>>Web Design</option>
				<option value="photography" <?php if($instance['portfoliotype']=="photography"){ echo "selected"; }?>>Photography</option>
				<option value="development" <?php if($instance['portfoliotype']=="development"){ echo "selected"; }?>>Development</option>
				<option value="marketing" <?php if($instance['portfoliotype']=="marketing"){ echo "selected"; }?>>Marketing</option>
			</select>
		
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'ministudio'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'ministudio' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','ministudio'); ?>" style="margin-top:5px;"/>
        </p>
		
		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />
		
    <?php

    }

}

/**************************/
/****** pricing widget */
/************************/

class ministudio_pricing extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ministudio-pricing-widget',
			__( 'Ministudio - Pricing widget', 'ministudio' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('ministudio_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
		
		$pricing_discount = $instance['discount'];
		$pricing_price = $instance['price'];
        ?>
		<div class="col-md-4 col-sm-4">
			<div class="price_table_detail wow animated fadeInUp">
				<div class="table_top <?php if($count%2==0){echo "table-top_m";}?>">
					<?php if( !empty($instance['title']) ): echo "<h4>".apply_filters('widget_title', $instance['title'])."</h4>"; endif; ?>	
				</div>	
				<?php if($pricing_discount){?><h5> <?php echo $pricing_discount;?>% <span> <?php _e( 'Off', 'ministudio' ); ?> </span> </h5><?php } ?> 
				<?php if( !empty($instance['text']) ) { echo '<p>'; echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); echo '</p>'; } ?>
				
				<?php if($pricing_price){?><h2> $<?php echo $pricing_price;?> </h2><?php } ?> 
				<p> <?php _e( 'Per Month', 'ministudio' ); ?> </p>
				<a class="btn banner_btn pricing_btn" href="#">  <?php _e( 'Order Now', 'ministudio' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a>
			</div>
		</div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['discount'] = strip_tags($new_instance['discount']);
		$instance['price'] = strip_tags($new_instance['price']);


        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'ministudio'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('discount'); ?>"><?php _e('Discount', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('discount'); ?>" id="<?php echo $this->get_field_id('discount'); ?>" value="<?php if( !empty($instance['discount']) ): echo $instance['discount']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('price'); ?>"><?php _e('Price', 'ministudio'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('price'); ?>" id="<?php echo $this->get_field_id('price'); ?>" value="<?php if( !empty($instance['price']) ): echo $instance['price']; endif; ?>" class="widefat">
        </p>
		
    <?php

    }

}

		
//create the homepage on activation
if (isset($_GET['activated']) && is_admin()){

        $new_page_title = 'Home'; //page title
        $new_page_content = ''; //add here the content of the page
        $new_page_template = 'front-page.php'; //page template. (ex. template-custom.php) Leave blank if you don't want a custom page template.

        //don't change the code bellow, unless you know what you're doing

        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page', 
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }

}

function themename_after_setup_theme() {
	$home = get_page_by_title( 'Home' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home->ID );
}
add_action( 'after_setup_theme', 'themename_after_setup_theme' );


if ( ! function_exists( 'ministudio_fonts_url' ) ) :
/**
 * Register Google fonts for Ministudio.
 *
 * Create your own ministudio_fonts_url() function to override in a child theme.
 *
 * @since Ministudio 1.0.5
 *
 * @return string Google fonts URL for the theme.
 */
function ministudio_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'ministudio' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'ministudio' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'ministudio' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Ministudio 1.0.5
 */
function ministudio_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ministudio_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Ministudio 1.0.5
 */
function ministudio_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ministudio-fonts', ministudio_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'ministudio-style', get_stylesheet_uri() );
	
	// Bootstrap Min stylesheet.
	wp_enqueue_style( 'ministudio-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.4.1' );
	
	// Main stylesheet.
	wp_enqueue_style( 'ministudio-main-css', get_template_directory_uri() . '/css/style.css', array(), '3.4.1' );
	
	// Font Awesome stylesheet.
	wp_enqueue_style( 'ministudio-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.4.1' );
	
	// Animate Min stylesheet.
	wp_enqueue_style( 'ministudio-animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.4.1' );
	
	// Testimonial Slider Carousel stylesheet.
	wp_enqueue_style( 'ministudio-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '3.4.1' );
	
	// Testimonial Slider Transitions stylesheet.
	wp_enqueue_style( 'ministudio-transitions', get_template_directory_uri() . '/css/owl.transitions.css', array(), '3.4.1' );
	
	// Google Fonts.
	wp_enqueue_style( 'ministudio-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900', array(), '3.4.1' );
	
	//Custom JS Starts
	
	// Jquery.
	wp_enqueue_script( 'jquery');
	
	// Bootstrap Min.
	wp_enqueue_script( 'ministudio-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20160412', true );
	
	// Interface.
	wp_enqueue_script( 'ministudio-interface', get_template_directory_uri() . '/js/interface.js', array( 'jquery' ), '20160412', true );
	
	// Isotops.
	wp_enqueue_script( 'ministudio-isotops', get_template_directory_uri() . '/js/isotope-docs.min.js', array( 'jquery' ), '20160412', true );
	
	// Owl Carousel.
	wp_enqueue_script( 'ministudio-jquery', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '20160412', true );
	
	// Wow Min.
	wp_enqueue_script( 'ministudio-jquery', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '20160412', true );
	
	//Custom JS Ends

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'ministudio-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

	wp_localize_script( 'ministudio-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'ministudio' ),
		'collapse' => __( 'collapse child menu', 'ministudio' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'ministudio_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Ministudio 1.0.5
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function ministudio_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'ministudio_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Ministudio 1.0.5
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function ministudio_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Ministudio 1.0.5
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function ministudio_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'ministudio_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Ministudio 1.0.5
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function ministudio_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'ministudio_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Ministudio 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function ministudio_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'ministudio_widget_tag_cloud_args' );

/**
 * Redirect users after add to cart.
 */

function ministudio_add_to_cart_redirect( $url ) {
	$url = WC()->cart->get_cart_url();
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'ministudio_add_to_cart_redirect' );
