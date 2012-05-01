<?php

origin_register_section('content', array(
	'title' => __('Content', 'origami'),
));

origin_register_setting('content', 'font_size', array(
	'type' => 'slider',
	'default' => 13,
	'min' => 10,
	'max' => 15,
	'segments' => 10,
	'units' => 'px',
	'label' => __('Font Size', 'origami'),
));


origin_register_setting('content', 'color', array(
	'type' => 'slider',
	'default' => 0.3,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Content Color', 'origami'),
));

origin_register_setting('content', 'link_color', array(
	'type' => 'color',
	'label' => __('Link Color', 'origami'),
	'default' => '#36659f',
));


// Content headings

origin_register_setting('content', 'heading_size', array(
	'type' => 'slider',
	'default' => 24,
	'min' => 10,
	'max' => 15,
	'segments' => 10,
	'units' => 'px',
	'label' => __('Font Size', 'origami'),

	'separator' => __('Content Headings', 'origami'),
));

origin_register_setting('content', 'heading_color', array(
	'type' => 'slider',
	'default' => 0.2,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Heading Color', 'origami'),
));


// Content Paragraphs

origin_register_setting('content', 'line_height', array(
	'type' => 'slider',
	'default' => 1.5,
	'min' => 1,
	'max' => 2,
	'segments' => 10,
	'units' => 'em',
	'label' => __('Content Line Height', 'origami'),

	'separator' => __('Content Paragraphs', 'origami'),
));

origin_register_setting('content', 'paragraph_margin', array(
	'type' => 'slider',
	'default' => 1.5,
	'min' => 0,
	'max' => 4,
	'segments' => 40,
	'units' => 'em',
	'label' => __('Paragraph Margin', 'origami'),
));

// Settings for the bar below the content

origin_register_setting('content', 'bar_border', array(
	'type' => 'color',
	'label' => __('Content Bar Border Color', 'origami'),
	'default' => '#EEEEEE',
	
	'separator' => __('Content Bar', 'origami')
));

origin_register_setting('content', 'bar_background', array(
	'type' => 'color',
	'label' => __('Content Bar Background Color', 'origami'),
	'default' => '#F9F9F9',
));

origin_register_setting('content', 'bar_link', array(
	'type' => 'color',
	'label' => __('Content Bar Link Color', 'origami'),
	'default' => '#666666',
));

origin_register_setting('content', 'bar_icons', array(
	'type' => 'color',
	'label' => __('Content Bar Icon Color', 'origami'),
	'default' => '#666666',
));