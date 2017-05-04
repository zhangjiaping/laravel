<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class XiaoxiController extends Controller
{
    //
    public function index(){
    	//这个是公告管理
    	$list=DB::table('notice')->get();
    	$con=DB::table('config')->first();
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        $goods = DB::table('goods')->get();
    	return view('/Home/xiaoxi',['list'=>$list,'con'=>$con,'type'=>$type,'goods' => $goods]);
    }
    
}
