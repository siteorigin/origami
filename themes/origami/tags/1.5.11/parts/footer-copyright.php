<div id="footer">
	<?php if(siteorigin_setting('text_copyright') != '') : ?>
		<div class="copyright"><?php echo wp_kses_post( siteorigin_setting('text_copyright') ) ?></div>
	<?php endif; ?>

	<?php echo apply_filters('siteorigin_attribution_footer', '<div class="designed">' . sprintf(__('Theme By %s', 'origami'), '<a href="http://siteorigin.com">SiteOrigin</a>') . '</div>') ?>
	<div class="clear"></div>
</div>