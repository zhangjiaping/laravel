@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">公告管理信息列表</h3>
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

        	<form action='/admin/notice' method='get'>
        		<div class='medio-body'>
    				公告标题：<input type='text' class='form-control input-sm m-b-10' name='title'>
    			</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>公告标题</th>
                        <th>公告内容</th>
                        <th>运营状态</th>
                        <th>公告时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->title }}</td>
                            <td>{{ $v->content }}</td>
                            <td>{{ ($v->type == 1)?'不重要':'重要' }}</td>
	                        <td>{{ $v->time }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin/notice/{{ $v->id }}/edit'>修改</a>
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
        		form.action = '/admin/notice/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection