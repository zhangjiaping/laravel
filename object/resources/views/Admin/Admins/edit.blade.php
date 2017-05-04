@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        
        <p>填空修改用户</p>
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
            <form action='/admin/admins/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="{{ $ob->name }}">
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='root' id="sid">
                        <option value='1' @if ($ob->root == 1)selected @endif>超级管理员</option>
                        <option value='0' @if ($ob->root == 0)selected @endif>管理员</option>
                    </select>
                </div>
                @if(session('adminuser')->root == 1)
                <div class="col-lg-4">
                    <input type="pass" class="form-control m-b-10" placeholder="请输入新密码" name='pass' required>
                </div>
                @endif
                <div class="col-lg-8">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
    <script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
    @if(session('adminuser')->root == 0)
    <script type="text/javascript">
        $('#sid').attr('disabled','disabled');
    </script>
    @endif
@endsection