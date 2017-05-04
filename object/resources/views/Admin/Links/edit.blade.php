@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="basic">
        <h3 class="block-title">修改链接信息</h3>
        <div class="tile p-15">
            <form role="form" action='/admin/links/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!-- 链接名称 -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Links name</label>
                    <input type="text" name='name' value="{{ $ob->name }}" class="form-control input-sm" id="exampleInputEmail1" placeholder="Create name">
                </div>
                <!-- 链接地址 -->
                <div class="form-group">
                     <label for="exampleInputPassword1">Links url</label>
                    <input type="text" name='url' name='url' value="{{ $ob->url }}" class="form-control input-sm" id="exampleInputPassword1" placeholder="Create url">
                </div>
                <!-- 链接开关 -->
                <p>Links switch</p>
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