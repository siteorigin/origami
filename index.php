<?php get_header() ?>

<div>
	<?php get_template_part('loop', 'index') ?>
</div>

<?php if(get_posts_nav_link() != '') : ?>
	<div id="posts-nav">
		<?php posts_nav_link('', __('newer entries', 'origami', 'navigation'), __('older entries', 'origami', 'navigation')); ?>
	</div>
<?php endif; ?>

<?php get_footer() ?>