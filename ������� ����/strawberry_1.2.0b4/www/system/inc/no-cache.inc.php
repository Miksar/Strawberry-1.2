<?php
#_strawberry
if (!defined("str_nocache")) { header("Location: ../../index.php"); exit; }

# ��� ��������� ��� �� ���������� ������������ ����������, �������� ������������ ���������� ����...
# echo gmdate("D, d M Y H:i:s", strtotime("-10 day")); // � ���� � ���, ��� �� ���������, ��� ��, �����...
@header("Last-Modified: ".gmdate("D, d M Y H:i:s", strtotime("-1 day"))." GMT");
@header("Content-Type: text/html; charset=".$config['charset']."");

if (!empty($_SERVER['SERVER_SOFTWARE']) && strstr($_SERVER['SERVER_SOFTWARE'], 'Apache/2')) {
	@header("Cache-Control: no-cache, pre-check=0, post-check=0");
} else {
	@header("Cache-Control: private, pre-check=0, post-check=0, max-age=0");
}

@header("Expires: 0");
@header("Pragma: no-cache");

?>