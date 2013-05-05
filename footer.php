		<?php $sidebars_widgets = wp_get_sidebars_widgets(); ?>
		
		<?php if(!empty($sidebars_widgets['site-footer'])) : ?>
			<div id="footer-widgets">
				<div id="footer-widgets-wrapper">
					<?php dynamic_sidebar('Footer') ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	
	<div id="footer">
		<?php if(siteorigin_setting('text_copyright') != '') : ?>
			<div class="copyright"><?php echo wp_kses_post(siteorigin_setting('text_copyright')) ?></div>
		<?php endif; ?>

		<?php echo apply_filters('siteorigin_attribution_footer', '<div class="designed">' . sprintf(__('Theme By %s', 'origami'), '<a href="http://siteorigin.com">SiteOrigin</a>') . '</div>') ?>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>