<tr><td colspan="3" class="arttit" align="center"><?php echo $config['delitel']; ?> <u><?php echo $tpl['user']['name']; ?></u> <?php echo $config['delitel']; ?></td></tr>

<tr class="nbtext" valign="top">
<td width="90"><b>ICQ</b></td>
<td><?php echo $tpl['user']['icq']; ?></td>
<td rowspan="6" align="center" valign="middle"><?php echo $tpl['user']['avatar']; ?></td>
</tr>

<tr class="nbtext" valign="top">
<td><b>Web-����</b></td>
<td><?php echo $tpl['user']['homepage']; ?></td>
</tr>

<tr class="nbtext" valign="top">
<td><nobr><b>����� ������</b></nobr></td>
<td><?php echo $tpl['user']['lj-username']; ?></td>
</tr>

<tr class="nbtext" valign="top">
<td><b>������</b></td>
<td><?php echo $tpl['user']['location']; ?></td>
</tr>

<tr class="nbtext" valign="top">
<td><b>����������</b></td>
<td><b class="c2"><?php echo $tpl['user']['publications']; ?></b></td>
</tr>

<tr class="nbtext" valign="top">
<td><b>������������</b></td>
<td><b class="c3"><?php 
if (!empty($member['username']) and $tpl['user']['username'] != $member['username']) { 
?><a href="#" onclick="giveMoney('<?php echo $tpl['user']['username']; ?>')">�������� (+)</a> / 
<a href="#" onclick="takeMoney('<?php echo $tpl['user']['username']; ?>')">������ (-)</a> /<?php } ?> 
<a href="#" onclick="showMoney('<?php echo $tpl['user']['username']; ?>')">���������� ��������</a>
</b>
<br>(+) ����� ������: <b class="c3"><?php echo $tpl['user']['money']['plus']; ?></b>
<br>(-) ����� �������: <b class="c3"><?php echo $tpl['user']['money']['minus']; ?></b>
<br>������ ������� ������������: <b class="c3"><?php echo $tpl['user']['money']['rating']; ?>%</b>
<br>����� ������� ������������: <b class="c3"><?php echo $tpl['user']['money']['global_rating']; ?>%</b></td>
</tr>

<tr class="nbtext" valign="top">
<td><b>� ����</b></td>
<td colspan=2><?php echo $tpl['user']['about']; ?></td>
</tr>

<tr class="nbtext" valign="top">
<td><b>�� ������:</b></td>
<td><?php
$a = $tpl['user']['name'];
$b = !empty($member['username']) ? $member['name'] : '';
if(!empty($member['username']) and $a == $b) echo "<a href=\"index.php?mod=account&act=profil\"><u>������������� ���� �������</u></a>;<br>";
?>
<a target="_blank" href="rss.php?user=<?php echo $tpl['user']['username']; ?>">���������� ��������e ���������� <?php echo $tpl['user']['name']; ?>`a � RSS</a>;<br><a href="index.php?mod=account&act=users">��������� � ������ �������������</a>.</td>
</tr>