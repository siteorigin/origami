<?php get_header(); the_post(); ?>

<h1 class="archive-header"><?php printf(__('Posts By %s','origami') , get_the_author_meta('display_name')) ?></h1>

<div><?php rewind_posts(); get_template_part('loop', 'index') ?></div>

<?php if(get_posts_nav_link()) : ?>
	<div id="posts-nav">
		<?php posts_nav_link('', __('Newer Entries', 'origami'), __('Older Entries', 'origami')); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>