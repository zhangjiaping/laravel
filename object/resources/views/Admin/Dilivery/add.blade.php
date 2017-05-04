@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="text-input">
        <h3 class="block-title">添加配送管理</h3>
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
            <form action='/admin/dilivery' method='post'>
            	{{ csrf_field() }}
                <!-- 快递公司名 -->
            	<div class="col-lg-12">
                    <span style="font-size:15px;">快递公司名：</span><input type="text" class="form-control m-b-10" name='expressage'>
                </div>
                <br>
                <!-- 快递员的名字 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">快递员的名字：</span><input type="text" class="form-control m-b-10" name='uname'>
                </div>
                <br>
                <!-- 配送员的手机号 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">快递员的手机号：</span><input type="text" class="form-control m-b-10" name='Tel'>
                </div>
                <br>
                <!-- 配送说明 -->
                <div class="col-md-12">
                    <span style="font-size:15px;">配送说明：</span>
                    <textarea class="form-control m-b-10" name="content"></textarea>
                </div>
                <div class="col-lg-12" algin="center">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection