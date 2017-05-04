<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Home.pays');
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goods = DB::table('goods')->limit(10)->get();
        return view('Home.success',['goods' => $goods]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $gid = '';
        $gid = rtrim($request->input('gidd'),',');
        $id = explode(',',$gid);  
        foreach ($id as $v) {
            $row = DB::table('order')->where('id',$v)->update(['state' => 1]);
            $row = DB::table('order')->where('id',$v)->update(['payname' => $request->input('payname')]);
        } 
        $cid = session('cid');
        // dd($cid);
        foreach ($cid as $vv) {
            DB::table('cart')->whereIn('id',$vv)->delete();
        }
        // dd(session('cid'));
        $goods = DB::table('goods')->limit(10)->get();
        return view('Home.success',['goods' => $goods]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $gid = '';
        $gid = rtrim($request->input('gidd'),',');
        $id = explode(',',$gid);  
        foreach ($id as $v) {
            $row = DB::table('order')->where('id',$v)->update(['state' => 1]);
        } 
        return view('Home.success');
    }
}
