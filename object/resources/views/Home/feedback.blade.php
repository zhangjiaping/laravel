@extends('Home.parent')
@section('content')
<title>问题反馈</title>
<meta name="description" content="" charset="utf-8">
<link rel="stylesheet" href="{{('/Home/css/base.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{('/Home/css/feedback.min.css')}}">
 @if(session('msg'))
    <script type="text/javascript">
      alert("{{ session('msg') }}");
    </script>
       @endif
</head>
<style type="text/css">
    #banner_menu_wrap{
        display:none;
        margin-left:65px;
    }
     #big_banner_wrap{
        width:100%;
    }
</style>

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


<!-- 这里可以写验证！！！ -->
<!-- 这里是需要填写的内容 -->
<form method="post" action="/home/zhucewt" name="form">
    {{ csrf_field() }}
    <div class="page-main">
        <div class="container feedback-box">
            <div class="row">
                <div class="span15">
                    <div class="feedback-main">
                        <ul class="feedback-nav  clearfix J_tabSwitch">
                            <li>问题反馈</li>
                        </ul>
                        <div class="tab-container">
                            <div class="tab-content clearfix">
                                <div class="user-info">
                                </div>
                                <div class="form-box">
                                    <h2 class="title">对您给予的帮助和支持，深表感谢！</h2>
                                    <div class="form-section">
                                        <div class="xm-select">
                                          <div class="dropdown">
                                              <label class="iconfont" for="feedbackType"></label>
                                                <select id="feedbackType" name="name">
                                                    <option value="0">问题类型</option>
                                                    <option value="1">功能意见</option>
                                                    <option value="2">界面意见</option>
                                                    <option value="3">性能问题</option>
                                                    <option value="4">网络问题</option>
                                                    <option value="5">新的需求</option>
                                                    <option value="6">其他问题</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-section">
                                        <label class="input-label" for="feedbackQuestion" >在这里描述您遇到的问题</label>
                                        <textarea class="input-text input-textarea" id="feedbackQuestion" style="resize:none;" name="content" placeholder="问题描述须大于10小于200个字"></textarea><span style="color:red;font-size:15px;">&nbsp;*</span>
                                    </div>

                                    <div class="form-section form-section-valid form-section-focus form-section-active">
                                        <label class="input-label"  for="feedbackQuestionUrl">手机号（必填）</label>
                                        <input class="input-text input-url" type="text" id="mima" onblur="shiqu()" name="tel">
                                        <span  style="color:red;font-size:15px;">&nbsp;*</span>&nbsp;&nbsp;<span id="a"></span>
                                        <span id="a" style="color:red;"></span>
                                        
                                    </div>

                                    <!-- 手机号验证 -->
                                    <script type="text/javascript">
                                        function shiqu(){
                                              var a=document.getElementById('a');
                                              var mima=document.getElementById('mima');
                                            if( mima.value=="" || mima.value.length < 11|| mima.value.length >11)
                                            {
                                                a.innerHTML="请您输入手机号必须为11位！";
                                                a.style.color="red";
                                                // alert('错误');
                                            }else if(isNaN(Number(mima.value))){
                                                a.innerHTML="手机号请您输入数字！";
                                            }else{
                                                a.style.color="green";
                                                a.innerHTML="输入正确！";
                                            }
                                        }

                                         
              
                                        </script>

                                    <div class="captcha-box clearfix" id="J_captchaBox">
                                        <div class="form-section">
                                            <label class="input-label" for="captchaCode">验证码</label>
                                            <input class="input-text" type="text" id="captchaCode" name="checkcode" data-authurl="" autocomplete="off">
                                            <img width="150px" height="30px" src="{{ url('/home/captch/'.time()) }}" id='a'/>&nbsp;<a href="javascript:dd()">换一张</a>
                                            
                                        </div>
                                    </div>
                                         <script type="text/javascript">
                                         function dd(){
                                              document.getElementById('a').src='{{ url('/home/captch') }}/'+Math.random();
                                           }    
                                         </script>
                                   <input type="submit"  class="btn btn-primary" value="提交问题">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span5">
                    <div class="feedback-list">
                        <h3 class="title">常见问题</h3>
                        <ul class="list">
                            <li>
                                <dl>
                                    <dt>满多少免运费？</dt>
                                    <dd>购买手机，配件等商品在150元以下，需按照10元/单标准支付邮费， “单笔订单满150元免邮费”需以实际支付金额超过150元为准。小米电视、空气净化器、净水器、体重秤因等商品特殊性不参与满150元包邮活动。如遇活动，资费标准以活动公告为准。</dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>我购买的东西什么时候发货？</dt>
                                    <dd>小米网将参照支付顺序在7个工作日左右发货。实际发货时间可能因用户所在地、物流第三方、支付延迟等多种因素而调整。我们将尽量保证发货时间与发货顺序，但实际中可能无法严格按支付顺序发货，请您谅解。（发货时间以具体活动为准）快递公司是由系统根据地址随机分配，不能个人选择合适的快递公司！</dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>如何查询我物流进度？</dt>
                                    <dd>小米网登录后，进入我的订单，如果您的订单状态为“已发货”，可以查看到最新的物流信息。</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- 这里是需要填写的内容 -->

<!-- .modal-globalSites END -->
<script src="{{('/Home/js/base.min.js')}}"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: '//order.mi.com',
        orderSSLSite: 'https://order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: '//tp.hd.mi.com/',
        damiaoGoodsId:["2160400006","2160400007","2162100004","2162800010","2155300001","2155300002","2163500025","2163500026","2163500027","2164200021","2164200006","2164200002","2164200001","2142400036","2164700002","2164200008","2164200012","2164600009","2163900015","2170600014","2170800008","2170700003","2170700002","2171000055","2164200004","2164200007","2170900019","2164200011"],
        logoutUrl: '//order.mi.com/site/logout',
        staticSite: '//static.mi.com',
        quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
    };
    MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
    MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
    MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
    MI.miniCart.init();
    MI.updateMiniCart();
})();
</script>
<script type="text/javascript" src="{{('/Home/js/feedback.min.js')}}"></script>
<script src="{{('/Home/js/xmsg_ti.js')}}"></script>
<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "{{('/Home/js/xmst.js')}}";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection