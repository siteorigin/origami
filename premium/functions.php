<?php

define('SITEORIGIN_IS_PREMIUM', true);

include get_template_directory().'/premium/functions/settings.php';
include get_template_directory().'/premium/functions/gallery.php';

// Include all the premium extras
include get_template_directory().'/premium/extras/mobilenav/mobilenav.php';
include get_template_directory().'/premium/extras/panels/panels.php';
include get_template_directory().'/premium/extras/share/share.php';
include get_template_directory().'/premium/extras/css/css.php';
include get_template_directory().'/premium/extras/ajax-comments/ajax-comments.php';
include get_template_directory().'/premium/extras/responsive-widgets/responsive-widgets.php';
include get_template_directory().'/premium/extras/widgets/widgets.php';

/**
 * Setup Origami Premium. Runs after Origami is set up.
 * 
 * @action after_setup_theme
 */
function origami_premium_setup(){
	// Activate all the extras
	if(siteorigin_setting('comments_ajax')) siteorigin_ajax_comments_activate();
	if(siteorigin_setting('responsive_footer')) siteorigin_responsive_widget_activate('site-footer', '#footer-widgets .widget');
	if(siteorigin_setting('responsive_nav')) add_theme_support('siteorigin-mobilenav');
	if(siteorigin_setting('social_share')) siteorigin_share_activate();
}
add_action('after_setup_theme', 'origami_premium_setup', 11);

/**
 * Enqueue Origami Premium scripts
 */
function origami_premium_enqueue(){
	wp_enqueue_style('origami-premium', get_template_directory_uri().'/premium/premium.css', array(), SITEORIGIN_THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'origami_premium_enqueue');

/**
 * Create the stylesheet URL
 */
function origami_premium_filter_stylesheet_url(){
	return get_template_directory_uri().'/style.css';
}
add_filter('stylesheet_uri', 'origami_premium_filter_stylesheet_url', 10, 2);

/**
 * Register all widgets
 */
function origami_premium_widgets_init() {
	register_widget( 'SiteOrigin_Widgets_GoogleMap' );
	register_widget( 'SiteOrigin_Widgets_Video' );
	//register_widget( 'SiteOrigin_Widgets_List' );
	//register_widget( 'SiteOrigin_Widgets_CF7' );
}

add_action( 'widgets_init', 'origami_premium_widgets_init' );