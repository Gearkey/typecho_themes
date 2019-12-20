<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="sidebar">

	<?php if (!empty($this->options->sidebarBlock) && in_array('Search', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('搜索'); ?></h3>
		<form id="search" method="post">
			<input type="text" name="s" class="text" />
		</form>
	</li>
	<?php endif; ?>
	
	<?php if (!empty($this->options->sidebarBlock) && in_array('RandomPosts', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('随机文章'); ?></h3>
		<?php theme_random_posts();?>
	<?php endif; ?>
	
	<?php if (!empty($this->options->sidebarBlock) && in_array('Links', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('链接'); ?></h3>
		<ul>
			<li><a target="_blank" href="http://robim.space/vvnote/" title="软件项目为主的 wiki">V-Note</a></li>
			<li><a target="_blank" rel="nofollow" href="http://robim.space/grass/" title="随意丢弃的麦杆">in 草地</a></li>
			<li><a target="_blank" rel="nofollow" href="https://my.laoxuehost.net/aff.php?aff=6616" title="优质稳定的国外虚拟主机">老薛主机</a></li>
			<li><a target="_blank" href="https://sa.bi/" title="sa.bi">南蛰的藤球球</a></li>
			<li><a target="_blank" href="https://qqdie.com/" title="qqdie.com">QQ爹博客</a></li>
			<li><a href="<?php $this->options->siteUrl(); ?>index.php/neighbors.html" title="邻居墙">more neighbors...</a></li>
			<li><a target="_blank" href="<?php $this->options->feedUrl(); ?>" title="欢迎订阅 :)">RSS</a></li>
		</ul>
	</li>
	<?php endif; ?>
	
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
		<ul class="widget-list">
			<?php $this->widget('Widget_Contents_Post_Recent')
			->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
		</ul>
	</li>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
		<ul class="widget-list">
		<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
		<?php while($comments->next()): ?>
			<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
		<?php endwhile; ?>
		</ul>
	</li>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
		<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</li>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
		<ul class="widget-list">
			<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
			->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
		</ul>
	</li>
	<?php endif; ?>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<li>
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
		<ul class="widget-list">
			<?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
				<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
			<?php else: ?>
				<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
			<?php endif; ?>
			<li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
			<li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
		</ul>
	</li>
	<?php endif; ?>

</div><!-- end #sidebar -->
