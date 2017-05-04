<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ob = DB::table('order');
        $list = $ob->paginate(5);
        return view('Admin.Order.index',['list' => $list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = DB::table('order')->where('id',$id)->first();
        $dilivery = DB::table('dilivery')->get();
        return view('Admin.Order.send',['list' => $list,'dilivery' => $dilivery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('dilivery','ftime','state');
        $time = Carbon::now('PRC')->toDateTimeString();
        $data['ftime'] = $time;
        $data['state'] = 2;      
        $row = DB::table('order')->where('id',$id)->update($data);
        if($row > 0){
            return redirect('/admin/order')->with('msg','发货成功'); 
        }else{
            return redirect('/admin/order')->with('error','发货失败');
        }
    }

    public function select(Request $request)
    {
        $where = '';
        $data = DB::table('order');
        $type = $request->only('type');
        $select = $request->only('select');
        if($type['type'] == 1){
            $where['type'] = 1;
            $where['select'] = $select['select'];
            $data->where('order_num','like',"%{$select['select']}%");
        }elseif($type['type'] == 2){
            $where['gname'] = 2;
            $where['select'] = $select['select'];
            $data->where('gname','like',"%{$select['select']}%");
        }elseif($type['type'] == 3){
            $where['paytime'] = 3;
            $where['select'] = $select['select'];
            $data->where('paytime','like',"%{$select['select']}%");
        }
        $list = $data->paginate(5);
        return view('Admin.Order.show',['list' => $list,'where' => $where]);
    }
}
