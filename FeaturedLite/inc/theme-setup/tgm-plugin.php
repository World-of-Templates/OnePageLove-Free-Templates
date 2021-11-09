<?php

/**
 * tgm plugin installation and activation
 *
 * @param  
 * @return mixed|string
 */
require_once( get_template_directory() . '/class-tgm-plugin-activation.php' );
add_action('after_setup_theme', 'featuredlite_register_required_plugins');
function featuredlite_register_required_plugins()
{
	       $plugins = array(
             array(
                'name' => __('Themehunk Customizer','featuredlite'),
                'slug' => 'themehunk-customizer', 
                'required' => false,            ),
            array(
                'name' => __('Lead Form Builder','featuredlite'),
                'slug' => 'lead-form-builder', 
                'required' => false 
            ),
             array(
                'name' => __('Woocommerce','featuredlite'),
                'slug' => 'woocommerce', 
                'required' => false,  )
        );

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'featuredlite'),
            'menu_title' => __('Install Plugins', 'featuredlite'),
            'installing' => __('Installing Plugin: %s', 'featuredlite'),
            'oops' => __('Something went wrong with the plugin API.', 'featuredlite'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','featuredlite'),
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','featuredlite'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','featuredlite'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','featuredlite'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','featuredlite'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','featuredlite'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','featuredlite'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','featuredlite'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','featuredlite'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','featuredlite'),
            'return' => __('Return to Required Plugins Installer', 'featuredlite'),
            'plugin_activated' => __('Plugin activated successfully.', 'featuredlite'),
            'complete' => __('All plugins installed and activated successfully. %s', 'featuredlite'),
            'nag_type' => 'updated'
        )
    );
    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'featuredlite_register_required_plugins');

?>