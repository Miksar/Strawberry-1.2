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
Plugin Name: 	Drag'n'Drop �����
Plugin URI:     http://cutenews.ru
Description: 	����������� ������ �� ����� �������� �������� �����.
Version: 		0.2
Application: 	Strawberry
Author: 		˸�� zloy � ��������
Author URI: 	http://lexa.cutenews.ru
*/

define('blocks_directory', data_directory.'/blocks', true);
include_once plugins_directory.'/ddb/blocks.php';
include_once plugins_directory.'/ddb/themes.php';
?>
