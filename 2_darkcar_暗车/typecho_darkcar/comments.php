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
	$depth = $comments->levels +1;
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($depth > 1 && $depth < 3) {
	echo ' comment-child';
	$comments->levelsAlt(' comment-level-odd', ' comment-level-even');       //添加
} elseif ( $depth > 2 ) {      //添加
	echo ' comment-child2';         //添加
	$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
	echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
	<div id="<?php $comments->theId(); ?>">
		<span class="comment-author" title="<?php $comments->date('Y-m-d H:i'); ?>"><?php $comments->author(); ?>：</span><?php $comments->content(); ?>
		<span class="comment-reply"><?php $comments->reply(); ?></span>
	</div>
<?php if ($comments->children) { ?>
	<div class="comment-children">
		<?php $comments->threadedComments($options); ?>
	</div>
<?php } ?>
</li>
<?php } ?>

<div class="comment">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<span class="comment-label">评论：</span>
<?php $comments->listComments(); ?>
<?php $comments->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
<div style="clear:both;"></div>
<?php endif; ?>
</div>

<div class="comment">
<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>">
<span class="comment-label">发表评论：</span>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
	<textarea name="text" class="inputbox" placeholder="你的评论可以一针见血"><?php $this->remember('text'); ?></textarea>
	
	<?php if($this->user->hasLogin()): ?>
	<span><?php _e('已登录为: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('登出'); ?> &raquo;</a></span>
	<?php else: ?>
	<input class="inputbox" type="text" name="author" maxlength="49" placeholder="昵称 (必填)" value="<?php $this->remember('author'); ?>"/><input class="inputbox" type="email" name="mail" maxlength="128"  placeholder="@qq.com" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>/><input class="inputbox last-input" type="url" name="url" maxlength="128" placeholder="http://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
	<?php endif; ?>
	
	<div>
	<button type="submit" class="submit"><?php _e('发表'); ?></button>
	<span>（邮件地址不会被公开，用于收取评论回复通知）</span>
	</div>
</form>
</div>
<?php endif; ?>
</div>