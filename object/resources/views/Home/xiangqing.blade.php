
@extends('Home.parent')
@section('content')
    <style type="text/css">
        .cc{
            background:#FF6700;
        }
    </style>
    <div id="J_proHeader">
        <div class="xm-product-box"> 
            <div class="nav-bar" id="J_headNav"> 
                <div class="container J_navSwitch"> 
                    <h2 class="J_proName">
                        {{ $good->name }}
                    </h2> 
                    <div class="con">
                        <div class="right">   
                            <a href="/home/comment/{{ $good->name }}/{{ $good->id }}">
                                用户评价
                            </a>   
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
<div class="xm-buyBox" id="J_buyBox">
    <div class="box clearfix">
        <div class="pro-choose-main container clearfix" >
            <div class="pro-view span10" style="position:absolute;" id="dd">
                <div id="J_img" class="img-con" style="left: 62.5px; margin-top: 0px;">
                    <div class="ui-wrapper" style="max-width: 100%">
                        <div class="ui-viewport" style="width: 100%;  position: relative; height: 560px;">
                            <div id="J_sliderView" class="sliderWrap" style="width: auto; position: relative;">
                               <!--  <img data-src="//i8.mifile.cn/a1/pms_1490088825.9269802.jpg?width=560&amp;height=560" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 560px; z-index: 0; display: none;" src="{{ url('Admin/upload').'/'.$good->pic }}"> -->
                                <img id="img1" data-src="//i8.mifile.cn/a1/pms_1490088826.31869499.jpg?width=560&amp;height=560" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 560px; z-index: 50; display: block;" src="{{ url('Admin/upload').'/'.$good->pic }}">
                                <img id="img2"data-src="//i8.mifile.cn/a1/pms_1490088826.31869499.jpg?width=560&amp;height=560" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 560px; z-index: 50; display: none;" src="{{ url('Admin/upload').'/'.$good->picleft }}">
                                <img id="img3" data-src="//i8.mifile.cn/a1/pms_1490088826.31869499.jpg?width=560&amp;height=560" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 560px; z-index: 50; display: none;" src="{{ url('Admin/upload').'/'.$good->picright }}">
                                
                            </div>
                             @if($good->type == 6 || $good->type == 12)
                            <div style="margin-left:190px;">
                                <div id="c1" style="width:50px;height:50px;border:1px solid black;float:left;"><img data-src="//i8.mifile.cn/a1/pms_1490088826.31869499.jpg?width=50&amp;height=50" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 50px; z-index: 50;height:50px;" src="{{ url('Admin/upload').'/'.$good->pic }}"></div>
                                <div id="c2" style="width:50px;height:50px;border:1px solid black;float:left;margin-left:20px;"><img data-src="//i8.mifile.cn/a1/pms_1490088826.31869499.jpg?width=50&amp;height=50" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 50px; z-index: 50;height:50px;" src="{{ url('Admin/upload').'/'.$good->picleft }}"></div>
                                <div id="c3" style="width:50px;height:50px;border:1px solid black;float:left;margin-left:20px;"><img data-src="//i8.mifile.cn/a1/pms_1490088826.31869499.jpg?width=50&amp;height=50" class="slider done" style="float: none; list-style: outside none none; position: absolute; width: 50px; z-index: 50;height:50px;" src="{{ url('Admin/upload').'/'.$good->picright }}"></div>
                            </div>
                            @endif
                        </div>
                        <script type="text/javascript">
                            $('#c1').click(function(){
                                $('#img1').css('display','block');
                                $('#img2').css('display','none');
                                $('#img3').css('display','none');
                            });
                            $('#c2').click(function(){
                                $('#img1').css('display','none');
                                $('#img2').css('display','block');
                                $('#img3').css('display','none');
                            });
                            $('#c3').click(function(){
                                $('#img1').css('display','none');
                                $('#img2').css('display','none');
                                $('#img3').css('display','block');
                            });
                        </script>
                        <div class="ui-controls ui-has-pager ui-has-controls-direction">
                            <div class="ui-pager ui-default-pager">
                                <!-- <div class="ui-pager-item">
                                    <a href="" data-slide-index="0" class="ui-pager-link">1</a>
                                </div>
                                <div class="ui-pager-item">
                                    <a href="" data-slide-index="1" class="ui-pager-link active">2</a>
                                </div> -->
                            </div>
                            <!-- <div class="ui-controls-direction">
                                <a class="ui-prev" href="">上一张</a>
                                <a class="ui-next" href="">下一张</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="pro-info span10">
                <h1 class="pro-title J_proName">{{ $good->name }}</h1>
                <!-- 提示 -->
                <p class="sale-desc" id="J_desc">{{ $good->body }}</p>
                <!-- 选择第一级别 -->
                <span class="pro-price J_proPrice" id='first'>{{ $good->price }}元</span>
                <div class="loading J_load hide">
                    <div class="loader"></div>
                </div>
                <div class="J_main">
                    <div class="list-wrap" id="J_list">   
                    <div class="pro-choose pro-choose-col2 J_step" data-index="0"> 
                        <div class="step-title">
                          选择版本    
                        </div> 
                      <ul class="step-list step-one clearfix" id="ulid" style="width:615px;height:210px;">   

                        @foreach($good->bb as $k => $b)
                        <li style="border:1px solid gray;width:300px;height:70px;float:left;" data-name="标准版 4GB内存+64GB" data-price="2799元  " data-index="0" data-value="标准版 4GB内存+64GB"> 
                            <a href="javascript:void(0);">
                            <span class="name" id="banben"> 
                                    {{ $b }}
                            </span> 
                            <span class="price" id="ps">
                                {{ $good->ps[$k] }}元
                            </span>  
                            </a> 
                        </li>
                        @endforeach       
                        
                    </ul> 
                </div>   
                <div class="pro-choose list-choose list-choose-small" id="J_safety"> 
                    <div class="step-title"> 
                        选择小米提供的意外险 
                        <a href="http://order.mi.com/product/insurance?type=mi_note2" target="_blank">了解意外险 &gt;
                        </a> 
                    </div> 
                    <ul> 
                        <li data-price="249元" data-name="意外损坏保险 小米Note 2" data-id="2164200023"> 
                            <i class="iconfont icon-checkbox"><em id='eid' >√</em>
                            </i> 
                                <img src="{{ url('Home/img/pms_1476762782.jpg') }}"> 
                                <div> <span class="name">意外损坏保险 {{ $good->name }}</span> <p class="desc">意外损坏，一年内免费换新。</p> 
                                    <span class="price" id="baoid">  
                                        {{($good->price/10)}}元                  
                                    </span> 
                                </div> 
                            </li> 
                        </ul>
                    </div>
                </div>
      
                    <div id="J_relation"></div>
                   
                    <!-- 已选择的产品 -->
                    <div class="pro-list" id="J_proList"> 
                        <ul>   
                            <li>小米手机Note 2 全网通版 4GB内存 64GB 亮银黑 64GB  
                                <span id="sid">{{ $good->price }}.00元</span>  
                            </li>  
                            <li id="a_1" style="display:none">{{ $good->name }} 意外险  
                                <span id='yw'>
                                    {{ $good->price/10 }}元
                                </span>  
                            </li>         
                            <li class="totlePrice" id='zid'>
                                {{ $good->price }}元
                            </li> 
                        </ul>
                    </div>
                    <ul class="btn-wrap clearfix" id="J_buyBtnBox">       <li> <a href="javascript:void(0)" class="btn btn-primary btn-biglarge J_proBuyBtn" id='addgoods'>加入购物车</a> </li>      </ul>
                    <div class="pro-policy" id="J_policy">
                        <i class="iconfont support"></i>
                        <i class="iconfont nosupport hide"></i>
                        <span class="J_tips ">支持7天无理由退货</span>
                    </div>
                    <form action="{{ url('home/addgoods') }}" method='post' name='addgoods'>
                        {{ csrf_field() }}
                        <input type='hidden' name='gname' value="{{ $good->name }}">
                        <input type='hidden' name='gpic' value="{{ $good->pic }}">
                        <input type='hidden' name='price'>
                        <input type='hidden' name='gid' value="{{ $good->id }}">
                        <input type='hidden' name='stock' value="{{ $good->stock }}">
                        @if(session('user'))
                        <input type='hidden' name='uid' value="{{ session('user')->id }}">
                        @endif
                        <input type='hidden' name='total' >
                    </form>
                    <script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
                    <script type="text/javascript">
                        $('#addgoods').click(function(){
                            $('input[name="price"]').val(parseInt($('#zid').text()));
                            $('input[name="total"]').val(parseInt($('#zid').text()));
                            document.addgoods.submit();
                        });
                    </script>
                    <div class="J_addressWrap"> 
                        <div class="user-default-address" id="J_userDefaultAddress"> 
                            <i class="iconfont iconfont-location">
                            </i> 
                            <div>   
                                <div class="address-info" id='from'>
                                    
                                </div> 
                                <span class="switch-choose-regions" id="J_switchChooseRegions"> 
                                    选择城市 
                                </span> 
                                <br><br>
                                <div style="float:right margin-right:110px;display:none" id='city'>
                                    <select name='type' id='cid'>
                                        <option value=''>--请选择省份--</option>
                                    </select>
                                    <input type="submit" value="确认">
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="site-info" style="background:#FFFFFF"> -->
    <script>
    (function() {
        MI.namespace('GLOBAL_CONFIG');
        MI.GLOBAL_CONFIG = {
            orderSite: '//order.mi.com',
            wwwSite: '//www.mi.com',
            cartSite: '//cart.mi.com',
            itemSite: '//item.mi.com',
            assetsSite: '//s01.mifile.cn',
            listSite: '//list.mi.com',
            searchSite: '//search.mi.com',
            mySite: '//my.mi.com',
            damiaoSite: '//tp.hd.mi.com/',
            
damiaoGoodsId:["2160400006","2160400007","2162100004","2162800010","2155300001","2155300002","2163500025","2163500026","2163500027","2164200021","2142400036","2163900015","2170800008","2171000055"],

            damiaoPresalesGoodsId:[],
            logoutUrl: '//order.mi.com/site/logout',
            staticSite: '//static.mi.com',
            quickLoginUrl: 
'https://account.xiaomi.com/pass/static/login.html'
        };
        MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + 
'/user/order';
        MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
        MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
        MI.miniCart.init();
        MI.updateMiniCart();      
    })();
    </script>

    <script src="{{ url('Home/js/base.js') }}"></script>
    <script src="{{ url('Home/js/xmsg_ti.js') }}"></script>
    <script type="text/javascript" src="{{ url('Home/js/product_buy.js') }}"></script>
    @if($good->type == 1||$good->type == 6 )
        <div > 
             <div>  
                <img src="{{ url('Home/img/beb93b2f8a369c4acc1f084e3a347108.jpg') }}">   
            </div>     
            <div>  
                <img src="{{ url('Home/img/dc1b76ea7388c7cb4dc47840125f7ec1.jpg') }}" >   
            </div>
        </div>
    @endif    
<!-- 全部商品 -->
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
    
    $('#J_switchChooseRegions').click(function(){
        $('#city').css('display','block');
    });
    $('#city :submit').click(function(){
        $('#from>span').remove();
        $('#J_switchChooseRegions').html('修改');
        $('#city').css('display','none');
        $('#city option:selected').each(function(){
        if($(this).html() == '--请选择--'){
            $(this).html().remove();
        }
        var aa = $(this).html();
        $('#from').append("<span>&nbsp;&nbsp;"+aa+"</span>");
        });
    });
    var a;
    $('#ulid>li').click(function(){
        a = $(this);
        $('#a_1').css('display','none');
        $('#eid').removeClass('cc');
        $(this).siblings().css('border','1px solid gray');
        $(this).css('border','1px solid #FF4A00');
        $('#sid').html($(this).children().children('span:last').html());
        $('#baoid').html(parseFloat($(this).children().children('span:last').html())/10+'元');
        $('#yw').html(parseFloat($(this).children().children('span:last').html())/10+'元');
        $('#zid').html(parseFloat($(this).children().children('span:last').html())+'元');
        $('#first').html(parseFloat($(this).children().children('span:last').html())+'元');    
    });
    $('#eid').click(function(){
            // alert(11111);
            $(this).toggleClass('cc');
            if($(this).attr('class')){
                $('#zid').html(parseFloat(a.children().children('span:last').html())/10+parseFloat(a.children().children('span:last').html())+'元');
                $('#a_1').css('display','block');
            }else{
                $('#zid').html(parseFloat(a.children().children('span:last').html())+'元');
                $('#a_1').css('display','none');
            }
        });
     //  $(function(){ 
     //    $(window).scroll(function(){ 
     //        var top = $(window).scrollTop()+40; 
     //        var left= $(window).scrollLeft()+13; 
     //        $("#dd").css({ left:left + "px", top: top + "px" }); 
     //    }); 
     // });
    // 城市联动
        $.ajax({
            url:'{{ url("home/city/get") }}',
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
            },
            error:function()
            {
                alert('ajax请求失败');
            }
        });

        //给所有的select标签绑定change事件
        $('select').live("change",function(){
            //干掉当前你选择的select标签后面的select标签
            $(this).nextAll('select').remove();
            //判断你选择是不是--请选择--
            if($(this).val() != '--请选择--'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
                var ob = $(this);
                $.ajax({
                    url:'{{ url("home/city/post") }}',
                    type:'post',
                    async:true,
                    data:{upid:$(this).val(),'_token':'{{ csrf_token() }}'},
                    dataType:'json',
                    success:function(data)
                    {
                        // console.log(data);
                        //判断是不是最后一级城市，最后一级城市查数据库length==0
                        if(data.length>0){
                            //生成一个新的select标签
                            var select = $("<select name='city1[]'><option>--请选择--</option></select>");
                            //遍历从数据库查出来的数据，生成option选项追加到select里
                            for (var i = 0; i < data.length; i++) {
                                $(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            };
                            //外部插入到前一个select后面
                            ob.after(select);
                        }
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            }
        });
        
    </script>
</script>
@endsection