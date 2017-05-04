<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $where = '';
        $ob = DB::table('admin');
        if($request->has('name')){
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        if($request->has('root')){
            $name = $request->input('root');
            $where['root'] = $name;
            $ob->where('root',$root);
        }
        $list = $ob->paginate(5);
        return view('Admin.Admins.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(session('adminuser')->root == 0){
           return back()->with('error','没有权限,请联系超级管理员');
        }
        return view('Admin.Admins.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:8',
            'pass' => 'required',
        ],$this->messages());
        $data = $request->except('_token');
        $id = DB::table('admin')->insertGetId($data);
        if($id>0){
            return redirect('admin/admins')->with('msg','添加成功');
        }
    }
     public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
            'age.required' => '密码必须填写',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(session('adminuser')->id == $id || session('adminuser')->root == 1){
           $data = DB::table('admin')->where('id',$id)->first();
        return view('Admin.Admins.edit',['ob'=>$data]);
        }else{
            return back()->with('error','what?普通管理员只能修改自己的东西！');
        }   
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
        //
        $data = $request->except('_token','_method');
        $row = DB::table('admin')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/admins')->with('msg','修改成功');
        }else{
            return redirect('admin/admins')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(session('adminuser')->root == 0){
           return back()->with('error','没有权限,请联系超级管理员');
        }
        $row = DB::table('admin')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/admins')->with('msg','删除成功');
        }else{
            return redirect('admin/admins')->with('error','删除失败');
        }
    }
}
