<?php if ($tpl['post']['dateheader']){ ?>
<div class="dateheader"><a href="<?php echo $tpl['post']['link']['day']; ?>"><?php echo $tpl['post']['dateheader']; ?></a></div>
<?php } ?>

<div class="post">
<div id="news<?php echo $tpl['post']['id']; ?>" class="<?php echo $tpl['post']['alternating']; ?>">
<div class="date"><?php echo $tpl['post']['date']; ?> <small>(<?php echo $tpl['post']['ago']; ?>)</small></div>
<div class="title">
<a href="<?php echo $tpl['post']['link']['post']; ?>"><?php echo $tpl['post']['title']; ?></a>
<?php if ($tpl['post']['pages']){ ?>
<small>(<?php echo $tpl['post']['pages']; ?>)</small>
<?php } ?>
</div>
<hr align="left">
<div class="story"><?php echo $tpl['post']['short-story']; ?></div>
<?php if ($tpl['post']['full-story']){ ?>
<div class="full_link"><a href="<?php echo $tpl['post']['link']['post']; ?>">������ ���������</a></div>
<?php } ?>
<hr align="right">
<div class="attr">
<?php if ($tpl['post']['if-right-have']){ ?>
��������: <a href="system/index.php?mod=editnews&amp;id=<?php echo $tpl['post']['id']; ?>" title="������������� �������">edit</a> / <a href="system/index.php?mod=editnews&amp;action=delete&amp;selected_news[]=<?php echo $tpl['post']['id']; ?>" title="������� �������">del</a><br />
<?php } ?>
<?php if ($tpl['post']['category']['name']){ ?>
���������: <?php echo $tpl['post']['category']['name']; ?> /
<?php } ?>
<?php if ($tpl['post']['keywords']['name']){ ?>
���������: <?php echo $tpl['post']['keywords']['name']; ?> /
<?php } ?>
����������: <?php echo $tpl['post']['views']; ?>
<?php if ($tpl['post']['comments']){ ?>
 / <a href="<?php echo $tpl['post']['link']['post']; ?>#comments">����������� (<?php echo $tpl['post']['comments']; ?>)</a>
<?php } ?>
 / <span title="�������/�����: <?php echo tpl('rating')."/".$tpl['post']['votes']; ?>">�������: <?php echo tpl('rating'); ?></span>
<?php if ( !rating('check') ) { ?>
 / ������� �������:
<form name="cnpostrating" method="post" style="margin: 0; padding: 0;">
<select size="1" name="rating[<?php echo $tpl['post']['id']; ?>]">
 <option value="0">0</option>
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
</select>
<input type="submit" value="ok"><!-- �������! "���-���" - ���-�� ���������� ��� -->
</form>
<?php } ?>
</div>
</div>
</div>