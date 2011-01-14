<?php
#_strawberry
if (!defined("str_adm")) { header("Location: ../../index.php"); exit; }

// mail form v.2.3 for strawberry 1.1.1

// �������� ����� ���� ���������� ������. ��� �� ������ ������� ������ $config['admin_mail'] ������ �����.
$mailadmin = !empty($config['admin_mail']) ? $config['admin_mail'] : "no-reply@".$_SERVER['SERVER_NAME'];

// time
$timesender = langdate('j M Y - H:i', time);

// ip
$ip = getip();

// agent
$usagent = getagent();

if (!empty($_POST['sendcopy'])) {
$cpp = "checked";
} else {
$cpp = "";
}

$namesender = !empty($_POST['namesender']) ? $_POST["namesender"] : "guest";
$emailsender = !empty($_POST['emailsender']) ? $_POST["emailsender"] : "";
$isqsender = !empty($_POST['isqsender']) ? $_POST["isqsender"] : "";
$sitesender = !empty($_POST['sitesender']) ? rurl($_POST["sitesender"]) : "";
$subjectsender = !empty($_POST['subjectsender']) ? $_POST["subjectsender"] : t('��� ����');
$themesender = !empty($_POST['themesender']) ? $_POST["themesender"] : "";
$textsender = !empty($_POST['textsender']) ? $_POST["textsender"] : "";
$sendcopy = !empty($_POST['sendcopy']) ? 1 : 0;
$message = "";
$error = array();


ob_start();
include mails_directory.'/mail_form.tpl';  // ������� ����� �� ��������
$mail_order = ob_get_contents();
ob_end_clean();



/*
// �������� �����, ������� �������� 100%
// Open Sourse by Mr.Miksar - see in mail_form.tpl

$mail_order = "<hr>
<form action=\"\" method=\"post\">
<table border=\"0\" width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"2\" id=\"mail_form\" class=\"nbtext\">
<tr class=\"text\">
<td class=\"admin\" width=\"50%\">".t("���� ��� (���)*").":</td>
<td width=\"50%\" class=\"admin\">".t("��� e-mail*").":</td></tr>
<tr>
<td>";

if (!empty($is_logged_in)) {

$mail_order .= "<u>".$member['name']."</u></td>";
$namesender = $member['name'];
##$nmsndr = $member['name']." <small>(login: ".$member['username'].", number: ".$member['id'].")</small>";
if(!empty($member['mail'])) {
$emailsender = $member['mail'];
if (!empty($member['hide_mail'])) $mail_order .= "<td>".$member['mail'];
} else {
$mail_order .= "<td><input maxlength=\"35\" name=\"emailsender\" class=\"regtext\" value=\"".$emailsender."\">";
}
$mail_order .= "</td></tr><tr class=\"text\"><td>".t("��� ����� ICQ").":</td><td>".t("��� ����").":</td></tr><tr><td>";

if(!empty($member['icq'])) {
$isqsender = $member['icq'];
$mail_order .= "".$member['icq']."</td>";
} else {
$mail_order .= "<input maxlength=\"11\" name=\"isqsender\" class=\"regtext\" value=\"".$isqsender."\"></td>";
}

if(!empty($member['homepage'])) {
$sitesender = rurl($member['homepage']);
$mail_order .= "<td>".$member['homepage'];
} else {
$mail_order .= "<td><input maxlength=\"30\" name=\"sitesender\" class=\"regtext\" value=\"".$sitesender."\">";
}

} else {

$mail_order .= "<input maxlength=\"80\" name=\"namesender\" class=\"regtext\" value=\"".$namesender."\"></td>
<td><input maxlength=\"35\" name=\"emailsender\" class=\"regtext\" value=\"".$emailsender."\">
</td>
</tr>
<tr class=\"text\">
<td>".t("��� ����� ICQ").":</td>
<td>".t("��� ����").":</td>
</tr>
<tr>
<td><input maxlength=\"11\" name=\"isqsender\" class=\"regtext\" value=\"".$isqsender."\"></td>
<td><input maxlength=\"30\" name=\"sitesender\" class=\"regtext\" value=\"".$sitesender."\">";
}

$mail_order .= "</td>
</tr>
<tr class=\"text\">
<td>".t("���� ������*").":</td>
<td>".t("���� ���� ������").":</td>
</tr>
<tr>
<td><select name=\"subjectsender\" size=\"1\" id=\"subjectsender\"><option value=\"".t("����� ������")."\" selected>".t("����� ������")."</option><option value=\"".t("�����")."\">".t("�����")."</option><option value=\"".t("������� � �������")."\">".t("�������")."</option><option value=\"".t("��������������")."\">".t("��������������")."</option><option value=\"".t("�������")."\">".t("�������")."</option></select></td>
<td><input maxlength=\"300\" name=\"themesender\" class=\"regtext\" value=\"".$themesender."\"></td>
</tr>
<tr>
<td colspan=\"2\"><input type=\"checkbox\" ".$cpp." name=\"sendcopy\" value=\"1\"> ".t("�������� ��� ����� ������?")."</td>
</tr>
<tr class=\"text\">
<td colspan=\"2\" class=\"admin\">".t("����� ������ ���������*").":</td>
</tr>
<tr>
<td colspan=\"2\" align=\"center\"><textarea name=\"textsender\" class=\"gb\" rows=\"5\" cols=\"10\">".$textsender."</textarea></td>
</tr>";

if (empty($is_logged_in) and $config['pin']) {
$mail_order .= "<tr><td colspan=\"2\" align=\"center\">".pin_cod("default", "mail")."</td></tr>";
}

$mail_order .= "<tr align=\"center\">
<td><input name=\"submit\" type=\"submit\" class=\"regok\" value=\" ".t("���������")." \"></td>
<td><input class=\"regok\" name=\"reset\" type=\"reset\" value=\" ".t("��������")." \"></td>
</tr>
<tr>
<td colspan=\"2\" class=\"sep\"></td>
</tr>
<tr>
<td valign=\"bottom\" colspan=\"2\"><p>".t("* ����, ���������� <font class=\"admin\">���� ������</font>, ����������� ��� ����������.")."</p></td>
</tr>
</table>
<input name=\"send\" type=\"hidden\" value=\"1\">
</form>";
*/










// �������� �� ����������� �����
if (!empty($_POST['send']) and is_numeric($_POST['send'])) {
##############################################################################################
##############################################################################################







    // ���������, ��������� �� ��� ����
    if (empty($namesender) or 
         empty($emailsender) or 
         empty($_POST['textsender']) or 
         (pin_check("mail") and empty($is_logged_in))
         ) {
$mail_order .= "<table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"admin\"><b>".t("��������� �� ����������")."!</b></p>";
$mail_order .= t("�� ���� ��������� ��������� ������������ ����").":<br>";
if (empty($namesender)): $mail_order .= "&nbsp; � ".t("���� ���")."<br>"; endif;
if (empty($emailsender)): $mail_order .= "&nbsp; � ".t("��� E-Mail")."<br>"; endif;
if (empty($_POST['textsender'])): $mail_order .= "&nbsp; � ".t("����� ���������")."<br>"; endif;
if (pin_check("mail") and empty($is_logged_in)): $mail_order .= "&nbsp; � ".t("�������� ��� ������������!")."<br>"; endif;

$mail_order .= "<br></td></tr></table>";
$error[0] = 1;
    } else {
$error[0] = 0;
    }


    // ��������� ������������ ���������� e-mail
    if (!empty($emailsender) and !preg_match('/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{2,3}$/i', $emailsender)) {
$mail_order .= "<table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"admin\"><b>".t("��������� �� ����������")."!</b></p>";
$mail_order .= t("��������� ���� ����� E-Mail (%eml) �������� ������������ ������� ��� ����� ������������ ������.", array('eml' => $emailsender))."<br>";

$mail_order .= "</td></tr></table>";
$error[1] = 1;
    } else {
$error[1] = 0;
    }

// ��������� ����� ��������� �� ����������� � ������������ ����� ��������
    $length = !empty($textsender) ? strlen(trim($textsender)) : 0;
    if ($length > 2000) {
$mail_order .= "<table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"admin\"><b>".t("��������� �� ����������")."!</b></p>";
$mail_order .= t("������� ������� ���������. ���������� �������: <font class=\"admin\">%lngth</font>. ����� ������ �� ������ ��������� <font class=\"moder\">2000 ��������</font>.", array('lngth' => $length))."<br>";

$mail_order .= "</td></tr></table>";
$error[2] = 1;
    }
    elseif ($length < 10 && $length > 0) {
$mail_order .= "<table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"admin\"><b>".t("��������� �� ����������")."!</b></p>";
$mail_order .= t("������� �������� ���������. ���������� ��������: <font class=\"admin\">%lngth</font>. �����  �� ������ ���� ������ <font class=\"moder\">10 ��������</font>.", array('lngth' => $length))."<br>";

$mail_order .= "</td></tr></table>";
$error[2] = 1;
    }
    else {
    $error[2] = 0;
    }

    // ��������� ������������ ���������� e-mail
    if (!empty($mailadmin) and $mailadmin != "no-reply@".$_SERVER['SERVER_NAME'] and $emailsender == $mailadmin and empty($is_logged_in)){
$mail_order .= "<table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"admin\"><b>".t("��������� �� ����������")."!</b></p>";
$mail_order .= t("��������� ���� ����� E-Mail (%eml) ��������� � ������� �������������! �� ������ � ��������!", array('eml' => $emailsender))."<br>";

$mail_order .= "</td></tr></table>";
$error[3] = 1;
    } else {
$error[3] = 0;
    }














// ��������� ���� ������
$header['subjectsender']  = !empty($subjectsender) ? stripslashes(trim($subjectsender)) : t('��� ����');


    // ������� HTML
    $namesender = !empty($namesender) ? htmlspecialchars(stripslashes($namesender)) : "guest";
$isqsender = !empty($isqsender) ? htmlspecialchars(stripslashes($isqsender)) : 0;
    $textsender = !empty($textsender) ? htmlspecialchars(stripslashes($textsender)) : "";
$sitesender = !empty($sitesender) ? rurl(htmlspecialchars(stripslashes($sitesender))) : 0;
    $namesender = trim(substr($namesender,0,50));
    $emailsender = trim(substr($emailsender,0,50));


// ���� ��� ������, �� ���������� ������! #and empty($error[4])
if (empty($error[0]) and empty($error[1]) and empty($error[2]) and empty($error[3])) {

// �������� �����
if (!empty($sendcopy)) {
$mailto = $mailadmin.",".$emailsender;
} else {
$mailto = $mailadmin;
}

// �������� ���� ������
if (!empty($themesender)) {
$subjectsender = htmlspecialchars(stripslashes($themesender));
}

// ��������� ������
$message .= "<br><font face=\"verdana\" size=\"2\">".$subjectsender;
$message .= "<br>";
$message .= t("��� ����� %namesender � ����� %subjectsender", array('namesender' => $namesender, 'subjectsender' => $subjectsender));
$message .= "<br><br> &nbsp;&nbsp;&nbsp;&nbsp;<b><u>� ".t("��������").":</u></b>";
$message .= "<br> E-Mail: ".$emailsender;
$message .= "<br> ICQ: ".$isqsender;
$message .= "<br> URL: ".rurl($sitesender);
$message .= "<br> ".t("���� ��������").": ".$timesender;
$message .= "<br> &nbsp;&nbsp;&nbsp;&nbsp;<b><u>� ".t("���������").":</u></b>";
$message .= "<br>".$textsender;
$message .= "<br><br> ----------------------------------------------";
$message .= "<br><br> <b>User Agent</b>: ".$usagent;
$message .= "<br> <b>IP</b>: ".$ip;
$message .= "</font><br>";

// ��������� ����� ������
$headers  = "MIME-Version: 1.0\n";
$headers .= "From: ".(!empty($emailsender) ? $emailsender : $mailadmin)."\n";
$headers .= "Content-Type: text/html; charset=".$config['charset']."\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// ���������� ������
$send = mail($mailto, $subjectsender, $message, $headers);

// ���� � ����
$tmsender = time;
$textsender = replace_news('add', $textsender);
$nmsndr = !empty($is_logged_in) ? $member['username'] : $namesender; 

$db->sql_query("INSERT INTO ".$config['dbprefix']."mail VALUES (NULL, '$nmsndr', '$emailsender', '$isqsender', '$sitesender', '$subjectsender', '$textsender', '$ip', '$usagent', '$tmsender', '1')");

// ��������� � ����������� �� ����, ������ ������ ���������� ��� ���.
if (!empty($send)) {
$mail_order = "<hr><table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"moder\"><b>".t("��������� ����������")."!</b></p>";
$mail_order .= "&nbsp; � ".t("�������, %namesender, ���� ��������� ������� ����������.", array('namesender' => $namesender))."<br>".t("�� ����������� ��� ���������� ��������.")."</p>";

if (!empty($sendcopy)) {
$mail_order .= "&nbsp; � ".t("�� ��� E-Mail (%emailsender) ������� ����� ������. ����� ��������� ����� �� ������ ��������� ��������� ���� �������� ����, ����� ���������, ��� �������� ������ �������.", array('emailsender' => $emailsender))."</p>";
}

$mail_order .= t("�� ������ <a href=\"%put\" title=\"��������� �����\"><u>��������� �����</u></a> � �������� ��� ��� ���� ������.", array('put' => $put));
$mail_order .= "</td></tr></table>";
   }
   else
   {
$mail_order = "<hr><table width=\"90%\" border=\"0\" align=\"center\" class=\"text\"><tr><td>";
$mail_order .= "<br><p align=\"center\" class=\"admin\"><b>".t("��������� �� ����������")."!</b></p>";
$mail_order .= "&nbsp; � ".t("��������� �������������� ������ ��� ������� ��������� ���������.")."<br>";
$mail_order .= "&nbsp; � ".t("����������, ���������� � <b><a href=\"mailto:%mailadmin\">��������������</a></b>.", array('mailadmin' => $mailadmin))."</p>";
$mail_order .= "</td></tr></table>";
   }
}







##############################################################################################
##############################################################################################
}







$mail_order .= "<hr>";
echo $mail_order;
?>