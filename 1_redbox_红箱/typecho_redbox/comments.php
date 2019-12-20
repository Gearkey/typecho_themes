<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		} else {
			$commentClass .= ' comment-by-user';
		}
	}
 
	$commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
	echo ' comment-child';
	$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
	echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
	<div id="<?php $comments->theId(); ?>">
		<div class="comment-post">
			<div class="comment-meta">
				<div class="comment-avatar"><?php $comments->gravatar('36', ''); ?></div>
				<span class="comment-author"><?php $comments->author(); ?></span>
				<span class="comment-time"><?php $comments->date('Y-m-d H:i'); ?></span>
			</div>
			<div class="comment-content"><?php $comments->content(); ?></div>
		</div>
		<div style="clear:both;"></div>
		<span class="comment-reply"><?php $comments->reply(); ?></span>
	</div>
	<div style="clear:both;"></div>
<?php if ($comments->children) { ?>
	<div class="comment-children">
		<?php $comments->threadedComments($options); ?>
	</div>
<?php } ?>
</li>
<?php } ?>

<div id="comments">
	<?php $this->comments()->to($comments); ?>
	<?php if ($comments->have()): ?>
	<h3>评论：</h3>
	
	<?php $comments->listComments(); ?>
	
	<div style="clear:both;"></div>

	<div id="pagenavi"><?php $comments->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?></div>
	<div style="clear:both;"></div>
	<?php endif; ?>

	<?php if($this->user->hasLogin() == false && isset($this->fields->admin_comment)):
	elseif($this->allow('comment')): ?>
	<div id="<?php $this->respondId(); ?>" class="respond">
		<div class="cancel-comment-reply">
		<?php $comments->cancelReply(); ?>
		</div>
		<strong><?php _e('发表评论：'); ?></strong>
		<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
			<?php if($this->user->hasLogin()): ?>
			<p><?php _e('已登录为: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
			<?php else: ?>
			<p>
				<input type="text" name="author" maxlength="49" value="<?php $this->remember('author'); ?>" required />
				<span class="ps">昵称 (必填)</span>
			</p>
			<p>
				<input type="email" name="mail" maxlength="128" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
				<span class="ps">Email</span>
			</p>
			<p>
				<input type="url" name="url" maxlength="128" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
				<span class="ps">个人主页</span>
			</p>
			<?php endif; ?>
			<p>
				<textarea rows="8" cols="40" name="text" class="textarea" required ><?php $this->remember('text'); ?></textarea>
			</p>
			<p>
				<button type="submit" class="submit"><?php _e('提交评论'); ?></button>
			</p>
		</form>
		<span class="ps">(邮件地址不会被公开，同时用于显示与之关联的 <a target="_blank" rel="nofollow" href="http://www.gravatar.com/">Gravatar 头像</a>)</span>
	</div>
	<?php endif; ?>
</div>
