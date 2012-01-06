<?php $origami_settings = OrigamiController::single()->get_settings(); ?>

<div class="featured-video">
	<?php print Origin_Video::get_video_html($post->ID) ?>
</div>

<h1 <?php if(!($origami_settings['display']['comment_counts'] || $origami_settings['display']['post_author'])) print 'class="noinfo"'  ?>><a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a></h1>

<?php if($origami_settings['display']['comment_counts'] || $origami_settings['display']['post_author']) :  ?>
	<div class="post-info">
		<?php if($origami_settings['display']['post_author']) printf(__('By %s', 'origami'), get_the_author()); ?>
		<?php if($origami_settings['display']['comment_counts'] && $origami_settings['display']['post_author']) _e('with', 'origami') ?>
		<?php if($origami_settings['display']['comment_counts']) printf(__('<strong>%u</strong> comments', 'origami'), $post->comment_count); ?>
	</div>
<?php endif; ?>

<?php $columns = get_post_meta($post->ID, 'content_columns', true); if(!$columns) $columns = 2; ?>
<div class="content column-<?php print intval($columns) ?>">
	<?php the_content(); ?>
</div>