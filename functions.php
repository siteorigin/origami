<?php

define('SITEORIGIN_THEME_VERSION', 'dev');
define('SITEORIGIN_THEME_JS_PREFIX', '');

include get_template_directory() . '/inc/settings/settings.php';
include get_template_directory() . '/inc/customizer/customizer.php';

include get_template_directory() . '/inc/widgets.php';
include get_template_directory() . '/inc/settings.php';
include get_template_directory() . '/inc/customizer.php';
include get_template_directory() . '/inc/gallery.php';
include get_template_directory() . '/inc/panels.php';
include get_template_directory() . '/inc/legacy.php';

if ( is_admin() && ! class_exists( 'SiteOrigin_Installer' ) ) {
	include plugin_dir_path( __FILE__ ) . 'inc/installer/siteorigin-installer.php';
}

/**
 * Jetpack compatibility.
 */
if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if(!function_exists('origami_setup')) :
/**
 * Setup Origami.
 * 
 * @action after_setup_theme
 */
function origami_setup(){
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
	$background = array(
		'default-color' => 'f0eeeb',
		'default-image' => get_template_directory_uri().'/images/bg.png'
	);
	$background = apply_filters('origami_custom_background', $background);
	add_theme_support( 'custom-background', $background);

	// Use custom headers for site logo
	add_theme_support( 'custom-header' , array(
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => false,
	));

	add_theme_support( "title-tag" );

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

	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	if( siteorigin_setting('responsive_nav') ) {
		include get_template_directory().'/inc/mobilenav/mobilenav.php';
	}
}
endif;
add_action('after_setup_theme', 'origami_setup');


function origami_siteorigin_premium_support(){
	// This theme supports the no attribution addon
	add_theme_support( 'siteorigin-premium-no-attribution', array(
		'filter'  => 'siteorigin_attribution_footer',
		'enabled' => siteorigin_setting( 'display_attribution' ),
		'siteorigin_setting' => 'display_attribution'
	) );

	// This theme supports the ajax comments addon
	add_theme_support( 'siteorigin-premium-ajax-comments', array(
		'enabled' => siteorigin_setting( 'comments_ajax' ),
		'siteorigin_setting' => 'comments_ajax'
	) );
}
add_action( 'after_setup_theme', 'origami_siteorigin_premium_support' );

if ( ! function_exists( 'origami_filter_mobilenav_collapse' ) ) :
function origami_filter_mobilenav_collapse( $collpase ) {
	return siteorigin_setting( 'responsive_menu_collapse' );
}
endif;
add_filter( 'siteorigin_mobilenav_resolution', 'origami_filter_mobilenav_collapse' );

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
	) );

	register_widget( 'SiteOrigin_Widgets_CTA' );
	register_widget( 'SiteOrigin_Widgets_Button' );
	register_widget( 'SiteOrigin_Widgets_Headline' );
	register_widget( 'SiteOrigin_Widgets_IconText' );
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

	if ( is_feed() ) return $title;

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


if ( ! function_exists( 'origami_enqueue_scripts' ) ) :
/**
 * Enqueue Origami's scripts.
 * 
 * @action 
 * @return void
 */
function origami_enqueue_scripts() {
	wp_enqueue_style( 'origami', get_stylesheet_uri(), array(), SITEORIGIN_THEME_VERSION );

	wp_enqueue_script( 'origami', get_template_directory_uri() . '/js/origami' . SITEORIGIN_THEME_JS_PREFIX . '.js', array( 'jquery' ), SITEORIGIN_THEME_VERSION );

	if ( ! class_exists( 'Jetpack' ) && siteorigin_setting( 'responsive_fitvids' ) ) {
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids' . SITEORIGIN_THEME_JS_PREFIX . '.js', array( 'jquery' ), '1.0' );
		wp_localize_script(
			'origami',
			'origami', array(
				'fitvids' => true,
			)
		);
	}

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider' . SITEORIGIN_THEME_JS_PREFIX . '.js', array( 'jquery' ), '2.1' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '2.0' );

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
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


if(!function_exists('origami_enqueue_google_webfonts')) :
/**
 * This just displays the Google web fonts
 */
function origami_enqueue_google_webfonts(){

	if( ! get_header_image() ){
		// Enqueue the logo font as well (Terminal Dosis 200)
		wp_enqueue_style('google-webfonts', '//fonts.googleapis.com/css?family=Terminal+Dosis:200,400');
	}
	else{
		// Enqueue only the text fonts that we need
		wp_enqueue_style('google-webfonts', '//fonts.googleapis.com/css?family=Terminal+Dosis:400');
	}

}
endif;
add_action('wp_enqueue_scripts', 'origami_enqueue_google_webfonts');


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
	$count = isset($sidebars_widgets['site-footer']) ? count($sidebars_widgets['site-footer']) : 1;
	$count = max($count,1);

	?>
	<style type="text/css" media="screen">
		#footer-widgets .widget { width: <?php echo round(100/$count,3) . '%' ?>; }
		@media screen and (max-width: 640px) {
			#footer-widgets .widget { width: auto; float: none; }
		}
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
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/selectivizr.js"></script>
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

function origami_post_class_filter( $classes ){
	// Resolves structured data issue in core. See https://core.trac.wordpress.org/ticket/28482
	if( is_page() ){
		$class_key = array_search( 'hentry', $classes );
		if( $class_key !== false) {
			unset( $classes[ $class_key ] );
		}
	}

	// Set up the post columns
	if( siteorigin_setting( 'display_use_columns' ) ){
		if( is_page() && get_post_meta( get_the_ID(), 'panels_data' ) ) return $classes;
		if( function_exists( 'siteorigin_panels_is_home' ) && siteorigin_panels_is_home() ) return $classes;

		$columns = get_post_meta( get_the_ID(), 'content_columns', true );
		if( !empty( $columns ) ) $classes[] = 'content-columns-' . $columns;
	}
	return $classes;
}
add_filter( 'post_class', 'origami_post_class_filter', 10 );

/**
 * Update widget classes to use panels built in widgets.
 * 
 * @param $data
 * @return mixed
 */
function origami_siteorigin_panels_data($data){
	if(empty($data['widgets'])) return $data;
	
	foreach($data['widgets'] as $i => $d){
		if(!empty($d['info']['class'])){
			switch($d['info']['class']){
				case 'SiteOrigin_Widgets_Gallery':
					$data['widgets'][$i]['info']['class'] = 'SiteOrigin_Panels_Widgets_Gallery';
					break;

				case 'SiteOrigin_Widgets_Image':
					$data['widgets'][$i]['info']['class'] = 'SiteOrigin_Panels_Widgets_Image';
					break;
				
				case 'SiteOrigin_Widgets_PostContent':
					$data['widgets'][$i]['info']['class'] = 'SiteOrigin_Panels_Widgets_PostContent';
					break;
			}
		}
	}
	return $data;
}
add_filter('siteorigin_panels_data', 'origami_siteorigin_panels_data');

/**
 * This overwrites the show on front setting when we're displaying the blog archive page.
 *
 * @param $r
 * @return bool
 */
function origami_filter_show_on_front($r){
	/**
	 * @var WP_Query
	 */
	global $origami_is_blog_archive;
	if( !empty($origami_is_blog_archive) ) {
		return false;
	}
	else return $r;
}
add_filter('option_show_on_front', 'origami_filter_show_on_front');

/**
 * Sets when we're displaying the blog archive page.
 *
 * @param $new
 */
function origami_set_is_blog_archive($new) {
	global $origami_is_blog_archive;
	$origami_is_blog_archive = $new;
}

if ( ! function_exists( 'origami_is_post_loop_widget' ) ) :
/**
 * Checks if we're currently rendering a post loop widget.
 */
function origami_is_post_loop_widget() {
	return method_exists( 'SiteOrigin_Panels_Widgets_PostLoop', 'is_rendering_loop' ) && SiteOrigin_Panels_Widgets_PostLoop::is_rendering_loop();
}
endif;

if( ! function_exists( 'origami_header_image' ) ) :
function origami_header_image(){

	if( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$logo = get_custom_logo();
		if( !empty( $logo ) ) {
			echo $logo;
			return true;
		}
	}

	if( function_exists( 'has_header_image' ) && has_header_image() ) {
		$header = get_custom_header();
		echo '<img src="' . esc_url( $header->url ) .  '"';
		if(!empty($header->height)) {
			echo ' height="' . $header->height . '"';
		}
		if(!empty($header->width)) {
			echo ' width="' . $header->width . '"';
		}

		echo ' alt="' . esc_attr( get_bloginfo('name') ) . '" />';
		return true;
	}

	return false;
}
endif;

function origami_wp_header(){
	if( siteorigin_setting('responsive_enabled') ) {
		?><meta name="viewport" content="width=device-width, initial-scale=1" /><?php
	}
	else {
		?><meta name='viewport' content='width=1100' /><?php
	}

	// Make sure we don't use compatibility mode
	?><meta http-equiv="X-UA-Compatible" content="IE=edge" /><?php

}
add_action('wp_head', 'origami_wp_header');

function origami_woocommerce_setup() {

	/**
	 * Add support for WooCommerce.
	 * @link https://docs.woocommerce.com/document/declare-woocommerce-support-in-third-party-theme/
	 */
	add_theme_support( 'woocommerce' );

	/**
	 * Add support for WooCommerce galleries.
	 * @link https://woocommerce.wordpress.com/2017/02/28/adding-support-for-woocommerce-2-7s-new-gallery-feature-to-your-theme/
	 */
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-zoom' );

}
add_action( 'after_setup_theme', 'origami_woocommerce_setup' );

/**
 * Enqueue WooCommerce scripts and styles.
 */
function origami_woocommerce_scripts() {

	wp_enqueue_style( 'origami-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), SITEORIGIN_THEME_VERSION );
	
}
add_action( 'wp_enqueue_scripts', 'origami_woocommerce_scripts' );
