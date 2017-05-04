<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>小米维护页面</title>
  <link rel="stylesheet" href="{{ url('Home/css/xiaomi.css') }}"/>
    <script type="text/javascript" src="{{ url('Home/js/jquery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('Home/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('Home/css/product_buy.css') }}">
    <script src="{{ url('Home/js/jquery.animate-colors-min.js') }}"></script>
</head>
<body>
     <div class="head_box">
         <div id="head_wrap">
             <div id="head_nav">
                 <a class="head_nav_a">大米网</a>
                 <span>|</span>
                 <a class="head_nav_a">MIUI</a>
                 <span>|</span>
                 <a class="head_nav_a">米聊</a>
                 <span>|</span>
                 <a class="head_nav_a">游戏</a>
                 <span>|</span>
                 <a class="head_nav_a">多看阅读</a>
                 <span>|</span>
                 <a class="head_nav_a">云服务</a>
                 <span>|</span>
                 <a class="head_nav_a">大米移动版</a>
                 <span>|</span>
                 <a class="head_nav_a">问题反馈</a>
                 <span>|</span>
                 <a class="head_nav_a" id="Select_Region_but">Select Region</a>
             </div>
         </div>
     </div>
<link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{('/Home/css/base.min.css')}}">

<!-- 新引入 -->

<!-- CSS样式 -->
<link rel="stylesheet" type="text/css" href="{{ ('/Home/css/xiaomi.css') }}">

<link rel="stylesheet" href="{{('/Home/css/list.min.css')}}">
                <!-- 方案二 -->
<style type="text/css">
/*==== RESET ====*/
    body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,p,pre,code,form,fieldset,legend,blockquote,th,td,figure{margin:0;padding:0;}
    li{list-style:none;}

    html{-webkit-text-size-adjust:none;-ms-text-size-adjust:none;}
    h1,h2,h3,h4,h5,h6{font-size:100%;}

    .clearfix{zoom:1;}
    .clearfix:after{content:".";display:block;height:0;clear:both;overflow:hidden;visibility:hidden;}

    a:hover,a:active{text-decoration:underline;}

    body{background:#F9FAFD;color:#818181;}
    .box{width:624px;height:188px;padding:99px 30px 0 184px;background:url('/Home/images/maintenance.png') no-repeat 0 0;position:absolute;margin:-144px 0 0 -419px;top:50%;left:50%;font-size:14px;line-height:24px;}
    .box .title{margin-bottom:11px;}
    .box .text{padding-left:29px;}

     #banner_menu_wrap{
        display:none;
    }
    #main_head_box{
         display:none;
    }
</style>

<!-- 这里是提示用户说本网站不存在的地方 -->
@if(session('msg'))
    <script type="text/javascript">
      alert("{{ session('msg') }}");
    </script>
@endif
<!-- 这里是提示用户说本网站不存在的地方 -->
<body>
<div style="height:350px;"></div>
    <div class="box">
         <div class="title">亲爱的盆友们：</div>
         <div class="text">
                为了能让您访问更快更稳定，同时为您提供更高品质的服务，源码库正在维护系统。因此目前网站的部分功能不能使用，请稍后再回来。给您造成了不便，请谅解。
          </div>
    </div>
<div style="height:100px;"></div>
 <div id="foot_box">
         <div id="foot_wrap">
             <div class="foot_top">
                 <ul>
                     <li>1小时快修服务</li>
                     <li class="font_top_i">|</li>
                     <li>7天无理由退货</li>
                     <li class="font_top_i">|</li>
                     <li>15天免费换货</li>
                     <li class="font_top_i">|</li>
                     <li>满150元包邮</li>
                     <li class="font_top_i">|</li>
                     <li>520余家售后网点</li>
                 </ul>
             </div>
             <div class="foot_bottom">
                 <div class="foot_bottom_l">
                     <dl>
                         <dt>帮助中心</dt>
                         <dd>购物指南</dd>
                         <dd>支付方式</dd>
                         <dd>配送方式</dd>
                     </dl>
                     <dl>
                         <dt>服务支持</dt>
                         <dd>售后政策</dd>
                         <dd>自助服务</dd>
                         <dd>相关下载</dd>
                     </dl>
                     <dl>
                         <dt>大米之家</dt>
                         <dd>大米之家</dd>
                         <dd>服务网点</dd>
                         <dd>预约亲临到店服务</dd>
                     </dl>
                     <dl>
                         <dt>关注我们</dt>
                         <dd>新浪微博</dd>
                         <dd>大米部落</dd>
                         <dd>官方微信</dd>
                     </dl>
                 </div>
                 <div class="foot_bottom_r">
                     <a>400-100-5678</a>
                     <a>周一至周日 8:00-18:00</a>
                     <a>（仅收市话费）</a>
                     <span> 24小时在线客服</span>
                 </div>
             </div>
         </div>
         <div class="foot_note_box">
             <div class="foot_note_wrap">
                 <div class="foot_note_con">
                     <span class="foot_logo"><img src="{{ url('Home/img/mi-logo.png') }}" width="38px" height="38px"></span>
                        <span class="foot_note_txt">
                            <a>大米网</a><h>|</h><a>MIUI</a><h>|</h><a>米聊</a><h>|</h><a>多看书城</a><h>|</h><a>大米路由器</a><h>|</h><a>大米后院</a><h>|</h><a>大米天猫店</a><h>|</h><a>大米淘宝直营店</a><h>|</h><a>大米网盟</a><h>|</h><a>问题反馈</a><h>|</h><a>Select Region</a>
                            <a> 5555555号</a>
                        </span>
                 </div>

             </div>
         </div>
     </div>
</body>
</html>