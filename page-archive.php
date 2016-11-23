<?php
get_header(); the_post();
update_post_meta( get_the_ID(), '_wp_page_template', 'template-archive.php' );
?>

<div <?php post_class('post') ?>>
	<?php if( has_post_thumbnail() && siteorigin_setting( 'display_featured_image' ) ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail( null, array( 'class' => 'main-image' ) ) ?>
		</div>
	<?php endif; ?>
	
	<h1 class="entry-title noinfo"><?php the_title(); ?></h1>
	
	<div class="content">
		<?php the_content() ?>
	</div>
	
	<div class="content" id="blog-archives">
		<h2><?php _e('Recent Posts', 'origami') ?></h2>
		<?php $recent = get_posts( array('numberposts' => 4) ); ?>
		<?php if(!empty($recent)) : ?>
			<ul>
				<?php foreach($recent as $recent_post) : ?>
					<li><a href="<?php echo get_permalink($recent_post->ID) ?>"><?php echo $recent_post->post_title ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	
		<h2><?php _e('By Year', 'origami') ?></h2>
		<ul><?php wp_get_archives(array('type' => 'yearly')); ?></ul>
		
		<h2><?php _e('By Month', 'origami') ?></h2>
		<ul><?php wp_get_archives(array('type' => 'monthly')); ?></ul>
		
		<h2><?php _e('Categories', 'origami') ?></h2>
		<ul><?php wp_list_categories(array('title_li' => false )); ?></ul>
	</div>
</div>

<?php get_footer(); ?>
