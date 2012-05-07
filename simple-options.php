<?php

if(!function_exists('origiami_options_init')) :
function origiami_options_init(){
	simple_options_add_page('general', array('title' => __('General', 'origami')));

	simple_options_add('general', 'logo', 'media', array(
		'title' => __('Website Logo', 'origami')
	));

	simple_options_add('general', 'favicon', 'media', array(
		'title' => __('Website Favicon', 'origami')
	));

	simple_options_add('general', 'copyright', 'text', array(
		'title' => __('Footer Copyright', 'origami'),
		'default' => sprintf('Copyright %s', get_bloginfo('name')),
	));


	simple_options_add_page('display', array('title' => __('Display', 'origami')));

	simple_options_add('display', 'post_author', 'checkbox', array(
		'title' => __('Display Post Author', 'origami'),
		'placeholder' => __('display', 'origami'),
		'default' => true,
	));

	simple_options_add('display', 'comment_counts', 'checkbox', array(
		'title' => __('Display Comment Count', 'origami'),
		'placeholder' => __('display', 'origami'),
		'default' => true,
	));
}
endif;
add_action('simple_options_init', 'origiami_options_init');
