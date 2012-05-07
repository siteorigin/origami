<?php
	$attachments = get_children(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order ASC, ID',
		'order' => 'DESC'
	));
?>

<div class="flexslider">
	<ul class="slides">
		<?php foreach($attachments as $attachment): $src = wp_get_attachment_image_src($attachment->ID); ?>
			<li>
				<?php print wp_get_attachment_image($attachment->ID, 'origami-slider', false, array('class' => 'slide-image')); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<h1 class="entry-title">
	<a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a>
</h1>

<div class="post-info">
	<?php printf(__('On %s', 'origami'), get_the_date()) ?>
	<?php if(simple_options_get('display', 'post_author')) printf(__('By %s', 'origami'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
	<?php if(simple_options_get('display', 'comment_counts') && simple_options_get('display', 'post_author')) _e('With', 'origami') ?>
	<?php if(simple_options_get('display', 'comment_counts')) printf(__('<strong>%u</strong> Comments', 'origami'), $post->comment_count); ?>
</div>

<div class="content">
	<?php the_content(); ?>
</div>