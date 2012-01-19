<label>Columns</label>
<select name="content_columns">
	<option value="1" <?php selected($columns, 1) ?>>1 Column</option>
	<option value="2" <?php selected($columns, 2) ?>>2 Columns</option>
	<option value="3" <?php selected($columns, 3) ?>>3 Columns</option>
</select>
<?php wp_nonce_field('save-columns', '_wpnonce_cm') ?>