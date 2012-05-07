<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); global $post; ?>
		<div <?php post_class() ?>>
			
			<?php get_template_part('content', get_post_format()) ?>
			
			<?php
			wp_link_pages(array(
				'before' => '<p class="page-links content">' . __('Pages:', 'origami'),
				'after' => '</p>',
			))
			?>
			
			<?php $tags = wp_get_post_tags($post->ID); ?>
			<?php if(!empty($tags) || !is_singular()) : ?>
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
					
					<?php if(!is_singular()) : ?>
						<div class="read-more">
							<a href="<?php print get_post_permalink() ?>"><?php _e('Continue Reading', 'origami') ?></a>
							<svg version="1.1" width="18px" height="18px" viewBox="0 0 48 48">
								<path d="M 0 32 L 0 16 L 26 16 L 26 8 L 48 24 L 26 40 L 26 32 Z" />
							</svg>
						</div>
					<?php endif; ?>
					<div class="clear"></div>
				</div>
			<?php endif; ?>
				
			<?php if(is_singular()) comments_template(); ?>
			
		</div>
	<?php endwhile; ?>
<?php endif; ?>