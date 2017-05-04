@extends('Admin.base.parent')
@section('content')
<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改问题反馈管理</h3>
        
        <p>填空问题反馈管理</p>
        
        <div class="row">
            <form action='/admin/feedback/{{ $ob->id }}' method='post'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                <!-- 问题反馈的标题 -->
                <div class="col-lg-20">
                   <span style="font-size:15px;">请输入修改问题反馈的标题： </span><input type="text" class="form-control m-b-10"  name='name' value="{{ $ob->name }}">
                </div>
                <br>
                <!-- 问题反馈描述 -->
                <span style="font-size:15px;">请输入修改问题反馈的内容： </span>
                    <div class="md-editor tile">
                         <textarea class="markdown-editor md-input" name="content" rows="10" style="resize: none;">{{ $ob->content }}</textarea>
                    </div>
                    <br>
                    <!-- 手机号 -->
                    <div class="col-lg-20">
                   <span style="font-size:15px;">请输入修改手机号： </span><input type="text" class="form-control m-b-10"  name='tel' value="{{ $ob->tel }}">
                </div>
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection