<?php

if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}


function useful_menu() {
global $config, $is_logged_in;
$tagarr = "<hr width=\"50%\">";
$lmenu = "<a href=\"".way(straw_get_link(array(), 'mod', 'home'))."\" title=\"".t('�������')."\">".t('�������')."</a>";
//if ($is_logged_in) $lmenu .= " | <a href=\"".way(straw_get_link(array(), 'postadd', 'home'))."\" title=\"".t('��������')." ".t('����������')."\">".t('��������')."</a>";
echo "<center><div class=\"mmenu\">".$lmenu."</div></center>";
}


### ��������� ������
$tit = t("����� ������");
?> 

<!-- ���������� -->

<?php
otable();
useful_menu(); 
$number = ( !empty($_POST['number']) ? cheker($_POST['number']) : ( !empty($_GET['number']) ? cheker($_GET['number']) : '15' ));
$category = ( !empty($_POST['category']) ? cheker($_POST['category']) : ( !empty($_GET['category']) ? cheker($_GET['category']) : '6' ));
$template = 'news';
include root_directory."/show_news.php";
echo on_page($modul);
ctable();
?>

<!-- /���������� -->
