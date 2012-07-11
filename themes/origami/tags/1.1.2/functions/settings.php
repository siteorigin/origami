<?php


function origami_settings_init(){
	so_settings_add_section('colors', __('Colors', 'origami'));
	so_settings_add_field('colors', 'link_color', 'color', __('Link Color', 'origami'));
	
	so_settings_add_teaser('colors', 'page_border_color', __('Page Border Color', 'origami'), array(
		'description' => __('Main page border color', 'origami')
	));
	so_settings_add_teaser('colors', 'footer_text', __('Footer Copyright Color', 'origami'));
	so_settings_add_teaser('colors', 'footer_link', __('Footer Copyright Link Color', 'origami'));
	
	so_settings_add_section('text', __('Site Text', 'origami'));
	so_settings_add_field('text', 'copyright', 'text', __('Copyright', 'origami'));
	so_settings_add_field('text', 'not_found', 'text', __('404 Message', 'origami'));
	so_settings_add_field('text', 'no_results', 'text', __('No Search Results', 'origami'));

	so_settings_add_section('display', __('Display', 'origami'));
	so_settings_add_field('display', 'post_author', 'checkbox', __('Display Post Author', 'origami'));
	so_settings_add_field('display', 'comment_counts', 'checkbox', __('Display Comment Count', 'origami'));
	so_settings_add_field('display', 'use_columns', 'checkbox', __('Use Columns', 'origami'));
	
	so_settings_add_field('display', 'featured_image', 'checkbox', __('Display featured Image', 'origami'), array(
		'description' => __('Featured image above posts', 'origami')
	));

	so_settings_add_field('display', 'header_search', 'checkbox', __('Header Search', 'origami'), array(
		'description' => __('Search input in header', 'origami')
	));

	so_settings_add_teaser('display', 'attribution', __('Footer Attribution Link', 'origami'), array(
		'description' => __('Remove the "theme by SiteOrigin" in your footer.', 'origami')
	));

	so_settings_add_section('comments', __('Comments', 'origami'));
	so_settings_add_teaser('comments', 'ajax', __('Ajax Comments', 'origami'), array(
		'description' => __('Users can comment without leaving the page.', 'origami')
	));

	so_settings_add_section('responsive', __('Responsive Layout', 'origami'));
	so_settings_add_teaser('responsive', 'footer', __('Responsive Footer Widgets', 'origami'), array(
		'description' => __('Widgets collapse for mobile devices.', 'origami')
	));

	so_settings_add_section('social', __('Social', 'origami'));
	so_settings_add_teaser('social', 'share', __('Share Post', 'origami'), array(
		'description' => __('Display post sharing on the single post pages.', 'origami')
	));
	
	// We're using this to transfer the header image across from simple options
	$simple_options = get_option('simple-options-'.basename(get_template_directory()), array());
	if(!get_option('origami_header_image_transferred', false) && !empty($simple_options['general']['logo'])){
		global $custom_image_header;
		
		$attachment = isset($simple_options['general']['logo']['attachment_id']) ? $simple_options['general']['logo']['attachment_id'] : $simple_options['general']['logo'];
		$attachment_data = wp_get_attachment_metadata($attachment);
		
		if(!empty($attachment_data)){
			$thumb = wp_get_attachment_image_src($attachment, 'thumbnail');
			$orig = wp_get_attachment_image_src($attachment, 'original');
			
			$choice = array(
				'attachment_id' => $attachment,
				'width' => $attachment_data['width'],
				'height' => $attachment_data['height'],
				'url' => $orig[0],
				'thumbnail' => $thumb[0] 
			);
			$custom_image_header->set_header_image($choice);
		}
		add_option('origami_header_image_transferred', true);
	}
}
add_action('admin_init', 'origami_settings_init');


/**
 * Set up the default settings
 */
function origami_settings_defaults($defaults){
	$simple_options = get_option('simple-options-'.basename(get_template_directory()), array());
	
	$defaults['colors_link_color'] = '#36659f';
	$defaults['colors_page_border_color'] = '#cbc9c7';
	$defaults['colors_footer_text'] = '#999999';
	$defaults['colors_footer_link'] = '#777777';
	
	$defaults['text_copyright'] = isset($simple_options['messages_copyright'])
		? $simple_options['messages_copyright'] : sprintf(__('Copyright %s', 'origami'), get_bloginfo('name'));
	
	$defaults['text_not_found'] = isset($simple_options['messages_not_found'])
		? $simple_options['messages_not_found'] : __("We couldn't find what you were looking for.", 'origami');
	
	$defaults['text_no_results'] = isset($simple_options['messages_no_results'])
		? $simple_options['messages_no_results'] : __("No results for your query.", 'origami');

	$defaults['display_post_author'] = isset($simple_options['display_post_author'])
		? $simple_options['display_post_author'] : true;

	$defaults['display_comment_counts'] = isset($simple_options['display_comment_counts'])
		? $simple_options['display_comment_counts'] : true;

	$defaults['display_use_columns'] = isset($simple_options['display_use_columns'])
		? $simple_options['display_use_columns'] : true;
	
	$defaults['display_featured_image'] = true;
	$defaults['display_header_search'] = true;
	$defaults['display_attribution'] = true;
	$defaults['display_loop_comments'] = false;
	
	$defaults['comments_ajax'] = true;
	$defaults['responsive_footer'] = true;

	$defaults['social_share'] = true;
	$defaults['social_twitter'] = '';
	
	return $defaults;
}
add_filter('so_theme_default_settings', 'origami_settings_defaults');