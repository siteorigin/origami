<?php get_header() ?>

<h1 class="archive-title">
	<?php printf( __( 'Search Results for: %s', 'origami' ), '<span>' . get_search_query() . '</span>' ); ?>
</h1>

<?php if(have_posts()) : ?>
	<?php get_template_part('loop', 'index') ?>
	<div id="posts-nav">
		<?php posts_nav_link('', __('Newer Entries', 'origami'), __('Older Entries', 'origami')); ?>
	</div>
<?php else : ?>
	<div class="content">
		<?php echo wp_kses_post(siteorigin_setting('text_no_results', __("No results for your query.", 'origami'))) ?>
	</div>
<?php endif ?>

<?php get_footer() ?>