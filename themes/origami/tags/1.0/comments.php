<?php if(post_password_required()) : ?>
	<a name="comments"></a>
	<div id="comments">
		<p><?php _e('Password Required', 'origami') ?></p>
	</div>
	<?php return; ?>
<?php endif; ?>

<?php if(have_comments() || comments_open()) : ?>
	<a name="comments"></a>
	<div id="comments" class="section">
		<?php if(have_comments()) : ?>
			
		<h3 class="comments-title">
			<?php
			printf(
				_n('One Comment', '%1$s Comments', get_comments_number(), 'origami'),
				number_format_i18n(get_comments_number()),
				'<em>' . get_the_title() . '</em>'
			);
			?>
		</h3>
	
		<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
			<div class="navigation">
				<div
					class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'origami')); ?></div>
				<div
					class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'origami')); ?></div>
			</div>
			<?php endif; ?>
	
		<ol class="commentlist">
			<?php
			// List comments
			wp_list_comments(array(
				'callback' => create_function(
					'$this_comment, $args, $depth',
					'the_comment(); global $comment; $comment = $this_comment; include("' . dirname(__FILE__) . '/comment-single.php");'
				)
			));
			?>
		</ol>
		<?php endif; ?>
	
		<?php
		comment_form(array(
			'fields' => array(
				'author' => sprintf('<input name="author" type="text" placeholder="%s" />', __('Name', 'origami')),
				'email' => sprintf('<input name="author" type="text" placeholder="%s" />', __('Email', 'origami')),
				'url' => sprintf('<input name="author" type="text" placeholder="%s" />', __('Website', 'origami')),
			),
			'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
			'title_reply' => sprintf(
				'<h3 class="comments-title">%s</h3>',
				__( 'Leave a Reply' , 'origami')
			),
			'title_reply_to' => sprintf(
				'<div class="section-title decorated-title"><div class="wrap"><div class="title">%s</div><div class="after-pattern"><div></div></div></div></div>',
				__( 'Leave a Reply To %s' , 'origami')
			)
		));
		?>
	</div>
<?php endif; ?>

<?php if(!comments_open()) : ?>
	<div id="comments" class="comments-disabled content">
		<p><?php _e('Comments are Disabled', 'origami') ?></p>
	</div>
<?php endif; ?>