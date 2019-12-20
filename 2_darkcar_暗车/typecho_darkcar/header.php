<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
<title><?php $this->archiveTitle(array('category'=>_t('%s'), 'search'=>_t('搜索：%s'), 'tag' =>_t('Tag：%s'), 'author'=>_t('作者：%s')), '', ' - '); ?><?php $this->options->title(); ?></title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>"/>
<link rel="Shortcut icon" href="<?php $this->options->themeUrl('logo.png'); ?>"/>
<?php $this->header('&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
</head>

<body>
<div class="wrap">
<div class="bar">
	<img class="site-logo" title="<?php $this->options->description(); ?>" src="<?php $this->options->themeUrl('logo.png'); ?>"/>
	<span class="site-name"><a href="<?php $this->options->siteUrl(); ?>">Gearkey</a></span>
	<div class="site-action"><form method="post"><input type="text" name="s"/></form></div>
	<div style="clear:both"></div>
</div>

<div class="wrap2">