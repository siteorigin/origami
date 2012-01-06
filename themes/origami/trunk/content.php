<?php $origami_settings = OrigamiController::single()->get_settings(); ?>

<?php if(has_post_thumbnail()) : ?>
	<div class="featured-image">
			<img src="<?php print Origin::single()->image->get_preset_url('main-image', get_post_thumbnail_id()) ?>" class="main-image" />
			<div class="date"><?php print get_the_date('j M') ?> <span class="year"><?php print get_the_date('Y') ?></span></div>
	</div>
<?php endif; ?>

<h1 <?php if(!($origami_settings['display']['comment_counts'] || $origami_settings['display']['post_author'])) print 'class="noinfo"'  ?>><a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a></h1>

<?php if($origami_settings['display']['comment_counts'] || $origami_settings['display']['post_author']) :  ?>
	<div class="post-info">
		<?php if($origami_settings['display']['post_author']) printf(__('By %s', 'origami'), get_the_author()); ?>
		<?php if($origami_settings['display']['comment_counts'] && $origami_settings['display']['post_author']) _e('with', 'origami') ?>
		<?php if($origami_settings['display']['comment_counts']) printf(__('<strong>%u</strong> comments', 'origami'), $post->comment_count); ?>
	</div>
<?php endif; ?>

<?php $columns = get_post_meta($post->ID, 'content_columns', true); if(!$columns) $columns = 2; ?>
<div class="content column-<?php print intval($columns) ?>"><?php the_content(); ?></div>