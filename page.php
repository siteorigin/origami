<?php get_header(); the_post(); ?>

<div <?php post_class('post') ?>>
	<h1 class="entry-title noinfo"><?php the_title(); ?></h1>
	
	<div class="content">
		<?php the_content() ?>
	</div>
</div>

<?php get_footer() ?>