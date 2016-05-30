<?php

/**
 * Add some plugins to TGM plugin activation
 */
function origami_recommended_plugins(){
	$plugins = array(
		array(
			'name'      => __('SiteOrigin Page Builder', 'origami'),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'tgmpa-origami',         // Unique ID for hashing notices for multiple instances of TGMPA.
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
add_action( 'tgmpa_register', 'origami_recommended_plugins' );