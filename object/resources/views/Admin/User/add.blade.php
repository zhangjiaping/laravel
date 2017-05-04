@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户</h3>
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
            <form action='/admin/user' method='post' id='myform'>
               	{{ csrf_field() }}
                <!-- 用户名 -->
                <div class="col-lg-12">
                    <label>Name</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='username'>
                </div>
                <!-- 年龄 -->
                <div class="col-lg-12">
                    <label>Age</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入年龄" id='age' name='age'>
                </div>
                <!-- 性别 -->
                <div class="col-lg-12">
                    <label>Sex</label>
                    <select class="form-control m-b-10" name='sex'>
                        <option>--请选择--</option>
                        <option value='1'>男</option>
                        <option value='2'>女</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' id='btn' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
<script type="text/javascript">           
    /*$("form :input.form-control").blur(function(){
        //验证用户名
        if($(this).val() =="" || $(this).val() == '0'){
            alert('请根据提示填写');
            $('#btn').css('display','none');
        }else{
            $('#btn').css('display','block');
        }
        //验证年龄
        if( $(this).is('#age') ){
            if( this.value=="" || ( !/^[1-100]$/.test(this.value) ) ){
                alert('请根据提示填写');
            $('#btn').css('display','none');
            }else{
                $('#btn').css('display','block');
            }
        }
    }); */
</script>

@endsection