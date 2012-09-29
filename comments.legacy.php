<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (_e('Please do not load this page directly. Thanks!', "mandm"));

	if ( $post->post_password ) { ?>
		<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "mandm"); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( $comments ) : ?>
	<h3 id="comments"><span><?php comments_number(__('No comments', "mandm"), __('One comment', "mandm"), __('% comments', "mandm") );?></span> <?php _e("to", "mandm"); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

		<?php foreach ($comments as $comment) : ?>

			<li class="comment" id="comment-<?php comment_ID(); ?>">
				<div id="div-comment-<?php comment_ID(); ?>">
					<div class="comment-author">
						<?php echo get_avatar($comment, $size = 85); ?>						<cite><?php comment_author_link(); ?></cite> <?php _e("说：", "mandm"); ?>
					</div>
					<div class="comment-meta">
						<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
					</div>
				</div>

				<?php comment_text(); ?>
				
				<?php if ($comment->comment_approved == '0') : ?>
					<em>非常感谢您的关注，我将马上通知博主审核您的评论！</em>
				<?php endif; ?>

			</li>

		<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php _e('回复', "mandm"); ?></h3>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<?php $loginLink = '<a href="'. get_option('siteurl') .'/wp-login.php?redirect_to='. urlencode(get_permalink()) .'">'.__('logged in', 'mandm').'</a>'; ?>
	<p><?php sprintf(__('You must be $1%s to post a comment', "mandm"), $loginLink) ?>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e("Logged in as", "mandm"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', 'mandm'); ?>"><?php _e("Log out", "mandm"); ?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e("Name", "mandm"); ?> <?php if ($req) echo __("(required)", "mandm"); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e("Mail (will not be published)", "mandm"); ?> <?php if ($req) echo  __("(required)", "mandm"); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e("Website", "mandm"); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" width="550px" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment", "mandm"); ?>" />

</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
