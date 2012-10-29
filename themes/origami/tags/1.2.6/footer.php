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
		<?php if(so_setting('text_copyright') != '') : ?>
			<div class="copyright"><?php print so_setting('text_copyright') ?></div>
		<?php endif; ?>

		<?php origami_attribution_footer('<div class="designed">', '</div>') ?>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>