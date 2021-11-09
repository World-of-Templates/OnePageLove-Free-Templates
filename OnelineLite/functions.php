<?php
if ( ! isset( $content_width ) ) {
  $content_width = 1170;
}

function oneline_lite_setup() {
load_theme_textdomain('oneline-lite', get_template_directory() . '/languages');

// Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array('comment-form', 'comment-list', 'gallery', 'caption'
    ) );
    

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

  add_theme_support('post-thumbnails');
    /* Set the image size by cropping the image */
      /* Set the image size by cropping the image */
   add_image_size( 'oneline-lite-custom-blog', 275, 184, true );
   add_image_size( 'oneline-lite-recent-post', 90, 90, true );
   add_image_size( 'oneline-releted-post-thumb', 244, 164, true );


        /* woocommerce support */
        add_theme_support( 'woocommerce' );
        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );
    remove_theme_support( 'widgets-block-editor' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
// post-header image
$defaults = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => false,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );  
add_editor_style( 'custom-editor-style.css' );
$args = array(
  'default-color' => 'f7f7f7',
);
add_theme_support( 'custom-background', $args );
add_editor_style( 'css/custom-editor-style.css' );
// Recommend plugins
        add_theme_support( 'recommend-plugins', array(

            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'oneline-lite' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
            ),

            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'oneline-lite' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),

            'th-advance-product-search' => array(
                'name' => esc_html__( 'TH Advance Product & Post Search', 'oneline-lite' ),
                'img' => 'icon-128x128.gif',
                'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ),

            'th-variation-swatches' => array(
                'name' => esc_html__( 'TH Variation swatches', 'oneline-lite' ),
                'img' => 'icon-128x128.gif',
                'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
            ), 

            'themehunk-customizer' => array(
                'name' => esc_html__( 'ThemeHunk Customizer', 'oneline-lite' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),


            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'oneline-lite' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),

             
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'oneline-lite' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            ),
        ) );


// Import Data Content plugins
        add_theme_support( 'import-demo-content', array(

            'themehunk-customizer' => array(
                'name' => esc_html__( 'ThemeHunk Customizer', 'oneline-lite' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),

            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'oneline-lite' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ), 
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'oneline-lite' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),

        ));



}
add_action( 'after_setup_theme', 'oneline_lite_setup' );

require_once( get_template_directory() . '/inc/include.php' );

/**
 * Enqueue scripts and styles for the front end.
 *
 */
function oneline_lite_scripts(){
// Add Genericons font, used in the main stylesheet.
$oneline_lite_animation = get_theme_mod('oneline-lite_animation_disable');
// Add Genericons font, used in the main stylesheet.
if($oneline_lite_animation =='' || $oneline_lite_animation =='0'){
wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0' );
}
wp_enqueue_style( 'shopline-fontawesome', get_template_directory_uri() . '/css/font-awesome/css/fontawesome-all.css', array(), '1.0.0' );
wp_enqueue_style( 'shopline-fontawesome-old', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.css', array(), '1.0.0' );
wp_enqueue_style( 'bx-slider', get_template_directory_uri() . '/css/bxslider.css', array(), '1.0.0' );
  wp_enqueue_style('oneline-lite-style', get_stylesheet_uri());
  wp_add_inline_style( 'oneline-lite-style', oneline_lite_header() );

  // inline css
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', false );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.js', array( 'jquery' ), '', true );
     wp_enqueue_script( 'imagesloaded' );
  wp_enqueue_script( 'oneline-lite-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );


  // Comment reply
  if (is_singular() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
  }
}

add_action( 'wp_enqueue_scripts', 'oneline_lite_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function oneline_lite_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'oneline_lite_skip_link_focus_fix' );

/**
  * dynamic social link
  *
  */
function oneline_lite_social_links(){
?>
    <ul>
<?php if($f_link = esc_url(get_theme_mod('social_link_facebook'))) : ?><li><a target='_blank' href="<?php echo $f_link; ?>" ><i class='fa fa-facebook'></i></a></li><?php endif; ?>
<?php if($f_link = esc_url(get_theme_mod('social_link_youtube'))) : ?><li><a target='_blank' href="<?php echo $f_link; ?>" ><i class='fa fa-youtube'></i></a></li><?php endif; ?>
<?php if($f_link = esc_url(get_theme_mod('social_link_instagram'))) : ?><li><a target='_blank' href="<?php echo $f_link; ?>" ><i class='fa fa-instagram'></i></a></li><?php endif; ?>
<?php if($f_link = esc_url(get_theme_mod('social_link_skype'))) : ?><li><a target='_blank' href="<?php echo $f_link; ?>" ><i class='fa fa-skype'></i></a></li><?php endif; ?>
<?php if($g_link = esc_url(get_theme_mod('social_link_linkedin'))) : ?><li><a target='_blank' href="<?php echo $g_link; ?>" ><i class='fa fa-linkedin'></i></a></li><?php endif; ?>
<?php if($l_link = esc_url(get_theme_mod('social_link_pintrest'))) : ?><li><a target='_blank' href="<?php echo $l_link; ?>" ><i class='fa fa-pinterest'></i></a></li><?php endif; ?>
<?php if($p_link = esc_url(get_theme_mod('social_link_twitter'))) : ?><li><a target='_blank' href="<?php echo $p_link; ?>" ><i class='fa fa-twitter'></i></a></li><?php endif; ?>
    </ul>

<?php } 
add_action( 'admin_enqueue_scripts', 'oneline_lite_admin_script' );
function oneline_lite_admin_script(){
wp_enqueue_script( 'oneline_lite-admin-settings', get_template_directory_uri()  . '/js/oneclick-demo-import.js', array( 'jquery', 'wp-util', 'updates' ), '',true);

      $localize = array(
        'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
        'btnActivating'       => __( 'Activating Importer Plugin ', 'oneline-lite' ) . '&hellip;',
        'onelineliteSitesLink'      => admin_url( 'themes.php?page=pt-one-click-demo-import' ),
        'onelineliteSitesLinkTitle' => __( 'See Library', 'oneline-lite' ),
      );
      wp_localize_script( 'oneline_lite-admin-settings', 'oneline', apply_filters( 'oneline_theme_js_localize', $localize ) );
}

if ( ! function_exists( 'wp_body_open' ) ) {

  /**
   * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
   */
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
} ?>