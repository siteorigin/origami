<?php get_header() ?>

<div><?php get_template_part('loop', 'index') ?></div>

<div id="posts-nav">
	<?php posts_nav_link('', __('Newer Entries', 'origami'), __('Older Entries', 'origami')); ?>
</div>

<?php get_footer() ?>