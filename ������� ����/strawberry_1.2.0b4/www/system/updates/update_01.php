<?php
 if (!defined("str_update")) die("Access dinaed");

$categ = "";

echo "��� ���������� ����������� ������ �������� ������������ �� ���������. ��� ����� � ����� � ����� �������� �������� �� ���� ������. <br><br>���� �� ������������� � ������������ ������� ������, �� ��� ���������� �� ����� ������. ���� �� ���������� ��� ���������� ������ ����, �� ��� ���������� ����������.<br><br>�� ���������� ���������� ����� ������������� ���������� ����� ������� (� ����������� �� ���������� ����� �������). �� ���������� ���� �� ��������� ����������.<br><br>";

if (!empty($_POST['action']) and $_POST['action'] == "do") {
echo "<br><center><strong>������!</strong></center><br>";
$arr_query = $db->sql_query("SELECT * FROM ".$config['dbprefix']."news");
$a=0;
while($query[] = $db->sql_fetchrow($arr_query)) {

   if (!empty($query[$a]['category'])) {
   
echo (!empty($_POST['result']) ? "������ <b>� ".$query[$a]['id']."</b> � ���������(��) <b>".$query[$a]['category']."</b><br>" : "");
$categ = $query[$a]['category'];
if (!empty($query[$a]['category']) and (substr($query[$a]['category'], 0, 1) != "," or substr($query[$a]['category'], -1) != ",")) {
if (substr($query[$a]['category'], 0, 1) != ",") $categ = ",".$categ;
if (substr($query[$a]['category'], -1) != ",") $categ = $categ.",";
$db->sql_query("UPDATE ".$config['dbprefix']."news SET category='".$categ."' WHERE id='".$query[$a]['id']."'");
echo (!empty($_POST['result']) ? "������ ���������(��) �� <b>".$categ."</b><hr>" : "");
} else {
echo (!empty($_POST['result']) ? "<i>���������� �� ���������!</i><hr>" : "");
}

   } else {

echo (!empty($_POST['result']) ? "<strong><font color=\"red\">��������! � ������ � ".$query[$a]['id']." �� ������� ���������!</font></strong><hr>" : "");

   }
$a++;
$categ = "";
}


echo "<br><center><strong>���������� ���������!</strong></center>";

} else {

echo "<center><form method=\"post\" action=\"\"><input type=\"hidden\" name=\"action\" value=\"do\"><input type=\"checkbox\" name=\"result\" value=\"1\"> ������� ���������� ���������? (����� ��������� ������ ��������!)<br><input type=\"submit\" value=\" ��������� ���������� \"></form></center>";

}

?>