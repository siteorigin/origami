<?php get_header() ?>

<h1 class="archive-title">
	<?php if ( is_day() ) : ?>
		<?php printf( __( 'Daily Archives: %s', 'origami' ), '<span>' . get_the_date() . '</span>' ); ?>
	<?php elseif ( is_month() ) : ?>
		<?php printf( __( 'Monthly Archives: %s', 'origami' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'origami' ) ) . '</span>' ); ?>
	<?php elseif ( is_year() ) : ?>
		<?php printf( __( 'Yearly Archives: %s', 'origami' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'origami' ) ) . '</span>' ); ?>
	<?php elseif ( is_tag() ) : ?>
		<?php printf( __( 'Posts Tagged: %s', 'origami' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
	<?php elseif ( is_category() ) : ?>
		<?php printf( __( 'Posts in Category: %s', 'origami' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
	<?php elseif ( is_search() ) : ?>
		<?php printf( __( 'Search Results for: %s', 'origami' ), '<span>' . get_search_query() . '</span>' ); ?>
	<?php else : ?>
		<?php _e( 'Blog Archives', 'origami' ); ?>
	<?php endif; ?>
</h1>

<?php the_archive_description( '<div class="archive-description">', '</div>' ) ?>

<?php get_template_part('loop', 'index') ?>

<div id="posts-nav">
	<?php posts_nav_link('', __('Newer Entries', 'origami'), __('Older Entries', 'origami')); ?>
</div>

<?php get_footer() ?>
