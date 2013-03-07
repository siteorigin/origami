<?php

define('SITEORIGIN_THEME_VERSION', 'trunk');
define('SITEORIGIN_THEME_ENDPOINT', 'http://siteorigin.dynalias.com');

// Include premium functions if it exists
if(file_exists(get_template_directory().'/premium/functions.php')){
	include get_template_directory().'/premium/functions.php';
}

// Include all the SiteOrigin extras
if(!defined('SITEORIGIN_IS_PREMIUM')) {
	include get_template_directory().'/upgrade/upgrade.php';
}

include get_template_directory().'/extras/premium/premium.php';
include get_template_directory().'/extras/settings/settings.php';
include get_template_directory().'/extras/update/update.php';
include get_template_directory().'/extras/adminbar/adminbar.php';
include get_template_directory().'/extras/widgets/widgets.php';
if(!defined('SITEORIGIN_PANELS_VERSION')) include get_template_directory().'/extras/panels/panels.php';

include get_template_directory().'/functions/settings.php';
include get_template_directory().'/functions/gallery.php';
include get_template_directory().'/functions/layouts.php';


if(!function_exists('origami_setup')) :
/**
 * Setup Origami.
 * 
 * @action after_setup_theme
 */
function origami_setup(){
	siteorigin_settings_init();

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 904;
	
	// Load the text domains
	load_theme_textdomain( 'origami', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	
	// Origami supports post formats
	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video' , 'aside', 'link', 'quote', 'status', 'chat') );
	
	// Origami supports post thumbnails
	add_theme_support( 'post-thumbnails');
	
	// Create the primary menu area
	register_nav_menu( 'primary', __( 'Primary Menu', 'origami' ) );

	// Add support for custom backgrounds.
	add_theme_support( 'custom-background' , array(
		'default-color' => 'f0eeeb',
		'default-image' => get_template_directory_uri().'/images/bg.png'
	));
	
	// Use custom headers for site logo
	add_theme_support( 'custom-header' , array(
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => false,
	));
	
	add_editor_style();
	
	// Set up the image sizes
	set_post_thumbnail_size(904,400,true);
	add_image_size('post-thumbnail-mobile', 480, 420, true);
	add_image_size('post-thumbnail-full', 904, 904, false);
	add_image_size('origami-slider', 904, 500, true);

	/**
	 * Support panels
	 */
	add_theme_support( 'siteorigin-panels', array(
		'margin-bottom' => 30,
		'responsive' => true,
		'home-page' => true,
		'home-page-default' => false,
	) );
}
endif;
add_action('after_setup_theme', 'origami_setup');


if(!function_exists('origami_widgets_init')) :
/**
 * Registers Origami's Sidebars
 * 
 * @action register_sidebar
 */
function origami_widgets_init(){
	register_sidebar( array(
		'id'          => 'site-footer',
		'name'        => __( 'Footer', 'origami' ),
		'before_widget' => '<div id="%1$s" class="cell widget %2$s">',
		'after_widget'  => '</div>',
	));

	register_widget( 'SiteOrigin_Widgets_CTA' );
	register_widget( 'SiteOrigin_Widgets_Button' );
	register_widget( 'SiteOrigin_Widgets_Headline' );
	register_widget( 'SiteOrigin_Widgets_Gallery' );
	register_widget( 'SiteOrigin_Widgets_IconText' );
	register_widget( 'SiteOrigin_Widgets_Image' );
	register_widget( 'SiteOrigin_Widgets_PostContent' );
}
endif;
add_action('widgets_init', 'origami_widgets_init');


if(!function_exists('origami_title')) :
/**
 * Give Origami a nice title.
 * 
 * @param string $title The starting title
 * @param $sep
 * @param $seplocation
 * @return string
 * 
 * @filter wp_title
 */
function origami_title($title, $sep, $seplocation){
	global $page, $paged;

	// Add the blog name.
	$title = $title.get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= ' | ' . sprintf( __( 'Page %s', 'origami' ), max( $paged, $page ) );

	return $title;
}
endif;
add_filter('wp_title', 'origami_title', 10, 3);


if(!function_exists('origami_enqueue_scripts')) :
/**
 * Enqueue Origami's scripts
 * 
 * @action 
 * @return void
 */
function origami_enqueue_scripts(){
	wp_enqueue_style('origami', get_stylesheet_uri(), array(), SITEORIGIN_THEME_VERSION);
	
	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.js', array(), '2.0.6');
	wp_enqueue_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), '1.0');
	wp_enqueue_script('origami', get_template_directory_uri().'/js/origami.js', array('jquery', 'modernizr'), SITEORIGIN_THEME_VERSION);
	
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '1.8');
	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', array(), '1.8');

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	wp_localize_script('origami', 'origami', array(
		'polyfills' => get_template_directory_uri().'/js/polyfills'
	));
}
endif;
add_action('wp_enqueue_scripts', 'origami_enqueue_scripts');


if(!function_exists('origami_add_meta_boxes')) :
/**
 * Add post metaboxes
 * 
 * @action add_meta_boxes
 */
function origami_add_meta_boxes(){
	// Add the column metaboxes to posts and pages
	add_meta_box('post-columns', __('Columns', 'origami'), 'origami_render_metabox_columns', 'post', 'side');
	add_meta_box('post-columns', __('Columns', 'origami'), 'origami_render_metabox_columns', 'page', 'side');
}
endif;
add_action('add_meta_boxes', 'origami_add_meta_boxes');


if(!function_exists('origami_render_metabox_columns')) :
/**
 * Render the columns metabox.
 */
function origami_render_metabox_columns(){
	get_template_part('admin/metabox', 'columns');
}
endif;


if(!function_exists('origami_save_post')) :
/**
 * Save the post
 * 
 * @action save_post
 */
function origami_save_post($post_id){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if(!current_user_can('edit_post', $post_id)) return;
	if(!isset($_REQUEST['content_columns'])) return;

	update_post_meta($post_id, 'content_columns', intval($_REQUEST['content_columns']));
}
endif;
add_action('save_post', 'origami_save_post');


if(!function_exists('origami_google_webfonts')) :
/**
 * This just displays the Google web fonts
 */
function origami_enqueue_google_webfonts(){
	if(!get_header_image()){
		// Enqueue the logo font as well
		wp_enqueue_style('google-webfonts', 'http://fonts.googleapis.com/css?family=Terminal+Dosis:200,400');
	}
	else{
		// Enqueue only the text fonts that we need
		wp_enqueue_style('google-webfonts', 'http://fonts.googleapis.com/css?family=Terminal+Dosis:400');
	}
}
endif;
add_action('wp_enqueue_scripts', 'origami_enqueue_google_webfonts');


if(!function_exists('origami_attribution_footer')) :
/**
 * Renders the theme attribution. This is used in your site's footer.
 *
 * You can override this in your child theme to remove the attribution, but it'd be really cool if you left it in :) If
 * you decide to remove it, please show your support in other ways. Like by telling people about our free themes.
 *
 * @param string $before Displayed before the attribution link
 * @param string $after Displayed after the attribution link
 */
function origami_attribution_footer($before, $after){
	if(!siteorigin_setting('display_attribution')) return false;
	
	print $before;
	printf(__('Powered By %s', 'origami'), '<a href="http://wordpress.org">WordPress</a>');
	print ' - ';
	printf(__('Theme By %s', 'origami'), '<a href="http://siteorigin.com">SiteOrigin</a>');
	print $after;
}
endif;


if(!function_exists('origami_comment')) :
/**
 * Display a comment
 * 
 * @param $comment The comment
 * @param $args The arguments
 * @param $depth The depth
 */
function origami_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-wrapper">
			<?php $type = get_comment_type($comment->comment_ID); ?>
			<?php if($type == 'comment') : ?>
			<div class="avatar-container">
				<?php echo get_avatar(get_comment_author_email(), $depth == 1 ? 60 : 45) ?>
			</div>
			<?php endif; ?>
	
			<div class="comment-container">
				<?php if($depth <= $args['max_depth']) : ?>
					<?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])) ?>
				<?php endif; ?>
	
				<div class="info">
					<span class="author"><?php comment_author_link() ?></span>
					<span class="date"><?php comment_date() ?></span>
				</div>
	
				<div class="comment-content content">
					<?php comment_text() ?>
				</div>
			</div>
	
			<div class="clear"></div>
		</div>
	<?php
}
endif;


if(!function_exists('origami_footer_widget_params')) :
/**
 * Filter the footer widgets to add widths.
 * 
 * @param $params
 * @return mixed
 */
function origami_footer_widget_params($params){
	return $params;
	
	// Check that this is the footer
	if($params[0]['id'] != 'site-footer') return $params;

	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']);

	return $params;
}
endif;
add_action('dynamic_sidebar_params', 'origami_footer_widget_params');


if(!function_exists('origami_content_filter')):
/**
 * Filter the content for certain post formats
 * @param $content
 * @return mixed
 */
function origami_content_filter($content){
	global $post;
	switch(get_post_format($post->ID)){
		case 'chat':
			$content = preg_replace('/(.*)\:/', '<strong>$1</strong>: ', $content);
	}
	
	return $content;
}
endif;
add_filter('the_content', 'origami_content_filter', 8);

function origami_print_styles(){
	// Create the footer widget CSS
	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets['site-footer']);
	$count = max($count,1);
	
	?>
	<style type="text/css" media="screen">
		.content a { color: <?php echo strip_tags(siteorigin_setting('colors_link_color')) ?>; }
		#page-container { border-color: <?php echo strip_tags(siteorigin_setting('colors_page_border_color')) ?>; }
		#footer-widgets .widget { width: <?php echo round(100/$count,5) ?>%; }
		#footer { color: <?php echo strip_tags(siteorigin_setting('colors_footer_text')) ?>; }
		#footer a { color: <?php echo strip_tags(siteorigin_setting('colors_footer_link')) ?>; }
	</style>
	<?php
}
add_action('wp_head', 'origami_print_styles', 11);

if(!function_exists('origami_html_shiv')) :
/**
 * Display the HTML5 shiv code
 */
function origami_html_shiv(){
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->
	<?php
}
endif;
add_action('wp_head', 'origami_html_shiv', 15);

if(!function_exists('so_setting')) :
/**
 * This is a wrapper for siteorigin_setting to support legacy child themes.
 *
 * @param $name
 * @param null $default
 * @return mixed
 */
function so_setting($name, $default = null){
	return siteorigin_setting($name, $default);
}
endif;

function origami_post_class_columns($classes, $class, $post_id){
	if(!siteorigin_setting('display_use_columns')) return $classes;
	if(is_page() && get_post_meta(get_the_ID(), 'panels_data')) return $classes;
	if(siteorigin_panels_is_home()) return $classes;
	
	
	$columns = get_post_meta($post_id, 'content_columns', true);
	if(!empty($columns)) $classes[] = 'content-columns-'.$columns;
	return $classes;
}
add_filter('post_class', 'origami_post_class_columns', 10, 3);