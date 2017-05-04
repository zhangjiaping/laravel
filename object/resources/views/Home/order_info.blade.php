@extends('Home.u_parent')
@section('address')
    <!-- 订单详情 -->
    <div class="uc-box uc-main-box" id='order-info'>
        <div class="uc-content-box order-view-box">
            <div class="box-hd">
                <h1 class="title">订单详情<small>请谨防钓鱼链接或诈骗电话，<a href="">了解更多&gt;</a></small>
                </h1>
                <div class="more clearfix">
                    <h2 class="subtitle">订单号：{{ $order->order_num }}                        
                        <span class="tag tag-subsidy"></span>
                    </h2>
                </div>
            </div>
            <div class="box-bd">
                <div class="uc-order-item uc-order-item-pay">
                    <div class="order-detail">
                        <div class="order-summary">
                            @if($order->state == 0) 
                            <div class="order-status">代付款</div> 
                            @endif
                            @if($order->state == 1) 
                            <div class="order-status">代发货</div> 
                            @endif 
                            @if($order->state == 2) 
                            <div class="order-status">待收货</div> 
                            @endif
                            @if($order->state == 3) 
                            <div class="order-status">已关闭</div> 
                            @endif
                            @if($order->state != 1 && $order->state != 2 && $order->state != 3 && $order->state != 0) 
                            <div class="order-status">交易成功</div>
                            @endif
                            <div class="order-progress">
                                <ol class="progress-list clearfix">
                                    <li class="step step-first step-active">
                                        <div class="progress">
                                            <span class="text">下单</span>
                                        </div>
                                        <div class="info">04月28日 16:22</div>
                                    </li>
                                    <li class="step">
                                        <div class="progress">
                                            <span class="text">付款</span>
                                        </div>
                                        <div class="info"></div>
                                    </li>
                                    <li class="step">
                                        <div class="progress">
                                            <span class="text">配货</span>
                                        </div>
                                        <div class="info"></div>
                                    </li>
                                    <li class="step">
                                        <div class="progress">
                                            <span class="text">出库</span>
                                        </div>
                                        <div class="info"></div>
                                    </li>
                                    <li class="step step-last">
                                        <div class="progress">
                                            <span class="text">交易成功</span>
                                        </div>
                                        <div class="info"></div>
                                    </li>
                                </ol>
                            </div>  
                        </div>
                        <table class="order-items-table">
                            <tbody>
                                <tr>
                                    <td class="col col-thumb">
                                        <div class="figure figure-thumb">
                                            <a target="_blank" href="">
                                                <img src="{{ url('Admin/upload').'/'.$order->gpic }}" width="80" height="80" alt="">
                                            </a>                          
                                        </div>                            
                                    </td>
                                    <td class="col col-name">
                                        <p class="name">
                                            <a target="_blank" href="">{{ $order->gname }} 清新版 黑色</a>
                                        </a>    
                                    </td>
                                    <td class="col col-price">
                                        <p class="price">{{ $order->price }}元 × {{ $order->gnum }}</p>
                                    </td>
                                    <td class="col col-actions">

                                    </td>                      
                                </tr>   
                            </tbody>        
                        </table>            
                    </div>
                    <div id="editAddr" class="order-detail-info">
                        <h3>收货信息</h3>
                        <table class="info-table">
                            <tbody><tr>
                                <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th>
                                <td>{{ $address->consignee }}</td>
                            </tr>
                            <tr>
                                <th>联系电话：</th>
                                <td>{{ $address->consignee_phone }}</td>
                            </tr>
                            <tr>
                                <th>收货地址：</th>
                                <td>{{ $address->province }} {{ $address->city }} {{ $address->county }} {{ $address->detail }}</td>
                            </tr>
                        </tbody></table>                           
                    </div>
                    <div class="order-detail-total">
                        <table class="total-table">
                            <tbody>
                                <tr>
                                    <th>商品总价：</th>
                                    <td><span class="num">{{ $order->total }}</span>元</td>
                                </tr>
                                <tr>
                                    <th>运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</th>
                                    <td><span class="num">0</span>元</td>
                                </tr>
                                <tr>
                                    <th>订单金额：</th>
                                    <td><span class="num">{{ $order->total }}</span>元</td>
                                </tr>
                                <tr>
                                    <th class="total">实付金额：</th>
                                    <td class="total"><span class="num">{{ $order->total }}</span>元</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>    
@endsection