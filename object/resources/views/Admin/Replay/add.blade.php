@extends('Admin.base.parent')
@section('content')
    <!-- <div class="block-area" id="text-input"> -->
	<div class="block-area" id="text-input">
        <h3 class="block-title">添加评论回复</h3>
        
        <p>填空添加评论回复</p>
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
            <form action='/admin/replay' method='post'>
            	{{ csrf_field() }}
                <!-- 评论的内容 -->
            	<div class="col-lg-12">
                    <span style="font-size:15px;">评论内容：</span><input type="text" class="form-control m-b-10" name='cid'>
                </div>
                <br>
                <!-- 回复的内容 -->
                <span style="font-size:15px;margin-left:7px;">回复内容：</span>
                <div style='width:1085px;margin-left:7px;' class="md-editor tile col-lg-12" id="1492093845675">
                    <textarea class="markdown-editor md-input" name="rcontent" rows="8" style="resize: none;"></textarea>
                </div>
               <!-- 回复的人 -->
                 <div class="col-lg-12">
                    <span style="font-size:15px;">回复人：</span><input type="text" class="form-control m-b-10" name='replayer'>
                </div>
                <br><br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection