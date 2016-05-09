<?php get_header() ?>

<div id="content"><?php get_template_part('loop', 'index') ?></div>

<?php if( !(class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) : ?>
<div id="posts-nav">
	<?php posts_nav_link('', __('Newer Entries', 'origami'), __('Older Entries', 'origami')); ?>
</div>
<?php endif; ?>

<?php get_footer() ?>