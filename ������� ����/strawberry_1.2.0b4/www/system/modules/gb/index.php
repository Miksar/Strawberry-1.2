<?php
// GuestBook Form Universal v.2.0 for Strawberry 1.2.x
if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}
### ��������� ������
$tit = t("�������� �����");

?>

<table cellpadding="0" cellspacing="0" class="nbtext">
<tr>
<td align="center" valign="top" class="arttit">::: <?php echo $tit; ?> :::</td>
</tr><tr>
<td valign="top">� ���� ������ �� ������ ������ ���� ��������� � ������ � �����. �������� ������� ���� ����������� ;)</td>
</tr><tr>
<td valign="top" align="center"><?php 
$number = 10;
include includes_directory."/gb.inc.php"; 
 ?></td>
</tr>
</table>

<?php echo on_page($modul); ?>