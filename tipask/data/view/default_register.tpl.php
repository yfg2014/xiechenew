<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<div class="content">
    <div class="dh">注册新用户</div>
    <div class="loginleft">
        <div class="zhuce">
            <div class="zhucet"></div>
            <div class="zhucec">
                <h1><a href="<?=SITE_URL?>?user/login.html">已有账号？马上登录！</a></h1> 
                <h1>友情贴士：</h1>
                <ul>
                    <li>·我们提醒您注意，您需要注册并登陆，才能享受我们的完整服务进行各项操作。</li>
                    <li>·密码过于简单有被盗的风险，一旦密码被盗你的个人信息有泄漏的危险。</li>
                    <li>·我们拒绝垃圾邮件，请使用有效的邮件地址</li>
                </ul>
            </div>
            <div class="zhuceb"></div>
        </div>
    </div>
    <div class="loginright">
        <div class="lgbdright">
            <ul>
                <li class="a1"></li>
                <li class="a2"></li>
                <li class="a3"></li>
            </ul>
        </div>
        <div class="clr"></div>
        <div class="lgrightc">
            <div class="dl">
                <form name="reg" name="registform"   action="<?=SITE_URL?>?user/register.html" method="post" onsubmit="return docheck();">
                    <div class="dlc">
                        <? if($userinfo) { ?>                        <? if(!$setting['ucenter_open']) { ?>                        <div class="shur">
                            <h2><input type="checkbox" name="qqavatar" value="<?=$userinfo['figureurl_1']?>" />使用QQ头像：&nbsp;&nbsp;</h2>
                            <img src="<?=$userinfo['figureurl_1']?>" width="50px" height="50px" />
                        </div>
                        <? } ?>                        <input type="hidden" name="access_token" value="<?=$access_token?>" />
                        <? } ?>                        <div class="shur">
                            <h2>&nbsp;&nbsp;用户名：</h2>
                            <input type="text" id="username" name="username" onblur="check_username()" class="input3" value="<?=$userinfo['nickname']?>" />
                            <span id="usernametip" class="input_desc">不超过14个字节(中文，数字，字母和下划线)</span>
                        </div>
                        <div class="clr"></div>
                        <div class="shur">
                            <h2>登录密码：</h2> <input type="password"  name="password" id="password" class="input3" onblur="check_passwd()" />
                            <span id="passwordtip" class="input_desc" onblur="check_passwd()">长度6-14位，字母区分大小写</span>
                        </div>
                        <div class="clr"></div>
                        <div class="shur">
                            <h2>密码确认：</h2> <input type="password"  name="repassword" id="repassword" class="input3" onblur="check_repasswd()"/>
                            <span id="repasswordtip" class="input_desc">与登录密码输入一致</span>
                        </div>
                        <div class="clr"></div>
                        <div class="shur">
                            <h2>电子邮件：</h2> <input type="text"  id="email" name="email" class="input3" onblur="check_email()"/>
                            <span id="emailtip" class="input_desc">请输入正确的电子邮箱地址</span>
                        </div>
                        <? if($setting['code_register']) { ?>                        <div class="clr"></div>
                        <div class="shur">
                            <h2>&nbsp;&nbsp;验证码：</h2> <input type="text" class="input4" id="code" name="code" onblur="check_code()" />&nbsp;<img align="absmiddle" id="verifycode" onclick="javascript:updatecode();" src="<?=SITE_URL?>?user/code.html"/><a href="javascript:updatecode();">&nbsp;换一个</a>
                            <span id="codetip" class=""></span>
                        </div>
                        <? } ?>                        <div class="clr"></div>
                        <div class="shur3">
                            <input type="submit" name="submit" class="button4"  <? if($userinfo) { ?>value="提交资料"<? } else { ?>value="提交注册"<? } ?>/></div>
                    </div>
                </form>
                <div class="clr"></div>
            </div>
        </div>
        <div class="lgbdright2">
            <ul>
                <li class="a1"></li>
                <li class="a2"></li>
                <li class="a3"></li>
            </ul>
        </div>
    </div>
</div>
<div class="clr"></div>
<script type="text/javascript">
    usernameok=1;
    password=1;
    repasswdok=1;
    emailok=1;
    codeok=1;
    function check_username(){
        var username=$.trim($('#username').val());
        var length=bytes(username);
        if( length <3 || length >15 ){
            $('#usernametip').html("用户名请使用3到15个字符");
            $('#usernametip').attr('class','input_error');
            usernameok=false;
        }else{
            $.post("<?=SITE_URL?>index.php?user/ajaxusername",{username: username}, function(flag){
                if(-1==flag){
                    $('#usernametip').html("此用户名已经存在！");
                    $('#usernametip').attr('class','input_error');
                    usernameok=false;
                }else if(-2==flag){
                    $('#usernametip').html("用户名含有禁用字符！");
                    $('#usernametip').attr('class','input_error');
                    usernameok=false;
                }else{
                    $('#usernametip').html("&nbsp;");
                    $('#usernametip').attr('class','input_ok');
                    usernameok = true;
                }
            });
        }
    }

    function check_passwd(){
        var passwd=$('#password').val();
        if( bytes(passwd) <6|| bytes(passwd)>16){
            $('#passwordtip').html("密码最少6个字符，最长不得超过16个字符");
            $('#passwordtip').attr('class','input_error');
            password =false;
        }else{
            $('#passwordtip').html("&nbsp;");
            $('#passwordtip').attr('class','input_ok');
            password =1;
        }
    }

    function check_repasswd(){
        repasswdok=1;
        var repassword=$('#repassword').val();
        if( bytes(repassword) <6|| bytes(repassword)>16){
            $('#repasswordtip').html("密码最少6个字符，最长不得超过16个字符");
            $('#repasswordtip').attr('class','input_error');
            repasswdok=false;
        }else{
            if($('#password').val()==$('#repassword').val()){
                $('#repasswordtip').html("&nbsp;");
                $('#repasswordtip').attr('class','input_ok');
                repasswdok=true;
            }else{
                $('#repasswordtip').html("两次密码输入不一致");
                $('#repasswordtip').attr('class','input_error');
                repasswdok=false;
            }
        }
    }

    function check_email(){
        var email=$.trim($('#email').val());
        if (!email.match(/^[\w\.\-]+@([\w\-]+\.)+[a-z]{2,4}$/ig)){
            $('#emailtip').html("邮件格式不正确");
            $('#emailtip').attr('class','input_error');
            usernameok=false;
        }else{
            $.post("<?=SITE_URL?>index.php?user/ajaxemail",{email: email}, function(flag){
                if(-1==flag){
                    $('#emailtip').html("此邮件地址已经注册！");
                    $('#emailtip').attr('class','font_orange2');
                    emailok=false;
                }else if(-2==flag){
                    $('#emailtip').html("邮件地址被禁止注册！");
                    $('#emailtip').attr('class','input_error');
                    emailok=false;
                }else{
                    emailok=true;
                    $('#emailtip').html("&nbsp;");
                    $('#emailtip').attr('class','input_ok');
                }
            });
        }
    }

    function check_code(){
        var code=$.trim($('#code').val());  
        $.post("<?=SITE_URL?>index.php?user/ajaxcode",{code: code}, function(flag){
            if(1==flag){
                $('#codetip').html("&nbsp;");
                $('#codetip').attr('class','input_ok');
                codeok=true;
            }else{
                $('#codetip').html("验证码不匹配！");
                $('#codetip').attr('class','input_error');
                codeok=false;
            }
        });
    }

    function docheck(){
        <? if($setting['code_register']) { ?>        return (usernameok && repasswdok && emailok && codeok);
        <? } else { ?>        return (usernameok && repasswdok && emailok ); 
        <? } ?>    }
</script>
<? include template('footer'); ?>
