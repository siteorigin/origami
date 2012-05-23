<?php

if(!function_exists('origiami_options_init')) :
	function origiami_options_init(){

		// General Options

		simple_options_add_page('general', array('title' => __('General', 'origami')));

		simple_options_add('general', 'logo', 'media', array(
			'title' => __('Website Logo', 'origami')
		));

		simple_options_add('general', 'favicon', 'media', array(
			'title' => __('Website Favicon', 'origami')
		));

		// Messages Options

		simple_options_add_page('messages', array('title' => __('Site Messages', 'origami')));

		simple_options_add('messages', 'copyright', 'text', array(
			'title' => __('Footer Copyright', 'origami'),
			'default' => sprintf(__('Copyright %s', 'origami'), get_bloginfo('name')),
		));

		simple_options_add('messages', 'not_found', 'textarea', array(
			'title' => __('404 Message', 'origami'),
			'default' => __("We couldn't find what you were looking for.", 'origami', 'not found error'),
		));

		simple_options_add('messages', 'no_results', 'textarea', array(
			'title' => __('No Search Results', 'origami'),
			'default' => __("No results for your query.", 'origami', 'no results message'),
		));

		// Display Options

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

		simple_options_add('display', 'use_columns', 'checkbox', array(
			'title' => __('Use Content Columns', 'origami'),
			'placeholder' => __('use', 'origami'),
			'default' => true,
		));
	}
endif;
add_action('simple_options_init', 'origiami_options_init');
