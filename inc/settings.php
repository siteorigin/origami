<?php

function origami_siteorigin_settings_localize( $loc ){
	$loc = array(
		'section_title' => __('Theme Settings', 'origami'),
		'section_description' => __('Settings for your theme', 'origami'),
		'premium_only' =>  __('Premium Only', 'origami'),
		'premium_url' => '#',

		// For the controls
		'variant' =>  __('Variant', 'origami'),
		'subset' =>  __('Subset', 'origami'),

		// For the premium upgrade modal
		'modal_title' => __('Vantage Premium Upgrade', 'origami'),
		'close' => __('Close', 'origami'),
	);

	return $loc;
}
add_filter( 'siteorigin_settings_localization', 'origami_siteorigin_settings_localize' );

function origami_settings_init(){
	$settings = SiteOrigin_Settings::single();
	
	$settings->add_section('text', __('Text', 'origami'));
	$settings->add_field('text', 'copyright', 'text', __('Copyright', 'origami'));
	$settings->add_field('text', 'not_found', 'text', __('404 Message', 'origami'));
	$settings->add_field('text', 'no_results', 'text', __('No Search Results', 'origami'));

	$settings->add_section('display', __('Display', 'origami'));
	$settings->add_field('display', 'post_author', 'checkbox', __('Display Post Author', 'origami'));
	$settings->add_field('display', 'comment_counts', 'checkbox', __('Display Comment Count', 'origami'));
	$settings->add_field('display', 'use_columns', 'checkbox', __('Use Columns', 'origami'));
	$settings->add_field('display', 'gallery', 'checkbox', __('Use Origami Gallery', 'origami'), array(
		'description' => __("Changes [gallery] shortcode galleries into a fancy slider.", 'origami')
	));

	$settings->add_teaser( 'display', 'attribution', 'checkbox', __( 'Footer Attribution', 'origami' ), array(
		'description' => __("Hide/show the link to SiteOrigin in your footer.", 'origami')
	) );

	$settings->add_field('display', 'featured_image', 'checkbox', __('Display featured Image', 'origami'), array(
		'description' => __('Featured image above posts', 'origami')
	));

	$settings->add_field('display', 'header_search', 'checkbox', __('Header Search', 'origami'), array(
		'description' => __('Search input in header', 'origami')
	));

	$settings->add_field('display', 'logo_centered', 'checkbox', __('Center Logo', 'origami'), array(
		'description' => __('Center the main logo', 'origami')
	));

	$settings->add_field('display', 'next_prev', 'checkbox', __('Post Navigation', 'origami'), array(
		'description' => __('Next and previous post links on single post pages.', 'origami')
	));

	$settings->add_section( 'responsive', __('Responsive', 'origami') );

	$settings->add_field( 'responsive', 'enabled', 'checkbox', __('Responsive', 'origami'), array(
		'description' => __('Should Origami use responsive mode.', 'origami'),
	) );

	$settings->add_field('responsive', 'nav', 'checkbox', __('Responsive Navigation', 'origami'), array(
		'description' => __('Gorgeous mobile navigation menu for your main menu.', 'origami'),
	));

	$settings->add_field('responsive', 'fitvids', 'checkbox', __('Use Fitvids', 'origami'), array(
		'description' => __('Enable FitVids to automatically scale your videos.', 'origami'),
	));

	$settings->add_section( 'comments', __('Comments', 'origami') );

	$settings->add_teaser( 'comments', 'ajax', 'checkbox', __( 'Ajax Comments', 'origami' ), array(
		'description' => __("Use ajax comments system.", 'origami')
	) );

}
add_action('siteorigin_settings_init', 'origami_settings_init');


/**
 * Set up the default settings
 */
function origami_settings_defaults($defaults){
	$defaults['colors_link_color'] = '#36659f';

	$defaults['text_copyright'] = sprintf(__('Copyright %s', 'origami'), get_bloginfo('name'));
	$defaults['text_not_found'] =  __("We couldn't find what you were looking for.", 'origami');
	$defaults['text_no_results'] = __("No results for your query.", 'origami');

	$defaults['display_post_author'] = true;
	$defaults['display_comment_counts'] = true;
	$defaults['display_use_columns'] = true;

	$defaults['display_featured_image'] = true;
	$defaults['display_header_search'] = true;
	$defaults['display_attribution'] = true;
	$defaults['display_logo_centered'] = false;
	$defaults['display_gallery'] = true;
	$defaults['display_next_prev'] = false;

	$defaults['responsive_enabled'] = true;
	$defaults['responsive_nav'] = true;
	$defaults['responsive_fitvids'] = true;

	$defaults['comments_ajax'] = true;

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'origami_settings_defaults');

function origami_about_page_setup( $about ){
	$about['title_image'] = get_template_directory_uri() . '/admin/about/origami-logo.png';
	$about['title_image_2x'] = get_template_directory_uri() . '/admin/about/origami-logo-2x.png';

	$about['description'] = __( 'Origami is one of our most elegant, mature WordPress themes. Find out more about what it has to offer by watching this short video.', 'origami' );

	$about[ 'video_thumbnail' ] = array(
		get_template_directory_uri() . '/admin/about/screenshot-1.jpg',
		get_template_directory_uri() . '/admin/about/screenshot-2.jpg',
	);

	$about['documentation_url'] = 'https://siteorigin.com/origami-documentation/';
	$about['review'] = true;

	$about[ 'sections' ] = array(
		'free',
		'support',
		'page-builder',
		'mature',
		'github',
	);

	return $about;
}
add_filter( 'siteorigin_about_page', 'origami_about_page_setup' );