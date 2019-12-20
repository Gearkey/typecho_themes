<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="top">
	<h1><a href="<?php $this->permalink() ?>"><?php $this->title() ?><?php if ($this->status == 'private'): ?><em class="status">（私密）</em><?php endif; ?></a></h1>
	<div class="title-desc">
		<p>
			<?php _e('时间: '); ?><?php $this->date('Y-m-d H:i'); ?> /
			<?php _e('分类: '); ?><?php $this->category(','); ?> /
			<?php _e('Tag: '); ?><?php $this->tags(' ', true, ''); ?> /
			<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '%d条评论'); ?></a>
			<?php if($this->user->hasLogin()):?>/ <a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?>
		</p>
	</div>
</div>

<div class="main">
	<div class="post">
		<div class="post-content">
			<?php $this->content(); ?>
		</div>
	</div>
	
	<ul class="post-near">
		<li>上一篇：<?php $this->theNext('%s','没有了'); ?></li>
		<li>下一篇：<?php $this->thePrev('%s','没有了'); ?></li>
	</ul>
	
	<?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>