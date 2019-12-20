<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
	$logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput($logoUrl);
	
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
	array('Search' => _t('搜索'),
	'RandomPosts' => _t('随机文章'),
	'Links' => _t('链接'),
	'ShowRecentPosts' => _t('显示最新文章'),
	'ShowRecentComments' => _t('显示最近回复'),
	'ShowCategory' => _t('显示分类'),
	'ShowArchive' => _t('显示归档'),
	'ShowOther' => _t('显示其它杂项')),
	array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
	
	$form->addInput($sidebarBlock->multiMode());
}

function theme_random_posts(){
	$defaults = array(
		'number' => 5,
		'before' => '<ul class="list">',
		'after' => '</ul>',
		'xformat' => '<li><a href="{permalink}">{title}</a></li>'
	);
	$db = Typecho_Db::get();
	$sql = $db->select()->from('table.contents')
		->where('status = ?','publish')
		->where('type = ?', 'post')
		->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
		->limit($defaults['number'])
		->order('RAND()');
	$result = $db->fetchAll($sql);
	echo $defaults['before'];
	foreach($result as $val){
		$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
		echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
	}
	echo $defaults['after'];
}

