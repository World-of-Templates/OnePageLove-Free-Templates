<?php
/**
 * Redux Framework Options for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.

$opt_name = "integral";
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

    'menu_title' => __('Integral Options', 'integral') ,
    'page_title' => __('Integral Options', 'integral') ,

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
    'title' => __('Documentation', 'integral') ,
);
$args['admin_bar_links'][] = array(
    'id' => 'redux-support',
    'href' => 'http://support.themely.com/',
    'title' => __('Support', 'integral') ,
);

// $args['admin_bar_links'][] = array(
//    'id'    => 'redux-extensions',
//    'href'  => 'reduxframework.com/extensions',
//    'title' => __( 'Extensions', 'integral' ),
// );
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.

$args['share_icons'][] = array(
    'url' => 'https://www.themely.com',
    'title' => __('Visit our website', 'integral') ,
    'icon' => 'el el-globe'

    // 'img'   => '', // You can use icon OR img. IMG needs to be a full URL.

);
$args['share_icons'][] = array(
    'url' => 'http://twitter.com/themelycom',
    'title' => __('Follow us on Twitter', 'integral') ,
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

    $args['intro_text'] = sprintf(__('<i style="color:#f18500;" class="el el-lock"></i> <a href=\"https://www.themely.com/themes/integral/\" target=\"_blank=\" style=\"color:#f18500;\">Upgrade to Integral PRO</a> to unlock all theme features.', 'integral') , $v);
}
else {
    $args['intro_text'] = __('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'integral');
}

// Add content after the form.
// $args['footer_text'] = __( '<p></p>', 'integral' );

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
        'title' => __('Theme Information 1', 'integral') ,
        'content' => __('This is the tab content, HTML is allowed.', 'integral')
    ) ,
    array(
        'id' => 'redux-help-tab-2',
        'title' => __('Theme Information 2', 'integral') ,
        'content' => __('This is the tab content, HTML is allowed.', 'integral')
    )
);
Redux::setHelpTab($opt_name, $tabs);

// Set the help sidebar

$content = __('This is the sidebar content, HTML is allowed.', 'integral');
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
    'title' => __('General Settings', 'integral') ,
    'id' => 'general',
    'desc' => __('General theme settings', 'integral') ,
    'icon' => 'el el-cogs'
));

// -> START Typography

Redux::setSection($opt_name, array(
    'title' => __('Typography', 'integral') ,
    'id' => 'general-typography',
    'icon' => 'el el-font',
    'desc' => __('Change the font properties for the body, titles and top menu.', 'integral') ,
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'go-pro-1',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.</p>', 'integral') ,
        ) ,
    )
));

// -> START Colors

Redux::setSection($opt_name, array(
    'title' => __('Colors', 'integral') ,
    'id' => 'general-colors',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'button-color',
            'type' => 'color',
            'title' => __('Primary Button Color', 'integral') ,
            'output' => array(
                'background-color' => '.btn-primary, .btn-inverse:hover, #mc-embedded-subscribe-form input[type="submit"], .ctct-embed-signup .ctct-button',
                'border-color' => '.btn-primary, .btn-inverse, #mc-embedded-subscribe-form input[type="submit"], .ctct-embed-signup .ctct-button',
                'color' => '.btn-inverse',
            ) ,
            'subtitle' => __('Pick a color for the primary buttons', 'integral') ,
            'default' => '#00aded',
        ) ,
        array(
            'id' => 'theme-color',
            'type' => 'color',
            'title' => __('Primary Theme Color', 'integral') ,
            'output' => array(
                'border-color' => '.navbar-default li a:hover, .navbar-default .navbar-nav > li.active a, .navbar-default .navbar-nav > li > a:hover',
                'color' => 'a, a:hover, a:focus, .heading .fa, .pagemeta a:link,.pagemeta a:visited,.team .t-type',
                'background' => '.lite h2.smalltitle span, .sidebar h2:after, .content .entry-title:after, .stats, .calltoaction2, .tweets',
                'background-color' => '.dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover'
            ) ,
            'subtitle' => __('Pick a color for links and highlights', 'integral') ,
            'default' => '#00aded',
        ) ,
        array(
            'id' => 'header-background',
            'type' => 'color',
            'title' => __('Header Background Color', 'integral') ,
            'output' => array(
                'background-color' => '.navbar-default'
            ) ,
            'subtitle' => __('Change the background color of the header where the logo and top navigation is located. Default is #ffffff.', 'integral') ,
            'default' => '#ffffff',
        ) ,
        array(
            'id' => 'footer-background',
            'type' => 'color',
            'title' => __('Footer Background Color', 'integral') ,
            'output' => array(
                'background-color' => '.copyright'
            ) ,
            'subtitle' => __('Change the background color of the footer (where copyright information is located). Default is #111111.', 'integral') ,
            'default' => '#111111',
        ) ,
        array(
            'id' => 'litesection-start',
            'type' => 'section',
            'title' => __('Lite Section Colors', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'lite-background',
            'type' => 'raw',
            'title' => __('Lite Section Background Color', 'integral') ,
            'output' => array(
                'background-color' => '.lite, h2.bigtitle span'
            ) ,
            'subtitle' => __('Change the background color of the lite sections (Features, Work, Projects, Clients, About, Skills & Team). Default is #ffffff.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'lite-body-bigtitle-color',
            'type' => 'raw',
            'title' => __('Lite Section H2 Big Title Font Color', 'integral') ,
            'output' => array(
                'color' => '.lite h2.bigtitle'
            ) ,
            'subtitle' => __('Change the font color of the big titles in the lite sections (Work & About). Default is #13151a.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'lite-body-smalltitle-color',
            'type' => 'raw',
            'title' => __('Lite Section H2 Small Title Font Color', 'integral') ,
            'output' => array(
                'color' => '.lite h2.smalltitle'
            ) ,
            'subtitle' => __('Change the font color of the small titles in the lite sections (Projects Single, Projects Grid, Our Clients, Skills & Our Team). Default is #13151a.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'lite-body-subtitle-color',
            'type' => 'raw',
            'title' => __('Lite Section H3 Subtitle Font Color', 'integral') ,
            'output' => array(
                'color' => '.lite h3'
            ) ,
            'subtitle' => __('Change the font color of the subtitles in the lite sections (feature titles, project titles, service titles & team member names). Default is #13151a.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'lite-body-font',
            'type' => 'raw',
            'title' => __('Lite Section Body Font Color', 'integral') ,
            'output' => array(
                'color' => 'body .lite'
            ) ,
            'subtitle' => __('Change the body font color of the lite sections (Features, Work, Projects, Clients, About, Skills & Team). Default is #333333.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'litesection-end',
            'type' => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ) ,
        array(
            'id' => 'darksection-start',
            'type' => 'section',
            'title' => __('Dark Section Colors', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'dark-background',
            'type' => 'raw',
            'title' => __('Dark Section Background Color', 'integral') ,
            'output' => array(
                'background-color' => '.dark, h2.bigtitle_dark span'
            ) ,
            'subtitle' => __('Change the background color of the dark sections (Services, Pricing Tables & Contact). Default is #1c1c1c.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'dark-body-bigtitle-color',
            'type' => 'raw',
            'title' => __('Dark Section H2 Big Title Font Color', 'integral') ,
            'output' => array(
                'color' => '.dark h2.bigtitle'
            ) ,
            'subtitle' => __('Change the font color of the H2 big titles in the dark sections (Services & Contact). Default is #ffffff.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'dark-body-smalltitle-color',
            'type' => 'raw',
            'title' => __('Dark Section H2 Small Title Font Color', 'integral') ,
            'output' => array(
                'color' => '.dark h2.smalltitle'
            ) ,
            'subtitle' => __('Change the font color of the H2 small titles in the dark sections (Pricing Tables). Default is #ffffff.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'dark-body-subtitle-color',
            'type' => 'raw',
            'title' => __('Dark Section H3 Subtitle Font Color', 'integral') ,
            'output' => array(
                'color' => '.dark h3, .dark .pt_title'
            ) ,
            'subtitle' => __('Change the font color of the subtitles in the dark sections (service names, pricing table titles & contact info title). Default is #ffffff.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        array(
            'id' => 'dark-body-font',
            'type' => 'raw',
            'title' => __('Dark Section Body Font Color', 'integral') ,
            'output' => array(
                'color' => '.dark'
            ) ,
            'subtitle' => __('Change the body font color of the dark sections (Services, Pricing Tables & Contact). Default is #888888. Default is #ffffff.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'darksection-end',
            'type' => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ) ,
    )
));

// -> START Homepage Layout

Redux::setSection($opt_name, array(
    'title' => __('Homepage Layout', 'integral') ,
    'id' => 'general-homepage',
    'icon' => 'el el-th',
    'desc' => __('<p>Organize how you want the layout to appear on the homepage. Drag and drop in the desired order or drag to the right column to disable a section.</p><p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.</p>', 'integral') ,
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'gen-home-layout',
            'type' => 'sorter',
            'title' => __('Homepage Layout Manager', 'integral') ,
            'subtitle' => __('Organize how you want the layout to appear on the homepage. Drag and drop to the right column in order to disable a particular section.', 'integral') ,
            'desc' => '',
            'panel' => false,
            'compiler' => 'true',
            'options' => array(
                'Enabled' => array(
                    'hero' => 'Hero',
                    'features' => 'Features',
                    'work' => 'Work',
                    'project-single' => 'Project Single',
                    'clients' => 'Clients',
                    'testimonials' => 'Testimonials',
                    'services' => 'Services',
                    'call-to-action' => 'Call to Action',
                    'about' => 'About',
                    'skills' => 'Skills',
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

// -> START Blog/Posts Layout

Redux::setSection($opt_name, array(
    'title' => __('Blog/Post Settings', 'integral') ,
    'id' => 'general-blog',
    'icon' => 'el el-wordpress',
    'desc' => __('<p>Configure the post meta on all blog and post pages (index, categories and archives). Hide the post date, author, category and number of comments. Also enable/disable the author bio on posts.</p><p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.</p>', 'integral') ,
    'subsection' => true,
));

// -> START Top Menu

Redux::setSection($opt_name, array(
    'title' => __('Header', 'integral') ,
    'id' => 'header',
    'icon' => 'el el-lines',
    'fields' => array(
        array(
            'id' => 'topmenu-sticky',
            'type' => 'raw',
            'default' => true,
            'title' => __('Toggle Sticky Menu', 'integral') ,
            'subtitle' => __('Toggle off to disable the menu sticking to the top of the screen when scrolling down.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'topmenu-padding',
            'type' => 'raw',
            'title' => __('Top Menu Padding', 'integral') ,
            'subtitle' => __('Set the padding of the top of the menu. This is generally used when you upload a large logo which increases the height of the header area. This will allow you to vertically center the top menu.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'gen-logo-image',
            'type' => 'raw',
            'title' => __('Logo', 'integral') ,
            'content' => __('To upload a logo to replace the default site name and description in the header, go to APPEARANCE > Customize and select the [Site Identity] tab. Or <a href="customize.php">click here</a> and then select the [Site Identity] tab.', 'integral') ,
        ) ,
        array(
            'id' => 'gen_typography_sitetitle',
            'type' => 'raw',
            'title' => __('Site Name', 'integral') ,
            'subtitle' => __('Change the site name font styles. Only displayed if you have disabled the image logo above.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
    )
));

// -> START Hero

Redux::setSection($opt_name, array(
    'title' => __('Welcome', 'integral') ,
    'id' => 'hero',
    'icon' => 'el el-flag',
    'fields' => array(
        array(
            'id' => 'hero-bg',
            'type' => 'background',
            'title' => __('Background', 'integral') ,
            'subtitle' => __('Change the background image or select a color. This will fill up the background of the welcome section.', 'integral') ,
            'desc' => __('Preferred image size of minimum 1600px wide', 'integral') ,
            'output' => array(
                '.hero'
            ) ,
            'compiler' => 'true',
            'default' => array(
                'background-image' => get_template_directory_uri() . '/images/bg-welcome.jpg',
                'background-size' => 'cover',
            )
        ) ,
        array(
            'id' => 'hero-padding',
            'type' => 'raw',
            'title' => __('Section Padding', 'integral') ,
            'subtitle' => __('Set the padding of the top and bottom of this section. You can also use this to increase or decrease the height of the welcome section.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'hero-overlay-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Background Overlay', 'integral') ,
            'subtitle' => __('Toggle off to disable the dark overlay and pattern which appears over the background image.', 'integral') ,
        ) ,
        array(
            'id' => 'hero-overlay-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('To change the color and opacity of the dark overlay which covers the background image, edit class <code>.blacklayer</code> on line 88 of the style.css file.', 'integral') ,
        ) ,
        array(
            'id' => 'hero-parallax-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Parallax Effect', 'integral') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'integral') ,
        ) ,
        array(
            'id' => 'hero-title',
            'type' => 'text',
            'title' => __('Title Line 1', 'integral') ,
            'subtitle' => __('1st line of the title', 'integral') ,
            'default' => 'Elegant',
        ) ,
        array(
            'id' => 'gen-typography-hero-title',
            'type' => 'raw',
            'title' => __('Title Line 1 Typography', 'integral') ,
            'subtitle' => __('Change the font style (color, size, type, height, weight, styles & more)', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'hero-subtitle',
            'type' => 'text',
            'title' => __('Title Line 2', 'integral') ,
            'subtitle' => __('2nd line of the title', 'integral') ,

            'default' => 'Business Theme',
        ) ,
        array(
            'id' => 'gen-typography-hero-subtitle',
            'type' => 'raw',
            'title' => __('Title Line 2 Typography', 'integral') ,
            'subtitle' => __('Change the font style (color, size, type, height, weight, styles & more)', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'hero-tagline',
            'type' => 'textarea',
            'title' => __('Tagline', 'integral') ,
            'subtitle' => __('Tagline for the hero section', 'integral') ,
            'desc' => __('Custom HTML allowed', 'integral') ,
            'default' => 'A one-page theme for professionals, agencies and businesses.
Create a stunning website in minutes.',
        ) ,
        array(
            'id' => 'hero-btn1-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Toggle Button 1', 'integral') ,
            'subtitle' => __('Toggle off to disable the button', 'integral') ,
        ) ,
        array(
            'id' => 'hero-btn1-text',
            'type' => 'text',
            'title' => __('Button 1 Text', 'integral') ,

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
            'title' => __('Button 1 URL', 'integral') ,

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
            'title' => __('Toggle Button 2', 'integral') ,
            'subtitle' => __('Toggle off to disable the button', 'integral') ,
        ) ,
        array(
            'id' => 'hero-btn2-text',
            'type' => 'text',
            'title' => __('Button 2 Text', 'integral') ,
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
            'title' => __('Button 2 URL', 'integral') ,
            'default' => '#',
            'required' => array(
                'hero-btn2-toggle',
                '=',
                true
            ) ,
        ) ,
    )
));

// -> START Brands

Redux::setSection($opt_name, array(
    'title' => __('Brands', 'integral') ,
    'id' => 'brands',
    'icon' => 'el el-star-empty',
    'desc' => __('Upload images/logos of brands', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-2',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Features

Redux::setSection($opt_name, array(
    'title' => __('Features', 'integral') ,
    'id' => 'features',
    'icon' => 'el el-ok-sign',
    'fields' => array(
        array(
            'id' => 'feature-create',
            'type' => 'info',
            'title' => __('Add Features', 'integral') ,
            'desc' => __('Features are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Features Section]. Add widgets entitled [Integral - Feature Widget] to this area to add features. Add as many as you like.', 'integral') ,
        ) ,
        array(
            'id' => 'features-layout',
            'type' => 'select',
            'title' => __('Features Layout', 'integral') ,
            'subtitle' => __('Configure the number of features to appear in a row. Additional features will automatically default to the next row.', 'integral') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'integral') ,
                '3' => __('4 per row (4 columns)', 'integral') ,
                '4' => __('3 per row (3 columns)', 'integral') ,
                '6' => __('2 per row (2 columns)', 'integral') ,
                '12' => __('1 per row (1 column)', 'integral') ,
            ) ,
            'default' => '4'
        ) ,
        array(
            'id' => 'feature-icons',
            'type' => 'color',
            'title' => __('Feature Icon Styles', 'integral') ,
            'subtitle' => __('Specify the color of the icons. You can override styling for specific icons in the themes default stylesheet (styles.css) located under APPEARANCE > Editor. For color ideas visit <a target="_blank" href="http://www.colourlovers.com/colors/">ColourLovers</a>. To set the size of the icons <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">upgrade to Integral PRO</a>.', 'integral') ,
            'output' => array(
                '.features .feature i'
            ) ,
            'default' => array(
                'color' => '#f64744',
            )
        ) ,
        array(
            'id' => 'feature-header',
            'type' => 'raw',
            'title' => __('Feature Titles', 'integral') ,
            'subtitle' => __('Specify the feature title font styles (color, size, type, height, weight & more)', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'feature-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => 'no-padding-bottom',
        ) ,
        array(
            'id' => 'features-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the features section.', 'integral') ,
        ) ,
    )
));

// -> START Work

Redux::setSection($opt_name, array(
    'title' => __('Work', 'integral') ,
    'id' => 'work',
    'icon' => 'el el-laptop',
    'fields' => array(
        array(
            'id' => 'work-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Work',
        ) ,
        array(
            'id' => 'work-title-icon',
            'type' => 'text',
            'title' => __('Title Icon', 'integral') ,
            'desc' => __('Copy and paste the required icon prefix and class name from the <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome Icons list</a> and choose from 1100+ icons. For example, to use the smiley face icon enter: far fa-smile', 'integral') ,
            'default' => 'fa-leaf',
        ) ,
        array(
            'id' => 'work-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'integral') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'work-text',
            'type' => 'select',
            'title' => __('Content', 'integral') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'integral') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'work-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => 'no-padding-bottom',
        ) ,
        array(
            'id' => 'work-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the work section.', 'integral') ,
        ) ,
    )
));

// -> START Project SINGLE TEST

Redux::setSection($opt_name, array(
    'title' => __('Single Projects', 'integral') ,
    'id' => 'project-single',
    'icon' => 'el el-file-edit',
    'fields' => array(
        array(
            'id' => 'project-single-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Projects',
        ) ,
        array(
            'id' => 'project-create',
            'type' => 'raw',
            'title' => __('Add Projects', 'integral') ,
            'content' => __('Projects are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Projects Section]. Add widgets entitled [Integral - Single Project Widget] to this area to add projects. Add as many as you like.', 'integral') ,
        ) ,
        array(
            'id' => 'project-single-info',
            'type' => 'raw',
            'content' => __('<p>If you upload more than one image per project, the slider will be automatically enabled. Configure the slider settings below.</p>', 'integral') ,
        ) ,
        array(
            'id' => 'project-single-autoplay',
            'type' => 'switch',
            'default' => true,
            'title' => __('Autoplay Slider', 'integral') ,
            'subtitle' => __('Toggle the autoplay function for the slider', 'integral') ,
        ) ,
        array(
            'id' => 'project-single-slider',
            'type' => 'slider',
            'title' => __('Slide Delay', 'integral') ,
            'subtitle' => __('This is the amount of delay in seconds between each slide', 'integral') ,
            'default' => 7,
            'min' => 1,
            'step' => 1,
            'max' => 20,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'project-single-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => 'no-padding-bottom',
        ) ,
        array(
            'id' => 'project-single-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the single projects section.', 'integral') ,
        ) ,
    )
));

// -> START Project Grid

Redux::setSection($opt_name, array(
    'title' => __('Project Grid', 'integral') ,
    'id' => 'project-grid',
    'icon' => 'el el-th-large',
    'desc' => __('Create a portfolio grid with unlimited projects (with popup lightbox).', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-3',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.</p>', 'integral') ,
        ) ,
    )
));

// -> START Clients

Redux::setSection($opt_name, array(
    'title' => __('Clients', 'integral') ,
    'id' => 'clients',
    'icon' => 'el el-user',
    'fields' => array(
        array(
            'id' => 'clients-maintitle',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Our Clients',
        ) ,
        array(
            'id' => 'clients-create',
            'type' => 'raw',
            'title' => __('Add Clients', 'integral') ,
            'content' => __('Clients are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Clients Section]. Add widgets entitled [Integral - Client Widget] to this area to add clients. Add as many as you like.', 'integral') ,
        ) ,
        array(
            'id' => 'clients-layout',
            'type' => 'select',
            'title' => __('Clients Layout', 'integral') ,
            'subtitle' => __('Configure the number of clients to appear in a row. Additional clients will automatically default to the next row.', 'integral') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'integral') ,
                '3' => __('4 per row (4 columns)', 'integral') ,
                '4' => __('3 per row (3 columns)', 'integral') ,
                '6' => __('2 per row (2 columns)', 'integral') ,
                '12' => __('1 per row (1 column)', 'integral') ,
            ) ,
            'default' => '2'
        ) ,
        array(
            'id' => 'clients-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
        ) ,
        array(
            'id' => 'clients-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the clients section.', 'integral') ,
        ) ,
    )
));

// -> START Stats

Redux::setSection($opt_name, array(
    'title' => __('Stats', 'integral') ,
    'id' => 'stats',
    'icon' => 'el el-graph',
    'desc' => __('Create stats with animated counters', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-4',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Testimonials

Redux::setSection($opt_name, array(
    'title' => __('Testimonials', 'integral') ,
    'id' => 'testimonials',
    'icon' => 'el el-quotes',
    'fields' => array(
        array(
            'id' => 'testi-create',
            'type' => 'raw',
            'title' => __('Add Testimonials', 'integral') ,
            'content' => __('Testimonials are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Testimonials Section]. Add widgets entitled [Integral - Testimonial Widget] to this area to add testimonials. Add as many as you like.', 'integral') ,
        ) ,
        array(
            'id' => 'testi-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Testimonials',
        ) ,
        array(
            'id' => 'testi-bg',
            'type' => 'background',
            'title' => __('Background', 'integral') ,
            'subtitle' => __('Select a color or upload an image. This will fill up the background of the Testimonials section', 'integral') ,
            'desc' => __('Preferred image size of minimum 1600px wide', 'integral') ,
            'output' => array(
                '.testimonials'
            ) ,
            'compiler' => 'true',
            'default' => array(
                'background-image' => get_template_directory_uri() . '/images/bg-testimonials.jpg',
                'background-size' => 'cover',
            )
        ) ,
        array(
            'id' => 'testi-overlay-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Background Overlay', 'integral') ,
            'subtitle' => __('Toggle off to disable the dark overlay and pattern which appears over the background image.', 'integral') ,
        ) ,
        array(
            'id' => 'testi-overlay-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('To change the color and opacity of the dark overlay which covers the background image, edit class <code>.blacklayer</code> on line 88 of the style.css file.', 'integral') ,
        ) ,
        array(
            'id' => 'testi-parallax-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Parallax Effect', 'integral') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'integral') ,
        ) ,
        array(
            'id' => 'testi-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('If there is more than one testimonial, the slider will be automatically enabled. Configure the slider settings below.', 'integral') ,
        ) ,
        array(
            'id' => 'testi-autoplay',
            'type' => 'switch',
            'default' => true,
            'title' => __('Autoplay Slider', 'integral') ,
            'subtitle' => __('Toggle the autoplay function for the testimonials slider', 'integral') ,
        ) ,
        array(
            'id' => 'testi-slider',
            'type' => 'slider',
            'title' => __('Slide Delay', 'integral') ,
            'subtitle' => __('This is the amount of delay in seconds between each testimonial', 'integral') ,
            'default' => 7,
            'min' => 1,
            'step' => 1,
            'max' => 20,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'testi-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
        ) ,
        array(
            'id' => 'testi-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the testimonials section.', 'integral') ,
        ) ,
    )
));

// -> START Services

Redux::setSection($opt_name, array(
    'title' => __('Services', 'integral') ,
    'id' => 'services',
    'icon' => 'el el-wrench',
    'fields' => array(
        array(
            'id' => 'services-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Services',
        ) ,
        array(
            'id' => 'services-title-icon',
            'type' => 'text',
            'title' => __('Title Icon', 'integral') ,
            'desc' => __('Copy and paste the required icon prefix and class name from the <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome Icons list</a> and choose from 1100+ icons. For example, to use the smiley face icon enter: far fa-smile', 'integral') ,
            'default' => 'fa-space-shuttle',
        ) ,
        array(
            'id' => 'services-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'integral') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'services-text',
            'type' => 'select',
            'title' => __('Content', 'integral') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'integral') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'services-create',
            'type' => 'raw',
            'title' => __('Add Services', 'integral') ,
            'content' => __('Services are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Services Section]. Add widgets entitled [Integral - Service Widget] to this area to add services. Add as many as you like.', 'integral') ,
        ) ,
        array(
            'id' => 'services-layout',
            'type' => 'select',
            'title' => __('Services Layout', 'integral') ,
            'subtitle' => __('Configure the number of services to appear in a row. Additional services will automatically default to the next row.', 'integral') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'integral') ,
                '3' => __('4 per row (4 columns)', 'integral') ,
                '4' => __('3 per row (3 columns)', 'integral') ,
                '6' => __('2 per row (2 columns)', 'integral') ,
                '12' => __('1 per row (1 column)', 'integral') ,
            ) ,
            'default' => '4'
        ) ,
        array(
            'id' => 'sfeature_icon_properties',
            'type' => 'raw',
            'title' => __('Service Icon Styles', 'integral') ,
            'subtitle' => __('Specify the height and color of the icons. You can override styling for specific icons in the themes default stylesheet (styles.css) located under APPEARANCE > Editor. For color ideas visit <a target="_blank" href="http://www.colourlovers.com/colors/">ColourLovers</a>.', 'integral') ,
            'content' => __('<i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this feature.', 'integral') ,
        ) ,
        array(
            'id' => 'services-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => '',
        ) ,
        array(
            'id' => 'services-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the services section.', 'integral') ,
        ) ,
    )
));

// -> START Pricing Tables

Redux::setSection($opt_name, array(
    'title' => __('Pricing Tables', 'integral') ,
    'id' => 'ptables',
    'icon' => 'el el-usd',
    'desc' => __('Create unlimited pricing tables for products and services.', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-5',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Call to Action

Redux::setSection($opt_name, array(
    'title' => __('Call to Action 1', 'integral') ,
    'id' => 'calltoaction',
    'icon' => 'el el-hand-up',
    'fields' => array(
        array(
            'id' => 'calltoaction-bg',
            'type' => 'background',
            'title' => __('Background', 'integral') ,
            'subtitle' => __('Select a color or upload an image. This will fill up the background of the Call-to-Action section.', 'integral') ,
            'desc' => __('Preferred image size of minimum 1600px wide', 'integral') ,
            'output' => array(
                '.calltoaction'
            ) ,
            'compiler' => 'true',
            'default' => array(
                'background-image' => get_template_directory_uri() . '/images/bg-cta.jpg',
                'background-size' => 'cover',
            )
        ) ,
        array(
            'id' => 'calltoaction-overlay-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Background Overlay', 'integral') ,
            'subtitle' => __('Toggle off to disable the dark color and pattern overlay which appears over the background image.', 'integral') ,
        ) ,
        array(
            'id' => 'calltoaction-overlay-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('To change the color and opacity of the dark overlay which covers the background image, edit class <code>.blacklayer</code> on line 88 of the style.css file.', 'integral') ,
        ) ,
        array(
            'id' => 'calltoaction-parallax-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Parallax Effect', 'integral') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'integral') ,
        ) ,
        array(
            'id' => 'calltoaction-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Call to Action',
        ) ,
        array(
            'id' => 'calltoaction-text',
            'type' => 'textarea',
            'title' => __('Content', 'integral') ,
            'default' => 'Lorem ipsum veniam adipisicing cupidatat dolor do adipisicing commodo.',
            'desc' => __('Custom HTML allowed', 'integral') ,
        ) ,
        array(
            'id' => 'calltoaction-btn1-toggle',
            'type' => 'switch',
            'default' => false,
            'title' => __('Toggle Button 1', 'integral') ,

        ) ,
        array(
            'id' => 'calltoaction-btn1-text',
            'type' => 'text',
            'title' => __('Button 1 Text', 'integral') ,

            'default' => '',
            'required' => array(
                'calltoaction-btn1-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'calltoaction-btn1-url',
            'type' => 'text',
            'title' => __('Button 1 URL', 'integral') ,

            'default' => '',
            'required' => array(
                'calltoaction-btn1-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'calltoaction-btn2-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Toggle Button 2', 'integral') ,

        ) ,
        array(
            'id' => 'calltoaction-btn2-text',
            'type' => 'text',
            'title' => __('Button 2 Text', 'integral') ,

            'default' => 'Download',
            'required' => array(
                'calltoaction-btn2-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'calltoaction-btn2-url',
            'type' => 'text',
            'title' => __('Button 2 URL', 'integral') ,

            'default' => '#',
            'required' => array(
                'calltoaction-btn2-toggle',
                '=',
                true
            ) ,
        ) ,
        array(
            'id' => 'calltoaction-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
        ) ,
        array(
            'id' => 'calltoaction-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the call-to-action section.', 'integral') ,
        ) ,
    )
));

// -> START Stats

Redux::setSection($opt_name, array(
    'title' => __('Call to Action 2', 'integral') ,
    'id' => 'calltoaction2',
    'icon' => 'el el-share-alt',
    'desc' => __('Create a call-to-action in horizontal layout.', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-6',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START About

Redux::setSection($opt_name, array(
    'title' => __('About', 'integral') ,
    'id' => 'about',
    'icon' => 'el el-question-sign',
    'fields' => array(
        array(
            'id' => 'about-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'About',
        ) ,
        array(
            'id' => 'about-title-icon',
            'type' => 'text',
            'title' => __('Title Icon', 'integral') ,
            'desc' => __('Copy and paste the required icon prefix and class name from the <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome Icons list</a> and choose from 1100+ icons. For example, to use the smiley face icon enter: far fa-smile', 'integral') ,
            'default' => 'fa-user',
        ) ,
        array(
            'id' => 'about-subtitle',
            'type' => 'textarea',
            'title' => __('Subtitle', 'integral') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'about-text',
            'type' => 'select',
            'title' => __('Content', 'integral') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'integral') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'about-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => 'no-padding-bottom',
        ) ,
        array(
            'id' => 'about-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the about section.', 'integral') ,
        ) ,
    )
));

// -> START Skills

Redux::setSection($opt_name, array(
    'title' => __('Skills', 'integral') ,
    'id' => 'skills',
    'icon' => 'el el-tasks',
    'fields' => array(
        array(
            'id' => 'skills-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Skills',
        ) ,
        array(
            'id' => 'skills-text',
            'type' => 'select',
            'title' => __('Content', 'integral') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'integral') ,
            'data' => 'pages',
        ) ,

        // Skill 1

        array(
            'id' => 'skillsection1-start',
            'type' => 'section',
            'title' => __('Skill 1', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'skill1-name',
            'type' => 'text',
            'title' => __('Skill Name', 'integral') ,
            'default' => 'Graphic Design',
        ) ,
        array(
            'id' => 'skill1-color',
            'type' => 'color',
            'title' => __('Skill Color', 'integral') ,
            'subtitle' => __('Pick a color for the skill', 'integral') ,
            'default' => '#5cb85c',
        ) ,
        array(
            'id' => 'skill1-percent',
            'type' => 'slider',
            'title' => __('Skill Level', 'integral') ,
            'default' => 40,
            'min' => 1,
            'step' => 1,
            'max' => 100,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'skillsection1-end',
            'type' => 'section',
            'indent' => false,
        ) ,

        // Skill 2

        array(
            'id' => 'skillsection2-start',
            'type' => 'section',
            'title' => __('Skill 2', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'skill2-name',
            'type' => 'text',
            'title' => __('Skill Name', 'integral') ,
            'default' => 'Typography',
        ) ,
        array(
            'id' => 'skill2-color',
            'type' => 'color',
            'title' => __('Skill Color', 'integral') ,
            'subtitle' => __('Pick a color for the skill', 'integral') ,
            'default' => '#5bc0de',
        ) ,
        array(
            'id' => 'skill2-percent',
            'type' => 'slider',
            'title' => __('Skill Level', 'integral') ,
            'default' => 60,
            'min' => 1,
            'step' => 1,
            'max' => 100,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'skillsection2-end',
            'type' => 'section',
            'indent' => false,
        ) ,

        // Skill 3

        array(
            'id' => 'skillsection3-start',
            'type' => 'section',
            'title' => __('Skill 3', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'skill3-name',
            'type' => 'text',
            'title' => __('Skill Name', 'integral') ,
            'default' => 'HTML / CSS',
        ) ,
        array(
            'id' => 'skill3-color',
            'type' => 'color',
            'title' => __('Skill Color', 'integral') ,
            'subtitle' => __('Pick a color for the skill', 'integral') ,
            'default' => '#f0ad4e',
        ) ,
        array(
            'id' => 'skill3-percent',
            'type' => 'slider',
            'title' => __('Skill Level', 'integral') ,
            'default' => 80,
            'min' => 1,
            'step' => 1,
            'max' => 100,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'skillsection3-end',
            'type' => 'section',
            'indent' => false,
        ) ,

        // Skill 4

        array(
            'id' => 'skillsection4-start',
            'type' => 'section',
            'title' => __('Skill 4', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'skill4-name',
            'type' => 'text',
            'title' => __('Skill Name', 'integral') ,
            'default' => 'Programming',
        ) ,
        array(
            'id' => 'skill4-color',
            'type' => 'color',
            'title' => __('Skill Color', 'integral') ,
            'subtitle' => __('Pick a color for the skill', 'integral') ,
            'default' => '#d9534f',
        ) ,
        array(
            'id' => 'skill4-percent',
            'type' => 'slider',
            'title' => __('Skill Level', 'integral') ,
            'default' => 100,
            'min' => 1,
            'step' => 1,
            'max' => 100,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'skillsection4-end',
            'type' => 'section',
            'indent' => false,
        ) ,

        // Skill 5

        array(
            'id' => 'skillsection5-start',
            'type' => 'section',
            'title' => __('Skill 5', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'skill5-name',
            'type' => 'text',
            'title' => __('Skill Name', 'integral') ,
        ) ,
        array(
            'id' => 'skill5-color',
            'type' => 'color',
            'title' => __('Skill Color', 'integral') ,
            'subtitle' => __('Pick a color for the skill', 'integral') ,
            'default' => '#333333',
        ) ,
        array(
            'id' => 'skill5-percent',
            'type' => 'slider',
            'title' => __('Skill Level', 'integral') ,
            'min' => 1,
            'step' => 1,
            'max' => 100,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'skillsection5-end',
            'type' => 'section',
            'indent' => false,
        ) ,

        // Skill 6

        array(
            'id' => 'skillsection6-start',
            'type' => 'section',
            'title' => __('Skill 6', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'skill6-name',
            'type' => 'text',
            'title' => __('Skill Name', 'integral') ,
        ) ,
        array(
            'id' => 'skill6-color',
            'type' => 'color',
            'title' => __('Skill Color', 'integral') ,
            'subtitle' => __('Pick a color for the skill', 'integral') ,
            'default' => '#333333',
        ) ,
        array(
            'id' => 'skill6-percent',
            'type' => 'slider',
            'title' => __('Skill Level', 'integral') ,
            'min' => 1,
            'step' => 1,
            'max' => 100,
            'display_value' => 'label'
        ) ,
        array(
            'id' => 'skillsection6-end',
            'type' => 'section',
            'indent' => false,
        ) ,
        array(
            'id' => 'skills-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => 'no-padding-bottom',
        ) ,
        array(
            'id' => 'skills-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the skills section.', 'integral') ,
        ) ,
    )
));

// -> START Team

Redux::setSection($opt_name, array(
    'title' => __('Team', 'integral') ,
    'id' => 'team',
    'icon' => 'el el-group',
    'fields' => array(
        array(
            'id' => 'team-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Our Team',
        ) ,
        array(
            'id' => 'team-create',
            'type' => 'raw',
            'title' => __('Add Team Members', 'integral') ,
            'content' => __('Team members are created using Widgets. Go to APPEARANCE > Widgets and locate [Homepage Team Section]. Add widgets entitled [Integral - Team Member Widget] to this area to add team members. Add as many as you like.', 'integral') ,
        ) ,
        array(
            'id' => 'team-layout',
            'type' => 'select',
            'title' => __('Team Members Layout', 'integral') ,
            'subtitle' => __('Configure the number of team members to appear in a row. Additional team members will automatically default to the next row.', 'integral') ,
            'options' => array(
                '2' => __('6 per row (6 columns)', 'integral') ,
                '3' => __('4 per row (4 columns)', 'integral') ,
                '4' => __('3 per row (3 columns)', 'integral') ,
                '6' => __('2 per row (2 columns)', 'integral') ,
                '12' => __('1 per row (1 column)', 'integral') ,
            ) ,
            'default' => '4'
        ) ,
        array(
            'id' => 'team-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
            'default' => 'no-padding-bottom',
        ) ,
        array(
            'id' => 'team-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the team members section.', 'integral') ,
        ) ,
    )
));

// -> START Blog

Redux::setSection($opt_name, array(
    'title' => __('Blog', 'integral') ,
    'id' => 'blog',
    'icon' => 'el el-wordpress',
    'fields' => array(
        array(
            'id' => 'blog-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'From Our Blog',
        ) ,
        array(
            'id' => 'blog-posts',
            'type' => 'select',
            'title' => __('Blog Posts', 'integral') ,
            'subtitle' => __('Set the number of latest posts to display.', 'integral') ,
            'options' => array(
                '1' => __('1 post', 'integral') ,
                '2' => __('2 posts', 'integral') ,
                '3' => __('3 posts', 'integral') ,
                '4' => __('4 posts', 'integral') ,
                '5' => __('5 posts', 'integral') ,
                '6' => __('6 posts', 'integral') ,
                '7' => __('7 posts', 'integral') ,
                '8' => __('8 posts', 'integral') ,
                '9' => __('9 posts', 'integral') ,
                '10' => __('10 posts', 'integral') ,
                '11' => __('11 posts', 'integral') ,
                '12' => __('12 posts', 'integral') ,
            ) ,
            'default' => '3'
        ) ,
        array(
            'id' => 'blog-layout',
            'type' => 'select',
            'title' => __('Blog Posts Layout', 'integral') ,
            'subtitle' => __('Configure the posts layout.', 'integral') ,
            'options' => array(
                '3' => __('4 per row (4 columns)', 'integral') ,
                '4' => __('3 per row (3 columns)', 'integral') ,
                '6' => __('2 per row (2 columns)', 'integral') ,
                '12' => __('1 per row (1 column)', 'integral') ,
            ) ,
            'default' => '4'
        ) ,
        array(
            'id' => 'blog-below-text',
            'type' => 'textarea',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Content Area Below Posts', 'integral') ,
            'subtitle' => __('Use this field to display content or links to your blog.', 'integral') ,
            'default' => '<p class="text-center"><a href="/blog" class="btn btn-md btn-inverse">Read the blog &#8594;</a></p>'
        ) ,
        array(
            'id' => 'blog-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
        ) ,
        array(
            'id' => 'blog-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the Blog members section.', 'integral') ,
        ) ,
    )
));

// -> START Instagram
Redux::setSection($opt_name, array(
    'title' => __('Instagram', 'integral') ,
    'id' => 'instagram',
    'desc' => __('Use this section to display your latest Instagram photos.', 'integral') ,
    'icon' => 'el el-instagram',
    'fields' => array(
        array(
            'id' => 'go-pro-7',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Tweets
Redux::setSection($opt_name, array(
    'title' => __('Tweets', 'integral') ,
    'id' => 'tweets',
    'icon' => 'el el-twitter',
    'desc' => __('Display your latest tweets', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-8',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Newsletter
Redux::setSection($opt_name, array(
    'title' => __('Newsletter', 'integral') ,
    'id' => 'newsletter',
    'icon' => 'el el-bullhorn',
    'fields' => array(
        array(
            'id' => 'newsletter-bg',
            'type' => 'background',
            'title' => __('Background', 'integral') ,
            'subtitle' => __('Select a color or upload an image. This will fill up the background of the Newsletter section.', 'integral') ,
            'desc' => __('Preferred image size of minimum 1600px wide', 'integral') ,
            'output' => array(
                '.newsletter'
            ) ,
            'compiler' => 'true',
            'default' => array(
                'background-image' => get_template_directory_uri() . '/images/bg-newsletter.jpg',
                'background-size' => 'cover',
            )
        ) ,
        array(
            'id' => 'newsletter-overlay-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Background Overlay', 'integral') ,
            'subtitle' => __('Toggle off to disable the dark overlay and pattern which appears over the background image.', 'integral') ,
        ) ,
        array(
            'id' => 'newsletter-overlay-info',
            'type' => 'info',
            'style' => 'info',
            'title' => __('To change the color and opacity of the dark overlay which covers the background image, edit class <code>.blacklayer</code> on line 88 of the style.css file.', 'integral') ,
        ) ,
        array(
            'id' => 'newsletter-parallax-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Parallax Effect', 'integral') ,
            'subtitle' => __('Toggle off to disable the parallax effect', 'integral') ,
        ) ,
        array(
            'id' => 'newsletter-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Newsletter Form',
        ) ,
        array(
            'id' => 'newsletter-text',
            'type' => 'textarea',
            'title' => __('Content', 'integral') ,
            'desc' => __('Custom HTML allowed', 'integral') ,
            'default' => 'Display a small newsletter subscription form. Integrates with services such as MailChimp and ConstantContact.',
        ) ,
        array(
            'id' => 'mailchimp-code',
            'type' => 'textarea',
            'title' => __('Newsletter Form Code', 'integral') ,
            'subtitle' => __('Paste form code here. Styling is supported for Mailchimp and ConstantContact. You can override form styling in the themes default stylesheet (styles.css) located under APPEARANCE > Editor.', 'integral') ,
            'desc' => __('Custom HTML allowed', 'integral') ,
            'default' => '<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup"><form id="mc-embedded-subscribe-form" class="validate" action="//themely.us12.list-manage.com/subscribe/post?u=96d68578362e503cedd707b57&amp;id=7629c7ed4b" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
<div id="mc_embed_signup_scroll">
<div class="mc-field-group"><input id="mce-EMAIL" class="required email" name="EMAIL" type="email" value="" placeholder="Email Address" /></div>
<div id="mce-responses" class="clear"></div>
<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
<div style="position: absolute; left: -5000px;"><input tabindex="-1" name="b_96d68578362e503cedd707b57_7629c7ed4b" type="text" value="" /></div>
<div class="clear"><input id="mc-embedded-subscribe" class="button" name="subscribe" type="submit" value="Subscribe" /></div>
</div>
</form></div>
<!--End mc_embed_signup-->',
        ) ,
        array(
            'id' => 'newsletter-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
        ) ,
        array(
            'id' => 'newsletter-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the newsletter section.', 'integral') ,
        ) ,
    )
));

// -> START Contact
Redux::setSection($opt_name, array(
    'title' => __('Contact', 'integral') ,
    'id' => 'contact',
    'icon' => 'el el-envelope',
    'fields' => array(
        array(
            'id' => 'contact-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Contact',
        ) ,
        array(
            'id' => 'contact-title-icon',
            'type' => 'text',
            'title' => __('Title Icon', 'integral') ,
            'desc' => __('Copy and paste the required icon prefix and class name from the <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome Icons list</a> and choose from 1100+ icons. For example, to use the smiley face icon enter: far fa-smile', 'integral') ,
            'default' => 'fa-envelope',
        ) ,
        array(
            'id' => 'contact-subtitle',
            'type' => 'editor',
            'title' => __('Subtitle', 'integral') ,
            'default' => 'Donec nec justo eget felis facilisis fermentum. Aliquam dignissim felis auctor ultrices ut elementum.',
        ) ,
        array(
            'id' => 'contact-text',
            'type' => 'select',
            'title' => __('Content', 'integral') ,
            'desc' => __('Select the page you want to pull content from to populate this section', 'integral') ,
            'data' => 'pages',
        ) ,
        array(
            'id' => 'contactinfo-start',
            'type' => 'section',
            'title' => __('Contact Info', 'integral') ,
            'indent' => true,
        ) ,
        array(
            'id' => 'contactinfo-title',
            'type' => 'text',
            'title' => __('Title', 'integral') ,
            'default' => 'Contact Info',
        ) ,
        array(
            'id' => 'contact-phone',
            'type' => 'text',
            'title' => __('Phone Number', 'integral') ,
            'default' => '+1 323 456 7891',
        ) ,
        array(
            'id' => 'contact-email',
            'type' => 'text',
            'title' => __('Email Address', 'integral') ,
            'default' => 'hello@yourwebsite.com',
        ) ,
        array(
            'id' => 'contact-address',
            'type' => 'textarea',
            'title' => __('Location Address', 'integral') ,
            'default' => '1 Pacific Ave, Suite 100
                        Santa Monica, CA 90210
                        United States',
        ) ,
        array(
            'id' => 'contact-facebook',
            'type' => 'text',
            'title' => __('Facebook URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-twitter',
            'type' => 'text',
            'title' => __('Twitter URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-googleplus',
            'type' => 'text',
            'title' => __('Google+ URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-github',
            'type' => 'text',
            'title' => __('Github URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-behance',
            'type' => 'text',
            'title' => __('Behance URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-linkedin',
            'type' => 'text',
            'title' => __('Linkedin URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-instagram',
            'type' => 'text',
            'title' => __('Instagram URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contact-youtube',
            'type' => 'text',
            'title' => __('Youtube URL', 'integral') ,
            'default' => '#',
        ) ,
        array(
            'id' => 'contactinfo-end',
            'type' => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ) ,
        array(
            'id' => 'contact-form-code',
            'type' => 'text',
            'title' => __('Contact Form 7 Shortcode', 'integral') ,
            'subtitle' => __('Make sure you have installed the Contact Form 7 plugin and created a form. To create a form go to CONTACT > Add New. Then paste the shortcode in the field on the right.', 'integral') ,
            'description' => __('Paste the shortcode in the field above.', 'integral') ,
            'default' => '[contact-form-7 id="1" title="Contact form 1"]'
        ) ,
        array(
            'id' => 'contact-custom-class',
            'type' => 'text',
            'placeholder' => __('Example: no-padding-bottom', 'integral') ,
            'title' => __('Custom Class', 'integral') ,
            'subtitle' => __('Append a custom CSS class to this section.', 'integral') ,
        ) ,
        array(
            'id' => 'contact-section-toggle',
            'type' => 'switch',
            'default' => true,
            'title' => __('Disable', 'integral') ,
            'subtitle' => __('Toggle off to disable the contact section.', 'integral') ,
        ) ,
    )
));

// -> START Footer
Redux::setSection($opt_name, array(
    'title' => __('Footer', 'integral') ,
    'id' => 'copyright',
    'icon' => 'el el-lock',
    'fields' => array(
        array(
            'id' => 'copyright-text',
            'type' => 'textarea',
            'title' => __('Copyright Text', 'integral') ,
            'desc' => __('Custom HTML allowed', 'integral') ,
            'default' => '&copy; 2016 All Rights Reserved | Powered by <a href="http://wordpress.org" target="_blank">Wordpress</a> | Made with &#10084; by <a href="https://www.themely.com" target="_blank">Themely</a>',
        ) ,
    )
));

// -> START Extra 1
Redux::setSection($opt_name, array(
    'title' => __('Extra 1', 'integral') ,
    'id' => 'extra1',
    'desc' => __('Use this section to display additional content on your homepage.', 'integral') ,
    'icon' => 'el el-plus',
    'fields' => array(
        array(
            'id' => 'go-pro-9',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Extra 2
Redux::setSection($opt_name, array(
    'title' => __('Extra 2', 'integral') ,
    'id' => 'extra2',
    'desc' => __('Use this section to display additional content on your homepage.', 'integral') ,
    'icon' => 'el el-plus',
    'fields' => array(
        array(
            'id' => 'go-pro-10',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
        ) ,
    )
));

// -> START Custom Code
Redux::setSection($opt_name, array(
    'title' => __('Custom Code', 'integral') ,
    'id' => 'customcode',
    'icon' => 'el el-wordpress',
    'desc' => __('Enter custom Javascript or CSS code in your theme header and footer.', 'integral') ,
    'fields' => array(
        array(
            'id' => 'go-pro-11',
            'type' => 'raw',
            'content' => __('<p><i style="color:#f18500;" class="el el-lock"></i> <a style="color:#f18500;" target="_blank" href="https://www.themely.com/themes/integral/">Upgrade</a> to unlock this section.</p>', 'integral') ,
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
            'title' => __('Section via hook', 'integral') ,
            'desc' => __('This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'integral') ,
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