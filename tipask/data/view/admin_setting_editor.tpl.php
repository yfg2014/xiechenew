<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;编辑器设置&nbsp;&raquo;&nbsp;全局设置</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr>
<td class="<?=$type?>"><?=$message?></td>
</tr>
</table><? } ?><form action="index.php?admin_editor/setting<?=$setting['seo_suffix']?>" method="post">
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr class="header">
<td colspan="2">
全局设置&nbsp;&nbsp;&nbsp;
<!--<input type="button" value="编辑器功能" onclick="document.location.href='index.php?admin_editor/default<?=$setting['seo_suffix']?>'" style="cursor:pointer">-->
</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>开启数字统计:</b><br><span class="smalltxt">开启后编辑器会自动统计输入字数</span></td>
<td class="altbg2">
                    <input class="radio"  type="radio"  <? if('true'==$setting['editor_wordcount'] ) { ?>checked<? } ?>  value="true" name="editor_wordcount"><label for="yes">是</label>&nbsp;&nbsp;&nbsp;
                    <input class="radio"  type="radio"  <? if('false'==$setting['editor_wordcount']) { ?>checked<? } ?> value="false" name="editor_wordcount"><label for="no">否</label>
</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>显示html元素路径:</b><br><span class="smalltxt">开启后会显示elementPath<?=$setting['editor_elementpath']?></span></td>
<td class="altbg2">
                    <input class="radio"  type="radio"  <? if('true' == $setting['editor_elementpath'] ) { ?>checked<? } ?>  value="true" name="editor_elementpath"><label for="yes">是</label>&nbsp;&nbsp;&nbsp;
                    <input class="radio"  type="radio"  <? if('false' == $setting['editor_elementpath'] ) { ?>checked<? } ?> value="false" name="editor_elementpath"><label for="no">否</label>
</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>其它信息:</b><br><span class="smalltxt">在编辑器功能管理可以手动调整，FullScreen,Source,Undo,Redo,Bold</span></td>
<td class="altbg2"><textarea class="area" name="editor_toolbars"  style="height:200px;width:500px;"><?=$setting['editor_toolbars']?></textarea></td>
</tr>
</table>
<br>
<center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br>
<? include template(footer,admin); ?>
