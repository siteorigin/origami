<?php

require_once(dirname(__FILE__).'/origin/Origin.php');
require_once(dirname(__FILE__).'/origin/plugins/maintenance/maintenance.php');
require_once(dirname(__FILE__).'/origin/plugins/video/video.php');

Origin::single()->set_theme_name('origami');
Origin::single()->image->set_overlay_server('http://overlay.siteorigin.com');
Origin::single()->settings->load_files(dirname(__FILE__).'/conf');
Origin::single()->grid;

Origin::single()->update->activate();
Origin::single()->update->force_update_check();

add_theme_support( 'post-formats', array( 'gallery', 'image', 'video' ) );
add_theme_support( 'post-thumbnails');

class OrigamiController extends Origin_Controller {
	function __construct(){
		parent::__construct(false, 'theme_method');
	}
	
	public static function single(){
		return parent::single(__CLASS__);
	}
	
	/**
	 * Get this object's settings
	 * @return array
	 */
	public function get_settings(){
		global $origami_settings;
		if(empty($origami_settings))
			$origami_settings = (array) get_option('origami_settings', self::default_settings());
		
		return $origami_settings;
	}
	
	//////////////////////////////////////////////////////////////////
	// Action Handlers
	//////////////////////////////////////////////////////////////////
	
	function action_init(){
		add_post_type_support('post', 'origin-video');
		
		register_nav_menu( 'primary', 'Primary Menu' );
		
		register_sidebar( array(
			'id'          => 'site-footer',
			'name'        => __( 'Footer', 'origami' ),
			
			'before_widget' => '<div id="%1$s" class="cell widget %2$s">',
			'after_widget'  => '</div>',
		));
	}
	
	/**
	 * Enqueue scripts
	 */
	function action_wp_enqueue_scripts(){
		if(is_admin()) return;
		
		// Import some default Origin styling
		wp_enqueue_style('origin-content', get_template_directory_uri().'/origin/templates/content/standard.css');
		wp_enqueue_style('origin-comments', get_template_directory_uri().'/origin/templates/comments/standard/style.css');
		
		wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.js');
		wp_enqueue_script('origami', get_template_directory_uri().'/js/origami.js', array('jquery', 'modernizr'));
		wp_enqueue_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'));
		wp_enqueue_script('blueberry', get_template_directory_uri().'/js/jquery.blueberry.js', array('jquery'));
		wp_enqueue_style('blueberry', get_template_directory_uri().'/css/blueberry.css');
		
		wp_localize_script('origami', 'origami', array(
 			'polyfills' => get_template_directory_uri().'/js/polyfills'
		));
	}
	
	//////////////////////////////////////////////////////////////////
	// The settings page
	//////////////////////////////////////////////////////////////////
	
	/**
	 * Add the settings page
	 */
	function action_admin_menu(){
		add_theme_page(__('Origami Settings', 'origami'), __('Origami Settings', 'origami'), 'edit_theme_options', 'origami-settings', array(__CLASS__, 'page_settings'));
	}
	
	/**
	 * @return array The default settings.
	 */
	static function default_settings(){
		return array(
			'display' => array(
				'post_author' => true,
				'post_tags' => true,
				'post_categories' => true,
				'comment_counts' => true,
			)
		);
	}
	
	/**
	 * Render the settings page
	 */
	static function page_settings(){
		if(isset($_REQUEST['_wpnonce']) && wp_verify_nonce($_REQUEST['_wpnonce'], 'origami-settings')){
			update_option('origami_settings', array(
				'display' => array(
					'post_author' => isset($_REQUEST['post_author']),
					'post_tags' => isset($_REQUEST['post_tags']),
					'post_categories' => isset($_REQUEST['post_categories']),
					'comment_counts' => isset($_REQUEST['comment_counts']),
				)
			));
			?><div id="setting-error-settings_updated" class="updated settings-error"><p><strong><?php _e('Settings saved', 'origami') ?></strong></p></div><?php
		}
		
		$settings = (array) get_option('origami_settings', self::default_settings());
		
		include(dirname(__FILE__).'/admin/page-settings.php');
	}
	
	//////////////////////////////////////////////////////////////////
	// Column count meta box
	//////////////////////////////////////////////////////////////////
	
	function action_add_meta_boxes(){
		add_meta_box('post-columns', __('Columns', 'origin'), array(__CLASS__, 'metabox_columns'), 'post', 'side');
		add_meta_box('post-columns', __('Columns', 'origin'), array(__CLASS__, 'metabox_columns'), 'page', 'side');
	}
	
	function action_save_post($post_id){
		if(!isset($_REQUEST['_wpnonce_cm']) || !wp_verify_nonce($_REQUEST['_wpnonce_cm'], 'save-columns')) return;
		if(!current_user_can('edit_post', $post_id)) return;
		
		update_post_meta($post_id, 'content_columns', intval($_REQUEST['content_columns']));
	}
	
	function metabox_columns(){
		global $post;
		$columns = get_post_meta($post->ID, 'content_columns', true);
		if(!$columns) $columns = 2;
		include(dirname(__FILE__).'/admin/metabox-columns.php');
	}
	
	//////////////////////////////////////////////////////////////////
	// Support Functions
	//////////////////////////////////////////////////////////////////
	
	function first_post_date(){
		$first = get_posts(array(
			'numberposts' => 1,
			'order' => 'ASC',
			'post_type' => null
		));
		
		if(empty($first)) return time();
		else return strtotime($first[0]->post_date);
	}
}

OrigamiController::single();