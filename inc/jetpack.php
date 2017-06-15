<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package origami
 * @license GPL 2.0 
 */

if ( ! function_exists( 'origami_jetpack_setup' ) ) :
/**
 * Jetpack setup function.
 *
 */
function origami_jetpack_setup() {
	/*
	 * Enable support for Jetpack Infinite Scroll.
	 * See: https://jetpack.com/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container' => '#content',
		'footer' => '#page-container',
		'render' => 'origami_infinite_scroll_render'
	) );

	/*
	 * Enable support for Responsive Videos.
	 * See: https://jetpack.com/support/responsive-videos/
	 */
	add_theme_support( 'jetpack-responsive-videos' );
}
endif;
// polestar_jetpack_setup
add_action( 'after_setup_theme', 'origami_jetpack_setup' );

if ( ! function_exists( 'origami_infinite_scroll_render' ) ) :
/**
 * Custom render function for Infinite Scroll.
 */
function origami_infinite_scroll_render() {
	get_template_part( 'loop', 'index' );
}
endif;