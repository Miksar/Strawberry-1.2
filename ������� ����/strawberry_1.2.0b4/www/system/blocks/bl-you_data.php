<?php
#_strawberry
if (!defined("str_block")) {
header("Location: ../../index.php");
exit;
}

$bl_out = "<b>IP:</b> ".whois_ip()."<br>";
$bl_out .= "<screept type=\"text/javascript\" language=\"JavaScript\">";
$bl_out .= "document.write(\"<b>".t('�������').":</b> \" + navigator.appName + \"<br>\");";
$bl_out .= "document.write(\"<b>".t('���').":</b> \" + navigator.appCodeName + \"<br>\");";
$bl_out .= "document.write(\"<b>".t('������').":</b> \" + navigator.appVersion + \"<br>\");";
$bl_out .= "document.write(\"<b>".t('���������').":</b> \" + navigator.platform+\"<br>\");";
$bl_out .= "document.write(\"<b>".t('�������').":</b> \"+screen.width+\" � \"+screen.height+\"<br>\");";
$bl_out .= "</screept>";

?>