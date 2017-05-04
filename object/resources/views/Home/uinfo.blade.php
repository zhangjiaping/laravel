@extends('Home.parent')
@section('content')
<title>个人中心</title>
<!-- <link rel="shortcut icon" href="" type="image/x-icon"> -->
<!-- <link rel="icon" href="" type="image/x-icon"> -->
<!-- <link rel="stylesheet" href=""> -->
<!-- <link rel="stylesheet" type="text/css" href=""> -->
<link rel="stylesheet" href="{{ url('/Home/uinfo/css/xiaomi.css') }}"/>
<link rel="stylesheet" href="{{ url('/Home/uinfo/css/base.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/Home/uinfo/css/main.min.css') }}">
</head>
<script type="text/javascript" src="/Home/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="{{ url('Home/uinfo/order.css') }}" type="text/css">
<!-- 地址管理的css -->
<link rel="stylesheet" href="{{ url('/Home/checkorder/base.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/Home/checkorder/checkout.min.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="{{ url('/Home/checkorder/base.min.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ url('/Home/checkorder/address-edit.min.css') }}">
<script type="text/javascript" async="" src="{{ url('/Home/checkorder/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/Home/checkorder/jquery.statData.min.js') }}"></script>
<script src="{{ url('/Home/checkorder/hm.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/Home/checkorder/xmst.js') }}"></script>
<script src="{{ url('/Home/checkorder/base.min.js') }}"></script>
 <script type="text/javascript" src="{{ url('/Home/checkorder/address_all_new.js') }}"></script>
<script type="text/javascript" src="{{ url('/Home/checkorder/addressEdit.min.js') }}"></script>
<script type="text/javascript" src="{{ url('Home/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/Home/checkorder/mstr.js') }}"></script>
<script type="text/javascript" src="{{ url('/Home/checkorder/checkout.min.js') }}"></script>


<div class="breadcrumbs">
    <div class="container">
    <a href=""  >首页</a><span class="sep">&gt;</span><span>个人中心</span>    
    </div>
</div>

<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span4" style='width:200px;'>
                <div class="uc-box uc-sub-box">
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                @if($id != 5)
                                <li class='active'><a href="{{ url('home/userinfo/create') }}" id='all'>我的订单</a></li>
                                @else
                                <li><a href="{{ url('home/orderlist/5') }}" id='all'>我的订单</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li class=""><a href="" >我的个人中心</a></li>
                                <li><a href="javascript:void(0)" id='msg'>消息通知<i class="J_miMessageTotal"></i></a>
                                </li>
                                <li><a id='J_address' href="{{ url('/home/userinfo/11') }}" >收货地址</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="{{ url('home/uinfos') }}" target="_blank" data-stat-id="35eef2fd7467d6ca" >个人信息</a>
                                </li>
                                <li><a href="{{ url('home/uinfos/1') }}" target="_blank" data-stat-id="ae5ee0188510f1e6" >修改密码</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span16" style='width:1010px;'>
                <div class="protal-content-update hide">
                    <div class="protal-username">
                        Hi, 1250025725        
                    </div>
                    <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。
                        <a href="" target="_blank" > 立即前往&gt;</a>
                    </p>
                </div>
                <div class="uc-box uc-main-box">
                    <div class="uc-content-box portal-content-box" style='margin-top:-40px;display:block;'>
                        <div class="box-bd">
                            <div class="portal-main clearfix" style='height:150px;'>
                                <div class="user-card">
                                    <h2 class="username" style='margin-left:-50px;margin-top:-30px;'>1250025725</h2>
                                    <p class="tip">晚上好</p>
                                    <a class="link" href="">修改个人信息 &gt;</a>
                                    <img class="avatar" src="./uinfo_files/photo.jpg" width="100" height="100" alt="1250025725">
                                </div>
                            </div>
                            <div class="portal-sub">
                                <ul class="info-list clearfix" style='width:794px;'>
                                    <li style='width:300px;'>
                                        <h3>待支付的订单：<span class="num">0</span></h3>
                                        <a href="" >查看待支付订单<i class="iconfont"></i></a>
                                        <img src="/Home/images/portal-icon-1.png" alt="">
                                    </li>
                                    <li style='width:320px;float:right;margin-top:-160px;'>
                                        <h3>待收货的订单：<span class="num">0</span></h3>
                                        <a href="" >查看待收货订单<i class="iconfont"></i></a>
                                        <img src="/Home/images/portal-icon-2.png" alt="">
                                    </li>
                                    <li>
                                        <h3>待评价商品数：<span class="num">0</span></h3>
                                        <a href="" >查看待评价商品<i class="iconfont"></i></a>
                                        <img src="/Home/images/portal-icon-3.png" alt="">
                                    </li>
                                    <li style='width:320px;float:right;margin-top:-160px;'>
                                        <h3>喜欢的商品：<span class="num">0</span></h3>
                                        <a href="">查看喜欢的商品<i class="iconfont"></i></a>
                                        <img src="/Home/images/portal-icon-4.png" alt="">
                                    </li>
                                </ul>
                            </div> 
                        </div>       
                    </div>
                    <div class="uc-content-box head" style='display:none;'>
                        <div class="box-hd">
                            <h1 class="title">消息通知</h1>
                            <div class="more clearfix">
                                <ul class="filter-list J_addrType">
                                    <li class="first active">
                                        <a href="#category=all">全部消息<span class="m-num"></span></a>
                                    </li>
                                    <li>
                                        <a href="#category=express">物流动态</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                    <div class="message-main body" style='display:none;'>
                        <div class="message-list J_mList" id="J_msgList" data-stat-title="aaa"><div class="no-data">暂无数据</div></div>
                        <div class="J_mPager"></div>
                    </div> 
                </div>
            </div>
        </div>
    </div>        
</div>
<script type="text/javascript">
    $('#J_address').click(function(){
        $('.portal-content-box').css('display','none');
        $('.order-list-box').removeClass('active').addClass('hide');
        $('#head').css('display','block');
        $('#body').css('display','block');
    });
    $('#msg').click(function(){
        $('.portal-content-box').css('display','none');
        $('.head').css('display','block');
        $('.body').css('dispaly','block');
    });
</script>
<!-- 
<div class="site-footer">
<div class="container">
<div class="footer-service">
<ul class="list-service clearfix">
<li><a rel="nofollow" href="http://www.mi.com/static/fast/" target="_blank" data-stat-id="46873828b7b782f4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-46873828b7b782f4&#39;, &#39;//www.mi.com/static/fast/&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>预约维修服务</a></li>
<li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" data-stat-id="78babcae8a619e26" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-78babcae8a619e26&#39;, &#39;//www.mi.com/service/exchange#back&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>7天无理由退货</a></li>
<li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank" data-stat-id="d1745f68f8d2dad7" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-d1745f68f8d2dad7&#39;, &#39;//www.mi.com/service/exchange#free&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>15天免费换货</a></li>
<li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank" data-stat-id="f1b5c2451cf73123" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-f1b5c2451cf73123&#39;, &#39;//www.mi.com/service/exchange#mail&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>满150元包邮</a></li>
<li><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" data-stat-id="b57397dd7ad77a31" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-b57397dd7ad77a31&#39;, &#39;//www.mi.com/static/maintainlocation/&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>520余家售后网点</a></li>
</ul>
</div>
<div class="footer-links clearfix">

<dl class="col-links col-links-first">
<dt>帮助中心</dt>

<dd><a rel="nofollow" href="http://www.mi.com/service/account/register/" target="_blank" data-stat-id="e5dad0738a41014f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-e5dad0738a41014f&#39;, &#39;//www.mi.com/service/account/register/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">账户管理</a></dd>

<dd><a rel="nofollow" href="http://www.mi.com/service/buy/buytime/" target="_blank" data-stat-id="8e128f473e680197" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-8e128f473e680197&#39;, &#39;//www.mi.com/service/buy/buytime/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">购物指南</a></dd>

<dd><a rel="nofollow" href="http://www.mi.com/service/order/sendprogress/" target="_blank" data-stat-id="fd9e3532f60a2f8d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-fd9e3532f60a2f8d&#39;, &#39;//www.mi.com/service/order/sendprogress/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">订单操作</a></dd>

</dl>

<dl class="col-links ">
<dt>服务支持</dt>

<dd><a rel="nofollow" href="http://www.mi.com/service/exchange" target="_blank" data-stat-id="8e282b6f669ba990" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-8e282b6f669ba990&#39;, &#39;//www.mi.com/service/exchange&#39;, &#39;pcpid&#39;, &#39;&#39;]);">售后政策</a></dd>

<dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank" data-stat-id="5f2408ab3c808aa2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-5f2408ab3c808aa2&#39;, &#39;http://fuwu.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">自助服务</a></dd>

<dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank" data-stat-id="18c340c920a278a1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-18c340c920a278a1&#39;, &#39;http://xiazai.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">相关下载</a></dd>

</dl>

<dl class="col-links ">
<dt>线下门店</dt>

<dd><a rel="nofollow" href="http://www.mi.com/c/xiaomizhijia/" target="_blank" data-stat-id="b27b566974e4aa67" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-b27b566974e4aa67&#39;, &#39;//www.mi.com/c/xiaomizhijia/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米之家</a></dd>

<dd><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" data-stat-id="6dab396f7a873f15" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-6dab396f7a873f15&#39;, &#39;//www.mi.com/static/maintainlocation/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">服务网点</a></dd>

<dd><a rel="nofollow" href="http://www.mi.com/static/familyLocation/" target="_blank" data-stat-id="9af5efe014c3aea2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-9af5efe014c3aea2&#39;, &#39;//www.mi.com/static/familyLocation/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">零售网点</a></dd>

</dl>

<dl class="col-links ">
<dt>关于小米</dt>

<dd><a rel="nofollow" href="http://www.mi.com/about" target="_blank" data-stat-id="f6d386c65b1f4132" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-f6d386c65b1f4132&#39;, &#39;//www.mi.com/about&#39;, &#39;pcpid&#39;, &#39;&#39;]);">了解小米</a></dd>

<dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank" data-stat-id="4307a445f5592adb" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-4307a445f5592adb&#39;, &#39;http://hr.xiaomi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">加入小米</a></dd>

<dd><a rel="nofollow" href="http://www.mi.com/about/contact" target="_blank" data-stat-id="6842e821365ee45d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-6842e821365ee45d&#39;, &#39;//www.mi.com/about/contact&#39;, &#39;pcpid&#39;, &#39;&#39;]);">联系我们</a></dd>

</dl>

<dl class="col-links ">
<dt>关注我们</dt>

<dd><a rel="nofollow" href="http://weibo.com/xiaomishangcheng" target="_blank" data-stat-id="4d561ee685cd2e15" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-4d561ee685cd2e15&#39;, &#39;http://weibo.com/xiaomishangcheng&#39;, &#39;pcpid&#39;, &#39;&#39;]);">新浪微博</a></dd>

<dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank" data-stat-id="78fdefa9dee561b5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-78fdefa9dee561b5&#39;, &#39;http://xiaoqu.qq.com/mobile/share/index.htmlurl=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米部落</a></dd>

<dd><a rel="nofollow" href="http://order.mi.com/portal?r=84028.1491833290#J_modalWeixin" data-toggle="modal" data-stat-id="47539f6570f0da90" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-47539f6570f0da90&#39;, &#39;#J_modalWeixin&#39;, &#39;pcpid&#39;, &#39;&#39;]);">官方微信</a></dd>

</dl>

<dl class="col-links ">
<dt>特色服务</dt>

<dd><a rel="nofollow" href="http://order.mi.com/queue/f2code" target="_blank" data-stat-id="fdc16dd51892a164" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-fdc16dd51892a164&#39;, &#39;//order.mi.com/queue/f2code&#39;, &#39;pcpid&#39;, &#39;&#39;]);">F 码通道</a></dd>

<dd><a rel="nofollow" href="http://www.mi.com/giftcode/" target="_blank" data-stat-id="835607e3820935bb" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-835607e3820935bb&#39;, &#39;//www.mi.com/giftcode/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">礼物码</a></dd>

<dd><a rel="nofollow" href="http://order.mi.com/misc/checkitem" target="_blank" data-stat-id="b08be6bd51351e1a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-b08be6bd51351e1a&#39;, &#39;//order.mi.com/misc/checkitem&#39;, &#39;pcpid&#39;, &#39;&#39;]);">防伪查询</a></dd>

</dl>

<div class="col-contact">
<p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">1月27日至2月2日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a rel="nofollow" class="btn btn-line-primary btn-small" href="http://www.mi.com/service/contact" target="_blank" data-stat-id="a7642f0a3475d686" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-a7642f0a3475d686&#39;, &#39;//www.mi.com/service/contact&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i> 24小时在线客服</a>            </div>
</div>
</div>
</div>
<div class="site-info">
<div class="container">
<div class="logo ir">小米官网</div>
<div class="info-text">
<p>小米旗下网站：<a href="http://www.mi.com/index.html" target="_blank" data-stat-id="b9017a4e9e9eefe3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-b9017a4e9e9eefe3&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米商城</a><span class="sep">|</span><a href="http://www.miui.com/" target="_blank" data-stat-id="ed2a0e25c8b0ca2f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-ed2a0e25c8b0ca2f&#39;, &#39;http://www.miui.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">MIUI</a><span class="sep">|</span><a href="http://www.miliao.com/" target="_blank" data-stat-id="826b32c1478a98d5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-826b32c1478a98d5&#39;, &#39;http://www.miliao.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">米聊</a><span class="sep">|</span><a href="http://www.duokan.com/" target="_blank" data-stat-id="c9d2af1ad828a834" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-c9d2af1ad828a834&#39;, &#39;http://www.duokan.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">多看书城</a><span class="sep">|</span><a href="http://www.miwifi.com/" target="_blank" data-stat-id="96f1a8cecc909af2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-96f1a8cecc909af2&#39;, &#39;http://www.miwifi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米路由器</a><span class="sep">|</span><a href="http://call.mi.com/" target="_blank" data-stat-id="347f6dd0d8d9fda3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-347f6dd0d8d9fda3&#39;, &#39;http://call.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">视频电话</a><span class="sep">|</span><a href="http://xiaomi.tmall.com/" target="_blank" data-stat-id="dfe0fac59cfb15d9" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-dfe0fac59cfb15d9&#39;, &#39;http://xiaomi.tmall.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米天猫店</a><span class="sep">|</span><a href="http://shop115048570.taobao.com/" target="_blank" data-stat-id="c2613d0d3b77ddff" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-c2613d0d3b77ddff&#39;, &#39;http://shop115048570.taobao.com&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米淘宝直营店</a><span class="sep">|</span><a href="http://union.mi.com/" target="_blank" data-stat-id="2f48f953961c637d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-2f48f953961c637d&#39;, &#39;http://union.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米网盟</a><span class="sep">|</span><a href="http://www.mi.com/mimobile/" target="_blank" data-stat-id="f7ea7880c49b687e" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-f7ea7880c49b687e&#39;, &#39;//www.mi.com/mimobile/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米移动</a><span class="sep">|</span><a href="http://www.miui.com/res/doc/privacy/cn.html" target="_blank" data-stat-id="c7ef95929d60f3f1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-c7ef95929d60f3f1&#39;, &#39;http://www.miui.com/res/doc/privacy/cn.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">隐私政策</a><span class="sep">|</span><a href="http://order.mi.com/portal?r=84028.1491833290#J_modal-globalSites" data-toggle="modal" target="_blank" data-stat-id="9db137a8e0d5b3dd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-9db137a8e0d5b3dd&#39;, &#39;#J_modal-globalSites&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Select Region</a>            </p>
<p>©<a href="http://www.mi.com/" target="_blank" title="mi.com" data-stat-id="836cacd9ca5b75dd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-836cacd9ca5b75dd&#39;, &#39;//www.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">mi.com</a> 京ICP证110507号 <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow" data-stat-id="f96685804376361a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-f96685804376361a&#39;, &#39;http://www.miitbeian.gov.cn/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京ICP备10046444号</a> <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank" data-stat-id="57efc92272d4336b" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-57efc92272d4336b&#39;, &#39;http://www.beian.gov.cn/portal/registerSystemInforecordcode=11010802020134&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京公网安备11010802020134号 </a><a rel="nofollow" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank" data-stat-id="c5f81675b79eb130" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-c5f81675b79eb130&#39;, &#39;//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京网文[2014]0059-0009号</a>

<br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
</div>
<div class="info-links">
<a href="http://privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn" target="_blank" data-stat-id="de920be99941f792" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-de920be99941f792&#39;, &#39;//privacy.truste.com/privacy-seal/validationrid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="./uinfo_files/truste.png" alt="TRUSTe Privacy Certification"></a>
<a href="http://search.szfw.org/cert/l/CX20120926001783002010" target="_blank" data-stat-id="d44905018f8d7096" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-d44905018f8d7096&#39;, &#39;//search.szfw.org/cert/l/CX20120926001783002010&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="./uinfo_files/v-logo-2.png" alt="诚信网站"></a>
<a href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082" target="_blank" data-stat-id="3e1533699f264eac" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-3e1533699f264eac&#39;, &#39;https://ss.knet.cn/verifyseal.dllsn=e12033011010015771301369&amp;ct=df&amp;pa=461082&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="./uinfo_files/v-logo-1.png" alt="可信网站"></a>
<a href="http://www.315online.com.cn/member/315140007.html" target="_blank" data-stat-id="b085e50c7ec83104" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-b085e50c7ec83104&#39;, &#39;http://www.315online.com.cn/member/315140007.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="./uinfo_files/v-logo-3.png" alt="网上交易保障中心"></a>

</div>
</div>
<div class="slogan ir">探索黑科技，小米为发烧而生</div></div>

<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
<div class="modal-hd">
<a class="close" data-dismiss="modal" data-stat-id="cfd3189b8a874ba4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-cfd3189b8a874ba4&#39;, &#39;&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i></a>
<span class="title">小米手机官方微信二维码</span>
</div>
<div class="modal-bd">
<img alt="" src="./uinfo_files/site-weixin.png" width="680" height="340">
</div>
</div>
.modal-weixin END
<div class="modal modal-hide modal-bigtap-queue" id="J_bigtapQueue">
<div class="modal-body">
<span class="close" data-dismiss="modal" aria-hidden="true">退出排队</span>
<div class="con">
<div class="title">正在排队，请稍候喔！</div>
<div class="queue-tip-box">
<p class="queue-tip">当前人数较多，请您耐心等待，排队期间请不要关闭页面。</p>
<p class="queue-tip">时常来官网看看，最新产品和活动信息都会在这里发布。</p>
<p class="queue-tip">下载小米商城 App 玩玩吧！产品开售信息抢先知道。</p>
<p class="queue-tip">发现了让你眼前一亮的小米产品，别忘了分享给朋友！</p>
<p class="queue-tip">产品开售前会有预售信息，关注官网首页就不会错过。</p>
</div>
</div>

<div class="queue-posters">
<div class="poster poster-3"></div>
<div class="poster poster-2"></div>
<div class="poster poster-1"></div>
<div class="poster poster-4"></div>
<div class="poster poster-5"></div>
</div>
</div>
</div>
.xm-dm-queue END
<div id="J_bigtapError" class="modal modal-hide modal-bigtap-error">
<span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont"></i></span>
<div class="modal-body">
<h3>抱歉，网络拥堵无法连接服务器</h3>
<p class="error-tip">由于访问人数太多导致服务器压力山大，请您稍后再重试。</p>
<p>
<a class="btn btn-primary" id="J_bigtapRetry" data-stat-id="c148a4197491d5bd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-c148a4197491d5bd&#39;, &#39;&#39;, &#39;pcpid&#39;, &#39;&#39;]);">重试</a>
</p>
</div>
</div>


<div id="J_bigtapModeBox" class="modal fade modal-hide modal-bigtap-mode">
<span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
<div class="modal-body">
<h3 class="title">为防黄牛，请您输入下面的验证码</h3>
<p class="desc">在防黄牛的路上，我们一直在努力，也知道做的还不够。<br>
所以，这次劳烦您多输一次验证码，我们一起防黄牛。</p>
<div class="mode-loading" id="J_bigtapModeLoading">
<img src="./uinfo_files/loading.gif" alt="" width="32" height="32">
<a id="J_bigtapModeReload" class="reload  hide" href="javascript:void(0);" data-stat-id="ce9e5bb5b994ad55" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-ce9e5bb5b994ad55&#39;, &#39;javascript:void0&#39;, &#39;pcpid&#39;, &#39;&#39;]);">网络错误，点击重新获取验证码！</a>
</div>
<div class="mode-action hide" id="J_bigtapModeAction">
<div class="mode-con" id="J_bigtapModeContent"></div>
<input type="text" name="bigtapmode" class="input-text" id="J_bigtapModeInput" placeholder="请输入正确的验证码">
<p class="tip" id="J_bigtapModeTip"></p>
<a class="btn  btn-gray" id="J_bigtapModeSubmit" data-stat-id="7f083d6abed714f8" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-7f083d6abed714f8&#39;, &#39;&#39;, &#39;pcpid&#39;, &#39;&#39;]);">确认</a>
</div>
</div>
</div>

<div id="J_bigtapSoldout" class="modal fade modal-hide modal-bigtap-soldout modal-bigtap-soldout-norec">
<span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
<div class="modal-body ">
<div class="content clearfix">
<span class="mitu"></span>
<p class="title">很抱歉，人真是太多了<br>您晚了一步...</p>
</div>

<div class="bigtap-recomment-goods">
<div class="hd"><span>这些产品也不错，而且有现货哦！</span></div>
<ul class="clearfix" id="J_bigtapRecommentList"></ul>
</div>
</div>
</div>
.xm-dm-error END
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
<div class="modal-hd">
<a class="close" data-dismiss="modal" data-stat-id="d63900908fde14b1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-d63900908fde14b1&#39;, &#39;&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i></a>
<span class="title">Select Region</span>
</div>
<div class="modal-bd">
<h3>Welcome to Mi.com</h3>
<p class="modal-globalSites-tips">Please select your country or region</p>
<p class="modal-globalSites-links clearfix">
<a href="http://www.mi.com/index.html" data-stat-id="51fe807618ae85f4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-51fe807618ae85f4&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Mainland China</a>
<a href="http://www.mi.com/hk/" data-stat-id="d8e4264197de1747" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-d8e4264197de1747&#39;, &#39;http://www.mi.com/hk/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Hong Kong</a>
<a href="http://www.mi.com/tw/" data-stat-id="8b54359fb6116e28" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-8b54359fb6116e28&#39;, &#39;http://www.mi.com/tw/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Taiwan</a>
<a href="http://www.mi.com/sg/" data-stat-id="e9c0506f7e4e7161" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-e9c0506f7e4e7161&#39;, &#39;http://www.mi.com/sg/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Singapore</a>
<a href="http://www.mi.com/my/" data-stat-id="d6299ad30ec761a8" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-d6299ad30ec761a8&#39;, &#39;http://www.mi.com/my/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Malaysia</a>
<a href="http://www.mi.com/ph/" data-stat-id="22b601cf7b3ada84" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-22b601cf7b3ada84&#39;, &#39;http://www.mi.com/ph/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Philippines</a>
<a href="http://www.mi.com/in/" data-stat-id="441d26d4571e10dc" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-441d26d4571e10dc&#39;, &#39;http://www.mi.com/in/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">India</a>
<a href="http://www.mi.com/id/" data-stat-id="88ccf9755c488ec5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-88ccf9755c488ec5&#39;, &#39;http://www.mi.com/id/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Indonesia</a>
<a href="http://br.mi.com/" data-stat-id="c41d871bf5ddcd95" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-c41d871bf5ddcd95&#39;, &#39;http://br.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Brasil</a>
<a href="http://www.mi.com/en/" data-stat-id="4426c5dac474df5f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-4426c5dac474df5f&#39;, &#39;http://www.mi.com/en/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Global Home</a>
<a href="http://www.mi.com/mena/" data-stat-id="261bb8cf155fb56b" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-261bb8cf155fb56b&#39;, &#39;http://www.mi.com/mena/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">MENA</a>
<a href="http://www.mi.com/pl/" data-stat-id="2e3007e460f40ce3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-2e3007e460f40ce3&#39;, &#39;http://www.mi.com/pl/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Poland</a>
<a href="http://www.mi.com/ua/" data-stat-id="de8d49aabd1eecdd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-de8d49aabd1eecdd&#39;, &#39;http://www.mi.com/ua/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Ukraine</a>
<a href="http://www.mi.com/ru/" data-stat-id="886bf2568681dd6b" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-886bf2568681dd6b&#39;, &#39;http://www.mi.com/ru/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Russia</a>
<a href="http://www.mi.com/vn/" data-stat-id="b859ec9bcac672f1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;45a270e10b1f8e93-b859ec9bcac672f1&#39;, &#39;http://www.mi.com/vn/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Vietnam</a>
</p>
</div>
</div>
.modal-globalSites END-->
<!-- <script type="text/javascript" src="{{ url('/Home/js/xmst.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ url('/Home/js/base.min.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ url('/Home/js/user.min.js') }}"></script> -->
<script>
/*(function() {
MI.namespace('GLOBAL_CONFIG');
MI.GLOBAL_CONFIG = {
orderSite: 'http://order.mi.com',
wwwSite: '//www.mi.com',
cartSite: '//cart.mi.com',
itemSite: '//item.mi.com',
urlsSite: '//s01.mifile.cn',
listSite: '//list.mi.com',
searchSite: '//search.mi.com',
mySite: '//my.mi.com',
damiaoSite: 'http://tp.hd.mi.com/',
damiaoGoodsId:[],
logoutUrl: 'http://order.mi.com/site/logout',
staticSite: '//static.mi.com',
quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
};
MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
MI.miniCart.init();
MI.updateMiniCart();
})();*/
</script>

 

<script>
    $('#banner_menu_wrap').css('display','none');
    $('#fid').mouseover(function(){
        $('#banner_menu_wrap').css('display','block');
    }).mouseout(function(){
        $('#banner_menu_wrap').css('display','none');
    });
    $('#banner_menu_wrap').mouseover(function(){
        $('#banner_menu_wrap').css('display','block');
    }).mouseout(function(){
        $('#banner_menu_wrap').css('display','none');
    });
    $('#banner_menu_wrap').css('background','39,40,34,0.1');
</script>
<div class="modal-backdrop fade in" style="width: 100%; height: 1935px;display:none;"></div>
@endsection