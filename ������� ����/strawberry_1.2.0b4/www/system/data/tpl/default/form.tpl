<noscript><div class="error_message">����� ��������� ������������ JavaScript, ����� ����������� �� �� ��������. ����� ����, ��.</div><br /></noscript>
<a name="comments"></a>
<div>�������� ����������� � &laquo;<?php echo $tpl['post']['title']; ?>&raquo;</div>
<div class="comment_form">
<?php if (!$tpl['if-logged']){ ?>
���<br /><input type="text" name="name" value="<?php echo $tpl['form']['saved']['name']; ?>"><br />
E-mail<br /><input type="text" name="mail" value="<?php echo $tpl['form']['saved']['mail']; ?>"><br />
�����������<br /><input type="text" name="homepage" value="<?php echo ($tpl['form']['saved']['homepage'] ? $tpl['form']['saved']['homepage'] : 'http://'); ?>"><br />
<?php } ?>
<noindex><?php echo $tpl['form']['smilies']; ?></noindex>
<br />
<center><textarea class="gb" name="commin_story" style="overflow-x: hidden; overflow-y: visible;" onclick="submit.disabled = false;"></textarea></center><span style="cursor: pointer; padding: 0px 15px 0px 0px;"><input type="submit" name="submit" value=" �������� " accesskey="s" style="cursor: pointer;"></span>
<br /><input name="captcha" class="sstupid">
<label for="rememberme"><input type="checkbox" id="rememberme" name="rememberme" value="on" checked> ��������� ���?</label>
<label for="sendcomments"><input type="checkbox" id="sendcomments" name="sendcomments" value="on"> �������� ����������� �� ��� e-mail?</label>
<br />
<noindex><?php echo $tpl['form']['tags']; ?></noindex>
</div>