<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
do_action( 'origami_top' );
?>

<div class="container">

	<?php do_action( 'origami_before_page_container' ); ?>

	<div id="page-container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'origami' ); ?></a>

		<?php do_action( 'origami_top_page_container' ); ?>

		<?php get_template_part( 'parts/logo', 'top' ); ?>

		<?php do_action( 'origami_after_logo_wrapper' ); ?>

		<?php get_template_part( 'parts/menu', 'top' ); ?>