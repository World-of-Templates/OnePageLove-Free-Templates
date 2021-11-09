<?php
/**
 * Theme Customizer
 */
function serenity_lite_theme_customize_register( $wp_customize ) {

    // COLOR SETTINGS //
    // Primary Button Color
    $wp_customize->add_setting('serenity_lite_primary_button_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_primary_button_color',
        array(
            'label' => __('Primary Button Color', 'serenity-lite'),
            'description' => __('Applies to buttons for the comment form, search form, pricing tables, services, etc.', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_primary_button_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Darklayer Background Color
    $wp_customize->add_setting('serenity_lite_darklayer_background_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_darklayer_background_color',
        array(
            'label' => __('Background Overlay Color', 'serenity-lite'),
            'description' => __('Applies to the dark layer displayed over the background images in One-page Sections.', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_darklayer_background_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Footer Social Icons Color
    $wp_customize->add_setting('serenity_lite_footer_icons_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_footer_icons_color',
        array(
            'label' => __('Footer Social Icons Color', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_footer_icons_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Content Links Color
    $wp_customize->add_setting('serenity_lite_content_links_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_content_links_color',
        array(
            'label' => __('Content Links Color', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_content_links_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Title Divider Color
    $wp_customize->add_setting('serenity_lite_title_divider_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_title_divider_color',
        array(
            'label' => __('One-Page Sections Title Divider Color', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_title_divider_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Top Menu Button Color
    $wp_customize->add_setting('serenity_lite_top_menu_btn_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_top_menu_btn_color',
        array(
            'label' => __('Top Menu Button Color', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_top_menu_btn_color',
            'type' => 'upgrade-feature',
        )
    ));

    // MENU SETTINGS //
    $wp_customize->add_section('serenity_lite_top_menu_settings', array(
        'title' => __('Top Menu Settings', 'serenity-lite'),
        'panel' => 'nav_menus',
    ));
    // Top Menu Button
    $wp_customize->add_setting('serenity_lite_top_menu_btn_text', array(
        'default' => __('Purchase', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_top_menu_btn_text', array(
        'label' => __('Top Menu Button Text', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_top_menu_settings',
        'settings' => 'serenity_lite_top_menu_btn_text',
    ));

    $wp_customize->add_setting('serenity_lite_top_menu_btn_url', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#',
    ));

    $wp_customize->add_control('serenity_lite_top_menu_btn_url', array(
        'label' => __('Top Menu Button Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_top_menu_settings',
        'settings' => 'serenity_lite_top_menu_btn_url',
    ));

    $wp_customize->add_setting('serenity_lite_top_menu_btn_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_top_menu_btn_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable the top menu button.', 'serenity-lite'),
            'section' => 'serenity_lite_top_menu_settings',
            'settings' => 'serenity_lite_top_menu_btn_toggle',
            'type' => 'checkbox',
        )
    ));

    // Top Menu Alignment
    $wp_customize->add_setting('serenity_lite_top_menu_alignment', array(
        'default' => 'ml-auto',
        'sanitize_callback' => 'serenity_lite_wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control('serenity_lite_top_menu_alignment', array(
        'type' => 'select',
        'label' => __('Top Menu Alignment', 'serenity-lite'),
        'section' => 'serenity_lite_top_menu_settings',
        'settings' => 'serenity_lite_top_menu_alignment',
        'choices' => array(
            'ml-auto' => 'Right',
            'mx-auto' => 'Center',
            'mr-auto' => 'Left'
        ),
    ));

    // LAYOUT SETTINGS //
    $wp_customize->add_section('serenity_lite_layout_settings', array(
        'priority' => 2,
        'title' => __('Layout', 'serenity-lite'),
        'description' => __('Control the layout of your site here. Choose between boxed/contained and full-width for both the site and content.', 'serenity-lite'),
    ));
    // Site Width
    $wp_customize->add_setting('serenity_lite_layout_site_width', array(
        'default' => 'fullwidth-container',
        'sanitize_callback' => 'serenity_lite_wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control('serenity_lite_layout_site_width', array(
        'type' => 'select',
        'label' => __('Site Width', 'serenity-lite'),
        'section' => 'serenity_lite_layout_settings',
        'settings' => 'serenity_lite_layout_site_width',
        'description' => __('Select a boxed or full-width site layout.', 'serenity-lite'),
        'choices' => array(
            'fullwidth-container' => 'Full-width (default)',
            'boxed-container' => 'Boxed'
        ),
    ));

    // Content Width
    $wp_customize->add_setting('serenity_lite_layout_content_width', array(
        'default' => '1140px',
        'sanitize_callback' => 'serenity_lite_wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control('serenity_lite_layout_content_width', array(
        'type' => 'select',
        'label' => __('Content Width', 'serenity-lite'),
        'section' => 'serenity_lite_layout_settings',
        'settings' => 'serenity_lite_layout_content_width',
        'description' => __('Select a contained or full-width content layout.', 'serenity-lite'),
        'choices' => array(
            '1140px' => 'Contained (default)',
            '100%' => 'Full-width'
        ),
    ));

    // One-Page Sections Order
    $wp_customize->add_setting('serenity_lite_layout_onepage_sections_order', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_layout_onepage_sections_order',
        array(
            'label' => __('One-Page Sections Order', 'serenity-lite'),
            'description' => __('Drag and drop the One-Page sections into the desired order. You can also enable or disable sections by clicking the visibility icon to the left of the title.', 'serenity-lite'),
            'section' => 'serenity_lite_layout_settings',
            'settings' => 'serenity_lite_layout_onepage_sections_order',
            'type' => 'upgrade-feature',
        )
    ));

    // TYPOGRAPHY SETTINGS //
    $wp_customize->add_section('serenity_lite_typography_settings' , array(
            'priority'       => 3,
            'title'       => __( 'Typography', 'serenity-lite' ),
            'description' => __( 'Configure typography settings and choose from over 50 of the most popular fonts.', 'serenity-lite' ),
    ) );

    // Body Paragraphs
    $wp_customize->add_setting('serenity_lite_typography_settings_body', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_body',
        array(
            'label' => __('Paragraphs', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_body',
            'type' => 'upgrade-feature',
        )
    ));

    // Heading 1
    $wp_customize->add_setting('serenity_lite_typography_settings_heading1', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_heading1',
        array(
            'label' => __('Heading 1', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_heading1',
            'type' => 'upgrade-feature',
        )
    ));

    // Heading 2
    $wp_customize->add_setting('serenity_lite_typography_settings_heading2', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_heading2',
        array(
            'label' => __('Heading 1', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_heading2',
            'type' => 'upgrade-feature',
        )
    ));

    // Heading 3
    $wp_customize->add_setting('serenity_lite_typography_settings_heading3', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_heading2',
        array(
            'label' => __('Heading 3', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_heading3',
            'type' => 'upgrade-feature',
        )
    ));

    // Heading 4
    $wp_customize->add_setting('serenity_lite_typography_settings_heading4', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_heading4',
        array(
            'label' => __('Heading 1', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_heading4',
            'type' => 'upgrade-feature',
        )
    ));

    // Heading 5
    $wp_customize->add_setting('serenity_lite_typography_settings_heading5', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_heading5',
        array(
            'label' => __('Heading 1', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_heading5',
            'type' => 'upgrade-feature',
        )
    ));

    // Heading 6
    $wp_customize->add_setting('serenity_lite_typography_settings_heading6', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_heading6',
        array(
            'label' => __('Heading 1', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_heading6',
            'type' => 'upgrade-feature',
        )
    ));

    // One-Page Section Subtitles
    $wp_customize->add_setting('serenity_lite_typography_settings_subtitles', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_subtitles',
        array(
            'label' => __('One-Page Section Subtitles', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_subtitles',
            'type' => 'upgrade-feature',
        )
    ));

    // Top Menu
    $wp_customize->add_setting('serenity_lite_typography_settings_top_menu', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_top_menu',
        array(
            'label' => __('Top Menu', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_top_menu',
            'type' => 'upgrade-feature',
        )
    ));

    // Site Title
    $wp_customize->add_setting('serenity_lite_typography_settings_site_title', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_site_title',
        array(
            'label' => __('Site Title', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_site_title',
            'type' => 'upgrade-feature',
        )
    ));

    // Site Tagline
    $wp_customize->add_setting('serenity_lite_typography_settings_site_tagline', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_typography_settings_site_tagline',
        array(
            'label' => __('Site Tagline', 'serenity-lite'),
            'section' => 'serenity_lite_typography_settings',
            'settings' => 'serenity_lite_typography_settings_site_tagline',
            'type' => 'upgrade-feature',
        )
    ));

    // One-page Template Settings //
    $wp_customize->add_panel('serenity_lite_onepage_template_panel', array(
        'priority' => 2,
        'title' => __('One-Page Sections', 'serenity-lite'),
        'description' => __('Configure settings for each of the sections in the One-Page Template. For instructions on how to setup the One-Page Template go to <a href="themes.php?page=serenity-lite-welcome">APPEARANCE > Setup Serenity Lite</a>.', 'serenity-lite'),
    ));

    // Hero //
    $wp_customize->add_section('serenity_lite_onepage_hero_section', array(
        'title' => __('Hero Section', 'serenity-lite'),
        'description' => __('Configure settings for the Welcome/Hero section in the One-Page template. This section uses a Text Widget to display a tagline/paragraph between the titles & buttons. <a href="javascript:wp.customize.section( \'sidebar-widgets-hero-widgets\' ).focus();">Add a Text Widget</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Hero Title H1
    $wp_customize->add_setting('serenity_lite_onepage_hero_title1', array(
        'default' => __('LAUNCH. YOUR. BUSINESS.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_hero_title1', array(
        'label' => __('Big Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_hero_section',
        'settings' => 'serenity_lite_onepage_hero_title1',
    ));

    // Hero Title H2
    $wp_customize->add_setting('serenity_lite_onepage_hero_title2', array(
        'default' => __('Discover more possibilities for your success!', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_hero_title2', array(
        'label' => __('Small Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_hero_section',
        'settings' => 'serenity_lite_onepage_hero_title2',
    ));

    // Hero Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the titles and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Button 1 Text
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn1', array(
        'default' => __('Learn More', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_hero_section_btn1', array(
        'label' => __('Button 1 Text', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_hero_section',
        'settings' => 'serenity_lite_onepage_hero_section_btn1',
    ));

    // Hero Button 1 URL
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn1url', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#',
    ));

    $wp_customize->add_control('serenity_lite_onepage_hero_section_btn1url', array(
        'label' => __('Button 1 Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_onepage_hero_section',
        'settings' => 'serenity_lite_onepage_hero_section_btn1url',
    ));

    // Hero Button 1 Color
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn1_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_section_btn1_color',
        array(
            'label' => __('Button 1 Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_btn1_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Button 1 Toggle
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn1_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_onepage_hero_section_btn1_toggle',
        array(
            'label' => __('Disable Button 1', 'serenity-lite'),
            'description' => __('Check the box to disable this button.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_btn1_toggle',
            'type' => 'checkbox',
        )
    ));

    // Hero Button 2 Text
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn2', array(
        'default' => __('Download Now', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_hero_section_btn2', array(
        'label' => __('Button 2 Text', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_hero_section',
        'settings' => 'serenity_lite_onepage_hero_section_btn2',
    ));

    // Hero Button 2 URL
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn2url', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#',
    ));

    $wp_customize->add_control('serenity_lite_onepage_hero_section_btn2url', array(
        'label' => __('Button 2 Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_onepage_hero_section',
        'settings' => 'serenity_lite_onepage_hero_section_btn2url',
    ));

    // Hero Button 2 Color
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn2_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_section_btn2_color',
        array(
            'label' => __('Button 2 Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_btn2_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Button 2 Toggle
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_btn2_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_onepage_hero_section_btn2_toggle',
        array(
            'label' => __('Disable Button 2', 'serenity-lite'),
            'description' => __('Check the box to disable this button.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_btn2_toggle',
            'type' => 'checkbox',
        )
    ));

    // Hero Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_hero_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Background Color
    $wp_customize->add_setting('serenity_lite_onepage_hero_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Background Image
    $wp_customize->add_setting('serenity_lite_onepage_hero_bg_image', array(
        'default' => get_theme_file_uri('/images/bg-hero.jpg'),
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        'serenity_lite_onepage_hero_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_bg_image'
        )
    ));

    // Hero Slider Speed
    $wp_customize->add_setting('serenity_lite_onepage_hero_slider_speed', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_slider_speed',
        array(
            'label' => __('Slider Speed', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_slider_speed',
            'description' => __('Set the scroll speed of the slider.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Section Height
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_height', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_section_height',
        array(
            'label' => __('Section Height', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_height',
            'description' => __('Choose how you want to control the height of the Hero section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Padding Top
    $wp_customize->add_setting('serenity_lite_onepage_hero_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Padding Bottom
    $wp_customize->add_setting('serenity_lite_onepage_hero_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_hero_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Hero Section Toggle
    $wp_customize->add_setting('serenity_lite_onepage_hero_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_onepage_hero_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_hero_section',
            'settings' => 'serenity_lite_onepage_hero_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // About Section //
    $wp_customize->add_section('serenity_lite_onepage_about_section', array(
        'title' => __('About Section', 'serenity-lite'),
        'description' => __('Configure settings for the About section in the One-Page template.', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));
    // About Title
    $wp_customize->add_setting('serenity_lite_onepage_about_title', array(
        'default' => __('About', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_about_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_about_section',
        'settings' => 'serenity_lite_onepage_about_title',
    ));

    // Hero Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_onepage_about_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_about_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the titles and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_onepage_about_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // About Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_about_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_about_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_about_section',
        'settings' => 'serenity_lite_onepage_about_subtitle',
    ));

    // About Content
    $wp_customize->add_setting('serenity_lite_onepage_about_content', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_about_content', array(
        'label' => __('Content', 'serenity-lite'),
        'type' => 'dropdown-pages',
        'section' => 'serenity_lite_onepage_about_section',
        'settings' => 'serenity_lite_onepage_about_content',
        'description' => __('Select a page from the dropdown to display content in this section.', 'serenity-lite'),
    ));

    // About Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_about_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_about_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_onepage_about_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // About Background Color
    $wp_customize->add_setting('serenity_lite_onepage_about_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_about_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_onepage_about_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // About Background Image
    $wp_customize->add_setting('serenity_lite_onepage_about_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_about_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_onepage_about_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // About Padding Top
    $wp_customize->add_setting('serenity_lite_onepage_about_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_about_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_onepage_about_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // About Padding Bottom
    $wp_customize->add_setting('serenity_lite_onepage_about_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_about_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_onepage_about_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // About Section Toggle
    $wp_customize->add_setting('serenity_lite_about_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_about_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_about_section',
            'settings' => 'serenity_lite_about_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Blog Section //
    $wp_customize->add_section('serenity_lite_onepage_blog_section', array(
        'title' => __('Blog Section', 'serenity-lite'),
        'description' => __('This section displays your latest blog posts.', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Blog Title
    $wp_customize->add_setting('serenity_lite_onepage_blog_title', array(
        'default' => __('Blog', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_blog_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_blog_section',
        'settings' => 'serenity_lite_onepage_blog_title',
    ));

    // Blog Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_blog_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_blog_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_blog_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_blog_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_blog_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_blog_section',
        'settings' => 'serenity_lite_onepage_blog_subtitle',
    ));

    // Blog Posts
    $wp_customize->add_setting('serenity_lite_onepage_blog_posts', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_posts',
        array(
            'label' => __('Quantity', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_posts',
            'description' => __('Select the total number of blog posts to display in this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Layout
    $wp_customize->add_setting('serenity_lite_onepage_blog_layout', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_layout',
        array(
            'label' => __('Layout', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_layout',
            'description' => __('Select the number of blog posts to display per row.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Button
    $wp_customize->add_setting('serenity_lite_onepage_blog_btn', array(
        'default' => __('Read the blog', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_blog_btn', array(
        'label' => __('Button Text', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_blog_section',
        'settings' => 'serenity_lite_onepage_blog_btn',
    ));

    // Blog Link
    $wp_customize->add_setting('serenity_lite_onepage_blog_link', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_blog_link', array(
        'label' => __('Button Link', 'serenity-lite'),
        'type' => 'dropdown-pages',
        'section' => 'serenity_lite_onepage_blog_section',
        'settings' => 'serenity_lite_onepage_blog_link',
    ));

    // Blog Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_blog_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Background Color
    $wp_customize->add_setting('serenity_lite_onepage_blog_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Background Image
    $wp_customize->add_setting('serenity_lite_onepage_blog_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Padding Top
    $wp_customize->add_setting('serenity_lite_onepage_blog_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Padding Bottom
    $wp_customize->add_setting('serenity_lite_onepage_blog_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_blog_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_onepage_blog_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Blog Section Toggle
    $wp_customize->add_setting('serenity_lite_blog_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_blog_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_blog_section',
            'settings' => 'serenity_lite_blog_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Brands Section //
    $wp_customize->add_section('serenity_lite_onepage_brands_section', array(
        'title' => __('Brands Section', 'serenity-lite'),
        'description' => __('This section uses Image Widgets to display brands. <a href="javascript:wp.customize.section( \'sidebar-widgets-brands-widgets\' ).focus();">Add Image Widgets</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));
    // Brands Title
    $wp_customize->add_setting('serenity_lite_onepage_brands_title', array(
        'default' => __('Brands', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_brands_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_brands_section',
        'settings' => 'serenity_lite_onepage_brands_title',
    ));

    // Brands Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_brands_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_brands_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_brands_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Brands Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_brands_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_brands_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_brands_section',
        'settings' => 'serenity_lite_onepage_brands_subtitle',
    ));

    // Brands Layout
    $wp_customize->add_setting('serenity_lite_onepage_brands_layout', array(
        'default' => '6',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_brands_layout', array(
        'type' => 'select',
        'label' => __('Layout', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_brands_section',
        'settings' => 'serenity_lite_onepage_brands_layout',
        'description' => __('Set the number of logos/slides to display at once.', 'serenity-lite'),
        'choices' => array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
        ),
    ));

    // Brands Autoplay
    $wp_customize->add_setting('serenity_lite_onepage_brands_autoplay', array(
        'default' => 'true',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('serenity_lite_onepage_brands_autoplay', array(
        'type' => 'select',
        'label' => __('Autplay', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_brands_section',
        'settings' => 'serenity_lite_onepage_brands_autoplay',
        'description' => __('Set whether the slider will automatically start playing once the page loads.', 'serenity-lite'),
        'choices' => array(
            'true' => 'Yes',
            'false' => 'No',
        ),
    ));

    // Brands Scroll
    $wp_customize->add_setting('serenity_lite_onepage_brands_scroll', array(
        'default' => '1',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_brands_scroll', array(
        'type' => 'select',
        'label' => __('Scroll', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_brands_section',
        'settings' => 'serenity_lite_onepage_brands_scroll',
        'description' => __('Set the number of logos/slides to scroll.', 'serenity-lite'),
        'choices' => array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
        ),
    ));

    // Brands Speed
    $wp_customize->add_setting('serenity_lite_onepage_brands_speed', array(
        'default' => '8',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_brands_speed', array(
        'type' => 'select',
        'label' => __('Speed', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_brands_section',
        'settings' => 'serenity_lite_onepage_brands_speed',
        'description' => __('Set the scroll speed of the slider.', 'serenity-lite'),
        'choices' => array(
            '1' => '1 second',
            '2' => '2 seconds',
            '3' => '3 seconds',
            '4' => '4 seconds',
            '5' => '5 seconds',
            '6' => '6 seconds',
            '7' => '7 seconds',
            '8' => '8 seconds',
            '9' => '9 seconds',
            '10' => '10 seconds',
        ),
    ));

    // Brands Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_brands_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_brands_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_onepage_brands_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Brands Background Color
    $wp_customize->add_setting('serenity_lite_onepage_brands_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_brands_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_onepage_brands_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Brands Background Image
    $wp_customize->add_setting('serenity_lite_onepage_brands_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_brands_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_onepage_brands_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Brands Padding Top
    $wp_customize->add_setting('serenity_lite_onepage_brands_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_brands_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_onepage_brands_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Brands Padding Bottom
    $wp_customize->add_setting('serenity_lite_onepage_brands_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_brands_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_onepage_brands_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Brands Section Toggle
    $wp_customize->add_setting('serenity_lite_brands_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_brands_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_brands_section',
            'settings' => 'serenity_lite_brands_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Call to Action Section //
    $wp_customize->add_section('serenity_lite_onepage_cta_section', array(
        'title' => __('Call to Action Section', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // CTA Title
    $wp_customize->add_setting('serenity_lite_onepage_cta_title', array(
        'default' => __('Call to Action', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_cta_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_cta_section',
        'settings' => 'serenity_lite_onepage_cta_title',
    ));

    // CTA Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_cta_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_cta_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_cta_section',
        'settings' => 'serenity_lite_onepage_cta_subtitle',
    ));

    // CTA Button
    $wp_customize->add_setting('serenity_lite_onepage_cta_btn', array(
        'default' => __('Download Now', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_cta_btn', array(
        'label' => __('Button Text', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_cta_section',
        'settings' => 'serenity_lite_onepage_cta_btn',
    ));

    // CTA Link
    $wp_customize->add_setting('serenity_lite_onepage_cta_link', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#',
    ));

    $wp_customize->add_control('serenity_lite_onepage_cta_link', array(
        'label' => __('Button Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_onepage_cta_section',
        'settings' => 'serenity_lite_onepage_cta_link',
    ));

    // CTA Above Button Text
    $wp_customize->add_setting('serenity_lite_onepage_cta_above_btn_text', array(
        'default' => __('Want to learn more?', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_cta_above_btn_text', array(
        'label' => __('Above Button Text', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_cta_section',
        'settings' => 'serenity_lite_onepage_cta_above_btn_text',
    ));

    // CTA Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_cta_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_cta_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_cta_section',
            'settings' => 'serenity_lite_onepage_cta_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // CTA Background Color
    $wp_customize->add_setting('serenity_lite_onepage_cta_bg_color', array(
        'default' => '#2F5BE7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'serenity_lite_onepage_cta_bg_color', array(
        'label' => __('Background Color', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_cta_section',
        'settings' => 'serenity_lite_onepage_cta_bg_color'
    )));

    // CTA Background Image
    $wp_customize->add_setting('serenity_lite_onepage_cta_bg_image', array(
        'default' => get_theme_file_uri('/images/bg-cta.jpg'),
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        'serenity_lite_onepage_cta_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_cta_section',
            'settings' => 'serenity_lite_onepage_cta_bg_image'
        )
    ));

    // CTA Padding Top
    $wp_customize->add_setting('serenity_lite_onepage_cta_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_cta_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_cta_section',
            'settings' => 'serenity_lite_onepage_cta_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // CTA Padding Bottom
    $wp_customize->add_setting('serenity_lite_onepage_cta_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_cta_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_cta_section',
            'settings' => 'serenity_lite_onepage_cta_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // CTA Section Toggle
    $wp_customize->add_setting('serenity_lite_cta_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_cta_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_cta_section',
            'settings' => 'serenity_lite_cta_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Contact Section //
    $wp_customize->add_section('serenity_lite_onepage_contact_section', array(
        'title' => __('Contact Section', 'serenity-lite'),
        'description' => __('This section uses a Text Widget to display the contact information and a WPForms widget to display a contact form. <a href="javascript:wp.customize.section( \'sidebar-widgets-contact-form-widgets\' ).focus();">Add a WPForm Widget</a> and <a href="javascript:wp.customize.section( \'sidebar-widgets-contact-info-widgets\' ).focus();">Add a Text Widget</a><br />NOTE: To display a contact form you must first install & activate the <a target="_blank" href="https://wordpress.org/plugins/wpforms-lite/">WPForms plugin</a>.', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Contact Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_contact_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_contact_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_contact_section',
            'settings' => 'serenity_lite_onepage_contact_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Contact Background Color
    $wp_customize->add_setting('serenity_lite_onepage_contact_bg_color', array(
        'default' => '#291734',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
        'serenity_lite_onepage_contact_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_contact_section',
            'settings' => 'serenity_lite_onepage_contact_bg_color'
        )
    ));

    // Contact Background Image
    $wp_customize->add_setting('serenity_lite_onepage_contact_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_contact_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_contact_section',
            'settings' => 'serenity_lite_onepage_contact_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Contact Padding Top
    $wp_customize->add_setting('serenity_lite_onepage_contact_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_contact_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_contact_section',
            'settings' => 'serenity_lite_onepage_contact_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Contact Padding Bottom
    $wp_customize->add_setting('serenity_lite_onepage_contact_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_contact_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_contact_section',
            'settings' => 'serenity_lite_onepage_contact_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Contact Section Toggle
    $wp_customize->add_setting('serenity_lite_contact_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_contact_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_contact_section',
            'settings' => 'serenity_lite_contact_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Features Section //
    $wp_customize->add_section('serenity_lite_onepage_features_section', array(
        'title' => __('Features Section', 'serenity-lite'),
        'description' => __('This section uses Feature Widgets to display features. <a href="javascript:wp.customize.section( \'sidebar-widgets-feature-widgets\' ).focus();">Add Feature Widgets</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Features Title
    $wp_customize->add_setting('serenity_lite_onepage_features_title', array(
        'default' => __('Main Features', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_features_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_features_section',
        'settings' => 'serenity_lite_onepage_features_title',
    ));

    // Features Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_features_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_features_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_features_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Features Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_features_subtitle', array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_features_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_features_section',
        'settings' => 'serenity_lite_onepage_features_subtitle',
    ));

    // Features Layout
    $wp_customize->add_setting('serenity_lite_onepage_features_layout', array(
        'default' => 'col-sm-6 col-md-6 col-lg-3',
        'sanitize_callback' => 'serenity_lite_wp_filter_nohtml_kses',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_features_layout', array(
        'type' => 'select',
        'label' => __('Layout', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_features_section',
        'settings' => 'serenity_lite_onepage_features_layout',
        'description' => __('Select the number of features to display per row.', 'serenity-lite'),
        'choices' => array(
            'col-sm-12 col-md-12 col-lg-12' => '1',
            'col-sm-6 col-md-6 col-lg-6' => '2',
            'col-sm-6 col-md-6 col-lg-4' => '3',
            'col-sm-6 col-md-6 col-lg-3' => '4',
            'col-sm-6 col-md-6 col-lg-2' => '6',
        ),
    ));

    // Features Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_features_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_features_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_onepage_features_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Features Background Color
    $wp_customize->add_setting('serenity_lite_onepage_features_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_features_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_onepage_features_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Features Background Image
    $wp_customize->add_setting('serenity_lite_onepage_features_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_features_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_onepage_features_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Features Padding
    $wp_customize->add_setting('serenity_lite_onepage_features_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_features_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_onepage_features_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    $wp_customize->add_setting('serenity_lite_onepage_features_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_features_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_onepage_features_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Features Section Toggle
    $wp_customize->add_setting('serenity_lite_features_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_features_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_features_section',
            'settings' => 'serenity_lite_features_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Gallery Section //
    $wp_customize->add_section('serenity_lite_onepage_gallery_section', array(
        'title' => __('Gallery Section', 'serenity-lite'),
        'description' => __('This section uses Gallery Widgets to display photo galleries. <a href="javascript:wp.customize.section( \'sidebar-widgets-gallery-widgets\' ).focus();">Add a Gallery Widget</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));
    // Gallery Title
    $wp_customize->add_setting('serenity_lite_onepage_gallery_title', array(
        'default' => __('Photo Gallery', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_gallery_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_gallery_section',
        'settings' => 'serenity_lite_onepage_gallery_title',
    ));

    // Gallery Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_gallery_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_gallery_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_gallery_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Gallery Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_gallery_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_gallery_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_gallery_section',
        'settings' => 'serenity_lite_onepage_gallery_subtitle',
    ));

    // Gallery Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_gallery_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_gallery_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_onepage_gallery_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Gallery Background Color
    $wp_customize->add_setting('serenity_lite_onepage_gallery_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_gallery_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_onepage_gallery_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Gallery Background Image
    $wp_customize->add_setting('serenity_lite_onepage_gallery_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_gallery_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_onepage_gallery_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Gallery Padding
    $wp_customize->add_setting('serenity_lite_onepage_gallery_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_gallery_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_onepage_gallery_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    $wp_customize->add_setting('serenity_lite_onepage_gallery_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_gallery_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_onepage_gallery_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Gallery Section Toggle
    $wp_customize->add_setting('serenity_lite_gallery_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_gallery_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_gallery_section',
            'settings' => 'serenity_lite_gallery_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Newsletter Section //
    $wp_customize->add_section('serenity_lite_onepage_newsletter_section', array(
        'title' => __('Newsletter Section', 'serenity-lite'),
        'description' => __('This section uses a Newsletter Widget (MailChimp, Constant Contact, etc) to display a signup form. <br /><a href="javascript:wp.customize.section( \'sidebar-widgets-newsletter-form-widgets\' ).focus();">Add a Newsletter Widget</a><br />NOTE: To display a newsletter subscription form first install & activate the <a target="_blank" href="https://wordpress.org/plugins/mailchimp-for-wp/">Mailchimp for WordPress</a> plugin or the <a target="_blank" href="https://wordpress.org/plugins/constant-contact-forms/">Constant Contact Forms</a> plugin.', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Newsletter Title
    $wp_customize->add_setting('serenity_lite_onepage_newsletter_title', array(
        'default' => __('Newsletter', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_newsletter_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_newsletter_section',
        'settings' => 'serenity_lite_onepage_newsletter_title',
    ));

    // Newsletter Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_newsletter_subtitle', array(
        'default' => __('Lorem ipsum veniam adipisicing cupidatat dolor do adipisicing.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_newsletter_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_newsletter_section',
        'settings' => 'serenity_lite_onepage_newsletter_subtitle',
    ));

    // Newsletter Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_newsletter_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_newsletter_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_newsletter_section',
            'settings' => 'serenity_lite_onepage_newsletter_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Newsletter Background Color
    $wp_customize->add_setting('serenity_lite_onepage_newsletter_bg_color', array(
        'default' => '#f6f8fc',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'serenity_lite_onepage_newsletter_bg_color', array(
        'label' => __('Background Color', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_newsletter_section',
        'settings' => 'serenity_lite_onepage_newsletter_bg_color'
    )));

    // Newsletter Background Image
    $wp_customize->add_setting('serenity_lite_onepage_newsletter_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_newsletter_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_newsletter_section',
            'settings' => 'serenity_lite_onepage_newsletter_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Newsletter Padding
    $wp_customize->add_setting('serenity_lite_onepage_newsletter_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_newsletter_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_newsletter_section',
            'settings' => 'serenity_lite_onepage_newsletter_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    $wp_customize->add_setting('serenity_lite_onepage_newsletter_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_newsletter_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_newsletter_section',
            'settings' => 'serenity_lite_onepage_newsletter_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Newsletter Section Toggle
    $wp_customize->add_setting('serenity_lite_newsletter_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_newsletter_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_newsletter_section',
            'settings' => 'serenity_lite_newsletter_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Services Section //
    $wp_customize->add_section('serenity_lite_onepage_services_section', array(
        'title' => __('Services Section', 'serenity-lite'),
        'description' => __('This section uses Service Widgets to display services. <a href="javascript:wp.customize.section( \'sidebar-widgets-service-widgets\' ).focus();">Add Service Widgets</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));
    // Services Title
    $wp_customize->add_setting('serenity_lite_onepage_services_title', array(
        'default' => __('Services', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_services_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_services_section',
        'settings' => 'serenity_lite_onepage_services_title',
    ));

    // Services Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_services_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_services_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_services_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Services Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_services_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_services_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_services_section',
        'settings' => 'serenity_lite_onepage_services_subtitle',
    ));

    // Services Content
    $wp_customize->add_setting('serenity_lite_onepage_services_content', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_services_content', array(
        'label' => __('Content', 'serenity-lite'),
        'type' => 'dropdown-pages',
        'section' => 'serenity_lite_onepage_services_section',
        'settings' => 'serenity_lite_onepage_services_content',
        'description' => __('Select a page from the dropdown to display content in this section.', 'serenity-lite'),
    ));

    // Services Layout
    $wp_customize->add_setting('serenity_lite_onepage_services_layout', array(
        'default' => 'col-sm-12 col-md-12 col-lg-4',
        'sanitize_callback' => 'serenity_lite_wp_filter_nohtml_kses',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_services_layout', array(
        'type' => 'select',
        'label' => __('Layout', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_services_section',
        'settings' => 'serenity_lite_onepage_services_layout',
        'description' => __('Select the number of services to display per row.', 'serenity-lite'),
        'choices' => array(
            'col-sm-12 col-md-12 col-lg-12' => '1',
            'col-sm-12 col-md-12 col-lg-6' => '2',
            'col-sm-12 col-md-12 col-lg-4' => '3',
            'col-sm-12 col-md-12 col-lg-3' => '4',
            'col-sm-12 col-md-12 col-lg-2' => '6',
        ),
    ));

    // Services Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_services_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_services_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_onepage_services_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Services Background Color
    $wp_customize->add_setting('serenity_lite_onepage_services_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_services_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_onepage_services_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Services Background Image
    $wp_customize->add_setting('serenity_lite_onepage_services_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_services_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_onepage_services_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Services Padding
    $wp_customize->add_setting('serenity_lite_onepage_services_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_services_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_onepage_services_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    $wp_customize->add_setting('serenity_lite_onepage_services_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_services_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_onepage_services_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Services Section Toggle
    $wp_customize->add_setting('serenity_lite_services_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_services_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_services_section',
            'settings' => 'serenity_lite_services_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Team Members Section //
    $wp_customize->add_section('serenity_lite_onepage_team_section', array(
        'title' => __('Team Members Section', 'serenity-lite'),
        'description' => __('This section uses Team Member Widgets to display team members. <a href="javascript:wp.customize.section( \'sidebar-widgets-team-widgets\' ).focus();">Add Team Member Widgets</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Team Members Title
    $wp_customize->add_setting('serenity_lite_onepage_team_title', array(
        'default' => __('Team Members', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_team_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_team_section',
        'settings' => 'serenity_lite_onepage_team_title',
    ));

    // Team Members Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_team_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_team_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_team_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Team Members Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_team_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_team_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_team_section',
        'settings' => 'serenity_lite_onepage_team_subtitle',
    ));

    // Team Members Content
    $wp_customize->add_setting('serenity_lite_onepage_team_content', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_team_content', array(
        'label' => __('Content', 'serenity-lite'),
        'type' => 'dropdown-pages',
        'section' => 'serenity_lite_onepage_team_section',
        'settings' => 'serenity_lite_onepage_team_content',
        'description' => __('Select a page from the dropdown to display content in this section.', 'serenity-lite'),
    ));

    // Team Members Layout
    $wp_customize->add_setting('serenity_lite_onepage_team_layout', array(
        'default' => 'col-sm-12 col-md-12 col-lg-4',
        'sanitize_callback' => 'serenity_lite_wp_filter_nohtml_kses',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_team_layout', array(
        'type' => 'select',
        'label' => __('Layout', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_team_section',
        'settings' => 'serenity_lite_onepage_team_layout',
        'description' => __('Select the number of Team Members to display per row.', 'serenity-lite'),
        'choices' => array(
            'col-sm-12 col-md-12 col-lg-12' => '1',
            'col-sm-12 col-md-12 col-lg-6' => '2',
            'col-sm-12 col-md-12 col-lg-4' => '3',
            'col-sm-12 col-md-12 col-lg-3' => '4',
            'col-sm-12 col-md-12 col-lg-2' => '6',
        ),
    ));

    // Team Members Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_team_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_team_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_onepage_team_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Team Members Background Color
    $wp_customize->add_setting('serenity_lite_onepage_team_bg_color', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_team_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_onepage_team_bg_color',
            'type' => 'upgrade-feature',
        )
    ));

    // Team Members Background Image
    $wp_customize->add_setting('serenity_lite_onepage_team_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_team_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_onepage_team_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Team Members Padding
    $wp_customize->add_setting('serenity_lite_onepage_team_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_team_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_onepage_team_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    $wp_customize->add_setting('serenity_lite_onepage_team_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_team_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_onepage_team_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Team Members Section Toggle
    $wp_customize->add_setting('serenity_lite_team_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_team_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_team_section',
            'settings' => 'serenity_lite_team_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Testimonials Section //
    $wp_customize->add_section('serenity_lite_onepage_testimonials_section', array(
        'title' => __('Testimonials Section', 'serenity-lite'),
        'description' => __('This section uses Testimonial Widgets to display client testimonials. <a href="javascript:wp.customize.section( \'sidebar-widgets-testimonial-widgets\' ).focus();">Add Testimonial Widgets</a>', 'serenity-lite'),
        'panel' => 'serenity_lite_onepage_template_panel',
    ));

    // Testimonials Title
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_title', array(
        'default' => __('Testimonials', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_testimonials_title', array(
        'label' => __('Title', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_testimonials_section',
        'settings' => 'serenity_lite_onepage_testimonials_title',
    ));

    // Testimonials Title Divider Toggle
    $wp_customize->add_setting('serenity_lite_testimonials_section_title_divider_toggle', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_testimonials_section_title_divider_toggle',
        array(
            'label' => __('Hide title divider?', 'serenity-lite'),
            'description' => __('Check the box to disable the section title divider which appears between the title and subtitle.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_testimonials_section_title_divider_toggle',
            'type' => 'upgrade-feature',
        )
    ));

    // Testimonials Subtitle
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_subtitle', array(
        'default' => __('Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('serenity_lite_onepage_testimonials_subtitle', array(
        'label' => __('Subtitle', 'serenity-lite'),
        'type' => 'text',
        'section' => 'serenity_lite_onepage_testimonials_section',
        'settings' => 'serenity_lite_onepage_testimonials_subtitle',
    ));

    // Testimonials Layout
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_layout', array(
        'default' => '3',
        'sanitize_callback' => 'absint',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control('serenity_lite_onepage_testimonials_layout', array(
        'type' => 'select',
        'label' => __('Layout', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_testimonials_section',
        'settings' => 'serenity_lite_onepage_testimonials_layout',
        'description' => __('Set the number of logos/slides to display at once.', 'serenity-lite'),
        'choices' => array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
        ),
    ));

    // Testimonials Autoplay
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_autoplay', array(
        'default' => 'true',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('serenity_lite_onepage_testimonials_autoplay', array(
        'type' => 'select',
        'label' => __('Autplay', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_testimonials_section',
        'settings' => 'serenity_lite_onepage_testimonials_autoplay',
        'description' => __('Set whether the slider will automatically start playing once the page loads.', 'serenity-lite'),
        'choices' => array(
            'true' => 'Yes',
            'false' => 'No',
        ),
    ));

    // Testimonials Scroll
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_scroll', array(
        'default' => '3',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_testimonials_scroll', array(
        'type' => 'select',
        'label' => __('Scroll', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_testimonials_section',
        'settings' => 'serenity_lite_onepage_testimonials_scroll',
        'description' => __('Set the number of logos/slides to scroll.', 'serenity-lite'),
        'choices' => array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
        ),
    ));

    // Testimonials Speed
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_speed', array(
        'default' => '5',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('serenity_lite_onepage_testimonials_speed', array(
        'type' => 'select',
        'label' => __('Speed', 'serenity-lite'),
        'section' => 'serenity_lite_onepage_testimonials_section',
        'settings' => 'serenity_lite_onepage_testimonials_speed',
        'description' => __('Set the scroll speed of the slider.', 'serenity-lite'),
        'choices' => array(
            '1' => '1 second',
            '2' => '2 seconds',
            '3' => '3 seconds',
            '4' => '4 seconds',
            '5' => '5 seconds',
            '6' => '6 seconds',
            '7' => '7 seconds',
            '8' => '8 seconds',
            '9' => '9 seconds',
            '10' => '10 seconds',
        ),
    ));

    // Testimonials Color Scheme
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_scheme', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_testimonials_scheme',
        array(
            'label' => __('Color Scheme', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_onepage_testimonials_scheme',
            'description' => __('Select a Light or Dark color scheme for this section. Light = light color background with dark colored text. Dark = dark color or image background with light colored text.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Testimonials Background Color
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_bg_color', array(
        'default' => '#ea3d56',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
        'serenity_lite_onepage_testimonials_bg_color',
        array(
            'label' => __('Background Color', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_onepage_testimonials_bg_color'
        )
    ));

    // Team Members Background Image
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_bg_image', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_testimonials_bg_image',
        array(
            'label' => __('Background Image', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_onepage_testimonials_bg_image',
            'type' => 'upgrade-feature',
        )
    ));

    // Team Members Padding
    $wp_customize->add_setting('serenity_lite_onepage_testimonials_padding_top', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_testimonials_padding_top',
        array(
            'label' => __('Padding', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_onepage_testimonials_padding_top',
            'description' => __('Top - Select the top padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    $wp_customize->add_setting('serenity_lite_onepage_testimonials_padding_bottom', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_onepage_testimonials_padding_bottom',
        array(
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_onepage_testimonials_padding_bottom',
            'description' => __('Bottom - Select the bottom padding size for this section.', 'serenity-lite'),
            'type' => 'upgrade-feature',
        )
    ));

    // Testimonials Section Toggle
    $wp_customize->add_setting('serenity_lite_testimonials_section_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_testimonials_section_toggle',
        array(
            'label' => __('Disable', 'serenity-lite'),
            'description' => __('Check the box to disable this section.', 'serenity-lite'),
            'section' => 'serenity_lite_onepage_testimonials_section',
            'settings' => 'serenity_lite_testimonials_section_toggle',
            'type' => 'checkbox',
        )
    ));

    // Footer Settings//
    $wp_customize->add_section('serenity_lite_footer_settings', array(
        'title' => __('Footer', 'serenity-lite'),
        'priority' => 140,
        'description' => __('Configure settings for the site-wide footer.', 'serenity-lite'),
    ));

    // Footer Background Color
    $wp_customize->add_setting('serenity_lite_footer_bg_color', array(
        'default' => '#291734',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
        'serenity_lite_footer_bg_color',
        array(
            'label' => __('Footer Background Color', 'serenity-lite'),
            'section' => 'colors',
            'settings' => 'serenity_lite_footer_bg_color'
        )
    ));

    // Facebook URL
    $wp_customize->add_setting('serenity_lite_footer_fb_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serenity_lite_footer_fb_url', array(
        'label' => __('Facebook Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_footer_settings',
        'settings' => 'serenity_lite_footer_fb_url',
    ));

    // Twitter URL
    $wp_customize->add_setting('serenity_lite_footer_tt_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serenity_lite_footer_tt_url', array(
        'label' => __('Twitter Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_footer_settings',
        'settings' => 'serenity_lite_footer_tt_url',
    ));

    // Google Plus URL
    $wp_customize->add_setting('serenity_lite_footer_gp_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serenity_lite_footer_gp_url', array(
        'label' => __('Google Plus Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_footer_settings',
        'settings' => 'serenity_lite_footer_gp_url',
    ));

    // Linkedin URL
    $wp_customize->add_setting('serenity_lite_footer_li_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serenity_lite_footer_li_url', array(
        'label' => __('Linkedin Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_footer_settings',
        'settings' => 'serenity_lite_footer_li_url',
    ));

    // Instagram URL
    $wp_customize->add_setting('serenity_lite_footer_ig_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serenity_lite_footer_ig_url', array(
        'label' => __('Instagram Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_footer_settings',
        'settings' => 'serenity_lite_footer_ig_url',
    ));

    // Pinterest URL
    $wp_customize->add_setting('serenity_lite_footer_pt_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('serenity_lite_footer_pt_url', array(
        'label' => __('Pinterest Link', 'serenity-lite'),
        'type' => 'url',
        'section' => 'serenity_lite_footer_settings',
        'settings' => 'serenity_lite_footer_pt_url',
    ));

    // Footer Copyright Text
    $wp_customize->add_setting('serenity_lite_footer_copyright_text', array(
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(new Serenity_Lite_Upgrade_Feature_Control($wp_customize,
        'serenity_lite_footer_copyright_text',
        array(
            'label' => __('Copyright Text', 'serenity-lite'),
            'section' => 'serenity_lite_footer_settings',
            'settings' => 'serenity_lite_footer_copyright_text',
            'type' => 'upgrade-feature',
        )
    ));

    // Footer Toggle
    $wp_customize->add_setting('serenity_lite_footer_toggle', array(
        'sanitize_callback' => 'serenity_lite_sanitize_checkbox',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,
        'serenity_lite_footer_toggle',
        array(
            'label' => __('Disable Social Icons', 'serenity-lite'),
            'description' => __('Check the box to disable all the social icons in the footer.', 'serenity-lite'),
            'section' => 'serenity_lite_footer_settings',
            'settings' => 'serenity_lite_footer_toggle',
            'type' => 'checkbox',
        )
    ));
}
add_action( 'customize_register', 'serenity_lite_theme_customize_register' );

/**
 * Register Partial Edit Shortcuts
 */
function serenity_lite_register_partials( WP_Customize_Manager $wp_customize ) {
 
    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }
 
    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_hero_title1', array(
        'selector' => '.hero h1',
        'settings' => array( 'serenity_lite_onepage_hero_title1' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_hero_title1');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_hero_title2', array(
        'selector' => '.hero h2',
        'settings' => array( 'serenity_lite_onepage_hero_title2' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_hero_title2');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_hero_section_btn1', array(
        'selector' => '.hero .btn-light',
        'settings' => array( 'serenity_lite_onepage_hero_section_btn1' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_hero_section_btn1');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_hero_section_btn2', array(
        'selector' => '.hero .btn-primary',
        'settings' => array( 'serenity_lite_onepage_hero_section_btn2' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_hero_section_btn2');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_about_title', array(
        'selector' => '.about h2',
        'settings' => array( 'serenity_lite_onepage_about_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_about_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_about_subtitle', array(
        'selector' => '.about .lead',
        'settings' => array( 'serenity_lite_onepage_about_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_about_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_about_content', array(
        'selector' => '.about .content',
        'settings' => array( 'serenity_lite_onepage_about_content' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_about_content');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_blog_title', array(
        'selector' => '.blog h2.section-title',
        'settings' => array( 'serenity_lite_onepage_blog_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_blog_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_blog_subtitle', array(
        'selector' => '.blog .lead',
        'settings' => array( 'serenity_lite_onepage_blog_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_blog_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_blog_btn', array(
        'selector' => '.blog .btn-outline-primary',
        'settings' => array( 'serenity_lite_onepage_blog_btn' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_blog_btn');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_brands_title', array(
        'selector' => '.brands h2',
        'settings' => array( 'serenity_lite_onepage_brands_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_brands_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_brands_subtitle', array(
        'selector' => '.brands .lead',
        'settings' => array( 'serenity_lite_onepage_brands_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_brands_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_cta_title', array(
        'selector' => '.calltoaction h2',
        'settings' => array( 'serenity_lite_onepage_cta_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_cta_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_cta_subtitle', array(
        'selector' => '.calltoaction .lead',
        'settings' => array( 'serenity_lite_onepage_cta_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_cta_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_cta_btn', array(
        'selector' => '.calltoaction .btn',
        'settings' => array( 'serenity_lite_onepage_cta_btn' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_cta_btn');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_cta_above_btn_text', array(
        'selector' => '.calltoaction .above',
        'settings' => array( 'serenity_lite_onepage_cta_above_btn_text' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_cta_above_btn_text');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_features_title', array(
        'selector' => '.features h2',
        'settings' => array( 'serenity_lite_onepage_features_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_features_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_features_subtitle', array(
        'selector' => '.features .lead',
        'settings' => array( 'serenity_lite_onepage_features_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_features_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_gallery_title', array(
        'selector' => '.gallery h2',
        'settings' => array( 'serenity_lite_onepage_gallery_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_gallery_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_gallery_subtitle', array(
        'selector' => '.gallery .lead',
        'settings' => array( 'serenity_lite_onepage_gallery_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_gallery_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_newsletter_title', array(
        'selector' => '.newsletter h2',
        'settings' => array( 'serenity_lite_onepage_newsletter_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_newsletter_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_newsletter_subtitle', array(
        'selector' => '.newsletter .lead',
        'settings' => array( 'serenity_lite_onepage_newsletter_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_newsletter_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_services_title', array(
        'selector' => '.services h2',
        'settings' => array( 'serenity_lite_onepage_services_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_services_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_services_subtitle', array(
        'selector' => '.services .lead',
        'settings' => array( 'serenity_lite_onepage_services_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_services_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_services_content', array(
        'selector' => '.services .content',
        'settings' => array( 'serenity_lite_onepage_services_content' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_services_content');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_team_title', array(
        'selector' => '.team h2',
        'settings' => array( 'serenity_lite_onepage_team_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_team_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_team_subtitle', array(
        'selector' => '.team .lead',
        'settings' => array( 'serenity_lite_onepage_team_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_team_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_team_content', array(
        'selector' => '.team .content',
        'settings' => array( 'serenity_lite_onepage_team_content' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_team_content');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_testimonials_title', array(
        'selector' => '.testimonials h2',
        'settings' => array( 'serenity_lite_onepage_testimonials_title' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_testimonials_title');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_onepage_testimonials_subtitle', array(
        'selector' => '.testimonials .lead',
        'settings' => array( 'serenity_lite_onepage_testimonials_subtitle' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_onepage_testimonials_subtitle');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_footer_fb_url', array(
        'selector' => '.page-footer .fb',
        'settings' => array( 'serenity_lite_footer_fb_url' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_footer_fb_url');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_footer_tt_url', array(
        'selector' => '.page-footer .tt',
        'settings' => array( 'serenity_lite_footer_tt_url' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_footer_tt_url');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_footer_gp_url', array(
        'selector' => '.page-footer .gp',
        'settings' => array( 'serenity_lite_footer_gp_url' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_footer_gp_url');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_footer_li_url', array(
        'selector' => '.page-footer .li',
        'settings' => array( 'serenity_lite_footer_li_url' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_footer_li_url');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_footer_ig_url', array(
        'selector' => '.page-footer .ig',
        'settings' => array( 'serenity_lite_footer_ig_url' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_footer_ig_url');
        },
    ));

    $wp_customize->selective_refresh->add_partial('serenity_lite_footer_pt_url', array(
        'selector' => '.page-footer .pt',
        'settings' => array( 'serenity_lite_footer_pt_url' ),
        'render_callback' => function() {
            return get_theme_mod('serenity_lite_footer_pt_url');
        },
    ));
}
add_action( 'customize_register', 'serenity_lite_register_partials' );

/**
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 */
function serenity_lite_sanitize_checkbox( $checked ) {
    // Boolean check.
    return isset( $checked ) && true == $checked;
}

/**
 * Sanitization callback for 'select' type controls.
 */
function serenity_lite_wp_filter_nohtml_kses( $data ) {
    return addslashes( wp_kses( stripslashes( $data ), 'strip' ) );
}

/**
 * Output the styles from the customizer
 */
function serenity_lite_customizer_css() {
    ?>
    <style type="text/css">
        body .container {max-width: <?php echo esc_attr( get_theme_mod( 'serenity_lite_layout_content_width' ) ); ?>;}
        section.hero {
            background: url(<?php echo esc_url_raw( get_theme_mod( 'serenity_lite_onepage_hero_bg_image', get_template_directory_uri() . '/images/bg-hero.jpg' ) ); ?>) no-repeat center top;
            background-size: cover;
        }
        section.contact {background-color: <?php echo esc_attr( get_theme_mod( 'serenity_lite_onepage_contact_bg_color', '#291734' ) ); ?>;}
        section.testimonials {background-color: <?php echo esc_attr( get_theme_mod( 'serenity_lite_onepage_testimonials_bg_color', '#ea3d56' ) ); ?>;}
        section.newsletter {background-color: <?php echo esc_attr( get_theme_mod( 'serenity_lite_onepage_newsletter_bg_color', '#ecf2ff' ) ); ?>;}
        section.calltoaction {
            background: url(<?php echo esc_url_raw( get_theme_mod( 'serenity_lite_onepage_cta_bg_image', get_template_directory_uri() . '/images/bg-cta.jpg' ) ); ?>) no-repeat center top;
            background-size: cover;
        }
        section.calltoaction .blacklayer {
            background-color: <?php echo esc_attr( get_theme_mod( 'serenity_lite_onepage_cta_bg_color', '#2F5BE7' ) ); ?>;
            opacity: 0.95;
        }
        .page-footer {background-color: <?php echo esc_attr( get_theme_mod( 'serenity_lite_footer_bg_color', '#291734' ) ); ?>;}
    </style>
    <?php
}
add_action( 'wp_head', 'serenity_lite_customizer_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function serenity_lite_customize_preview_js() {
    wp_enqueue_script( 'serenity_lite_customizer_preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'serenity_lite_customize_preview_js' );