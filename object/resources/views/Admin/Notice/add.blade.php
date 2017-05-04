@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="text-input">
        <h3 class="block-title">添加公告管理</h3>
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
            <form action='/admin/notice' method='post'>
            	{{ csrf_field() }}
                <!-- 公告标题 -->
            	<div class="col-lg-12">
                    <span style="font-size:15px;">公告标题：</span><input type="text" class="form-control m-b-10" name='title'>
                </div>
                <br>
                <!-- 时间 -->
                <input type="hidden" class="form-control m-b-10" name='time' id="did">
                <!-- 生成时间 -->
                <script type="text/javascript">
                    var did = document.getElementById('did');
                    var y,m,d,h,i,s,info;

                    setInterval(function(){
                        //生成时间对象，获取当前这一瞬间的时间
                        var date = new Date();

                        y = date.getFullYear(); //获取4位数的年份
                        m = date.getMonth()+1;  //获取月份（0-11）
                        d = date.getDate();     //获取天数（1~31）

                        h = date.getHours();    //获取时
                        i = date.getMinutes();  //获取分
                        s = date.getSeconds();  //获取秒

                        s = (s<10)?'0'+s:s;
                        i = (i<10)?'0'+i:i;

                        info = y+'-'+m+'-'+d+' '+h+':'+i+':'+s;

                        did.value = info;
                    },1000);
                </script>
                <!-- 公告内容 -->
                <span style="font-size:15px;margin-left:7px;">公告内容：</span>
                <div style='width:1103px;margin-left:7px;' class="md-editor tile col-lg-12" id="1492093845675">
                    <textarea class="markdown-editor md-input" name="content" rows="8" style="resize: none;"></textarea>
                </div>
                <br>
                <!-- 公告状态 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">公告的状态：</span>
                    <select class="form-control m-b-10" name='type'>
                        <option value="1" >不重要</option>
                        <option value="2" >重要</option>
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