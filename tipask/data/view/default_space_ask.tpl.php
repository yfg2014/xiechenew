<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<div class="content">
    <div class="uleft">
        <div class="tximg"><img width="100px" height="100px" src="<?=$member['avatar']?>" alt="<?=$member['username']?>" title="<?=$member['username']?>"></div>
        <div class="txname">
            <?=$member['username']?>
            <? if($member['islogin']) { ?>            <img src="<?=SITE_URL?>css/default/online.gif" align="absmiddle" title="当前在线" alt="当前在线"/>
            <? } else { ?>            <img src="<?=SITE_URL?>css/default/outline.gif" align="absmiddle" title="当前离线" alt="当前离线"/>
            <? } ?>        </div>
        <? if($user['uid'] != $member['uid']) { ?>        <div class="txname">           
            <input  type="button" class="button1" onclick="javascript:sendmsg('<?=$member['username']?>');" value="发短消息"/>
        </div>
        <div class="clr"></div>
        <div class="txname">           
            <input type="button" class="button1" value="向TA提问" onclick="javascript:document.location='<?=SITE_URL?>?question/add/<?=$member['uid']?>.html'"/>
        </div>
        <? } ?>        <div class="clr"></div>
        <div class="list">
            <h1><a title="TA的主页" target="_top" href="<?=SITE_URL?>?u-<?=$member['uid']?>.html}"><img width="16" height="16" align="absmiddle" src="<?=SITE_URL?>css/default/myhome.gif"> &nbsp;TA的主页</a></h1>
            <h1 class="on"><a title="TA的回答" target="_top" href="<?=SITE_URL?>?user/space_answer/<?=$member['uid']?>.html"><img width="16px" height="15px" align="absmiddle" src="<?=SITE_URL?>css/default/myanswer.gif"> &nbsp;TA的问答</a></h1>
            <ul id="huida">
                <li id="hui1" class="ac"><a title="TA的提问" target="_top" href="<?=SITE_URL?>?user/space_ask/<?=$member['uid']?>.html">TA的提问</a></li>
                <li id="hui2"><a title="TA的回答" target="_top" href="<?=SITE_URL?>?user/space_answer/<?=$member['uid']?>.html">TA的回答</a></li>
            </ul>
        </div>
    </div>
    <div class="uright">
        <div class="jianjie">&nbsp;TA的提问</div>
        <div class="fg"><img width="780px;" height="6px" src="<?=SITE_URL?>css/default/gx.gif"></div>
        <div class="grxqt"></div>
        <div class="wdhd2">
            <ul class="bt">
                <li class="bt1">标题</li>
                <li class="b2">回答数/阅读</li>
                <li class="b3">状态</li>
                <li class="b4">提问时间</li>
            </ul>
            
<? if(is_array($questionlist)) { foreach($questionlist as $question) { ?>
            <ul>
                <li class="b1">
                    <a href="<?=$question['url']?>" target="_blank" title="<?=$question['title']?>"><? echo cutstr($question['title'],44) ?></a><span class="lei">[<a href="<?=SITE_URL?>?c-<?=$question['cid']?>.html" title="<?=$question['category_name']?>"><? echo cutstr($question['category_name'],10,''); ?></a>]</span>
                </li>
                <li class="b2"><?=$question['answers']?>/<?=$question['views']?></li>
                <li class="b3"><img src="<?=SITE_URL?>css/common/icn_<?=$question['status']?>.gif" /></li>
                <li class="b4"><?=$question['format_time']?></li>
            </ul>
            
<? } } ?>
        </div>
        <div class="blank20"></div>
        <div class="pages"><div class="scott"><?=$departstr?></div></div>
    </div>
</div>
<div class="clr"></div>
<? include template('footer'); ?>
