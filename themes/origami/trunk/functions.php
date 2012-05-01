<?php

define('THEME_NAME', 'origami');
define('THEME_VERSION', 'trunk');

require_once(dirname(__FILE__).'/origin/Origin.php');
require_once(dirname(__FILE__).'/options.php');

Origin::single()->load_plugin('firstrun');

Origin::single()->grid;

add_theme_support( 'post-formats', array( 'gallery', 'image', 'video' , 'aside', 'link', 'quote', 'status') );
add_theme_support( 'post-thumbnails');
add_theme_support( 'automatic-feed-links' );


global $content_width;
if ( ! isset( $content_width ) ) $content_width = 980;

// Set up the image sizes
add_image_size('origami-slider', 904, 460, true);

set_post_thumbnail_size(900,300,true);
add_image_size('thumbnail-mobile', 480, 420, true);

/**
 * Initialize everything for the theme.
 *
 * @action init
 */
function origami_init(){
	add_post_type_support('post', 'origin-video');

	register_nav_menu( 'primary', 'Primary Menu' );

	register_sidebar( array(
		'id'          => 'site-footer',
		'name'        => __( 'Footer', 'origami' ),

		'before_widget' => '<div id="%1$s" class="cell widget %2$s">',
		'after_widget'  => '</div>',
	));

	wp_register_style('origin', get_template_directory_uri().'/origin.css', array(), THEME_VERSION);
}
add_action('init', 'origami_init');

/**
 * Enqueue Origami's scripts
 * 
 * @action 
 * @return void
 */
function origami_enqueue_scripts(){
	if(is_admin()) return;

	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.js', array(), '2.0.6');
	wp_enqueue_script('origami', get_template_directory_uri().'/js/origami.js', array('jquery', 'modernizr'), THEME_VERSION);
	wp_enqueue_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), '1.0');
	
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '1.8');
	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', array(), '1.8');

	wp_localize_script('origami', 'origami', array(
		'polyfills' => get_template_directory_uri().'/js/polyfills'
	));
}
add_action('wp_enqueue_scripts', 'origami_enqueue_scripts');

/**
 * Add post metaboxes
 * 
 * @action add_meta_boxes
 */
function origami_add_meta_boxes(){
	// Add the column metaboxes
	add_meta_box('post-columns', __('Columns', 'origin'), 'origami_render_metabox_columns', 'post', 'side');
	add_meta_box('post-columns', __('Columns', 'origin'), 'origami_render_metabox_columns', 'page', 'side');
}
add_action('add_meta_boxes', 'origami_add_meta_boxes');

/**
 * Render the columns metabox.
 */
function origami_render_metabox_columns(){
	global $post;
	$columns = get_post_meta($post->ID, 'content_columns', true);
	if(empty($columns)) $columns = 2;
	include(dirname(__FILE__).'/admin/metabox-columns.php');
}

/**
 * Save the post
 * 
 * @action save_post
 */
function origami_save_post($post_id){
	if(!isset($_REQUEST['_wpnonce_cm']) || !wp_verify_nonce($_REQUEST['_wpnonce_cm'], 'save-columns')) return;
	if(!current_user_can('edit_post', $post_id)) return;

	update_post_meta($post_id, 'content_columns', intval($_REQUEST['content_columns']));
}
add_action('save_post', 'origami_save_post');

function origami_first_post_date(){
	$first = get_posts(array(
		'numberposts' => 1,
		'order' => 'ASC',
		'post_type' => null
	));

	if(empty($first)) return time();
	else return strtotime($first[0]->post_date);
}

/**
 * Displays some stuff in the footer
 * 
 * @action wp_footer
 */
function origami_footer(){
	$analytics = Origin::single()->options->get('general', 'analytics');
	if(!empty($analytics)) print $analytics;
}
add_action('wp_print_footer_scripts', 'origami_footer');

/***********************************************************************************************************************
 * Pluggable Functions
 */

if(!function_exists('siteorigin_google_font_families')) :
	/**
	 * Enqueue any web fonts used by this theme.
	 *
	 * Override this in your child themes if you want to use different fonts.
	 *
	 * @param array $families
	 * @return array
	 */
	function siteorigin_google_font_families($families){
		return array_merge($families, array(
			'Dosis:200'
		));
	}
endif;
add_filter('google_font_families', 'siteorigin_google_font_families');

if(!function_exists('siteorigin_attribution_footer')):
	/**
	 * Renders the theme attribution. This is used in your site's footer.
	 *
	 * You can override this in your child theme to remove the attribution, but it'd be really cool if you left it in :) If
	 * you decide to remove it, please show your support in other ways. Like by telling people about our free themes.
	 *
	 * @param string $before Displayed before the attribution link
	 * @param string $after Displayed after the attribution link
	 */
	function siteorigin_attribution_footer($before, $after){
		print $before;
		printf(__('Powered By %s', 'origami'), '<a href="http://wordpress.org" rel="generator">WordPress</a>');
		print ' - ';
		printf(__('Theme By %s', 'origami'), '<a href="http://siteorigin.com" rel="designer">SiteOrigin</a>');
		print $after;
	}
endif;