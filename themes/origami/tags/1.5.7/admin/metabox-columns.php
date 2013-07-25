<?php
global $post;
$columns = get_post_meta($post->ID, 'content_columns', true);
if(empty($columns)) $columns = 1;
?>

<label><?php _e('Columns', 'origami') ?></label>
<select name="content_columns">
	<?php for($i = 1; $i <= 3; $i++) : ?>
		<option value="<?php echo $i ?>" <?php selected($columns, $i) ?>><?php printf(_n('%1$s Column', '%1$s Columns', $i, 'origami'),$i) ?></option>
	<?php endfor ?>
</select>