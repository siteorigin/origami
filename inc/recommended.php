<?php

function origami_recommended_plugins($plugins){

	$plugins[] = array(
		'name' => __('Origami Bundle', 'origami'),
		'description' => __("All the recommended addons for Origami at one low price.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/bundle.png',
		'url' => 'http://siteorigin.com/product/origami-bundle/',
	);

	$plugins[] = array(
		'name' => __('Origami Customizer', 'origami'),
		'description' => __("Customize the design of your Origami powered site.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/customizer.png',
		'url' => 'http://siteorigin.com/product/origami-customizer/',
	);

	$plugins[] = array(
		'name' => __('Responsive Menu', 'origami'),
		'description' => __("Make your menu responsive.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/responsive-menu.png',
		'url' => 'http://siteorigin.com/product/responsive-menu/',
	);

	$plugins[] = array(
		'name' => __('Remove Link', 'origami'),
		'description' => __("Remove the \"Theme By SiteOrigin\" link from your footer.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/remove-link.png',
		'url' => 'http://siteorigin.com/product/remove-link/',
	);

	$plugins[] = array(
		'name' => __('Masonry Layout', 'origami'),
		'description' => __("Display your posts in style with a masonry layout.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/masonry.png',
		'url' => 'http://siteorigin.com/product/masonry-layout/',
	);

	$plugins[] = array(
		'name' => __('Ajax Comments', 'origami'),
		'description' => __("Keep the conversation flowing with Ajax comments.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/ajax-comments.png',
		'url' => 'http://siteorigin.com/product/ajax-comments/',
	);

	return $plugins;
}
add_filter('siteorigin_recommended_plugins', 'origami_recommended_plugins');

function origami_recommended_customizer(){
	new SiteOrigin_Recommended_Customizer('http://siteorigin.com/product/origami-customizer/');
}
add_action('after_setup_theme', 'origami_recommended_customizer');