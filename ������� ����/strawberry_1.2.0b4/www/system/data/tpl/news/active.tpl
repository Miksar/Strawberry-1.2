<br>
<?php if (!empty($tpl['post']['dateheader'])){ ?>
<div class="block" width="50%"><a href="<?php echo $tpl['post']['link']['day']; ?>"><?php echo $tpl['post']['dateheader']; ?></a></div>
<?php } ?>

<div id="news<?php echo $tpl['post']['id']; ?>" <?php if (!empty($tpl['post']['public'])) { echo "class=\"unpublished\""; } else { echo "class=\"three\""; } ?>>


<div class="ndte"><b><?php echo $tpl['post']['date']; ?></b></div>
<div class="theme"><b><a href="<?php echo $tpl['post']['link']['post']; ?>" title="<?php echo $tit." - ".$tpl['post']['title']; ?>" class="theme"><?php echo $config['delitel']." ".$tpl['post']['title']; ?></a></b></div>
<?php if(!empty($tpl['post']['ago'])) { ?><div align="right" class="ndte">������������: <?php echo $tpl['post']['ago']; ?></div><?php } ?>
<div class="four"><div class="nbtext"><?php echo $tpl['post']['short-story']; ?></div></div>

<div class="authnews">
<hr align="right" width="82%"><?php if (!empty($tpl['post']['if-right-have'])){ ?>��������: <a href="system/index.php?mod=editnews&amp;id=<?php echo $tpl['post']['id']; ?>" title="������������� �������">edit</a> / <a href="system/index.php?mod=editnews&amp;action=delete&amp;selected_news[]=<?php echo $tpl['post']['id']; ?>" title="������� �������">del</a><?php } ?> ������� �������: <?php echo $tpl['post']['author']; ?>. <font  title="����������: <?php echo $tpl['post']['views']; ?>">����������: <?php echo $tpl['post']['views']; ?>.</font>  <?php if (function_exists('rating')) { ?><span title="�������/�����: <?php echo tpl('rating')."/".$tpl['post']['votes']; ?>">�������: <?php echo tpl('rating'); ?>.</span><?php } ?>
<?php if (!empty($tpl['post']['comments']) and !empty($config['use_comm'])){ ?> <a href="<?php echo $tpl['post']['link']['post']; ?>#comments" title="����������� � �������">������������: <?php echo $tpl['post']['comments']; ?></a>.<?php 
} 
?> 
<a target="_blank" href="<?php echo $tpl['post']['link']['home/print.php/post']; ?>" title="<?php echo $tit." - ".$tpl['post']['title']; ?> - ������ ��� ������">������</a>.  
<a target="_blank" href="<?php echo $tpl['post']['link']['home/rss.php/post']; ?>" title="<?php echo $tit." - ".$tpl['post']['title']; ?> - RSS ������">RSS</a>.
</div>


<?php echo (!empty($tpl['news']['1']['main']) ? $tpl['news']['1']['main'] : ""); ?>
<?php echo (!empty($tpl['news']['2']['main']) ? $tpl['news']['2']['main'] : ""); ?>
<?php echo (!empty($tpl['news']['3']['main']) ? $tpl['news']['3']['main'] : ""); ?>
<?php echo (!empty($tpl['news']['4']['main']) ? $tpl['news']['4']['main'] : ""); ?>
<?php echo (!empty($tpl['news']['5']['main']) ? $tpl['news']['5']['main'] : ""); ?>
</div>
<br>