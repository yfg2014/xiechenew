<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/dialog.js" type="text/javascript"></script>
<script src="js/admin.js" type="text/javascript"></script>
<script src="js/calendar.js" type="text/javascript"></script>
<div id="append">
</div>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;举报管理</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr>
<td class="<?=$type?>"><?=$message?></td>
</tr>
</table><? } ?><table width="100%" cellspacing="1" cellpadding="4" align="center" class="tableborder">
<tbody>
<tr class="header" ><td>举报管理</td></tr>
<tr class="altbg1"><td>下面列表按举报时间排序</td></tr>
</tbody>
</table>
[共 <font color="green"><?=$informnum?></font> 条举报记录]
<form name="userForm" action="index.php?admin_inform/remove<?=$setting['seo_suffix']?>" method="POST">
 <table width="100%" border="0" cellpadding="4" cellspacing="1" align="center" class="tableborder">
<tr class="header">
<td width="10%"><input class="checkbox" id="chkall" onclick="checkall('qid[]')" type="checkbox" name="chkall"><label for="chkall">全选</label></td>
<td  width="30%">举报的问题</td>
<td  width="20%">举报内容</td>
<td  width="20%">举报原因</td>
<td  width="10%">举报次数</td>
<td  width="10%">举报时间</td>
</tr>
<? if(is_array($informlist)) { foreach($informlist as $inform) { ?>
<tr>
<td class="altbg2"><input class="checkbox" type="checkbox" value="<?=$inform['qid']?>" name="qid[]"></td>
<td class="altbg2"><a href="<?=SITE_URL?>?q-<?=$inform['qid']?>.html" target="_blank"><?=$inform['title']?></a></td>
<td class="altbg2"><a href="index.php?user/space/<?=$answer['authorid']?><?=$setting['seo_suffix']?>" target="_blank"><?=$answer['author']?></a></td><? $fcontent = cutstr($inform['content'],30) ?><td class="altbg2"><?=$fcontent?></td><? $freason = cutstr($inform['reasons'],30) ?><td class="altbg2"><?=$freason?></td>
<td class="altbg2"><?=$inform['time']?></td>
</tr>
<? } } ?>
<!--<? if($departstr) { ?><tr class="smalltxt">
<td class="altbg2" colspan="6"><?=$departstr?></td>
</tr><? } ?><tr>
<td colspan="6" class="altbg1"><input class="button" type="button" name="delete" onclick="ondelete();" value="删除" /></td>
</tr>
</table>
</form>
<? include template(footer,admin); ?>
<script type="text/javascript">
    function ondelete(){
        if($("input[name='qid[]']:checked").length == 0){
            alert('你没有选择任何一条举报!');
            return false;
        }
        if(confirm('确认删除该举报记录?此操作不可恢复!')==false){
            return false;
        }
        document.userForm.action="index.php?admin_inform/remove<?=$setting['seo_suffix']?>";
        document.userForm.submit();
    }
</script>