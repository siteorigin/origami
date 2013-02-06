<?php
/*
Template Name: Without Page Title
*/
get_header(); the_post();
?>

<div <?php post_class('post') ?>>
	<div class="content">
		<?php siteorigin_panels_home_page_content() ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer() ?>