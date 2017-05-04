@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">订单信息列表</h3>
        @if(session('msg'))
            <div class="alert alert-success alert-icon">
                {{ session('msg') }}
                <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
                {{ session('error') }}
                <i class="icon"></i>
            </div>
        @endif    
        <div class="table-responsive overflow">
            <form action="/links" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>

            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>商品名称</th>
                        <th>收货人</th>
                        <th>商品价格</th>
                        <th>商品数量</th>
                        <th>商品总价</th>
                        <th>商品状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->order_num }}</td>
	                        <td>{{ $v->gname }}</td>
	                        <td>{{ $v->uname }}</td>
                            <td>{{ $v->price }}</td>
                            <td>{{ $v->gnum }}</td>
                            <td>{{ $v->total }}</td>
                            @if ($v->state == 0)
                                <td>待付款</td>
                            @endif
                            @if ($v->state == 1)
                                <td>待发货</td>
                            @endif
                            @if ($v->state == 2)
                                <td>待收货</td>
                            @endif
                            @if ($v->state == 3)
                                <td>已发货</td>
                            @endif
                            @if ($v->state == 4)
                                <td>已接受</td>
                            @endif
	                        
	                        <td>
                                @if ($v->state == 1)
                                    <a class="btn btn-sm btn-alt m-r-5" href='/admin/order/{{ $v->id }}/edit'>去发货</a>
                                @else
	                        	<a class="btn btn-sm btn-alt m-r-5" disabled href='/admin/order/{{ $v->id }}/edit'>去发货</a>
                                @endif
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
                 {{ $list->links() }}
            </table>
        </div>
    </div>
@endsection
