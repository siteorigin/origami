<?php get_header(); the_post(); ?>

<h1 class="archive-header"><?php printf(__('Posts By %s','origami', 'Post author') , get_the_author_meta('display_name')) ?></h1>

<div>
	<?php rewind_posts(); get_template_part('loop', 'index') ?>
</div>

<div id="posts-nav">
	<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi() ?>
	<?php else : ?>
		<?php posts_nav_link('','newer entries','older entries'); ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>