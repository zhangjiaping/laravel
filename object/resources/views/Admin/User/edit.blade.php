@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        <div class="row">
            <form action='/admin/user/{{ $ob->id }}' method='post'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                <!-- 用户名 -->
                <div class="col-lg-12">
                    <label>Name</label>
                    <input type="text" class="form-control m-b-10" name='username' value="{{ $ob->username }}">
                </div>
                <!-- 年龄 -->
                <div class="col-lg-12">
                <label>Age</label>
                    <input type="text" class="form-control m-b-10" name='age' value="{{ $ob->age }}">
                </div>
                <!-- 性别 -->
                <div class="col-lg-12">
                    <label>sex</label>
                    <select class="form-control m-b-10" name='sex'>
                        <option value='1' @if($ob->sex == 1)selected @endif>男</option>
                        <option value='2' @if($ob->sex == 2) selected @endif>女</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection