<?php
#_strawberry
if (!defined("str_block")) {
header("Location: ../../index.php");
exit;
}
 $nf = ''; // ����, �� ������� ������ ��������� ������(���� �������� �� �������������� ����� � ������������� �������)(��������: news.php)
$mi = $modul; // ��� ������, ������� �������� �� ����� ��������. (��������: news)

$bl_out = (function_exists('cn_calendar')) ? cn_calendar($nf, $mi) : t('��������� ���������');

?>