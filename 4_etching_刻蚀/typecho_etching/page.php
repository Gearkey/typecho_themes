<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="top">
	<h1><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	<div class="title-desc">
		<p>
			<?php $this->options->description() ?>
			<?php if($this->user->hasLogin()):?>/ <a target="_blank" href="<?php echo $this->options->adminUrl()?>write-page.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?>
		</p>
	</div>
</div>



<div class="main">
	<div class="post">
		<div class="post-content">
			<?php $this->content(); ?>
		</div>
	</div>
	
	<?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>