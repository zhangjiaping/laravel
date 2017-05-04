@extends('Home.parent')
@section('content')

<!-- 鼠标移入事件 -->
<script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
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


<title>小米列表页</title>
<link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{('/Home/css/base.min.css')}}">
<!-- 新引入 -->
<link rel="stylesheet" type="text/css" href="{{ ('/Home/js/jquery.animate-colors-min.js') }}">
<link rel="stylesheet" type="text/css" href="{{ ('/Home/js/jquery-2.1.4.min.js') }}">
<link rel="stylesheet" type="text/css" href="{{ ('/Home/js/xiaomi.js') }}">
<link rel="stylesheet" type="text/css" href="{{ ('/Home/js/jquery-1.8.3.min.js') }}">
<!-- CSS样式 -->
<link rel="stylesheet" type="text/css" href="{{ ('/Home/css/xiaomi.css') }}">

<link rel="stylesheet" href="{{('/Home/css/list.min.css')}}">

<style type="text/css">
    #banner_menu_wrap{
        display:none;
        margin-left:65px;
    }
     #big_banner_wrap{
        width:100%;
    }
</style>

<!-- {{ var_dump($list) }} -->
<!-- 首页>全部结果>小米5s plus -->
<div class="breadcrumbs"  >
    <div class="container">
        <a href="http://www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push([&#39;trackEvent&#39;, &#39;afb7d21cf0538ec0-b0bcd814768c68cc&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">首页</a><span class="sep">&gt;</span><a href="http://search.mi.com/search_%E5%B0%8F%E7%B1%B35s%C2%A0plus" data-stat-id="dba2041049056d8a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;afb7d21cf0538ec0-dba2041049056d8a&#39;, &#39;//search.mi.com/search_小米5splus&#39;, &#39;pcpid&#39;, &#39;&#39;]);">全部结果</a><span class="sep">&gt;</span><span>小米5s&nbsp;plus</span>    </div>
</div>
<!-- 首页>全部结果>小米5s plus -->
<div class="container">
    <div class="filter-box">
                <div class="filter-list-wrap">
                    <dl class="filter-list clearfix">
                        <dt style="color:red">分类：</dt>
                        <div style="height:8px"></div>
                         @foreach($type as $k)
                        <span style="margin-left:10px;font-size:15px;"><a href="/home/liebiao/{{$k->id}}">
                            {{ $k->name }}</a>
                        </span>
                    @endforeach
                </div>
           
            </div>
        </div>
     




<div class="content">
    <div class="container" >
        <div class="order-list-box clearfix">
            <ul class="order-list">
                @if($fid>0)
                <li class="active first"><a href="/home/liebiao/{{$fid}}">推荐</a></li>
                <li><a href="/home/xinpin/{{ $fid }}"  >销量</a></li>
                <li class="up"><a  href="/home/jiage/{{ $fid }}">价格 <i class="iconfont"></i></a></li>
                @else
                <li class="active first"><a href="/home/liebiao/{{$name}}">推荐</a></li>
                <li><a href="/home/xinpin/{{ $name }}"  >销量</a></li>
                <li class="up"><a  href="/home/jiage/{{ $name }}">价格 <i class="iconfont"></i></a></li>
            @endif
            </ul>
        </div>

                <div class="goods-list-box">
            <div class="goods-list clearfix">
                <!-- 重要 -->
                   <!-- 这里需要遍历的地方      -->
                   @foreach($list as $v)
                            <div class="goods-item">
                                <div class="figure figure-img">
                                    <a href="http://www.mi.com/mi5splus/?cfrom=search" data-stat-id="07803b8761f19991" onclick="_msq.push([&#39;trackEvent&#39;, &#39;afb7d21cf0538ec0-07803b8761f19991&#39;, &#39;//www.mi.com/mi5splus/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">
                                        <a href="/home/xiangqing/{{$v->id}}"><img src="{{ url('/Admin/upload').'/'.$v->pic }}" width="200" height="200" alt=""></a>
                                    </a>

                                </div>
                                <!-- 商品的介绍body -->
                                <p class="desc">{{ $v->title }}</p>                    
                                    <h2 class="title"><a href="/home/xiangqing/{{$v->id}}">{{ $v->name }}</a>
                                        <!--商品的名称!-->
                                    </h2>
                                    <!-- 商品的价格 -->
                                     <p class="price">{{ $v->price }}元</p>
                                 <div class="thumbs">
                                    <ul class="thumb-list">
                                      <li data-config="{&quot;cid&quot;:&quot;1163900062&quot;,&quot;gid&quot;:&quot;0&quot;,&quot;discount&quot;:&quot;0&quot;,&quot;price&quot;:&quot;2299\u5143 \u8d77&quot;,&quot;new&quot;:0,&quot;is-cos&quot;:1,&quot;package&quot;:1,&quot;hasgift&quot;:0,&quot;postfree&quot;:0,&quot;postfreenum&quot;:1,&quot;cfrom&quot;:&quot;search&quot;}">
                                        <a data-stat-id="efb530fe034a2407" onclick="_msq.push([&#39;trackEvent&#39;, &#39;afb7d21cf0538ec0-efb530fe034a2407&#39;, &#39;&#39;, &#39;pcpid&#39;, &#39;&#39;]);">
                                            <img src="{{ url('/Admin/upload').'/'.$v->pic }}" width="34" height="34" alt="小米5s Plus 银色"></a>
                                        </li>                       
                                     </ul>
                                 </div>
                                      <div class="actions clearfix">
                                         <a class="btn-like J_likeGoods" data-cid="1163900062" href="javascript: void(0);" data-stat-id="ff751b1fdf797192">
                                            <i class="iconfont"></i> 
                                                <span class="love">喜欢</span>
                                                <span style="display:none">{{ $v->id }}</span>
                                                @if(session()->has('user'))
                                                <div style="display:none">{{ session('user')->id }}</div>
                                                @endif
                                            </a>
                                                 <a class="btn-buy btn-buy-detail J_buyGoods" href="http://www.mi.com/mi5splus/?cfrom=search" data-stat-id="68ebd96f8a6bee5a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;afb7d21cf0538ec0-68ebd96f8a6bee5a&#39;, &#39;//www.mi.com/mi5splus/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">
                                                    <span>立即购买</span> 
                                                    <i class="iconfont"></i>
                                                </a>                   
                                         </div>
                                                      <div class="flags">
                                                      </div>
                                          <div class="notice"></div>
                                 </div>
                                  @endforeach

                   <!-- 这里需要遍历的地方 -->

                            </div>
                    </div>
            </div>
            
            <!-- 在这里写轮播图 -->

  <style type="text/css">
            img,div,ul,li{
                margin:0px;
                padding:0px;
            }
            #dida .did{
                float:left;
            }
            .cid{
                width:230px;
                height:60px;
            }
            .cid ul{
                height:60px;
                list-style: none;
                font-size: 15px;
            }
        
        </style>
    <script type="text/javascript" src='/home/js/jquery-1.8.3.min.js'></script>
    <script type="text/javascript">
        $(function(){

                setInterval(function(){
                    //获取最后一张图片，让他的宽度变为0px，把他插入到div的前面，用动画的效果把宽度变成267px
                    $("#dida .did:last").css('width','0px').prependTo('#dida').animate({width:'230px'},1000);
                },2000);
            //  $(".did").live(function(){
            //     $(this).css('margin-left',10)
            // });
        });
    </script>
        <div id="head_hot_goods_wrap" style="margin-top:200px;">
                    <div class="xm-recommend-title">
                        <span>为您推荐</span>
                    </div>
                <div id='lun' style='width:1230px;height:310px;border:1px solid #E0E0E0;overflow:hidden;'>      
                    <div id='dida' style='width:2900px;'>
                            @foreach($goods as $h)
                                @if($h->controller==2)
                                 <div class='did' style="align:center;margin-left:14px;">
                                    <a href="/home/xiangqing/{{$h->id}}">
                                        <img style="height:235px;width:228px;align:center;" src="{{url('/Admin/upload').'/'.$h->pic }}"  >
                                    </a>
                                    <div class='cid'>
                                        <ul style="margin-left:50px;">
                                            <li><a href="/home/xiangqing/{{$h->id}}">{{ $h->name }}</a></li>
                                            <li>{{ $h->price }} 元</li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endforeach 
                            </div>  
                         </div>  
                </div>
        </div>
        <!-- 收藏jq -->
    @if(session()->has('user'))
          <script type="text/javascript">
            $('.love').toggle(function(){
            $(this).parent('.J_likeGoods').addClass('btn-liked');
            var uid = $(this).siblings('div').html();
            var gid = $(this).siblings('span').html();
            var aa = $(this);
            $.ajax({
                    url:"{{ url('home/addlove') }}",
                    type:'get',
                    async:true,
                    data:{uid:uid,gid:gid},
                    dataType:'json',
                    success:function(data)
                    {
                       aa.html('已喜欢');
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            },function(){
            $(this).parent('.J_likeGoods').removeClass('btn-liked');
            var uid = $(this).siblings('div').html();
            var gid = $(this).siblings('span').html();
            var aa = $(this);
            $.ajax({
                    url:"{{ url('home/removelove') }}",
                    type:'get',
                    async:true,
                    data:{uid:uid,gid:gid},
                    dataType:'json',
                    success:function(data)
                    {
                       aa.html('喜欢');
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            });
          </script>  
    @else
    <script type="text/javascript">
            $('.love').click(function(){
                alert('请登录');
            });
        </script>      
    @endif    
@endsection

          