@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改商品信息</h3> 
        <div class="row">
            <form action='/admin/goods/{{ $ob->id }}' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}      
                <div class="row">
                        <div class="col-md-7 m-b-15">
                            <label>请选择商品类型</label>
                            <select class="form-control input-sm m-b-10" name='type'>
                                @foreach($type as $v)
                                <option value='{{ $v->id }}' @if($ob->type == $v->id)selected @endif>{{ $v->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-7 m-b-15">
                            <label>请选择要推荐的商品</label>
                            <select class="form-control input-sm m-b-10" name='controller'>
                                <option value = '0' @if($ob->controller == 0)selected @endif>--不推荐--</option>
                                <option value = '1' @if($ob->controller == 1)selected @endif>--加入明星单品--</option>
                                <option value = '2' @if($ob->controller == 2)selected @endif>--加入推荐轮播--</option>                              
                            </select>
                        </div>
                        <div class="col-md-7 m-b-15">
                            <label>请输入商品名称</label>
                            <input type="text" class="input-sm form-control mask-date" name='name' value="{{ $ob->name }}">
                        </div>
                        
                        <div class="col-md-7 m-b-15">
                            <label>请输入商品价格</label>
                            <input type="text" class="input-sm form-control mask-time"  name='price' value="{{ $ob->price }}">
                        </div>
                        
                        <div class="col-md-7 m-b-15">
                            <label>请输入商品库存</label>
                            <input type="text" class="input-sm form-control mask-date_time" name='stock' value="{{ $ob->stock }}">
                        </div>
                        
                        <div class="col-md-7 m-b-15">
                            <label>请输入商品参数</label>
                            <input type="text" class="input-sm form-control mask-cep" name='body' value="{{ $ob->body }}">
                        </div>
                        
                        <div class="col-md-7 m-b-15">
                            <label>请输入商品销量</label>
                            <input type="text" class="input-sm form-control mask-phone" name='hot' value="{{ $ob->hot }}">
                            <input type="hidden" class="input-sm form-control mask-phone" name='oldpicname' value="{{ $ob->pic }}">
                        </div>  
                        <div class="col-md-7 m-b-15">
                            <label>请输入商品版本</label>
                            <input type="text" class="input-sm form-control mask-cep" name='bb' value="{{ $ob->bb }}">
                        </div>
                        <div class="col-md-7 m-b-15">
                            <label>请输入各版本价格</label>
                            <input type="text" class="input-sm form-control mask-cep" name='prices' value="{{ $ob->prices }}">
                        </div>  
                    </div>    
                </div>
                <div class="fileupload fileupload-new col-lg-7" data-provides="fileupload">
                        <div class="fileupload-new thumbnail small form-control"><img src="{{ url('admin/upload'.'/'.$ob->pic) }}"></div>
                        <div class="fileupload-preview form-control fileupload-exists thumbnail small"></div>
                        <span class="btn btn-file btn-alt btn-sm">
                            <span class="fileupload-new">请上传正面图片</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name='pic'>
                        </span>
                        <a href="#" class="btn-sm btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>

                @if($ob->type == 6 || $ob->type == 12)
                <div class="fileupload fileupload-new col-lg-7" data-provides="fileupload">
                        <div class="fileupload-new thumbnail small form-control"><img src="{{ url('admin/upload'.'/'.$ob->picleft) }}"></div>
                        <div class="fileupload-preview form-control fileupload-exists thumbnail small"></div>
                        <span class="btn btn-file btn-alt btn-sm">
                            <span class="fileupload-new">请上传侧面图片</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name='picleft'>
                        </span>
                        <a href="#" class="btn-sm btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
                <div class="fileupload fileupload-new col-lg-7" data-provides="fileupload">
                        <div class="fileupload-new thumbnail small form-control"><img src="{{ url('admin/upload'.'/'.$ob->picright) }}"></div>
                        <div class="fileupload-preview form-control fileupload-exists thumbnail small"></div>
                        <span class="btn btn-file btn-alt btn-sm">
                            <span class="fileupload-new">请上传后面图片</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name='picright'>
                        </span>
                        <a href="#" class="btn-sm btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
                @endif
                <div class="col-lg-7">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection