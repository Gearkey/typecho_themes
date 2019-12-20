<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
	/**  
    * archives  
    * 
    * @package custom  
    */
$this->need('header.php'); ?>

<div class="content"><div class="arrow"></div>
<div id="content-main">
	<div class="post">
		<div class="post-main">
			<h1 class="post-title"><?php $this->title() ?></h1>
			<?php $this->content();?>
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=37')->to($tags); ?>
				<?php while ($tags->next()): ?>
					<a target="_blank" href="<?php $tags->permalink(); ?>" title="共 <?php $tags->count(); ?> 篇文章">#<?php $tags->name(); ?></a> 
				<?php endwhile; ?>
			
			<table>
				<tr><th>标题</th><th>时间</th></tr>
				<?php $this->widget('Widget_Contents_Post_Recent','pageSize=10000')->parse('<tr><td><a target="_blank" href="{permalink}">{title}</a></td><td>{year}/{month}/{day}</td></tr>'); ?>
			</table>
		</div>
		<?php if($this->user->hasLogin()):?><ul class="post-meta"><li class="tag"><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-page.php?cid=<?php $this->cid()?>">编辑</a></li></ul><?php endif;?>
	</div>
</div>
</div>
<?php $this->need('footer.php'); ?>
