<?php

origin_register_section('logo', array(
	'title' => __('Logo', 'origami'),
));

origin_register_setting('logo', 'container_top_margin', array(
	'type' => 'slider',
	'label' => __('Container Top Margin', 'origami'),
	'min' => 0,
	'max' => 50,
	'default' => 20,
	'units' => 'px',
	'separator' => __('Container', 'origami'),
));

origin_register_setting('logo', 'container_bottom_margin', array(
	'type' => 'slider',
	'label' => __('Container Bottom Margin', 'origami'),
	'min' => 0,
	'max' => 50,
	'default' => 25,
	'units' => 'px',
));

origin_register_setting('logo', 'font', array(
	'type' => 'font',
	'label' => __('Logo Font', 'origami'),
	'default' => array(
		'family' => 'Dosis',
		'variant' => 200
	),
	'separator' => __('Main Logo Text', 'origami'),
));

origin_register_setting('logo', 'font_size', array(
	'type' => 'slider',
	'label' => __('Logo Size', 'origami'),
	'min' => 10,
	'max' => 92,
	'default' => 52,
	'units' => 'px',
));

origin_register_setting('logo', 'color', array(
	'type' => 'color',
	'label' => __('Logo Color', 'origami'),
	'default' => '#333333',
));

origin_register_setting('logo', 'margin', array(
	'type' => 'slider',
	'label' => __('Logo Bottom Margin', 'origami'),
	'segments' => 200,
	'min' => -1,
	'max' => 1,
	'default' => 0.2,
	'units' => 'em',
));

origin_register_setting('logo', 'description_color', array(
	'type' => 'color',
	'label' => __('Description Color', 'origami'),
	'default' => '#555555',
	'separator' => __('Description', 'origami'),
));

origin_register_setting('logo', 'description_size', array(
	'type' => 'slider',
	'label' => __('Description Size', 'origami'),
	'min' => 8,
	'max' => 32,
	'default' => 13,
	'units' => 'px',
));