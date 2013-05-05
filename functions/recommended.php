<?php

function origami_recommended_plugins($plugins){
	$plugins[] = array(
		'name' => __('Origami Bundle', 'origami'),
		'description' => __("Save cash by buying all our Origami plugins.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/customizer.png',
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
		'name' => __('Link Disolver', 'origami'),
		'description' => __("Remove the \"Theme By SiteOrigin\" text from your footer.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/customizer.png',
		'url' => 'http://siteorigin.com/product/link-disolver/',
	);

	$plugins[] = array(
		'name' => __('Masonry Layout', 'origami'),
		'description' => __("Gives you a stunning Masonry layout for your website.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/customizer.png',
		'url' => 'http://siteorigin.com/product/masonry-layout/',
	);

	$plugins[] = array(
		'name' => __('Ajax Comments', 'origami'),
		'description' => __("Keep the conversation flowing with Ajax comments.", 'origami'),
		'image' => get_template_directory_uri().'/recommended/customizer.png',
		'url' => 'http://siteorigin.com/product/ajax-comments/',
	);

	return $plugins;
}
add_filter('siteorigin_recommended_plugins', 'origami_recommended_plugins');