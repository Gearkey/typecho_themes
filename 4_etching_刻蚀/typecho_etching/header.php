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
	), '', ' - '); ?><?php $this->options->title(); ?></title>
	<?php if ($this->options->logoUrl): ?>
	<link rel="Shortcut icon" href="<?php $this->options->logoUrl() ?>"/>
	<?php endif; ?>
	<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
	<?php $this->header('&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
</head>
<body>
<div class="wrap">