<?php
 if (!defined("str_update")) die("Access dinaed");

$categ = "";

echo "��� ���������� �������� ������������ ����� ������� ������ ������� bookmark. <br><br>���� �� ������������� � ������������ ������� ������, �� ��� ���������� �� ����� ������. ���� �� ���������� ��� ���������� ������ ����, �� ��� ���������� ����������.<br><br>�� ���������� ���� �� ��������� ����������.<br><br>";

if (!empty($_POST['action']) and $_POST['action'] == "do") {
echo "<br><center><strong>������!</strong></center><br>";
###################################################################

$db->sql_query("ALTER TABLE ".$config['dbprefix']."news ADD `bookmark` INT(1) NOT NULL");

###################################################################
echo "<br><center><strong>���������� ���������!</strong></center>";
} else {
###################################################################

echo "<center><form method=\"post\" action=\"\"><input type=\"hidden\" name=\"action\" value=\"do\"><input type=\"submit\" value=\" ��������� ���������� \"></form></center>";

###################################################################
}

?>