<?php

origin_register_section('footer', array(
	'title' => __('Footer Widgets', 'origin'),
));

origin_register_setting('footer', 'border_color', array(
	'type' => 'color',
	'label' => __('Footer Border', 'origin'),
	'description' => __('The border color of the footer.', 'origin'),
	'default' => '#EEEEEE',
));

origin_register_setting('footer', 'background_color', array(
	'type' => 'color',
	'label' => __('Footer Background', 'origin'),
	'description' => __('The background color of the footer.', 'origin'),
	'default' => '#FAFAFA',
));

origin_register_setting('footer', 'text_color', array(
	'type' => 'color',
	'label' => __('Footer Text Color', 'origin'),
	'description' => __('The color of the text in the footer.', 'origin'),
	'default' => '#666666',
));

origin_register_setting('footer', 'heading_color', array(
	'type' => 'color',
	'label' => __('Footer Heading Color', 'origin'),
	'description' => __('The color of the headings in the footer.', 'origin'),
	'default' => '#333',
));

origin_register_setting('footer', 'link_color', array(
	'type' => 'color',
	'label' => __('Footer Link Color', 'origin'),
	'description' => __('The color of the text in the footer.', 'origin'),
	'default' => '#444444',
));