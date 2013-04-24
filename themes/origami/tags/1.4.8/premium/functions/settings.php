<?php

function origami_premium_settings_init(){
	siteorigin_settings_add_field('colors', 'page_border_color', 'color');
	siteorigin_settings_add_field('colors', 'footer_text', 'color');
	siteorigin_settings_add_field('colors', 'footer_link', 'color');

	siteorigin_settings_add_field('display', 'attribution', 'checkbox');
	
	siteorigin_settings_add_field('comments', 'ajax', 'checkbox');

	siteorigin_settings_add_field('responsive', 'footer', 'checkbox');
	siteorigin_settings_add_field('responsive', 'nav', 'checkbox');

	siteorigin_settings_add_field('social', 'share', 'checkbox');
	siteorigin_settings_add_field('social', 'twitter', 'text', null, array(
		'validator' => 'twitter'
	));
}
add_action('admin_init', 'origami_premium_settings_init', 11);