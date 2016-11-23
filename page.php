<?php get_header(); the_post(); ?>

<div <?php post_class('post') ?>>
	<?php if( has_post_thumbnail() && siteorigin_setting( 'display_featured_image' ) ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail( null, array( 'class' => 'main-image' ) ) ?>
		</div>
	<?php endif; ?>
	
	<h1 class="entry-title noinfo"><?php the_title(); ?></h1>
	
	<div class="content">
		<?php the_content() ?>
		<div class="clear"></div>
	</div>

	<?php if(is_singular()) comments_template(); ?>
</div>
	
<?php get_footer() ?>
