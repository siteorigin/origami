<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); global $post; ?>
		<div <?php post_class() ?>>

			<?php if(has_post_thumbnail() && get_post_format() != 'image' && siteorigin_setting('display_featured_image')) : ?>
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
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					<?php endif; ?>
				</h1>
	
				<div class="post-info">
					<?php printf(__('On %s', 'origami'), get_the_date()) ?>
					<?php if(siteorigin_setting('display_post_author')) printf(__('by %s', 'origami'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
					<?php if(siteorigin_setting('display_comment_counts') && siteorigin_setting('display_post_author')) _e('With', 'origami') ?>
					<?php if(siteorigin_setting('display_comment_counts')) printf(__('<strong>%u</strong> Comments', 'origami'), $post->comment_count); ?>
	
					<?php if(has_category()) :  ?>
					- <?php the_category(', ') ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php
			if(siteorigin_setting('display_use_columns') && get_post_format() === false){
				$columns = get_post_meta($post->ID, 'content_columns', true);
				if($columns === false) $columns = 2;
			}
			else $columns = 1;
			?>
			<div class="content column-<?php echo $columns ?>">
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
			wp_link_pages( array(
				'before' => '<p class="page-links content">' . __('Pages:', 'origami'),
				'after' => '</p>',
			) )
			?>
			
			<?php $tags = wp_get_post_tags($post->ID); ?>
			<?php if(!empty($tags) || !is_singular()) : ?>
				<div class="below-content tagged">
					<?php if(has_tag()) : ?>
						<div class="tags">
							<div class="origami-icon-tag"></div>
							<div class="the_tags">
								<?php the_tags('') ?>
							</div>
						</div>
					<?php endif ?>
					
					<?php if((!is_singular() && preg_match( '/<!--more(.*?)?-->/', $post->post_content )) || empty($post->post_title)) : ?>
						<div class="read-more">
							<a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'origami') ?></a>
							<div class="origami-icon-more"></div>
						</div>
					<?php elseif(siteorigin_setting('social_share') && function_exists('siteorigin_share_render')) : ?>
						<?php siteorigin_share_render(array('twitter' => siteorigin_setting('social_twitter'))); ?>
					<?php endif; ?>

					<div class="clear"></div>
				</div>

			<?php elseif(siteorigin_setting('social_share') && function_exists('siteorigin_share_render')) : ?>
				<div class="below-content">
					<?php siteorigin_share_render(array('twitter' => siteorigin_setting('social_twitter'))); ?>
					<div class="clear"></div>
				</div>
			<?php endif; ?>

			<?php if(is_single() && siteorigin_setting('display_next_prev')) : ?>
				<div class="post-navigation">
					<?php next_post_link('%link'); previous_post_link('%link'); ?>
					<div class="clear"></div>
				</div>
			<?php endif; ?>
			
			<?php comments_template() ?>

		</div>
	<?php endwhile; ?>
<?php endif; ?>