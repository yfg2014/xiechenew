<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); $adlist = $this->fromcache("adlist"); ?><script src="<?=SITE_URL?>js/ueditor/editor_config.js" type="text/javascript"></script>
<script src="<?=SITE_URL?>js/ueditor/editor_all.js" type="text/javascript"></script>
<script src="<?=SITE_URL?>js/ueditor/third-party/SyntaxHighlighter/shCore.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=SITE_URL?>js/ueditor/themes/default/ueditor.css"/>
<link rel="stylesheet" href="<?=SITE_URL?>js/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css"/>
<div class="content">
    <!--问题分类导航开始-->
    <div class="dh">
        <a href="<?=SITE_URL?>"><?=$setting['site_name']?></a>
        
<? if(is_array($navlist)) { foreach($navlist as $nav) { ?>
        &gt; <a href="<?=SITE_URL?>?c-<?=$nav['id']?>.html"><?=$nav['name']?></a>
        
<? } } ?>
    </div>
    <!--问题分类导航结束-->
    <div class="leftbox">
        <!--问题开始-->
        <div class="wenti">
            <div class="wttitle">
                <ul>
                    <li class="wta1"></li>
                    <li class="wta2">
                        <div class="qico" >
                            <div class="iwhy"></div>
                        </div>
                        未解决
                    </li>
                    <li class="wta3"><a title="您可以在用户中心对所收藏的问题进行浏览" href="<?=SITE_URL?>?question/addfavorite/<?=$question['id']?>/<?=$question['cid']?>.html">收藏该问题</a>&nbsp;&nbsp;<a href="<?=SITE_URL?>?q-<?=$question['id']?>/<?=$ordertype?>/<?=$page?>.html" id="timeorder"><?=$ordertitle?></a>&nbsp;&nbsp;<a href="<?=SITE_URL?>?rss/question/<?=$question['id']?>.html"><img src="<?=SITE_URL?>css/default/rss.gif"  title="您可以在客户端借助于支持RSS的聚合工具软件，在不打开网站内容页面的情况下阅读网站内容。"/></a><a name="top"></a></li>
                    <li class="wta4"></li>
                </ul>
                <div class="clr"></div> 
            </div>
            <div class="wtallcont">
                <div class="wtleft">
                    <? if($question['hidden']) { ?>                    <div class="touxiang"><img align="absmiddle" src="<?=SITE_URL?>css/default/avatar.gif" alt="匿名用户" /></div>
                    <div class="hyxinxi">匿名</div>
                    <? } elseif($question['authorid']==0) { ?>                    <div class="touxiang"><img align="absmiddle" src="<?=SITE_URL?>css/default/avatar.gif" alt="匿名用户" /></div>
                    <div class="hyxinxi"><? if($question['ip']) { ?><?=$question['ip']?><? } else { ?>游客<? } ?></div>
                    <? } else { ?>                    <div class="readFace" id="userinfo-<?=$question['authorid']?>"></div>
                    <div class="touxiang"><a href="<?=SITE_URL?>?u-<?=$question['authorid']?>.html" target="top"> <img align="absmiddle" src="<?=$question['author_avartar']?>" alt="<?=$question['author']?>" onmouseout="closeuserinfo();" onmouseover="showuserinfo('<?=$question['authorid']?>');" /></a></div>
                    <div class="hyxinxi"><a href="<?=SITE_URL?>?u-<?=$question['authorid']?>.html" target="top"><?=$question['author']?></a></div>
                    <? } ?>                </div>
                <div class="wtright">
                    <div class="wtt">
                        <h1 class="wttit"><?=$question['title']?></h1>
                        <? if(!empty($taglist)) { ?>                        <div class="wtcont">
                            
<? if(is_array($taglist)) { foreach($taglist as $tag) { ?>
                            <a href="<?=SITE_URL?>?question/tag/<?=$tag?>.html" class="qtags"><?=$tag?></a>
                            
<? } } ?>
                        </div>
                        <div class="clr"></div> 
                        <? } ?>                        <div class="xs">
                            <span class="xsj"><img src="<?=SITE_URL?>css/default/TB2.gif" />悬赏分:<?=$question['price']?>&nbsp; </span> &nbsp;&nbsp;
                            <span class="twsj">
                                <img src="<?=SITE_URL?>css/default/lefttime.gif"> 离问题结束还有<?=$endtime?> &nbsp;&nbsp; 
                                浏览次数:<span id="views"><?=$question['views']?></span> &nbsp;&nbsp;
                                <a href="javascript:inform('<?=$question['author']?>',1);">举报</a>
                            </span>
                        </div>
                    </div>
                    <div class="qfgx"></div>
                    <div class="wtcont" id="mydescription">
                        <?=$question['description']?>
                    </div>
                    <div class="clr"></div> 
                    <? if($supplylist) { ?>                    <div class="blank10"></div>
                    <div class="wtcont">
                        
<? if(is_array($supplylist)) { foreach($supplylist as $supply) { ?>
                        <p class="qs_supply">问题补充:<?=$supply['format_time']?></p>
                        <div class="qs_supply_cont"><?=$supply['content']?></div>
                        
<? } } ?>
                    </div>
                    <? } ?>                    <? if((0!=$question['authorid'] && ($question['authorid']==$user['uid'])) ||  1==$user['groupid']) { ?>                    <div  class="wlhdb">
                        <? if(0!=$question['authorid'] && ($question['authorid']==$user['uid'])) { ?>                        <h1>处理问题：</h1>
                        <p> 如果已获得满意的回答，请及时采纳，感谢回答者。若还没有满意的回答，可以尝试以下操作：</p>
                        <span class="questioncontrol"><input type="button"  value="问题补充" name="supply_question" class="button1" title="补充提问细节，以得到更准确的答案" onclick="javascript:document.location='<?=SITE_URL?>?question/supply/<?=$question['id']?>.html'"/></span>
                        <span class="questioncontrol"><input type="button"  value="提高悬赏" name="add_score" onclick="showaddscore();"  class="button1" title="提高悬赏，以提高问题的关注度"/></span>
                        <span class="questioncontrol"><input type="button"  value="关闭问题" name="supply_question" onclick="javascript:if(confirm('确定关闭该问题?该操作不可恢复！')){document.closeForm.submit();return false;}"  class="button1" title="无满意答案的回答，可以直接结束提问，关闭问题"/></span>
                        <form name="closeForm" action="<?=SITE_URL?>?question/close.html" method="post">
                            <input type="hidden" value="<?=$question['id']?>" name="qid">
                        </form>
                        <div id="addscorediv"  style="display: none;">
                            <h5>提高悬赏</h5>提问期内，追加悬赏一次，可延长问题的有效期3天,当您一次悬赏的财富值高于20分时，该问题将等同于新提出的问题，在所属分类的问题列表中显示为最新。
                            <form name="addscoreForm"  action="<?=SITE_URL?>?question/addscore/<?=$question['id']?>.html" method="post" >
                                追加悬赏:&nbsp;<select name="score" id="addscore">
                                    <option value="5" selected="selected">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>&nbsp;分
                                <span class="innerrightspan"><input type="button" class="button4"  value="提交" onclick="check_addscore()();" /></span>
                            </form>                            
                        </div>
                        <? } ?>                        <? if(1==$user['groupid']) { ?>                        <h1>管理该问题:</h1>                        
                        <span class="questioncontrol"><input type="button" class="button1" value="编辑问题" onclick="javascript:document.location='<?=SITE_URL?>?question/edit/<?=$question['id']?>.html'"/></span>
                        <span class="questioncontrol"><input type="button" class="button1"  onclick="managequest(5);return false;" value="修改标签" /></span>
                        <span class="questioncontrol"><input type="button" class="button1" onclick="managequest(3);return false;" value="移动分类" /></span>
                        <span class="questioncontrol"><input type="button" class="button1" onclick="managequest(4);return false;" value="关闭问题" /></span>
                        <span class="questioncontrol"><input type="button" class="button1"  onclick="managequest(6);return false;" value="删除问题" /></span>
                        <div id="edittagdiv"  style="display: none;">
                            <? $tagstr = implode(" ",$taglist); ?>                            <h5>修改问题标签</h5>
                            <form name="edittagForm"  action="<?=SITE_URL?>?question/edittag.html" method="post" >
                                <input type="hidden" value="<?=$question['id']?>" name="qid"/>
                                标签以空格隔开<br />
                                <input type="text" name="tag" value="<?=$tagstr?>" class="input2"  />
                                <span class="innerrightspan"><input type="submit" class="button4"  value="提交" /></span>
                            </form>
                        </div>
                        <div id="editcategorydiv"  style="display: none;">
                            <h5>修改问题分类</h5>
                            <form name="editcategoryForm" action="<?=SITE_URL?>?question/movecategory.html" method="post" >
                                <input type="hidden" name="qid" value="<?=$question['id']?>" />
                                移动到：<select name="category"  style="width:240px" ><?=$catetree?></select>
                                <span class="innerrightspan"><input type="submit" class="button4"  value="提交" /></span>
                            </form>  
                        </div>
                        <? } ?>                        <div class="clr"></div> 
                    </div>
                    <? } ?>                    <? if((isset($adlist['question_view']['inner1']) && trim($adlist['question_view']['inner1']))) { ?>                    <div  class="wtcont"><?=$adlist['question_view']['inner1']?></div>
                    <? } ?>                </div>	
                <div class="clr"></div>
            </div>
            <div class="wtbuttom">
                <ul>
                    <li class="wtba1"></li>
                    <li class="wtba2"></li>
                    <li class="wtba3"></li>
                    <li class="wtba4"></li>
                </ul>
                <div class="clr"></div>
            </div>
        </div>
        <!--问题结束-->

        <div class="wtfenxiang"><?=$setting['question_share']?></div>
        <!--回答问题开始-->
        <? if(!$already && $user['uid']!= $question['authorid']) { ?>        <div class="blank10"></div>
        <div class="zjpl">
            <div class="zjpltitle">
                <ul>
                    <li class="zjpla1"></li>
                    <li class="zjpla2"><div class="juzhong">&nbsp;我帮TA解答：</div></li>
                    <li class="zjpla3"></li>
                </ul>
                <div class="clr"></div>
            </div>
            <? if(!$already && $user['uid']!= $question['authorid']) { ?>            <div class="zjplcon">
                <form name="answerForm" action="<?=SITE_URL?>?question/answer.html" method="post">
                    <input type="hidden" value="<?=$question['id']?>" name="qid">
                    <input type="hidden" value="<?=$question['title']?>" name="title">
                    <script type="text/plain" id="mycontent" name="content" style="width:740px;margin-left: 4px;"></script>
                    <script type="text/javascript">
                        var answercontent = new baidu.editor.ui.Editor(editor_options);                        
                        answercontent.render("mycontent"); 
                    </script>
                    <? if($setting['code_ask']) { ?>                    <p class="zjplbr">                        
                        <input name="code" size="12"  tabindex="3" class="input4" type="text">
                        <img  id="verifycode"   src="<?=SITE_URL?>?user/code.html" align="absmiddle" />
                        <a href="javascript:updatecode();">看不清，换一张</a>                        
                    </p>
                    <? } ?>                    <p class="zjplbr">
                        <input type="button" align="absmiddle" class="subanswer"  name="mybutton" onClick="mylogin();" />
                    </p>
                </form>
            </div>
            <? } ?>            <div class="zjpjbuttom">
                <ul>
                    <li class="zjplba1"></li>
                    <li class="zjplba2"></li>
                    <li class="zjplba3"></li>
                </ul>
                <div class="clr"></div>
            </div>
        </div>
        <? } ?>        <!--回答问题结束-->
        <? if((isset($adlist['question_view']['left1']) && trim($adlist['question_view']['left1']))) { ?>        <div class="dh"><?=$adlist['question_view']['left1']?></div>
        <? } ?>        <div class="qitawenda"><div class="ianswer"></div>网友的回答&nbsp;<span class="qtnum">(共<?=$rownum?>个回答)</span></div>
        <!--回答开始-->
        <? if($answerlist) { ?>        <div class="qita">
            <div class="qitat"></div>            
            
<? if(is_array($answerlist)) { foreach($answerlist as $index => $answer) { ?>
            <div class="qtallcont">
                <div class="qtleft">
                    <div class="readFace" id="userinfo-<?=$answer['authorid']?>"></div>
                    <div class="touxiang">
                        <a target="_blank" href="<?=SITE_URL?>?u-<?=$answer['authorid']?>.html"><img align="absmiddle" src="<?=$answer['author_avartar']?>" alt="<?=$answer['author']?>" onmouseout="closeuserinfo();" onmouseover="showuserinfo('<?=$answer['authorid']?>');" /></a>
                    </div>
                    <div class="hyxinxi">
                        <span class="name"><a target="_blank" href="<?=SITE_URL?>?u-<?=$answer['authorid']?>.html"><?=$answer['author']?></a></span>
                    </div>
                </div>
                <div class="qtright">
                    <div class="qtt">
                        <div class="louwei"><a href="#top" style="color:#2791FE;">#TOP#</a>&nbsp;&nbsp;<?=$answer['floor']?>楼</div>
                        <img align="absmiddle" src="<?=SITE_URL?>css/default/lefttime.gif" /> 回答于:<?=$answer['time']?>
                        <a href="javascript:inform('<?=$answer['author']?>',2);">举报</a>
                    </div>
                    <div class="clr"></div>
                    <div class="qfgx"></div>
                    <div class="qtcont">
                        <div class="wtcont" id="mc<?=$index?>"><?=$answer['content']?></div>
                        <div class="blank10"></div>
                        
<? if(is_array($answer['tags'])) { foreach($answer['tags'] as $tagindex => $tag) { ?>
                        
                        <? if(($tagindex%2) == 0) { ?>                        <? if($tagindex!=0) { ?>                        <div class="ask_gai"></div>
                        <? } ?>                        <div class="ask_zhuiwen">
                            <span style="color:#5EBB0B;float:left;margin-right:5px;">追问:</span><?=$tag?>
                        </div>                        
                        <? } else { ?>                        
                        <div class="ask_gai"></div>                        
                        <div class="ask_zhuiwen">
                            <span style="color:#999999;float:left;margin-right:5px;">回答:</span><?=$tag?>
                        </div>

                        <? } ?>                        
<? } } ?>
                        <div class="clr"></div>
                        <? if($answer['commentlist']) { ?>                        <div id="pinglun">
                            <fieldset>
                                <legend><a title="查看回答评分记录" href="<?=SITE_URL?>?question/ajaxanswercomment/<?=$answer['id']?>.html" >该回答评分记录</a></legend>
                                <ul>
                                    
<? if(is_array($answer['commentlist'])) { foreach($answer['commentlist'] as $comment) { ?>
                                    <li><em>魅力&nbsp;<? if($comment['credit']>0) { ?>+<?=$comment['credit']?><? } else { ?><?=$comment['credit']?><? } ?></em><em>
<? echo cutstr($comment['content'],40,'');; ?>
</em><cite><a target="_blank" href="<?=SITE_URL?>?u-<?=$comment['authorid']?>.html">
<? echo cutstr($comment['author'],10,'');; ?>
</a></cite><?=$comment['time']?></li>
                                    
<? } } ?>
                                </ul>
                            </fieldset>                            
                        </div>
                        <? } ?>                        <!--如果是提问者并且不是匿名用户，则显示“采纳为答案”按钮-->
                        <? if(0!=$question['authorid'] && ($question['authorid']==$user['uid']) ) { ?>                        <div class="wtcont">
                            <input type="button"  value="采纳为最佳答案" name="adoptanswer" onclick="adoptanswer(<?=$answer['id']?>);" class="button2" />&nbsp;
                            <? if(!$answer['tags'] || (count($answer['tags'])%2) == 0) { ?>                            <input type="button"  value="继续追问" name="adoptanswer" onclick="tagquestion(<?=$answer['id']?>);"  class="button1" />
                            <? } ?>                        </div>
                        <div class="clr"></div> 
                        <? } ?>                        <!--如果是回答者自己，则显示“修改答案”按钮-->
                        <? if($answer['status'] && ($answer['authorid']==$user['uid']) ) { ?>                        <input type="button"  value="修改答案" name="button"  class="button1"  onclick="javascript:document.location='<?=SITE_URL?>?question/editanswer/<?=$answer['id']?>.html'"/>&nbsp;
                        <? if($answer['tags']!='' && (count($answer['tags'])%2) != 0) { ?>                        <input type="button"  value="继续回答" name="submit"  onclick="taganswer(<?=$answer['id']?>);" class="button1"/>
                        <? } ?>                        <div class="clr"></div> 
                        <? } ?>                        <div class="clr"></div> 
                        <? if(1==$user['groupid']) { ?>                        <div  class="wlhdb">
                            <h1>管理该回答:</h1>
                            <input type="button"  value="采纳为最佳答案" name="adoptanswer" onclick="adoptanswer(<?=$answer['id']?>);" class="button2" />&nbsp;
                            <span class="questioncontrol"><input type="button"  value="编辑内容" class="button1" onclick="javascript:document.location='<?=SITE_URL?>?question/editanswer/<?=$answer['id']?>.html'" /></span>
                            <span class="questioncontrol"><input type="button" onclick="delanswer(<?=$answer['id']?>,<?=$question['id']?>);" value="删除回答" class="button1"></span>
                            <div class="clr"></div>
                        </div>
                        <? } ?>                        <div class="zjlhdb ">
                            <p class="zjlhdbimg">
                                <img width="35px" height="36px"  style="cursor:pointer" alt="支持" onclick="add_comment(1,<?=$answer['id']?>,<?=$answer['authorid']?>);" src="<?=SITE_URL?>css/default/agree.gif">&nbsp;
                                <img width="35px" height="36px"  style="cursor:pointer" alt="反对" onclick="add_comment(0,<?=$answer['id']?>,<?=$answer['authorid']?>);" src="<?=SITE_URL?>css/default/aganist.gif">&nbsp;
                            </p>
                            支持(<span id="pjhao" class="zhichi"><?=$answer['support']?></span>)
                            反对(<span id="pjhao" class="fandui"><?=$answer['against']?></span>)
                        </div>
                    </div>
                    <? if((isset($adlist['question_view']['left3']) && trim($adlist['question_view']['left3']))) { ?>                    <div  class="wtcont"><?=$adlist['question_view']['left3']?></div>
                    <? } ?>                </div>        

                <div class="clr"></div>
            </div>
            <div class="qtbuttom">
                <ul>
                    <li class="qtba1"></li>
                    <li class="qtba2"></li>
                    <li class="qtba3"></li>
                    <li class="qtba4"></li>
                </ul>
                <div class="clr"></div>
            </div>
            
<? } } ?>
        </div>
        <div class="pages"><div class="scott"><?=$departstr?></div></div>
        <? } ?>        <!--回答结束-->
        <? if((isset($adlist['question_view']['left2']) && trim($adlist['question_view']['left2']))) { ?>        <div class="dh"><?=$adlist['question_view']['left2']?></div>
        <? } ?>    </div>

    <div class="right1">
        <div class="gg">
            <div class="ggtitle">
                <ul>
                    <li class="gga1"></li>
                    <li class="gga2">
                        <div class="juzhong">
                            <div class="qico" >
                                <div class="irelate"></div>
                            </div>
                            相关已解决问题
                        </div>
                    </li>
                    <li class="gga3"></li>
                </ul>
            </div>
            <div class="clr"></div>
            <div class="ggcon">
                <ul>
                    
<? if(is_array($solvelist)) { foreach($solvelist as $solve) { ?>
                    <li> <a title="<?=$solve['title']?>" target="_blank" href="<?=SITE_URL?>?q-<?=$solve['id']?>.html"><? echo cutstr($solve['title'],24); ?></a></li>
                    
<? } } ?>
                </ul>
            </div>
            <div class="ggbuttom">
                <ul>
                    <li class="ggba1"></li>
                    <li class="ggba2"></li>
                    <li class="ggba3"></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
        <? if((isset($adlist['question_view']['right1']) && trim($adlist['question_view']['right1']))) { ?>        <div class="gg"><?=$adlist['question_view']['right1']?></div>
        <? } ?>    </div>
</div>
<div class="clr"></div>
<link rel="stylesheet" href="<?=SITE_URL?>css/common/imgpopup/imgpopup.css"/>
<script src="<?=SITE_URL?>js/imgpopup.js" type="text/javascript"></script>
<script type="text/javascript">
    //回答问题
    function mylogin(){
        answercontent.sync();
        var content=answercontent.getContentTxt();
        if(bytes(content)<=10){
            alert('回答内容不能少于10个字！');
            return;
        }
        if(0==<?=$user['uid']?>){
            $.dialog({
                id:'loginDiv',
                position:'center',
                align:'left',
                width:300,
                height:100,
                title:'提交回答',
                okText:'登录并提交',
                fnOk:function(){
                    var username=$('#myusername').val();
                    var password=$('#mypassword').val();
                    $.ajax({
                        type: "post",
                        url: "<?=SITE_URL?>?user/ajaxlogin.html",
                        data: "username="+username+"&password="+password,
                        success: function(msg){
                            if(1==msg){
                                $.dialog.close('loginDiv');document.answerForm.submit();
                            }else{
                                alert('用户名或密码错误！');
                            }
                        }
                    });
                },
                content:'<p /><table cellspacing="0" cellpadding="0" width="80%" border="0" valign="top" align="center"><tr><td class="f14" valign="top" nowrap align="left" width="40%" height="35">用户名 :&nbsp;&nbsp; </td><td valign="top" width="60%" height="35"><input maxlength="20" id="myusername" class="input3" name="username"> </td></tr><tr><td class="f14" valign="top" nowrap align="left" height="35"> 密&nbsp&nbsp码 :&nbsp;&nbsp; </td><td valign="top" height="35"><input id="mypassword" type="password" class="input3" maxlength="32" name="password"></td></tr></table>'
            });
        }else{
            document.answerForm.submit();
        }
    }

    //追加悬赏
    function addscore(){
        $.dialog({
            id:'addscoreDiv',
            position:'center',
            align:'left',
            width:300,
            height:100,
            title:'追加悬赏',
            fnOk:function(){document.addscoreForm.submit();$.dialog.close('addscoreDiv')},
            fnCancel:function(){$.dialog.close('addscoreDiv')},
            content:'&nbsp;&nbsp;&nbsp;&nbsp;提问期内，追加悬赏一次，可延长问题的有效期3天。<br />&nbsp;&nbsp;&nbsp;&nbsp;当您一次悬赏的财富值高于20分时，该问题将等同于新提出的问题，在所属分类的问题列表中显示为最新。 <div class="b4 bcg mb12"><form name="addscoreForm"  action="<?=SITE_URL?>?question/addscore/<?=$question['id']?>.html" method="post" >追加悬赏<select name="score"><option value="5" selected="selected">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option></select>分</form></div>'
        });
    }

    //问题补充
    function showsupply(){
        var displaytype = $("#mysupplydiv").css("display");
        if(displaytype == 'none'){
            $("#mysupplydiv").css("display","");
            $("#addscorediv").css("display","none");
        }else{
            $("#mysupplydiv").css("display","none"); 
        }
    }
    //问题补充检查
    function check_mysupply(){
        mysupply.sync();
        var content = mysupply.getContentTxt();
        if($.trim(content) == ''){
            alert('问题补充不能只为图片或者其他html元素，必须有文字描述');
            return false;
        }
        $("form[name='supplyForm']").submit();
        
    }
    //提高悬赏
    function showaddscore(){
        var displaytype = $("#addscorediv").css("display");
        if(displaytype == 'none'){
            $("#addscorediv").css("display","");
            $("#mysupplydiv").css("display","none"); 
        }else{
            $("#addscorediv").css("display","none");   
        }
    }
    //提高悬赏检查
    function check_addscore(){
        $("form[name='addscoreForm']").submit();        
    }

    //问题管理
    function managequest(num){
        switch(num){
            case 3://移动分类
                var displaytype = $("#editcategorydiv").css("display");
                if(displaytype == 'none'){
                    $("#editcategorydiv").css("display",""); 
                    $("#edittagdiv").css("display","none");                    
                }else{
                    $("#editcategorydiv").css("display","none");   
                }              
                break;
            case 4://关闭问题
                if(!confirm('确定关闭该问题?')==false){
                    document.location.href="<?=SITE_URL?>?question/close/<?=$question['id']?>.html";
                }
                break;
            case 5://修改标签
                var displaytype = $("#edittagdiv").css("display");
                if(displaytype == 'none'){
                    $("#editcategorydiv").css("display","none"); 
                    $("#edittagdiv").css("display","");                    
                }else{
                    $("#edittagdiv").css("display","none");   
                }                    
                break;
            case 6://删除问题
                if(!confirm('确定删除问题？该操作不可返回！')==false){
                    document.location.href="<?=SITE_URL?>?question/delete/<?=$question['id']?>.html";
                }
                break;
            default:
                alert("非法操作！");
                break;
        }
    }

    //管理回答
    function adoptanswer(aid){
        $.dialog({
            id:'editanswerDiv',
            position:'center',
            align:'left',
            width:400,
            height:110,
            title:'采纳感言',
            fnOk:function(){document.editanswerForm.submit();$.dialog.close('editanswerDiv')},
            fnCancel:function(){$.dialog.close('editanswerDiv')},
            content:'对该回答的感言： <div><form name="editanswerForm"  action="<?=SITE_URL?>?question/adopt.html" method="post" ><textarea id="mc" name="content" style="width: 99%; padding-top: 1px; font-size: 14px;" rows="4" cols="50" maxlength="100">谢谢您的解答！</textarea><input type="hidden"  value="<?=$question['id']?>" name="qid"/><input type="hidden" id="ma" value="'+aid+'" name="aid"/></form></div>'
        });
    }
    //追问模块--追问
    function tagquestion(aid){
        $.dialog({
            id:'tag_ask',
            position:'center',
            align:'left',
            width:400,
            height:110,
            title:'继续追问',
            fnOk:function(){
                if($.trim($("#mc").val()) == ""){
                    alert("追问内容不能为空");
                    return false;
                }
                document.tagAskForm.submit();
                $.dialog.close('tag_ask')
            },
            fnCancel:function(){$.dialog.close('tag_ask')},
            content:'追问内容： <div><form name="tagAskForm"  action="<?=SITE_URL?>?question/tagask.html" method="post" ><textarea id="mc" name="tag_ask" style="width: 99%; padding-top: 1px; font-size: 14px;" rows="4" cols="300" ></textarea><input type="hidden"  value="<?=$question['id']?>" name="qid"/><input type="hidden" id="ma" value="'+aid+'" name="aid"/></form></div>'
        });
    }
    //追问模块--回答
    function taganswer(aid){
        $.dialog({
            id:'tag_answer',
            position:'center',
            align:'left',
            width:400,
            height:110,
            title:'继续追问',
            fnOk:function(){
                if($.trim($("#mc").val()) == ""){
                    alert($("#mc").val());
                    return false;
                }
                document.tagAskForm.submit();
                $.dialog.close('tag_answer')
            },
            fnCancel:function(){$.dialog.close('tag_answer')},
            content:'继续回答的内容： <div><form name="tagAskForm"  action="<?=SITE_URL?>?question/tagask.html" method="post" ><textarea id="mc" name="tag_answer" style="width: 99%; padding-top: 1px; font-size: 14px;" rows="4" cols="50" maxlength="100" ></textarea><input type="hidden"  value="<?=$question['id']?>" name="qid"/><input type="hidden" id="ma" value="'+aid+'" name="aid"/></form></div>'
        });
    }

    //删除回答
    function delanswer(aid,qid){
        if(confirm("确定删除该回答?")){
            document.location.href='<?=SITE_URL?>?question/deleteanswer/'+aid+'/'+qid+'.html';
        }
    }
    //审核回答
    function verifyanswer(aid,qid){
        document.location.href='<?=SITE_URL?>?question/verifyanswer/'+aid+'/'+qid+'.html';
    }
    
    function inform(name,type){
        var content = name+'的回答';
        if(type==1){
            content = name+'的提问';
        }
        $.dialog({
            id:'informDiv',
            position:'center',
            align:'left',
            width:500,
            title:'举报',
            fnOk:function(){document.informform.submit();$.dialog.close('informDiv')},
            fnCancel:function(){$.dialog.close('informDiv')},
            content:'<form name="informform" action="<?=SITE_URL?>?inform/add.html" method="POST"> <div><p><strong>举报内容：</strong>'+content+'</p><p><strong>举报原因：</strong>(可多选)</p><p><input type="checkbox" name="informkind[]" value="0" />含有反动的内容</p><p><input type="checkbox" name="informkind[]" value="1" />含有人身攻击的内容</p><p><input type="checkbox" name="informkind[]" value="2" />含有广告性质的内容</p><p><input type="checkbox" name="informkind[]" value="3" />涉及违法犯罪的内容</p><p><input type="checkbox" name="informkind[]" value="4" />含有违背伦理道德的内容</p><p><input type="checkbox" name="informkind[]" value="5" />含色情、暴力、恐怖的内容</p><input type="checkbox" name="informkind[]" value="5" />含有恶意无聊灌水的内容</p></div><input type="hidden"  value="<?=$question['id']?>" name="qid"/><input type="hidden"  value="'+content+'" name="content"/><input type="hidden"  value="<?=$question['title']?>" name="title"/></from>'
        });
    }
    
    function add_comment(type,aid,uid){
        if(0==<?=$user['uid']?>){
            alert("登陆之后才能进行该操作！");
            return false;
        }else if(<?=$user['uid']?> == uid){
            alert("不能给自己回答评分!");
            return false;
        }
        var optionsstr = '<?=$support?>';
        if(type == 0)
            optionsstr = '<?=$against?>';
        
        $.dialog({
            id:'add_commentdiv',
            position:'center',
            align:'left',
            width:200,
            height:110,
            title:'回答评分',
            fnOk:function(){
                if("" == $.trim($("#shortcomment").val())){
                    alert("简评内容不能为空!");
                    return false;
                }
                document.addcommentForm.submit();
                $.dialog.close('add_commentdiv')
            },
            fnCancel:function(){$.dialog.close('add_commentdiv')},
            content:'<p /><form name="addcommentForm" id="addcommentForm" action="<?=SITE_URL?>?question/answercomment.html" method="POST"><input type="hidden" name="qid" value="'+<?=$question['id']?>+'" /><input type="hidden" name="aid" value="'+aid+'" /><input type="hidden" name="touid" value="'+uid+'" /><table cellspacing="0" cellpadding="0" width="80%" border="0" valign="top" align="center"><tr><td class="f14" valign="top" nowrap align="left" width="40%" height="35">魅力值 :&nbsp;&nbsp; </td><td valign="top" width="60%" height="35">'+optionsstr+'</td></tr><tr><td class="f14" valign="top" nowrap align="left" height="35"> 简&nbsp&nbsp评 :&nbsp;&nbsp; </td><td valign="top" height="35"><textarea id="shortcomment" name="content" cols="30"  rows="3" maxlength="30"></textarea></td></tr></table></form>'
        });    
    }
    
    
    function showuserinfo(uid){
        $("#userinfo-"+uid).load("<?=SITE_URL?>?user/ajaxuserinfo/"+uid+".html");
    }
    function closeuserinfo(uid){
        $("#userinfo-"+uid).html("");
    }
    $(document).ready(function () {        
        SyntaxHighlighter.highlight();//代码高亮显示
        $("legend a").fancybox({'titlePosition':'inside'});
        /*ajax imgpopup*/
        $(".wtcont p img").each(function(i){//获取问题、回答中的所有图片地址
            var img = $(this);
            $.ajax({
                type: "POST",
                url: "<?=SITE_URL?>?question/ajaxchkimg.html",
                async: true,
                data: "imgsrc="+img.attr("src"),
                success: function(status){
                    if('1' == status){
                        img.wrap("<a href='"+img.attr("src")+"' title='"+img.attr("title")+"' ></a>");
                        img.parent().fancybox({
                            'overlayShow'	: false,
                            'transitionIn'	: 'elastic',
                            'transitionOut'	: 'elastic',
                            'titlePosition'	: 'inside'
                        });
                    }
                }
            });
        });
    });
</script>
<? include template('footer'); ?>
