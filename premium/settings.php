<?php

function origami_premium_settings_init(){
	siteorigin_settings_add_field('colors', 'page_border_color', 'color', __('Page Border Color', 'origami'), array(
		'description' => __('Main page border color', 'origami')
	));
	siteorigin_settings_add_field('colors', 'footer_text', 'color', __('Footer Copyright Color', 'origami'));
	siteorigin_settings_add_field('colors', 'footer_link', 'color', __('Footer Copyright Link Color', 'origami'));

	siteorigin_settings_add_field('display', 'attribution', 'checkbox', __('Footer Attribution Link', 'origami'), array(
		'description' => __('Remove the "theme by SiteOrigin" in your footer.', 'origami')
	));
	
	siteorigin_settings_add_field('comments', 'ajax', 'checkbox', __('Ajax Comments', 'origami'), array(
		'description' => __('Users can comment without leaving the page.', 'origami')
	));

	siteorigin_settings_add_field('responsive', 'footer', 'checkbox', __('Responsive Footer Widgets', 'origami'), array(
		'description' => __('Widgets collapse for mobile devices.', 'origami')
	));
	
	siteorigin_settings_add_section('social', __('Social', 'origami'));

	siteorigin_settings_add_field('social', 'share', 'checkbox', __('Display Social Sharing', 'origami'), array(
		'description' => __('Display post sharing on post pages.', 'origami')
	));

	siteorigin_settings_add_field('social', 'twitter', 'text', __('Twitter Username', 'origami'), array(
		'validator' => 'twitter'
	));
}
add_action('admin_init', 'origami_premium_settings_init', 11);