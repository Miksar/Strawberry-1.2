<?php 
if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}
### ��������� ������
$tit = t("�����"); 

otable();
echo "<div class=\"text\">".t('����� ������� � ������������ ���������� �����. ������ �������� ����� �� ����� ���� ��������!')."</div><br>";
$number = 5;
$template = 'search';
include root_directory.'/show_search.php';
echo on_page($modul);
ctable();
?>