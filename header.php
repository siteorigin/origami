<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0' />
	
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'rocket' ), max( $paged, $page ) );

	?></title>
	
	<?php wp_head(); ?>	
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php
		$favicon = Origin::single()->settings->get_value('general', 'favicon');
		if(empty($favicon)){
			?><link rel="shortcut icon" href="<?php print get_template_directory_uri() ?>/images/favicon.png" type="image/x-icon" /><?php
		}
		else{
			?><link rel="shortcut icon" href="<?php print $favicon['fileurl'] ?>" type="image/x-icon" /><?php
		}
	?>
	
</head>

<body <?php body_class() ?>>
<div class="container">
	<div id="page-container">
		<div id="logo">
			<a href="<?php print site_url() ?>" title="<?php _e('Go Home', 'origami') ?>"><img src="<?php print get_template_directory_uri() ?>/images/logo.png" /></a>
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