<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="admin.php?mod=index&amp;code=home"><b>控制面板首页</b></a>&nbsp;»&nbsp;广告管理</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr>
        <td class="<?=$type?>"><?=$message?></td>
    </tr>
</table><? } ?><table width="100%" cellspacing="0" cellpadding="0" border="0" class="tableborder">
    <tbody>
        <tr class="header">
            <td><div style="float:left; margin-left:0px; padding-top:8px"> <a onclick="collapse_change('tip')" href="#">技巧提示</a></div>
                <div style="float:right; margin-right:4px; padding-bottom:9px"> </div></td>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td><ul>
                    <li><b>强烈建议</b>：在搜索引擎未收录网站前，不要添加广告，否则影响收录；</li>
                    <li>系统主要是在问题、分类查看页面添加了广告模块，其他页面如果也需添加可以自己仿照模板源文件添加即可。</li>
                    <li>广告代码支持html代码（包括JS代码）。比如，要加入图片广告的话，填入的代码一般为&lt;a href="xxx"&gt;&lt;img src="http://xxx.com/xxx.gif"&gt;&lt;/a&gt;</li>
                    <li style="color:green;">对于各页面广告位不清楚的可以直接点击右上角的查看广告位布局</li>
                    <li>如果想禁用某个位置的广告只需，广告设置的时候留空就行了</li>

                </ul></td>
        </tr>
    </tbody></table>
<br><? $adlist = $this->fromcache("adlist"); ?><form  action="index.php?admin_ad<?=$setting['seo_suffix']?>" method="post" name="indexform">
    <input type="hidden" name="page" value="index" />
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tableborder">
        <tbody>
            <tr class="header">
                <td colspan="2"><span class="smalltxt"><a href="<?=SITE_URL?>css/common/index_ad.jpg" style="float:right;margin-top:10px;color:green" target="_blank">查看广告位布局</a></span>网站首页</td>
            </tr>
            <tr align="center">
                <td class="altbg2">中间-广告位1<br>(最大宽度:469px)<br>
                <td class="altbg1"><textarea   cols="100" rows="5" name="index[middle1]"><? if(isset($adlist['index']['middle1'])) { ?><?=$adlist['index']['middle1']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">中间-广告位2<br>
                    (最大宽度:469px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="index[middle2]"><? if(isset($adlist['index']['middle2'])) { ?><?=$adlist['index']['middle2']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">中间-广告位3<br>
                    (最大宽度:250px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="index[middle3]"><? if(isset($adlist['index']['right1'])) { ?><?=$adlist['index']['right1']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">右边-广告位4<br>
                    (最大宽度:250px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="index[right1]"><? if(isset($adlist['index']['right1'])) { ?><?=$adlist['index']['right1']?><? } ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <center>
        <input type="submit" value="提 交" name="submit" class="button" />
    </center>
</form>
<br>
<form  action="index.php?admin_ad<?=$setting['seo_suffix']?>" method="post" name="questionform">
    <input type="hidden" name="page" value="question_view" />
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tableborder">
        <tbody>
            <tr class="header">
                <td colspan="2"><span class="smalltxt"><a href="<?=SITE_URL?>css/common/question_view.jpg" style="float:right;margin-top:10px;color:green" target="_blank">查看广告位布局</a></span>问题查看页（待解决、已解决、已关闭）</td>
            </tr>
            <tr align="center">
                <td class="altbg2">问题里面-广告位1<br>
                    (最大宽度:560px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="question_view[inner1]"><? if(isset($adlist['question_view']['inner1'])) { ?><?=$adlist['question_view']['inner1']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">左边-广告位2<br>
                    (最大宽度:700px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="question_view[left1]"><? if(isset($adlist['question_view']['left1'])) { ?><?=$adlist['question_view']['left1']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">左边-广告位3<br>
                    (最大宽度:700px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="question_view[left2]"><? if(isset($adlist['question_view']['left2'])) { ?><?=$adlist['question_view']['left2']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">左边-广告位4<br>
                    (最大宽度:250px)<br>
                <td class="altbg1"><textarea   cols="100" rows="5" name="question_view[left3]"><? if(isset($adlist['question_view']['left3'])) { ?><?=$adlist['question_view']['left3']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">右边-广告位5<br>
                    (最大宽度:250px)<br>
                <td class="altbg1"><textarea  cols="100" rows="5" name="question_view[right1]"><? if(isset($adlist['question_view']['right1'])) { ?><?=$adlist['question_view']['right1']?><? } ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <center>
        <input type="submit" value="提 交" name="submit" class="button">
    </center>
</form>
<br>
<form  action="index.php?admin_ad<?=$setting['seo_suffix']?>"  method="post" name="categoryform">
    <input type="hidden" name="page" value="category" />
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tableborder">
        <tbody>
            <tr class="header">
                <td colspan="2"><span class="smalltxt"><a href="<?=SITE_URL?>css/common/category.jpg" style="float:right;margin-top:10px;color:green" target="_blank">查看广告位布局</a></span>分类浏览页</td>
            </tr>
            <tr align="center">
                <td class="altbg2">左边-广告位1<br>
                    (最大宽度:700px)<br>
                <td class="altbg1"><textarea id="category_left1" position="header" cols="100" rows="5" name="category[left1]"><? if(isset($adlist['category']['left1'])) { ?><?=$adlist['category']['left1']?><? } ?></textarea>
                </td>
            </tr>
            <tr align="center">
                <td class="altbg2">右边-广告位1<br>
                    (最大宽度:250px)<br>
                <td class="altbg1"><textarea id="category_right1" position="middle_right" cols="100" rows="5" name="category[right1]"><? if(isset($adlist['category']['right1'])) { ?><?=$adlist['category']['right1']?><? } ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <center>
        <input type="submit" value="提 交" name="submit" class="button">
    </center>
</form>
<? include template(footer,admin); ?>
