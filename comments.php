<div class="comments">

	<?php if($comments) : ?>
	  <?php foreach($comments as $comment) : ?>
    	<?php $comment_type = get_comment_type(); ?>
    	<?php if($comment_type == 'comment') { ?>
    		<div class='comment'>
	    		<?php echo get_avatar($comment, '50'); ?>

					<?php comment_author_link(); ?>
		      on <?php comment_date("F jS"); ?>

		      <?php if ($comment->comment_approved == '0') : ?>
		        <i>Your comment is awaiting approval.</i>
		      <?php endif; ?>

		      <div class="comment-body">
						<?php comment_text(); ?>
					</div>
		    </div>
			<?php } else { $trackback = true; } ?>
	  <?php endforeach; ?>

	  <?php if ($trackback == true) : ?>
	    <?php foreach ($comments as $comment) : ?>
		    <?php $comment_type = get_comment_type(); ?>
		    <?php if($comment_type != 'comment') : ?>
		    	<div class='trackback'>
		    		<img class='avatar' src='<?php bloginfo('template_url') ?>/images/trackback.png'/>
			    	Linked by <?php comment_author_link() ?>
			    	on <?php comment_date("F jS"); ?>
			    </div>
		    <?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>

	<?php endif; ?>

	<div class="comment-form">
		<?php if(comments_open()) : ?>
			<?php if(get_option('comment_registration') && !$user_ID) : ?>
				You must be
				<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a>
				to post a comment.
			<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
					<?php if($user_ID) : ?>
						<div class='field'>
							<label>Name</label>
							<div class='value'>
								<?php echo $user_identity; ?>.
								<small><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">Log Out</a></small>
							</div>
						</div>
					<?php else : ?>
						<div class='field'>
							<label for="comment-author" class="<?php if($req) echo 'required'; ?>">Name</label>
							<input type="text" name="author" id="comment-author" value="<?php echo $comment_author; ?>"/>
						</div>
						<div class='field'>
							<label for="comment-email" class="<?php if($req) echo 'required'; ?>">Email</label>
							<input type="text" name="email" id="comment-email" value="<?php echo $comment_author_email; ?>"/>
						</div>
						<div class='field'>
							<label for="comment-url">Website</label>
							<input type="text" name="url" id="comment-url" value="<?php echo $comment_author_url; ?>"/>
						</div>
					<?php endif; ?>

					<div class='field'>
						<label for="comment-body">Comment</label>
						<textarea name="comment" id="comment-body"></textarea>
					</div>

					<div class='actions'>
						<input type="submit" value="Comment" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"/>
					</div>
			    <?php do_action('comment_form', $post->ID); ?>
			  </form>
			<?php endif; ?>
		<?php else : ?>
			Comments are closed.
		<?php endif; ?>

	</div><!-- comment-form -->

</div><!-- comments -->