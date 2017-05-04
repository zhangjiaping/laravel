<!DOCTYPE html>
<html lang="zh-CN" xml:lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<!-- <meta name='csrf-token' content="{{ csrf_token() }}"> -->
<title>填写订单信息</title>
<meta name="viewport" content="width=1226">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
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
<script>
    var addressConfig = {
    addressId : '0',
    addressMatch : 'common',
    addressMatchData : new Function('return ' + 'data')
    };
var checkoutConfig={
    addressMatch:'common',
    addressMatchVarName: new Function('return ' + 'data'),
    hasPresales:false,
    hasBigTv:false,
    hasAir:false,
    hasScales:false,
    hasWater:false,
    hasWater2:false,
    hasMobile:false,
    hasEboiler:false,
    hasEvent:false,
    hasGiftcard:false,
    totalPrice:29.00,
    needPayAmount:39,
    postage:10,//
    postFree:false,
    bcPrice:150,
    activityDiscountMoney:0.00,//活动优惠
    showCouponBox:0,
    showCaptcha:'0',
    invoice:[{"type":"electron","value":4,"desc":"\u7535\u5b50\u53d1\u7968","checked":true},{"type":"personal","value":1,"desc":"\u7eb8\u8d28\u53d1\u7968","checked":false}],
    quickOrder: '0',
    hasBigPro: false,
    onlinePayTips: '支持微信支付、支付宝、银联、财付通、小米钱包等',
    subsidyPrice: 0};
</script>
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
           <a class="logo ir" href="/" title="小米官网">小米官网</a>
       </div>
        <div class="header-title" id="J_miniHeaderTitle">
            <h2>确认订单</h2>
        </div>
        <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a rel="nofollow" class="user-name" href="{{ url('home/userinfo')}}" target="_blank">
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
<!-- .site-mini-header END -->
<div class="page-main">
    <div class="container">
        <div class="checkout-box">
            <div class="section section-address">
                <div class="section-header clearfix">
                    <h3 class="title">收货地址</h3>
                    <div class="more">
                    </div>
                </div>
                <div class="section-body clearfix" id="J_addressList">
            
                    @foreach($list as $v)
                        <div class="address-item J_addressItem" id='item'>
                            <dl><dt><span class="tag"></span> 
                                <em class="uname">{{ $v->consignee }}</em> 
                                </dt><dd class="utel">{{ $v->consignee_phone }}</dd> 
                                <dd class="uaddress">{{ $v->province }} {{ $v->city }} 
                                    {{ $v->county }} <br> {{ $v->detail }} 
                                </dd> 
                            </dl> 
                            <div class="actions"><a href="javascript:edit({{ $v->id }})" id="reset" class="modify J_addressModify">修改</a> </div>
                            <input type='hidden' name='add' value="{{ $v->id }}"> 
                        </div>
                    @endforeach    
                    <div class="address-item address-item-new" id="J_newAddress">
                        <i class="iconfont"></i>
                        添加新地址
                    </div>
                </div>
            </div>
            
            <div class="section section-options section-payment clearfix">
                <div class="section-header">
                    <h3 class="title">支付方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="J_optionList options "><li data-type="pay" class="J_option selected" data-value="1">在线支付 <span>（支持微信支付、支付宝、银联、财付通、小米钱包等）</span></li></ul>
                </div>
            </div>

            <div class="section section-goods">
                <div class="section-header clearfix">
                    <h3 class="title">商品及优惠券</h3>
                    <div class="more">
                        <a href="{{ url('home/carts') }}">返回购物车<i class="iconfont"></i>
                        </a>
                    </div>
                </div>
                @foreach($goods as $good)
                <!-- 显示商品信息 -->
                <div class="section-body">
                    <ul class="goods-list" id="J_goodsList">
                        <li class="clearfix">
                            <div class="col col-img">
                                <img src="{{ url('Home/checkorder/pms_1482321199.12589253!30x30.jpg') }}" width="30" height="30">
                            </div>
                            <div class="col col-name">
                                <a href="" target="_blank" >{{ $good->gname }}</a>
                            </div>
                            <div class="col col-price">
                                {{ $good->price }} 元 x {{ $good->gnum }}                            
                            </div>
                            <div class="col col-status">
                                有货
                            </div>
                            <div class="col col-total price">
                                {{ $good->total }}元
                            </div>
                        </li>                   
                    </ul>
                </div>
                <input type='hidden' name='gidd' value="{{ $good->id }}">
                <input type='hidden' name='gnum' value="{{ $good->gnum }}">
                @endforeach
            </div>

            <div class="section section-count clearfix">
                <div class="money-box" id="J_moneyBox">
                    <ul>
                        <li class="clearfix">
                            <label>商品件数：</label>
                            <span class="val" id='gnum'>0</span>
                        </li>
                        <li class="clearfix">
                            <label>金额合计：</label>
                            <span class="val" id='sum'>0</span>
                        </li>
                        <li class="clearfix">
                            <label>运费：</label>
                             <span class="val"><i data-id="J_postageVal">免运费</i></span>
                        </li>
                        <li class="clearfix total-price">
                            <label>应付总额：</label>
                            <span class="val"><em id="J_totalPrice">0</em>元</span>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                var gnum1 = 0;
                var gnum = 0;
                $('input[name="gnum"]').each(function(){
                    gnum1 = parseInt($(this).val());
                    gnum += gnum1;
                });
                $('#gnum').text(gnum+'件');
                var s1 = 0;
                var s2 = 0;
                $('.price').each(function(){
                    s1 = parseInt($(this).text());
                    s2 += s1;
                });
                $('#sum').text(s2+'元');
                $('#J_totalPrice').text(s2);
            </script>
            <div class="section-bar clearfix">
                <div class="fl">
                    <div class="seleced-address" id="J_confirmAddress"><p></p><span></span> </div>
                    <div class="big-pro-tip hide J_confirmBigProTip"></div>
                </div>
                <div class="fr">
                    <a href="javascript:void(0);" class="btn btn-primary" id="J_checkoutToPay" >去结算</a>
                </div>
            </div>
            <form action='' method='post' name='order'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type='hidden' name='aid'>
                <input type='hidden' name='gid'>
            </form>
            <script type="text/javascript">
                $('#J_addressList .J_addressItem').each(function(){
                    $(this).click(function(){
                        $(this).addClass('selected');
                        $(this).siblings().removeClass('selected');
                        var a = $(this).find('.uname').text();
                        var b = $(this).find('.utel').text();
                        var c = $(this).find('.uaddress').text();
                        $('#J_confirmAddress p').text(a+' '+b);
                        $('#J_confirmAddress span').text(c);
                    });    
                });
            </script>
            
        </div>
    </div>
</div>
<!-- 添加收货地址 -->
<div class="modal fade modal-hide modal-edit-address in" id="J_modalEditAddress" aria-hidden="false" style="top: 220px; left: 362.5px; display: none; height:380px;">
    <form action="{{ url('home/checkout') }}" method='post' id='address' name='myform'>
        {{ csrf_field() }} 
        <div class="modal-body">
            <div class="address-edit-box" style="">
                <div class="box-main" style='height:280px;'>
                    <div class="form-section">
                        <label class="input-label">姓名</label>
                        <label class="input-label" id='user_error' style='margin-left:250px;color:red;display:none;'>×</label>
                        <input class="input-text" type="text" id="user_name" name="consignee" placeholder="收货人姓名">
                        <p class="msg msg-error" style='display:none;'>收货人姓名，最少2个最多20个中文字
                        </p>
                    </div>
                    <div class="form-section">
                        <label class="input-label">手机号</label>
                        <label class="input-label" id='phone_error' style='margin-left:250px;color:red;display:none;'>×</label>
                        <input class="input-text J_addressInput" type="text" id="user_phone" name="consignee_phone" placeholder="11位手机号">
                        <p class="msg msg-error" style='display:none;'>请输入正确的手机号</p>
                    </div>
                    <div class="form-section form-select-2 clearfix">
                        <div class="xm-select select-province">
                            <div class="dropdown">
                                <label class="iconfont" for="J_province"></label>
                                <select id='J_province'>
                                    <option value='0'>省份/自治区</option>
                                </select>
                            </div>
                        </div>
                        <div class="xm-select select-city">
                            <div class="dropdown">
                                <label class="iconfont" for="J_city"></label>
                                <select id='J_city'>
                                    <option value='0'>城市/地区</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-section clearfix form-select-2">
                        <div class="xm-select select-county">
                            <div class="dropdown">
                                <label class="iconfont" for="J_county"></label>
                                <select id='J_county'>
                                    <option value='0'>区/县</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="address-supp-tip hide" id="J_addressSuppTip">您的收货地址需要补全街道信息</div>
                    <div class="form-section">
                        <label class="input-label" for="user_adress">详细地址</label>
                        <label style='margin-left:250px;color:red;display:none;' class="input-label" id='detail_error'><b>×</b></label>
                        <textarea class="input-text J_addressInput" type="text" id="adress" name="detail" placeholder="详细地址，路名或街道名称，门牌号"></textarea>
                        <p class="msg msg-error" style='display:none;'>详细地址长度不对，最小为 5 个字，最大32个字</p>
                    </div>
                </div>
                <div class="form-confirm clearfix">
                    <a href="javascript:void(0);" class="btn btn-primary" id="J_save">保存</a>
                    <a href="javascript:void(0);" class="btn btn-gray" id="J_cancel">取消</a>
                </div>
            </div>
        </div>
        <input type='hidden' name='province'>
        <input type='hidden' name='city'>
        <input type='hidden' name='county'>
        <input type='hidden' name='uid' value="{{ session('user')->id }}">
    </form>    
</div>
<script type="text/javascript">
//表单提交验证
$('#J_save').click(function(){
    //验证用户名
    var uname = $('#user_name').val();
    if( uname ==" " || uname.length < 2 || uname.length>20 ){
        $('#user_name').next('p').css('display','block');
        $('#user_error').css('display','block');
        return false;
    }else{
        $('#user_name').next('p').css('display','none');
        $('#user_error').css('display','none');
    }
    //验证手机号
    var phone = $('#user_phone');
    if( phone.val() =="" || ( phone.val() !="" && !/^1[3458]{1}[0-9]{9}$/.test(phone.val()) ) ){
        $('#user_phone').next('p').css('display','block');
        $('#phone_error').css('display','block');
        return false;
    }else{
        $('#user_phone').next('p').css('display','none');
        $('#phone_error').css('display','none');
    }
    //验证是否选择了城市
    if($('#J_province :selected').val() == 0 || $('#J_city :selected').val() == 0 || $('#J_county :selected').val() ==0){
        return false;
    }
     //验证详细地址
    var detail = $('#adress').val();
    if( detail=="" || detail.length < 5 || detail.length > 32 ){
        $('#adress').next('p').css('display','block');
        $('#detail_error').css('display','block');
        return false;
    }else{
        $('#adress').next('p').css('display','none');
        $('#detail_error').css('display','none');
    }
    $('[name="province"]').val($('#J_province :selected').text());
    $('[name="city"]').val($('#J_city :selected').text());
    $('[name="county"]').val($('#J_county :selected').text());
    var form = document.myform;
    form.action = "{{ url('home/checkout') }}";
    form.submit();
});

$('#J_newAddress').click(function(){
    $('[name="consignee"]').val('');
    $('[name="consignee_phone"]').val('');
    $('[name="detail"]').val(' ');
    $('.modal-backdrop').css('display','block');
    $('#J_modalEditAddress').css('display','block');
    });            
    $.ajax({
            url:'/ajaxdemo/get',
            type:'get',
            async:true,
            data:{upid:0},
            dataType:'json',
            success:function(data)
            {
                // console.log(data);
                //遍历从数据库查出来的数据，生成option选项追加到select里
                for (var i = 0; i < data.length; i++) {
                    $('#J_province').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                };
            },
            error:function()
            {
                alert('ajax请求失败');
            }
        });

        //给所有的select标签绑定change事件
        $('#J_province').live("change",function(){
            //干掉当前你选择的select标签后面的select标签
            $('#J_city option:first').siblings().remove();
            $('#J_county option:first').siblings().remove();
            //判断你选择是不是--请选择--
            if($(this).val() != '0'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
                var ob = $(this);
                $.ajax({
                    url:'/ajaxdemo/post',
                    type:'post',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{upid:$(this).val()-1,'_token':"{{ csrf_token() }}"},
                    dataType:'json',
                    success:function(data)
                    {
                        // alert(data);
                        // console.log(data);
                        //判断是不是最后一级城市，最后一级城市查数据库length==0
                        if(data.length>0){
                            //生成一个新的select标签
                            //遍历从数据库查出来的数据，生成option选项追加到select里
                            for (var i = 0; i < data.length; i++) {
                                $('#J_city').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            }
                        }
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            }
        });
        //给所有的select标签绑定change事件
        $('#J_city').live("change",function(){
            //干掉当前你选择的select标签后面的select标签
            $('#J_county option:first').siblings().remove();
            //判断你选择是不是--请选择--
            if($(this).val() != '0'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
                var ob = $(this);
                $.ajax({
                    url:'/ajaxdemo/post',
                    type:'post',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                    dataType:'json',
                    success:function(data)
                    {
                        // alert(data);
                        // console.log(data);
                        //判断是不是最后一级城市，最后一级城市查数据库length==0
                        if(data.length>0){
                            //生成一个新的select标签
                            // var select = $("<select name='city1[]'><option>--请选择--</option></select>");
                            //遍历从数据库查出来的数据，生成option选项追加到select里
                            for (var i = 0; i < data.length; i++) {
                                $('#J_county').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            };
                        }
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            }
        });

        
  
$('#J_cancel').click(function(){
    $('.modal-backdrop').css('display','none');
    $('#J_modalEditAddress').css('display','none');
});
    
</script>
<!-- 修改收货地址 -->
<div class="modal fade modal-hide modal-edit-address in" id="edit" aria-hidden="false" style="top: 220px; left: 75.5px; display: none;height:380px;">
    <form action="{{ url('Home/checkout') }}" method='post' id='address' name='editform'>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="address-edit-box">
            <div class="box-main" style='height:280px;'>
                <div class="form-section form-section-active">
                    <label name='' class="input-label" for="user_name">姓名</label>
                    <label class="input-label" id='user_err' style='margin-left:250px;color:red;display:none;'><b>×</b></label>
                    <input class="input-text J_addressInput" type="text" id="uname" name="consignee">
                     <p class="msg msg-error" style='display:none;'>收货人姓名，最少2个最多20个中文字
                        </p>
                </div>
                <div class="form-section form-section-active">
                    <label class="input-label" for="user_phone">手机号</label>
                    <label class="input-label" id='phone_err' style='margin-left:250px;color:red;display:none;'><b>×</b></label>
                    <input class="input-text J_addressInput" type="text" id="uphone" name="consignee_phone" >
                    <p class="msg msg-error" style='display:none;'>请输入正确的手机号</p>
                </div>
                <div class="form-section form-select-2 clearfix">
                    <div class="xm-select select-province">
                        <div class="dropdown">
                            <label class="iconfont" for="J_province"></label>
                             <!-- <select name="province" id="J_province"></select> -->
                            <select id='cid' name='province'>
                                <option value='0'>省份/自治区</option>
                            </select>
                        </div>
                    </div>

                    <div class="xm-select select-city">
                        <div class="dropdown">
                            <label class="iconfont" for="J_city"></label>
                            <select id='city' name='city'>
                                <option value='0'>城市/地区</option>
                            </select>
                         </div>
                    </div>
                </div>
                <div class="form-section clearfix form-select-2">
                    <div class="xm-select select-county">
                        <div class="dropdown">
                            <label class="iconfont" for="J_county"></label>
                            <select id='country'>
                                <option value='0'>区/县</option>
                            </select>
                        </div>
                    </div>     
                </div> 
                <div class="address-supp-tip hide" id="J_addressSuppTip">您的收货地址需要补全街道信息</div>
                <div class="form-section form-section-active">
                    <label class="input-label" for="user_adress">详细地址</label>
                    <label style='margin-left:250px;color:red;display:none;' class="input-label" id='detail_err'><b>×</b></label>
                    <textarea class="input-text J_addressInput" type="text" id="uadress" name="detail"></textarea>
                    <p class="msg msg-error" style='display:none;'>详细地址长度不对，最小为 5 个字，最大32个字</p>
                </div>
            </div>
            <div class="form-confirm clearfix">
                <a href="javascript:void(0);" class="btn btn-primary" id="save">保存</a>
                <a href="javascript:void(0);" id='cancel' class="btn btn-gray" id="J_cancel">取消</a>
            </div>
        </div> 
        <input type='hidden' name='province'>
        <input type='hidden' name='city'>
        <input type='hidden' name='county'> 
    </form>  
    <input type='hidden' name='id'>  
</div>  
<script type="text/javascript">
    $('#save').click(function(){
        //验证用户名
        var uname = $('#uname').val();
        if( uname ==" " || uname.length < 2 || uname.length>20 ){
            $('#uname').next('p').css('display','block');
            $('#user_err').css('display','block');
            return false;
        }else{
            $('#uname').next('p').css('display','none');
            $('#user_err').css('display','none');
        }
        //验证手机号
        var phone = $('#uphone');
        if( phone.val() =="" || ( phone.val() !="" && !/^1[3458]{1}[0-9]{9}$/.test(phone.val()) ) ){
            $('#uphone').next('p').css('display','block');
            $('#phone_err').css('display','block');
            return false;
        }else{
            $('#uphone').next('p').css('display','none');
            $('#phone_err').css('display','none');
        }
        //验证是否选择了城市
        if($('#cid option').val() < 0 || $('#city option').val() < 0 || $('#country option').val() < 0){
            return false;
        }
         //验证详细地址
        var detail = $('#uadress').val();
        if( detail=="" || detail.length < 5 || detail.length > 32 ){
            // alert(4);
            $('#uadress').next('p').css('display','block');
            $('#detail_err').css('display','block');
            return false;
        }else{
            $('#uadress').next('p').css('display','none');
            $('#detail_err').css('display','none');
        }
        var id = $('[name="id"]').val();
        $('[name="province"]').val($('#cid :selected').text());
        $('[name="city"]').val($('#city :selected').text());
        $('[name="county"]').val($('#country :selected').text());
        var form = document.editform;
        form.action = "{{ url('home/checkout') }}/"+id;
        form.submit(); 
    });
    $('#cancel').click(function(){
        $('.modal-backdrop').css('display','none');
        $('#edit').css('display','none');
    });
    function edit(id)
    { 
        $.ajax({
            url:"{{ url('home/checkout') }}/"+id+'/edit',
            type:'get',
            async:true,
            // ,'_token':"{{ csrf_token() }}"
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                // alert(data);
                console.log(data); 
                var edit = '';
                var province = '';
                var city = '';
                var country = '';

                for (var i = 0; i < data.length; i++) {
                     edit = data[0];
                     province = data[1];
                     city = data[2];
                     country = data[3];
                };
                console.log(edit); 
                console.log(province);
                console.log(city);
                console.log(country);
                for (var i = 0; i < city.length; i++) {
                    $('#city').append("<option value="+city[i].id+">"+city[i].name+"</option>");
                };
                for (var i = 0; i < country.length; i++) {
                    $('#country').append("<option value="+country[i].id+">"+country[i].name+"</option>");
                };
                if(edit){
                    $('[name="id"]').val(edit.id);
                    $('[name="consignee"]').val(edit.consignee);
                    $('[name="consignee_phone"]').val(edit.consignee_phone);
                    $('#uadress').text(edit.detail);
                    $('#cid option[value="0"]').text(edit.province);
                    $('#city option[value="0"]').text(edit.city);
                    $('#country option[value="0"]').text(edit.county);
                }
                $('.modal-backdrop').css('display','block');
                $('#edit').css('display','block');
            }
        });   
    
    }  
     
    $.ajax({
        url:'/ajaxdemo/get',
        type:'get',
        async:true,
        data:{upid:0},
        dataType:'json',
        success:function(data)
        {
            // console.log(data);
            //遍历从数据库查出来的数据，生成option选项追加到select里
            for (var i = 0; i < data.length; i++) {
                $('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
            };
        }
    });

    //给所有的select标签绑定change事件
    $('#cid').live("change",function(){
        $('#city option[value="0"]').text('城市/地区');
        $('#country option[value="0"]').text('区/县');
        //干掉当前你选择的select标签后面的select标签
        $('#city option:first').siblings().remove();
        $('#country option:first').siblings().remove();
        //判断你选择是不是--请选择--
        if($(this).val() != '0'){
            //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
            var ob = $(this);
            $.ajax({
                url:'/ajaxdemo/post',
                type:'post',
                async:true,
                // ,'_token':"{{ csrf_token() }}"
                data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                dataType:'json',
                success:function(data)
                {
                    // alert(data);
                    // console.log(data);
                    //判断是不是最后一级城市，最后一级城市查数据库length==0
                    if(data.length>0){                        
                        //遍历从数据库查出来的数据，生成option选项追加到select里
                        for (var i = 0; i < data.length; i++) {
                            $('#city').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                        };
                        //外部插入到前一个select后面
                        // ob.after($('#city'));
                    }
                }
            });
        }
    });
    //给所有的select标签绑定change事件
    $('#city').live("change",function(){
        $('#country option[value="0"]').text('区/县');
        //干掉当前你选择的select标签后面的select标签
        $('#country option:first').siblings().remove();
        //判断你选择是不是--请选择--
        if($(this).val() != '--请选择--'){
            //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
            var ob = $(this);
            $.ajax({
                url:'/ajaxdemo/post',
                type:'post',
                async:true,
                // ,'_token':"{{ csrf_token() }}"
                data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                dataType:'json',
                success:function(data)
                {
                    //判断是不是最后一级城市，最后一级城市查数据库length==0
                    if(data.length>0){
                        //生成一个新的select标签
                        //遍历从数据库查出来的数据，生成option选项追加到select里
                        for (var i = 0; i < data.length; i++) {
                            $('#country').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                        };
                        //外部插入到前一个select后面
                    }
                }
            });
        }
    });

</script>
<!-- 预售提示 S-->
<div class="modal fade modal-yushou in" id="J_yushouTip" style='display:none'>
    <div class="modal-header">
        <h3 class="title">请确认收货地址及发货时间</h3>
    </div>
    <div class="modal-body">
        <ul class="content">
            <li>
                <h3>请确认配送地址，提交后不可变更：</h3>
                <p id="J_yushouAddress"> </p>
                <span class="icon icon-1"></span>
            </li>
            <li>
                <h3>支付后发货</h3>
                <p>如您随预售商品一起购买的商品，将与预售商品一起发货</p>
                <span class="icon icon-2"></span>
            </li>
            <li>
                <h3>以支付价格为准</h3>
                <p>如预售产品发生调价，已支付订单价格将不受影响。</p>
                <span class="icon icon-3"></span>
            </li>
        </ul>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0);" class="btn btn-gray" id='modify'>返回修改地址</a>
        <a href="javascript:void(0);" class="btn btn-primary" id="J_yushouSubmit">确认并继续下单</a>
    </div>
</div>

<div class="modal fade fade modal-alert in" id="J_modalAlert" aria-hidden="false" style="display: none;">
    <div class="modal-bd">
        <div class="text">
            <h3 id="J_alertMsg">请选择地址！</h3>
        </div>
        <div class="actions">
            <button class="btn btn-primary" id='check'>确定</button>
        </div>
        <a class="close" data-dismiss="modal" href="javascript: void(0);" ><i class="iconfont"></i></a>
    </div>
</div>

<script type="text/javascript">
    $('#J_checkoutToPay').click(function(){
        var add = $('.selected').children('input[name="add"]');
        if(add.length<1){
            $('.modal-backdrop').css('display','block');
            $('#J_modalAlert').css('display','block');
        }else{
            $('.modal-backdrop').css('display','block');
            $('#J_yushouTip').css('display','block'); 
        }
        
    });
    $('#check').click(function(){
        $('.modal-backdrop').css('display','none');
        $('#J_modalAlert').css('display','none');
    });
    $('#modify').click(function(){
        $('#J_yushouTip').css('display','none');;
        $('.modal-backdrop').css('display','none');  
    });
     $('#J_yushouSubmit').click(function(){
        var id = new Array();
        var i = 0;
        $('input[name*="gidd"]').each(function(){
            id[i] = $(this).val();
            i++;
        });
        $('input[name="gid"]').val(id);
        var add = $('.selected').children('input[name="add"]').val();
        $('input[name="aid"]').val(add);
        var form = document.order;
        form.action = "{{ url('home/checkout/0') }}";
        form.submit();
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
<div class="site-info">
    <div class="container">
        <span class="logo ir">小米官网</span>
        <div class="info-text">
            <p>小米旗下网站：<a href="http://www.mi.com/index.html" target="_blank" data-stat-id="b9017a4e9e9eefe3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-b9017a4e9e9eefe3&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米商城</a><span class="sep">|</span><a href="http://www.miui.com/" target="_blank" data-stat-id="ed2a0e25c8b0ca2f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-ed2a0e25c8b0ca2f&#39;, &#39;http://www.miui.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">MIUI</a><span class="sep">|</span><a href="http://www.miliao.com/" target="_blank" data-stat-id="826b32c1478a98d5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-826b32c1478a98d5&#39;, &#39;http://www.miliao.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">米聊</a><span class="sep">|</span><a href="http://www.duokan.com/" target="_blank" data-stat-id="c9d2af1ad828a834" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-c9d2af1ad828a834&#39;, &#39;http://www.duokan.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">多看书城</a><span class="sep">|</span><a href="http://www.miwifi.com/" target="_blank" data-stat-id="96f1a8cecc909af2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-96f1a8cecc909af2&#39;, &#39;http://www.miwifi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米路由器</a><span class="sep">|</span><a href="http://call.mi.com/" target="_blank" data-stat-id="347f6dd0d8d9fda3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-347f6dd0d8d9fda3&#39;, &#39;http://call.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">视频电话</a><span class="sep">|</span><a href="http://xiaomi.tmall.com/" target="_blank" data-stat-id="dfe0fac59cfb15d9" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-dfe0fac59cfb15d9&#39;, &#39;http://xiaomi.tmall.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米天猫店</a><span class="sep">|</span><a href="http://shop115048570.taobao.com/" target="_blank" data-stat-id="c2613d0d3b77ddff" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-c2613d0d3b77ddff&#39;, &#39;http://shop115048570.taobao.com&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米淘宝直营店</a><span class="sep">|</span><a href="http://union.mi.com/" target="_blank" data-stat-id="2f48f953961c637d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-2f48f953961c637d&#39;, &#39;http://union.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米网盟</a><span class="sep">|</span><a href="http://www.mi.com/mimobile/" target="_blank" data-stat-id="f7ea7880c49b687e" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-f7ea7880c49b687e&#39;, &#39;//www.mi.com/mimobile/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米移动</a><span class="sep">|</span><a href="http://www.miui.com/res/doc/privacy/cn.html" target="_blank" data-stat-id="c7ef95929d60f3f1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-c7ef95929d60f3f1&#39;, &#39;http://www.miui.com/res/doc/privacy/cn.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">隐私政策</a><span class="sep">|</span><a href="http://order.mi.com/buy/checkout?r=59347.1492561801#J_modal-globalSites" data-toggle="modal" target="_blank" data-stat-id="9db137a8e0d5b3dd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-9db137a8e0d5b3dd&#39;, &#39;#J_modal-globalSites&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Select Region</a>            </p>
            <p>©<a href="http://www.mi.com/" target="_blank" title="mi.com" data-stat-id="836cacd9ca5b75dd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-836cacd9ca5b75dd&#39;, &#39;//www.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">mi.com</a> 京ICP证110507号 <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow" data-stat-id="f96685804376361a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-f96685804376361a&#39;, &#39;http://www.miitbeian.gov.cn/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京ICP备10046444号</a> <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank" data-stat-id="57efc92272d4336b" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-57efc92272d4336b&#39;, &#39;http://www.beian.gov.cn/portal/registerSystemInforecordcode=11010802020134&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京公网安备11010802020134号 </a><a rel="nofollow" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank" data-stat-id="c5f81675b79eb130" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-c5f81675b79eb130&#39;, &#39;//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京网文[2014]0059-0009号</a>
            <br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
        </div>
        <div class="info-links">
            <a href="http://privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&lang=zh-cn" target="_blank" data-stat-id="de920be99941f792" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-de920be99941f792&#39;, &#39;//privacy.truste.com/privacy-seal/validationrid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="{{ url('/Home/checkorder/truste.png') }}" alt="TRUSTe Privacy Certification"></a>
            <a href="http://search.szfw.org/cert/l/CX20120926001783002010" target="_blank" data-stat-id="d44905018f8d7096" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-d44905018f8d7096&#39;, &#39;//search.szfw.org/cert/l/CX20120926001783002010&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="{{ url('/Home/checkorder/v-logo-2.png') }}" alt="诚信网站"></a>
            <a href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082" target="_blank" data-stat-id="3e1533699f264eac" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-3e1533699f264eac&#39;, &#39;https://ss.knet.cn/verifyseal.dllsn=e12033011010015771301369&amp;ct=df&amp;pa=461082&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="{{ url('/Home/checkorder/v-logo-1.png') }}" alt="可信网站"></a>
            <a href="http://www.315online.com.cn/member/315140007.html" target="_blank" data-stat-id="b085e50c7ec83104" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-b085e50c7ec83104&#39;, &#39;http://www.315online.com.cn/member/315140007.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><img src="{{ url('/Home/checkorder/v-logo-3.png') }}" alt="网上交易保障中心"></a>
        </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>
<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
    <div class="modal-hd">
        <a class="close" data-dismiss="modal" data-stat-id="cfd3189b8a874ba4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;50d1f382fadafb8b-cfd3189b8a874ba4&#39;, &#39;&#39;, &#39;pcpid&#39;, &#39;&#39;]);"><i class="iconfont"></i></a>
        <span class="title">小米手机官方微信二维码</span>
    </div>
    <div class="modal-bd">
        <img alt="" src="{{ url('/Home/checkorder/site-weixin.png') }}" width="680" height="340">
    </div>
</div>


<script src="{{ url('/Home/checkorder/base.min.js') }}"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: 'http://order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: 'https://tp.hd.mi.com/',
        damiaoGoodsId:[],
        logoutUrl: 'http://order.mi.com/site/logout',
        staticSite: '//static.mi.com',
        quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
    };
    MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
    MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
    MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
    MI.miniCart.init();
    //MI.updateMiniCart();
})();
</script>



<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = '//c1.mifile.cn/f/i/15/stat/js/xmst.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
<div class="modal-backdrop fade in" style="width: 100%; height: 1935px;display:none;"></div>
</body></html>