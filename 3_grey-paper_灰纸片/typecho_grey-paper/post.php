<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="content"><div class="arrow"></div>
<div class="content-main">
	<div class="post">
		<div class="post-main">
			<h1 class="post-title"><?php $this->title() ?> <?php if ($this->status == 'private'): ?><em class="status">（私密）</em><?php endif; ?></h1>
			<?php $this->content(); ?>
			
			<p class="info">
			固定链接： <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a>&nbsp;
			</p>
			
			<?php if($this->user->hasLogin() && isset($this->fields->t)):?>
			<p class="ps">
				<pre><code><?php $this->fields->t();?></code></pre>
			</p>
			<?php endif; ?>
		</div>
		
		<ul class="post-meta">
			<li class="time"><?php $this->date('Y/m/d H:i'); ?></li>
			<li class="like"><?php $this->category(','); ?></li>
			<li class="tag"><?php $this->tags(' ', true, ''); ?> <?php if($this->user->hasLogin()):?><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?></li>
		<div style="clear:both;"></div>
		</ul>
	</div>
	
	<div style="clear:both;"></div>
	<ul class="page-navigator">
		<li><?php $this->theNext('%s','上一篇',array('title' => '上一篇'));?></li> |
		<li><?php $this->thePrev('%s','下一篇',array('title' => '下一篇')); ?></li>
	</ul>
	
	<div class="post"><div class="post-main"><?php $this->need('comments.php'); ?></div></div>
</div>
</div>

<?php $this->need('footer.php'); ?>
