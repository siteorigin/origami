<?php

origin_register_section('footer', array(
	'title' => __('Footer Widgets', 'origami'),
));

origin_register_setting('footer', 'border_color', array(
	'type' => 'color',
	'label' => __('Footer Border', 'origami'),
	'default' => '#EEEEEE',
	'separator' => __('Widget', 'origami'),
));

origin_register_setting('footer', 'background_color', array(
	'type' => 'color',
	'label' => __('Footer Background', 'origami'),
	'default' => '#F9F9F9',
));

origin_register_setting('footer', 'text_color', array(
	'type' => 'color',
	'label' => __('Footer Text Color', 'origami'),
	'default' => '#666666',
));

origin_register_setting('footer', 'heading_color', array(
	'type' => 'color',
	'label' => __('Footer Heading Color', 'origami'),
	'default' => '#333',
));

origin_register_setting('footer', 'link_color', array(
	'type' => 'color',
	'label' => __('Footer Link Color', 'origami'),
	'default' => '#444444',
));

origin_register_setting('footer', 'li_margin', array(
	'type' => 'slider',
	'label' => __('List Margin', 'origami'),
	'min' => 0,
	'max' => 2,
	'segments' => 200,
	'default' => 0.3,
	'units' => 'em'
));

origin_register_setting('footer', 'copyright_color', array(
	'type' => 'color',
	'label' => __('Copyright Text Color', 'origami'),
	'default' => '#999999',
	'separator' => __('Copyright Message', 'origami'),
));

origin_register_setting('footer', 'copyright_link_color', array(
	'type' => 'color',
	'label' => __('Copyright Link Color', 'origami'),
	'default' => '#999999',
));