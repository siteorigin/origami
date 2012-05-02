<?php

Origin::single()->options->add_page('general', array(
	'title' => __('General', 'origami'),
	'sections' => array(
		'default' => array(
			'fields' => array(
				'logo' => array(
					'type' => 'media',
					'title' => __('Website Logo', 'origami'),
				),
				'favicon' => array(
					'type' => 'media',
					'title' => __('Favicon', 'origami'),
				),
				'analytics' => array(
					'type' => 'textarea',
					'title' => __('Analytics Code', 'origami'),
					'description' => __('Inserted just before your closing body tag.', 'origami'),
				),
				
				'foobar' => array(
					'type' => 'text',
					'default' => 'TESTING',
				)
			)
		)
	)
));

Origin::single()->options->add_page('display', array(
	'title' => __('Display', 'origami'),
	'sections' => array(
		'default' => array(
			'fields' => array(
				'post_author' => array(
					'type' => 'checkbox',
					'title' => __('Display Post Author', 'origami'),
					'placeholder' => __('display', 'origami'),
					'default' => true,
					'rows' => 4,
				),
				'comment_counts' => array(
					'type' => 'checkbox',
					'title' => __('Display Comment Count', 'origami'),
					'placeholder' => __('display', 'origami'),
					'default' => true,
				)
			)
		)
	)
));