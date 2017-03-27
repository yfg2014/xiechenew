<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/dialog.js" type="text/javascript"></script>
<script src="js/admin.js" type="text/javascript"></script>
<script src="js/calendar.js" type="text/javascript"></script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;用户管理</div>
</div>
<div id="append"></div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr>
        <td class="<?=$type?>"><?=$message?></td>
    </tr>
</table><? } ?><form action="index.php?admin_user/search<?=$setting['seo_suffix']?>" method="post">
    <table width="100%" cellspacing="1" cellpadding="4" align="center" class="tableborder">
        <tbody>
            <tr class="header" ><td colspan="7">用户列表</td></tr>
            <tr class="altbg1"><td colspan="7">可以通过如下搜索条件，检索用户</td></tr>
            <tr>
                <td width="20%" >用户名:<input class="txt" name="srchname"></td>
                <td  width="20%">UID:<input class="txt" name="srchuid"></td>
                <td  width="20%">Email:<input class="txt" name="srchemail"></td>
                <td  rowspan="2"><input class="btn" type="submit" value="提 交"></td>
            </tr>
            <tr>
                <td  width="20%">注册日期:<input class="txt" onclick="showcalendar();" name="srchregdatestart"></td>
                <td  width="20%">到<input class="txt" onclick="showcalendar();" name="srchregdateend"></td>
                <td  width="20%">注册IP:<input class="txt" name="srchregip"></td>
            </tr>
        </tbody>
    </table>
</form>
<form name="userForm" action="index.php?admin_user/remove<?=$setting['seo_suffix']?>" method="post">
    <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tableborder">
        <tr class="header">
            <td width="6%"><input class="checkbox" id="chkall" onclick="checkall('uid[]')" type="checkbox" name="chkall"><label for="chkall">全选</label></td>
            <td  width="15%">用户名</td>
            <td  width="15%">Email</td>
            <td  width="10%">注册时间</td>
            <td  width="15%">注册IP</td>            
            <td  width="10%">上次登录时间</td>
            <td  width="10%">已推荐</td>
            <td  width="10%">编辑</td>
        </tr>

        
<? if(is_array($userlist)) { foreach($userlist as $member) { ?>
        <tr>
            <td class="altbg2"><input class="checkbox" type="checkbox" value="<?=$member['uid']?>" name="uid[]"></td>
            <td class="altbg2"><strong><?=$member['username']?></strong></td>
            <td class="altbg2"><?=$member['email']?></td>
            <td class="altbg2"><?=$member['regtime']?></td>
            <td class="altbg2"><?=$member['regip']?></td>
            <td class="altbg2"><?=$member['lastlogintime']?></td>
            <td class="altbg2"><? if($member['elect']) { ?><font color="Red">是</font><? } else { ?>否<? } ?></td>
            <td class="altbg2"><a href="index.php?admin_user/edit/<?=$member['uid']?><?=$setting['seo_suffix']?>">编辑</a></td>
        </tr>
        
<? } } ?>
        <? if($departstr) { ?>        <tr><td colspan="7" class="altbg2" align="right"><?=$departstr?></td></tr>
        <? } ?>        <tr><td colspan="7" class="altbg1" align="left"><input class="button" type="button" name="elect" onclick="commenduser(1);" value="推荐为本周之星" />&nbsp;&nbsp;<input class="button" type="button" name="elect" onclick="commenduser(0);" value="取消推荐" />&nbsp;&nbsp;<input class="button" type="button" name="delete" onclick="remove();" value="删除" /></td></tr>
    </table>
</form>
<br>
<? include template(footer,admin); ?>
<script type="text/javascript">
    function commenduser(type){
        if($("input[name='uid[]']:checked").length > 1){
            alert('只能选择一个用户进行操作');
            return false;
        }
        var uid = $("input[name='uid[]']:checked").val();
        $.dialog({
            id:'addreason',
            position:'center',
            align:'left',
            width:300,
            height:100,
            title:'添加推荐理由',
            fnOk:function(){
                if('' == $.trim($("#reaasondesc").val()) ){
                    alert("入选原因不能为空！");
                    return false;
                }
                document.addreasonForm.submit();
                $.dialog.close('addreason');
            },
            fnCancel:function(){$.dialog.close('addreason')},
            content:'<div class="mainbox">请添加该用户的入选理由（<font color="red">必填项</font>）：<form name="addreasonForm" action="index.php?admin_user/famous/'+type+'<?=$setting['seo_suffix']?>"  method="post" ><input type="hidden" name="uid" id="uidval" value="'+uid+'" /><textarea name="reason" id="reaasondesc" style="width: 100%; padding-top: 1px; font-size: 14px;" rows="4" ></textarea></form></div>'
        });
    }

    function remove(){
        if($("input[name='uid[]']:checked").length == 0){
            alert('你没有选择任何用户');
            return false;
        }
        if(confirm('是否同时删除用户的所有问答？')==true){
            document.userForm.action="index.php?admin_user/remove/all<?=$setting['seo_suffix']?>";
            document.userForm.submit();
        }else{
            document.userForm.action="index.php?admin_user/remove<?=$setting['seo_suffix']?>";
            document.userForm.submit();
        }
    }
</script>


