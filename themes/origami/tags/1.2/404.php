<?php get_header(); ?>

<div class="post">
	<h1 class="entry-title noinfo"><?php _e('Not Found', 'origami') ?></h1>
	
	<div class="content" id="blog-archives">
		<?php print wpautop(so_setting('messages_not_found')) ?>
	</div>
</div>

<?php get_footer(); ?>