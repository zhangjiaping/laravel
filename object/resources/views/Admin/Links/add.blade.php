@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="basic">
        <h3 class="block-title">添加链接</h3>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tile p-15">
            <form role="form" action='/admin/links' method='post'>
                {{ csrf_field() }}
                <!-- 链接名称 -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Links name</label>
                    <input type="text" name='name' class="form-control input-sm" id="exampleInputEmail1" placeholder="Create name">
                </div>
                <!-- 链接地址 -->
                <div class="form-group">
                     <label for="exampleInputPassword1">Links url</label>
                    <input type="text" name='url' class="form-control input-sm" id="exampleInputPassword1" placeholder="Create url">
                </div>
                <!-- 链接开关 -->
                <p>Links switch</p>
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