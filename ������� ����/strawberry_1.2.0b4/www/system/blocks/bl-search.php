<?php
#_strawberry
if (!defined("str_block")) {
header("Location: ../../index.php");
exit;
}

$bl_out = "<div class=\"one\"><div class=\"two\"><div class=\"in\">
<form method=\"post\" action=\"".way($config['home_page']."?mod=search")."\" enctype=\"multipart/form-data\">
<input name=\"mod\" type=\"hidden\" value=\"search\">
<b>".t('����� � ������� STRAWBERRY')."</b><br><input type=\"text\" name=\"search\" class=\"srup\" value=\"".t('�����')."\" autocomplete=\"off\" onfocus=\"javascript:this.value=(this.value=='".t('�����')."')?'':this.value;\" onblur=\"javascript:this.value=(this.value=='')?'".t('�����')."':this.value;\"> <input type=\"submit\" class=\"srupgo\" value=\"".t('������!')."\"><br>".t('������� � ����� �� ����� ���� ��������!')."
</form>
</div></div></div>";

?>