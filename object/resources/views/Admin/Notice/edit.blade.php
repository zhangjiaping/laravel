@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改网站配置</h3>
        <div class="row">
            <form action='/admin/notice/{{ $ob->id }}' method='post'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                <!-- 公告标题 -->
                <div class="col-lg-12">
                   <span style="font-size:15px;">公告标题： </span><input type="text" class="form-control m-b-10"  name='title' value="{{ $ob->title }}">
                </div>
                <br>
                <!-- 公告内容 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">公告内容：</span><input type="text" class="form-control m-b-10" name='content' value="{{ $ob->content }}">
                </div>
                <br>
                <!-- 公告状态 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">公告状态：</span>
                    <select class="form-control m-b-10" name='type'>
                    	<option value="1" @if($ob->type==1)selected @endif>不重要</option>
                    	<option value="2" @if($ob->type==2)selected @endif>重要</option>
                    </select>
                </div>
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection