<label>Columns</label>
<select name="content_columns">
	<?php for($i = 1; $i <= 3; $i++) : ?>
		<option value="<?php print $i ?>" <?php selected($columns, $i) ?>><?php _n('%1$s Column', '%1$s Columns', 1, 'origami') ?></option>
	<?php endfor ?>
</select>
<?php wp_nonce_field('save-columns', '_wpnonce_cm') ?>