<?php
/*
Template Name: Blog
*/

origami_set_is_blog_archive(true);
global $wp_query;
query_posts(array(
	'paged' => $wp_query->get('paged'),
));
get_template_part('index');
origami_set_is_blog_archive(false);

wp_reset_query();
wp_reset_postdata();