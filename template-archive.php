<?php
/*
Template Name: Archives
*/

get_header(); the_post();
?>

	<div <?php post_class('post') ?>>
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