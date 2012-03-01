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
		$upload_url = Origin::single()->get_storage_url('uploads');
	
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
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />
	<?php wp_head(); ?>	
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php $favicon = Origin::single()->settings->get_value('general', 'favicon'); if(empty($favicon)) : ?>
		<link rel="shortcut icon" href="<?php get_template_directory_uri() ?>/images/favicon.png" type="image/x-icon" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?php print $upload_url.'/'.$favicon['filename'] ?>" type="image/x-icon" />
	<?php endif; ?>
	
</head>

<body <?php body_class() ?>>
<div class="container">
	<div id="page-container">
		<div id="logo">
			<a href="<?php print site_url() ?>" title="<?php _e('Go Home', 'origami') ?>">
				<?php $logo = Origin::single()->settings->get_value('general', 'logo'); ?>
				<?php if(empty($logo)) : ?>
					<img src="<?php print get_template_directory_uri() ?>/images/logo.png" id="logo-image" />
				<?php else :  ?>
					<img src="<?php print $upload_url.'/'.$logo['filename'] ?>" id="logo-image" />
				<?php endif; ?>
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