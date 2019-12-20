<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="content"><div class="arrow"></div>
<div class="content-main">
	<div class="post">
		<div class="post-main">
			<h1 class="post-title"><?php $this->title() ?></h1>
			<?php $this->content();?>
			
			<?php if($this->user->hasLogin() && isset($this->fields->t)):?>
			<p class="ps">
				<pre><code><?php $this->fields->t();?></code></pre>
			</p>
			<?php endif; ?>
			<?php $this->need('comments.php'); ?>
		</div>
		<?php if($this->user->hasLogin()):?><ul class="post-meta"><li class="tag"><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-page.php?cid=<?php $this->cid()?>">编辑</a></li></ul><?php endif;?>
		<div style="clear:both;"></div>
	</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
