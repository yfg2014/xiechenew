<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="1" width="45%" align="center" class="tableborder">
<tr class="header"><td>消息提示</td></tr>
<tr class="altbg2"><td><font color="#FFA406"><?=$message?></font><? if('BACK'!=$redirect) { ?><br /><span class="smalltxt">页面将在3秒后自动跳转到下一页，你也可以直接点 <a href="<?=$redirect?>" >立即跳转</a>。</span>
<script type="text/javascript">
function redirect(url, time) {
setTimeout("window.location='" + url + "'", time * 1000);
}
redirect('<?=$redirect?>', 3);
</script>
 <? } ?>  </td></tr>
</table><? } include template(footer,admin); ?>
