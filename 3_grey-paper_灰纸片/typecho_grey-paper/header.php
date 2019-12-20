<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?>
</title>
<link rel="Shortcut icon" href="<?php $this->options->themeUrl('images/logo-32.png'); ?>"/>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<?php $this->header('&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
</head>
<body>
<div class="sitebar">
<div class="sitebar-main">
	<span class="site-title"><?php $this->options->title() ?></span>
	<span class="site-nav">
		<a<?php if($this->is('index')): ?> class="focus"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">首页</a>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
		<a<?php if($this->is('page', $pages->slug)): ?> class="focus"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
		<?php endwhile; ?>
	</span>
	<div style="clear:both;"></div>
</div>
</div>
<div class="wrap">
<?php if ($this->is('archive')){
		echo '<h1 class="archive-title">';
		$this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
		), '', '');
		echo '</h1>';
		}?>
<div class="header">
	<div class="banner">
		<a href="<?php $this->options->siteUrl(); ?>"><img class="logo" src="<?php $this->options->themeUrl('images/logo.png'); ?>"/></a>
		<div class="title">
			<div class="name"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a></div>
			<div class="desc"><?php $this->options->description() ?></div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div class="nav">
		<ul><li><a href="<?php $this->options->siteUrl(); ?>index.php/tag/%E6%8E%A8%E8%8D%90/">聚合推荐</a></li></ul>
		<?php $this->widget('Widget_Metas_Category_List@options','ignore=1')->listCategories('wrapClass=widget-list'); ?>
		<form method="post"><input placeholder="搜索..." type="text" name="s" autocomplete="off"/><div style="clear:both;"></div></form>
	</div>
	
</div>