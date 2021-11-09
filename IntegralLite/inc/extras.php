<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 */

/** Disable Redux Demo Mode **/
function disable_redux_demo() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'disable_redux_demo');

/** Remove Redux Menu Under Tools **/
add_action( 'admin_menu', 'remove_redux_menu', 12);
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

/** Custom Excerpts **/
function integral_custom_excerpts($limit) {
    return wp_trim_words(get_the_content(), $limit);
}

/** Custom Read More Link **/
function integral_excerpt_read_more_link($more) {
  if ( ! is_admin() ) {
  global $post;
  return ' ... <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link text-uppercase small"><strong>'.__('Continue Reading','integral').'</strong> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>';
  }
}
add_filter( 'excerpt_more', 'integral_excerpt_read_more_link' );

/**
 * Add Bootstrap img-responsive to all content images
 */
function integral_add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'integral_add_image_responsive_class');

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );