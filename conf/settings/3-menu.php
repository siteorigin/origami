<?php

origin_register_section('menu', array(
	'title' => __('Menu', 'origin'),
));

origin_register_setting('menu', 'search_border', array(
	'type' => 'color',
	'label' => __('Search Border', 'origin'),
	'description' => __('The border color of the search box.', 'origin'),
	'default' => '#EEEEEE',
));

origin_register_setting('menu', 'search_background', array(
	'type' => 'color',
	'label' => __('Search Background', 'origin'),
	'description' => __('The background color of the search box.', 'origin'),
	'default' => '#FAFAFA',
));

origin_register_setting('menu', 'search_text', array(
	'type' => 'color',
	'label' => __('Search Text Color', 'origin'),
	'description' => __('The text color of the search bar.', 'origin'),
	'default' => '#666666',
));

origin_register_setting('menu', 'border', array(
	'type' => 'color',
	'label' => __('Menu Border Color', 'origin'),
	'description' => __('The main menu border color.', 'origin'),
	'default' => '#EEEEEE',
));

origin_register_setting('menu', 'background', array(
	'type' => 'color',
	'label' => __('Menu Background Color', 'origin'),
	'description' => __('The main menu background color.', 'origin'),
	'default' => '#FAFAFA',
));

origin_register_setting('menu', 'text_color', array(
	'type' => 'color',
	'label' => __('Menu Text Color', 'origin'),
	'description' => __('The text color of the menu bar.', 'origin'),
	'default' => '#444444',
));

origin_register_setting('menu', 'drop_border', array(
	'type' => 'color',
	'label' => __('Dropdown Border Color', 'origin'),
	'description' => __('The main menu border color.', 'origin'),
	'default' => '#DDDDDD',
));

origin_register_setting('menu', 'drop_background', array(
	'type' => 'color',
	'label' => __('Dropdown Background Color', 'origin'),
	'description' => __('The main menu background color.', 'origin'),
	'default' => '#F4F4F4',
));

origin_register_setting('menu', 'drop_text_color', array(
	'type' => 'color',
	'label' => __('Dropdown Text Color', 'origin'),
	'description' => __('The text color of the menu dropdowns.', 'origin'),
	'default' => '#666666',
));