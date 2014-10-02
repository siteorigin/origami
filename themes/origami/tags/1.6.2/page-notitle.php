<?php
get_header(); the_post();
update_post_meta( get_the_ID(), '_wp_page_template', 'template-notitle.php' );
?>

<div <?php post_class('post') ?>>
	<div class="content">
		<?php the_content() ?>
		<div class="clear"></div>
	</div>

	<?php if(is_singular()) comments_template(); ?>
</div>
	
<?php get_footer() ?>