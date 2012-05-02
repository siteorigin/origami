<?php get_header() ?>

<h1 class="archive-title">
	<?php printf( __( 'Search Results for: %s', 'origami' ), '<span>' . get_search_query() . '</span>' ); ?>
</h1>

<?php get_template_part('loop', 'index') ?>

<div id="posts-nav">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi() ?>
	<?php else : ?>
	<?php posts_nav_link('','newer entries','older entries'); ?>
	<?php endif; ?>
</div>

<?php get_footer() ?>