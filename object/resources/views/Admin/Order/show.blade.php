@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="multi-column">
        <h3 class="block-title">查询订单</h3>
        <form action='/admin/select' method='get'>
            <div class="col-md-15">
                <label>查询类型</label>
                <select class="form-control input-sm m-b-15" name='type' >
                    <option>--请选择--</option>
                    <option value='1'>订单号</option>
                    <option value='2'>商品名称</option>
                    <option value='3'>付款时间</option>
                </select>
            </div>
            <label>查询内容</label>
            <input type="text" class="form-control input-sm m-b-10" name='select'>
            <div class="col-md-15">
                <button type="submit" class="btn btn-sm">搜索</button>
            </div>
        </form>
        <table class="table table-bordered table-hover tile">
            <thead>
                <tr>
                    <th>订单号</th>
                    <th>商品名称</th>
                    <th>收货人</th>
                    <th>商品总价</th>
                    <th>订单状态</th>
                    <th>下单时间</th>
                    <th>发货时间</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $v)
                    <tr>
                        <td>{{ $v->order_num }}</td>
                        <td>{{ $v->gname }}</td>
                        <td>{{ $v->uname }}</td>
                        <td>{{ $v->total }}</td>
                        @if ($v->state == 3)
                            <td>已发货</td>
                        @elseif($v->state == 4)
                            <td>已接受</td>
                        @else
                            <td>代付款</td>        
                        @endif
                        <td>{{ $v->time }}</td>
                        <td>{{ $v->ftime }}</td>
                    </tr>
                @endforeach
            </tbody>
             {{ $list->appends($where)->links() }}
        </table>
    </div>    
@endsection