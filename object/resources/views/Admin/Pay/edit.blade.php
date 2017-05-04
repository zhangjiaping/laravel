@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="basic">
        <h3 class="block-title">修改支付信息</h3>
        <div class="tile p-15">
            <form role="form" action='/admin/pay/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!-- 转入账号 -->
                <div class="form-group">
                    <label for="exampleInputEmail1">转入账号</label>
                    <input type="text" name='name' value="{{ $ob->name }}" class="form-control input-sm" id="exampleInputEmail1">
                </div>
                <!-- 备注 -->
                <div class="form-group">
                     <label for="exampleInputPassword1">备注</label>
                    <input type="text" name='content' value="{{ $ob->content }}" class="form-control input-sm" id="exampleInputPassword1">
                </div>
                <!-- 是否开启支付 -->
                <p>是否开启支付</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="switch" value='1' @if($ob->switch == 1)checked @endif>开
                    </label>    
                </div>                    
                <div class="radio">
                    <label>
                        <input type="radio" name="switch" value='2'  @if($ob->switch == 2)checked @endif>关
                    </label>
                </div>
                <button type="submit" class="btn btn-sm m-t-10">Ok</button>
                <button type="reset" class="btn btn-sm m-t-10">Cancel</button>
            </form>
        </div>
    </div> 
@endsection