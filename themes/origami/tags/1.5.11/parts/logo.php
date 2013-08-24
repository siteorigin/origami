<div id="logo" <?php if( siteorigin_setting( 'display_logo_centered' ) ) echo 'class="logo-centered"' ?>>
	<a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ) ?>" class="logo-link">
		<?php if( get_header_image() ) : ?>
			<img src="<?php esc_url(header_image()); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" />
		<?php else : ?>
			<h1 class="logo"><?php bloginfo('name') ?></h1><br/>
			<h3 class="logo"><?php bloginfo('description') ?></h3>
		<?php endif; ?>
	</a>
	<?php if(siteorigin_setting('display_header_search')) get_search_form(); ?>
</div>

<?php do_action('origami_after_logo') ?>