<?php

origin_register_section('general', array(
	'title' => __('General', 'origin'),
));

origin_register_setting('general', 'logo', array(
	'type' => 'file',
	'label' => __('Site Logo', 'zen'),
	'description' => __('Upload your custom logo.', 'origin'),
	'tags' => array('basic', 'upload', 'logo', 'branding'),
	
	'restrict' => array('png', 'gif', 'svg'),
	'is_image' => true,
	'removable' => true,
	'delete_old' => true,
));

origin_register_setting('general', 'favicon', array(
	'type' => 'file',
	'label' => __('Favicon', 'zen'),
	'description' => __('A 16px square icon for your site.', 'origin'),
	'tags' => array('basic', 'upload', 'branding'),
	
	'restrict' => array('png', 'ico'),
	'is_image' => true,
	'removable' => true,
	'delete_old' => true,
));