<?php 
if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}
### ��������� ������
$tit = t("����� �����"); 
otable();

echo "<div class=\"text\">".t('�� ���������� � ������������ �� �����. ��� ������ ���������� ��� ������� ���� ��������, ������� ��������� �����.')."</div>";
echo "<H3>".t('����� �����')."</H3>";

if (empty($categories)){
  return;
}

// �����������
if (!$map = $cache->get('map', $cache_uniq, 'block')){

                if (!straw_get_rights('edit_all') or !straw_get_rights('delete_all')){
      $wheren = 'hidden=0';
                } else {
      $wheren = 'hidden=0 OR hidden=1';          
                }

$arr_query = $db->sql_query("SELECT * FROM ".$config['dbprefix']."news WHERE ".$wheren." ORDER BY date ASC");
while($query[] = $db->sql_fetchrow($arr_query));
//array_pop($query); // ������� ������


$sm_out = "<li> <a href=\"".way($config['home_page'])."\" class=\"title\">".t('������ ��������')."</a></li>";


foreach ($categories as $cat){ 
  if ($cat['id']!=1) {

$sm_out .= "<a name=\"".$cat['url']."\"></a><br><br>";
$sm_out .= t('�������� � ������� "<b>%cnm</b>"', array('cnm'=>$cat['name'])).":";

   foreach ($query as $news) { 
     if (in_array($cat['id'], explode(',', $news['category'])) and !empty($news)){ 
       $sm_out .= "<li> <a href=\"".way("index.php?mod=news&id=".$news['id'])."\"class=\"title\">".$news['title']."</a><br>";
     }
   }
  }
}

$map = $cache->put($sm_out);
}

echo $map;
echo on_page($modul);
ctable();
?>
