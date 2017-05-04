@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="text-input">
        <h3 class="block-title">添加网站配置</h3>
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
            <form action='/admin/config' method='post'>
            	{{ csrf_field() }}
                <!-- 网站标题 -->
            	<div class="col-lg-12">
                    <span style="font-size:15px;">网站标题：</span><input type="text" class="form-control m-b-10" name='title'>
                </div>
                <br>
                <!-- 网站关键字 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">网站关键字：</span><input type="text" class="form-control m-b-10" name='keys'>
                </div>
                <br>
                <!-- 网站描述 -->
                <span style="font-size:15px;margin-left:5px;">网站配置描述：</span>
                <div style='width:1103px;margin-left:7px;' class="md-editor tile col-lg-12" id="1492093845675">
                    <textarea class="markdown-editor md-input" name="desn" rows="8" style="resize: none;"></textarea>
                </div>
                <br><br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection