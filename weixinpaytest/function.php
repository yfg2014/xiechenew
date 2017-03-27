<?php
error_reporting(0);
include_once("mysqli.php");
include_once("WxPayHelper.php");

$mysql=new _xq_mysqli;
$mysql->config();

$wxPayHelper = new WxPayHelper();

$SMS_METHOD = 1;
/*
	@author:chf
	@function:TX支付测试方法
	@time:2013-10-17

function edit_membercoupon($membercoupon_id){
	$now = time();
	global $mysql;
	if($membercoupon_id == '26' || $membercoupon_id == '24'){
		$sql = "UPDATE xc_membercoupon SET is_pay=1,pay_time={$now} WHERE membercoupon_id={$membercoupon_id} LIMIT 1";
		$mysql->query($sql);
	}
}
*/
function get_coupon_ids($id){
	global $mysql;
	$sql = "select * from xc_wxcouponidgroup where id='".$id."' ";
	$info = $mysql->query($sql,'assoc');
	return $info;
}
/*
	@author:chf
	@function:TX支付测试方法(保存财付通支付信息)
	@time:2013-10-17
*/
function save_txmembercoupon_pay($membercoupon_ids,$trade_no,$buyer_email,$gmt_create,$gmt_payment,$total_fee=0,$trade_status='',$is_return,$is_app='2'){
	global $mysql;
	$now = time();
	$sql = "INSERT INTO xc_txcouponpay SET membercoupon_ids='".$membercoupon_ids."',trade_no='".$trade_no."',buyer_email='".$buyer_email."',gmt_create='".$gmt_create."',gmt_payment='".$gmt_payment."',total_fee='".$total_fee."',trade_status='".$trade_status."',create_time='".$now."',is_return='".$is_return."',is_app='".$is_app."'";
	$mysql->query($sql);
}

/*
	@author:chf
	@function:TX支付测试方法(保存财付通支付信息)
	@time:2013-10-17
*/
function add_wxwap($membercoupon_ids,$trade_no,$total_fee=0,$trade_state){
	global $mysql;
	$now = time();
	$sql = "INSERT INTO xc_weixinpaylog SET membercoupon_ids='".$membercoupon_ids."',transaction_id='".$trade_no."',total_fee='".$total_fee."',trade_state='".$trade_state."',create_time='".$now."'";
	$mysql->query($sql);
}

/*
	@author:wwy
	@function:上门保养保存支付状态
	@time:2014-9-15
*/
function update_pay($id){
	global $mysql;
	$id = substr($id,1);//获取原本的订单号
    if(strpos($id,',')!==false) {
        $ids = explode(',', $id);
        foreach ($ids as $k => $v) {
            //$sql = "select count(*) from xc_check_report where reservation_id='".$id."' ";
            //$count=$mysql->query($sql,'1');
            $sql = "select * from xc_reservation_order where id='" . $v . "' ";
            $info = $mysql->query($sql, 'assoc');
            if ($info['order_type'] == 34) {
                $sql = "UPDATE xc_reservation_order SET pay_status='1',pay_type='2',status='9' where id='" . $v . "' LIMIT 1";
            } else {
                $sql = "UPDATE xc_reservation_order SET pay_status='1',pay_type='2' where id='" . $v . "' LIMIT 1";
            }
            $mysql->query($sql);
        }
    }else{
        $sql = "select * from xc_reservation_order where id='" . $id . "' ";
        $info = $mysql->query($sql, 'assoc');
        if ($info['order_type'] == 34) {
            $sql = "UPDATE xc_reservation_order SET pay_status='1',pay_type='2',status='9' where id='" . $id . "' LIMIT 1";
        } else {
            $sql = "UPDATE xc_reservation_order SET pay_status='1',pay_type='2' where id='" . $id . "' LIMIT 1";
        }
        $mysql->query($sql);
    }
	//$sql1 = "INSERT INTO xc_logcode SET type='微信支付更新状态',oid='".$id."',log=".$sql;
	//$mysql->query($sql1);
}
function update_wexin_pay($id){
	global $mysql;
	//$sql = "select count(*) from xc_check_report where reservation_id='".$id."' ";
	//$count=$mysql->query($sql,'1');
	$sql = "select * from xc_reservation_order where id='".$id."' ";
	$info=$mysql->query($sql,'assoc');
	if($info['pay_status']==0){
		$sql = "UPDATE xc_reservation_order SET pay_status='1' where id='".$id."' LIMIT 1";
	}
	$mysql->query($sql);
	//$sql1 = "INSERT INTO xc_logcode SET type='微信支付更新状态',oid='".$id."',log=".$sql;
	//$mysql->query($sql1);
}

function get_order($orderid){
	global $mysql;
	$sql = "select * from xc_order where id='".$orderid."' ";
	$order_info=$mysql->query($sql,'assoc');
	return $order_info;
}
function get_orderid($orderid){
	$orderid = substr(trim($orderid),0,-1);
	$orderid = $orderid - 987;
	return $orderid;
}
function save_order_pay($order_id,$trade_no,$total_fee=0,$trade_status=''){
	global $mysql;
	$order_id = get_orderid($order_id);
	$now = time();
	$sql = "INSERT INTO xc_orderpay SET order_id='".$order_id."',trade_no='".$trade_no."',total_fee='".$total_fee."',trade_status='".$trade_status."',create_time='".$now."'";
	$mysql->query($sql);
}
function updage_order_state($order_id,$pay_status){
	global $mysql;
	$order_id = get_orderid($order_id);
	$rand_str = randString(9,1);
	$now = time();
	$sql = "UPDATE xc_order SET pay_status='".$pay_status."',pay_time='".$now."',order_verify='".$rand_str."' WHERE id='".$order_id."' LIMIT 1";
	$mysql->query($sql);
	return $rand_str;
}
function update_coupon_count($coupon_id){
	global $mysql;
	$coupon_sql = "UPDATE xc_coupon SET pay_count=pay_count+1 where id='".$coupon_id."'";
	$mysql->query($coupon_sql);
}

function set_log($id){
	global $mysql;
	$coupon_sql = "INSERT INTO xc_logcode SET type='回调测试',log='".$id."',insertTime='".time()."' ";
	$mysql->query($coupon_sql);	
}

function send_sms($order,$order_id){
	global $mysql;
	$shop_id = $order['shop_id'];
	$sql_shop = "SELECT shop_name,shop_address FROM xc_shop WHERE id='".$shop_id."' ";
	$shop_info=$mysql->query($sql_shop,'assoc');
	$data['phones'] = $order['mobile'];
	$data['content'] = "您的订单".$order_id."(".$order['order_name'].")支付已成功，请凭消费码至商户(".$shop_info['shop_name'].",".$shop_info['shop_address'].")处消费:".$order['order_verify'];
	$send_time = time();
	curl_sms($data);
	$sql = "INSERT INTO xc_sms SET phones='".$data['phones']."',sendtime='".$send_time."',content='".$data['content']."' ";
	$mysql->query($sql);
}
function coupon_send_sms($membercoupon_id){
	global $mysql;
	$membercoupon_info = get_membercoupon($membercoupon_id);
	$uid = $membercoupon_info['uid'];
	//$sql_member = "SELECT mobile FROM xc_member WHERE uid='".$uid."' ";
	//$member=$mysql->query($sql_member,'assoc');

	$shop_id = $membercoupon_info['shop_ids'];
	$sql_shop = "SELECT shop_name,shop_address FROM xc_shop WHERE id='".$shop_id."' ";
	$shop_info=$mysql->query($sql_shop,'assoc');
	$start_time = date('Y-m-d',$membercoupon_info['start_time']);
	$end_time = date('Y-m-d',$membercoupon_info['end_time']);
	if($membercoupon_info['coupon_type']==1){
		$coupon_type_str = "现金券编号:";
	}
	if($membercoupon_info['coupon_type']==2){
		$coupon_type_str = "套餐券编号:";
	}
	$data['phones'] = $membercoupon_info['mobile'];
	$data['content'] = "您的".$coupon_type_str.$membercoupon_info['membercoupon_id']."(".$membercoupon_info['coupon_name'].")支付已成功，请凭消费码:".$membercoupon_info['coupon_code']."至商户(".$shop_info['shop_name'].",".$shop_info['shop_address'].")处在有效期(".$start_time."至".$end_time.")消费";
	$send_time = time();
	curl_sms($data);
	$sql = "INSERT INTO xc_sms SET phones='".$data['phones']."',sendtime='".$send_time."',content='".$data['content']."' ";
	$mysql->query($sql);
	
	//微信公众号 推送消费信息----------start
	$sql_weixin = "SELECT * FROM xc_paweixin WHERE uid='".$membercoupon_info['uid']."' AND mobile='".$membercoupon_info['mobile']."' AND type=2 LIMIT 1";
	$weixin = $mysql->query($sql_weixin,"assoc");

	if($weixin) {
		$sql_padatatest = "SELECT * FROM xc_padatatest WHERE FromUserName='".$weixin['wx_id']."' AND type=2 LIMIT 1";
		$FromUserName = $mysql->query($sql_padatatest,"assoc");

		$weixin_data['touser'] = $weixin['wx_id'];
		$weixin_data['title'] = "购买成功通知";
		$weixin_data['description'] = $data['content'];
		$weixin_data['url'] = "http://www.xieche.com.cn/Mobile-my_coupon-pa_id-{$FromUserName[id]}";
		
		weixin_api($weixin_data);
	}
	//微信公众号 推送消费信息----------end
	
}

function carservice_send_sms($id){
	global $mysql;
	$info = get_orderinfo($id);
	//微信公众号 推送消费信息----------start
	$sql_weixin = "SELECT * FROM xc_paweixin WHERE uid='".$info['uid']."' AND mobile='".$info['mobile']."' AND type=2 LIMIT 1";
	$weixin = $mysql->query($sql_weixin,"assoc");

	if($weixin) {
		$sql_padatatest = "SELECT * FROM xc_padatatest WHERE FromUserName='".$weixin['wx_id']."' AND type=2 LIMIT 1";
		$FromUserName = $mysql->query($sql_padatatest,"assoc");

		$weixin_data['touser'] = $weixin['wx_id'];
		$weixin_data['title'] = "订单支付成功";
		$weixin_data['description'] = "您订单号为:".$id."已经付款成功，付款金额：".$info['amount']."元，感谢您对携车网•府上养车的支持。如有问题，请致电400-660-2822咨询";
		$weixin_data['url'] = "http://www.xieche.com.cn/Mobiletmp-mycarservice_detail-order_id-{$id}-pa_id-{$FromUserName[id]}";
		
		weixin_api($weixin_data);
	}
	//微信公众号 推送消费信息----------end
	
}
function carservice_send_sms_app($id,$out_trade_no){
	global $mysql;
	$info = get_orderinfo($id);
	//微信公众号 推送消费信息----------start
	$sql_weixin = "SELECT * FROM xc_paweixin WHERE uid='".$info['uid']."' AND mobile='".$info['mobile']."' AND type=2 LIMIT 1";
	$weixin = $mysql->query($sql_weixin,"assoc");

	if($weixin) {
		$sql_padatatest = "SELECT * FROM xc_padatatest WHERE FromUserName='".$weixin['wx_id']."' AND type=2 LIMIT 1";
		$FromUserName = $mysql->query($sql_padatatest,"assoc");

		$weixin_data['touser'] = $weixin['wx_id'];
		$weixin_data['title'] = "订单支付成功";
		$weixin_data['description'] = "您订单号为:".$out_trade_no."已经付款成功，付款金额：".$info['amount']."元，感谢您对携车网•府上养车的支持。如有问题，请致电400-660-2822咨询";
		$weixin_data['url'] = "http://www.xieche.com.cn/Mobiletmp-mycarservice_detail-order_id-{$id}-pa_id-{$FromUserName[id]}";

		weixin_api($weixin_data);
	}
	//微信公众号 推送消费信息----------end

}

function carcomment_send_sms($id){
	global $mysql;
	$info = get_orderinfo($id);
	//微信公众号 推送消费信息----------start
	$sql_weixin = "SELECT * FROM xc_paweixin WHERE uid='".$info['uid']."' AND mobile='".$info['mobile']."' AND type=2 LIMIT 1";
	$weixin = $mysql->query($sql_weixin,"assoc");

	if($weixin) {
		$sql_padatatest = "SELECT * FROM xc_padatatest WHERE FromUserName='".$weixin['wx_id']."' AND type=2 LIMIT 1";
		$FromUserName = $mysql->query($sql_padatatest,"assoc");

		$weixin_data['touser'] = $weixin['wx_id'];
		$weixin_data['title'] = "携车网府上养车评价";
		$weixin_data['description'] = "欢迎您对我们的服务做出评价";
		$weixin_data['url'] = "http://www.xieche.com.cn/mobile/reserveorder_comment-reservation_id-{$id}";
		
		weixin_api($weixin_data);
	}
	//微信公众号 推送消费信息----------end
	
}

//短信接口
 function curl_sms($post = '' , $charset = null ){
	global $SMS_METHOD;
	$datamobile = array('130','131','132','155','156','186','185');
	$submobile = substr($post['phones'],0,3);
	$post['content'] = str_replace("联通", "联_通", $post['content']);
	if(in_array($submobile,$datamobile)){
		$post['content'] = $post['content']."  回复TD退订";
	}
	if($SMS_METHOD == 1) {
		$post['content'] .= " 【携车网】";
		$client = new SoapClient("http://121.199.48.186:1210/Services/MsgSend.asmx?WSDL");//此处替换成您实际的引用地址
		$param = array("userCode"=>"csml","userPass"=>"csml5103","DesNo"=>$post["phones"],"Msg"=>$post["content"],"Channel"=>"1");
		$p = $client->__soapCall('SendMsg',array('parameters' => $param));
		return $p;
	}else{
		$xml_data="<?xml version=\"1.0\" encoding=\"UTF-8\"?><message><account>dh21007</account><password>49e96c9b07f0628fec558b11894a9e8f</password><msgid></msgid><phones>$post[phones]</phones><content>$post[content]</content><subcode></subcode><sendtime></sendtime></message>";

		$url = 'http://www.10690300.com/http/sms/Submit';
		$curl = curl_init($url );
		if( !is_null( $charset ) ){
			curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type:text/xml; charset=utf-8"));
		}
		if( !empty( $post ) ){
			$xml_data = 'message='.urlencode($xml_data);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_data);
		}
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($curl);
		curl_close($curl);
		//var_dump($res);
		return $res;
	}
	
}

/**
 +----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码
 * 默认长度6位 字母和数字混合 支持中文
 +----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function randString($len=6,$type='',$addChars='') {
	$str ='';
	switch($type) {
		case 0:
			$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
			break;
		case 1:
			$chars= str_repeat('0123456789',3);
			break;
		case 2:
			$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
			break;
		case 3:
			$chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
			break;
		case 4:
			$chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借".$addChars;
			break;
		default :
			// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
			$chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
			break;
	}
	if($len>10 ) {//位数过长重复字符串一定次数
		$chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
	}
	if($type!=4) {
		$chars   =   str_shuffle($chars);
		$str     =   substr($chars,0,$len);
	}else{
		// 中文随机字
		for($i=0;$i<$len;$i++){
		  $str.= self::msubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
		}
	}
	return $str;
}

function get_membercoupon($membercoupon_id){
    global $mysql;
	$sql = "select * from xc_membercoupon where membercoupon_id='".$membercoupon_id."' ";
	$membercoupon=$mysql->query($sql,'assoc');
	/*$coupon_id = $membercoupon['coupon_id'];
	$sql_coupon = "select * from xc_coupon where id='".$coupon_id."' ";
	$coupon=$mysql->query($sql_coupon,'assoc');*/
	return $membercoupon;
}

function get_membercoupons($membercoupon_ids){
    global $mysql;
	$sql = "select * from xc_membercoupon where membercoupon_id in (".$membercoupon_ids.") ";
	$membercoupon=$mysql->query($sql,'all');
	//echo '<pre>';print_r($membercoupon);exit;
	if($membercoupon){
		foreach($membercoupon as $k=>$v){
			$coupon_id = $v['coupon_id'];
			$sql_coupon = "select * from xc_coupon where id='".$coupon_id."' ";
			$coupon=$mysql->query($sql_coupon,'assoc');
			$membercoupon[$k]['coupon_summary'] = $coupon['coupon_summary'];
			//$membercoupon[$k]['coupon_amount'] = $coupon['coupon_amount'];
		}
	}

	return $membercoupon;
}

//获取上门保养订单信息
function get_orderinfo($order_id){
    global $mysql;
	$sql = "select * from xc_reservation_order where id in (".$order_id.")";
	$orderifno=$mysql->query($sql,'assoc');
	//echo '<pre>';print_r($membercoupon);exit;
	return $orderifno;
}
//获取优惠券订单信息
function get_coupon_info($coupon_id){
	global $mysql;
	$sql = "select * from xc_coupon where id in ( ".$coupon_id." ) ";
	$coupon_info=$mysql->query($sql,'assoc');
	//echo '<pre>';print_r($membercoupon);exit;
	return $coupon_info;
}
//获取用户优惠券订单信息
function get_membercoupon_info($membercoupon_id){
	global $mysql;
	$sql = "select * from xc_membercoupon where membercoupon_id in ( ".$membercoupon_id.") ";
	$membercoupon_info=$mysql->query($sql,'all');
	//echo '<pre>';print_r($membercoupon);exit;
	return $membercoupon_info;
}

function update_membercoupon_state($membercoupon_id,$pay_status){
	global $mysql;
	$rand_str = get_coupon_code();
	$now = time();
	$sql = "UPDATE xc_membercoupon SET pay_type=5,is_pay='".$pay_status."',pay_time='".$now."',coupon_code='".$rand_str."' WHERE membercoupon_id='".$membercoupon_id."' LIMIT 1";
	$mysql->query($sql);
}
//更新扫码状态
function update_membercoupon_scan($membercoupon_id){
	global $mysql;
	$sql = "UPDATE xc_membercoupon SET is_scan=1 WHERE membercoupon_id='".$membercoupon_id."' LIMIT 1";
	$mysql->query($sql);
}

function save_membercoupon_pay($membercoupon_ids,$trade_no,$buyer_email,$gmt_create,$gmt_payment,$total_fee=0,$trade_status='',$is_return){
	global $mysql;
	$now = time();
	$sql = "INSERT INTO xc_couponpay SET membercoupon_ids='".$membercoupon_ids."',trade_no='".$trade_no."',buyer_email='".$buyer_email."',gmt_create='".$gmt_create."',gmt_payment='".$gmt_payment."',total_fee='".$total_fee."',trade_status='".$trade_status."',create_time='".$now."',is_return='".$is_return."'";
	$mysql->query($sql);
}

	function get_coupon_code(){
        $orderid = randString(9,1);
        $sum = 0;
	    for($ii=0;$ii<strlen($orderid);$ii++){
	        $orderid = (string)$orderid;
            $sum += intval($orderid[$ii]);
        }
        $str = $sum%10;
		$result = $orderid.$str;
        return $result;
    }

	/*
	*@name 微信发送客服消息接口
	*@author ysh
	*@time 2014/3/26
	*/
	function weixin_api($data) {
		global $mysql;
		//$access_token = get_access_token();
		$access_token = getWeixinToken();//
		$time=time();
		$sql44 = "INSERT INTO xc_logcode SET type='33',log='".$access_token."',oid='222222',insertTime='".$time."'";
		$res = $mysql->query($sql44);
		$body = array(
				"touser"=>$data['touser'],
				"msgtype"=>"news", 
				"news" => array(
					"articles" => array(
												array(
															"title"=>"%title%", 
															"description"=>"%description%",
															"url" =>$data['url'],
														),
												)
											),
			);
		$json_body = json_encode($body);
		$search = array('%title%' , '%description%');
		$replace = array($data['title'],$data['description']);
		$json_body = str_replace($search , $replace , $json_body);


		$host = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL,$host);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_body);
		$output = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($output,true);

		$result = serialize($result);
		$sql44 = "INSERT INTO xc_logcode SET type='44',log='".$result.$host."',oid='222222',insertTime='".$time."'";
		$res = $mysql->query($sql44);

		if($result['errcode'] != 0) {
			weixin_api($data);
		}else {
			return $result;
		}
	}

	function xc_memcache_set($name,$value) {
		$mem = new Memcache;
		$mem->connect("127.0.0.1",  11211);
		//保存数据
		$mem->set($name, $value, 0, 7200);
	}

	function xc_memcache_get($name) {
		$mem = new Memcache;
		$mem->connect("127.0.0.1",  11211);
		//获取数据
		$val = $mem->get($name);
		return $val;
	}

	function xc_memcache_del($name) {
		$mem = new Memcache;
		$mem->connect("127.0.0.1",  11211);
		$mem->delete($name);
	}

	function tt($data){
		global $mysql;
		$sql = "INSERT INTO xc_test SET imNo='".$data."' ";
		$mysql->query($sql);
	}

	function save_notice($data){
		global $mysql;
		$sql = "INSERT INTO xc_weixin_notice SET data='".$data."' ";
		$mysql->query($sql);
	}
	
	/*
	*@name 微信获取access_token
	*@author ysh
	*@time 2014/7/17
	*/
	function get_access_token() {
		$token = getWeixinToken();
		return $token;
// 		$memcache_access_token = xc_memcache_get('WEIXIN_access_token');
// 		if($memcache_access_token) {
// 			$access_token = $memcache_access_token;
// 		}else {
// 			$appid = "wx43430f4b6f59ed33";
// 			$secret = "e5f5c13709aa0ae7dad85865768855d6";
		
// 			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
// 			$result = file_get_contents($url);
// 			$result = json_decode($result,true);
// 			$access_token = $result['access_token'];
// 			xc_memcache_set('WEIXIN_access_token',$access_token);
// 		}
// 		return $access_token;
	}

	/*获取微信token
	 * auth bright
	 */
	function getWeixinToken(){
		global $mysql;
		$sql = "select * from xc_weixin_token where id=1 ";
		$res = $mysql->query($sql,'assoc');
		if ($res) {
			return $res['token'];
		}else{
			return null;
		}
	}

	/*
	*@name 微信发货通知接口
	*@author ysh
	*@time 2014/7/17
	*/
	function weixin_delivernotify($transid,$out_trade_no,$postData) {
		global $wxPayHelper;
		$access_token = get_access_token();
		
		$body['appid'] = $postData['AppId'];
		$body['openid'] = $postData['OpenId'];
		$body['transid'] = $transid?$transid:0;
		$body['out_trade_no'] = $out_trade_no;
		$body['deliver_timestamp'] = strval(time());
		$body['deliver_status'] = "1";
		$body['deliver_msg'] = "ok";
		$body['app_signature'] = $wxPayHelper->xc_get_biz_sign($body);
		$body['sign_method'] = "sha1";

		$json_body = json_encode($body);

		$host = "https://api.weixin.qq.com/pay/delivernotify?access_token={$access_token}";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL,$host);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_body);
		$output = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($output,true);

		tt($json_body);
		tt($output);

		if($result['errcode'] != 0) {
			xc_memcache_del('WEIXIN_access_token');
			weixin_delivernotify($transid,$out_trade_no,$postData);
		}else {
			return $result;
		}

	}

	
	/*
	*@name 获取微信支付时的微信id 用于完成支付后的跳转 pa_id
	*@author ysh
	*@time 2014/7/17
	*/
	function get_weixin_paid($uid,$mobile) {
		global $mysql;
		$sql_weixin = "SELECT * FROM xc_paweixin WHERE uid='".$uid."' AND mobile='".$mobile."' AND type=2 LIMIT 1";
		$weixin = $mysql->query($sql_weixin,"assoc");
		if($weixin) {
			$sql_padatatest = "SELECT * FROM xc_padatatest WHERE FromUserName='".$weixin['wx_id']."' AND type=2 LIMIT 1";
			$FromUserName = $mysql->query($sql_padatatest,"assoc");
			
			return $FromUserName['id'];			
		}	
	}

?>