		<?php $sidebars_widgets = wp_get_sidebars_widgets(); ?>
		
		<?php if(!empty($sidebars_widgets['site-footer'])) : ?>
			<div id="footer-widgets">
				<?php dynamic_sidebar('Footer') ?>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
	</div>
	
	<div id="footer">
		<div class="copyright"><?php print simple_options_get('general', 'copyright') ?></div>

		<?php origami_attribution_footer('<div class="designed">', '</div>') ?>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>