<?php get_header(); the_post(); global $post; ?>
<div <?php post_class() ?>>

	<?php if(has_post_thumbnail() && get_post_format() != 'image' && so_setting('display_featured_image')) : ?>
	<div class="featured-image">
		<?php the_post_thumbnail(null, array('class' => 'main-image desktop')) ?>
		<?php the_post_thumbnail('post-thumbnail-mobile', array('class' => 'main-image mobile')) ?>
	</div>
	<?php endif; ?>

	<?php if(!in_array(get_post_format(), array('aside', 'link', 'status'))) : ?>
	<h1 class="entry-title">
		<?php if(is_singular()) : ?>
		<?php the_title() ?>
		<?php else : ?>
		<a href="<?php print get_post_permalink() ?>"><?php the_title() ?></a>
		<?php endif; ?>
	</h1>

	<div class="post-info">
		<?php printf(__('On %s', 'origami'), get_the_date()) ?>
		<?php if(so_setting('display_post_author')) printf(__('by %s', 'origami'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
		<?php if(so_setting('display_comment_counts') && so_setting('display_post_author')) _e('With', 'origami') ?>
		<?php if(so_setting('display_comment_counts')) printf(__('<strong>%u</strong> Comments', 'origami'), $post->comment_count); ?>

		<?php if(has_category()) :  ?>
		- <?php the_category(', ') ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php
	if(so_setting('display_use_columns') && get_post_format() === false){
		$columns = get_post_meta($post->ID, 'content_columns', true);
		if($columns === false) $columns = 2;
	}
	else $columns = 1;
	?>
	<div class="content column-<?php print $columns ?>">
		<?php if(has_post_thumbnail() && get_post_format() == 'image') : ?>
		<div class="featured-image">
			<?php the_post_thumbnail(null, array('class' => 'main-image desktop')) ?>
			<?php the_post_thumbnail('post-thumbnail-mobile', array('class' => 'main-image mobile')) ?>
		</div>
		<?php endif; ?>

		<?php the_content(' '); ?>
		<div class="clear"></div>
	</div>

	<?php
	wp_link_pages(array(
		'before' => '<p class="page-links content">' . __('Pages:', 'origami'),
		'after' => '</p>',
	))
	?>

	<?php $tags = wp_get_post_tags($post->ID); ?>
	<?php if(!empty($tags) || !is_singular() || so_setting('social_share')) : ?>
	<div class="below-content">
		<?php if(has_tag()) : ?>
		<div class="tags">
			<svg version="1.1" width="18px" height="18px" viewBox="0 0 48 48">
				<path d="M 41.29511 48 L 41.29511 .091884613 L 6.999998 .091884613 L 6.999998 47.78994 L 24.042513 30.74741 Z" />
			</svg>
			<div class="the_tags">
				<?php the_tags('') ?>
			</div>
		</div>
		<?php endif ?>

		<?php if((!is_singular() && preg_match( '/<!--more(.*?)?-->/', $post->post_content )) || empty($post->post_title)) : ?>
		<div class="read-more">
			<a href="<?php print get_post_permalink() ?>"><?php _e('Continue Reading', 'origami') ?></a>
			<svg version="1.1" width="18px" height="18px" viewBox="0 0 48 48">
				<path d="M 0 32 L 0 16 L 26 16 L 26 8 L 48 24 L 26 40 L 26 32 Z" />
			</svg>
		</div>
		<?php elseif(so_setting('social_share') && function_exists('so_share_render')) : so_share_render(array('twitter' => so_setting('social_twitter'))); endif; ?>

		<div class="clear"></div>
	</div>
	<?php endif; ?>

	<?php if(is_singular()) : ?>
	<div id="single-comments-wrapper">
		<?php comments_template() ?>
	</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>