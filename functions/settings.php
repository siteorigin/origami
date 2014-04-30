<?php


function origami_settings_init(){
	siteorigin_settings_add_section('text', __('Text', 'origami'));
	siteorigin_settings_add_field('text', 'copyright', 'text', __('Copyright', 'origami'));
	siteorigin_settings_add_field('text', 'not_found', 'text', __('404 Message', 'origami'));
	siteorigin_settings_add_field('text', 'no_results', 'text', __('No Search Results', 'origami'));

	siteorigin_settings_add_section('display', __('Display', 'origami'));
	siteorigin_settings_add_field('display', 'post_author', 'checkbox', __('Display Post Author', 'origami'));
	siteorigin_settings_add_field('display', 'comment_counts', 'checkbox', __('Display Comment Count', 'origami'));
	siteorigin_settings_add_field('display', 'use_columns', 'checkbox', __('Use Columns', 'origami'));
	siteorigin_settings_add_field('display', 'gallery', 'checkbox', __('Use Origami Gallery', 'origami'), array(
		'description' => __("Changes [gallery] shortcode galleries into a fancy slider.", 'origami')
	));

	siteorigin_settings_add_field('display', 'featured_image', 'checkbox', __('Display featured Image', 'origami'), array(
		'description' => __('Featured image above posts', 'origami')
	));

	siteorigin_settings_add_field('display', 'header_search', 'checkbox', __('Header Search', 'origami'), array(
		'description' => __('Search input in header', 'origami')
	));

	siteorigin_settings_add_teaser('display', 'attribution', __('Footer Attribution Link', 'origami'), array(
		'description' => __('Remove WordPress and SiteOrigin links from your footer.', 'origami'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teaser/attribution.png'
	));

	siteorigin_settings_add_field('display', 'logo_centered', 'checkbox', __('Center Logo', 'origami'), array(
		'description' => __('Center the main logo', 'origami')
	));

	siteorigin_settings_add_field('display', 'next_prev', 'checkbox', __('Post Navigation', 'origami'), array(
		'description' => __('Next and previous post links on single post pages.', 'origami')
	));

	siteorigin_settings_add_section('comments', __('Comments', 'origami'));
	siteorigin_settings_add_teaser('comments', 'ajax', __('Ajax Comments', 'origami'), array(
		'description' => __('Users can comment without leaving the page.', 'origami')
	));

	siteorigin_settings_add_section('responsive', __('Responsive', 'origami'));

	siteorigin_settings_add_field( 'responsive', 'enabled', 'checkbox', __('Responsive', 'origami'), array(
		'description' => __('Should Origami use responsive mode.', 'origami'),
	) );

	siteorigin_settings_add_teaser('responsive', 'nav', __('Responsive Navigation', 'origami'), array(
		'description' => __('Gorgeous mobile navigation menu for your main menu.', 'origami'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teaser/nav.png',
	));

	siteorigin_settings_add_section('social', __('Social', 'origami'));

	siteorigin_settings_add_teaser('social', 'share', __('Share Post', 'origami'), array(
		'description' => __('Display post sharing on the single post pages.', 'origami'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teaser/share.png'
	));

	siteorigin_settings_add_teaser('social', 'twitter', __('Twitter Username', 'origami'), array(
		'description' => __('Recommend your Twitter account after someone tweets your post.', 'origami'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teaser/share-rec.png'
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
	$defaults['display_logo_centered'] = false;
	$defaults['display_gallery'] = true;
	$defaults['display_next_prev'] = false;

	$defaults['comments_ajax'] = true;

	$defaults['responsive_enabled'] = true;
	$defaults['responsive_nav'] = true;

	$defaults['social_share'] = true;
	$defaults['social_twitter'] = '';

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'origami_settings_defaults');

/**
 * Feature suggestions URL.
 *
 * @return string
 */
function origami_feature_suggestion_url(){
	return 'http://sorig.in/origami-suggestions';
}
add_filter('siteorigin_settings_suggest_features_url', 'origami_feature_suggestion_url');