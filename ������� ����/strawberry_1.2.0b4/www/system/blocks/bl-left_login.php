<?php
#_strawberry
if (!defined("str_block")) {
header("Location: ../../index.php");
exit;
}

if (!empty($is_logged_in)) {

$bl_out = "<center class=\"c4\">".t('������������').", <b class=\"c2\" title=\"".t('�� ������������')." �".$member['id']."\">".$member['name']."</b>!<br>".t('����������� ���������')."!</center><br>
".t('�� ������').":<br>
� <a href=\"".way("system/index.php")."\" target=\"_blank\" title=\"".t('������ ����������')."\">".t('����� � ������')."</a><br>
� <a href=\"".way("".$config['home_page']."?mod=account&amp;act=profil")."\" title=\"".t('��������� ���� �������')."\">".t('��������� �������')."</a><br>
� <a href=\"".way("".$config['home_page']."?mod=news&amp;act=add")."\" title=\"".t('�������� ���� �������')."\">".t('�������� �������')."</a><br>
� <a href=\"".way("".$config['home_page']."?mod=logout")."\" title=\"".t('�����')."\">".t('����� �� �������')."</a>";

} else {

$bl_out = lform();

}
?>