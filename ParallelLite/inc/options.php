<?php
/**
 * Redux Framework Options for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.

$opt_name = "parallel";
/*
*
* --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
*
*/

// Background Patterns Reader

$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {
    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();
        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {
            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode('.', $sample_patterns_file);
                $name = str_replace('.' . end($name) , '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 *
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(

    // TYPICAL -> Change these values as you need/desire

    'opt_name' => $opt_name,

    // This is where your data is stored in the database and also becomes your global variable name.

    'display_name' => $theme->get('Name') ,

    // Name that appears at the top of your panel

    'display_version' => $theme->get('Version') ,

    // Version that appears at the top of your panel

    'menu_type' => 'menu',

    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

    'allow_sub_menu' => true,

    // Show the sections below the admin menu item or not

    'menu_title' => __('Parallel Options', 'parallel') ,
    'page_title' => __('Parallel Options', 'parallel') ,

    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth

    'google_api_key' => 'AIzaSyB8VWXhSdIAAF6ZznBtNblYfzl1zMYugXE',

    // Set it you want google fonts to update weekly. A google_api_key value is required.

    'google_update_weekly' => false,

    // Must be defined to add google fonts to the typography module

    'async_typography' => true,

    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader

    'admin_bar' => true,

    // Show the panel pages on the admin bar

    'admin_bar_icon' => 'dashicons-admin-generic',

    // Choose an icon for the admin bar menu

    'admin_bar_priority' => 100,

    // Choose an priority for the admin bar menu

    'global_variable' => '',

    // Set a different name for your global variable other than the opt_name

    'dev_mode' => false,

    // Show the time the page took to load, etc

    'update_notice' => false,

    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo

    'customizer' => true,

    // Enable basic customizer support

    'customizer_only' => false,

    // This variable determines whether or not to hide the options panel (leaving options accessible only through the customizer). For developing themes           specifically for wordpress.org, this argument will need to be set to 'true'.
    // 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    // 'disable_save_warn' => true,                  // Disable the save warning when a user changes a field

    'disable_tracking' => true,

    // Disable tracking
    // OPTIONAL -> Give you extra features

    'page_priority' => 62,

    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.

    'page_parent' => 'themes.php',

    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters

    'page_permissions' => 'manage_options',

    // Permissions needed to access the options panel.

    'menu_icon' => '',

    // Specify a custom URL to an icon

    'last_tab' => '',

    // Force your panel to always open to a specific tab (by id)

    'page_icon' => 'icon-themes',

    // Icon displayed in the admin panel next to your menu_title

    'page_slug' => '',

    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided

    'save_defaults' => true,

    // On load save the defaults to DB before user clicks save or not

    'default_show' => false,

    // If true, shows the default value next to each field that is not the default value.

    'default_mark' => '',

    // What to print by the field's title if the value shown is default. Suggested: *

    'show_import_export' => true,

    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only

    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,

    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output

    'output_tag' => true,

    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    // 'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    // 'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    // HINTS

    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ) ,
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ) ,
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ) ,
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ) ,
        ) ,
    )
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.

$args['admin_bar_links'][] = array(
    'id' => 'redux-docs',
    'href' => 'http://support.themely.com/knowledgebase',
    'title' => __('Documentation', 'parallel') ,
);
$args['admin_bar_links'][] = array(
    'id' => 'redux-support',
    'href' => 'http://support.themely.com/',
    'title' => __('Support', 'parallel') ,
);

// $args['admin_bar_links'][] = array(
//    'id'    => 'redux-extensions',
//    'href'  => 'reduxframework.com/extensions',
//    'title' => __( 'Extensions', 'parallel' ),
// );
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.

$args['share_icons'][] = array(
    'url' => 'https://www.themely.com',
    'title' => __('Visit our website', 'parallel') ,
    'icon' => 'el el-globe'

    // 'img'   => '', // You can use icon OR img. IMG needs to be a full URL.

);
$args['share_icons'][] = array(
    'url' => 'http://twitter.com/themelycom',
    'title' => __('Follow us on Twitter', 'parallel') ,
    'icon' => 'el el-twitter'
);

// Panel Intro text -> before the form

if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    }
    else {
        $v = str_replace('-', '_', $args['opt_name']);
    }

    $args['intro_text'] = sprintf(__('<i style="color:#f18500;" class="el el-lock"></i> <a href=\"https://www.themely.com/themes/parallel/\" target=\"_blank=\" style=\"color:#f18500;\">Upgrade to Parallel Pro</a> to unlock all theme features.', 'parallel') , $v);
}
else {
    $args['intro_text'] = __('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'parallel');
}

// Add content after the form.
// $args['footer_text'] = __( '<p></p>', 'parallel' );

Redux::setArgs($opt_name, $args);
/*
* ---> END ARGUMENTS
*/
/*
* ---> START HELP TABS
*/
$tabs = array(
    array(
        'id' => 'redux-help-tab-1',
        'title' => __('Theme Information 1', 'parallel') ,
        'content' => __('This is the tab content, HTML is allowed.', 'parallel')
    ) ,
    array(
        'id' => 'redux-help-tab-2',
        'title' => __('Theme Information 2', 'parallel') ,
        'content' => __('This is the tab content, HTML is allowed.', 'parallel')
    )
);
Redux::setHelpTab($opt_name, $tabs);

// Set the help sidebar

$content = __('This is the sidebar content, HTML is allowed.', 'parallel');
Redux::setHelpSidebar($opt_name, $content);
/*
* <--- END HELP TABS
*/
/*
*
* ---> START SECTIONS
*
*/
/*

As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for

*/

// -> START Basic Fields

Redux::setSection($opt_name, array(
    'title' => __('General Settings', 'parallel') ,
    'id' => 'general',
    'desc' => __('General theme settings', 'parallel') ,
    'icon' => 'el el-cogs'
));

// -> START Typography

Redux::setSection($opt_name, array(
    'title' => __('Typography', 'parallel') ,
    'id' => 'general-typography',
    'desc' => __('Change the font properties for the body, titles and top menu', 'parallel') ,
    'icon' => 'el el-font',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'go-pro-1',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Colors

Redux::setSection($opt_name, array(
    'title' => __('Colors', 'parallel') ,
    'id' => 'general-colors',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'button-color',
            'type' => 'color',
            'title' => __('Main Button Color', 'parallel') ,
            'output' => array(
                'background-color' => '.btn-primary, .btn-inverse:hover, #mc-embedded-subscribe-form input[type="submit"], .ctct-embed-signup .ctct-button, .contact input[type="submit"]',
                'border-color' => '.btn-primary, .btn-inverse, #mc-embedded-subscribe-form input[type="submit"], .ctct-embed-signup .ctct-button',
                'color' => '.btn-inverse',
            ) ,
            'subtitle' => __('Pick a color for the main buttons.', 'parallel') ,
            'default' => '#6772e5',
        ) ,
        array(
            'id' => 'theme-color',
            'type' => 'color',
            'title' => __('Primary Color', 'parallel') ,
            'output' => array(
                'border-color' => '.navigation-top .menu > li.active a, .navigation-top .menu > li > a:hover',
                'color' => 'a, a:hover, a:focus, .testimonials blockquote p:before, .pagemeta a:link, .pagemeta a:visited, .services .service i
                ',
                'background-color' => '.dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover, .heading .title span, .main-navigation li li:hover, .main-navigation li li.focus'
            ) ,
            'subtitle' => __('Change the color used for links and highlights.', 'parallel') ,
            'default' => '#31ddb7',
        ) ,
        array(
            'id' => 'header-background',
            'type' => 'raw',
            'title' => __('Header Background Color', 'parallel') ,
            'output' => array(
                'background-color' => '.navbar'
            ) ,
            'subtitle' => __('Change the background color of the header where the logo and top navigation is located.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
    )
));

// -> START Homepage Layout

Redux::setSection($opt_name, array(
    'title' => __('Homepage Layout', 'parallel') ,
    'id' => 'general-homepage',
    'icon' => 'el el-th',
    'desc' => __('<p>Organize how you want the layout to appear on the homepage. Drag and drop in the desired order or drag to the right column to disable a section.</p><p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.</p>', 'parallel') ,
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'gen-home-layout',
            'type' => 'sorter',
            'title' => __('Homepage Layout Manager', 'parallel') ,
            'subtitle' => __('Organize how you want the layout to appear on the homepage. Drag and drop to the right column in order to disable a particular section.', 'parallel') ,
            'desc' => '',
            'panel' => false,
            'compiler' => 'true',
            'options' => array(
                'Enabled' => array(
                    'hero' => 'Welcome',
                    'features' => 'Features',
                    'work' => 'Work',
                    'gallery' => 'Gallery',
                    'testimonials' => 'Testimonials',
                    'services' => 'Services',
                    'brands' => 'Brands',
                    'call-to-action2' => 'Call to Action',
                    'about' => 'About',
                    'team' => 'Team',
                    'blog' => 'Blog',
                    'newsletter' => 'Newsletter',
                    'contact' => 'Contact',
                ) ,
                'Disabled' => array() ,
            ) ,
        ) ,
    )
));

// -> ANIMATIONS Settings

Redux::setSection($opt_name, array(
    'title' => __('Animations', 'parallel') ,
    'id' => 'general-animations',
    'icon' => 'el el-play-circle',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'animations-scrollreveal',
            'type' => 'raw',
            'title' => __('Scroll Reveal', 'parallel') ,
            'desc' => __('<p>Toggle off to enable/disable the scroll reveal animations.</p><p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Blog/Posts Layout

Redux::setSection($opt_name, array(
    'title' => __('Blog/Post Settings', 'parallel') ,
    'id' => 'general-blog',
    'icon' => 'el el-wordpress',
    'desc' => __('<p>Configure the post meta on all blog and post pages (index, categories and archives). Hide the post date, author, category and number of comments. Also enable/disable the author bio on posts.</p><p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.</p>', 'parallel') ,
    'subsection' => true,
));

// -> START Header

Redux::setSection($opt_name, array(
    'title' => __('Header', 'parallel') ,
    'id' => 'header',
    'icon' => 'el el-home',
    'fields' => array(
        
        array(
            'id' => 'header-padding',
            'type' => 'spacing',
            'title' => __('Menu Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top of the menu. This is generally used when you upload a large logo which increases the height of the header area. This will allow you to vertically center the top menu.', 'parallel') ,
            'output' => array(
                '.navbar .navigation-top'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'bottom' => 'false',
            'default' => array(
                'padding-top' => '0',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'header-logo',
            'type' => 'raw',
            'title' => __('Logo', 'parallel') ,
            'content' => __('To upload a logo to replace the default site name and description in the header, go to APPEARANCE > Customize and select the [Site Identity] tab. Or <a href="customize.php">click here</a> and then select the [Site Identity] tab.', 'parallel') ,
        ) ,
        array(
            'id' => 'header-title-transparent',
            'type' => 'raw',
            'title' => __('Site Name + Header with Transparent Background', 'parallel') ,
            'subtitle' => __('Change the site name properties with the transparent header background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'header-title-color',
            'type' => 'raw',
            'title' => __('Site Name + Header with Color Background', 'parallel') ,
            'subtitle' => __('Change the site name properties with the solid colored background (when scrolling down the page).', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'header-background',
            'type' => 'raw',
            'title' => __('Background Color', 'parallel') ,
            'subtitle' => __('Change the background color of the header where the logo and top navigation is located.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,

        ) ,
        array(
            'id' => 'header-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable Header', 'parallel') ,
            'subtitle' => __('Toggle off to disable the header section.', 'parallel') ,
        ) ,
    )
));

// -> START Hero

Redux::setSection($opt_name, array(
    'title' => __('Welcome', 'parallel') ,
    'id' => 'hero',
    'icon' => 'el el-flag',
    'fields' => array(
        array(
            'id' => 'hero-title',
            'type' => 'text',
            'title' => __('Title Line 1', 'parallel') ,
            'subtitle' => __('1st line of the title', 'parallel') ,
            'desc' => __('', 'parallel') ,
            'default' => 'One-Page Business Theme',
        ) ,
        array(
            'id' => 'hero-title-typography',
            'type' => 'raw',
            'title' => __('Title Line 1 Typography', 'parallel') ,
            'subtitle' => __('Change the font style (color, size, type, height, weight, styles & more)', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-subtitle',
            'type' => 'text',
            'title' => __('Title Line 2', 'parallel') ,
            'subtitle' => __('2nd line of the title', 'parallel') ,
            'desc' => __('', 'parallel') ,
            'default' => '',
        ) ,
        array(
            'id' => 'hero-subtitle-typography',
            'type' => 'raw',
            'title' => __('Title Line 2 Typography', 'parallel') ,
            'subtitle' => __('Change the font style (color, size, type, height, weight, styles & more)', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-tagline',
            'type' => 'textarea',
            'title' => __('Tagline', 'parallel') ,
            'subtitle' => __('Tagline for the hero section', 'parallel') ,
            'desc' => __('Custom HTML allowed', 'parallel') ,
            'default' => 'A professional WordPress theme for freelancers, agencies and businesses.
Create a stunning website in minutes.',
        ) ,
        array(
            'id' => 'hero-btn1-toggle',
            'type' => 'switch',
            'default' => false,
            'title' => __('Toggle Button 1', 'parallel') ,
            'subtitle' => __('Toggle off to disable the button', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-btn1-text',
            'type' => 'text',
            'title' => __('Button 1 Text', 'parallel') ,
            'default' => 'View Features',
            'required' => array(
                'hero-btn1-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'hero-btn1-url',
            'type' => 'text',
            'title' => __('Button 1 URL', 'parallel') ,
            'default' => '#',
            'required' => array(
                'hero-btn1-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'hero-btn2-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Toggle Button 2', 'parallel') ,
            'subtitle' => __('Toggle off to disable the button', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-btn2-text',
            'type' => 'text',
            'title' => __('Button 2 Text', 'parallel') ,
            'default' => 'Download Now',
            'required' => array(
                'hero-btn2-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'hero-btn2-url',
            'type' => 'text',
            'title' => __('Button 2 URL', 'parallel') ,
            'default' => '#',
            'required' => array(
                'hero-btn2-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'hero-bg',
            'type' => 'background',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Change the background image or select a color. This will fill up the background of the welcome section.', 'parallel') ,
            'desc' => __('Preferred image size of minimum 1600px wide', 'parallel') ,
            'output' => array(
                '.hero'
            ) ,
            'compiler' => 'true',
            'default' => array(
                'background-image' => get_template_directory_uri() . '/images/bg-demo.jpg',
                'background-size' => 'cover',
            )
        ) ,
        array(
            'id' => 'hero-overlay-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Background Overlay', 'parallel') ,
            'subtitle' => __('Toggle off to disable the dark overlay and pattern which appears over the background image.', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-overlay-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('To change the color and opacity of the dark overlay which covers the background image, edit class <code>.blacklayer</code> on line 88 of the style.css file.', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-parallax-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Parallax Effect', 'parallel') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'parallel') ,
        ) ,
        array(
            'id' => 'hero-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#welcome'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '250px',
                'padding-bottom' => '200px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'hero-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
            'default' => '',
        ) ,
        array(
            'id' => 'masterslider-start',
            'type' => 'raw',
            'title' => __('Master Slider (Image & Content Slider)', 'parallel') ,
            'subtitle' => __('The Master Slider Wordpress Plugin is used for adding image sliders to the Welcome section.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
    )
));

// -> START Features

Redux::setSection($opt_name, array(
    'title' => __('Features', 'parallel') ,
    'id' => 'features',
    'icon' => 'el el-ok-sign',
    'fields' => array(
        array(
            'id' => 'features-create',
            'type' => 'raw',
            'title' => __('Add Features', 'parallel') ,
            'desc' => __('Features are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Features Section]. Add widgets entitled [Parallel  - Feature Widget] to this area to add features. Add as many as you like.', 'parallel') ,
        ) ,
        array(
            'id' => 'features-layout',
            'type' => 'select',
            'title' => __('Features Layout', 'parallel') ,
            'subtitle' => __('Configure the number of features to appear in a row. Additional features will automatically default to the next row.', 'parallel') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'parallel') ,
                '3' => __('4 per row (4 columns)', 'parallel') ,
                '4' => __('3 per row (3 columns)', 'parallel') ,
                '6' => __('2 per row (2 columns)', 'parallel') ,
                '12' => __('1 per row (1 column)', 'parallel') ,
            ) ,
            'default' => '4'
        ) ,
        array(
            'id' => 'feature-icons',
            'type' => 'raw',
            'title' => __('Feature Icons', 'parallel') ,
            'subtitle' => __('Specify the color and size of the icons.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'feature-titles',
            'type' => 'raw',
            'title' => __('Feature Titles', 'parallel') ,
            'subtitle' => __('Specify the title styles (color, size, type, height, weight & more)', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'features-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'features-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '.features'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66',
                'padding-bottom' => '66',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'features-custom-class',
            'type' => 'text',
            
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
            'default' => 'border-top border-bottom',
        ) ,
        array(
            'id' => 'features-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the features section.', 'parallel') ,
        ) ,
    )
));

// -> START Work

Redux::setSection($opt_name, array(
    'title' => __('Work', 'parallel') ,
    'id' => 'work',
    'icon' => 'el el-laptop',
    'fields' => array(
        array(
            'id' => 'work-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Work',
        ) ,
        array(
            'id' => 'work-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'work-text',
            'type' => 'select',
            'title' => __('Content', 'parallel') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'parallel') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'work-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'work-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#work'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '0px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'work-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'work-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the work section.', 'parallel') ,
        ) ,
    )
));

// -> START Gallery

Redux::setSection($opt_name, array(
    'title' => __('Gallery', 'parallel') ,
    'id' => 'gallery',
    'icon' => 'el el-th-large',
    'fields' => array(
        array(
            'id' => 'gallery-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Gallery',
        ) ,
        array(
            'id' => 'gallery-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'gallery-gallery',
            'type' => 'gallery',
            'title'    => __('Add/Edit Gallery', 'parallel'),
            'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader.', 'parallel'),
        ) ,
        array(
            'id' => 'gallery-layout',
            'type' => 'select',
            'title' => __('Gallery Layout', 'parallel') ,
            'subtitle' => __('Configure the number of photos to appear in a row. Additional photos will automatically default to the next row.', 'parallel') ,
            'options' => array(
                'col-md-2' => __('6 per row (6 columns)', 'parallel') ,
                'col-md-3' => __('4 per row (4 columns)', 'parallel') ,
                'col-md-4' => __('3 per row (3 columns)', 'parallel') ,
                'col-md-6' => __('2 per row (2 columns)', 'parallel') ,
                'col-md-12' => __('1 per row (1 column)', 'parallel') ,
            ) ,
            'default' => 'col-md-3'
        ) ,
        array(
            'id' => 'gallery-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        
        array(
            'id' => 'gallery-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '.gallery'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66',
                'padding-bottom' => '0',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'gallery-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'gallery-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable this section.', 'parallel') ,
        ) ,
    )
));

// -> START Single Projects

Redux::setSection($opt_name, array(
    'title' => __('Single Projects', 'parallel') ,
    'id' => 'project-single',
    'icon' => 'el el-file-edit',
    'desc' => __('Create a single portfolio project to display your work.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-10',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));


// -> START Project Grid

Redux::setSection($opt_name, array(
    'title' => __('Projects Grid', 'parallel') ,
    'id' => 'project-grid',
    'icon' => 'el el-th-large',
    'desc' => __('Create a portfolio grid with unlimited projects (with popup lightbox).', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-2',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Clients

Redux::setSection($opt_name, array(
    'title' => __('Clients', 'parallel') ,
    'id' => 'clients',
    'icon' => 'el el-user',
    'desc' => __('Upload images/logos of your clients', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-3',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Stats

Redux::setSection($opt_name, array(
    'title' => __('Stats', 'parallel') ,
    'id' => 'stats',
    'icon' => 'el el-graph',
    'desc' => __('Create stats with animated counters', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-4',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Testimonials

Redux::setSection($opt_name, array(
    'title' => __('Testimonials', 'parallel') ,
    'id' => 'testimonials',
    'icon' => 'el el-quotes',
    'fields' => array(
        array(
            'id' => 'testi-create',
            'type' => 'raw',
            'title' => __('Add Testimonials', 'parallel') ,
            'content' => __('Testimonials are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Testimonials Section]. Add widgets entitled [Parallel  - Testimonial Widget] to this area to add testimonials. Add as many as you like.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Testimonials',
        ) ,
        
        array(
            'id' => 'testi-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('If there is more than one testimonial, the slider will be automatically enabled. Configure the slider settings below.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-layout',
            'type' => 'select',
            'title' => __('Slider Quantity', 'parallel') ,
            'subtitle' => __('Set the number of testimonials to display in the carousel.', 'parallel') ,
            'options' => array(
                '4' => __('4', 'parallel') ,
                '3' => __('3', 'parallel') ,
                '2' => __('2', 'parallel') ,
                '1' => __('1', 'parallel') ,
            ) ,
            'default' => '3'
        ) ,
        array(
            'id' => 'testi-scroll',
            'type' => 'select',
            'title' => __('Slider Scroll', 'parallel') ,
            'subtitle' => __('Set the number of testimonials to scroll', 'parallel') ,
            'options' => array(
                '6' => __('6', 'parallel') ,
                '5' => __('5', 'parallel') ,
                '4' => __('4', 'parallel') ,
                '3' => __('3', 'parallel') ,
                '2' => __('2', 'parallel') ,
                '1' => __('1', 'parallel') ,
            ) ,
            'default' => '3'
        ) ,
        array(
            'id' => 'testi-autoplay',
            'type' => 'raw',
            'default' => true,
            'title' => __('Slider Autoplay', 'parallel') ,
            'subtitle' => __('Toggle the autoplay function for the testimonials slider', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-slider',
            'type' => 'raw',
            'title' => __('Slider Delay', 'parallel') ,
            'subtitle' => __('This is the amount of delay in seconds between each testimonial', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-overlay-toggle',
            'type' => 'raw',
            'default' => false,
            'title' => __('Background Overlay', 'parallel') ,
            'subtitle' => __('Toggle off to disable the dark overlay and pattern which appears over the background image.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-parallax-toggle',
            'type' => 'raw',
            'default' => true,
            'title' => __('Parallax Effect', 'parallel') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#testimonials'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '100px',
                'padding-bottom' => '100px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'testi-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'testi-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the testimonials section.', 'parallel') ,
        ) ,
    )
));

// -> START Services

Redux::setSection($opt_name, array(
    'title' => __('Services', 'parallel') ,
    'id' => 'services',
    'icon' => 'el el-wrench',
    'fields' => array(
        array(
            'id' => 'services-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Services',
        ) ,
        array(
            'id' => 'services-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        
        array(
            'id' => 'services-text',
            'type' => 'select',
            'title' => __('Content', 'parallel') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'parallel') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'services-create',
            'type' => 'raw',
            'title' => __('Add Services', 'parallel') ,
            'content' => __('Services are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Services Section]. Add widgets entitled [Parallel  - Service Widget] to this area to add services. Add as many as you like.', 'parallel') ,
        ) ,
        array(
            'id' => 'services-layout',
            'type' => 'select',
            'title' => __('Services Layout', 'parallel') ,
            'subtitle' => __('Configure the number of services to appear in a row. Additional services will automatically default to the next row.', 'parallel') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'parallel') ,
                '3' => __('4 per row (4 columns)', 'parallel') ,
                '4' => __('3 per row (3 columns)', 'parallel') ,
                '6' => __('2 per row (2 columns)', 'parallel') ,
                '12' => __('1 per row (1 column)', 'parallel') ,
            ) ,
            'default' => '6'
        ) ,
        array(
            'id' => 'services-icon',
            'type' => 'raw',
            'title' => __('Service Icon Styles', 'parallel') ,
            'subtitle' => __('Specify the height and color of the icons. You can override styling for specific icons in the themes default stylesheet (styles.css) located under APPEARANCE > Editor. For color ideas visit <a target="_blank" href="http://www.colourlovers.com/colors/">ColourLovers</a>.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'services-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'services-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#services'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '0px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'services-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'services-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the services section.', 'parallel') ,
        ) ,
    )
));

// -> START Clients

Redux::setSection($opt_name, array(
    'title' => __('Brands', 'parallel') ,
    'id' => 'brands',
    'icon' => 'el el-user',
    'fields' => array(
        array(
            'id' => 'brands-maintitle',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Our Brands',
        ) ,
        array(
            'id' => 'brands-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'brands-create',
            'type' => 'raw',
            'title' => __('Add Brands', 'parallel') ,
            'content' => __('Brands are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Brands Section]. Add widgets entitled [Parallel - Brand Widget] to this area to add brands. Add as many as you like.', 'parallel') ,
        ) ,
        
        array(
            'id' => 'brands-layout',
            'type' => 'select',
            'title' => __('Brands Layout', 'parallel') ,
            'subtitle' => __('Configure the number of brands to appear in a row. Additional brands will automatically default to the next row.', 'parallel') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'parallel') ,
                '3' => __('4 per row (4 columns)', 'parallel') ,
                '4' => __('3 per row (3 columns)', 'parallel') ,
                '6' => __('2 per row (2 columns)', 'parallel') ,
                '12' => __('1 per row (1 column)', 'parallel') ,
            ) ,
            'default' => '2'
        ) ,
        array(
            'id' => 'brands-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'brands-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#brands'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '66px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'brands-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'brands-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the brands section.', 'parallel') ,
        ) ,
    )
));

// -> START Pricing Tables

Redux::setSection($opt_name, array(
    'title' => __('Pricing Tables', 'parallel') ,
    'id' => 'ptables',
    'icon' => 'el el-usd',
    'desc' => __('Create unlimited pricing tables for products and services.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-5',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Call to Action 1

Redux::setSection($opt_name, array(
    'title' => __('Call to Action 1', 'parallel') ,
    'id' => 'calltoaction',
    'icon' => 'el el-share-alt',
    'desc' => __('Create a call-to-action in vertical layout.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-6',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Call to Action 2

Redux::setSection($opt_name, array(
    'title' => __('Call to Action 2', 'parallel') ,
    'id' => 'calltoaction2',
    'icon' => 'el el-share-alt',
    'desc' => __('Create a call-to-action in horizontal layout.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'calltoaction2-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Build Your Website with Parallel',
        ) ,
        array(
            'id' => 'calltoaction2-text',
            'type' => 'editor',
            'title' => __('Content', 'parallel') ,
            'desc' => __('Custom HTML allowed', 'parallel') ,
            'default' => 'Lorem ipsum veniam adipisicing cupidatat dolor do adipisicing commodo.',
        ) ,
        array(
            'id' => 'calltoaction2-btn-text',
            'type' => 'text',
            'title' => __('Button Text', 'parallel') ,
            'subtitle' => __('', 'parallel') ,
            'default' => 'Download',
        ) ,
        array(
            'id' => 'calltoaction2-btn-url',
            'type' => 'text',
            'title' => __('Button URL', 'parallel') ,
            'subtitle' => __('', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'calltoaction2-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'calltoaction2-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#calltoaction2'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '66px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'calltoaction2-custom-class',
            'type' => 'text',
            'placeholder' => __('', 'parallel') ,
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'calltoaction2-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable Section', 'parallel') ,
            'subtitle' => __('Toggle off to disable the call-to-action section.', 'parallel') ,
        ) ,
    )
));

// -> START About

Redux::setSection($opt_name, array(
    'title' => __('About', 'parallel') ,
    'id' => 'about',
    'icon' => 'el el-question-sign',
    'fields' => array(
        array(
            'id' => 'about-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'About',
        ) ,
        array(
            'id' => 'about-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'about-text',
            'type' => 'select',
            'title' => __('Content', 'parallel') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'parallel') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'about-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'about-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#about'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '0px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'about-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'about-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the about section.', 'parallel') ,
        ) ,
    )
));

// -> START Video

Redux::setSection($opt_name, array(
    'title' => __('Video', 'parallel') ,
    'id' => 'video',
    'icon' => 'el el-video',
    'desc' => __('Add a video about yourself. Supports Youtube & Vimeo.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-7',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Team

Redux::setSection($opt_name, array(
    'title' => __('Team', 'parallel') ,
    'id' => 'team',
    'icon' => 'el el-group',
    'fields' => array(
        array(
            'id' => 'team-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Team Members',
        ) ,
        array(
            'id' => 'team-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'team-create',
            'type' => 'raw',
            'title' => __('Add Team Members', 'parallel') ,
            'content' => __('Team members are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Team Section]. Add widgets entitled [Parallel  - Team Member Widget] to this area to add team members. Add as many as you like.', 'parallel') ,
        ) ,
        array(
            'id' => 'team-layout',
            'type' => 'select',
            'title' => __('Team Members Layout', 'parallel') ,
            'subtitle' => __('Configure the number of team members to appear in a row. Additional team members will automatically default to the next row.', 'parallel') ,
            'options' => array(
                '4' => __('3 per row (3 columns)', 'parallel') ,
                '6' => __('2 per row (2 columns)', 'parallel') ,
                '12' => __('1 per row (1 column)', 'parallel') ,
            ) ,
            'default' => '6'
        ) ,
        array(
            'id' => 'team-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'team-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#team'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '0px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'team-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'team-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the team members section.', 'parallel') ,
        ) ,
    )
));

// -> START Blog

Redux::setSection($opt_name, array(
    'title' => __('Blog', 'parallel') ,
    'id' => 'blog',
    'icon' => 'el el-wordpress',
    'fields' => array(
        array(
            'id' => 'blog-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Latest News',
        ) ,
        array(
            'id' => 'blog-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'blog-posts',
            'type' => 'select',
            'title' => __('Blog Posts', 'parallel') ,
            'subtitle' => __('Set the number of latest posts to display.', 'parallel') ,
            'options' => array(
                '1' => __('1 post', 'parallel') ,
                '2' => __('2 posts', 'parallel') ,
                '3' => __('3 posts', 'parallel') ,
                '4' => __('4 posts', 'parallel') ,
                '5' => __('5 posts', 'parallel') ,
                '6' => __('6 posts', 'parallel') ,
                '7' => __('7 posts', 'parallel') ,
                '8' => __('8 posts', 'parallel') ,
                '9' => __('9 posts', 'parallel') ,
                '10' => __('10 posts', 'parallel') ,
                '11' => __('11 posts', 'parallel') ,
                '12' => __('12 posts', 'parallel') ,
            ) ,
            'default' => '3'
        ) ,
        array(
            'id' => 'blog-layout',
            'type' => 'select',
            'title' => __('Blog Posts Layout', 'parallel') ,
            'subtitle' => __('Configure the posts layout.', 'parallel') ,
            'options' => array(
                '3' => __('4 per row (4 columns)', 'parallel') ,
                '4' => __('3 per row (3 columns)', 'parallel') ,
                '6' => __('2 per row (2 columns)', 'parallel') ,
                '12' => __('1 per row (1 column)', 'parallel') ,
            ) ,
            'default' => '4'
        ) ,
        array(
            'id' => 'blog-below-text',
            'type' => 'textarea',
            
            'title' => __('Content Area Below Posts', 'parallel') ,
            'subtitle' => __('Use this field to display content or links to your blog.', 'parallel') ,
            'default' => '<p class="text-center"><a href="/blog" class="btn btn-md btn-inverse">Read the blog &#8594;</a></p>'
        ) ,
        array(
            'id' => 'blog-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'blog-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#blog'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '66px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'blog-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'blog-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the Blog members section.', 'parallel') ,
        ) ,
    )
));

// -> START Google Map

Redux::setSection($opt_name, array(
    'title' => __('Google Map', 'parallel') ,
    'id' => 'gmap',
    'icon' => 'el el-map-marker',
    'desc' => __('Display a map of your location.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-8',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));

// -> START Newsletter

Redux::setSection($opt_name, array(
    'title' => __('Newsletter', 'parallel') ,
    'id' => 'newsletter',
    'icon' => 'el el-bullhorn',
    'fields' => array(
        array(
            'id' => 'newsletter-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Newsletter Sign-up Form',
        ) ,
        array(
            'id' => 'newsletter-text',
            'type' => 'textarea',
            'title' => __('Content', 'parallel') ,
            'desc' => __('Custom HTML allowed', 'parallel') ,
            'default' => 'Lorem ipsum veniam adipisicing cupidatat dolor do adipisicing commodo.',
        ) ,
        array(
            'id' => 'mailchimp-code',
            'type' => 'text',
            'title' => __('Newsletter Form Shortcode', 'parallel') ,
            'subtitle' => __('Paste form shortcode here. Styling is supported for Mailchimp and ConstantContact. You can override form styling in the themes default stylesheet (styles.css) located under APPEARANCE > Editor.', 'parallel') ,
            'default' => '[mc4wp_form id="1"]',
        ) ,
        array(
            'id' => 'newsletter-bg',
            'type' => 'background',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or upload an image. This will fill up the background of the Newsletter section.', 'parallel') ,
            'desc' => __('Preferred image size of minimum 1600px wide', 'parallel') ,
            'output' => array(
                '.newsletter'
            ) ,
            'compiler' => 'true',
            'default' => array(
                'background-image' => get_template_directory_uri() . '/images/bg-demo.jpg',
                'background-size' => 'cover',
            )
        ) ,
        array(
            'id' => 'newsletter-overlay-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Background Overlay', 'parallel') ,
            'subtitle' => __('Toggle off to disable the dark overlay and pattern which appears over the background image.', 'parallel') ,
        ) ,
        array(
            'id' => 'newsletter-overlay-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('To change the color and opacity of the dark overlay which covers the background image, edit class <code>.blacklayer</code> on line 88 of the style.css file.', 'parallel') ,
        ) ,
        array(
            'id' => 'newsletter-parallax-toggle',
            'type' => 'switch',
            'default' => false,
            'title' => __('Parallax Effect', 'parallel') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'parallel') ,
        ) ,
        array(
            'id' => 'newsletter-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#newsletter'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66',
                'padding-bottom' => '66',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'newsletter-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'newsletter-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the newsletter section.', 'parallel') ,
        ) ,
    )
));

// -> START Contact

Redux::setSection($opt_name, array(
    'title' => __('Contact', 'parallel') ,
    'id' => 'contact',
    'icon' => 'el el-envelope',
    'fields' => array(
        array(
            'id' => 'contact-title',
            'type' => 'text',
            'title' => __('Title', 'parallel') ,
            'default' => 'Contact',
        ) ,
        array(
            'id' => 'contact-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'parallel') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'contact-text',
            'type' => 'select',
            'title' => __('Content', 'parallel') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'parallel') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'contactinfo-start',
            'type' => 'section',
            'title' => __('Contact Info', 'parallel') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'contact-info-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Display contact info?', 'parallel') ,
            'subtitle' => __('Toggle off to disable the contact info.', 'parallel') ,
        ) ,
        array(
            'id' => 'contact-phone',
            'type' => 'text',
            'title' => __('Phone Number', 'parallel') ,
            'default' => '+1 323 456 7891',
        ) ,
        array(
            'id' => 'contact-email',
            'type' => 'text',
            'title' => __('Email Address', 'parallel') ,
            'default' => 'hello@yourwebsite.com',
        ) ,
        array(
            'id' => 'contact-address',
            'type' => 'textarea',
            'title' => __('Location Address', 'parallel') ,
            'default' => '1 Pacific Ave, Suite 100
            Santa Monica, CA 90210
            United States',
        ) ,
        array(
            'id' => 'contactinfo-end',
            'type' => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ) ,
        array(
            'id' => 'contact-form-code',
            'type' => 'text',
            'title' => __('Contact Form Shortcode', 'parallel') ,
            'subtitle' => __('Make sure you have installed the Contact Form 7 plugin and created a form. To create a form go to CONTACT > Add New. Then paste the shortcode in the field on the right.', 'parallel') ,
            'description' => __('Paste the shortcode in the field above.', 'parallel') ,
            'default' => '[contact-form-7 id="1" title="Contact form 1"]'
        ) ,
        array(
            'id' => 'contact-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'contact-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#contact'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '66px',
                'padding-bottom' => '66px',
                'units' => 'px',
            )
        ) ,
        array(
            'id' => 'contact-custom-class',
            'type' => 'text',
            'title' => __('Custom Class', 'parallel') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'parallel') ,
        ) ,
        array(
            'id' => 'contact-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'parallel') ,
            'subtitle' => __('Toggle off to disable the contact section.', 'parallel') ,
        ) ,
    )
));

// -> START Footer

Redux::setSection($opt_name, array(
    'title' => __('Footer', 'parallel') ,
    'id' => 'copyright',
    'icon' => 'el el-lock',
    'fields' => array(
        array(
            'id' => 'copyright-text',
            'type' => 'textarea',
            'title' => __('Copyright Text', 'parallel') ,
            'desc' => __('Custom HTML allowed', 'parallel') ,
            'default' => '&copy; 2016 All Rights Reserved | Powered by <a href="http://wordpress.org" target="_blank">Wordpress</a> | Made with &#10084; by <a href="https://www.themely.com" target="_blank">Themely</a>',
        ) ,
        array(
            'id' => 'footer-facebook',
            'type' => 'text',
            'title' => __('Facebook URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-twitter',
            'type' => 'text',
            'title' => __('Twitter URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-googleplus',
            'type' => 'text',
            'title' => __('Google+ URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-github',
            'type' => 'text',
            'title' => __('Github URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-behance',
            'type' => 'text',
            'title' => __('Behance URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-linkedin',
            'type' => 'text',
            'title' => __('Linkedin URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-instagram',
            'type' => 'text',
            'title' => __('Instagram URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-youtube',
            'type' => 'text',
            'title' => __('Youtube URL', 'parallel') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'footer-bg',
            'type' => 'raw',
            'title' => __('Background', 'parallel') ,
            'subtitle' => __('Select a color or image for the section background.', 'parallel') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this feature.', 'parallel') ,
        ) ,
        array(
            'id' => 'footer-padding',
            'type' => 'spacing',
            'title' => __('Section Padding', 'parallel') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of this section.', 'parallel') ,
            'output' => array(
                '#copyright'
            ) ,
            'compiler' => 'true',
            'mode' => 'padding',
            'units' => array(
                '%',
                'px'
            ) ,
            'units_extended' => 'true',
            'display_units' => 'true',
            'left' => 'false',
            'right' => 'false',
            'default' => array(
                'padding-top' => '30',
                'padding-bottom' => '30',
                'units' => 'px',
            )
        ) ,
    )
));

// -> START Custom Code

Redux::setSection($opt_name, array(
    'title' => __('Custom Code', 'parallel') ,
    'id' => 'customcode',
    'icon' => 'el el-css',
    'desc' => __('Enter custom Javascript or CSS code in your theme header and footer.', 'parallel') ,
    'fields' => array(
        array(
            'id' => 'go-pro-9',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/parallel/">Upgrade</a> to unlock this section.</p>', 'parallel') ,
        ) ,
    )
));
/*
* <--- END SECTIONS
*/
/*
*
* YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
*
*/
/*
*
* --> Action hook examples
*
*/

// If Redux is running as a plugin, this will remove the demo notice and links

add_action('redux/loaded', 'remove_demo');

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
// Change the arguments after they've been declared, but before the panel is created
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
// Change the default value of a field after it's been set, but before it's been useds
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
// Dynamically add a section. Can be also used to modify sections/fields
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 *
 */

if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";

        // print_r($options); //Option values
        // print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

    }
}

/**
 * Custom function for the callback validation referenced above
 *
 */

if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error = false;
        $warning = false;

        // do your validation

        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        }
        elseif ($value == 2) {
            $warning = true;
            $value = $existing_value;
        }

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
            $field['msg'] = 'your custom error message';
        }

        if ($warning == true) {
            $return['warning'] = $field;
            $field['msg'] = 'your custom warning message';
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */

if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 *
 */

if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {

        // $sections = array();

        $sections[] = array(
            'title' => __('Section via hook', 'parallel') ,
            'desc' => __('This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'parallel') ,
            'icon' => 'el el-paper-clip',

            // Leave this as a blank section, no options just some intro text set above.

            'fields' => array()
        );
        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 *
 */

if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {

        // $args['dev_mode'] = true;

        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 *
 */

if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';
        return $defaults;
    }
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */

if (!function_exists('remove_demo')) {
    function remove_demo()
    {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.

        if (class_exists('ReduxFrameworkPlugin')) {
            remove_filter('plugin_row_meta', array(
                ReduxFrameworkPlugin::instance() ,
                'plugin_metalinks'
            ) , null, 2);

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.

            remove_action('admin_notices', array(
                ReduxFrameworkPlugin::instance() ,
                'admin_notices'
            ));
        }
    }
}