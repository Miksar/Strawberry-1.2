<?php
#_strawberry
if (!defined("str_block")) {
header("Location: ../../index.php");
exit;
}

$bl_out = "<div class=\"block\">
<a class=\"c1\" href=\"".way($config['home_page'])."\" title=\"".t('������� �������� �����')."\">".t('�������')."</a> | 
<a class=\"c1\" href=\"".way($config['home_page']."?mod=about")."\" title=\"".t('�������� ����� �����')."\">".t('��� ������')."</a> | 
<a class=\"c1\" href=\"http://strawberry.goodgirl.ru/\" title=\"".t('����������� ���� ������������� Strawberry')."\">Strawberry 1.1.1</a> | 
<a class=\"c1\" href=\"http://strawberry.goodgirl.ru/docs/\" title=\"".t('����������� ������������')."\">".t('������������')."</a> | 
<a class=\"c1\" href=\"http://strawberry.goodgirl.ru/forum/\" title=\"".t('����������� �����')."\">".t('�����')."</a> | 
<a class=\"c1\" href=\"http://strawberry.goodgirl.ru/forum/topic/3446/\" title=\"".t('���� strawberry 1.2 �� ����������� �����')."\">".t('����� Strawberry 1.2.x')."</a>
</div>";
?>