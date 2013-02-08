<?php
/*
Template Name: Without Page Title
*/
get_header(); the_post();
?>

<div <?php post_class('post') ?>>
	<div class="content">
		<?php echo siteorigin_panels_render('home'); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer() ?>