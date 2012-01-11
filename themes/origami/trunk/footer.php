		<div id="footer-widgets">
			<?php dynamic_sidebar() ?>
		</div>
	</div>
	
	<div id="footer">
		<?php $first = OrigamiController::first_post_date(); ?>
		
		<?php if(date('Y', $first) == date('Y')) : ?>
			<div class="copyright"><?php printf('&copy; %s %u', get_bloginfo('name'), date('Y')) ?></div>
		<?php else : ?>
			<div class="copyright"><?php printf('&copy; %s %u-%u', get_bloginfo('name'), date('Y', $first), date('Y')) ?></div>
		<?php endif; ?>
		
		<div class="designed"><?php printf(__('%s Theme By %s', 'origami'), '<a href="http://siteorigin.com/theme/origami">Origami</a>',  '<a href="http://siteorigin.com">SiteOrigin</a>') ?></div>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>