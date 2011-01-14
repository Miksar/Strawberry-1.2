<?php
#_strawberry
if (!defined("str_plug")) {
header("Location: ../../index.php");
exit;
}

/**
 * @package Plugins
 * @access private
 */

/*
Plugin Name: 	XFields
Description: 	�������������� ����.
Version: 		1.0
Application: 	Strawberry
Author: 		SMKiller2
*/

add_filter('template-active', 'xfields_templates', 27);
add_filter('template-full', 'xfields_templates', 27);

function xfields_templates($template){

	$template['xfields'] = t('�������� $tpl[\'post\'][\'xfields\'][\'X\'], ��� "X" ��� ��� ����.');

return $template;
}

add_action('head', 'call_xfields', 27);

function call_xfields(){
global $xfields_db;

    /*
    $xfieldsaction = 'templatereplace';
    $xfieldsinput  = $output;
    $xfieldsid     = $tpl['id'];
    include plugins_directory.'/xfields/core.php';
    $output        = $xfieldsoutput;
    */

    $xfields_data = file(data_directory.'/xfields-data.txt');
    foreach ($xfields_data as $line){
    	$xfields_arr = explode('|>|', $line);

        foreach (explode('||', $xfields_arr[1]) as $xfield){
            list($name, $content) = explode('|', $xfield);

            $xfields_db[$xfields_arr[0]][$name] = $content;
        }
    }
}

add_filter('news-show-generic', 'xfields_parse', 27);

function xfields_parse($tpl){
global $xfields_db;

    $tpl['xfields'] = array();

	if (!empty($xfields_db[$tpl['id']])){
		foreach ($xfields_db[$tpl['id']] as $k => $v){
			$tpl['xfields'][$k] = $v;
		}
	}

return $tpl;
}

add_filter('options', 'xfields_AddToOptions', 27);

function xfields_AddToOptions($options) {

	$options[] = array(
	             'name'     => t('�������������� ����'),
	             'url'      => 'plugin=xfields&xfieldsaction=configure',
	             'category' => 'plugin',
	             );

return $options;
}









add_action('plugins','xfields_CheckAdminOptions', 27);
function xfields_CheckAdminOptions(){
global $gplugin;
	if (!empty($gplugin) and $gplugin == 'xfields'){
		xfields_AdminOptions();
	}
}
function xfields_AdminOptions(){
global $PHP_SELF, $cutepath, $_GET, $xfieldsadd, $xfieldsaction, $xfield;
	foreach ($_GET as $k => $v){
		$$k = $v;
	}
	include plugins_directory.'/xfields/core.php';
}









add_action('new-advanced-options', 'admins_xfields', 27);
add_action('edit-advanced-options', 'admins_xfields', 27);

function admins_xfields(){
global $xfield, $id, $mod;
    ob_start();
    $xfieldsaction = 'list';
    $xfieldsadd = ((!empty($mod) and $mod == 'addnews') ? true : false);
    $xfieldsid = ((!empty($mod) and $mod == 'addnews') ? '' : $id);
    include plugins_directory.'/xfields/core.php';
    $xfields = ob_get_clean();
return $xfields;
}









add_action('mass-deleted', 'xfields_delete', 27);
function xfields_delete(){
global $row, $post;
    $xfieldsaction = 'delete';
    $xfieldsid = !empty($row['id']) ? $row['id'] : (!empty($post['id']) ? $post['id'] : 0);
    include plugins_directory.'/xfields/core.php';
}






add_action('new-save-entry', 'call_xfields_Save');
add_action('edit-save-entry', 'call_xfields_Save');
function call_xfields_Save(){
global $id, $xfield;
	$xfieldsid = $id;
	$xfieldsaction = 'init';
    include plugins_directory.'/xfields/core.php';
	$xfieldsaction = 'save';
	include plugins_directory.'/xfields/core.php';
}





add_filter('help-sections', 'xfields_help', 27);

function xfields_help($help_sections){
$help_sections['xfields'] = t('<h1>�������������� ����</h1>
<p>���� ������ �� ������ � ����������� ������ CuteNews. �� ������������ ��� ��������� ���. ������ � �����, ��� ����� ������ ������, ���� "�������������� ����" (XFields) �������� � ������� ������ �������.<br><br>
����������� �������������� ����� �������������� ����� ���� ��������� &gt; <a href=?mod=xfields&amp;xfieldsaction=configure>�������������� ����</a>. ������ ������� ������ ��� ���������� ������ �� �������, ��������, ������ �� �������������� ��������.</p>
<p>�������� ����� ���� �����, ����� �� ������ "<a href=?mod=xfields&xfieldsaction=configure&amp;xfieldssubaction=edit&amp;xfieldsindex=1.5>����� ����</a>". �� ����������� �������� ��� ���������� ������ ���������� ��� ����, �������� ���� � ���������� ���� �� ���������. ����� ��� ���������� �������, ������ �� �� ������������ ���� �� �������. �.�. ���� �� �������� ��� �����-������ ������ �� ������������ �������������� ����, ��� ���������� �������� ���� ������ ��� ����������/�������������� ������� � ������ �� ����� ����������.</p>
<p>��� ���� ����� ������������ ���� �� �������� � ���������, ��� ���������� � ������ �������� ���������� [xfvalue_X], ��� X - �������� ���� (���, ������� �� ����� ��� ���������� ������ ����). ����� ����� ������������ ������ [xfgiven_X]...[/xfgiven_X].</p>
<p>������ ������ �����:</p>
<p class="code">
<b>1)</b>- ��������: stit<br>
&nbsp;&nbsp;- ��������: �������� ����������<br>
&nbsp;&nbsp;- �������� �� ���������: �<br>
&nbsp;&nbsp;- ��� �������: ��<br>
<b>2)</b>- ��������: source<br>
&nbsp;&nbsp;- ��������: ������ �� �������� ����������<br>
&nbsp;&nbsp;- �������� �� ���������: http://server.com/<br>
&nbsp;&nbsp;- ��� �������: ��<br><br>
[xfgiven_source]�������� - &lt;a href=[xfvalue_source] target=_blank&gt;[xfvalue_stit]&lt;/a&gt;.[/xfgiven_source]</p>
<p>������ ������ ����� ��������� HTML-���:</p>
<p class="code">�������� - &lt;a href=http://server.com/ target=_blank&gt;�&lt;/a&gt;.</p>');

return $help_sections;
}
?>