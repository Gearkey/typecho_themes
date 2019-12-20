<?php
/**
 * redbox
 * 
 * @package redbox
 * @author Gearkey
 * @version 1.0
 * @link http://robim.space/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div id="contentleft">
	<?php while($this->next()): ?>
	<div class="post">
		<div class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
		<div class="text">
		<?php 
		preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $this->content, $img);
		if (count($img[0]) != 0){
			$imgsrc = $img[1][0];
			echo '<a href="';
			echo $this->permalink();
			echo '">';
			echo '<img class="main-img" src="' .$imgsrc; //.'-side'
			echo '"/></a>';
		}
		?>
		<?php echo preg_replace(array("/^[\r\n]/", "/[\r\n]+\s*/"), array("", "<br/>"), Typecho_Common::subStr(strip_tags($this->content), 0, 180, '...')); ?>
		</div>
		
		<div style="clear:both"></div>
		<div class="meta">
			<a href="<?php $this->permalink() ?>" title="阅读全文">
			<img src="<?php $this->options->themeUrl('images/time.png'); ?>"/> <?php $this->date('Y-m-d'); ?>
			</a>
			&nbsp;&nbsp;
			<img src="<?php $this->options->themeUrl('images/like.png'); ?>"/> <?php $this->category(','); ?>
			&nbsp;&nbsp;
			<img src="<?php $this->options->themeUrl('images/tag.png'); ?>"/> <?php $this->tags(' '); ?>
			
			<?php if($this->user->hasLogin()):?>
			<a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a>
			<?php endif;?>
		</div>
	</div>
	<?php endwhile; ?>
	<div id="pagenavi"><?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?></div>
	<div style="clear:both"></div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
