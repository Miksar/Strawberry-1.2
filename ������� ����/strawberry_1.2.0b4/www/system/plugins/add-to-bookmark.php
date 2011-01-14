<?php
#_strawberry
if (!defined("str_plug")) {
header("Location: ../../index.php");
exit;
}

/**
 * @package Plugins
 * @access private
 */

/*
Plugin Name: 	��������
Plugin URI:     http://cutenews.ru
Description: 	��������� ������� � ��������. ����������� <code>$bookmark = true;</code> ����� �������� show_news.php.
Version: 		2.2
Application: 	Strawberry
Author: 		˸�� zloy � ��������
Author URI:     http://lexa.cutenews.ru
*/

// ��������� ����� ������
add_filter('news-where', 'bookmark_check');
function bookmark_check(){
global $bookmark;
$where = !empty($bookmark) ? "AND a.bookmark = 1" : "";
return $where;
}

// ��������� ����� � ���������� � �������������� ������
add_action('new-advanced-options', 'bookmark_AddEdit', 3);
add_action('edit-advanced-options', 'bookmark_AddEdit', 3);
function bookmark_AddEdit(){
global $post;
return '<fieldset id="bookmark"><legend>'.t('��������').'</legend><label for="bookmark"><input type="checkbox" id="bookmark" name="bookmark" value="1" '.(!empty($post['bookmark']) ? ' checked="checked"' : '').'>&nbsp;'.t('�������� � ��������').'</label></fieldset>';
}

// ��� ����� ������ �� ��������, � �������� � ��������� ���� // v1.1.1
// ������ ������ ����� �����, �� � ��������� ���� ����� ���� // v1.2.x
?>