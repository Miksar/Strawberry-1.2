<?php 
if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}
### ��������� ������
$tit = t("��� �������");
otable();
?> 


<div class="nbtext" style="padding-right:15px;text-align:justify;">
<div class="nbtext" style="float:right;margin-left:15px;text-align:left;width:300px;">
<?php
$static['id'] = 5;
$static['category'] = '2';
$static['template'] = 'text';
include 'system/show_news.php';
?>
</div>
<?php
$static['id'] = 4;
$static['category'] = '2';
$static['template'] = 'text';
include 'system/show_news.php';
?>
</div>


<?php

ctable();
echo on_page($modul); 
 
 ?>