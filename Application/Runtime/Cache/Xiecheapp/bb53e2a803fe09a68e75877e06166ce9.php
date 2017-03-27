<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php if(!empty($title)): echo ($title); ?>
            <?php else: ?>
            携车网,汽车保养维修预约,4S店折扣优惠,事故车维修预约<?php endif; ?>
    </title>
    <?php if(empty($meta_keyword)): ?><meta content="汽车保养,汽车维修,携车网,4S店预约保养,事故车维修" name="keywords">
        <?php else: ?>
        <meta content="<?php echo ($meta_keyword); ?>" name="keywords"><?php endif; ?>
    <?php if(empty($description)): ?><meta content="汽车保养维修,事故车维修-首选携车网,全国唯一4S店汽车保养维修折扣的网站,最低5折起,还有更多团购套餐任您选,事故车维修预约,不花钱,还有返利拿4006602822"
              name="description">
        <?php else: ?>
        <meta content="<?php echo ($description); ?>" name="description"><?php endif; ?>

    <link type="text/css" href="/Public_new/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="/Public_new/css/common.css" rel="stylesheet">
    <link type="text/css" href="/Public_new/css/header_new.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/Public_new/jquery/jquery.min.js"></script>
    <script src="/Public_new/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header_new">
    <div class="head_content">
        <div class="logo fl"><a href="/"><img src="/Public_new/images/index_new/logo2.png"></a></div>
        <div class="city2 fl">
            <p><?php echo ($new_city_name); ?></p>
            <p><a href="/Public/city">[切换城市]</a></p>
        </div>
        <div class="model fr">
            <div class="binds"> <?php echo ($carName); ?>&nbsp;&nbsp;
                <a href="javascript:;" class="car-select">
                    <?php if(empty($choseCar)): ?>修改车型
                        <?php else: ?>
                        车型绑定<?php endif; ?>
                </a>
                &nbsp;|&nbsp;
                <?php if(empty($username)): ?><a href="/Public/login">登录 / 注册</a>
                    <?php else: ?>
                    <a href="/myhome"><?php echo ($username); ?></a> <a href="/public/logout">退出</a><?php endif; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>400-660-2822</b></div>
            <div class="select">
                <div class="fl" id="menu_f">
                    <ul>
                        <li id="#item1" class="fl li_style"><a href="/">首页</a></li>
                        <li  class="fl bg">|</li>
                        <li id="#item2" class="fl left2 li_style"><a href="/carservice" onclick="checkCar('/carservice');return false;">养车</a></li>
                        <li class="fl bg">|</li>
                        <?php if(($new_city_name) == "上海"): ?><li id="#item3" class="fl left2 li_style"><a href="/shiguche">修车</a></li>
                            <li class="fl bg">|</li><?php endif; ?>

                        <li id="#item4" class="fl left2 li_style line2"><a href="/ask">提问</a></li>
                        <li class="clearf"></li>
                    </ul>
                </div>
                <?php if(($new_city_name) == "上海"): ?><div class="fr">
                        <div class="search">
                            <form action="/shopservice/index" method="get">
                                <input type="text" name="k" class="search_input" placeholder="输入4S店铺">
                                <input type="submit" value="" class="search_sub" class="fl">
                            </form>
                        </div>
                    </div><?php endif; ?>
                <div class="clearf"></div>
            </div>
        </div>
        <div class="clearf"></div>
    </div>
</div>
<div class="kong"></div>


<link type="text/css" href="/Public_new/css/ask.css" rel="stylesheet">
    <div class="askbanner">
      <div class="w1183">
        <div class="asktitle">
          <h1>FAQ谢师傅问答</h1>
          <p>由谢师傅为代表的百家4S店专业师傅<br />在线为您解答爱车的种种疑问</p>
          <img src="/Public_new/images/ask/thrbz.png" alt="" usemap="#Map" border="0">
          <map name="Map" id="Map">
            <area shape="circle" coords="429,64,61" href="#maodian3" />
            <area shape="circle" coords="245,64,61" href="#maodian2" />
            <area shape="circle" coords="64,64,61" href="#maodian1" />
          </map>
        </div>
      </div>
    </div>

    <div class="ask2">
      <div class="c2">
        <div class="ask2con" style="position:relative;height:1414px; overflow:hidden;">
          <a name="maodian1" style="position:absolute;height:10px;top:-113px;left:0;z-index:2;"></a>
          <a name="maodian2" style="position:absolute;height:10px;top:338px;left:0;z-index:2;"></a>
          <a name="maodian3" style="position:absolute;height:10px;top:850px;left:0;z-index:2;"></a>
          <img src="/Public_new/images/ask/ask2img.png" alt="">
        </div>
      </div>
    </div>

    <div class="ask3">
        <div class="w1183">       
          <div class="ask3con">
            <img src="/Public_new/images/ask/weixinimg.png" alt="">
          </div>
        </div>
    </div>
<div class="fixedright">

    <div class="returnTop Top_kefu">
        <div class="online_kefu" onclick="window.open('http://qiao.baidu.com/v3/?module=default&controller=im&action=index&ucid=6534618&type=n&siteid=3474866','_blank')"></div>
        <div class="retopslide kefu move-arrow">
        <a href="http://qiao.baidu.com/v3/?module=default&controller=im&action=index&ucid=6534618&type=n&siteid=3474866" target="_blank"> 在线客服</a>
            <i>&nbsp;</i>
        </div>
    </div>
    <div class="line Top_line"></div>
    <div class="returnTop Top_order">
        <div class="order_list"></div>
        <div class="orderlist">
            <p><a href="/myhome/carservice_order" target="_blank">保养订单</a></p>
            
            <p><a href="/myhome/shiguche_order" target="_blank">维修订单</a></p>

            <p><a href="/myhome/coupon_order" target="_blank">团购订单</a></p>
            
            <i>&nbsp;</i>
        </div>
    </div>
    <div class="returnTop Top_phone">
        <div class="phone"></div>
        <div class="phone2">
            <span class="kefu_style">客服 400-660-2822</span>
            <i>&nbsp;</i>
        </div>
    </div>
    <div class="returnTop Top_chat">
        <div class="erweima"></div>
        <div class="retopslide2">
            <div class="wechat"></div>
            <i>&nbsp;</i>
        </div>
    </div>

    <div class="returnTop Rtop">
        <div class="retopico"></div>
        <div class="retopslide return">
            返回顶部
            <i>&nbsp;</i>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $(".Rtop").hover(function () {
            $(this).find(".retopico").css("background-color", "#1092e5");
            $(this).find(".return").stop().show().animate({"right": "35px", "opacity": "1"});
        }, function () {
            $(this).find(".retopico").css("background-color", "none");
            $(this).find(".return").stop().animate({"right": "100px", "opacity": "0"}, function () {
                $(".return").hide();
            });
        });

        $(".Top_chat").hover(function () {
            $(this).find(".erweima").css("background-color", "#1092e5");
            $(this).find(".retopslide2").show().stop().animate({"right": "35px", "opacity": "1"});
        }, function () {
            $(this).find(".erweima").css("background-color", "none");
            $(this).find(".retopslide2").stop().animate({"right": "100px", "opacity": "0"}, function () {
                $(".retopslide2").hide();
            });
        });

        $(".Top_phone").hover(function () {
            $(this).find(".phone").css("background-color", "#1092e5");
            $(this).find(".phone2").stop().show().animate({"right": "35px", "opacity": "1"});
        }, function () {
            $(this).find(".phone").css("background-color", "");
            $(this).find(".phone2").stop().animate({"right": "100px", "opacity": "0"}, function () {
                $(".retopslide").hide();
            });
        });
        $(".Top_order").hover(function () {
            $(this).find(".order_list").css({"background": "url(/Public_new/images/common/my_order2.png) center center no-repeat", "background-color": "#1092e5"});
            $(this).find(".orderlist").show().stop().animate({"right": "35px", "opacity": "1"});
        }, function () {
            $(this).find(".order_list").css({"background": "url(/Public_new/images/common/my_order.png) center center no-repeat", "background-color": ""});
            $(this).find(".orderlist").stop().animate({"right": "100px", "opacity": "0"}, function () {
                $(".orderlist").hide();
            });
        });

//        $(".Top_kefu").hover(function () {
//            $(this).find(".online_kefu").css("background-color", "#1092e5");
//            $(this).find(".kefu").stop().show().animate({"right": "35px", "opacity": "1"});
//        }, function () {
//            $(this).find(".online_kefu").css("background-color", "");
//            $(this).find(".kefu").stop().animate({"right": "100px", "opacity": "0"}, function () {
//                $(".retopslide").hide();
//            });
//        });

        $(".Rtop").click(function () {
            $("html,body").animate({scrollTop: "0"});
        });

    });
</script>



<div class="footer2">
    <div id="go" style="display:none"></div>
    <div class="footer_contents">
        <div class="zhichi fl">
            <p class="p_bottom"><a href="/public/aboutus" target="_blank">关于我们</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="/shopservice/agreement" target="_blank">服务支持 </a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="/public/honour" target="_blank">媒体报道</a></p>
            <p>Copyright © 2015 WWW.XIECHE.COM.CN <a href="http://www.miibeian.gov.cn"><font color="#e47911">沪ICP备12017241号</font></a> 携车网 版权所有</p>
        </div>
        <div class="fr fenxiangicon">
            <p>扫二维码下载安卓app</p>
            <img src="/Public_new/images/index_new/xc-android-app.jpg" />
            <!-- <img src="/Public_new/images/index_new/fenxiang_01.jpg"/>
             <img src="/Public_new/images/index_new/fenxiang_02.jpg"/>
             <img src="/Public_new/images/index_new/fenxiang_03.png"/>-->
        </div>
        <div class="clearf"></div>
    </div>
</div>

<div class="changecarbox" id="changecarbox" style='<?php if(empty($carHistory)): ?>margin: -210px 0 0 -410px;<?php else: ?>margin: -280px 0 0 -410px;<?php endif; ?>'>
    <?php if(!empty($carHistory)): ?><div class="historycar">
            <div class="changecar-title">选择历史车型</div>
            <div class="historycarcon">
                <?php if(is_array($carHistory)): $i = 0; $__LIST__ = array_slice($carHistory,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voc): $mod = ($i % 2 );++$i;?><div class="car-a" id="<?php echo ($i); ?>"><a href="javascript:;" brandId="<?php echo ($voc["brandId"]); ?>" seriesId="<?php echo ($voc["seriesId"]); ?>" modelId="<?php echo ($voc["modelId"]); ?>" onclick="carHistory(this)"><?php echo ($voc["carName"]); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear: both;margin-bottom:0;"></div>
            </div>
        </div><?php endif; ?>
    <div class="changecar">
        <div class="changecar-title">选择新车型</div>
        <div class="changecarcon">
            <div class="mt-d-step">
                <div class="mitem mstep1 current">
                    <i>1</i>
                    选择品牌
                </div>
                <div class="mitem mstep2">
                    <i>2</i>
                    选择车系
                </div>
                <div class="mitem mstep3">
                    <i>3</i>
                    选择年款
                </div>
            </div>
            <div class="c-step-1">
                <div class="hot-brand-slect">
                    <div class="car-change-title">品牌首字母选择：</div>
                    <div class="car-change-kind">
                        <div class="car-kind current">热门</div>
                        <div class="car-kind">A</div>
                        <div class="car-kind">B</div>
                        <div class="car-kind">D</div>
                    </div>
                </div>
                <ul class="car-c-con">
                    <li>
                        <div class="cars-brand">
                            <i class="cars-icon" style="background-image: url(<?php echo C('UPLOAD_ROOT');?>/Brand/Logo/aodi.jpg)">&nbsp;</i>
                            <span>奥迪</span>
                        </div>
                    </li>
                    <li>
                        <div class="cars-brand">
                            <i class="cars-icon" style="background-image: url(<?php echo C('UPLOAD_ROOT');?>/Brand/Logo/aodi.jpg)">&nbsp;</i>
                            <span>大众</span>
                        </div>
                    </li>
                    <li>
                        <div class="cars-brand">
                            <i class="cars-icon" style="background-image: url(<?php echo C('UPLOAD_ROOT');?>/Brand/Logo/aodi.jpg)">&nbsp;</i>
                            <span>福特</span>
                        </div>
                    </li>
                    <li>
                        <div class="cars-brand">
                            <i class="cars-icon" style="background-image: url(<?php echo C('UPLOAD_ROOT');?>/Brand/Logo/aodi.jpg)">&nbsp;</i>
                            <span>别克</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="c-step-2" style="display:none;">
                <div class="has-select clearfix">
                    <div class="car-change-title"><b>已选车型:</b></div>
                    <div class="car-change-con clearfix">
                        <div class="cars">别克<b class="del" data="别克" step="1">×</b></div>
                    </div>
                </div>
                <div class="has-con-box">
                    <div class="has-select-con clearfix">
                        <h5>通用别克:</h5>
                        <div class="cars">君威</div>
                        <div class="cars">别克GL8</div>
                        <div class="cars">昂科拉ENCORE</div>
                        <div class="cars">林荫大道</div>
                        <div class="cars">君越</div>
                        <div class="cars">凯越</div>
                        <div class="cars">英朗</div>
                    </div>
                </div>
            </div>
            <div class="c-step-3" style="display:none;">
                <div class="has-select clearfix">
                    <div class="car-change-title"><b>已选车型:</b></div>
                    <div class="car-change-con clearfix">
                        <div class="cars">
                            别克
                            <b class="del" data="别克" step="1">×</b>
                        </div>
                        <div class="cars">
                            君威
                            <b class="del" data="别克" step="1">×</b>
                        </div>
                    </div>
                </div>
                <div class="has-con-box">
                    <div class="has-select-con clearfix">
                        <h5>通用别克:</h5>
                        <div class="cars">君威</div>
                        <div class="cars">别克GL8</div>
                        <div class="cars">昂科拉ENCORE</div>
                        <div class="cars">林荫大道</div>
                        <div class="cars">君越</div>
                        <div class="cars">凯越</div>
                        <div class="cars">英朗</div>
                    </div>
                </div>
            </div>
            <div class="c-step-4" style="display:none;">
                <p class="notice">
                    <i></i>
                    车型选择成功
                </p>
                <div class="carresult">
                    <strong>已选车型</strong>
                    <span class="r-pinpai">福特</span>
                    <span class="r-chexi">福克斯</span>
                    <span class="r-pailiang">福克斯 福克斯三厢 2012款 新一代1.6双离合 舒适型</span>
                </div>
                <div id="tofilldistance" class="carbtn">
                    <span id="mt_c_prev">返回重选</span>
                    <span id="mt_c_next">下一步</span>
                </div>
            </div>
        </div>
        <div class="scoll_speak">没找到我的车型？滚动查看更多</div>
    </div>
    <div id="changecarclose">关闭</div>

</div>
<div class="changecarboxbg"></div>

<script type="text/javascript">

    $(function(){
        $("#2,#4,#6,#8").css("margin-right","0");

        $(".scoll_speak").show();

        $(".changecarboxbg").height($(window).height());

        var brand_id,series_id,model_id,car_name,series_name;

        $(".car-select").click(function(){
            $.ajax({
                type: "GET",
                url: "/index/getCarBrand",
                cache: false,
                dataType:"json",

                success: function(data){

                    var html = '';

                    var lihtml = '';
                    $.each(data,function(i,v){

                        if(i!="A"){
                            html += '<div class="car-kind">'+i+'</div>';
                            lihtml += '<li style="display:none;">';
                        }else{
                            html += '<div class="car-kind current">'+i+'</div>';
                            lihtml += '<li>';
                        }
                        $.each(v,function(k,u){
                            lihtml += '<div class="cars-brand" brand-id="'+u.brand_id+'"><i class="cars-icon" style="background-image: url(<?php echo C('UPLOAD_ROOT');?>/Brand/Logo/'+u.brand_logo+')">&nbsp;</i><span>'+u.brand_name+'</span></div>';
                        })
                        lihtml +='</li>';
                    })
                    $(".car-change-kind").html(html);
                    $(".car-c-con").html(lihtml);
                }
            });
            $(".c-step-1").show().siblings().hide();
            $(".mt-d-step").show();
            $(".changecarboxbg").fadeIn();
            $("#changecarbox").slideDown();

        });




        $(document).on("click",".car-change-kind .car-kind",function(){
            $(this).addClass("current").siblings().removeClass("current");
            $(".car-c-con li").eq($(this).index()).show().siblings().hide();

        });

        $(document).on("click",".c-step-1 .cars-brand",function(){
            $(".c-step-2 .car-change-con .cars").eq(0).html($(this).find("span").text()+'<b class="del" data="'+$(this).find("span").text()+'" step="1">×</b>');
            $(".c-step-3 .car-change-con .cars").eq(0).html($(this).find("span").text()+'<b class="del" data="'+$(this).find("span").text()+'" step="1">×</b>');
            var html = '';
            brand_id = $(this).attr("brand-id");
            car_name = $(this).find("span").text();
            $.ajax({
                type: "POST",
                url: "/index/getCarSeries",
                cache: false,
                dataType:"json",
                data:{brand_id:brand_id},
                success: function(data){

                    html += '<div class="has-select-con clearfix">';
                    $.each(data,function(i,v){
                        html += '<div class="cars_series" series-id="'+v.series_id+'">'+v.series_name+'</div>';
                    })
                    html += '</div>';

                    $(".c-step-2 .has-con-box").html(html);
                }
            });
            $(".mt-d-step .mitem").eq(1).addClass("current").siblings().removeClass("current");
            $(".c-step-1").hide();
            $(".c-step-2").show();

        });

        $(document).on("click",".c-step-2 .has-select-con .cars_series",function(){
            $(".c-step-3 .car-change-con .cars").eq(1).html($(this).text()+'<b class="del" data="'+$(this).text()+'" step="2">×</b>');
            series_id = $(this).attr("series-id");
            series_name = $(this).text();
            var html = '';
            $.ajax({
                type: "POST",
                url: "/index/getCarModel",
                cache: false,
                dataType:"json",
                data:{series_id:series_id},
                success: function(data){

                    html += '<div class="has-select-con clearfix">';
                    if(data){
                       $.each(data,function(i,v){
                        html += '<div class="cars" model-id="'+v.model_id+'">'+v.model_name+'</div>';
                       }) 
                    }else{   //车型数据为空处理
                        html += '该车系下暂无录入车型';
                    }
                    
                    html += '</div>';

                    $(".c-step-3 .has-con-box").html(html);
                }
            });
            $(".mt-d-step .mitem").eq(2).addClass("current").siblings().removeClass("current");
            $(".c-step-2").hide();
            $(".c-step-3").show();

        });

        $(document).on("click",".c-step-3 .has-select-con .cars",function(){
            model_id = $(this).attr("model-id");
            $(".c-step-4 .r-pinpai").text(car_name);
            $(".c-step-4 .r-chexi").text(series_name);
            $(".c-step-4 .r-pailiang").text($(this).text());
            $(".c-step-3").hide();
            $(".c-step-4").show();
            $(".scoll_speak").hide();

            car_name = car_name+' -> '+series_name+' -> '+$(this).text();
        });

        $(document).on("click",".del",function(){
            $(".c-step-"+$(this).attr("step")).show().siblings().hide();
            $(".mt-d-step").show();
            $(".mt-d-step .mitem").eq($(this).attr("step")-1).addClass("current").siblings().removeClass("current");

        });

        $("#mt_c_next").click(function(){
            $.ajax({
                type: "POST",
                url: "/index/saveCarData",
                cache: false,
                dataType:"json",
                data:{series_id:series_id,brand_id:brand_id,model_id:model_id,car_name:car_name},
                success: function(data){
                    if(data.status){

                        $("#changecarbox").hide();
                        $(".changecarboxbg").hide();
                        var go = $('#go').text();
                        if(go){
                            document.location.href=go;
                        }else{
                            //window.location.reload();
                            window.location.href = '/carservice/order';
                        }
                    }else{
                        alert(data.msg);
                        $(".c-step-1").show().siblings().hide();
                        $(".mt-d-step").show();
                    }
                }
            });

        });

        $("#mt_c_prev").click(function(){
            $('.car-select').click();
        });

        $("#changecarclose").click(function(){
            $("#changecarbox").slideUp();
            $(".changecarboxbg").fadeOut();
        });
        //修改车型
        $('#snav u').click(function(){
            $('.car-select').click();
        })

    });


    function carHistory(e){
        $.ajax({
            type: "POST",
            url: "/index/saveCarData",
            cache: false,
            dataType:"json",
            data:{series_id:$(e).attr("seriesId"),brand_id:$(e).attr("brandId"),model_id:$(e).attr("modelId"),car_name:$(e).text()},
            success: function(data){
                if(data.status){
                    $("#changecarbox").hide();
                    $(".changecarboxbg").hide();
                    var go = $('#go').text();
                    if(go){
                        document.location.href=go;
                    }else{
                        window.location.reload();
                    }
                }else{
                    alert(data.msg);
                    $(".c-step-1").show().siblings().hide();
                    $(".mt-d-step").show();
                }
            }
        });
    }
</script>

<?php if(empty($carHistory)): ?><script type="text/javascript">
        //检测有无选过车型
        function checkCar(go){
            $('#go').text(go);
            //$("#changecarclose").hide();
            $('.car-select').click();
        }
    </script>
    <?php else: ?>
    <script type="text/javascript">
        //检测有无选过车型
        function checkCar(go){
            document.location.href = go;
        }
    </script><?php endif; ?>

<?php if(!empty($choseCar)): if(empty($noshow)): ?><script type="text/javascript">
            $(function(){
                $(".car-select").click();
            });
        </script><?php endif; ?>

    <?php if(empty($noclose)): ?><script type="text/javascript">
            $(function(){
                $("#changecarclose").hide();
            });
        </script><?php endif; endif; ?>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?60969e039f9a2a7252a22e6e27e9f16f";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>