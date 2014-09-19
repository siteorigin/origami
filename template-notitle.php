<?php
/*
Template Name: Without Page Title
*/
get_header(); the_post();
?>

	<div <?php post_class('post') ?>>
		<div class="content">
			<?php the_content() ?>
			<div class="clear"></div>
		</div>

		<?php if(is_singular()) comments_template(); ?>
	</div>

<?php get_footer() ?>