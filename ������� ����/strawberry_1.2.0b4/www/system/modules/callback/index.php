<?php
if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}
// mail form v.2.5 for strawberry 1.1.1
### ��������� ������
$tit = t("�������� �����");
otable();
?>

<div class="nbtext"><?php echo t('�� ������ ��������� � ���� ��������� �������'); ?>:</div>
<div class="nbtext">
<?php echo t('� ������� ���������������'); ?>:
<br><?php echo t('���'); ?>: Admin
<br><?php echo t('E-Mail'); ?>: admin@<?php echo str_replace("www.", "", $_SERVER['HTTP_HOST']); ?>
<br><?php echo t('ICQ'); ?>: xxx-xxx-xxx
<br><?php echo t('�������'); ?>: 000-000000 (phone); 000-000000 (fax)
</div>

<div><?php include includes_directory."/mail.inc.php"; ?></div>

<?php 
ctable();
echo on_page($modul); 
?>