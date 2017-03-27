<?php
include_once("WxPayHelper.php");
require_once("function.php");
$sign_type = $_REQUEST['sign_type'];//签名类型 取值:MD5,RSA,默认MD5
$trade_mode = $_REQUEST['trade_mode'];//交易模式 1-即时到帐 其他保留
$trade_state = $_REQUEST['trade_state'];//交易状态 支付结果: 0--成功 其他保留
$partner = $_REQUEST['partner'];//商户号
$bank_type = $_REQUEST['bank_type'];//银行类型,在微信中使用WX
$bank_billno = $_REQUEST['bank_billno'];//银行订单号
$total_fee = $_REQUEST['total_fee']/100;//支付金额,单位为分
$notify_id = $_REQUEST['notify_id'];//支付结果通知ID,对于某些特定商户,只返回通知ID
$transaction_id = $_REQUEST['transaction_id'];//交易号,28为长的数值,其中前10位为商户号,之后8位为订单产生的日期,如20090415,最后10位是流水号
$out_trade_no = $_REQUEST['out_trade_no'];//商户系统的订单号,与请求一致
$attach = $_REQUEST['attach'];//商户数据包,原样返回,空参数不传递
$time_end = $_REQUEST['time_end'];//支付完成时间格式为yyyyMMddhhmmss,如2009年12月27日9点10分10秒表示为20091227091010。时区为GMT+8beijing
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
$postData = (array) $postObj;
if($trade_state == '0'){ //支付成功
	set_log($out_trade_no);
	$output=strpos($out_trade_no,'|');
	if($output==false){
	}else{
		$out_trade_no = str_replace('|',',',$out_trade_no);
	}
	$membercoupon_info = get_membercoupons($out_trade_no);
	
	add_wxwap($out_trade_no,$transaction_id,$total_fee,$trade_state);
	
	if($membercoupon_info){
		foreach($membercoupon_info as $k=>$v){
			if($v['is_pay']==0){
					update_membercoupon_state($v['membercoupon_id'],1);
					coupon_send_sms($v['membercoupon_id']);
				if($v['coupon_id']){
					update_coupon_count($v['coupon_id']);
				}
			}
		}
	}
	//微信发货通知接口
	weixin_delivernotify($transaction_id,$out_trade_no,$postData);

	echo "success";
	exit;
}else{
	
	echo "fail";
	exit;
}