<li>
	<div class="comment-wrapper comment-depth-<?php print $depth ?> comment-type-<?php print empty($comment->comment_type) ? 'normal' : $comment->comment_type ?>">
		<?php if(empty($comment->comment_type)) : ?>
			<div class="avatar-container">
				<?php print get_avatar(get_comment_author_email(), $depth == 1 ? 60 : 45) ?>
			</div>
		<?php endif; ?>

		<div class="comment-container">
			<?php if($depth <= $args['max_depth']) : ?>
				<?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])) ?>
			<?php endif; ?>
			
			<div class="info">
				<span class="author"><?php comment_author_link() ?></span>
				<span class="date"><?php comment_date() ?></span>
			</div>

			<div class="comment-content content">
				<?php comment_text() ?>
			</div>
		</div>

		<div class="clear"></div>
	</div>