<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;添加分类</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr>
<td class="<?=$type?>"><?=$message?></td>
</tr>
</table><? } ?><form name="askform" action="index.php?admin_category/add<?=$setting['seo_suffix']?>" method="post">
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr class="header">
<td colspan="2">参数设置</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>上一级分类:</b><br><span class="smalltxt">选择上级分类</span></td>
<td class="altbg2">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>
<select id="ClassLevel1" style="WIDTH: 125px" size="8" name="classlevel1">
<option selected></option>
</select>
</td>
<td width="20">
<div align="center"><b>→</b></div>
</td>
<td>
<select id="ClassLevel2" style="WIDTH: 125px" size="8" name="classlevel2">
<option selected></option>
</select>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>分类名:</b><br><span class="smalltxt">可以输入多个分类名，每个分类名独占一行,分类和分类的目录名用中文逗号“，”分开。
<br>如果分类的目录名为空，则系统自动取分类的拼音为目录名。例如：	<br> <br>生活，shenghuo<br>电脑，diannao<br>社会民生，shehuiminsheng<br></span></td>
<td class="altbg2"><textarea class="area" name="categorys"  style="height:250px;width:220px;" ></textarea></td>
</tr>
</table>
<br /><input type="hidden" value="0" name="cid">
<center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br />
<? include template(footer,admin); ?>
<script type="text/javascript">
var sortobj=eval('(<?=$category_js?>)');
var g_ClassLevel1;
var g_ClassLevel2;
var class_level_1=sortobj.category1;
var class_level_2=sortobj.category2;
var button_noselect="不选择";

function getCidValue(){
var _cl1 = document.askform.ClassLevel1;
var _cl2 = document.askform.ClassLevel2;
var _cid = document.askform.cid;
if(_cl2.value!=0){
_cid.value = _cl2.value;
}else{
 	_cid.value = _cl1.value;
}
}

function FillClassLevel1(ClassLevel1){
    ClassLevel1.options[0] = new Option("根分类", "0");
    for(i=0; i<class_level_1.length; i++){
        ClassLevel1.options[i+1] = new Option(class_level_1[i][1], class_level_1[i][0]);
    }
    ClassLevel1.options[0].selected = true;
    ClassLevel1.length = i+1;
}

function FillClassLevel2(ClassLevel2, class_level_1_id){
    ClassLevel2.options[0] = new Option(button_noselect, "");
    count = 1;
    for(i=0; i<class_level_2.length; i++){
    if(class_level_2[i][0].toString() == class_level_1_id) {
            ClassLevel2.options[count] = new Option(class_level_2[i][2], class_level_2[i][1]);
            count = count+1;}
    }
    ClassLevel2.options[0].selected = true;
    ClassLevel2.length = count;
}
 
function ClassLevel2_onchange(){
    getCidValue();
}
 
function ClassLevel1_onchange(){
    getCidValue();
    FillClassLevel2(g_ClassLevel2, g_ClassLevel1.value);
    ClassLevel2_onchange();

}
function InitClassLevelList(ClassLevel1, ClassLevel2)
{
    g_ClassLevel1=ClassLevel1;
    g_ClassLevel2=ClassLevel2;
    g_ClassLevel1.onchange = Function("ClassLevel1_onchange();");
    g_ClassLevel2.onchange = Function("ClassLevel2_onchange();");
    FillClassLevel1(g_ClassLevel1);
    ClassLevel1_onchange();
}

InitClassLevelList(document.askform.ClassLevel1, document.askform.ClassLevel2);

var selected_id_list="<?=$selected_id_list?>"
var blank_pos = selected_id_list.indexOf(" ");
var find_blank = true;
if (blank_pos == -1) {
    find_blank = false;
    blank_pos = selected_id_list.length;
}
var id_str = selected_id_list.substr(0, blank_pos);
g_ClassLevel1.value = id_str;
ClassLevel1_onchange();

if (find_blank == true) {
    selected_id_list = selected_id_list.substr(blank_pos + 1,   selected_id_list.length - blank_pos - 1);
    blank_pos = selected_id_list.indexOf(" ");
    if (blank_pos == -1) {
        find_blank = false;
        blank_pos = selected_id_list.length;
    }
    id_str = selected_id_list.substr(0, blank_pos);
    g_ClassLevel2.value = id_str;
    ClassLevel2_onchange();

    if (find_blank == true) {
        selected_id_list = selected_id_list.substr(blank_pos + 1,  selected_id_list.length - blank_pos - 1);
        blank_pos = selected_id_list.indexOf(" ");
        if (blank_pos == -1) {
            find_blank = false;
            blank_pos = selected_id_list.length;
        }
        id_str = selected_id_list.substr(0, blank_pos);
    }
}	
</script>