<?php
// inc/show.add-comments.php
?>

Subject: <?php echo $name; ?> ������� �� ��� �����������

������������!

�� ��������� ����������� � �<?php echo $row['title']; ?>�, <?php echo $name; ?> �� ���� �������.

�����������:
------------
<?php echo str_replace('<br>', "\n", $commin_story); ?>

���������� ����� ����� <?php echo straw_get_link($row); ?>