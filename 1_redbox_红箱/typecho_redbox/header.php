<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php $this->archiveTitle('%s', '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="Shortcut icon" href="<?php $this->options->themeUrl('images/logo-32.png'); ?>"/>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<?php $this->header('&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
<!--[if lt IE 9]>
<script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="wrap">
<div id="header"><!-- todo: 宽屏浮动到左侧-->
	<div class="banner">
		<div class="logo"><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl('images/logo.png'); ?>"/></a></div>
		<div class="title">
			<div class="name"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></div>
			<div class="desc"><?php $this->options->description() ?></div>
		</div>
		<div style="clear:both;"></div>
	</div>
</div>

<div id="nav">
	<ul>
		<li><a href="<?php $this->options->siteUrl(); ?>index.php/category-2/">Explore</a></li>
		<li><a href="<?php $this->options->siteUrl(); ?>index.php/category-3/">杂谈</a></li>
		<li><a href="<?php $this->options->siteUrl(); ?>index.php/category-4/">足迹</a></li>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
		<li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
</div>

<div id="content">
