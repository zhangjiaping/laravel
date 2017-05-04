@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加商品</h3>
        
        <p>填空添加商品</p>
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
            <form action='/admin/goods' method='post'>
                {{ csrf_field() }}
                <div class="col-lg-7">
                    <select class="form-control m-b-10" name='type' id='cid'>
                        <option value=''>--请选择商品类型--</option>
                        <!-- @foreach($type as $v)
                        @if($v->upid == 0) -->
                        <!-- <option value="{{ $v->id }}">{{ $v->name }}</option>  -->
                        <!-- @endif 
                        @endforeach -->
                    </select>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名称" name='name'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品价格" name='price'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品库存" name='stock'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品参数" name='body'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品标题" name='title'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品版本" name='bb'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入各版本价格" name='prices'>
                </div>
                <div class="col-lg-7">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection
    <script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{ url('admin/ajax/get') }}",
            type:'get',
            async:true,
            data:{upid:0},
            dataType:'json',
            success:function(data)
            {
                // alert(11111111);
                // console.log(data);
                //遍历从数据库查出来的数据，生成option选项追加到select里
                for (var i = 0; i < data.length; i++) {
                    $('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                };
            },
            error:function()
            {
                alert('ajax请求失败');
            }
        });

        //给所有的select标签绑定change事件
        $('select').live("change",function(){
            //干掉当前你选择的select标签后面的select标签
            $(this).nextAll('select').remove();
            //判断你选择是不是--请选择--
            if($(this).val() != '--请选择商品类型--'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
                var ob = $(this);
                $.ajax({
                    url:'{{ url("admin/ajax/post") }}',
                    type:'post',
                    async:true,
                    data:{upid:$(this).val(),'_token':'{{ csrf_token() }}'},
                    dataType:'json',
                    success:function(data)
                    {
                        // alert(data);
                        // console.log(data);
                        //判断是不是最后一级城市，最后一级城市查数据库length==0
                        if(data.length>0){

                            //生成一个新的select标签
                            var select = $("<select class='form-control m-b-10' name='type' id='sid'></select>");
                            if($('#sid')){
                                $('#cid').attr('name','');
                            }
                            //遍历从数据库查出来的数据，生成option选项追加到select里
                            for (var i = 0; i < data.length; i++) {
                                $(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            };
                            //外部插入到前一个select后面
                            ob.after(select);
                        }
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            }
        });
        
    </script>