<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="contentleft">
	<div class="post">
		<div class="title"><h1><?php $this->title() ?></h1></div>
		<div class="meta">
			<img src="<?php $this->options->themeUrl('images/time.png'); ?>"/> <?php $this->date('Y-m-d H:i'); ?>
			&nbsp;&nbsp;
			<img src="<?php $this->options->themeUrl('images/like.png'); ?>"/> <?php $this->category(','); ?>
			&nbsp;&nbsp;
			<img src="<?php $this->options->themeUrl('images/tag.png'); ?>"/> <?php $this->tags(' ', true, ''); ?>
			
			<?php if($this->user->hasLogin()):?>
			<a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a>
			<?php endif;?>
		</div>
		<div class="text">
		<?php $this->content(); ?>
		</div>
		
		<p class="info">
		固定链接： <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a>&nbsp;
		</p>
		
		<?php if($this->user->hasLogin() && isset($this->fields->t)):?>
			<pre><code><?php $this->fields->t();?></code></pre>
		<?php endif; ?>
	</div>
	
	<div class="nextlog">
	<?php $this->theNext('%s','',array('title' => '&lt;&lt; ')); $this->theNext('%s'); ?> |
	<?php $this->thePrev('%s'); $this->thePrev('%s','',array('title' => ' &gt;&gt;')); ?>
	</div>
	
	<div class="post">
		<?php $this->need('comments.php'); ?>
	</div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
