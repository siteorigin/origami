<?php $origami_settings = OrigamiController::single()->get_settings(); ?>

<?php if(has_post_thumbnail()) : ?>
	<div class="featured-image">
		<img src="<?php print Origin::single()->image->get_preset_url('main-image', get_post_thumbnail_id()) ?>" class="main-image" />
	</div>
<?php endif; ?>

<h1 <?php if(!($origami_settings['display']['comment_counts'] || $origami_settings['display']['post_author'])) print 'class="noinfo"'  ?>>
	<a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a>
</h1>

<div class="post-info">
	<?php printf(__('On %s', 'origami'), get_the_date()) ?>
	<?php if($origami_settings['display']['post_author']) printf(__('By %s', 'origami'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
	<?php if($origami_settings['display']['comment_counts'] && $origami_settings['display']['post_author']) _e('With', 'origami') ?>
	<?php if($origami_settings['display']['comment_counts']) printf(__('<strong>%u</strong> Comments', 'origami'), $post->comment_count); ?>
</div>

<?php $columns = get_post_meta($post->ID, 'content_columns', true); if(!$columns) $columns = 2; ?>
<div class="content column-<?php print intval($columns) ?>"><?php the_content(); ?></div>