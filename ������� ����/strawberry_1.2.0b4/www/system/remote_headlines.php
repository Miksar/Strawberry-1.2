<?php
$ap="";
#_strawberry
include_once 'head.php';
if (!defined("str_adm")) { header("Location: ../index.php"); exit; }



/**
 * @package Show
 * @access private
 */

//////////////////////  OPTIONS //////////////////////

/*
��� ������������ ���� ������.
�������� ���� ���:
<script language="javascript" src="http://example.com/����/��/remote_headlines.php"></script>
����� ������������ ������ ���-�� ��������:
http://example.com/����/��/remote_headlines.php?rh_num=NUMBER_OF_NEWS
����� ������������ � ���������:
http://example.com/����/��/remote_headlines.php?rh_num=NUMBER_OF_NEWS&rh_cat=CAT_ID
����� ������������ � ���������(utf-8 ��� windows-1251):
http://example.com/����/��/remote_headlines.php?rh_num=NUMBER_OF_NEWS&rh_cat=CAT_ID&rh_char=utf-8
����� ������������ ����� ���������� � ���� �������� html ������ (����������� ��������� � ������� ����� �������). (�.�. ����� ������� ������):
http://example.com/����/��/remote_headlines.php?rh_num=NUMBER_OF_NEWS&rh_cat=CAT_ID&rh_char=utf-8&rh_out=html
http://example.com/����/��/remote_headlines.php?rh_num=NUMBER_OF_NEWS&rh_cat=CAT_ID&rh_char=utf-8&rh_out=java
( ����������: �� ������ ������� ����� ��������� ���������� ������. ��������, ���� �� ������� &rh_out=php, 
�� ����� �������� ���� �� �������� remote_headlines/active-php.tpl. � ���� ����� �� ������ ������� ����� ��������
��� php ���. ����� ���, ��� ������ ���� �����, ����� ������������� ��������� �� ������ � ������� ����� ������� eval().)
����� ��������� ������� (��� ������� ��������� &id=ID_OF_NEWS). ��������� � �������� �������.
������ ��� ���� �� ��������� remote_headlines
���� �� ������ ������ ������� ���������� �� ��������� �������� � ��� ������� �����������...
*/

//////////////////////  OPTIONS //////////////////////

$def_num = 7;// ������� ���������� �������� �� ���������
$def_tpl = 'remote_headlines'; // ������ �� ���������

////////////////////////////////////////////////////////
$static['template'] = !empty($def_tpl) ? $def_tpl : 'remote_headlines';
$static['number'] = (!empty($_GET['rh_num']) and is_numeric($_GET['rh_num'])) ? $_GET['rh_num'] : $def_num;
$static['category'] = (!empty($_GET['rh_cat']) ? cheker($_GET['rh_cat']) : (!empty($config['rss_cat']) ? $config['rss_cat'] : 0));
$static['char'] = !empty($_GET['rh_char']) ? cheker($_GET['rh_char']) : $config['charset'];
$static['tout'] = !empty($_GET['rh_out']) ? cheker(strtolower($_GET['rh_out'])) : '';
$static['id'] = !empty($id) ? $id : (!empty($nid) ? $nid : '');

// ���������� ����������� ����������.
if (!empty($static) and is_array($static)) {
    foreach ($vars as $k => $v){
       if ($v != 'static' and $v != 'id' and $v != 'nid') { 
         unset($$v); 
       }
    }
    foreach ($static as $k => $v) { 
    $$k = $v;
    }
} else {
$static = array();
}




//$category = !empty($category) ? cheker($category) : (!empty($_REQUEST['category']) ? cheker($_REQUEST['category']) : 0);
// ���� ��������� ������
if (!empty($category)) {
  $category_tmp = "";
// ���� ��������� ������� ����� url
  if (!strstr($category, ',') and !is_numeric($category)) {
  $category = category_get_id($category);
  }

// ���� ������� ��������� ��������� 
foreach (explode(',', str_replace(' ', '', $category)) as $cat) {
$category_tmp .= category_get_children($cat).',';
}

// ������������ ��������� � ���� x,x,x,x
  $category_tmp = chicken_dick($category_tmp, ','); // ������� �������
  $category  = (!empty($category_tmp) ? $category_tmp : $category);
}


## ���������� ����� ��������� ���������� (������ ��� �������� �������)
 $allow_comment_form = false;
 $allow_comments = false;
 $allow_full_story   = false;
 $allow_active_news  = true;



## ���� ������ ����������� � ���� �����������, �� ��������� ���������
if ($sql_error_out != "mysql") {

   ## ����������� ��������� ��������� ������
   $link = (empty($link)) ? 'home' : $link;

   ## ���������� ����� ����������
   ob_start();
 include includes_directory."/show.remote_headlines.php";
 $output = ob_get_contents();
   ob_end_clean();
   } else {
 $output = t('������ ����������!');   
   }

   ## �������� ����� ����������
   if (!empty($char) and !empty($config['charset']) and $char != $config['charset']) {
 echo @iconv($config['charset'], $char, $output);
   } else {
 echo $output;
   }



## ����� ������������ ����������
if ($vars = run_filters('unset', $vars)) { 
   foreach ($vars as $var) { 
       if ($var != 'nid') {  
         unset($$var); 
       }       
   }
}



## ����� ����������
unset($category_tmp, $parent, $no_prev, $no_next, $prev, $var);
$static = array();

?>