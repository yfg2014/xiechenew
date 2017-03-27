<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<script src="<?=SITE_URL?>js/ueditor/editor_config.js" type="text/javascript"></script>
<script src="<?=SITE_URL?>js/ueditor/editor_all.js" type="text/javascript"></script>
<script src="<?=SITE_URL?>js/ueditor/third-party/SyntaxHighlighter/shCore.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=SITE_URL?>js/ueditor/themes/default/ueditor.css"/>
<link rel="stylesheet" href="<?=SITE_URL?>js/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css"/>
<div class="content">
    <!--问题分类导航开始-->
    <div class="dh">
        <a href="<?=SITE_URL?>"><?=$setting['site_name']?></a>&gt;礼品兑换</div>
    <!--问题分类导航结束-->
    <div class="leftbox">
        <!--问题开始-->
        <div class="wenti">
            <div class="wttitle">
                <ul>
                    <li class="wta1"></li>
                    <li class="wta2">兑换规则</li>
                    <li class="wta3"></li>
                    <li class="wta4"></li>
                </ul>
                <div class="clr"></div> 
            </div>
            <div class="wtallcont">
                <div class="wtright2">
                    <table id="tl" width="100%" border="0" cellspacing="0">
                        <tr>
                            <td>欢迎来到礼品商店，各种丰厚的礼品供您选择。只要您是本站的注册用户，并通过回答问题积累了一定的财富，就可以在这里挑选兑换自己喜爱的礼品。</td>
                            <td><img src="<?=SITE_URL?>css/common/theme_bg.gif" /></td>
                        </tr>
                    </table>
                </div>	
                <div class="clr"></div>
            </div>
            <div class="wtbuttom">
                <ul>
                    <li class="wtba1"></li>
                    <li class="wtba5"></li>
                    <li class="wtba3"></li>
                    <li class="wtba4"></li>
                </ul>
                <div class="clr"></div>
            </div>
        </div>
        <div class="wenti">
            <div class="wttitle">
                <ul>
                    <li class="wta1"></li>
                    <li class="wta2">选择价格范围</li>
                    <li class="wta3"></li>
                    <li class="wta4"></li>
                </ul>
                <div class="clr"></div> 
            </div>
            <div class="wtallcont">
                <div class="wtright3">
                    <div id="price_list">
                        <dl>
                            
<? if(is_array($ranglist)) { foreach($ranglist as $key => $val) { ?>
                            <dt class="tab_css2">
                            <? if(isset($to) && $val==$to) { ?>                            <strong><?=$key?>-<?=$val?></strong>
                            <? } else { ?>                            <a href="<?=SITE_URL?>?gift/search/<?=$key?>/<?=$val?>.html"><?=$key?>-<?=$val?></a>
                            <? } ?>                            </dt>
                            
<? } } ?>
                        </dl>
                        <br class="clear">
                    </div>
                </div>	
                <div class="clr"></div>
            </div>
            <div class="wtbuttom">
                <ul>
                    <li class="wtba1"></li>
                    <li class="wtba5"></li>
                    <li class="wtba3"></li>
                    <li class="wtba4"></li>
                </ul>
                <div class="clr"></div>
            </div>
        </div>
        <div class="wenti">
            <div class="wttitle">
                <ul>
                    <li class="wta1"></li>
                    <li class="wta2">兑换礼品</li>
                    <li class="wta3"></li>
                    <li class="wta4"></li>
                </ul>
                <div class="clr"></div> 
            </div>
            <div class="wtallcont">
                <div class="wtright3">
                    <div id="exchangegift">
                        <dl>
                            
<? if(is_array($giftlist)) { foreach($giftlist as $gift) { ?>
                            <dt>
                            <div style="height: 110px; width: 100px;" >
                                <table height="95" width="95" cellspacing="0" cellpadding="0" border="0" width="100">
                                    <tbody>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-top: 0pt;"><img id="giftimg<?=$gift['id']?>" height="95" width="95" style="border: 1px solid #E6E6E6;" src="<?=SITE_URL?><?=$gift['image']?>" alt="<?=$gift['title']?>" title="<?=$gift['description']?>" /></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-top: 0pt;" title="<?=$gift['title']?>"><? echo cutstr($gift['title'],10,''); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-top: 0pt;"><span id="giftcredit<?=$gift['id']?>">所需财富值:<font color="orange"><?=$gift['credit']?></font></span></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle"><a href="#" onclick="apply(<?=$gift['id']?>,<?=$gift['credit']?>);"><img style="cursor:pointer" src="<?=SITE_URL?>css/common/redeem.gif" alt="我要对换" /></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </dt>
                            
<? } } ?>
                        </dl>
                        <br class="clear">
                    </div>
                </div>	
                <div class="clr"></div>
            </div>
            <div class="wtbuttom">
                <ul>
                    <li class="wtba1"></li>
                    <li class="wtba5"></li>
                    <li class="wtba3"></li>
                    <li class="wtba4"></li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="blank20"></div>
            <div class="pages"><div class="scott"><?=$departstr?></div></div>
        </div>
        <!--问题结束-->
        <div class="clr"></div>
    </div>

    <div class="right1">
        <div class="gg">
            <div class="ggtitle">
                <ul>
                    <li class="gga1"></li>
                    <li class="gga2">
                        <div class="juzhong">礼品公告</div>
                    </li>
                    <li class="gga3"></li>
                </ul>
            </div>
            <div class="clr"></div>
            <div class="ggcon"><div style="margin-left:5px;"><?=$setting['gift_note']?></div></div>
            <div class="ggbuttom">
                <ul>
                    <li class="ggba1"></li>
                    <li class="ggba2"></li>
                    <li class="ggba3"></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</div>
<div class="clr"></div>
<script type="text/javascript">
    function apply(id,credit){
        var uid = "<?=$user['uid']?>";
        if(uid==0){
            alert("登陆之后才可以进行礼品兑换!");
            return false;
        }
        var giftimg = $("#giftimg"+id).attr("src");
        var gifttitle = $("#giftimg"+id).attr("alt");
        var giftcredit = $("#giftcredit"+id).text();
        var usercredit = "<?=$user['credit2']?>";
        if(usercredit<credit){
            alert("抱歉！您的财富值不足不能兑换该礼品!");
            return ;
        }
        $.dialog({
            id:'supplyDiv',
            position:'center',
            align:'center',
            fixed:1,
            width:400,
            title:'礼品对换申请',
            fnOk:function(){document.giftform.submit();$.dialog.close('supplyDiv')},
            fnCancel:function(){$.dialog.close('supplyDiv')},
            content:'<div style="text-align:left;"><form name="giftform" action="<?=SITE_URL?>?gift/add.html" method="POST"><input type="hidden" name="gid" value="'+id+'" /><div class="inner"><div class="inner-content"><div class="user-pic"><img src="'+giftimg+'" height="60" width="60" ></div><div class="user-info-main"><p class="user-name">礼品名称：'+gifttitle+'</p><p class="user-info-co"><span class="green">'+giftcredit+'</span></p><p class="user-progress-bar"></p></div></div></div><br /><p class="item"><label class="form-label">真实姓名：</label><span class="form-input input-text"><input type="text" size="42"  maxlength="20" class="input5" id="realname" name="realname" value="<?=$user['realname']?>"/><br /><span id="PwdNotice" style="color:red">请务必填入真实姓名，便于联系！</span></span></p><p id="curpwd" class="item"><label class="form-label" for="UserOldPwd">电子邮件：</label><span class="form-input input-text"><input size="42" maxlength="64" class="input5" id="email" name="email" value="<?=$user['email']?>" /><br /><span id="PwdNotice">常用的邮箱地址</span></span></p><p class="item"><label class="form-label" for="UserNewPwd">联系电话：</label><span class="form-input input-text"><input  size="42" maxlength="16" class="input5" id="phone" name="phone" value="<?=$user['phone']?>"/><br /><span id="PwdNotice" style="color:red">请填写真实联系电话</span></span></p><p id="newpwd_again" class="item"><label class="form-label" for="UserNewPwdAgn">邮寄地址：</label><span class="form-input input-text"><input type="text" size="42" class="input5" maxlength="100" id="addr" name="addr" /><br /><span id="PwdNotice" style="color:red">请填写真实地址，便于邮件！</span></span></p><p id="newpwd_again" class="item"><label class="form-label" for="UserNewPwdAgn">邮政编码：</label><span class="form-input input-text"><input type="text" size="42" class="input5" maxlength="100" id="addr" name="postcode" /><br /><span id="PwdNotice" style="color:red">请填写所在地的邮政编码！</span></span></p><p id="newpwd_again" class="item"><label class="form-label" for="UserNewPwdAgn">QQ号：</label><span class="form-input input-text"><input type="text" size="42" class="input5" maxlength="100" id="qq" name="qq" value="<?=$user['qq']?>"/><br /><br /></span></p><p id="newpwd_again" class="item"><label class="form-label" for="UserNewPwdAgn">备注：</label><span class="form-input input-text"><input type="text" name="notes" class="input5" /></p></div> '
        });
    }
</script>
<? include template('footer'); ?>
