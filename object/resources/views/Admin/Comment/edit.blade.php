@extends('Admin.base.parent')
@section('content')
<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改发帖管理</h3>
        
        <p>填空修改发帖</p>
        
        <div class="row">
            <form action='/admin/comment/{{ $ob->id }}' method='post'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                 <!-- 时间 -->
                    <input type="hidden" class="form-control m-b-10" name='time' value="{{  $ob->time }}" id="did">
                <!-- 时间 -->
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
                <br>
                <div class="col-lg-12">
                    <span style="font-size:15px;">发帖内容：</span><input type="text" class="form-control m-b-10" name='content' value="{{ $ob->content }}">
                </div>
                <br>
                <!-- 是否高亮 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">发帖是否高亮</span>
                    <select class="form-control m-b-10" name='gaoliang'>
                        <option value="1" @if($ob->gaoliang==1)selected @endif>不高亮</option>
                        <option value="2" @if($ob->gaoliang==2)selected @endif>高亮</option>
                    </select>
                </div>
                <!-- 是否加精 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">发帖是否加精</span>
                    <select class="form-control m-b-10" name='jinghua'>
                        <option value="1" @if($ob->jinghua==1)selected @endif>不加精</option>
                        <option value="2" @if($ob->jinghua==2)selected @endif>加精</option>
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