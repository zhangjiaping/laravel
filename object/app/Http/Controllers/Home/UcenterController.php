<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //判断网站开关是否打开
        $con=DB::table('config')->first();
        if($con->state!=1){
           return redirect('/home/xitongweihu')->with('msg','不好意思,本网站正在进行维护升级！');
        }
         //判断网站开关是否打开
        
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();
        $all = DB::table('order')->get();
        $dzf = DB::table('order')->where('state',0)->get();
        $dsh = DB::table('order')->where('state',2)->get();
        $finish = DB::table('order')->where('state',3)->get();
        $address = DB::table('address')->get();
        return view('Home.ucenter',['type' => $type,'goods' => $goods,'con'=>$con,'all' => $all,'dzf' => $dzf,'dsh' => $dsh,'finish' => $finish,'address' => $address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address = DB::table('address')->where('uid',session('user')->id)->get();
        return view('Home.uaddress',['address' => $address]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        DB::table('address')->insertGetId($data);
        return redirect('home/userinfo/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $dzf = DB::table('order')->where('state',0)->get();
        $dzf = DB::table('order')->where('uid',session('user')->id)->where('state',0)->get();
        // dd($dzf);
        // $order = DB::table('order')->where('uid',session('user')->id)->get();
        if($id == 5){
            
            $order = DB::table('order')->where('state','>',0)->where('uid',session('user')->id)->get();
        }else{
            // $order = DB::table('order')->where('uid',session('user')->id)->get();
            $order = DB::table('order')->where('uid',session('user')->id)->where('state',$id)->get(); 
        }
        // dd($order);
        return view('Home.uorder',['dzf' => $dzf,'order' => $order,'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $edit = DB::table('address')->where('id',$id)->first();
        //省
        $list = DB::table('district')->where('name','like',"%{$edit->province}%")->first();
        //市
        $city = DB::table('district')->where('upid',$list->id)->get();
        $county = DB::table('district')->where('name','like',"%{$edit->county}%")->first();
        //区、县
        $country = DB::table('district')->where('upid',$county->id)->get();
        $data = array($edit,$list,$city,$country);
        echo json_encode($data);
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
        $data = $request->except('_token','_method');
        DB::table('address')->where('id',$id)->update($data);
        return redirect('home/userinfo/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('address')->where('id',$id)->delete();
        return redirect('home/userinfo/create');
    }

    public function pay($id)
    {
        $order = DB::table('order')->where('id',$id)->get();
        foreach ($order as $v) {
            $aid = $v->aid;
        }
        $address = DB::table('address')->where('id',$aid)->first();
        return view('Home.pays',['order' => $order,'address' => $address]);
    }   

    public function ordersearch(Request $request)
    {  
        $dzf = DB::table('order')->where('state',0)->get();
        if(is_numeric($request->input('keywords'))) {
            $order = DB::table('order')->where('order_num','like',"%{$request->input('keywords')}%")->get();
        }else{
            $order = DB::table('order')->where('gname','like',"%{$request->input('keywords')}%")->get();
        }     
        $id = 5;
        return view('Home.uorder',['dzf' => $dzf,'order' => $order,'id' => $id]);
    }

    public function orderdel($id)
    {
        DB::table('order')->where('id',$id)->delete();
        return redirect('/home/userinfo/5');
    }

    public function OrderInfo($id)
    {
        $order = DB::table('order')->where('id',$id)->first();
        $address = DB::table('address')->where('id',$order->aid)->first();
        return view('Home.order_info',['order' => $order,'address' => $address]);
    }
    public function GetOrder($id)
    {
        // dd($id);
        $row = DB::table('order')->where('id',$id)->update(['state' => 3]);
        // dd($row);
        $dzf = DB::table('order')->where('state',0)->get();
        $order = DB::table('order')->where('uid',session('user')->id)->get();
        $id = 5;
        return view('Home.uorder',['dzf' => $dzf,'order' => $order,'id' => $id]);
    }
}
