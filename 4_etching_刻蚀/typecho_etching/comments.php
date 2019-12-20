<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="comments">
	<?php $this->comments()->to($comments); ?>
	<?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
	<?php $comments->listComments(); ?>
	<?php $comments->pageNav('&lt;&lt; 上一页', '下一页 &gt;&gt;'); ?>
	<?php endif; ?>

	<?php if($this->allow('comment')): ?>
	<div id="<?php $this->respondId(); ?>" class="respond">
		<div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
		
		<h3 id="response"><?php _e('添加新评论'); ?></h3>
		
		<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
			<textarea name="text" id="textarea" placeholder="畅所欲言~" required ><?php $this->remember('text'); ?></textarea>
			<div class="inputs">
				<?php if($this->user->hasLogin()): ?>
				<p><?php _e('登录身份：'); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>，<a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?></a></p>
				<?php else: ?>
				<input class="inputbox" type="text" name="author" maxlength="49" placeholder="昵称 (必填)" value="<?php $this->remember('author'); ?>"/>
				<input class="inputbox" type="email" name="mail" maxlength="128"  placeholder="@qq.com" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>/>
				<input class="inputbox last-input" type="url" name="url" maxlength="128" placeholder="http://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
				<?php endif; ?>
				<button type="submit" class="submit"><?php _e('发送'); ?></button>
			</div>
		</form>
		<div style="clear:both"></div>
	</div>
	<?php else: ?>
	<h3><?php _e('评论已关闭'); ?></h3>
	<?php endif; ?>
</div>
