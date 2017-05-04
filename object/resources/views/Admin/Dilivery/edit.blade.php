@extends('Admin.base.parent')
@section('content')
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改网站配置</h3>
        <div class="row">
            <form action='/admin/dilivery/{{ $ob->id }}' method='post'>
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                <!-- 快递公司名 -->
                <div class="col-lg-12">
                   <span style="font-size:15px;">快递公司名： </span><input type="text" class="form-control m-b-10"  name='expressage' value="{{ $ob->expressage }}">
                </div>
                <br>
                <!-- 快递员的名字 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">快递员的名字：</span><input type="text" class="form-control m-b-10" name='uname' value="{{ $ob->uname }}">
                </div>
                <br>
                <!-- 快递员的手机号 -->
                <div class="col-lg-12">
                    <span style="font-size:15px;">快递员的手机号：</span><input type="text" class="form-control m-b-10" name='Tel' value="{{ $ob->Tel }}">
                </div>
                <br>
                <!-- 配送说明 -->
                <div class="col-md-12">
                    <span style="font-size:15px;">配送说明：</span>
                    <textarea class="form-control m-b-10" name="content">{{ $ob->content }}</textarea>
                </div>
                <br>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
    </div>
@endsection