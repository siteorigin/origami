<?php $origami_settings = OrigamiController::single()->get_settings(); ?>

<?php
	$attachments = get_children(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order ASC, ID',
		'order' => 'DESC'
	));
?>

<div class="blueberry"><ul class="slides">
	<?php foreach($attachments as $attachment): ?>
		<li><img src="<?php print Origin::single()->image->get_preset_url('main-image', $attachment->ID) ?>"  class="slide-image" /></li>
	<?php endforeach; ?>
</ul></div>
	
<h1 <?php if(!($origami_settings['display']['comment_counts'] || $origami_settings['display']['post_author'])) print 'class="noinfo"'  ?>><a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a></h1>

<div class="post-info">
	<?php printf(__('On %s', 'origami'), get_the_date()) ?>
	<?php if($origami_settings['display']['post_author']) printf(__('By %s', 'origami'), get_the_author()); ?>
	<?php if($origami_settings['display']['comment_counts'] && $origami_settings['display']['post_author']) _e('with', 'origami') ?>
	<?php if($origami_settings['display']['comment_counts']) printf(__('<strong>%u</strong> comments', 'origami'), $post->comment_count); ?>
</div>

<?php $columns = get_post_meta($post->ID, 'content_columns', true); if(!$columns) $columns = 2; ?>
<div class="content column-<?php print intval($columns) ?>">
	<?php the_content(); ?>
</div>