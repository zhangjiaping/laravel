<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{
    //
    public function index(Request $request)
    {
    	// var_dump(11111);
    	 //保存搜索条件
        $where ='';
        //实例化操作表
        $ob=DB::table('address');
        //判断是否有搜索条件
         if($request->has('consignee')){
            //获取搜索的条件
            $consignee=$request->input('consignee');
            //添加到将要携到分页中的数组中
            $where['consignee']=$consignee;
            //给查询添加where条件
            $ob->where('consignee','like',"%{$consignee}%");
        }
        //执行分页查询
        $list=$ob->paginate(1);
        return view('Admin.Address.index',['list'=>$list,'where'=>$where]);
    }
}
