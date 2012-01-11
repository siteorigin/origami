<?php

origin_register_section('background', array(
	'title' => __('Background', 'origin'),
));

origin_register_setting('background', 'color', array(
	'type' => 'color',
	'label' => __('Background Color', 'origin'),
	'description' => __('The main background fill color.', 'origin'),
	'default' => '#f0eeeb',
));

origin_register_setting('background', 'texture', array(
	'type' => 'texture',
	'label' => __('Texture', 'origin'),
	'description' => __('The texture to apply to your background.', 'origin'),
	'default' => '::none',
	// The user can have no pattern
	'none' => true,
));

origin_register_setting('background', 'texture_level', array(
	'type' => 'slider',
	'default' => 20,
	'min' => -100,
	'max' => 100,
	'label' => __('Texture Intesity', 'origin'),
	'description' => __('The intesity of your background texture.', 'origin'),
));

origin_register_setting('background', 'noise', array(
	'type' => 'slider',
	'default' => 20,
	'min' => 0,
	'max' => 100,
	'label' => __('Background Noise', 'origin'),
	'description' => __('The intesity of the noise in your background.', 'origin'),
));