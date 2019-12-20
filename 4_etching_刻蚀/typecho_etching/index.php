<?php
/**
 * 一款文字主导的双栏主题
 * 
 * @package Etching 刻蚀
 * @author 齿轮key
 * @version 1.0
 * @link https://gearkey.vvnote.org/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="top">
	<h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->archiveTitle(array(
		'category'  =>  _t('分类 %s 下的文章'),
		'search'    =>  _t('包含关键字 %s 的文章'),
		'tag'       =>  _t('标签 %s 下的文章'),
		'author'    =>  _t('%s 发布的文章')
	), '', ' - '); ?><?php $this->options->title() ?></a></h1>
	<div class="title-desc"><span><?php $this->options->description() ?></span></div>
</div>

<div class="main">
	<?php while($this->next()): ?>
		<div class="post">
			<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a><?php if ($this->status == 'private'): ?><em class="status">（私密）</em><?php endif; ?></h2>
			<div class="post-meta">
				<p>
				<?php _e('时间: '); ?><?php $this->date('Y-m-d'); ?> /
				<?php _e('分类: '); ?><?php $this->category(','); ?> /
				<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '%d条评论'); ?></a>
				</p>
			</div>
			<div class="post-content">
				<?php $this->excerpt(135,'… <a href="'.$this->permalink .'">[阅读全文]</a>'); ?>
			</div>
		</div>
	<?php endwhile; ?>

	<?php $this->pageNav('', '', 1, '…'); ?>
</div>

<?php $this->need('footer.php'); ?>