<?php
/**
 * Integrates this theme with SiteOrigin panels page builder.
 */

/**
 * Adds default page layouts
 *
 * @param $layouts
 */
function origami_prebuilt_page_layouts($layouts){
	$layouts['home'] = array (
		'name' => __('Business Home Page', 'origami'),
		'widgets' =>
		array (
			0 =>
			array (
				'ids' => '',
				'size' => '',
				'info' =>
				array (
					'class' => 'SiteOrigin_Widgets_Gallery',
					'id' => '0',
					'grid' => '0',
					'cell' => '0',
				),
			),
			1 =>
			array (
				'headline' => __( 'Call To Action Title', 'origami' ),
				'text' => __( 'And this is some subtext', 'origami' ),
				'button' => __( 'Action Text', 'origami' ),
				'url' => '#',
				'info' =>
				array (
					'class' => 'SiteOrigin_Widgets_CTA',
					'id' => '1',
					'grid' => '0',
					'cell' => '0',
				),
			),
			2 =>
			array (
				'headline' => __( 'Feature Headline', 'origami' ),
				'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum, diam eget consectetur aliquam, velit erat dignissim sapien, mollis aliquam elit lectus id purus.',
				'url' => '#',
				'icon' => '',
				'info' =>
				array (
					'class' => 'SiteOrigin_Widgets_IconText',
					'id' => '2',
					'grid' => '1',
					'cell' => '0',
				),
			),
			3 =>
			array (
				'headline' => __( 'Feature Headline', 'origami' ),
				'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum, diam eget consectetur aliquam, velit erat dignissim sapien, mollis aliquam elit lectus id purus.',
				'url' => '#',
				'icon' => '',
				'info' =>
				array (
					'class' => 'SiteOrigin_Widgets_IconText',
					'id' => '3',
					'grid' => '1',
					'cell' => '1',
				),
			),
			4 =>
			array (
				'headline' => __( 'Feature Headline', 'origami' ),
				'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum, diam eget consectetur aliquam, velit erat dignissim sapien, mollis aliquam elit lectus id purus.',
				'url' => '#',
				'icon' => '',
				'info' =>
				array (
					'class' => 'SiteOrigin_Widgets_IconText',
					'id' => '4',
					'grid' => '1',
					'cell' => '2',
				),
			),
		),
		'grids' =>
		array (
			0 =>
			array (
				'cells' => '1',
			),
			1 =>
			array (
				'cells' => '3',
			),
		),
		'grid_cells' =>
		array (
			0 =>
			array (
				'weight' => '1',
				'grid' => '0',
			),
			1 =>
			array (
				'weight' => '0.3333333333333333',
				'grid' => '1',
			),
			2 =>
			array (
				'weight' => '0.3333333333333333',
				'grid' => '1',
			),
			3 =>
			array (
				'weight' => '0.3333333333333333',
				'grid' => '1',
			),
		),
	);

	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'origami_prebuilt_page_layouts');

function origami_panels_settings($settings){
	$settings['home-page'] = true;
	$settings['responsive'] = true;
	$settings['margin-bottom'] = 30;
	$settings['margin-sides'] = 30;

	return $settings;
}
add_filter('sitesiteorigin_panels_settings', 'origami_panels_settings');