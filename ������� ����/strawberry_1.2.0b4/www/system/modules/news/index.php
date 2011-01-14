<?php

if (!defined("str_modul")) {
	header("Location: ../../../index.php");
	exit;
}


function news_menu() {
global $config, $is_logged_in;
$lmenu = "<a href=\"".way(straw_get_link(array(), 'mod', 'home'))."\" title=\"".t('�������')."\">".t('�������')."</a>";
if (!empty($is_logged_in)) $lmenu .= " | <a href=\"".way(straw_get_link(array(), 'postadd', 'home'))."\" title=\"".t('��������')." ".t('�������')."\">".t('��������')."</a>";
echo "<center><div class=\"mmenu\">".$lmenu."</div></center>";
}

if (empty($act) or (!empty($act) and $act!="add" and $act!="save")) {

### ��������� ������
$tit = t("�������"); 
?> 

<!-- content news -->

<?php
otable();
news_menu(); 
$number = ( (!empty($_POST['number']) and is_numeric($_POST['number'])) ? intval($_POST['number']) : ( (!empty($_GET['number']) and is_numeric($_POST['number'])) ? intval($_GET['number']) : (!empty($config['out_news']) ? $config['out_news'] : 20) ));
$category = ( !empty($_POST['category']) ? cheker($_POST['category']) : ( !empty($_GET['category']) ? cheker($_GET['category']) : '2' ));
$template = 'news';
//$bookmark = true; // ������������ ��� ������� ��������
include root_directory."/show_news.php";
echo on_page($modul);
ctable();
?>

<!-- /content news -->

<?php


} else {


if (!empty($_POST['fld'])) {
$cpp = "checked";
} else {
$cpp = "";
}

    $short_story = !empty($_POST['short_story']) ? $_POST['short_story'] : '';
    $full_story = !empty($_POST['full_story']) ? $_POST['full_story'] : '';
    $title = !empty($_POST['title']) ? $_POST['title'] : (($config['atitle'] and !empty($short_story)) ? substr($short_story, 0, 10).'...' : '');




### ��������� ������
$tit = t("�������� ����������"); 
otable();
news_menu();
################################
if (!empty($is_logged_in) and !empty($act) and $act == "add" and empty($_POST['short_story'])) {
?>

<form method="post" name="addnews" action="?mod=news&amp;act=save" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0" class="nbtext">
<tr>
 <td colspan="2" class="panel" height="33"><b><?php echo t('��� ���������� ������ �� �������� ����������� ��� %t', array('t'=>'&lt;!--nextpage--&gt;')); ?></b><br /><b><span class="moder"><?php echo t('��������! ������� ����������� ����� �������������!'); ?></span></b></td>
</tr>
<tr>
<td valign="top" width="60%" style="padding: 5px;">

<!-- ��������� -->
<fieldset id="title"><legend><?php echo t('���������'); ?></legend>
<input type="text" name="title" value="<?php echo $title; ?>" class="regtext">
<?php if (!empty($config['atitle'])) { ?>
<br><small><?php echo t('���� ���� ��������� �������� ������, �� ���������� ����� ������ 10 �������� �������� �������.'); ?></small>
<?php } ?>
</fieldset>

<!-- �������� -->
<fieldset id="short"><legend><?php echo t('�������� �������'); ?></legend>
<?php
echo run_filters('new-advanced-options', 'short'); 
echo cnops(15, 'short');
?>
<textarea name="short_story" class="news"><?php echo $short_story; ?></textarea><br><small><?php echo t('��������! �������� ������� ����������� � ����������!'); ?></small>
</fieldset>

<?php
if (empty($full_story)) {
$fa = "onclick=\"javascript:ShowOrHide('fulln')\" style=\"cursor: pointer;\"";
$fb = "<div id=\"fulln\" style=\"display: none;\">";
$fc = "</div>";
} else {
$fa = "";
$fb = "";
$fc = "";
}
?>

<!-- ������ -->
<fieldset id="full"><legend <?php echo $fa; ?>>
<?php echo t('������ �������'); ?> (<?php echo t(!empty($fa) ? '��������' : '�������������'); ?>)</legend>
<?php
echo $fb;
echo run_filters('edit-advanced-options', 'full'); 
echo cnops(15, 'full');
?>
<textarea name="full_story" class="news"><?php echo $full_story; ?></textarea>
<?php echo $fc; ?>
</fieldset>

<!-- ������ -->
<fieldset id="actions"><legend><?php echo t('��������'); ?></legend>
<input type="submit" name="go_news" value="<?php echo t('��������'); ?>" accesskey="s">
<!-- <input type="button" onclick="preview('addnews');" value="<?php echo t('��������������� ��������'); ?>" accesskey="p"> -->
</fieldset>



</td>
<td valign="top" width="200" style="padding: 5px;">


<?php
echo run_actions('new-advanced-options'); 
?>


</td>
</tr>
</table>

<input type="hidden" name="mod" value="news">
<input type="hidden" name="act" value="save">
</form>


<?php

} elseif(!empty($act) and $act == "add") {
echo "<hr><center class=\"admin\"><b>".t('�� �������������� ��� �� <a title="%reg" href="%url?mod=account&amp;act=registration">����������������</a>!', array('url'=>way($config['home_page']), 'reg'=>t('�����������')))."</b></center><hr>";
//echo $userlogin;
echo "<hr>";
}
################################

if (!empty($_POST['go_news']) and !empty($is_logged_in) and !empty($act) and $act == "save" and !empty($_POST['short_story'])){
## id ��������� ������� �������.
$id = ($sql->last_insert_id('news', '', 'id')) + 1;


## ���� ���� ���,�� ��������� �������
if (($added_time = strtotime($_POST['day'].' '.$_POST['month'].' '.$_POST['year'].' '.$_POST['hour'].':'.$_POST['minute'].':'.$_POST['second'])) == -1){
$added_time = time;
}

####################################################################################################
    run_actions('new-save-entry');

    $title = !empty($_POST['title']) ? replace_news('add', $_POST['title']) : ((!empty($config['atitle']) and !empty($short_story)) ? substr($short_story, 0, 10).'...' : '');
    $short_story = !empty($_POST['short_story']) ? replace_news('add', $_POST['short_story']) : '';
    $full_story = !empty($_POST['full_story']) ? replace_news('add', $_POST['full_story']) : '';
    $author = ((!empty($_POST['author']) and is_admin()) ? $_POST['author'] : (!empty($member['username']) ? $member['username'] : t('�����������')));
    $strlen_short_story = strlen($short_story);
    $strlen_full_story = !empty($full_story) ? strlen($full_story) : 0;
    $n_category = !empty($category) ? $category : '';
    $url = !empty($_POST['url']) ? straw_namespace(totranslit($_POST['url'])) : straw_namespace(totranslit($title));
    $approve_news = straw_get_rights('approve_news');
    $sticky_post = !empty($_POST['sticky_post']) ? 1 : 0;
    $n_template = !empty($_POST['template']) ? $_POST['template'] : '';

// ���� ���������, �������� � ��������, ������� ����������� �� ���� ����� ��� ���������� ������
    $meta_info_title = !empty($_POST['meta_info_title']) ? replace_news('add', $_POST['meta_info_title']) : $title;
    $meta_info_keywords = !empty($_POST['meta_info_keywords']) ? replace_news('add', $_POST['meta_info_keywords']) : '';
    $meta_info_description = !empty($_POST['meta_info_description']) ? replace_news('add', $_POST['meta_info_description']) : '';

// ���� �������� � ��������, ������� ������������ ��������� �� ������������ ������
    if (!empty($config['auto_keywords']) or !empty($config['auto_description'])) {
    $keyworker = array();
    $keyworker = create_meta((!empty($full_story) ? $_POST['full_story'] : $_POST['short_story']), $meta_info_keywords, $meta_info_description);
    $meta_info_keywords = !empty($config['auto_keywords']) ? $keyworker['keywords'] : $meta_info_keywords;
    $meta_info_description = !empty($config['auto_description']) ? $keyworker['description'] : $meta_info_description;
    }


// ���������� � ����
 $db->sql_query("INSERT INTO ".$config['dbprefix']."news VALUES ('".$added_time."', '".$author."', '".$title."', '".$strlen_short_story."', '".$strlen_full_story."', '', '".$n_category."', '".$url."', NULL, '0', '0', '".$approve_news."', '".$sticky_post."', '', '', '', '', '', '0', '0', '".$n_template."')");
 $db->sql_query("INSERT INTO ".$config['dbprefix']."story (post_id, short, full, metatitle, metakeywords, metadescription, ico, add_comm, stop_comm, format) VALUES (NULL, '$short_story', '$full_story', '$meta_info_title', '".$meta_info_keywords."', '".$meta_info_description."', '".(!empty($_POST['news_ico']) ? $_POST['news_ico'] : '')."', '".(!empty($_POST['endiscomments']) ? 'on' : 'no')."', '".(!empty($_POST['stopcomments']) ? 'on' : 'no')."', '".(!empty($_POST['fs_format']) ? $_POST['fs_format'] : 'html_with_br')."')");
 if (!empty($member['id'])) { $db->sql_query("UPDATE ".$config['dbprefix']."users SET publications=publications+1 WHERE id='".$member['id']."' "); }

##########################################################################################


##################################################################
## �������� �������� �� ������...
	if (!empty($config['send_mail_upon_new']) and !empty($config['admin_mail'])){
	
        ob_start();
        include mails_directory.'/new_post.tpl';
        $tpl['body'] = ob_get_contents();
        ob_end_clean();
        
        preg_match('/Subject:(.*)/i', $tpl['body'], $tpl['subject']);
        preg_match('/Attachment:(.*)/i', $tpl['body'], $tpl['attachment']);
        
        $tpl['body']       = preg_replace('/Subject:(.*)/i', '', $tpl['body']);
        $tpl['body']       = preg_replace('/Attachment:(.*)/i', '', $tpl['body']);
        $tpl['body']       = trim($tpl['body']);
        $tpl['subject']    = trim($tpl['subject'][1]);
        $tpl['attachment'] = (!empty($tpl['attachment'][1]) ? trim($tpl['attachment'][1]) : '');
        straw_mail($config['admin_mail'], $tpl['subject'], $tpl['body'], $tpl['attachment']);
	}
##################################################################


  echo "<br /><br /><h2>".t('������� ���������')."</h2><br />";
  echo "<div class=\"message\">".t('������� "%title" ���� ������� ���������.', array('title' => $title))."</div><br />";
}
################################
echo on_page($modul);
ctable();
} 
?>