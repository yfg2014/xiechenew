<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<script src="<?=SITE_URL?>js/ueditor/editor_config.js" type="text/javascript"></script>
<script src="<?=SITE_URL?>js/ueditor/editor_all.js" type="text/javascript"></script>
<script src="<?=SITE_URL?>js/ueditor/third-party/SyntaxHighlighter/shCore.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=SITE_URL?>js/ueditor/themes/default/ueditor.css"/>
<link rel="stylesheet" href="<?=SITE_URL?>js/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css"/>

<div class="content">
    <div class="dh">
        <a href="<?=SITE_URL?>"><?=$setting['site_name']?></a>
        
<? if(is_array($navlist)) { foreach($navlist as $nav) { ?>
        &gt; <a href="<?=SITE_URL?>?c-<?=$nav['id']?>.html"><?=$nav['name']?></a>
        
<? } } ?>
 &gt; 
        <a href="<?=SITE_URL?>?q-<?=$qid?>.html"><?=$question['title']?></a>&gt; 问题补充
    </div>
    <div class="left1">
        <div class="leftt">
            <ul>
                <li class="a1"></li>
                <li class="a2"><div class="juzhong">问题补充</div></li>
                <li class="a3"></li>
            </ul>
        </div>
        <div class="clr"></div>
        <div class="leftc">
            <form name="askform" onsubmit="return check_form();" action="<?=SITE_URL?>?question/supply.html" method="post" >
                <input type="hidden" value="<?=$qid?>" name="qid" />
                <div class="tiwen">
                    <script type="text/plain" id="supply" name="content" style="width:720px;padding-left:10px;"></script>
                    <div style="float:right;margin-right:12px;padding-top: 10px;padding-bottom: 20px;"><input name="submit" type="submit" class="button4" value="提&nbsp交"/></div>
                    <div class="clr"></div>
                </div>
            </form>
        </div>
        <div class="clr"></div>
        <div class="leftb"></div>
    </div>
    <div class="right1">
        <div class="gg">
            <div class="ggtitle">
                <ul>
                    <li class="gga11"></li>
                    <li class="gga21">
                        <div class="juzhong">&nbsp;知道小贴士</div>
                    </li>
                    <li class="gga31"></li>
                </ul>
            </div>
            <div class="clr"></div>
            <div class="ggcon">
                <ul>
                    <li><a target="_blank" title="如何提问" href="<?=SITE_URL?>?index/help.html#如何提问">如何提问</a></li>
                    <li><a target="_blank" title="如何回答" href="<?=SITE_URL?>?index/help.html#如何回答">如何回答</a></li>
                    <li><a target="_blank" title="如何获得积分" href="<?=SITE_URL?>?index/help.html#如何获得积分">如何获得积分</a></li>
                    <li><a target="_blank" title="如何处理问题" href="<?=SITE_URL?>?index/help.html#如何处理问题">如何处理问题</a></li>
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
    </div>
</div>
<div class="clr"></div>
<script type="text/javascript">
    var mycontent = new baidu.editor.ui.Editor(editor_options);
    mycontent.render("supply");
    function check_form(){
        mycontent.sync();
        var content = mycontent.getContentTxt();
        if(content==''){
            alert('补充内容不能为空！');
            return false;
        }
        return true;
    }

</script>
<? include template('footer'); ?>