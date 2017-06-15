<?php get_header(); ?>

<div id="content"><?php get_template_part( 'loop', 'index' ); ?></div>

<div id="posts-nav">
	<?php posts_nav_link( '', esc_html__( 'Newer Entries', 'origami' ), esc_html__( 'Older Entries', 'origami' ) ); ?>
</div>

<?php get_footer(); ?>