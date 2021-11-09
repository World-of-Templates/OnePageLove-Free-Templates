<?php
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'ministudio_register_required_plugins' );
function ministudio_register_required_plugins() {
	
	$plugins = array(
		
		// Woocommerce
		array(
			'name'		=> esc_html__( 'WooCommerce', 'ministudio' ),
			'slug'		=> 'woocommerce',
			'required'	=> false
		),

		// Contact Form 7
		array(
			'name'		=> esc_html__( 'Contact Form 7', 'ministudio' ),
			'slug'		=> 'contact-form-7',
			'required'	=> false
		),

	);

	$config = array(
		'id'           => 'ministudio',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}