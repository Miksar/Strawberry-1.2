<hr><a name="commentors"></a>

<table cellpadding="0" cellspacing="0" class="nbtext" >
<tr>
<td class="smtext" align="center" style="cursor: pointer; padding: 0px 0px 5px 0px;" onclick="contactsTable()" title="������� ����, ��� �� ������� ����� ������������!"><font id="contactsText">�� ������ �������� �����������? ����� ����!</font></td>
</tr>
<tr>
<td style="display: none" id="contactsTr">
<noscript><div class="error_message">��� ����� ��������� ������������ JavaScript, ����� ����������� �� �� ��������.</div><br></noscript>

<?php if (!$tpl['if-logged']){ ?>
<table cellpadding="0" cellspacing="1" width="100%" class="smtext">
<tr align="left">
    <td width="50">���:</td>
    <td><input class="regtext" type="text" name="name" value="<?php echo $tpl['form']['saved']['name']; ?>"></td>
    <td width="170" rowspan="3" valign="middle"><?php if ($tpl['form']['pin'] == 1) { echo pin_cod("default", "comment"); } ?></td>
</tr>
<tr align="left">
<td width="50">E-Mail:</td>
<td><input class="regtext" type="text" name="mail" value="<?php echo $tpl['form']['saved']['mail']; ?>"></td>
</tr>
<tr align="left">
<td width="50">URL:</td>
<td align="left"><input class="regtext" type="text" name="homepage" value="<?php echo ($tpl['form']['saved']['homepage'] ? $tpl['form']['saved']['homepage'] : ''); ?>"></td>
</tr>
<tr align="left">
<td><input name="captcha" class="sstupid"></td>
<td><label for="rememberme" align="center"><input type="checkbox" id="rememberme" name="rememberme" value="on" checked="checked"> ��������� ���?</label></td>
</tr>
</table>
<?php } ?>

<table border="0" cellpadding="1" cellspacing="1" width="100%" class="smnbtext">
<tr>
<td class="cntnt" width="80" align="center" valign="top"><noindex><?php echo $tpl['form']['smilies']; ?></noindex></td>
<td align="right" valign="top"><center><textarea class="gb" name="commin_story" style="overflow-x: hidden; overflow-y: visible;"></textarea></center>
<nobr><label for="sendcomments"><input type="checkbox" id="sendcomments" name="sendcomments" value="on"> �������� ����������� �� ��� e-mail?</label>&nbsp;&nbsp;&nbsp;&nbsp;
<span style="padding: 0px 15px 0px 0px;"><input type="submit" name="sendcom" value=" �������� " accesskey="s" style="cursor: pointer;"></span></nobr></td>
<td class="cntnt" width="80" align="center" valign="top"><noindex><?php echo $tpl['form']['tags']; ?></noindex></td>
</tr>
</table>

</td></tr>
</table>

<hr>