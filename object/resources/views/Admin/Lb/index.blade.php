@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">管理员列表</h3>
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
            <form action='/admin/lb' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form> 
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>图片</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td><img src="{{ asset('admin/upload').'/'.$v->pic}}" width="70" height="50"></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/admin/yuantu/{{ $v->id }}'>原图片</a>
	                        </td>
	                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $list->links() }}
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定删除吗？')){
                var form = document.myform;
                form.action = '/admin/lb/'+id;
                form.submit();
            }
        }
    </script>
@endsection