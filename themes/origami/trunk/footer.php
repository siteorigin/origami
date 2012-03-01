		<?php $sidebars_widgets = wp_get_sidebars_widgets(); ?>
		
		<?php if(!empty($sidebars_widgets['site-footer'])) : ?>
			<div id="footer-widgets" class="grid noneg" data-responsive="420=1&640=50%">
				<?php dynamic_sidebar('Footer') ?>
			</div>
		<?php endif; ?>
	</div>
	
	<div id="footer">
		<?php $first = OrigamiController::first_post_date(); ?>
		
		<?php if(date('Y', $first) == date('Y')) : ?>
			<div class="copyright"><?php printf('&copy; %s %u', get_bloginfo('name'), date('Y')) ?></div>
		<?php else : ?>
			<div class="copyright"><?php printf('&copy; %s %u-%u', get_bloginfo('name'), date('Y', $first), date('Y')) ?></div>
		<?php endif; ?>
		
		<div class="designed">
			<?php printf(__('Designed By %s', 'origami'), '<a href="'. Origin::single()->info['designer_url'].'">'. Origin::single()->info['designer_name'].'</a>') ?>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>