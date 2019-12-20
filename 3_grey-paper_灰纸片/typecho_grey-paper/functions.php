<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
	array('ShowSummary' => _t('文章显示摘要')));
	
	$form->addInput($sidebarBlock->multiMode());
}