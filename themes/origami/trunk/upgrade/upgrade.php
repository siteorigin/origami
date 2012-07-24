<?php

function origami_premium_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Origami Premium', 'origami');
	$content['premium_summary'] = __("If you've enjoyed using Origami, you'll going to love Origami Premium. It's a robust upgrade to Origami that gives you loads of cool features and email support. At just <strong>$5</strong>, it's a cost effective way to give your site a professional edge.", 'origami');

	$content['buy_url'] = 'http://siteorigin.fetchapp.com/sell/aqueifoo';
	$content['buy_button'] = get_template_directory_uri().'/upgrade/images/button.png';
	$content['buy_message_1'] = __("If you're not delighted with Origami Premium, I'll give you a full refund", 'origami');
	$content['buy_message_2'] = __("Remember, if you're not satisfied, you get your money back", 'origami');

	$content['features'] = array();
	$content['features'][] = array(
		'heading' => __('Email Support', 'origami'),
		'content' => __("Need help setting up Origami? Upgrading to Origami Premium gives you access to email support for answers to any questions you can't find in the theme documentation.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'origami'),
		'content' => __('Origami premium gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Responsive Footer Widgets", 'origami'),
		'content' => __("The final puzzle piece in making Origami truly responsive. Origami Premium has footer widgets that collapse below each other on narrower resolution devices.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Ajax Comments", 'origami'),
		'content' => __("Want to keep the conversation flowing? Ajax comments means your visitors can comment without reloading your page. So commenting wont interrupt a video or lose their position in one of your galleries.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Social Sharing", 'origami'),
		'content' => __("Origami Premium includes social sharing for Facebook, Twitter and Google Plus. They fit right into the clean design of Origami.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("CSS Editor", 'origami'),
		'content' => __("A simple CSS editor that lets you easily add code that changes the look of Origami. You can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across updates.", 'origami'),
	);

	$content['features'][] = array(
		'heading' => __("Continued Updates", 'origami'),
		'content' => __("You'll get continued updates, ensuring that your Origami powered site keeps on working with the latest version of WordPress for years to come.", 'origami'),
	);

	return $content;
}
add_filter('so_premium_content', 'origami_premium_upgrade_content');