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
Plugin Name:	��������
Plugin URI:		http://spectator.ru/technology/php/quotation_marks_stike_back
Description:	        ����������� ������� - ������ "" �� ��.
Version:		1.1
Application: 	Strawberry
Author:		������� �������
Author URI:		http://nudnik.ru
*/

add_filter('news-entry-content','kavychker', 201);
add_filter('news-comment-content','kavychker', 201);

function kavychker($content){ // ����������� ���������
// Copyright (c) Spectator.ru
if (!empty($content) and !is_array($content)) {
	$content = stripslashes($content);

	// ������ ������� � html-����� �� ������ "�"
	$a[] = "/<([^>]*)>/es";
	$b[] = "'<'.str_replace ('\\\"', '�','\\1').'>'";

	// ������ ������� ������ <code> �� ������ "�"
	$a[] = "/<code>(.*?)<\/code>/es";
	$b[] = "'<code>'.str_replace ('\\\"', '�','\\1').'</code>'";
	$a[] = "/<code>(.*?)<\/code>/es";
	$b[] = "'<code>'.str_replace ('\\\'', '*�','\\1').'</code>'";

	// ����������� �������: �������, ����� ������� ���� ( ��� > ��� ������ = ������ �����,
	// �������, ����� ������� �� ���� ������ = ��� ����� �����.
	$a[] = "[&quot;]";
	$b[] = '"';
	$a[] = "/([>(\s])(\")([^\"]*)([^\s\"(])(\")/";
	$b[] = "\\1�\\3\\4�";

$content = preg_replace($a, $b, $content);

	// ���, �������� � ������ �������������� �������? ������ ���� ���������!
	if (stristr($content, '"')) {

	// ����������� ���������� ������� (��� ���).
	$aa[] = "/([>(\s])(\")([^\"]*)([^\s\"(])(\")/";
	$bb[] = "\\1�\\3\\4�";
$content = preg_replace($aa, $bb, $content);
	// ����������� ��������� �������
	// �����: ���������� �� ������ ���� ������ ������������� ������� ��� �����������
	// ������, ������ ������� - ���������. ������ �� � ������ ����� ���, �� ��������� (132 � 147)
	 while (preg_match ("/(�)([^�]*)(�)/", $content)) { 
	$a[] = "/(�)([^�]*)(�)([^�]*)(�)/"; 
	$b[] = "\\1\\2&#132;\\4&#147;"; 
	 }
$content = preg_replace($aa, $bb, $content);
	// ����� ��������� ��������
	}

	// ������� �������
	$aaa[] = "/\<a\s+href([^>]*)\>\s*\�([^<^�^�]*)\�\s*\<\/a\>/";
	$bbb[] = "&#171;<a href\\1>\\2</a>&#187;";

$content = preg_replace($aaa, $bbb, $content);
	// ��������������� ���������� ����, ���� � ����������
	$trans = array
	(
		"\xAB" => '&laquo;',
		"\xBB" => '&raquo;',
		"\x93" => '&bdquo;',
		"\x94" => '&ldquo;',
		'...'  => '&hellip;',
		'(c)'  => '&copy;',
		'(C)'  => '&copy;',
		'(r)'  => '&reg;',
		'(R)'  => '&reg;',
		'(tm)' => '&trade;',
		'(TM)' => '&trade;',
		"'"    => '&#146;' #��������
	);
	$content = strtr($content, $trans);

	// ���� � ������ ������ (�������)
	$aaaa[] = '/([>|\s])- /'; 
	$bbbb[] = "\\1&#151; ";
$content = preg_replace($aaaa, $bbbb, $content);

	// ������  "�" ������� �� �������
	$content = str_replace('*�','\'', $content);
	$content = str_replace('�','"', $content);

	//�������� ������ �� ������ (����� �� ����������� �� ������ ������ �������� �� ��������)
	 $aaaaa[] = "/ (.) (.)/"; // ������ �� ������ ������ ))
	 $bbbbb[] = " \\1 \\2";

	// ������
	$aaaaa[] = "/(\s[^- >]*)-([^ - >]*\s)/";
	$bbbbb[] = "\\1-\\2";
	
$content = addslashes(preg_replace($aaaaa, $bbbbb, $content));

}
return $content;
}
?>
