@extends('Home.parent')
@section('content')
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>个人中心</title>
<meta name="viewport" content="width=1226">
<meta name="description" content="">
<meta name="keywords" content="小米商城">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="icon" href="http:" type="image/x-icon">
<link rel="stylesheet" href="{{ url('Home/uinfo_files/base.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('Home/uinfo_files/main.min.css') }}">
<script src="{{ url('Home/js/jquery-1.8.3.min.js') }}"></script>
<style>@font-face{font-family:uc-nexus-iconfont;src:url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.woff) format('woff'),url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.ttf) format('truetype')}</style>
<style type="text/css">
    #banner_menu_wrap{
        display:none;
        margin-left:65px;
    }
     #big_banner_wrap{
        width:100%;
    }
</style>
<div class="breadcrumbs" >
    <div class="container" >
        <a href="">首页</a><span class="sep">&gt;</span><span>个人中心</span>    
    </div>
</div> 
<div class="page-main user-main" style='padding-top:0px;'>
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="uc-box uc-sub-box">
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li class='model'><a href="{{ url('home/userinfo/5')}}">我的订单</a>
                                </li>
                                <li class='model'><a href="javascript:show(2)">评价晒单</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li class='model active'><a href="{{ url('home/userinfo') }}" >我的个人中心</a>
                                </li>
                                <li class='model'><a href="{{ url('home/xiaoxi') }}" >消息通知<i class="J_miInviteTotal"></i></a>
                                </li>
                                <li class='model'><a href="{{ url('home/lovelist').'/'.session('user')->id }}" >喜欢的商品</a>
                                </li>
                                <li class='model'><a href="{{ url('home/userinfo/create') }}" >收货地址</a>
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
            <script type="text/javascript">
                $('.model').click(function(){
                    $('.model').parentsUntil('.uc-nav-box').find('.uc-nav-list li').removeClass('active');
                    $(this).addClass('active');
                });
            </script>
            <div class="span16">
                @yield('address')
            </div>         
        </div>
    </div>
</div>
<script type="text/javascript">
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
<script type="text/javascript" async="" src="{{ url('Home/uinfo_files/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('Home/uinfo_files/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('Home/uinfo_files/xmst.js') }}"></script>
<script src="{{ url('Home/uinfo_files/base.min.js') }}"></script>
@endsection