<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="content">
	<div class="pages">
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?><?php while($pages->next()): ?><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a> <?php endwhile; ?>
		<a target="_blank" href="//gearkey.vvnote.org/show/">链接</a>
		<?php if($this->user->hasLogin()):?><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-page.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?>
	</div>
	<div class="post">
		<div class="title"><h1><?php $this->title() ?></h1></div>
		<div class="text"><?php $this->content(); ?><?php if($this->user->hasLogin() && isset($this->fields->t)):?><pre><code><?php $this->fields->t();?></code></pre><?php endif; ?></div>
	</div>
</div>

<div class="meta">
<?php $this->need('footer.php'); ?>