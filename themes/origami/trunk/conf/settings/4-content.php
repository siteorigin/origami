<?php

origin_register_section('content', array(
	'title' => __('Content', 'origami'),
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

origin_register_setting('content', 'title_color', array(
	'type' => 'slider',
	'default' => 0.15,
	'min' => 0,
	'max' => 1,
	'segments' => 100,
	'label' => __('Heading Color', 'origami'),
	'separator' => __('Page Title', 'origami'),
));

origin_register_setting('content', 'title_font', array(
	'type' => 'font',
	'label' => __('Post Heading Font', 'origami'),
	'default' => array(
		'family' => 'Dosis',
		'variant' => 200,
	)
));

origin_register_setting('content', 'font_size', array(
	'type' => 'slider',
	'default' => 13,
	'min' => 10,
	'max' => 15,
	'segments' => 10,
	'units' => 'px',
	'label' => __('Font Size', 'origami'),
	'separator' => __('Content Paragraphs', 'origami'),
));

origin_register_setting('content', 'line_height', array(
	'type' => 'slider',
	'default' => 1.5,
	'min' => 1,
	'max' => 2,
	'segments' => 10,
	'units' => 'em',
	'label' => __('Content Line Height', 'origami'),
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
));

origin_register_setting('content', 'bar_background', array(
	'type' => 'color',
	'label' => __('Content Bar Background Color', 'origami'),
	'default' => '#FAFAFA',
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