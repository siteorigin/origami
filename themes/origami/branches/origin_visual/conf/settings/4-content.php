<?php

origin_register_section('content', array(
	'title' => __('Content', 'origin'),
));

origin_register_setting('content', 'color', array(
	'type' => 'slider',
	'default' => 0.3,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Content Color', 'origin'),
	'description' => __('The color of the main content.', 'origin'),
));

origin_register_setting('content', 'link_color', array(
	'type' => 'color',
	'label' => __('Link Color', 'origin'),
	'description' => __('The default link color.', 'origin'),
	'default' => '#36659f',
));

origin_register_setting('content', 'heading_color', array(
	'type' => 'slider',
	'default' => 0.15,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Heading Color', 'origin'),
	'description' => __('The color of headings.', 'origin'),
));

origin_register_setting('content', 'line_height', array(
	'type' => 'slider',
	'default' => 1.5,
	'min' => 1,
	'max' => 2,
	'segments' => 10,
	'units' => 'em',
	'label' => __('Content Line Height', 'origin'),
	'description' => __('The amount of spacing between lines.', 'origin'),
));

origin_register_setting('content', 'font_size', array(
	'type' => 'slider',
	'default' => 13,
	'min' => 10,
	'max' => 15,
	'segments' => 10,
	'units' => 'px',
	'label' => __('Font Size', 'origin'),
	'description' => __('The base font size of your content.', 'origin'),
));

// Settings for the bar below the content

origin_register_setting('content', 'bar_border', array(
	'type' => 'color',
	'label' => __('Content Bar Border Color', 'origin'),
	'description' => __('The border color of the bar below post content.', 'origin'),
	'default' => '#EEEEEE',
));

origin_register_setting('content', 'bar_background', array(
	'type' => 'color',
	'label' => __('Content Bar Background Color', 'origin'),
	'description' => __('The background color of the bar below post content.', 'origin'),
	'default' => '#FAFAFA',
));

origin_register_setting('content', 'bar_link', array(
	'type' => 'color',
	'label' => __('Content Bar Link Color', 'origin'),
	'description' => __('The link color of the bar below post content.', 'origin'),
	'default' => '#666666',
));

origin_register_setting('content', 'bar_icons', array(
	'type' => 'color',
	'label' => __('Content Bar Icon Color', 'origin'),
	'description' => __('The background color of the bar below post content.', 'origin'),
	'default' => '#666666',
));