<?php
/**
 * @package Private
 * @access private
 */
$ap = 1;
include_once 'head.php';
$config['lang'] = $lang_def;
### ������
$timer = new microTimer;
$timer->start();

if (!function_exists('options_submenu')){
	function options_submenu(){
	global $member;

	    ob_start();
	    include modules_directory.'/options.mdu';
	    $options = ob_get_contents();
	    ob_get_clean();

	    $options = strip_tags($options, '<a>');
	    $options = str_replace('&nbsp;', '', $options);
	    $options = explode("\r\n", $options);

$result[] = "� <a title=\"".t('������� ��������')."\" href=\"?mod=main\"><b>".t('������� ��������')."</b></a>";
	    foreach ($options as $option){
	        if (!�����($option)){
	            $result[] = $option;
	        }
	    }
if (is_admin()) {
$result[] = "� <a title=\"".t('�������')."\" href=\"?mod=debug\"><b>".t('�������')."</b></a>";
}
	return @implode('<br>', $result);
	}
}



if (!function_exists('options_menu_ap')){
 function options_menu_ap(){
 global $member, $modul, $gplugin, $PHP_SELF;
 $inmenu = 1;
 include modules_directory.'/options.mdu';

$i = 0;
$youm = '<table border="0" style="width: 170px;" cellpadding="0" cellspacing="0">';
  $youm .= '<tr><td class="panelm"><b>� <a title="'.t('������� ��������').'" href="?mod=main">'.t('������� ��������').'</a></b></td></tr><tr><td height="10"></td></tr>';

foreach ($sections as $k => $section){
$i++;

$inname = array("tools", "news", "options", "files", "users", "templates", "modules", "plugin");
$outname = array(t('�������������'), t('����������'), t('�����'), t('�����'), t('������������'), t('�������'), t('������'), t('�������'));
$tcat = !empty($k) ? str_replace($inname, $outname, $k) : t('�������');
asort($section);
########################
$youm .= '<tr><td class="panelm"><b>'.$tcat.'</b></td></tr>';
foreach ($section as $option){
$punkt = "";
$punkt = explode("=", $option['url']);

if (in_array($punkt[1], array($modul, $gplugin))) { 
$itnow_a = "<b><u>"; 
$itnow_b = "</u></b>"; 
} else { 
$itnow_a = ""; 
$itnow_b = ""; 
}

$youm .= '<tr><td title="'.(!empty($option['category']) ? $option['category'] : '').'" style="padding: 2px;">� '.$itnow_a.'<a href="'.$PHP_SELF.'?'.$option['url'].'" title="'.$option['name'].'">'.$option['name'].'</a>'.$itnow_b.'</td></tr>';
$punkt = "";
}
########################
}
  if ($member['usergroup'] == 1) {
  $youm .= '<tr><td height="10"></td></tr><tr><td class="panelm"><b>� <a title="'.t('���������� ���������� ������ ������').'" href="?mod=debug">'.t('�������').'</a></b></td></tr>';
  }
$youm .=  '</table>';
 return $youm;
 }
}





if (!empty($config['skin']) and file_exists(admin_skins_directory.'/'.$config['skin'].'/index.php')){
    require_once admin_skins_directory.'/'.$config['skin'].'/index.php';
} else {
    $using_safe_skin = true;
    require_once admin_skins_directory.'/default/index.php';
}

// If User is Not Logged In, Display The Login Page
if (empty($is_logged_in)){
	require modules_directory.'/login.mdu';
} elseif (!empty($is_logged_in)){





	if (check_referer){
		$self = !empty($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';

	    if (empty($self)){
	    	$self = !empty($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '';
	    }

	    if (empty($self)){
	    	$self = $PHP_SELF;
	    }
//echo $self.$PHP_SELF.$HTTP_REFERER;
if (!empty($HTTP_REFERER) and !preg_match("#".$self."#i", $HTTP_REFERER))
            {
	    	echo t('<h3>��������, �� ������ � ������� ��������!</h3>���������� ������� <a href="%url">�����</a> �� ������� � ����� ����� �����!<br>��������� �������� ������������, �������� <b>check_referer</b> � ����� %file �� �������� <i>false</i>.', array('url' => $PHP_SELF.'?action=logout', 'file' => 'inc/defined.inc.php'));
	        exit;
	    }
	}
	
	
	
	


// ********************************************************************************
// Include System Module
// ********************************************************************************
    $bad_keys = false;
    foreach (array('remove', 'delete', 'enable', 'disable', 'rename') as $k => $v){
	    if ((!empty($_GET['action']) and $_GET['action'] == $v) or 
	    (!empty($_GET['subaction']) and $_GET['subaction'] == $v) or 
	    !empty($_GET['enabled']) or !empty($_GET['disable']) or !empty($_GET[$v])){
	        $bad_keys = true;
	    }
    }

$modul = $mod = ((!empty($_GET['mod']) and !empty($QUERY_STRING)) ? cheker($modul) : (empty($_GET['mod']) ? 'main' : 'main'));

 if (!empty($_POST['number_'.$modul]) and is_numeric($_POST['number_'.$modul]) and $_POST['number_'.$modul] > 0) {
    straw_setcookie("number_".$modul, intval($_POST['number_'.$modul]), (time + 1012324305), '/');
 }

    if (!empty($gplugin)){
    
    
        if (!straw_get_rights($gplugin, 'read') and $gplugin != 'ajax' and $gplugin != 'preview'){
            msg('error', t('������'), t('��� �������� ������ � ����� ������!'));
        } else {
        	if (!straw_get_rights($gplugin, 'write') and (!empty($_POST) or (!empty($_GET) and !empty($bad_keys)))){
        		$_POST = $_GET = array();
        		msg('error', t('������'), t('��� �������� ������ � ����� �������!'));
        	} else {
        		run_actions('plugins');
        	}
        }
        
        
    } else {
	    
	    if (file_exists(modules_directory.'/'.$mod.'.mdu')){
	        if (!straw_get_rights($mod, 'read') and $mod != 'logout' and $mod != 'options'){
	            msg('error', t('������'), t('��� �������� ������ � ����� ������!'));
	        } else {
	        	if (!straw_get_rights($mod, 'write') and (!empty($_POST) or (!empty($_GET) and !empty($bad_keys)))){
	        		$_POST = $_GET = array();
	        		msg('error', t('������'), t('��� �������� ������ � ����� ������!'));
	        	} else {
	        		include modules_directory.'/'.$mod.'.mdu';
	        	}
	       }
	    } else {
	    echo $mod;
	        msg('error', t('������'), t('�������� ������.'));
	    }
	    
	    
    }
    
    
}




if ($sql_error_out != "mysql") {

echo "<!-- ".t('�������� ������������� �� %tim ���.', array('tim'=>$timer->stop()))." -->";

echo "\n<!-- ".t('���� ������� �������� � ���� ������')." ".t('� ������')." sql ".$sql->query_count()." + ".t('� ������')." db ".$db->num_queries." -->";
echo "\n<!-- Strawberry ".$default['version_id']." � 2008 - ".date('Y')." -->";

} else {
echo "<center><font color=\"red\"><b>".t('� ������ ������ ���� ������ MySQL ����������. ���������� ������ ����������.')."</b></font></center>";
}
?>