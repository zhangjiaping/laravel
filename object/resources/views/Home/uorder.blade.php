@extends('Home.u_parent')
@section('address')
    <div class="uc-box uc-main-box" id='order' style='display:block;'>
        <div class="uc-content-box order-list-box">
            <div class="box-hd">
                <h1 class="title">我的订单<small>请谨防钓鱼链接或诈骗电话，<a href="">了解更多&gt;</a></small>
                </h1>
                <div class="more clearfix">
                    <ul class="filter-list J_orderType">
                        @if($id == 5)
                        <li class="first active" id='first'><a href="{{ url('home/userinfo/5')}}">全部有效订单</a>
                        </li>
                        @else
                        <li class="first" id='first'><a href="{{ url('home/userinfo/5')}}">全部有效订单</a>
                        </li>
                        @endif
                        @if($id == 0)
                        <li class="first active"><a id="J_unpaidTab" href="{{ url('home/userinfo/0')}}">待支付</a>
                        </li>
                        @else
                        <li class="first"><a id="J_unpaidTab" href="{{ url('home/userinfo/0')}}">待支付</a>
                        </li>
                        @endif
                        @if($id == 2)
                        <li class="first active"><a id="J_sendTab" href="{{ url('home/userinfo/2')}}">待收货</a>
                        </li>
                        @else
                        <li class="first"><a id="J_sendTab" href="{{ url('home/userinfo/2')}}">待收货</a>
                        </li>
                        @endif
                        @if($id == 3)
                        <li class="first active"><a href="{{ url('home/userinfo/3')}}">已关闭</a>
                        </li>
                        @else
                        <li class="first"><a href="{{ url('home/userinfo/3')}}">已关闭</a>
                        </li>
                        @endif
                    </ul>
                    <form id="J_orderSearchForm" class="search-form clearfix" action="{{ url('home/ordersearch') }}" method="get">
                        <label for="search" class="hide">站内搜索</label>
                        <input class="search-text" type="search" id="J_orderSearchKeywords" name="keywords" autocomplete="off" placeholder="输入商品名称、订单号">
                        <input type="submit" class="search-btn iconfont" value="">
                    </form>
                </div>
            </div>
            @if(count($order) < 1)
            <div class="box-bd" style='display:block;'>
                <div id="J_orderList"><p class="empty">当前没有待收货订单。</p></div>
                <div id="J_orderListPages"></div>
            </div>
            @else
            <div class="box-bd">
                @if($id != 0)
                <div id='finish'>
                    <ul class="order-list">
                        @foreach($order as $d)
                        <li class="uc-order-item uc-order-item-finish"> 
                            <div class="order-detail"> 
                                <div class="order-summary">
                                    @if($d->state == 1) 
                                    <div class="order-status">代发货</div> 
                                    @endif 
                                    @if($d->state == 2) 
                                    <div class="order-status">待收货</div> 
                                    @endif
                                    @if($d->state == 3) 
                                    <div class="order-status">已关闭</div> 
                                    @endif
                                    @if($d->state != 1 && $d->state != 2 && $d->state != 3 && $d->state != 0) 
                                    <div class="order-status">交易成功</div>
                                    @endif
                                </div> 
                                <table class="order-detail-table"> 
                                    <thead> 
                                        <tr> 
                                            <th class="col-main"> 
                                                <p class="caption-info">{{ $d->time }} <span class="sep">|</span>{{ $d->uname }}<span class="sep">|</span>订单号： <a href="{{ url('home/orderinfo/').'/'.$d->id }}">{{ $d->order_num }}</a><span class="sep">|</span>{{ $d->payname }}</p> 
                                            </th> 
                                            <th class="col-sub"> 
                                                <p class="caption-price">订单金额：<span class="num">{{ $d->total }}</span>元</p> 
                                            </th> 
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        <tr> 
                                            <td class="order-items"> 
                                                <ul class="goods-list">  
                                                    <li> 
                                                        <div class="figure figure-thumb">   
                                                            <a href="" target="_blank"> <img src="{{ url('Admin/upload').'/'.$d->gpic }}" width="80" height="80" alt="红米4X&nbsp;高透软胶保护套 透明"> </a>   
                                                        </div> 
                                                        <p class="name"> <a target="_blank" href="">{{ $d->gname }}&nbsp;</a>  </p> <p class="price">{{ $d->price }}元 × {{ $d->gnum }}</p>
                                                    </li>  
                                                </ul> 
                                            </td> 
                                            <td class="order-actions">      
                                                <a class="btn btn-small btn-line-gray" href="{{ url('home/orderinfo/').'/'.$d->id }}">订单详情</a>
                                                @if($d->state == 2)
                                                 <a class="btn btn-small btn-line-gray" href="{{ url('home/getorder').'/'.$d->id }}">确认收货</a>
                                                @else
                                                <a class="btn btn-small btn-line-gray" href="javascript:doDel({{ $d->id }})">删除订单</a>
                                                @endif     
                                            </td> 
                                        </tr> 
                                    </tbody> 
                                </table> 
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @else
                <!-- 代付款 -->
                <div id='dzf'>
                    <ul class="order-list">
                        @foreach($dzf as $b)
                        <li class="uc-order-item uc-order-item-pay"> 
                            <div class="order-detail"> 
                                <div class="order-summary"> 
                                    <div class="order-status">等待付款</div>  
                                    <p class="order-desc J_deliverDesc">  预计5天内发货 </p>   
                                </div> 
                                <table class="order-detail-table"> 
                                    <thead> 
                                        <tr> 
                                            <th class="col-main"> <p class="caption-info">{{ $b->time }}<span class="sep">|</span>aaa<span class="sep">|</span>订单号： <a href="{{ url('home/orderinfo/').'/'.$b->id }}">{{ $b->order_num }}</a><span class="sep">|</span></p> 
                                            </th> 
                                            <th class="col-sub"> 
                                                <p class="caption-price">订单金额：<span class="num">{{ $b->total }}</span>元</p> 
                                            </th> 
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        <tr> 
                                            <td class="order-items"> 
                                                <ul class="goods-list">  
                                                    <li> 
                                                        <div class="figure figure-thumb">   
                                                            <a href="" target="_blank"> <img src="{{ url('Admin/upload').'/'.$b->gpic }}" width="80" height="80" alt="1MORE金澈耳机 星空钛"> </a>  
                                                        </div> 
                                                        <p class="name"> <a target="_blank" href="">{{ $b->gname }} 清新版 黑色</a>  </p> <p class="price">{{ $b->price }} × {{ $b->gnum }}</p> 
                                                    </li>  
                                                </ul> 
                                            </td> 
                                            <td class="order-actions">     
                                                <a class="btn btn-small btn-primary" href="{{ url('home/pay/').'/'.$b->id }}">立即支付</a>  
                                                <a class="btn btn-small btn-line-gray" href="{{ url('home/orderinfo/').'/'.$b->id }}">订单详情</a> 
                                             </td>
                                        </tr> 
                                    </tbody> 
                                </table> 
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
    <form action="{{ url('home/orderdel/') }}" method='post' name='del'>
        {{ csrf_field() }}
    </form>
    <script type="text/javascript">
         function doDel(id)
        {
            if(confirm('确定要删除吗？')){
                var form = document.del;
                form.action = "{{ url('home/orderdel') }}/"+id;
                form.submit();
            }
        }
    $(function(){
        //给订单类别添加样式
        $('.first').click(function(){
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
    });
        
    </script>    
@endsection