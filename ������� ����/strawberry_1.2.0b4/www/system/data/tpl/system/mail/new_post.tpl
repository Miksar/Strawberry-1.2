<?php
// inc/mod/addnews.mdu
?>

Subject: ����� ���������� �� ����� <?php echo $config['home_title']; ?>

<?php echo langdate($config['timestamp_comment'], $added_time); ?> ��������� ����� ������� �� ������������ <?php echo $member['username']; ?>.

<?php echo $title; ?>

<?php echo replace_news('admin', $short_story); ?>

--
<?php echo $config['http_home'].'/'.$config['home_page']; ?>?id=<?php echo $id; ?>