		<?php $sidebars_widgets = wp_get_sidebars_widgets(); ?>
		
		<?php if(!empty($sidebars_widgets['site-footer'])) : ?>
			<div id="footer-widgets">
				<?php dynamic_sidebar('Footer') ?>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
	</div>
	
	<div id="footer">
		<?php $first = origami_first_post_date(); ?>
		
		<?php if(date('Y', $first) == date('Y')) : ?>
			<div class="copyright"><?php printf('&copy; %s %u', get_bloginfo('name'), date('Y')) ?></div>
		<?php else : ?>
			<div class="copyright"><?php printf('&copy; %s %u-%u', get_bloginfo('name'), date('Y', $first), date('Y')) ?></div>
		<?php endif; ?>

		<?php siteorigin_attribution_footer('<div class="designed">', '</div>') ?>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>