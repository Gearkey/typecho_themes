<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="content">
	<div class="back"><a href="javascript:history.go(-1);">&lt;&lt; Back</a></div>
	<div class="time">
		<?php $this->date('Y-m-d H:i'); ?>
		<?php if($this->user->hasLogin()):?><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?>
	</div>
	<div class="post">
		<div class="title"><h1><?php $this->title() ?></h1><?php if ($this->status == 'private'): ?><em class="status">私密</em><?php endif; ?></div>
		<div class="text">
			<?php $this->content(); ?>
			<p>固定链接：<a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
			<?php if($this->user->hasLogin() && isset($this->fields->t)):?><pre><code><?php $this->fields->t();?></code></pre><?php endif; ?>
		</div>
	</div>
</div>

<div class="nextlog">
<span class="pre"><?php $this->theNext('%s','',array('title' => '&lt;&lt; ')); $this->theNext('%s'); ?></span>
<span class="next"><?php $this->thePrev('%s'); $this->thePrev('%s','',array('title' => ' &gt;&gt;')); ?></span>
<div style="clear:both"></div>
</div>

<?php $this->need('comments.php'); ?>

<div class="meta"><p>分类：<?php $this->category(','); ?><?php if($this->tags != null): ?> | Tag：<?php $this->tags('，', true, ''); ?><?php endif;?></p>
<?php $this->need('footer.php'); ?>