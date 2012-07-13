<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0' />

	<title><?php wp_title('|', true, 'right'); ?></title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php print get_stylesheet_uri() ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
<div class="container">
	<div id="page-container">
		<div id="logo">
			<a href="<?php print site_url() ?>" title="<?php print esc_attr(get_bloginfo('description')) ?>" class="logo-link">
				<?php
				if(get_header_image()){
					?><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php print esc_attr(get_bloginfo('name')) ?>" /><?php
				}
				else{
					?>
					<h1 class="logo"><?php bloginfo('name') ?></h1><br/>
					<h3 class="logo"><?php bloginfo('description') ?></h3>
					<?php
				}
				?>
			</a>
			<?php if(so_setting('display_header_search')) get_search_form(); ?>
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