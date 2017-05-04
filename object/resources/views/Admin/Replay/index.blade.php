@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">评论回复信息列表</h3>
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
        	<form action='/replay' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

        	<form action='/admin/replay' method='get'>
        		<div class='medio-body'>
    				回复人：<input type='text' class='form-control input-sm m-b-10' name='replayer'>
    			</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>评论id</th>
                        <th>回复时间</th>
                        <th>回复内容</th>
                        <th>回复人</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->cid }}</td>
	                        <td>{{ $v->rtime }}</td>
                            <td>{{ $v->rcontent }}</td>
	                        <td>{{ $v->replayer }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin/replay/{{ $v->id }}/edit'>修改</a>
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
        		form.action = '/admin/replay/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection