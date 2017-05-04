<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//显示的主页
        //保存搜索条件
        $where ='';
        //实例化操作表
        $ob=DB::table('replay');
        //判断是否有搜索条件
         if($request->has('replayer')){
            //获取搜索的条件
            $replayer=$request->input('replayer');
            //添加到将要携到分页中的数组中
            $where['replayer']=$replayer;
            //给查询添加where条件
            $ob->where('replayer','like',"%{$replayer}%");
        }
        //执行分页查询
        $list=$ob->paginate(1);
        return view('Admin.Replay.index',['list'=>$list,'where'=>$where]);
        // var_dump('111');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//显示的添加页面
        //
         return view('Admin.Replay.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//执行添加页面
        //
          $this->validate($request, [
                'cid' => 'required',
                'rcontent' => 'required',
                'replayer' => 'required',
            ],$this->messages());
            $data=$request->except('_token');
            $id=DB::table('replay')->insertGetId($data);
            if($id>0)
            {
                return redirect('/admin/replay')->with('msg','添加成功');
            }
      }
      public function messages()
         {
            return [
                'cid.required' => '评论内容必须填写！',
                'rcontent.required' => '回复内容必须填写！',
                'replayer.required' => '回复人必须填写！',
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
         $data=DB::table('replay')->where('id',$id)->first();
        return view('Admin.Replay.edit',['ob'=>$data]);
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
        $ob = $request->except('_token','_method');
        $row=DB::table('replay')->where('id',$id)->update($ob);
        if($row>0){
            return redirect('/admin/replay')->with('msg','修改成功');
        }else{
            return redirect('/admin/replay')->with('error','修改失败');
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
        $row = DB::table('replay')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/replay')->with('msg','删除成功');
        }else{
            return redirect('/admin/replay')->with('error','删除失败');
        }
    }
}
