<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //保存搜索条件
        $where ='';
        //实例化操作表
        $ob=DB::table('config');
        //判断是否有搜索条件
         if($request->has('title')){
            //获取搜索的条件
            $title=$request->input('title');
            //添加到将要携到分页中的数组中
            $where['title']=$title;
            //给查询添加where条件
            $ob->where('title','like',"%{$title}%");
        }
        //执行分页查询
        $list=$ob->paginate(1);
        return view('Admin.Config.index',['list'=>$list,'where'=>$where]);
        // var_dump('111');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Admin.Config.add');
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
                'title' => 'required',
                'keys' => 'required',
                'desn' => 'required',
            ],$this->messages());
            $data=$request->except('_token');
            $id=DB::table('config')->insertGetId($data);
            if($id>0)
            {
                return redirect('/admin/config')->with('msg','添加成功');
            }
      }
      public function messages()
         {
            return [
                'title.required' => '标题必须填写！',
                'keys.required' => '关键字必须填写！',
                'desn.required' => '描述必须填写！',
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
        $data=DB::table('config')->where('id',$id)->first();
        return view('Admin.Config.edit',['ob'=>$data]);
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
        $ob = $request->except('_token','_method','oldlogo');
        $oldlogo = $request->input('oldlogo');
        //判断是否有文件上传
        if($request->hasFile('logo')){
            // 判断上传的文件是否有效
            if($request->file('logo')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('logo');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
            }
            $ob['logo'] = $picname;
        }else{
            $ob['logo'] = $oldlogo;
        }
        $row=DB::table('config')->where('id',$id)->update($ob);
        if($row>0){
            return redirect('/admin/config')->with('msg','修改成功');
        }else{
            return redirect('/admin/config')->with('error','修改失败');
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
          $row = DB::table('config')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/config')->with('msg','删除成功');
        }else{
            return redirect('/admin/config')->with('error','删除失败');
        }
    }
}
