<?php
$ap = 1;
### ���������� �������
include_once 'system/head.php';
if (!empty($nid) and is_numeric($nid)) {
### ����� ������ � �������� �����
include root_directory.'/show_print.php'; // ������� ���� print
} else {
@header('HTTP/1.1 301 Moved Permanently');
@header ('Location: '.$config['home_page']);
}
?>