<?php

origin_register_section('background', array(
	'title' => __('Background', 'origami'),
));

origin_register_setting('background', 'color', array(
	'type' => 'color',
	'label' => __('Background Color', 'origami'),
	'default' => '#f0eeeb',
));

origin_register_setting('background', 'texture', array(
	'type' => 'texture',
	'label' => __('Texture', 'origami'),
	'default' => array(
		'texture' => 'groovepaper',
		'blend' => 'luminosity',
	),
	// The user can have no pattern
	'none' => true,
));

origin_register_setting('background', 'texture_level', array(
	'type' => 'slider',
	'default' => 3,
	'min' => -100,
	'max' => 100,
	'label' => __('Texture Intensity', 'origami'),
));

origin_register_setting('background', 'noise', array(
	'type' => 'slider',
	'default' => 0,
	'min' => 0,
	'max' => 100,
	'label' => __('Background Noise', 'origami'),
));