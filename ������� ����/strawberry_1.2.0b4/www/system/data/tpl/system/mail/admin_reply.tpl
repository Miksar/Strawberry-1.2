<?php
// inc/mod/editcomments.mdu
?>

Subject: ����� �� �����������

������������, <?php echo $poster; ?>!

�� <?php echo langdate('d M Y \� H:i', $date); ?> �������� ����������� �� ����� <?php echo $config['home_title']; ?> (<?php echo $config['http_home'].'/'.$config['home_page']; ?>).
��� ��� ������� �����.

�����������:
<?php echo $poster; ?>> <?php echo $commin_story; ?>
�����:
<?php echo $reply; ?>

--
�������� ��� ��������� ��� ����������� �� ������ �� ����� ������ <?php echo straw_get_link($row); ?>

������� ������� �� ��� �����������.