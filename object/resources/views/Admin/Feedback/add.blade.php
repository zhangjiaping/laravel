@extends('Admin.base.parent')
@section('content')
	 <div class="block-area" id="text-input">
        <h3 class="block-title">添加问题反馈</h3>
        
        <p>填空添加问题反馈</p>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
        <div class="row">
            <form action='/admin/feedback' method='post'>
            	{{ csrf_field() }}
                <!-- 问题反馈的标题 -->
            	<div class="col-lg-12">
                    <span style="font-size:15px;">问题反馈标题：</span><input type="text" class="form-control m-b-10" name='name'>
                </div>
                <br>
                <!-- 问题反馈的描述 -->
                <span style="font-size:15px;margin-left:7px;">问题反馈的内容：</span>
                    <div class="md-editor tile" style="width:1100px;margin-left:7px;">
                         <textarea class="markdown-editor md-input" name="content" rows="10" style="resize: none;"></textarea>
                    </div>
                    <!-- 手机号 -->
                    <div class="col-lg-12">
                    <span style="font-size:15px;">手机号：</span><input type="text" class="form-control m-b-10" name='tel'>
                </div>
                <br><br>
	                <div class="col-lg-12">
	                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
	                </div>
	            </form>
	        </div>
    </div>
@endsection