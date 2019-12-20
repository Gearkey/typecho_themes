<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="content">
	<div class="post">
		<div class="title"><h1><?php _e('404 NOT FOUND'); ?></h1></div>
		<div class="text">
		<p>页面似乎消失了 ⊙﹏⊙‖∣</p>
		<p>确认地址无误，或尝试通过搜索找回它，亦可 <a href="<?php $this->options->siteUrl(); ?>">返回首页</a>。</p>
		</div>
	</div>
</div>

<div class="meta">
<?php $this->need('footer.php'); ?>