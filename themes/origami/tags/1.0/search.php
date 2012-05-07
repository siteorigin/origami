<?php get_header() ?>

<h1 class="archive-title">
	<?php printf( __( 'Search Results for: %s', 'origami' ), '<span>' . get_search_query() . '</span>' ); ?>
</h1>

<?php if(have_posts()) : ?>
	<?php get_template_part('loop', 'index') ?>
	<div id="posts-nav">
		<?php posts_nav_link('', __('newer entries', 'origami', 'navigation'), __('older entries', 'origami', 'navigation')); ?>
	</div>
<?php else : ?>
	<div class="content">
		<?php print simple_options_get('messages', 'no_results') ?>
	</div>
<?php endif ?>

<?php get_footer() ?>