@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="multi-column">
        <h3 class="block-title">发货</h3>
        <form class="row form-columned" role="form" name='myform' action="/admin/order/{{ $list->id }}" method='post'>
            <input type='hidden' name='ftime' value="{{ $list->ftime }}">
            <input type='hidden' name='state'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <!-- 订单号 -->
            <div class="col-md-12">
                <label>订单号</label>
                <input type="text" disabled class="form-control input-sm m-b-10" value="{{ $list->order_num }}">
            </div>
            <!-- 商品名称 -->
            <div class="col-md-12">
                <label>商品名称</label>
                <input type="text" disabled class="form-control input-sm m-b-10" value="{{ $list->gname }}">
            </div>
             <!-- 商品单价 -->
            <div class="col-md-12">
                <label>商品单价</label>
                <input type="text" disabled class="form-control input-sm m-b-10" value="{{ $list->price }}">
            </div>
            <!-- 收货人姓名 -->
            <div class="col-md-12">
                <label>收货人姓名</label>
                <input type="text" disabled class="form-control input-sm m-b-10" value="{{ $list->uname }}">
            </div>
            <!-- 配送方式 -->
            <div class="col-md-12">
                <label>配送方式</label>
                <select class="form-control input-sm m-b-15" name='dilivery' >
                    @foreach($dilivery as $k => $v)
                    <option value="{{ $v->id }}">{{ $v->expressage }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-sm" id='submit'>Save Profile</button>
            </div>
        </form>
    </div>
@endsection
