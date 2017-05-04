@extends('Admin.base.parent')
@section('content')
<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改评论回复</h3>
        
        <p>填空修改评论回复</p>
        
        <div class="row">
            <form action='/admin/replay/{{ $ob->id }}' method='post' enctype='multipart/form-data'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                <!-- 评论的内容 -->
               <div class="col-lg-12">
                    <span style="font-size:15px;">评论内容：</span><input type="text" class="form-control m-b-10" name='cid' value="{{ $ob->cid }}">
                </div>
                <br>
                <!-- 回复内容 -->
            	<span style="font-size:15px;margin-left:7px;">回复内容：</span>
                <div style='width:1085px;margin-left:7px;' class="md-editor tile col-lg-12" id="1492093845675">
                    <textarea class="markdown-editor md-input" name="rcontent" rows="8" style="resize: none;">{{ $ob->rcontent }}</textarea>
                </div>
                <br>
                <!-- 回复的人 -->
             <div class="col-lg-12">
                    <span style="font-size:15px;">回复人：</span><input type="text" class="form-control m-b-10" name='replayer' value="{{ $ob->replayer }}">
                </div>
                <!-- 提交的地方 -->
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection