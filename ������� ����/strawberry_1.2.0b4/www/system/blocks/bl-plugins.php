<?php
#_strawberry
if (!defined("str_block")) {
header("Location: ../../index.php");
exit;
}
$pointer = "� ";
$av_plug = "";
$active_plugins = active_plugins();
$available_plugins = available_plugins();

foreach ($active_plugins as $namep => $actp) {
  if ($actp) {

   foreach ($available_plugins as $nameap => $actap) {
     if ($actap['file'] == $namep) {
       $av_plug .= "<div title=\"".t('�����').": ".$actap['author'].". -nl- ".t('������').": ".$actap['version'].". -nl- ".t('����').": ".$actap['file'].".\" style=\"cursor: pointer;\">".$pointer.$actap['name']."</div>";
     }
   }

  }
}

$bl_out = t('� ������� ������ �� ����� ������� ��������� �������:').$av_plug;
?>