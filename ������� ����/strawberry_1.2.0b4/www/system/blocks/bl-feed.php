<?php
#_strawberry
if (!defined("str_block")) {
	header("Location: ../../index.php");
	exit;
}

$bl_out = "<a href=\"".way("rss.xml")."\"><img border=\"0\" src=\"".way("images/icons/rss.gif")."\" alt=\"".t('RSS ����� �������� �����')."\" title=\"".t('RSS ����� �������� �����')."\"></a> <a href=\"".way("atom.xml")."\"><img border=\"0\" src=\"".way("images/icons/atom.gif")."\" alt=\"".t('����� �������� ����� �� ������� ATOM')."\" title=\"".t('����� �������� ����� �� ������� ATOM')."\"></a> <a href=\"http://mgcorp.ru/fructoza/index.php\"><img border=\"0\" src=\"".way("images/icons/fructoza.gif")."\" alt=\"".t('����� Fructoza')."\" title=\"".t('������� Strawberry � ������� ������ � ������ �����!')."\"></a>";

?>