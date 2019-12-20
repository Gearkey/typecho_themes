<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
	/**  
    * archives  
    * 
    * @package custom  
    */
$this->need('header.php'); ?>

<div id="contentleft">
	<div class="post">
		<div class="title"><h1><?php $this->title() ?></h1></div>
		<div class="meta">
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=37')->to($tags); ?>
			<?php if($tags->have()): ?>
			<?php while ($tags->next()): ?>
				<a href="<?php $tags->permalink(); ?>"># <?php $tags->name(); ?> (<?php $tags->count(); ?>)</a>
			<?php endwhile; ?>
			<?php endif; ?>
			<a rel="nofollow" href="<?php $this->options->siteUrl(); ?>index.php/t.html"># 心情随笔</a>
			
			<?php if($this->user->hasLogin()):?>
			<a target="_blank" href="<?php echo $this->options->adminUrl()?>write-post.php?cid=<?php $this->cid()?>">编辑</a>
			<?php endif;?>
		</div>
		<div class="text">
		<?php $this->content();?>
		</div>
		<ol>
		<?php $this->widget('Widget_Contents_Post_Recent','pageSize=1000')->parse('<li><a href="{permalink}" title="{year}-{month}-{day}">{title}</a></li>'); ?>
		</ol>
	</div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
