<?php
// inc/show.add-comment.php
?>

Subject: ����� ����������� �� <?php echo $name; ?>

URL: <?php echo $homepage; ?>/<?php echo straw_get_link($row); ?>

���������: <?php echo $row['title']; ?>

���: <?php echo $name; ?>

IP: <?php echo getip(); ?>

E-mail: <?php echo $mail; ?>

Homepage: <?php echo $homepage; ?>


�����������:
------------
<?php echo str_replace('<br>', "\n", $commin_story); ?>

�������������:
<?php echo $config['http_script_dir']; ?>/?mod=editcomments&action=editcomment&newsid=<?php echo $id; ?>&comid=<?php echo $comid; ?>

�������:
<?php echo $config['http_script_dir']; ?>/?mod=editcomments&action=doeditcomment&newsid=<?php echo $id; ?>&delcomid[]=<?php echo $comid; ?>&deletecomment=yes