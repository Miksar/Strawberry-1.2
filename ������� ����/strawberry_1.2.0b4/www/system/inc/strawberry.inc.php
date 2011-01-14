<?php

##############################
### STRAWBERRY 1.2 MME MySQL EDITION
### CMS SYSTEM
### GZip SYSTEM
### PROTECTION SYSTEM
##############################
### Strawberry Systems Version 1.2.0 b4
##############################
### Mr.Miksar (c) 2010
### miksar@mail.ru
##############################

### ������
function str_error($err_type="") {
global $config, $modul;

$tpl['err']['menu'] = on_page($modul, 1);
if ($err_type == "mysql") {
$tpl['err']['title'] = t('������ ����������� � ���� MySQL!');
$tpl['err']['message'] = t('������� �� ������� ������������ � ���� ������ MySQL.<br>�������� �� �� ��������� ������� ������ ��� �����������.<br>��� �� ����� ����, ��� �� ������� ����� ���� ����������� ��������.<br>�������� ��������� ��� ���������� � ������������ ����������� ��������.');
} elseif ($err_type == "online_txt") {
$tpl['err']['title'] = t('������ ����������� � ���� online.txt �������� ����������� ��-����!');
$tpl['err']['message'] = t('������� �� ������� ������������ � ���� ������ online.txt. �������� �� ������� ���� ����. �������� ��� ������� � �����')." strawberry/data/db/online.txt.";
} elseif ($err_type == "no_modul") {
$tpl['err']['title'] = t('�������� � �������!');
$tpl['err']['message'] = t('������� �� ������� ����� ������� ���� ������ %mod. �������� ������� ���� index.php � ����� � �������.', array('mod' => $modul));
} elseif ($err_type == "401") {
$tpl['err']['title'] = "This Page By Password!";
$tpl['err']['message'] = t('��������, ������� �� ���������, ��������� ��� �������!');
} elseif ($err_type == "403") {
$tpl['err']['title'] = "This Page Is Private!";
$tpl['err']['message'] = t('��������, �� ���� �������� ��� �������� ��������������� ��� �������!');
} elseif ($err_type == "404") {
$tpl['err']['title'] = "This Page Not Found!";
$tpl['err']['message'] = t('��������, �� ������������� ���� �������� �� �������!');
} elseif ($err_type == "500") {
$tpl['err']['title'] = "FATAL ERROR!";
$tpl['err']['message'] = t('��������! ��� ��������� � ����� ��������� ��������� ������ �������!');
} elseif ($err_type == "502") {
$tpl['err']['title'] = "This Page Is Private!";
$tpl['err']['message'] = t('��������, �� � ��� ��� ���� ������� � ����� �����!');
} elseif ($err_type == "close") {
$tpl['err']['title'] = t('���� ������!');
if ($config['close_text']) {
$tpl['err']['message'] = $config['close_text'];
} else {
$tpl['err']['message'] = t('� ������ ������ �� ����� ������������ ���������������� ������! �������� �� ��������������� ����������!');
}
} else {
$tpl['err']['title'] = t('�������������� ������'); // � �����, ��� ��� ������� �� �������, �.�. ������� �������� ���� ��� � ������� ����...
$tpl['err']['message'] = t('��� ������ ���� �� ������������� ������������� ���� �������, ������� ��� ������� �������� � ��� �������������� � ��������� ���� ������� ��������� ��������. �������.');
}
ob_start();
require_once themes_directory.'/index.tpl';
$err_out = ob_get_contents();
ob_end_clean();
$err_out = str_replace('{copyrights}', '<div style="font-size: 9px; text-transform: uppercase;"><a target="_blank" title="Original Strawberry 1.1.2" href="http://strawberry.goodgirl.ru/" style="font-size: 9px;">'.$config['version_name'].' 1.1.2</a> powered by <a target="_blank" title="GoodGirl" href="http://goodgirl.ru/" style="font-size: 9px;">goodgirl.ru</a> &copy; 2006 - '.date('Y').'<br><a target="_blank" title="Strawberry 1.2.x" href="http://strawberry.su/" style="font-size: 9px;">Strawberry 1.2.x</a> powered by <a target="_blank" title="Miksar Group Corporation" href="http://mgcorp.ru/" style="font-size: 9px;">MGCorp.ru</a> &copy; 2009 - '.date('Y').'</div>', $err_out);
return $err_out;
}



### �������� ����
function str_theme() {
global $tpl, $vars, $default, $sql, $ap, $db, $id, $member, $user, $users, $usergroups, $categories, $post, $config, $is_logged_in, $row, $year, $month, $day, $k, $v;
ob_start();
if (is_file(themes_directory.'/'.$config['mytheme'].'/index.tpl')) {
require_once themes_directory.'/'.$config['mytheme'].'/index.tpl';
} else {
require_once themes_directory.'/default/index.tpl';
}
$out_skin = ob_get_contents();
ob_end_clean();
return $out_skin;
}

### ��������
function str_logo() {
global $tpl, $vars, $default, $sql, $ap, $db, $id, $member, $user, $users, $usergroups, $categories, $post, $config, $is_logged_in, $row, $year, $month, $day, $k, $v;
ob_start();
if (is_file(themes_directory.'/'.$config['mytheme'].'/logo.tpl')) {
require_once themes_directory.'/'.$config['mytheme'].'/logo.tpl';
} else {
require_once themes_directory.'/default/logo.tpl';
}
$out_logo = ob_get_contents();
ob_end_clean();
return $out_logo;
}


 
### ���������
function str_copyrights() {
global $tpl, $vars, $default, $ap, $db, $nid, $id, $member, $user, $users, $usergroups, $categories, $post, $config, $is_logged_in, $row, $year, $month, $day;
ob_start();
if (is_file(themes_directory.'/'.$config['mytheme'].'/copyrights.tpl')) {
require_once themes_directory.'/'.$config['mytheme'].'/copyrights.tpl';
} else {
require_once themes_directory.'/default/copyrights.tpl';
}
$out_copyrights = ob_get_contents();
ob_end_clean();
return $out_copyrights;
}


### �����
function str_blocks(){
global $db, $ap, $tpl, $out_block, $modul, $vars, $default, $member, $user, $users, $usergroups, $categories, $post, $config, $is_logged_in, $row, $year, $month, $day, $k, $v;
#, $str_c_block, $str_r_block, $str_d_block, $str_l_block;

$str_c_block = "";
$str_d_block = "";
$str_l_block = "";
$str_r_block = "";
$mod = "";
$bnamevar = "";
$out_block = array();

$qs = $_SERVER['QUERY_STRING'];
$bl = $db->sql_query("SELECT bid, title, bposition, active, blockfile, view, which FROM ".$config['dbprefix']."blocks ORDER BY bposition, weight");
while (list($bid, $btitle, $bposition, $bactive, $blockfile, $bview, $bwhich) = $db->sql_fetchrow($bl)) {
$bnamevar = "str_".$bposition."_block";

// 0 - nobody
// sall - everybody
// sus - only users
// sgt - only guest
// other - this param 


$w_m = explode(",", $bview);
$it_ua = !empty($member['usergroup']) ? $member['usergroup'] : "";
$ba = 5;
$ba_us = 0;
$ba_in = 0;
foreach ($w_m as $bv) {
if ($bv == "sno") { $ba = 0; }
if ($bv == "sall" and $ba != 0) { $ba = 1; }
if ($bv == "sgt" and $ba != 0 and $ba != 1) { $ba = 2; }
if ($bv == "sus" and $ba != 0 and $ba != 1) { $ba_us = 3; }
if ($bv == $it_ua and $ba != 0 and $ba != 1 and $ba != 2) { $ba = 4; $ba_in = $bv; }
}

if (!empty($bactive) and !empty($ba) and (($ba == 1) or ($ba == 2 and empty($is_logged_in)) or ($ba_us == 3 and !empty($is_logged_in)) or ($ba == 4 and !empty($is_logged_in) and !empty($member['usergroup']) and $member['usergroup'] == $ba_in))) { 
## ���� �������
###############################################

$where_mas = explode(",", $bwhich);
$cel = 5;
$celh = 0;
$see_in = 0;
foreach ($where_mas as $val) {
  if ($val) {
if ($val == "ihome") { $celh = 1; }
if ($val == "iall") { $cel = 3; }
if ($val == "ino") { $cel = 0; }
if ($val == $modul and $cel != 0 and $cel != 3) { $cel = 2; $see_in = $val; }
  }
}
#if ($member['usergroup'] == 1) $cel = 3;

#########################################
if ($cel > 0) {
##############################
if (($celh == 1 and !$qs and $cel != 3) or ($cel == 2 and $see_in == $modul and $qs) or ($cel == 3)) {



$bl_out = "";
  if (is_file(block_directory.'/'.$blockfile)) {
  include_once block_directory.'/'.$blockfile;
  $ok = 1;
  } else {
$db->sql_query("DELETE FROM ".$config['dbprefix']."blocks WHERE blockfile='".$blockfile."' ");
  $ok = 0;
  }




} else {
$ok = 0;
}
##############################
} else {
## ���� ���� ����� �� ������ ������������, �� �������
$ok = 0;
}
#########################################

if ($ok) {
## ���� ���� ���� ����������
ob_start();
         if (is_file(themes_directory.'/'.$config['mytheme'].'/block-'.$bposition.'.tpl')) {
require themes_directory.'/'.$config['mytheme'].'/block-'.$bposition.'.tpl';
         } else {
require themes_directory.'/default/block-'.$bposition.'.tpl';
         }
         
$bout = ob_get_contents();
ob_end_clean();
$bout = str_replace ('{bl-id}', $bid, $bout);
$bout = str_replace ('{bl-title}', $btitle, $bout);
$bout = str_replace ('{bl-content}', $bl_out, $bout);


//$str_c_block, $str_r_block, $str_d_block, $str_l_block
$$bnamevar .= $bout;

## // ���� ���� ����������
} else {
## ���� ���� �� ����������
//$out_block .= "";
$$bnamevar .= "";
}

##############################
## // ���� �������
} else {
## ���� ���������
//$out_block .= "";
$$bnamevar .= "";
}

## ����
}

$out_block['l'] = $str_l_block;
$out_block['c'] = $str_c_block;
$out_block['r'] = $str_r_block;
$out_block['d'] = $str_d_block;
## �����	
return $out_block;
}


### ��������� �����
function str_blocks_free($thit="", $it=""){
global $tpl, $vars, $default, $sql, $ap, $db, $member, $user, $users, $usergroups, $categories, $post, $config, $is_logged_in, $row, $year, $month, $day;
$bl_out = "";
  if (is_file(block_directory.'/bl-'.$it.'.php') and $it) {
    include_once block_directory.'/bl-'.$it.'.php';
ob_start();
         if (is_file(themes_directory.'/'.$config['mytheme'].'/block-'.$thit.'.tpl') and $thit) {
    require themes_directory.'/'.$config['mytheme'].'/block-'.$thit.'.tpl';
         }  else {
    require themes_directory.'/'.$config['mytheme'].'/block-free.tpl';
         }
    $bout = ob_get_contents();
ob_end_clean();
    $out_f_block = str_replace ('{bl-content}', $bl_out, $bout);
    return $out_f_block;
  } else {
    return;
  }
}


### ������
if (!empty($modul) and $modul == "logout") {
 straw_setcookie('username', '', (time/2), '/');
 straw_setcookie('md5_password', '', (time/2), '/');
 straw_setcookie('login_referer', '', (time/2), '/');
 @session_destroy();
 @session_unset();
 straw_setcookie(session_name(), '', (time/2), '/');
 @header("Location: ".$PHP_SELF."");
} elseif (!empty($modul) and $modul == "system") {
 @header("Location: ".way("system/index.php")."");
} else {
ob_start();
 if (!empty($modul) and is_file(modul_directory.'/'.$modul.'/index.php')) {
    include modul_directory.'/'.$modul.'/index.php';
 } else {

  if (!empty($config['modul']) and !is_dir(modul_directory.'/'.$modul.'/index.php')) {
    @header('HTTP/1.1 301 Moved Permanently');
    @header("Location: http://".$_SERVER['SERVER_NAME']."");
    exit();
  } elseif (!empty($config['modul']) and is_file(modul_directory.'/'.$config['modul'].'/index.php')) {
    include modul_directory.'/'.$config['modul'].'/index.php';
  } else {
    $sql_error_out = "no_modul";
  }
  
 }
$out_modul = ob_get_contents();
ob_end_clean();
}










##################################### zashita ###
function strawberry_out($debug="0") {
#global $tpl, $vars, $default, $sql, $ap, $db, $member, $user, $users, $usergroups, $categories, $post, $config, $is_logged_in, $row, $year, $month, $day, $time_onlnr, $timer, $out_modul, $sql_error_out, $str_onl_gst, $str_onl_usr, $k, $v, $str_c_block, $str_r_block, $str_d_block, $str_l_block;
global $sql, $db, $vars, $ap, $config, $is_logged_in, $timer, $out_modul, $sql_error_out, $out_block, $modul, $nid;



$gzip_avalable = checkgzip();
$sql_error_out = !empty($config['close']) ? "close" : $sql_error_out;
$no_work = 0;
$abb=array();
$ahtml=array();
$zbb=array();
$zhtml=array();
$frbl = array();


// ���� ���� ����������� ������
if (!empty($sql_error_out)) {
$modul = (empty($modul)) ? $config['modul'] : $modul;
$straw_out = str_error($sql_error_out);
$str_do = strlen($straw_out);
  $zbb[] = "#<!--(.*?)[\-?]->#si"; //html �����������
  $zhtml[] = "";
  $zbb[] = "# {2,}#si"; //������ �������
  $zhtml[] = " ";
  $zbb[] = "#\t#si"; //Tab
  $zhtml[] = "";
  $zbb[] = "#\r #si"; //�������� � ������ ������
  $zhtml[] = "";
  $zbb[] = "#\r#si"; //��� �������� �����
  $zhtml[] = "";
  $zbb[] = "#\n #si"; //������ � ������ ������
  $zhtml[] = "";
  $zbb[] = "#\n#si"; //�������� �����
  $zhtml[] = "";

$straw_out = preg_replace($zbb, $zhtml, $straw_out); // ������������ ���������� ��������

// ���� ��� ����������� ������
} else {


########################### ��� � ����� ���
if (!empty($config['cache_full'])) {
		$url = str_replace("/", "", $_SERVER['REQUEST_URI']);
		$url = (empty($url)) ? $config['home_page'] : $url;
		$match = preg_match("/index/i", $url);
		if (!empty($match) && empty($is_logged_in)) {
			$cache_url = cache_directory."/md5/".md5($url).".txt";
			if (file_exists($cache_url) && filesize($cache_url) != 0 && (time() - 555) < filemtime($cache_url)) {
			        $no_work = "1";
				readfile($cache_url);
			}
		}
}
########################### //��� � ����� ���

               if (empty($no_work)) { // ���� ���� �� �� ����

str_blocks();
$straw_out = str_theme();

  $abb[] = "#{header}#si"; // ���������� � ����� ��������
  $ahtml[] = str_meta();
  $abb[] = "#{logo-title}#si"; // �������
  $ahtml[] = str_logo();
  
  $abb[] = "#{up-block}#si"; // �������� ������� ������
  $ahtml[] = $out_block['c'];
  $abb[] = "#{left-block}#si"; // �������� ����� ������
  $ahtml[] = $out_block['l'];
  $abb[] = "#{right-block}#si"; // �������� ������ ������
  $ahtml[] = $out_block['r'];
  $abb[] = "#{down-block}#si"; // �������� ������ ������
  $ahtml[] = $out_block['d'];
  
  $abb[] = "#{modules}#si"; // ������
  $ahtml[] = $out_modul;
  $abb[] = "#{copyrights-block}#si"; // ���������
  $ahtml[] = str_copyrights();

$straw_out = preg_replace($abb, $ahtml, $straw_out); // ������������ ��������� ��������

 if (preg_match("/{free-(.*?), bl-(.*?).php}/si", $straw_out)) {
  $match_count = preg_match_all("/{free-(.*?), bl-(.*?).php}/si", $straw_out, $frbl);
   for ($i = 0; $i < $match_count; $i++) {
    $abb[] = "#{free-".$frbl[1][$i].", bl-".$frbl[2][$i].".php}#si"; // ��������� �����
    $ahtml[] = str_blocks_free($frbl[1][$i], $frbl[2][$i]);
   }
  $straw_out = preg_replace($abb, $ahtml, $straw_out); // ������������ ��������� ��������
 }

$str_do = !empty($config['stepen']) ? strlen($straw_out) : 0; // �������� �� ������

######################## ����������, �������� ��������� �� ������

if (!empty($config['html_comment'])) {
  $zbb[] = "#\<!--(.*?)[\-?]-\>#si"; //html �����������
  $zhtml[] = "";
}

if (!empty($config['html_shlak'])) {
  $zbb[] = "# {2,}#si"; //������ �������
  $zhtml[] = " ";
  $zbb[] = "#\t#si"; //Tab
  $zhtml[] = "";
}

if (!empty($config['html_nl'])) {
  $zbb[] = "#\r #si"; //�������� � ������ ������
  $zhtml[] = "";
  $zbb[] = "#\r#si"; //��� �������� �����
  $zhtml[] = "";
  $zbb[] = "#\n #si"; //������ � ������ ������
  $zhtml[] = "";
  $zbb[] = "#\n#si"; //�������� �����
  $zhtml[] = "";
}

if (!empty($config['go_link'])) {
  $zbb[] = "#href=\"(http|https|ftp|rmtp)://#is";
  $zhtml[] = "href=\"".way("go.php?go=\\1://");
  
  $zbb[] = "#href=(http|https|ftp|rmtp)://#si";
  $zhtml[] = "href=".way("go.php?go=\\1://");
}  

               } // ���� ���� �� ����
}


               if (empty($no_work)) { // ���� ���� �� �� ����

### ������ �� ��������
  $zbb[] = "#\<script(.*?)script\>#si";
  $zhtml[] = "<div class=\"nbtext\"><font class=\"admin\">".t('��������! ������� ������������ ��������� �� ����!')."</font><br><textarea border=\"1\" style=\"width: 100%; height: 50px; font-size: 8pt;\">\\1</textarea></div>";
  //$zhtml[] = "<script\\1script>";
  $zbb[] = "#\<screept#si";
  $zhtml[] = "<script";
  $zbb[] = "#\</screept#si";
  $zhtml[] = "</script";
  
  $zbb[] = "#\<iframe(.*?)iframe\>#si";
  $zhtml[] = "<div class=\"nbtext\"><font class=\"admin\">".t('��������! ������� ������������ ��������� �� ����!')."</font><br><textarea border=\"1\" style=\"width: 100%; height: 50px; font-size: 8pt;\">\\1</textarea></div>";
  $zbb[] = "#\<okno#si";
  $zhtml[] = "<iframe";
  $zbb[] = "#\</okno#si";
  $zhtml[] = "</iframe";
### // ������ �� ��������

### ��� light
if (!empty($config['mod_rewrite_lite'])) {
  $url_opt = implode(",",$vars);
  $zbb[] = "'href=((\&#39;)|[\'\"])(/?)(\w+).php(((\?|(\&(amp;)?))(?!".$url_opt.")(\w+)=(\w*))*)(((\?|(\&(amp;)?))".$url_opt."=(\w*))??)((\&#39;)|[\'\"#])'ie";
  $zhtml[] = "stripslashes('href=\\1\\4'.preg_replace('/(=|\?|(\&(amp;)?))/i', '-', '\\5').'.html'.preg_replace('/^&(amp;)?/i', '?', '\\13').'\\18')";
}
### // ��� light


$straw_out = preg_replace($zbb, $zhtml, $straw_out); // ������������ ���������� ��������


### ����������
   if (!empty($config['stepen'])) {
 $str_posle = strlen($straw_out); // �������� ����� ������ 
 $deistvie = 100-intval(($str_posle/$str_do)*100);
 $straw_out .= "\n<!-- ".t('�������� ������ ��').": ".$str_do." ".t('� �����').": ".$str_posle.". ".t('�������').": ".$deistvie."% ".(($deistvie < 0) ? "���������� ������!" : "")."-->";
   }

   if (!empty($config['tload']) and empty($config['cache_full'])) {
 $straw_out .= "\n<!-- ".t('��������� ������������� ��').": ".$timer->stop()." ".t('������').". -->";
   }
   
   if (!empty($config['coun_my_sql']) and empty($sql_error_out) and empty($config['cache_full'])) {
 $straw_out .= "\n<!-- ".t('���� ������� �������� � ���� ������')." ".t('� ������')." sql ".$sql->query_count()." + ".t('� ������')." db ".$db->num_queries." -->";
   } elseif (!empty($sql_error_out) and $sql_error_out == "mysql") {
 $straw_out .= "\n<!-- ".t('������ ����������� � ����')." MySQL -->";
   }
### // ����������



######################## ����� � ����������
        if (!empty($gzip_avalable) and !empty($config['gzip']) and empty($sql_error_out)) {  
     // ������




if (strstr($_SERVER['HTTP_USER_AGENT'], 'compatible') || strstr($_SERVER['HTTP_USER_AGENT'], 'Gecko')) {
  ob_start('ob_gzhandler');
} else {
  $do_gzip = true;
  ob_start();
  ob_implicit_flush(0);
  header('Content-Encoding: '.$gzip_avalable.'');
}

    
    echo $straw_out;
    
    
    if (!empty($do_gzip)) {
    $gzip_contents = ob_get_contents();
  ob_end_clean();


   if (!empty($config['gzip_info']) and empty($config['cache_full']) and !empty($debug)){
 $str_posle_full = strlen($gzip_contents) + 60;
 $gzip_posle = strlen(gzcompress($gzip_contents, $level)) + 60;
 $deistvie_gzip = intval(($gzip_posle/$str_posle_full)*100);
 $gzip_contents .= "\n<!-- ".t('�������� ������')." $gzip_avalable. ".t('��������')." ".$gzip_avalable." ".t('��').": ".$str_posle_full." ".t('� �����').": ".$gzip_posle.". ".t('�������')." ".$deistvie_gzip."% -->"; 
   }
   

$gzip_size = strlen($gzip_contents);
$gzip_crc = crc32($gzip_contents);
$gz_out = gzcompress($gzip_contents, $config['gziper']);
echo "\x1f\x8b\x08\x00\x00\x00\x00\x00".substr($gz_out, 0, strlen($gz_out) - 4).pack('V', $gzip_crc).pack('V', $gzip_size);
}

ob_end_flush(); // ����� �����

        } else { 
     // ���� ��� ������
echo $straw_out;
        }



########################### ��� � ������ ���
if (!empty($config['cache_full'])) {
		$url = str_replace("/", "", $_SERVER['REQUEST_URI']);
		$url = (empty($url)) ? $config['home_page'] : $url;
		$match = preg_match("/index/", $url);
		$cont = $straw_out."\n<!-- ".t('������ �������� ���� ������������!')." -->";
		if (!empty($cont) && !empty($match) && empty($is_logged_in)) {
			$fp = @fopen(cache_directory."/md5/".md5($url).".txt", "wb");
			fwrite($fp, $cont);
			fclose($fp);
		}
}
########################### //��� � ������ ���




               } // ���� ���� �� ����

//echo date('Y-m-d H:i:s');
//print_r($sql);
//print_r($db);
exit; // �����
}
############################## zashita ###
?>