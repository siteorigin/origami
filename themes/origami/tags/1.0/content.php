<?php if(has_post_thumbnail()) : ?>
<div class="featured-image">
	<?php the_post_thumbnail(null, array('class' => 'main-image desktop')) ?>
	<?php the_post_thumbnail('post-thumbnail-mobile', array('class' => 'main-image mobile')) ?>
</div>
<?php endif; ?>

<h1 class="entry-title">
	<?php if(is_singular()) : ?>
		<?php the_title() ?>
	<?php else : ?>
		<a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a>
	<?php endif; ?>
</h1>

<div class="post-info">
	<?php printf(__('On %s', 'origami', 'post date'), get_the_date()) ?>
	<?php if(simple_options_get('display', 'post_author')) printf(__('by %s', 'origami', 'post author'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
	<?php if(simple_options_get('display', 'comment_counts') && simple_options_get('display', 'post_author')) _e('With', 'origami') ?>
	<?php if(simple_options_get('display', 'comment_counts')) printf(__('<strong>%u</strong> Comments', 'origami', 'comment count'), $post->comment_count); ?>
	
	<?php if(has_category()) :  ?>
		- <?php the_category(', ') ?>
	<?php endif; ?>
</div>

<?php
	if(simple_options_get('display', 'use_columns')){
		$columns = get_post_meta($post->ID, 'content_columns', true);
		if($columns === false) $columns = 2;
	}
	else{
		$columns = 1;
	}
?>
<div class="content column-<?php print $columns ?>">
	<?php the_content(); ?>
</div>