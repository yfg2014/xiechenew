<?php

/**
 * Hotel（酒店）结构。各字段详细说明可参考接口定义，如：酒店发布接口。
 * @author auto create
 */
class Hotel
{
	
	/** 
	 * 酒店地址
	 **/
	public $address;
	
	/** 
	 * 某个卖家发布的酒店的别名(注：该字段将要废弃)
	 **/
	public $aliasName;
	
	/** 
	 * 酒店审核被否决的原因
	 **/
	public $auditDenyReason;
	
	/** 
	 * 城市编码
	 **/
	public $city;
	
	/** 
	 * 城市中文名称
	 **/
	public $cityStr;
	
	/** 
	 * 国家编码
	 **/
	public $country;
	
	/** 
	 * 国家中文名称
	 **/
	public $countryStr;
	
	/** 
	 * 创建时间
	 **/
	public $created;
	
	/** 
	 * 装修时间
	 **/
	public $decorateTime;
	
	/** 
	 * 酒店介绍
	 **/
	public $desc;
	
	/** 
	 * 区域编码
	 **/
	public $district;
	
	/** 
	 * 区域中文名称
	 **/
	public $districtStr;
	
	/** 
	 * 酒店id
	 **/
	public $hid;
	
	/** 
	 * 酒店级别
	 **/
	public $level;
	
	/** 
	 * 修改时间
	 **/
	public $modified;
	
	/** 
	 * 酒店名称
	 **/
	public $name;
	
	/** 
	 * 开业时间
	 **/
	public $openingTime;
	
	/** 
	 * 酒店定位
	 **/
	public $orientation;
	
	/** 
	 * 酒店图片url
	 **/
	public $picUrl;
	
	/** 
	 * 省份编码
	 **/
	public $province;
	
	/** 
	 * 省份中文名称
	 **/
	public $provinceStr;
	
	/** 
	 * 房型列表
	 **/
	public $roomTypes;
	
	/** 
	 * 房间数
	 **/
	public $rooms;
	
	/** 
	 * 交通距离与设施服务。JSON格式串。
	 **/
	public $service;
	
	/** 
	 * 状态。0：待审核，1：正常（审核通过），2：审核否决，3：停售
	 **/
	public $status;
	
	/** 
	 * 楼层数
	 **/
	public $storeys;
	
	/** 
	 * 酒店电话
	 **/
	public $tel;	
}
?>