<?php

origin_register_section('general', array(
	'title' => __('General', 'origin'),
));

origin_register_setting('general', 'logo', array(
	'type' => 'file',
	'label' => __('Site Logo', 'origin'),
	'description' => __('Upload your custom logo.', 'origin'),
	'tags' => array('basic', 'upload', 'logo', 'branding'),
	
	'restrict' => array('png', 'gif', 'svg'),
	'is_image' => true,
	'removable' => true,
	'delete_old' => true,
	
	'image_id' => 'logo-image',
));

origin_register_setting('general', 'favicon', array(
	'type' => 'file',
	'label' => __('Favicon', 'origin'),
	'description' => __('A 16px square icon for your site.', 'origin'),
	'tags' => array('basic', 'upload', 'branding'),
	
	'restrict' => array('png', 'ico'),
	'is_image' => true,
	'removable' => true,
	'delete_old' => true,
));

origin_register_setting('general', 'body_font', array(
	'type' => 'font',
	'label' => __('Body Font', 'origin'),
	'description' => __('The main content font.', 'origin'),
	'default' => array(
		'family' => 'Helvetica Neue',
		'variant' => 400
	)
));