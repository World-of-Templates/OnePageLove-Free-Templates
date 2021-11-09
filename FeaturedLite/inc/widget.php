<?php
function featuredlite_widgets_init() {
// Area , located below the Primary Widget Area in the sidebar. Empty by default.
register_sidebar(array(
'name' => __('Primary Sidebar', 'featuredlite'),
'id' => 'primary-sidebar',
'description' => __('Main sidebar that appears on the left.', 'featuredlite'),
'before_widget' => '<div class="sidebar-inner-widget">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title' => '<h4 class="widgettitle"><span>',
'after_title' => '</span></h4>',
));
// Area , located below the Secondry Widget Area in the sidebar. Empty by default.
register_sidebar(array(
'name' => __('Secondry Sidebar', 'featuredlite'),
'id' => 'secondary-sidebar',
'description' => __('Secondry sidebar that appears on the left.', 'featuredlite'),
'before_widget' => '<div class="sidebar-inner-widget">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title' => '<span><h4 class="widgettitle"><span>',
'after_title' => '</span></h4>',
));
// Area 1, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('First Footer Widget Area', 'featuredlite'),
'id' => 'first-footer-widget-area',
'description' => __('Appears in the first footer section of the site.', 'featuredlite'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle" >',
'after_title' => '</h4>',
));
// Area 2, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('Second Footer Widget Area', 'featuredlite'),
'id' => 'second-footer-widget-area',
'description' => __('Appears in the Second footer section of the site.', 'featuredlite'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle" >',
'after_title' => '</h4>',
));

// Area 3, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('Third Footer Widget Area', 'featuredlite'),
'id' => 'third-footer-widget-area',
'description' => __('Appears in the Third footer section of the site.', 'featuredlite'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));
// Area 4, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('Fourth Footer Widget Area', 'featuredlite'),
'id' => 'fourth-footer-widget-area',
'description' => __('Appears in the Four footer section of the site.', 'featuredlite'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));

register_sidebar(array(
        'name' => __('Woocommerce widget area', 'featuredlite'),
        'id' => 'th-woo-widget-area',
        'description' => __('Woocommerce page display', 'featuredlite'),
        'before_widget' => '<div class="sidebar-inner-widget">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title' => '<span><h4 class="widgettitle"><span>',
'after_title' => '</span></h4>',
    ));   

}
/** Register sidebars by running featuredlite_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'featuredlite_widgets_init');
