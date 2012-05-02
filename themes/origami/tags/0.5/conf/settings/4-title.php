<?php

origin_register_section('title', array(
	'title' => __('Page Title', 'origami'),
));

// The main page title

origin_register_setting('title', 'color', array(
	'type' => 'slider',
	'default' => 0.15,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Heading Color', 'origami'),
	
	'separator' => __('Main Title', 'origami'),
));

origin_register_setting('title', 'size', array(
	'type' => 'slider',
	'default' => 28,
	'min' => 10,
	'max' => 40,
	'segments' => 60,
	'units' => 'px',
	'label' => __('Font Size', 'origami'),
));

origin_register_setting('title', 'font', array(
	'type' => 'font',
	'label' => __('Post Heading Font', 'origami'),
	'default' => array(
		'family' => 'Dosis',
		'variant' => 200,
	)
));

// Post Info

origin_register_setting('title', 'info_size', array(
	'type' => 'slider',
	'default' => 11.5,
	'min' => 8,
	'max' => 16,
	'segments' => 80,
	'units' => 'px',
	'label' => __('Font Size', 'origami'),

	'separator' => __('Post Info', 'origami'),
));

origin_register_setting('title', 'info_color', array(
	'type' => 'slider',
	'default' => 0.65,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Post Info Color', 'origami'),
));

origin_register_setting('title', 'info_focus_color', array(
	'type' => 'slider',
	'default' => 0.5,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Post Info Focus Color', 'origami'),
));