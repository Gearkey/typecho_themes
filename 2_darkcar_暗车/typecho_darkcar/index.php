<?php
/**
 * darkcar
 * 
 * @package darkcar
 * @author Gearkey
 * @version 1.0
 * @link http://robim.space/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="content">
	<div class="pages"><?php $this->widget('Widget_Contents_Page_List')->to($pages); ?><?php while($pages->next()): ?><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a> <?php endwhile; ?><a target="_blank" href="//gearkey.vvnote.org/show/">链接</a></div>
	<div class="post">
	<div class="title"><h1><?php $this->options->title(); ?></h1></div>
	
	<?php while($this->next()): ?>
	<div class="each-post"><a title="<?php echo Typecho_Common::subStr(strip_tags($this->content), 0, 36, '...'); ?>" href="<?php $this->permalink() ?>"><?php $this->title() ?></a> <?php if ($this->status == 'private'): ?><em class="status">私密</em><?php endif; ?></div>
	<?php endwhile; ?>
	</div>
</div>

<?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
<div style="clear:both"></div>

<div class="meta">
<?php $this->need('footer.php'); ?>