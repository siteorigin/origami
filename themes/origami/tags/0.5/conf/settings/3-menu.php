<?php

origin_register_section('menu', array(
	'title' => __('Menu', 'origami'),
));

origin_register_setting('menu', 'search_border', array(
	'type' => 'color',
	'label' => __('Search Border', 'origami'),
	'default' => '#EEEEEE',
));

origin_register_setting('menu', 'search_background', array(
	'type' => 'color',
	'label' => __('Search Background', 'origami'),
	'default' => '#F9F9F9',
));

origin_register_setting('menu', 'search_text', array(
	'type' => 'color',
	'label' => __('Search Text Color', 'origami'),
	'default' => '#666666',
));

origin_register_setting('menu', 'border', array(
	'type' => 'color',
	'label' => __('Menu Border Color', 'origami'),
	'default' => '#EEEEEE',
));

origin_register_setting('menu', 'background', array(
	'type' => 'color',
	'label' => __('Menu Background Color', 'origami'),
	'default' => '#F9F9F9',
));

origin_register_setting('menu', 'text_color', array(
	'type' => 'color',
	'label' => __('Menu Text Color', 'origami'),
	'default' => '#444444',
));

origin_register_setting('menu', 'drop_border', array(
	'type' => 'color',
	'label' => __('Dropdown Border Color', 'origami'),
	'default' => '#DDDDDD',
));

origin_register_setting('menu', 'drop_background', array(
	'type' => 'color',
	'label' => __('Dropdown Background Color', 'origami'),
	'default' => '#F4F4F4',
));

origin_register_setting('menu', 'drop_text_color', array(
	'type' => 'color',
	'label' => __('Dropdown Text Color', 'origami'),
	'default' => '#666666',
));