<?php
$ap=1;

Header("Content-Type: application/rss+xml");

### ���������� �������
include_once 'system/head.php';

if (!empty($config['use_rss'])) {

### ������������� ���������
// ���� ����������. ��������� � ����� data/tpl/system/atom - ���� �� ������������, ����� �� ������� ;)

### ����� rss
include root_directory.'/show_feed_atom.php'; // ������� ���� atom



} else {

## ($id ? " ".$config['delitel']." ".cn_meta('title') : "") //  the note

header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="'.$config['charset'].'" ?>';
?>
<title type="html"><?php echo $config['home_title']; ?></title>
 <link rel="self" href="<?php echo $config['http_home_url']; ?>/atom.php" />
 <link href="<?php echo $config['http_home_url']; ?>" />
 <id><?php echo $config['version_name'].' '.$config['version_id']; ?></id>
<updated><?php echo date("D, j M Y H:m:s O"); ?></updated>
<author>
		<name><?php echo $config['home_author']; ?></name>
		<email><?php echo $config['admin_mail']; ?></email>
</author>

<entry>
<title type="html">Atom</title>
<link rel="alternate" href="<?php echo $config['http_home_url']; ?>"/>
<summary type="html"><?php echo t('� ������ ������ Atom ��� �������������.'); ?></summary>
<author>
<name><?php echo $config['home_author']; ?></name>
<uri><?php echo $config['http_home_url']; ?></uri>
</author>
<updated><?php echo date("YY, mm, DD"); ?></updated>
<id><?php echo $config['http_home_url']; ?></id>
</entry>

</feed>
<?
}
?>