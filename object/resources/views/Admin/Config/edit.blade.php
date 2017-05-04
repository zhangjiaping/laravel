@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改网站配置</h3>
        <div class="row">
            <form action='/admin/config/{{ $ob->id }}' method='post' enctype='multipart/form-data'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                <!-- 网站标题 -->
                <div class="col-lg-12">
                   <span style="font-size:15px;">请输入网站标题： </span><input type="text" class="form-control m-b-10"  name='title' value="{{ $ob->title }}">
                </div>
                <br>
                <!-- 网站关键字 -->
            	<div class="col-lg-12">
                   <span style="font-size:15px;">请输入网站关键字： </span><input type="text" class="form-control m-b-10"  name='keys' value="{{ $ob->keys }}">
                </div>
                <br>
                <!-- 网站描述 -->
                <span style="font-size:15px;margin-left:5px;">网站配置描述：</span>
                <div style='width:1103px;height:150px;margin-left:7px;' class="md-editor tile col-lg-12" id="1492093845675">
                     <textarea class="markdown-editor md-input" row='5' name="desn" rows="10" style="resize: none;">{{ $ob->desn }}</textarea>
                </div>
                <br>
                <!-- 网站状态 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">网站的状态</span>
                    <select class="form-control m-b-10" name='state'>
                    	<option value="1" @if($ob->state==1)selected @endif>开</option>
                    	<option value="2" @if($ob->state==2)selected @endif>关</option>
                    </select>
                </div>
                <br>
                <!-- 网站logo -->
                <span style="font-size:15px;margin-left:5px;">请选择网站图片：</span>  
                <div style='margin-left:5px;' class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail small form-control"><img src="/Admin/upload/{{ $ob->logo }}"></div>
                    <span class="btn btn-file btn-alt btn-sm">
                        <input type='hidden' name='oldlogo' value="{{ $ob->logo }}">
                        <span class="fileupload-new">请选择您修改的图片</span>
                        <input type="file" name="logo" >
                    </span>
                    <a href="#" class="btn-sm btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection