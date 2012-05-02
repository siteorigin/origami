<h1 class="entry-title <?php if(!(Origin::single()->options->get('display', 'comment_counts') || Origin::single()->options->get('display', 'post_author'))) print 'noinfo'  ?>">
	<a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a>
</h1>

<div class="post-info">
	<?php printf(__('On %s', 'origami'), get_the_date()) ?>
	<?php if(Origin::single()->options->get('display', 'post_author')) printf(__('By %s', 'origami'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
	<?php if(Origin::single()->options->get('display', 'comment_counts') && Origin::single()->options->get('display', 'post_author')) _e('With', 'origami') ?>
	<?php if(Origin::single()->options->get('display', 'comment_counts')) printf(__('<strong>%u</strong> Comments', 'origami'), $post->comment_count); ?>
</div>

<?php $columns = get_post_meta($post->ID, 'content_columns', true); if(!$columns) $columns = 2; ?>
<div class="content">
	<?php the_content(); ?>
</div>