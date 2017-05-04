<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8" name="keywords" content="{{ $con->keys }}">
    <title>{{$con->title}}</title>
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
                 <a class="head_nav_a">米网</a>
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
                 <a class="head_nav_a">米移动版</a>
                 <span>|</span>
                 <a class="head_nav_a" href="/home/feedback">问题反馈</a>
                 <span>|</span>
                 <a class="head_nav_a" id="Select_Region_but" href="{{ url('/admin/admin') }}">admin login</a>
             </div>
             
             <div id="head_right">
                @if(!empty(session('user')->username))
                 <div id="head_landing">
                            <a href="">用户名：{{ session('user')->username }}</a>
                            <span>|</span>
                            <a href="/home/tuichu">退出登录</a>
                     <span>|</span>
                     <a class="head_nav_a" href="{{ url('home/userinfo') }}">个人中心</a>
                     <span>|</span>
                     <a class="head_nav_a" href="{{ url('home/userinfo/5') }}">我的订单</a>
                 </div>
                 @else
                  <div id="head_landing">
                     <a class="head_nav_a" href="/home/login">登陆</a>
                     <span>|</span>
                     <a class="head_nav_a" href="/home/dologin">注册</a>
                 </div>
                 @endif
                 <div id="head_car">
                     <a class="head_car_text" href="{{ url('home/carts') }}">购物车</a>
                 </div>
             </div>

         </div>
     </div>

     <div id="main_head_box">
         <div id="menu_wrap">
             <div id="menu_logo" style="margin-right:100px;">
                 <a href="{{ url('home/home') }}"><img width="51px" height="52px" src="{{url('/Admin/upload').'/'.$con->logo }}"></a>
             </div>
             <div style="float:left;height:100px;line-height:100px;" id='fid'>全部商品分类</div>
             <div id="menu_nav" style="margin-left:50px;">
                 <ul>
                     <li class="menu_li" control="xiaomiphone">大米手机</li>
                     <li class="menu_li" control="hongmiphone">红米</li>
                     <li class="menu_li" control="pingban">平板</li>
                     <li class="menu_li" control="tv">电视&nbsp;&nbsp;盒子</li>
                     <li class="menu_li" control="luyou">路由器</li>
                     <li class="menu_li" control="yingjian">智能硬件</li>
                     <li><a>服务</a></li>
                     <li><a>社区</a></li>
                 </ul>
             </div>
             <div id="find_wrap">
                    <form action="{{ url('/home/liebiao/0') }}" method="get">
                     <div id="find_bar" style="clear:both">
                         <input class="search-text" type="search" id="find_input" name="name" placeholder="         输入你要找的商品" style="padding-left:20px">
                     </div>
                     <input type="submit" id="find_but" value="GO" style="background:#ffffff;">
                 </form>
             </div>
         </div>
     </div>
     <div id="menu_content_bg" style="height: 0px;">
         <div id="menu_content_wrap">
             <ul style="top: 0px;">
                 <li id="xiaomiphone" id='uid'>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mi4!160x110.jpg') }}">
                         <p class="menu_content_tit">大米手机4</p>
                         <p class="menu_content_price">1499元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/minote!160x110.jpg') }}">
                         <p class="menu_content_tit">大米NOTE标准版</p>
                         <p class="menu_content_price">1999元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/minotepro!160x110.jpg') }}">
                         <p class="menu_content_tit">大米NOTE顶配版</p>
                         <p class="menu_content_price">2999元起</p>
                     </div>
                 </li>
                 <li id="hongmiphone">
                     <div class="menu_content">
                         <img src="{{ url('Home/img/hongmi2a!160x110.jpg') }}">
                         <p class="menu_content_tit">红米手机2A</p>
                         <p class="menu_content_price">499元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/hongmi2!160x110.jpg') }}">
                         <p class="menu_content_tit">红米手机2</p>
                         <p class="menu_content_price">599元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/note!160x110.jpg') }}">
                         <p class="menu_content_tit">红米NOTE</p>
                         <p class="menu_content_price">699元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/note2!160x110.jpg') }}">
                         <p class="menu_content_tit">红米NOTE2</p>
                         <p class="menu_content_price">799元</p>
                     </div>
                 </li>
                 <li id="pingban">
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mipad16!160x110.jpg') }}">
                         <p class="menu_content_tit">大米平板16G</p>
                         <p class="menu_content_price">1299元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mipad64!160x110.jpg') }}">
                         <p class="menu_content_tit">大米平板64G</p>
                         <p class="menu_content_price">1499元起</p>
                     </div>
                 </li>
                 <li id="tv">
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mitv40!160x110.jpg') }}">
                         <p class="menu_content_tit">大米电视2&nbsp;40英寸</p>
                         <p class="menu_content_price">1999元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mitv48!160x110.jpg') }}">
                         <p class="menu_content_tit">大米电视2S&nbsp;48英寸</p>
                         <p class="menu_content_price">2999元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mitv49!160x110.jpg') }}">
                         <p class="menu_content_tit">大米电视2&nbsp;49英寸</p>
                         <p class="menu_content_price">3399元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/mitv55!160x110.jpg') }}">
                         <p class="menu_content_tit">大米电视2&nbsp;55英寸</p>
                         <p class="menu_content_price">4499元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/hezimini!160x110.jpg') }}">
                         <p class="menu_content_tit">大米盒子MINI版</p>
                         <p class="menu_content_price">199元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/hezis!160x110.jpg') }}">
                         <p class="menu_content_tit">大米盒子增强版</p>
                         <p class="menu_content_price">299元</p>
                     </div>
                 </li>
                 <li id="luyou">
                     <div class="menu_content">
                         <img src="{{ url('Home/img/miwifi!160x110.jpg') }}">
                         <p class="menu_content_tit">全新大米路由器</p>
                         <p class="menu_content_price">699元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/miwifimini!160x110.jpg') }}">
                         <p class="menu_content_tit">大米路由器&nbsp;MINI</p>
                         <p class="menu_content_price">129元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/miwifilite!160x110.jpg') }}">
                         <p class="menu_content_tit">大米路由器&nbsp;青春版</p>
                         <p class="menu_content_price">79元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/wifiExtension!160x110.jpg') }}">
                         <p class="menu_content_tit">大米WIFI放大器</p>
                         <p class="menu_content_price">39元</p>
                     </div>
                 </li>
                 <li id="yingjian">
                     <div class="menu_content">
                         <img src="{{ url('Home/img/xiaoyi!160x110.jpg') }}">
                         <p class="menu_content_tit">摄像头</p>
                         <p class="menu_content_price">129元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/yicamera!160x110.jpg') }}">
                         <p class="menu_content_tit">运动相机</p>
                         <p class="menu_content_price">399元起</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/ihealth!160x110.jpg') }}">
                         <p class="menu_content_tit">血压计</p>
                         <p class="menu_content_price">199元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/chazuo!160x110.jpg') }}">
                         <p class="menu_content_tit">智能插座</p>
                         <p class="menu_content_price">59元</p>
                     </div>
                     <span class="menu_content_line"></span>
                     <div class="menu_content">
                         <img src="{{ url('Home/img/smart!160x110.jpg') }}">
                         <p class="menu_content_tit">查看全部
                             <br>智能硬件</p>
                     </div>
                 </li>
             </ul>
         </div>
     </div>


     <div id="big_banner_wrap" >
        <!-- 这里有东西先注释 -->
         <ul id="banner_menu_wrap" style="margin-top:1px;">
            @foreach($type as $t)
             <li id="aa" class="active">
                <!-- 这里是点的地方 -->
                 <a  href = "{{ url('/home/liebiao').'/'.$t->id }}" >{{ $t->name }}</a>
                 <a class="banner_menu_i">&gt;</a>
                 <!-- 这里是需要往上走的地方 -->
                 <div class="banner_menu_content" style="width: 600px; top: -20px;overflow:hidden;" id="did">
                     <ul class="banner_menu_content_ul" style="width: 600px;">
                        @foreach($goods as $g)
                            @if($t->id == $g->type)
                             <li>
                                 <a><img src="{{ url('Admin/upload'.'/'.$g->pic) }}" width="40" height="40"></a><a>{{ $g->name }}</a><a href = "{{ url('home/xiangqing').'/'.$g->id }}" style="float:right"><span>选购</span></a>
                             </li>
                            @endif 
                        @endforeach
                     </ul>
                 </div>
             </li>
             @endforeach
             <script type="text/javascript">
                var did = $('#did');
                var w = 0;
                var j = 0;
                $('#banner_menu_wrap>li').each(function(){
                    w = -(j*63+20)+'px';
                    $(this).children(2).css("top",w);
                    j++;
                });
             </script>
         </ul>


     <section id="content">
                @yield('content')
            </section>


    
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
                            <h>|</h>
                            @foreach($links as $link)
                             <a href="http://{{ $link->url }}">{{ $link->name }}</a><h>|</h>
                            @endforeach
                        </span>
                 </div>

             </div>
         </div>
     </div>

<script type="text/javascript" src="{{ url('Home/js/xiaomi.js') }}"></script>

</body>
</html>
<script type="text/javascript">
    $('#uid').mouseover(function(){
        $('#uid').css('display','block');
    }).mouseout(function(){
        $('#uid').css('display','none');
    });
</script>
