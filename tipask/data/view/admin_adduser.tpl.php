<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;添加新用户</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr>
<td class="<?=$type?>"><?=$message?></td>
</tr>
</table><? } ?><form action="index.php?admin_user/add<?=$setting['seo_suffix']?>" method="post">
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr class="header">
<td colspan="2">参数设置</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>用户名:</b><br><span class="smalltxt">注册用户名</span></td>
<td class="altbg2"><input type="text" name="addname" /></td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>密码:</b><br><span class="smalltxt">用户密码</span></td>
<td class="altbg2"><input type="text" name="addpassword"></td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>Email:</b><br><span class="smalltxt">用户的真实email地址，可用于找回密码</span></td>
<td class="altbg2"><input type="text" name="addemail"></td>
</tr>
</table>
<br />
<center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br />
<? include template(footer,admin); ?>
