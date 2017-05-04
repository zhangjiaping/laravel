@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">地址信息列表</h3>
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
    				收货人：<input type='text' class='form-control input-sm m-b-10' name='consignee'>
    			</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户ID</th>
                        <th>省</th>
                        <th>市</th>
                        <th>县</th>
                        <th>收货人</th>
                        <th>收货人手机</th>
                        <th>默认地址</th>
                        <th>详细地址</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->uid }}</td>
                            <td>{{ $v->province }}</td>
                            <td>{{ $v->city }}</td>
                            <td>{{ $v->county }}</td>
                            <td>{{ $v->consignee }}</td>
                            <td>{{ $v->consignee_phone }}</td>
                            <td>{{ ($v->default == 1)?'默认':'不默认' }}</td>
	                        <td>{{ $v->detail }}</td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}
        </div>
    </div>
@endsection