<?php
/**
 * 一套简洁、杂志样式的 Typecho 主题模板
 * 
 * @package Grey-paper
 * @author Gearkey
 * @version 1.0
 * @link https://gearkey.vvnote.org/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="content"><div class="arrow"></div>
<div class="content-main">
	<?php while($this->next()): ?>
	<div class="post">
		<div class="post-main">
			<?php 
			if (!empty($this->options->sidebarBlock) && in_array('ShowSummary', $this->options->sidebarBlock)){
				preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $this->content, $img);
				if (count($img[0]) != 0){
					$imgsrc = $img[1][0];
					echo '<a href="';
					echo $this->permalink();
					echo '">';
					echo '<img class="main-img" src="' .$imgsrc .'"/>';
					echo '</a>';
				}
			}
			?>
			<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a> <?php if ($this->status == 'private'): ?><em class="status">（私密）</em><?php endif; ?></h2>
			<?php if (!empty($this->options->sidebarBlock) && in_array('ShowSummary', $this->options->sidebarBlock)){
				echo preg_replace(array("/^[\r\n]/"), array(""), Typecho_Common::subStr(strip_tags($this->content), 0, 176, '...'));
				echo ' <a class="more" href="'.$this->permalink. '">&lt;阅读全文&gt;</a>';
			}
			else {
				$this->content();
			}
			?>
		<div style="clear:both;"></div>
		</div>
		
		<ul class="post-meta">
			<li class="time"><a href="<?php $this->permalink() ?>" title="阅读全文"><?php $this->date('Y/m/d'); ?></a></li>
			<li class="like"><?php $this->category(','); ?></li>
			<li class="tag"><?php $this->tags(' '); ?> <?php if($this->user->hasLogin()):?><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?></li>
		<div style="clear:both;"></div>
		</ul>
	</div>
	<?php endwhile; ?>
	<div style="clear:both"></div>
	<?php $this->pageNav('&lt;&lt; 上一页', '下一页 &gt;&gt;'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>
