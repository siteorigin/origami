<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2><?php _e('Origami Settings', 'origami') ?></h2>
	
	<form action="" method="POST">
		<h3><?php _e('Display', 'origami') ?></h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="post_author"><?php _e('Post Author') ?></label></th>
				<td>
					<input name="post_author" type="checkbox" id="post_author" <?php @checked($settings['display']['post_author']) ?> /> <label for="post_author"><?php _e('Display') ?></label>
					<div class="description"><?php _e("Display the post author under the headline.") ?></div>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="post_tags"><?php _e('Post Tags') ?></label></th>
				<td>
					<input name="post_tags" type="checkbox" id="post_tags" <?php @checked($settings['display']['post_tags']) ?> /> <label for="post_tags"><?php _e('Display') ?></label>
					<div class="description"><?php _e("Display post tags after the content.") ?></div>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="post_categories"><?php _e('Post Categories') ?></label></th>
				<td>
					<input name="post_categories" type="checkbox" id="post_categories" <?php @checked($settings['display']['post_categories']) ?> /> <label for="post_categories"><?php _e('Display') ?></label>
					<div class="description"><?php _e("Display post categories after the content.") ?></div>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="comment_counts"><?php _e('Comment Counts') ?></label></th>
				<td>
					<input name="comment_counts" type="checkbox" id="comment_counts" <?php @checked($settings['display']['comment_counts']) ?> /> <label for="comment_counts"><?php _e('Display') ?></label>
					<div class="description"><?php _e("Display comments count under the headline.") ?></div>
				</td>
			</tr>
		</table>
		
		<?php wp_nonce_field('origami-settings') ?>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
	</form>
</div>