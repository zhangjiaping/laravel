<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $where = '';
        $ob = DB::table('user');
        if($request->has('sex')){
            $sex = $request->input('sex');
            $where['sex'] = $sex;
            $ob->where('sex',$sex);
        }
        if($request->has('name')){
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        $list = $ob->paginate(5);
        return view('Admin.User.index',['list'=>$list,'where'=>$where]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.User.add');
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
            'age' => 'integer|max:150|min:18',
        ],$this->messages());
        $data = $request->except('_token');
        $id = DB::table('user')->insertGetId($data);
        if($id>0){
            return redirect('admin/demo4')->with('msg','添加成功');
        }
    }
     public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
            'age.min' => '未满18周岁禁止注册',
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
        $data = DB::table('user')->where('uid',$id)->first();
        return view('Admin.User.edit',['ob'=>$data]);
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
        $data = $request->only('name','sex','age');
        $row = DB::table('user')->where('uid',$id)->update($data);
        if($row>0){
            return redirect('admin/demo4')->with('msg','修改成功');
        }else{
            return redirect('admin/demo4')->with('error','修改失败');
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
        $row = DB::table('user')->where('uid',$id)->delete();
        if($row>0){
            return redirect('demo4')->with('msg','删除成功');
        }else{
            return redirect('demo4')->with('error','删除失败');
        }
    }
}
