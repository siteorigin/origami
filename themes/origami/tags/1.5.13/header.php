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

<?php do_action('origami_top'); ?>

<div class="container">

	<?php do_action('origami_before_page_container') ?>

	<div id="page-container">

		<?php do_action('origami_top_page_container') ?>

		<?php get_template_part('parts/logo', 'top') ?>

		<?php do_action('origami_after_logo_wrapper') ?>

		<?php get_template_part('parts/menu', 'top') ?>