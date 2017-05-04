<!doctype html>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> -->
<meta charset="UTF-8" />
<title>我的购物车-小米商城</title>
<meta name="viewport" content="width=1226" />
<!-- <link rel="shortcut icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon" /> -->
<!-- <link rel="icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon" /> -->
<link rel="stylesheet" href="{{ url('/Home/cart/css/cart.css?v2017a15') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/Home/cart/css/cart.min.css?39656a') }}" />
<script type="text/javascript">//var _head_over_time = (new Date()).getTime();</script>
<script type="text/javascript" src="{{ url('/Home/cart/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript"></script>
<style type="text/css">
    .cart-empty{ height:273px;padding-left:558px;margin:65px 0 130px;background:url("../cart/images/cart-empty.png");color:#b0b0b0;overflow:hidden; }
</style>
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
           <a class="logo ir" href='/' title="小米官网" >小米官网</a>
       </div>
        <div class="header-title" id="J_miniHeaderTitle"></div>
        @if(!empty(session('user')))
        <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a rel="nofollow" class="user-name" href="" target="_blank">
                    <span class="name">{{ session('user')->username }}</span>
                </a>
                <ul class="user-menu" style="display: none;">
                    <li><a rel="nofollow" href="{{ url('home/userinfo')}}">个人中心</a></li>
                    <li><a rel="nofollow" href="" target="_blank">评价晒单</a></li>
                    <li><a rel="nofollow" href="{{ url('home/lovelist').'/'.session('user')->id }}" target="_blank" >我的喜欢</a></li>
                    <li><a rel="nofollow" href="{{ url('home/tuichu') }}">退出登录</a></li>
                </ul>
            </span>
            <span class="sep">|</span><a rel="nofollow" class="link link-order" href="{{ url('home/userinfo/5')}}">我的订单</a>
        </div>
        @else
        <div class="topbar-info" id="J_userInfo">
            <a class="link" href="{{ url('home/login') }}" data-needlogin="true">登录</a><span class="sep">|</span><a class="link" href="{{ url('home/dologin') }}" >注册</a>        
        </div>
        @endif
    </div>
</div>
<script type="text/javascript">
    $('#J_userInfo .user').hover(function(){
        $('.user').addClass('user-active');
        $('.user-menu').css('display','block');
    },function(){
        $('.user').removeClass('user-active');
        $('.user-menu').css('display','none');
    });
</script>
<div class="page-main">
    <div class="container">
    @if(!empty(session('user')))
        @if(count($list)<1)
        <img src="{{ url('Home/cart/images/cart-empty.png') }}" alt="" style='margin: 65px 0 130px 125px;'>
        <div class="cart-empty" id="J_cartEmpty"  style='margin-top:-400px;'>
            <h2>您的购物车还是空的！</h2>
            <a href="/" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
        </div>
        @else
        <form action="{{ url('/home/carts') }}" method='post' name='myform'>
            {{ csrf_field() }}
            <div id="J_cartBox" class="">
                <div class="cart-goods-list">
                    <div class="list-head clearfix">
                        <div class="col col-check"><i class="iconfont icon-checkbox " id="J_selectAll" style='margin-right:20px;'>√</i>全选</div>
                        <div class="col col-img">&nbsp;</div>
                        <div class="col col-name">商品名称</div>
                        <div class="col col-price">单价</div>
                        <div class="col col-num">数量</div>
                        <div class="col col-total">小计</div>
                        <div class="col col-action">操作</div>
                    </div>
                    @foreach($list as $v)
                    <!-- 模板 -->
                    <div class="list-body" id="J_cartListBody">   
                        <div class="item-box"> 
                            <div class="item-table J_cartGoods"> 
                                <div class="item-row clearfix"> 
                                    <div class="col col-check">  
                                        <i class="iconfont icon-checkbox J_itemCheckbox" data-itemid="2170500016_0_buy" data-status="1">√</i>
                                        <input type='hidden' name='gid' value="{{ $v->id }}">
                                    </div> 
                                    <div class="col col-img">  
                                        <a href="" target="_blank"> <img alt="" src="{{ url('Admin/upload').'/'.$v->gpic }}" width="80" height="80"> </a>  
                                    </div> 
                                    <div class="col col-name">  
                                        <div class="tags">   </div>  
                                        <h3 class="name">  
                                            <a href="" target="_blank">{{ $v->gname }}</a>  
                                        </h3>   
                                        <p class="desc"> <span>适配机型：</span> 红米4X </p>  
                                    </div> 
                                    <div class="col col-price price" >{{ $v->price }}元</div>
                                    <div class="col col-num gnum">
                                        <div class="change-goods-num clearfix J_changeGoodsNum">
                                            <a href="javascript:cart()" class="minus"><i class="iconfont">-</i></a>
                                            <input tyep="text" name="num" value="1" data-num="2" data-buylimit="10" autocomplete="off" class="goods-num J_goodsNum">
                                            <a href="javascript:cart()" class="plus">
                                                <i class="iconfont" >+</i>
                                            </a> 
                                            <input type='hidden' name='cid' value="{{ $v->id }}">
                                            <div class="msg J_canBuyLimit">还可买<span>{{ $v->stock-1 }}</span>件</div>
                                            <input type='hidden' name='stock' value="{{ $v->gid }}">
                                            <input type='hidden' name='check' value="{{ $v->stock }}">  
                                        </div>  
                                    </div>
                                    <div class="col col-total sum">{{ $v->price }}元</div>
                                    <div class="col col-action"> 
                                        <a id="2170500016_0_buy" data-msg="确定删除吗？" href="javascript:doDel({{ $v->id }});" title="删除" class="del J_delGoods"><i class="iconfont"><b>×</b></i></a> 
                                    </div> 
                                </div> 
                            </div>    
                        </div>         
                    </div>
                    @endforeach   
                    <div class="raise-buy-box" id="J_raiseBuyBox" style='background:#F5F5F5;height:20px;'>      </div>
                    <div class="cart-bar clearfix" id="J_cartBar">
                        <div class="section-left">
                            <a href="" class="back-shopping J_goShoping" data-stat-id="3d1e5bdd191768c8">继续购物</a>
                            <span class="cart-total">共 <i id="J_cartTotalNum">0</i> 件商品，已选择 <i id="J_selTotalNum">0</i> 件</span>
                            <span class="cart-coudan hide" id="J_coudanTip">
                                ，还需 <i id="J_postFreeBalance"></i> 元即可免邮费  <a href="javascript:void(0);" id="J_showCoudan" data-stat-id="69b06f1a9d2d512c" >立即凑单</a>
                            </span>
                        </div>
                        <span class="activity-money hide">
                            活动优惠：减 <i id="J_cartActivityMoney">0</i> 元
                        </span>
                        <span class="total-price">
                            合计（不含运费）：<em id="J_cartTotalPrice">0</em>元
                        </span>
                        <a href="javascript:void(0);" class="btn btn-a btn-disabled" id="J_goCheckout">去结算</a>

                        <div class="no-select-tip" id="J_noSelectTip">
                            请勾选需要结算的商品
                            <i class="arrow arrow-a"></i>
                            <i class="arrow arrow-b"></i>
                        </div>
                    </div>   
                </div> 
            </div>     
            <input type='hidden' name='id[]'>
        </form>
        @endif
    @else
    <img src="{{ url('Home/cart/images/cart-empty.png') }}" alt="" style='margin: 65px 0 130px 125px;'>
    <div class="cart-empty cart-empty-nologin" id="J_cartEmpty" style='margin-top:-400px;'>
        <h2>您的购物车还是空的！</h2>
        <p class="login-desc">登录后将显示您之前加入的商品</p>
        <a href="{{ url('home/login') }}" class="btn btn-primary btn-login" id="J_loginBtn">立即登录</a>
        <a href="/" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
    </div>
    @endif    
        <form action="{{ url('/home/carts') }}" method='post' name='del'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
        <form action="{{ url('/home/carts') }}" method='post' name='add'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        </form>
        <script type="text/javascript">
            var id = new Array();
            var j = 0;
            $("#J_goCheckout").click(function(){

                if(($('.icon-checkbox-selected').length) < 1){
                    return false;
                }
                $('.icon-checkbox-selected').each(function(){
                    id[j] = $(this).next('input[name="gid"]').val();
                    j++;
  
                });
                var gnum = new Array();
                var i = 0;
                //获取商品数量
                $('.icon-checkbox-selected').each(function(){
                    gnum[i] = $(this).parent('.col-check').siblings('[class*="gnum"]').children('.change-goods-num').children('input[name="num"]').val();
                    i++;
  
                }); 
                var total = new Array();
                var k = 0;
                //获取商品数量
                $('.icon-checkbox-selected').each(function(){
                    total[k] = parseInt($(this).parent('.col-check').siblings('[class*="sum"]').text());
                    k++;
  
                }); 
                $('input[name="id[]"]').val(id);
                var form = document.myform;
                form.submit();             
            });
            function doDel(id)
            {
                if(confirm('确定要删除吗？')){
                    var form = document.del;
                    form.action = "{{ url('/home/carts') }}/"+id;
                    form.submit();
                }
            }
        </script>
        <script type="text/javascript">
            //显示商品数量方法
            function GoodsNum()
            {
                var a = 0;
                var b = 0;
                //获取商品数量
                $('input[name="num"]').each(function(){
                    a = parseInt($(this).val());
                    b += a;
                });
                //显示商品总量
                $('#J_cartTotalNum').text(b);
            }
            //调用显示商品数量的方法
            GoodsNum();

            //购物方法
            function cart(){
                //显示商品总量
                var a = 0;
                var b = 0;
                $('input[name="num"]').each(function(){
                    a = parseInt($(this).val());
                    b += a;
                });
                $('#J_cartTotalNum').text(b);
                //调用显示选中商品数量及总价的方法
                show();
            }
            
            //显示选中商品数量及总价    
            function show()
            {
                //判断是否有商品被选中
                if(($('.icon-checkbox-selected').length) > 0){
                    var sum = 0;
                    //获取选中商品的小计,并遍历
                    $('.icon-checkbox-selected').parent().siblings('[class*="sum"]').each(function(){
                        sum += parseInt($(this).text());
                    });
                    //显示选中商品总价
                    $('#J_cartTotalPrice').text(sum+'元');
                    var total = 0;
                    //获取选中商品的总量
                    $('#J_cartListBody .icon-checkbox-selected').parent().siblings('[class*="col-num"]').each(function(){
                        total += parseInt($(this).find('input').val());
                    });
                    //显示选中商品总量
                    $('#J_selTotalNum').text(total);
                }
            }

            // 验证商品数量
            //获取所有的商品数量,并遍历
            $('input').each(function(){
                //添加表单失去焦点事件
                $(this).focusout(function(){    
                    //获取商品数量
                    var num = $.trim($(this).val());
                    //准备正则
                    var regnum = /^\d{1,3}$/;
                    if(regnum.exec(num)==null){
                        alert("商品数量为三位数!"); 
                        // 如果没有选中商品，不能结算
                        $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
                    }
                    //调用显示选中商品数量及总价的方法 
                    show();
                });
            });      
            //有客户在输入自己指定的数量后页面的变化
            function focus()
            {
                $('input[name="num"]').each(function(){
                    //获取商品数量
                    var num = $(this).val();
                    //商品小计
                    var text = $(this).parent().parent().siblings('[class*="sum"]');
                    //获取单价
                    var price = parseInt($(this).parent().parent().siblings('[class*="price"]').text());
                    text.text(parseInt(price*num));
                    text.text(text.text()+'元');
                    var cid = $(this).siblings('input[name*="cid"]').val();
                    var stock = $(this).parent().find('.J_canBuyLimit span');
                    stock.text(parseInt(stock.text())-num);
                    var check = $(this).parent().find('input[name="check"]').val();
                    if(stock.text() < 1){
                        $(this).val(check);
                        stock.text(0);
                        alert('亲，商品已被您购完');
                    }
                    var g = num;
                    var t = parseInt(text.text());
                    $.get('/home/gnum/'+cid,{gnum:g,total:t});
                    var gidd = $(this).parent().find('input[name="stock"]').val();
                    var a = parseInt(stock.text());
                    $.get('/home/carts/'+gidd,{stock:a});
                });   
            }
            //有客户在输入自己指定的数量后页面的变化
            $('input[name="num"]').keyup(function(){
                focus();
                //调用显示商品数量的方法
                GoodsNum();
            });       
            //选中商品方法
            function goods()
            {
                //判断是否有商品被选中
                if(($('.icon-checkbox-selected').length) > 0){
                    //如果有选中商品,提示框隐藏
                    $('#J_noSelectTip').addClass('hide');
                    //如果有选中商品,可以去结算
                    $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary').css('background','#FF6700').hover(function(){
                        $(this).css('background','#D15503');
                    },
                    function(){
                        $(this).css('background','#FF6700');
                    });
                    //调用显示选中商品数量及总价的方法
                    show();
                }
            }
            //没有选中商品方法
            function checkGoods()
            {
                //判断是否有商品被选中
                if(($('.icon-checkbox-selected').length) < 1){
                    // 如果没有选中商品，不能结算
                    $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
                    $('#J_noSelectTip').removeClass('hide');
                    //商品总计清零
                    $('#J_cartTotalPrice').text('0元');
                    //选中商品清零
                    $('#J_selTotalNum').text(0); 
                }
            }
            //点击按钮选中订单
            $('.J_itemCheckbox').toggle(function(){
                $(this).addClass('icon-checkbox-selected');
                //调用选中商品方法
                goods();
                input();
            },function(){
                $(this).removeClass('icon-checkbox-selected');
                //没有选中商品方法
                checkGoods();
                //调用显示选中商品数量及总价的方法
                show();
            });
            //全选
            $('#J_selectAll').toggle(function(){
                //让所有商品都选中
                $(this).addClass('icon-checkbox-selected');
                $('.J_itemCheckbox').addClass('icon-checkbox-selected');
                //调用选中商品方法
                goods();
            },
            function(){
                $(this).removeClass('icon-checkbox-selected');
                $('.J_itemCheckbox').removeClass('icon-checkbox-selected');
                //没有选中商品方法
                checkGoods();
                //调用显示选中商品数量及总价的方法
                show();
            });
            //添加商品数量
            $('.plus').click(function(){
                //获取商品数量
                var num = $(this).prev('input[name*="num"]');
                num.val(parseInt(num.val())+1);
                //获取商品小计
                var text = $(this).parent().parent().siblings('[class*="sum"]');
                //获取商品单价
                var price = parseInt($(this).parent().parent().siblings('[class*="price"]').text());
                text.text(price*num.val());
                text.text(text.text()+'元');
                var cid = $(this).next('input[name*="cid"]').val();
                var stock = $(this).parent().find('.J_canBuyLimit span');
                stock.text(parseInt(stock.text())-1);
                var check = $(this).parent().find('input[name="check"]').val();
                if(stock.text() < 1){
                    num.val(check);
                    stock.text(0);
                    alert('亲，商品已被您购完');
                }
                
                var g = num.val();
                var t = parseInt(text.text());
                $.get('/home/gnum/'+cid,{gnum:g,total:t});
                var gidd = $(this).parent().find('input[name="stock"]').val();
                var a = parseInt(stock.text());
                $.get('/home/carts/'+gidd,{stock:a});
            });
            //删除商品数量
            $('.minus').click(function(){
                //获取商品数量
                var num = $(this).next('input[name*="num"]');
                num.val(parseInt(num.val())-1);
                //商品库存
                var stock = $(this).parent().find('.J_canBuyLimit span');
                var check = $(this).parent().find('input[name="check"]').val();
                stock.text(parseInt(stock.text())+1);
                var stocks = $(this).parent().find('input[name="stock"]').val();
                if(num.val() < 1){
                    num.val(1);
                    stock.text(check);
                }
                //商品小计
                var text = $(this).parent().parent().siblings('[class*="sum"]');
                //获取商品单价
                var price = parseInt($(this).parent().parent().siblings('[class*="price"]').text());
                text.text(price*num.val());
                text.text(text.text()+'元');
                var cid = $(this).siblings('input[name*="cid"]').val();
                var g = num.val();
                var t = parseInt(text.text());
                $.get('/home/gnum/'+cid,{gnum:g,total:t});
                var gidd = $(this).parent().find('input[name="stock"]').val();
                var a = parseInt(stock.text());
                $.get('/home/carts/'+gidd,{stock:a});
            });          
        </script>

        <div class="cart-recommend container" id="J_miRecommendBox">
            <h2 class="xm-recommend-title">
                @if(!empty(session('user')) && count($list) > 0)
                <span>买购物车中商品的人还买了</span>
                @else
                <span>为您推荐</span>
                @endif
            </h2>
            <div class="xm-recommend">
                <ul class="row" data-carousel-list="true"> 
                    @foreach($goods as $g)
                    <li class="J_xm-recommend-list span4">  
                        <dl> 
                            <dt> <a href="{{ url('/home/xiangqing').'/'.$g->id }}"  target="_blank" > 
                            <img src="{{ url('Admin/upload').'/'.$g->pic }}" width='140'height='140'  alt="小米蓝牙触控语音遥控器"> 
                            </a> 
                        </dt> <dd class="xm-recommend-name"> <a href="{{ url('/home/xiangqing').'/'.$g->id }}"> {{ $g->name }} </a> </dd> <dd class="xm-recommend-price">{{ $g->price }}元</dd> <dd class="xm-recommend-tips"><span>257人好评</span>    <a href="{{ url('/home/single').'/'.$g->id }}" class="btn btn-small btn-line-primary J_xm-recommend-btn" style="display: none;">加入购物车</a>  </dd> <dd class="xm-recommend-notice"></dd> 
                        </dl>  
                    </li>
                    @endforeach 
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.xm-recommend ul li').hover(function(){
        $(this).find('.J_xm-recommend-btn').css('display','block');
        $(this).find('.xm-recommend-tips span').css('display','none');
        
    },function(){
        $(this).find('.xm-recommend-tips span').css('display','block');
        $(this).find('.J_xm-recommend-btn').css('display','none');
        
    });
</script>
<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                <li><a rel="nofollow" href="http://www.mi.com/static/fast/" target="_blank" data-stat-id="46873828b7b782f4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-46873828b7b782f4&#39;, &#39;//www.mi.com/static/fast/&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>预约维修服务</a></li>
                <li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" data-stat-id="78babcae8a619e26" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-78babcae8a619e26&#39;, &#39;//www.mi.com/service/exchange#back&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>7天无理由退货</a></li>
                <li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank" data-stat-id="d1745f68f8d2dad7" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-d1745f68f8d2dad7&#39;, &#39;//www.mi.com/service/exchange#free&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>15天免费换货</a></li>
                <li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank" data-stat-id="f1b5c2451cf73123" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-f1b5c2451cf73123&#39;, &#39;//www.mi.com/service/exchange#mail&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>满150元包邮</a></li>
                <li><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" data-stat-id="b57397dd7ad77a31" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-b57397dd7ad77a31&#39;, &#39;//www.mi.com/static/maintainlocation/&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i>520余家售后网点</a></li>
            </ul>
        </div>
        <div class="footer-links clearfix">
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                <dd><a rel="nofollow" href="http://www.mi.com/service/account/register/" target="_blank" data-stat-id="e5dad0738a41014f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-e5dad0738a41014f&#39;, &#39;//www.mi.com/service/account/register/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">账户管理</a></dd>
                <dd><a rel="nofollow" href="http://www.mi.com/service/buy/buytime/" target="_blank" data-stat-id="8e128f473e680197" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-8e128f473e680197&#39;, &#39;//www.mi.com/service/buy/buytime/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">购物指南</a></dd>
                <dd><a rel="nofollow" href="http://www.mi.com/service/order/sendprogress/" target="_blank" data-stat-id="fd9e3532f60a2f8d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-fd9e3532f60a2f8d&#39;, &#39;//www.mi.com/service/order/sendprogress/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">订单操作</a></dd>
            </dl>
            <dl class="col-links ">
                <dt>服务支持</dt>
                <dd><a rel="nofollow" href="http://www.mi.com/service/exchange" target="_blank" data-stat-id="8e282b6f669ba990" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-8e282b6f669ba990&#39;, &#39;//www.mi.com/service/exchange&#39;, &#39;pcpid&#39;, &#39;&#39;]);">售后政策</a></dd>
                <dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank" data-stat-id="5f2408ab3c808aa2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-5f2408ab3c808aa2&#39;, &#39;http://fuwu.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">自助服务</a></dd>
                <dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank" data-stat-id="18c340c920a278a1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-18c340c920a278a1&#39;, &#39;http://xiazai.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">相关下载</a></dd> 
            </dl> 
            <dl class="col-links ">
                <dt>线下门店</dt>
                <dd><a rel="nofollow" href="http://www.mi.com/c/xiaomizhijia/" target="_blank" data-stat-id="b27b566974e4aa67" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-b27b566974e4aa67&#39;, &#39;//www.mi.com/c/xiaomizhijia/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米之家</a></dd>
                <dd><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" data-stat-id="6dab396f7a873f15" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-6dab396f7a873f15&#39;, &#39;//www.mi.com/static/maintainlocation/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">服务网点</a></dd>
                <dd><a rel="nofollow" href="http://www.mi.com/static/familyLocation/" target="_blank" data-stat-id="9af5efe014c3aea2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-9af5efe014c3aea2&#39;, &#39;//www.mi.com/static/familyLocation/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">零售网点</a></dd>
                
            </dl>  
            <dl class="col-links ">
                <dt>关于小米</dt>
                <dd><a rel="nofollow" href="http://www.mi.com/about" target="_blank" data-stat-id="f6d386c65b1f4132" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-f6d386c65b1f4132&#39;, &#39;//www.mi.com/about&#39;, &#39;pcpid&#39;, &#39;&#39;]);">了解小米</a></dd>
                <dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank" data-stat-id="4307a445f5592adb" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-4307a445f5592adb&#39;, &#39;http://hr.xiaomi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">加入小米</a></dd>   
                <dd><a rel="nofollow" href="http://www.mi.com/about/contact" target="_blank" data-stat-id="6842e821365ee45d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-6842e821365ee45d&#39;, &#39;//www.mi.com/about/contact&#39;, &#39;pcpid&#39;, &#39;&#39;]);">联系我们</a></dd>
                
            </dl>     
            <dl class="col-links ">
                <dt>关注我们</dt>     
                <dd><a rel="nofollow" href="http://weibo.com/xiaomishangcheng" target="_blank" data-stat-id="4d561ee685cd2e15" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-4d561ee685cd2e15&#39;, &#39;http://weibo.com/xiaomishangcheng&#39;, &#39;pcpid&#39;, &#39;&#39;]);">新浪微博</a></dd>
                
                <dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank" data-stat-id="78fdefa9dee561b5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-78fdefa9dee561b5&#39;, &#39;http://xiaoqu.qq.com/mobile/share/index.htmlurl=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米部落</a></dd>
                
                <dd><a rel="nofollow" href="http://order.mi.com/buy/checkout?r=59347.1492561801#J_modalWeixin" data-toggle="modal" data-stat-id="47539f6570f0da90" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-47539f6570f0da90&#39;, &#39;#J_modalWeixin&#39;, &#39;pcpid&#39;, &#39;&#39;]);">官方微信</a></dd>  
            </dl>   
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
                <p><span class="J_serviceTime-normal" style="
                ">周一至周日 8:00-18:00</span>
                <span class="J_serviceTime-holiday" style="display:none;">1月27日至2月2日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
                <a rel="nofollow" class="btn btn-line-primary btn-small" href="http://www.mi.com/service/contact" target="_blank" data-stat-id="a7642f0a3475d686" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-a7642f0a3475d686&#39;, &#39;//www.mi.com/service/contact&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i> 24小时在线客服</a>            
            </div>
        </div>
    </div>
</div>

<!--mae_monitor--></body>
</html>
