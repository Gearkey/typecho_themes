<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="footer">
	<div class="widget cate">
		<?php if ($this->options->logoUrl): ?>
		<a class="logo" href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" /></a>
		<?php endif; ?>
		<h3><?php $this->author(); ?></h3>
		
		<ul><li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li></ul>
		<?php $this->widget('Widget_Metas_Category_List@options','ignore=1')->listCategories('wrapClass=widget-list'); ?>
		
		<div style="clear:both"></div>
		<ul>
			<?php if ($this->options->extraLink): ?>
			<?php $this->options->extraLink() ?>
			<?php endif; ?>
			<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
			<?php while($pages->next()): ?>
			<li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
			<?php endwhile; ?>
			<li><form id="search" method="post" action="./" role="search"><input type="text" name="s" placeholder="<?php _e('搜索…'); ?> " autocomplete="off" /></form></li>
		</ul>
		<div style="clear:both"></div>
	</div>
	
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
		<ul><?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?></ul>
	</div>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
		<ul>
		<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
		<?php while($comments->next()): ?>
			<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>: <?php $comments->excerpt(18, '…'); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php endif; ?>
	
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCatch', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3 class="widget-title"><?php _e('Catch…'); ?></h3>
		<ul><li><a href="<?php $this->options->siteUrl(); ?>">本站</a>使用 <a target="_blank" rel="nofollow" href="http://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh">署名-非商业使用-相同方式共享 4.0</a> 的 <a target="_blank" rel="nofollow" href="http://www.lofter.com/CreativeCommons">CC协议</a> 授权，<a target="_blank" rel="nofollow" href="<?php $this->options->feedUrl(); ?>">欢迎订阅</a>。</li></ul>
	</div>
	<?php endif; ?>
	
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
		<ul class="widget-list">
			<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
			->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
		</ul>
	</div>
	<?php endif; ?>
</div>
<div style="clear:both"></div>

</div>
</body>
</html>