<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    //
    public function index()
    {
    	return view('6');
    }

    public function doget(Request $request)
    {
    	$list = DB::table('district')->where('upid',$request->input('upid'))->get();
    	echo json_encode($list);
    }

     public function dopost(Request $request)
    {
    	$list = DB::table('district')->where('upid',$request->input('upid'))->get();
    	echo json_encode($list);
    }
}
