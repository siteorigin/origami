<?php

origin_register_section('page', array(
	'title' => __('Page', 'origami'),
));

origin_register_setting('page', 'color', array(
	'type' => 'color',
	'label' => __('Page Color', 'origami'),
	'default' => '#FBFBFB',
));

origin_register_setting('page', 'border', array(
	'type' => 'color',
	'label' => __('Page Border Color', 'origami'),
	'default' => '#CCCAC8',
));

origin_register_setting('page', 'padding', array(
	'type' => 'slider',
	'label' => __('Page padding', 'origami'),
	'units' => '%',
	'default' => 4.5,
	'min' => 0,
	'max' => 10,
	'segments' => 100
));