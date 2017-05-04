@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">商品信息列表</h3>
        @if(session('msg'))
           <div class="alert alert-success alert-icon">
            {{ session('msg') }}
            <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
            {{ session('error') }}
            <i class="icon"></i>
            </div>
        @endif
        <div class="table-responsive overflow">
            <form action='/demo4' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form action='/admin/goods' method='get'>
                <div class='medio-body'>
                    商品名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
                </div>
                <div>
                    商品列型：<select name='type' class='form-control input-sm m-b-10'>
                        <option value=''>--请选择--</option>
                        @foreach($type as $t)
                        <option value='{{ $t->id }}'>--{{ $t->name }}--</option>
                        @endforeach
                    </select>
                </div>
                <input type='submit' class='btn' value='搜索'>
            </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>商品库存</th>
                        <th>商品参数</th>
                        <th>商品销量</th>
                        <th>商品类型</th>
                        <th>商品状态</th>
                        <th>商品版本</th>
                        <th>各版本价格</th>
                        <th>商品图片</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->name }}</td>
	                        <td>{{ $v->price }}</td>
                            <td>{{ $v->stock }}</td>
	                        <td>{{ $v->body}}</td>
                            <td>{{ $v->hot }}</td>
                            <td>
                                @foreach($type as $t)
                                    @if($v->type == $t->id)
                                    {{ $t->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if($v->controller == 1)
                                    明星单品
                                @elseif($v->controller == 2)
                                    推荐商品
                                @else 
                                    不推荐
                                @endif
                            </td>
                            <td>{{ $v->bb}}</td>
                            <td>{{ $v->prices }}</td>
                            <td><img src="{{ asset('admin/upload').'/'.$v->pic}}" width="70" height="50"></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin/goods/{{ $v->id }}/edit'>修改</a>
	                        </td>
	                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定删除吗？')){
                var form = document.myform;
                form.action = '/admin/goods/'+id;
                form.submit();
            }
        }
    </script>
@endsection