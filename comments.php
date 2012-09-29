<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (_e('Please do not load this page directly. Thanks!', "mandm"));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "mandm"); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<!-- pingbacks -->
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
		<h3 id="pings"><?php echo(sprintf(__("<span>Pingbacks</span> to &#8220;%s&#8221;"), the_title('', '', false))); ?></h3>	
		<ol class="commentlist">
		<?php wp_list_comments('type=pings&callback=list_pings'); ?>
		</ol>
		<!--
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
		-->
	<?php endif; ?>
	
	<!-- comments -->
	<?php if ( ! empty($comments_by_type['comment']) ) : ?>
		<h3 id="comments">
		<span>
<?php comments_number(__('', "mandm"), __('已有 1 条评论（包括Pings）', "mandm"), __('已有 % 条评论（包括Pings）', "mandm") );?>		</span> </h3>
	
		<ol class="commentlist">
		<?php wp_list_comments(array('type' => 'comment', 'avatar_size'=>85, 'reply_text'=>__('回复') )); ?>
		</ol>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	<?php endif; ?>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title( __('添加评论', "mandm"), __('回复 %s', "mandm") ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link("点击这里取消回复"); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<?php $loginLink = '<a href="'. get_option('siteurl') .'/wp-login.php?redirect_to='. urlencode(get_permalink()) .'">'.__('logged in', 'mandm').'</a>'; ?>
<p><?php sprintf(__('You must be $1%s to post a comment', "mandm"), $loginLink) ?>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e("已登入用户", "mandm"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('登出帐户', 'mandm'); ?>"><?php _e("登出", "mandm"); ?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e("名字", "mandm"); ?> <?php if ($req) echo __("(必填)", "mandm"); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e("邮箱(绝不公开)", "mandm"); ?> <?php if ($req) echo  __("(必填)", "mandm"); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e("网站", "mandm"); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" width="550px" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("提交评论", "mandm"); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
