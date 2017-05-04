@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">链接信息列表</h3>
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
            <form action="/links" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>

            <form action='/admin/links' method='get'>
                <div class='medio-body'>
                    名称:<input type='text' class='form-control input-sm m-b-10' name='name'>
                </div>  
                <div>
                    地址：<input type='text' class='form-control input-sm m-b-10' name='url'>
                </div>
                <input type='submit' class='btn' value='搜索'>
            </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>地址</th>
                        <th>开关</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->name }}</td>
	                        <td>{{ $v->url }}</td>
	                        <td>{{ ($v->switch == 1)?'开':'关' }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin/links/{{ $v->id }}/edit'>修改</a>
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
                {{ $list->appends($where)->links() }}
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id)
        {
            if(confirm('确定要删除吗？')){
                var form = document.myform;
                form.action = '/admin/links/'+id;
                form.submit();
            }
        }
    </script>
@endsection