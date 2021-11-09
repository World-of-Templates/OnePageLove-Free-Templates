<?php
/**
 *  function Page
 */
if ( ! isset( $content_width ) ){
  $content_width = 1170;
}
function featuredlite_setup() {
load_theme_textdomain('featuredlite', get_template_directory() . '/languages');

// Add RSS feed links to <head> for posts and comments.
add_theme_support( 'automatic-feed-links' );
/*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array('comment-form', 'comment-list', 'gallery', 'caption'
) );
    
    /* woocommerce support */
        add_theme_support( 'woocommerce' );
        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height'      => 60,
    'width'       => 225,
    'flex-height' => true,
  ) ); 

/**
 * Enable support for Post Thumbnails on posts and pages.
 * @param  
 * @return mixed|string
 */
   
add_theme_support('post-thumbnails');
add_image_size( 'featuredlite-custom-thumb', 800, 450, true );

// post-header image
$defaults = array(
    'default-image'          => get_template_directory_uri().'/images/bg.jpg',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => false,
    'default-text-color'     => 'f16c20',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );  
add_editor_style( 'custom-editor-style.css' );
$args = array(
  'default-color' => 'ffffff',
);
add_theme_support( 'custom-background', $args );
// Recommend plugins
        add_theme_support( 'recommend-plugins', array(
            'themehunk-customizer' => array(
                'name' => esc_html__( 'ThemeHunk Customizer', 'featuredlite' ),
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'featuredlite' ),
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'featuredlite' ),
                'active_filename' => 'woocommerce/woocommerce.php',
            )
        ) );
}
add_action( 'after_setup_theme', 'featuredlite_setup' );
require_once( get_template_directory() . '/inc/index.php' );
/**
 * Enqueue scripts and styles for the front end.
 */
function featuredlite_scripts() {
$featuredlite_animation = get_theme_mod('featuredlite_animation_disable');
// Add Genericons font, used in the main stylesheet.
if($featuredlite_animation =='' || $featuredlite_animation =='0'){
wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0' );
}
wp_enqueue_style( 'featuredlite-font-awesome', get_template_directory_uri() . '/css/font-awesome/css/fontawesome-all.css', array(), '1.0.0' );
wp_enqueue_style( 'featuredlite-font-awesome-old', get_template_directory_uri() . '/css/font-awesome/css/fontawesome.css', array(), '1.0.0' );
wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0' );
wp_enqueue_style('featuredlite-style', get_stylesheet_uri());
wp_add_inline_style( 'featuredlite-style', featuredlite_custom_header() );
// js include
wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/easing.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'featuredlite-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );
 // Comment reply
if (is_singular() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
  }
}
add_action( 'wp_enqueue_scripts', 'featuredlite_scripts' );

add_action( 'admin_enqueue_scripts', 'featuredlite_admin_script' );
function featuredlite_admin_script(){
wp_enqueue_script( 'featuredlite-admin-settings', get_template_directory_uri()  . '/js/oneclick-demo-import.js', array( 'jquery', 'wp-util', 'updates' ), '');

      $localize = array(
        'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
        'btnActivating'       => __( 'Activating Importer Plugin ', 'featuredlite' ) . '&hellip;',
        'featuredliteSitesLink'      => admin_url( 'themes.php?page=pt-one-click-demo-import' ),
        'featuredliteSitesLinkTitle' => __( 'See Library', 'featuredlite' ),
      );
      wp_localize_script( 'featuredlite-admin-settings', 'featuredlite', apply_filters( 'featuredlite_theme_js_localize', $localize ) );
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function featuredlite_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'featuredlite_skip_link_focus_fix' );


if ( ! function_exists( 'wp_body_open' ) ) {

  /**
   * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
   */
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}