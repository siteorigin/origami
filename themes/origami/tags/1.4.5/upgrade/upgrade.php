<?php

function origami_premium_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Origami Premium', 'origami');
	$content['premium_summary'] = __("If you've enjoyed using Origami, you'll going to love Origami Premium. It's a robust upgrade to Origami that gives you loads of cool features and email support. For just a few dollars, it's a cost effective way to give your site a professional edge.", 'origami');

	$content['buy_url'] = 'http://siteorigin.fetchapp.com/sell/aqueifoo';
	$content['buy_price'] = '$9';
	$content['buy_button'] = get_template_directory_uri().'/upgrade/images/button.png';
	$content['buy_message_1'] = __("If you're not delighted with Origami Premium, I'll give you a full refund", 'origami');
	$content['buy_message_2'] = __("Buy now and enjoy continued updates", 'origami');
	
	$content['featured'] = array(get_template_directory_uri().'/upgrade/promo.jpg', 1259, 1073);

	$content['features'] = array();

	$content['features'][] = array(
		'heading' => __("Responsive Features", 'origami'),
		'content' => __("The final puzzle pieces in making Origami truly responsive. Origami Premium has footer widgets that collapse below each other on narrower resolution devices. Its menu collapses into a single navigate button which activates an intuitive nested menu system and site search.", 'origami'),
		'image' => get_template_directory_uri() . '/upgrade/teaser/nav.png',
	);
	
	$content['features'][] = array(
		'heading' => __('Additional Widgets for Your Panel Pages', 'origami'),
		'content' => __('Origami Premium has additional widgets that you can use to populate your Panels pages.', 'origami'),
		'image' => get_template_directory_uri() . '/extras/panels/images/teaser.png',
	);
	
	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'origami'),
		'content' => __('Origami premium gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'origami'),
		'image' => get_template_directory_uri() . '/upgrade/teaser/attribution.png',
	);

	$content['features'][] = array(
		'heading' => __("Ajax Comments", 'origami'),
		'content' => __("Want to keep the conversation flowing? Ajax comments means your visitors can comment without reloading your page. So commenting wont interrupt a video or lose their position in one of your galleries.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Social Sharing", 'origami'),
		'content' => __("Origami Premium includes social sharing for Facebook, Twitter and Google Plus. They fit right into the clean design of Origami.", 'origami'),
		'image' => get_template_directory_uri() . '/upgrade/teaser/share.png',
	);

	$content['features'][] = array(
		'heading' => __("CSS Editor", 'origami'),
		'content' => __("A simple CSS editor that lets you easily add code that changes the look of Origami. You can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across updates.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __('Premium Support', 'origami'),
		'content' => __("Need help setting up Origami? Upgrading to Origami Premium gives you prioritized support on our support forums.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Continued Updates", 'origami'),
		'content' => __("You'll get continued updates, ensuring that your Origami powered site keeps on working with the latest version of WordPress for years to come.", 'origami'),
		'image' => get_template_directory_uri() . '/upgrade/teaser/updates.png',
	);
	
	$content['testimonials'] = array(
		array(
			'gravatar' => '0dacd16ef5a3d669700d4ec9fffd9e0d',
			'name' => 'Elii',
			'content' => __('I love this theme very much.', 'origami'),
		),
		array(
			'gravatar' => '5ac326a8887af0bf2aea8d3e25842104',
			'name' => 'Liz',
			'content' => __('This is exactly the kind of theme I was looking for.', 'origami'),
		),
		array(
			'gravatar' => '004aeb08475d44bb4ce6a50d19ba8839',
			'name' => 'Esha',
			'content' => __('Before trying any theme I check Pagespeed score and Yslow score on basic WordPress installation. This theme rocks on these two parameters.', 'origami'),
		),
	);

	return $content;
}
add_filter('siteorigin_premium_content', 'origami_premium_upgrade_content');