<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="contentleft">
	<div class="post">
		<div class="title"><h1><?php _e('404 NOT FOUND'); ?></h1></div>
		<div class="text">
		<p>页面似乎消失了 ⊙﹏⊙‖∣</p>
		<p>确认地址无误，或尝试通过搜索找回它，亦可 <a href="<?php $this->options->siteUrl(); ?>">返回首页</a>。</p>
		</div>
		
		<form method="post">
			<p><input type="text" name="s" class="text" autofocus /></p>
			<p><button type="submit" class="submit"><?php _e('搜索'); ?></button></p>
		</form>
	</div>
</div>

<?php $this->need('footer.php'); ?>
