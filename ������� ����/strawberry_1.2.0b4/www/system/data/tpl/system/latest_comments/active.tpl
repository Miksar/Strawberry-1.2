<table border="0" width="100%" class="alternating">
<tr><td width="120" align=center valign="top">{date}</td>
<td>
<p><b>{author}</b><br>{text}</p>
<p><b>�����:</b> {answer}</p>
<p>����: <a href="?id={id}&category={category-id}">{title}</a><br>
�� �������: {category}
</p>
<? if (($is_logged_in) and ($member['usergroup']<4)){ ?>
<div align="right">
<a href="<?=$config['http_script_dir'];?>/index.php?mod=editcomments&newsid={id}&comid={cid}" target="_blank">�������������/��������</a>
</div>
<? } ?>
</td></tr></table>
