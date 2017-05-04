@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加图片</h3>
        
        
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
            <form action='/admin/lb' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="fileupload fileupload-new col-lg-7" data-provides="fileupload">
                        <div class="fileupload-preview form-control fileupload-exists thumbnail small"></div>
                        <span class="btn btn-file btn-alt btn-sm">
                            <span class="fileupload-new">请上传图片</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name='pic'>
                        </span>
                        <a href="#" class="btn-sm btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>  
    </div>
@endsection