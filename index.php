<?php get_header() ?>

<div>
	<?php get_template_part('loop', 'index') ?>
</div>

<?php if(!is_single()) : ?>
	<div id="posts-nav">
		<?php if(function_exists('wp_pagenavi')) : ?>
			<?php wp_pagenavi() ?>
		<?php else : ?>
			<?php posts_nav_link('','newer entries','older entries'); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php get_footer() ?>