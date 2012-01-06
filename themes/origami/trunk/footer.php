		<div id="footer-widgets">
			<?php dynamic_sidebar() ?>
		</div>
	</div>
	
	<div id="footer">
		<div class="copyright"><?php printf(__('&copy; %s %u-%u'), get_bloginfo('name'), date('Y'), date('Y')) ?></div>
		<div class="designed"><?php printf(__('%s Theme By %s', 'origami'), '<a href="http://siteorigin.com/theme/origami">Origami</a>',  '<a href="http://siteorigin.com">SiteOrigin</a>') ?></div>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>