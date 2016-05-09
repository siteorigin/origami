<?php

function origami_add_legacy_settings_page(){
	add_theme_page(
		__( 'Theme Settings', 'origami' ),
		__( 'Theme Settings', 'origami' ),
		'manage_options',
		'origami-legacy-settings',
		'origami_legacy_settings_page'
	);
}
add_action( 'admin_menu', 'origami_add_legacy_settings_page' );

function origami_legacy_settings_page(){
	?>
	<div class="wrap">
		<h2><?php _e( 'Origami Settings Have Moved', 'origami' ) ?></h2>
		<p>
			<?php _e( 'Our theme settings now take advantage of the WordPress customizer.', 'origami' ); ?>
			<?php _e( 'Navigate to <strong>Appearance > Customize > Theme Settings</strong> to access theme settings.', 'origami' ); ?>
		</p>
	</div>
	<?php
}