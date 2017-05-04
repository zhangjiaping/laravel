@extends('Admin.base.parent')
@section('content')



<div width="500px" height="500px" style="margin:50px;"><img src="{{ asset('admin/upload').'/'.$list->pic}}"></div>
<a href="{{ url('admin/lb') }}" style="margin-left:50px;"><button type="submit" class="btn btn-info btn-sm m-t-10">返回</button></a>
@endsection
