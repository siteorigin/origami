<?php

origin_register_section('page', array(
	'title' => __('Page', 'origin'),
));

origin_register_setting('page', 'color', array(
	'type' => 'color',
	'label' => __('Page Color', 'origin'),
	'description' => __('The page fill color.', 'origin'),
	'default' => '#FFFFFF',
));

origin_register_setting('page', 'border', array(
	'type' => 'color',
	'label' => __('Page Border Color', 'origin'),
	'description' => __('The main page border color.', 'origin'),
	'default' => '#BBBBBB',
));

origin_register_setting('page', 'padding', array(
	'type' => 'slider',
	'label' => __('Page padding', 'origin'),
	'description' => __('The amount of padding in the main page.', 'origin'),
	'default' => 4.5,
	'min' => 0,
	'max' => 10,
	'segments' => 100
));