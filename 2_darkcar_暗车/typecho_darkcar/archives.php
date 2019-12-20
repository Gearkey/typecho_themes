<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
	/**  
    * archives  
    * 
    * @package custom  
    */
$this->need('header.php'); ?>

<div class="content">
	<div class="pages">
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?><?php while($pages->next()): ?><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a> <?php endwhile; ?>
		<a target="_blank" href="//gearkey.vvnote.org/show/">链接</a>
		<?php if($this->user->hasLogin()):?><a target="_blank" href="<?php echo $this->options->adminUrl()?>write-page.php?cid=<?php $this->cid()?>">编辑</a><?php endif;?>
	</div>
	<div class="post archives">
		<div class="title"><h1><?php $this->title() ?></h1></div>
		<div class="text">
		<h2>按分类</h2>
		<ol>
			<li><a target="_blank" href="category-6/">万物探寻</a></li>
			<li><a target="_blank" href="category-7/">代码挖掘</a></li>
			<li><a target="_blank" href="category-8/">对象设计</a></li>
			<li><a target="_blank" href="category-9/">体验文化</a></li>
			<li><a target="_blank" href="category-10/">设计思考</a></li>
			<li><a target="_blank" href="category-11/">软件吐槽</a></li>
			<li><a target="_blank" href="category-12/">相册随笔</a></li>
			<li><a target="_blank" href="category-13/">脑洞涂鸦</a></li>
		</ol>
		<h2>按时间</h2>
		<ul><?php $this->widget("Widget_Contents_Post_Date", "format=Y&type=year")->parse('<li><a target="_blank" href="{permalink}">{date}</a></li>'); ?></ul>
		<h2>按标签</h2>
		<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=37')->to($tags); ?>
		<?php while ($tags->next()): ?>
			<a target="_blank" href="<?php $tags->permalink(); ?>" title="共 <?php $tags->count(); ?> 篇文章"># <?php $tags->name(); ?></a> 
		<?php endwhile; ?>
		</div>
	</div>
</div>

<div class="meta">
<?php $this->need('footer.php'); ?>