<?php
/*
Template Name: Blog
*/

global $wp_query;
query_posts(array(
	'paged' => $wp_query->get('paged'),
));
get_template_part('index');

wp_reset_query();
wp_reset_postdata();