<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
	$logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput($logoUrl);
	
	$extraLink = new Typecho_Widget_Helper_Form_Element_Text('extraLink', NULL, NULL, _t('额外的链接'), _t('在这里填入&lt;li&gt;包裹的链接，以在单页前添加'));
	$form->addInput($extraLink);
	
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
	array('ShowRecentPosts' => _t('显示最新文章'),
	'ShowRecentComments' => _t('显示最近回复'),
	'ShowCatch' => _t('显示脚注'),
	'ShowArchive' => _t('显示归档')),
	array('ShowRecentPosts', 'ShowRecentComments', 'ShowCatch', 'ShowArchive'), _t('侧边栏显示'));

	$form->addInput($sidebarBlock->multiMode());
}