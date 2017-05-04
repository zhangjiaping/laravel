@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="basic">
        <h3 class="block-title">添加支付方式</h3>
        <div class="tile p-15">
            <form role="form" action='/admin/pay' method='post'>
                {{ csrf_field() }}
                <!-- 支付账户 -->
                <div class="form-group">
                    <label for="exampleInputEmail1">支付账户</label>
                    <input type="text" name='name' class="form-control input-sm" id="exampleInputEmail1" placeholder="Create name">
                </div>
                <!-- 备注 -->
                <div class="form-group">
                     <label for="exampleInputPassword1">备注</label>
                    <input type="text" name='content' class="form-control input-sm" id="exampleInputPassword1" placeholder="Description">
                </div>
                <!-- 支付开关 -->
                <p>是否开启支付</p>
                <div class="make-switch has-switch">
                    <div class="switch-on switch-animate">
                        <input type="checkbox" name='switch' value='1' checked='checked'><span class="switch-left">ON</span><label>&nbsp;</label><span class="switch-right">OFF</span>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-sm m-t-10">Ok</button>
                <button type="reset" class="btn btn-sm m-t-10">Cancel</button>
            </form>
        </div>
        
        <script type="text/javascript" src="{{ asset('Admin/js/jquery-1.8.3.min.js') }}"></script>
        <script type="text/javascript">
            $('.switch-animate').toggle(function(){
                $(this).removeClass('switch-on').addClass('switch-off');
                $('input[name="switch"]').val(2).attr('checked','checked');
            },function(){
                $(this).removeClass('switch-off').addClass('switch-on');
                $('input[name="switch"]').val(1).attr('checked','checked');
            });
        </script>
    </div>    
@endsection