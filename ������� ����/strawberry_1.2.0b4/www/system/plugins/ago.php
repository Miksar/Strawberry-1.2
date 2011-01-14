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
Plugin Name:	�������� ����������
Plugin URI:     http://cutenews.ru
Description:	������� ���������� ������� ���������� � ������� ���������� ������� ��� �����������.
Version:		1.0
Application: 	Strawberry
Author:		������� �������
Author URI:		http://nudnik.ru
*/


function sklonenie($gimme, $russ) {
$ummy = preg_replace('[([0-9]{1})]', '|\\1', $gimme);
$ummy = explode('|', $ummy);
$ummy = array_reverse($ummy);
$russ = explode('/', $russ);
	if ($ummy[0] == 1 and $ummy[1] != 1) {
	  $echo = $russ[0];
	} elseif ($ummy[0] >= 2 and $ummy[0] <= 4 and $ummy[1] != 1) {
	  $echo = $russ[1];
	} else {
	  $echo = $russ[2];
	}
return $gimme.' '.$echo;
}






function vycheslenie($sec){
$last = "";
$days = false;

	if ($sec > 1000000000 or $sec < 0){
		return '';
	}
	
	if ($sec < 60){
	    $tmp   = $sec;
	    $last .= ' '.sklonenie($tmp, t('�������/�������/������'));
	}
	if ($sec >= 86400){
	    $days  = true;
	    $tmp   = floor($sec/86400);
	    $sec   = $sec-$tmp*86400;
	    $last .= ' '.sklonenie($tmp, t('����/���/����'));
	}
	if ($sec >= 3600){
	    $tmp   = floor ($sec/3600);
	    $sec   = $sec-$tmp*3600;
	    $last .= ' '.t('�').' '.sklonenie($tmp, t('���/����/�����'));
	}
	if ($days == false and $sec >= 60){
	    $tmp   = floor($sec/60);
	    $sec   = $sec-$tmp*60;
	    $last .= ' '.sklonenie($tmp, t('������/������/�����'));
	}
	if (!empty($last)){
		$last .= t(' �����');
	}

return trim($last);
}






add_filter('news-show-generic', 'ago');
add_filter('comments-show-generic', 'ago');

function ago($tpl){
global $row;
$tpl['ago'] = vycheslenie(time - $row['date']);
return $tpl;
}






add_filter('template-active', 'template_ago');
add_filter('template-full', 'template_ago');
add_filter('template-comments', 'template_ago');
function template_ago($template){
$template['ago'] = t('������� ������� "������� �����" ���� ������������ ������� ��� �����������');
return $template;
}


?>