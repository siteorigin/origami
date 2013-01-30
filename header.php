<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0' />

	<title><?php wp_title('|', true, 'right'); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
<div class="container">
	<div id="page-container">
		<div id="logo" <?php if(siteorigin_setting('display_logo_centered')) echo 'class="logo-centered"' ?>>
			<a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo esc_attr(get_bloginfo('description')) ?>" class="logo-link">
				<?php if( get_header_image() ) : ?>
					<img src="<?php esc_url(header_image()); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" />
				<?php else : ?>
					<h1 class="logo"><?php bloginfo('name') ?></h1><br/>
					<h3 class="logo"><?php bloginfo('description') ?></h3>
				<?php endif; ?>
			</a>
			<?php if(siteorigin_setting('display_header_search')) get_search_form(); ?>
		</div>
		<nav id="menu" class="primary">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_id' => 'main-menu',
					'depth' => 2,
				));
			?>
		</nav>