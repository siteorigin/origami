<?php global $origami_settings; ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); global $post; ?>
		<div <?php post_class() ?>>
			
			<?php get_template_part('content', get_post_format()) ?>
			
			<?php $tags = wp_get_post_tags($post->ID); ?>
			<?php if(!empty($tags) || !is_singular()) : ?>
				<div class="below-content">
					<?php if(!empty($tags)) : ?>
						<div class="tags">
							<svg version="1.1" width="16px" height="16px" viewBox="0 0 24 24">
								<polygon points="4.392,0 4.392,23.999 11.999,16.392 19.608,24 19.608,0"/>
							</svg>
							<div class="the_tags">
								<?php foreach($tags as $tag) : ?>
									<a href="<?php print get_tag_link( $tag->term_id ) ?>"><?php print print $tag->name 	?></a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif ?>
					
					<?php if(!is_singular()) : ?>
						<div class="read-more">
							<svg version="1.1" width="16px" height="16px" viewBox="0 0 24 24">
								<polygon points="23.999,12 24,12 15.083,4.539 15.083,7.12 16.305,8.143 16.305,9.06 0,9.06 0,14.939 16.305,14.939 16.305,15.858 15.083,16.881 15.083,19.46 18.275,16.789 24,12"/>
							</svg>
							<a href="<?php print get_post_permalink() ?>">Continue Reading</a>
						</div>
					<?php endif; ?>
					<div class="clear"></div>
				</div>
			<?php endif; ?>
				
			<?php if(is_singular()) comments_template('/origin/templates/comments/standard/comments.php'); ?>
			
		</div>
	<?php endwhile; ?>
<?php endif; ?>