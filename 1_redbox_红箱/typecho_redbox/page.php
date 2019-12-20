<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="contentleft">
	<div class="post">
		<div class="title"><h1><?php $this->title() ?></h1></div>
		<div class="meta">
			<img src="<?php $this->options->themeUrl('images/time.png'); ?>"/> <?php $this->date('Y-m-d H:i'); ?>
			<?php if($this->user->hasLogin()):?>
			<a target="_blank" href="<?php echo $this->options->adminUrl()?>write-page.php?cid=<?php $this->cid()?>">编辑</a>
			<?php endif;?>
		</div>
		<div class="text">
		<?php $this->content();?>
		</div>
		
		<?php if($this->user->hasLogin() && isset($this->fields->t)):?>
			<pre><code><?php $this->fields->t();?></code></pre>
		<?php endif; ?>
		
		<?php $this->need('comments.php'); ?>
	</div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
