<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class CheckorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(session('user')->id);
        $list = DB::table('address')->where('uid',session('user')->id)->get();
        $id = session('cid');
        // dd($list);
        // dd(session('cid'));
        foreach ($id as $v) {
            $goods = DB::table('cart')->whereIn('id',$v)->get();
        }
        // dd($goods);
        return view('Home.checkorder',['list' => $list,'goods' => $goods]);
    }

    public function city()
    {
        return view('Home.city');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $list = DB::table('address')->insertGetId($data);
        // dd($data);
        return redirect('/home/checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        // dd($data);
        DB::table('address')->where('id',$id)->update($data);
        return redirect('/home/checkout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $address = DB::table('address')->where('id',$request->input('aid'))->first();
        $id = session('cid');
        $g2 = array();
        $g2[0] = 'aid';
        $g2[1] = 'time';
        $g2[2] = 'uname';
        $g2[3] = 'order_num';
        $g3 = array();
        $g3[0] = $request->input('aid');
        $g3[1] = Carbon::now('PRC')->toDateTimeString();
        $g3[2] = session('user')->username;
        $g3[3] = Carbon::now('PRC')->year.Carbon::now('PRC')->month.Carbon::now('PRC')->day.rand(1000,9999);
        foreach ($id as $value) {
            $g1 = DB::table('cart')->whereIn('id',$value)->select('gid','uid','gnum','gpic','price','gname','total')->get();
        }
        foreach ($g1 as $v) {
            foreach ($v as $key => $val) {
                $g2[] = $key;
                $g3[3] = Carbon::now('PRC')->year.Carbon::now('PRC')->month.Carbon::now('PRC')->day.rand(1000,9999);
                $g3[] = $val;
            }
            $data[] = array_combine($g2, $g3);
        }
        // dd($data);
        foreach ($data as $vv) {
            $list[] = DB::table('order')->insertGetId($vv);
        }
        $l[] = $list;
        foreach ($l as $ll) {
            $order = DB::table('order')->whereIn('id',$ll)->get();
        }
        return view('Home.pays',['order' => $order,'address' => $address]);
    }
}
