<?php

define('SO_IS_PREMIUM', true);

require_once(get_stylesheet_directory().'/premium/settings.php');

// Include all the premium extras
require_once(get_stylesheet_directory().'/premium/extras/share/share.php');
require_once(get_stylesheet_directory().'/premium/extras/css/css.php');
require_once(get_stylesheet_directory().'/premium/extras/ajax-comments/ajax-comments.php');
require_once(get_stylesheet_directory().'/premium/extras/responsive-widgets/responsive-widgets.php');

/**
 * Setup Origami Premium. Runs after Origami is set up.
 * 
 * @action after_setup_theme
 */
function origami_premium_setup(){
	// Activate all the extras
	if(so_setting('comments_ajax')) so_ajax_comments_activate();
	if(so_setting('responsive_footer')) so_responsive_widget_activate('site-footer', '#footer-widgets .widget');
	if(so_setting('social_share')) so_share_activate();
}
add_action('after_setup_theme', 'origami_premium_setup', 11);

/**
 * Enqueue Origami Premium scripts
 */
function origami_premium_enqueue(){
	wp_enqueue_style('origami-premium', get_stylesheet_directory_uri().'/premium/premium.css', array(), SO_THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'origami_premium_enqueue');

/**
 * Create the stylesheet URL
 */
function origami_premium_filter_stylesheet_url(){
	return get_template_directory_uri().'/style.css';
}
add_filter('stylesheet_uri', 'origami_premium_filter_stylesheet_url', 10, 2);

