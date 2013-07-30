<?php get_header(); ?>

<div class="post">
	<h1 class="entry-title noinfo"><?php _e('Not Found', 'origami') ?></h1>
	
	<div class="content" id="blog-archives">
		<?php echo wpautop(wp_kses_post(siteorigin_setting('text_not_found', __("We couldn't find what you were looking for.", 'origami')))) ?>
	</div>
</div>

<?php get_footer(); ?>