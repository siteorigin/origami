<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0' />

	<title><?php wp_title('|', true, 'right'); ?></title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
<div class="container">
	<div id="page-container">
		<div id="logo">
			<a href="<?php print site_url() ?>" title="<?php print esc_attr(get_bloginfo('description')) ?>" class="logo-link">
				<?php
				$logo = simple_options_get('general', 'logo');
				if(!empty($logo) && !empty($logo['attachment_id'])){
					print wp_get_attachment_image($logo, 'full', false, array(
						'title' => get_bloginfo('name'), 
						'alt' => get_bloginfo('name').' - '.get_bloginfo('description'), 
					));
				}
				else{
					?>
					<h1 class="logo"><?php bloginfo('name') ?></h1><br/>
					<h3 class="logo"><?php bloginfo('description') ?></h3>
					<?php
				}
				?>
			</a>
			<?php get_search_form() ?>
		</div>
		<div id="menu">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_id' => 'main-menu',
					'depth' => 2,
				));
			?>
		</div>