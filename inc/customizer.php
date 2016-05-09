<?php
function origami_customizer_init(){
	// Include all the SiteOrigin customizer classes
	global $siteorigin_origami_customizer;
	$siteorigin_origami_customizer = new SiteOrigin_Customizer_Helper(
		array(
			// Fonts
			'origami_fonts' => array(
				'body_font' => array(
					'type' => 'font',
					'title' => __('Body Font', 'origami'),
					'default' => 'Helvetica Neue',
					'selector' => 'body',
				),
				'title_font' => array(
					'type' => 'font',
					'title' => __('Title Font', 'origami'),
					'default' => 'Dosis:200',
					'selector' => '#logo h1',
				),
				'heading_font' => array(
					'type' => 'font',
					'title' => __('Heading Font', 'origami'),
					'default' => 'Dosis',
					'selector' => 'h1,h2,h3,h4,h5,h6, h1.entry-title, h1.archive-title, #footer-widgets h2.widgettitle',
				),
			),
			// The page wrapper
			'origami_page' => array(
				'background_color' => array(
					'type' => 'color',
					'title' => __('Background Color', 'origami'),
					'default' => '#fdfdfd',
					'selector' => '#page-container',
					'property' => 'background-color'
				),
				'border_color' => array(
					'type' => 'color',
					'title' => __('Border Color', 'origami'),
					'default' => '#cbc9c7',
					'selector' => '#page-container',
					'property' => 'border-color'
				),
			),
			// Menu
			'origami_menu' => array(
				'border_color' => array(
					'type' => 'color',
					'title' => __('Border Color', 'origami'),
					'default' => '#EEEEEE',
					'selector' => '#menu ul',
					'property' => 'border-color'
				),
				'background_color' => array(
					'type' => 'color',
					'title' => __('Background Color', 'origami'),
					'default' => '#F9F9F9',
					'selector' => '#menu ul',
					'property' => 'background-color'
				),
				'text_color' => array(
					'type' => 'color',
					'title' => __('Text Color', 'origami'),
					'default' => '#505050',
					'selector' => '#menu ul li a',
					'property' => 'color'
				),
				'2_border_color' => array(
					'type' => 'color',
					'title' => __('2nd Level Border Color', 'origami'),
					'default' => '#DDDDDD',
					'selector' => '#menu ul li ul',
					'property' => 'border-color'
				),
				'2_background_color' => array(
					'type' => 'color',
					'title' => __('2nd Level Background Color', 'origami'),
					'default' => '#F4F4F4',
					'selector' => '#menu ul li ul',
					'property' => 'background-color'
				),
				'2_text_color' => array(
					'type' => 'color',
					'title' => __('2nd Level Text Color', 'origami'),
					'default' => '#606060',
					'selector' => '#menu ul li ul li a',
					'property' => 'color'
				),
				'padding' => array(
					'type' => 'measurement',
					'title' => __('Padding', 'origami'),
					'default' => 25,
					'unit' => 'px',
					'selector' => '#menu ul li',
					'property' => array('padding-top', 'padding-bottom')
				),
			),
			// The footer
			'origami_footer' => array(
				'background_color' => array(
					'type' => 'color',
					'title' => __('Background Color', 'origami'),
					'default' => '#F9F9F9',
					'selector' => '#footer-widgets',
					'property' => 'background-color'
				),
				'border_color' => array(
					'type' => 'color',
					'title' => __('Border Color', 'origami'),
					'default' => '#EEEEEE',
					'selector' => '#footer-widgets',
					'property' => 'border-color'
				),
				'text_color' => array(
					'type' => 'color',
					'title' => __('Text Color', 'origami'),
					'default' => '#777777',
					'selector' => '#footer-widgets .widget',
					'property' => 'color'
				),
				'link_color' => array(
					'type' => 'color',
					'title' => __('Link Color', 'origami'),
					'default' => '#505050',
					'selector' => '#footer-widgets a',
					'property' => 'color'
				),
				'title_color' => array(
					'type' => 'color',
					'title' => __('Title Color', 'origami'),
					'default' => '#333333',
					'selector' => '#footer-widgets h2.widgettitle',
					'property' => 'color'
				),
				'copyright_color' => array(
					'type' => 'color',
					'title' => __('Copyright Text Color', 'origami'),
					'default' => '#999999',
					'selector' => '#footer',
					'property' => 'color',
					'priority' => 100
				),
				'copyright_link_color' => array(
					'type' => 'color',
					'title' => __('Copyright Link Color', 'origami'),
					'default' => '#777777',
					'selector' => '#footer a',
					'property' => 'color',
					'priority' => 100
				),
			),
			'colors' => array(
				'link' => array(
					'type' => 'color',
					'title' => __('General Link Color', 'origami'),
					'priority' => 100,
					'default' => '#36659f',
					'selector' => '.content a',
					'property' => 'color',
					'no_live' => true,
				),
			)
		),
		// The custom sections
		array(
			'origami_fonts' => array(
				'title' => __('Fonts', 'origami'),
				'priority' => 30,
			),
			'origami_page' => array(
				'title' => __('Page Container', 'origami'),
				'priority' => 40,
			),
			'origami_menu' => array(
				'title' => __('Menu', 'origami'),
				'priority' => 50,
			),
			'origami_footer' => array(
				'title' => __('Footer', 'origami'),
				'priority' => 50,
			),
		),
		// The theme name
		'origami'
	);
}
add_action('init', 'origami_customizer_init');

/**
 * @param WP_Customize_Manager $wp_customize
 */
function origami_customizer_register($wp_customize){
	global $siteorigin_origami_customizer;
	$siteorigin_origami_customizer->customize_register($wp_customize);
}
add_action( 'customize_register', 'origami_customizer_register', 15 );

/**
 * Display the styles
 */
function origami_customizer_style() {
	global $siteorigin_origami_customizer;
	$builder = $siteorigin_origami_customizer->create_css_builder();
	// Add any extra CSS customizations
	echo $builder->css();
}
add_action('wp_head', 'origami_customizer_style', 20);