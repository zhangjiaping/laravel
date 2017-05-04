<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //
        $where = '';
        $ob = DB::table('type');
        if($request->has('name')){
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        $list = $ob->paginate(5);
        return view('Admin.Type.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Type.add');
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
        $message = [
            'name.required' => '类别名必须填写',
        ];

        $this->validate($request, [
            'name' => 'required|max:8',
        ],$message);
        
        $data = $request->except('_token');
        $id = DB::table('type')->insertGetId($data);
        if($id>0){
            return redirect('admin/type')->with('msg','添加成功');
        }
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
        $data = DB::table('type')->where('id',$id)->first();
        return view('Admin.Type.edit',['ob'=>$data]);
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
          $data = $request->only('name');
        $row = DB::table('type')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/type')->with('msg','修改成功');
        }else{
            return redirect('admin/type')->with('error','修改失败');
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
        $list = DB::table('type')->where('upid',$id)->get();
        if(count($list)>0){
            return redirect('admin/type')->with('error','要删除此类必须先删除此类下的子类');
        }

        $row = DB::table('type')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/type')->with('msg','删除成功');
        }else{
            return redirect('admin/type')->with('error','删除失败');
        }
    }

    public function createSon($id)
    {
        $list = DB::table('type')->where('id',$id)->first();
        return view('Admin.Type.addSon',['list' => $list]);
    }

    public function storeSon(Request $request)
    {
        $data = $request->except('_token');
        $par = DB::table('type')->where('id',$request->input('upid'))->first();
        // dd($par);
        $data['path'] = $par->path.','.$data['upid'];
        // dd($data);
        $id = DB::table('type')->insertGetId($data);
        if($id>0){
            return redirect('admin/type')->with('msg','添加子类成功');
        }
    }
}
