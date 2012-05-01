<?php

origin_register_section('general', array(
	'title' => __('General', 'origami'),
));

origin_register_setting('general', 'body_font', array(
	'type' => 'font',
	'label' => __('Body Font', 'origami'),
	'default' => array(
		'family' => 'Helvetica Neue',
		'variant' => 400
	)
));

origin_register_setting('general', 'font_size', array(
	'type' => 'slider',
	'default' => 13,
	'min' => 10,
	'max' => 15,
	'segments' => 10,
	'units' => 'px',
	'label' => __('Font Size', 'origami'),
));