<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //后台的问题反馈
        //保存搜索条件
        $where ='';
        //实例化操作表
        $ob=DB::table('feedback');
        //判断是否有搜索条件
         if($request->has('name')){
            //获取搜索的条件
            $name=$request->input('name');
            //添加到将要携到分页中的数组中
            $where['name']=$name;
            //给查询添加where条件
            $ob->where('name','like',"%{$name}%");
        }
        //执行分页查询
        $list=$ob->paginate(1);
        return view('Admin.Feedback.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Feedback.add');
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
                'name' => 'required',
                'content' => 'required',
                'tel' => 'required',
                // 'tel' => 'max:11',
                // 'tel' => 'integer',


            ],$this->messages());
            $data=$request->except('_token');
            $id=DB::table('feedback')->insertGetId($data);
            if($id>0)
            {
                return redirect('/admin/feedback')->with('msg','恭喜您添加成功');
            }
    }
      public function messages()
         {
            return [
                'name.required' => '问题反馈的标题必须填写！',
                'content.required' => '问题反馈内容必须填写！',
                'tel.required' => '手机号必须填写！',
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
         $data=DB::table('feedback')->where('id',$id)->first();
        return view('Admin.Feedback.edit',['ob'=>$data]);
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
        $row=DB::table('feedback')->where('id',$id)->update($ob);
        if($row>0){
            return redirect('/admin/feedback')->with('msg','修改成功');
        }else{
            return redirect('/admin/feedback')->with('error','修改失败');
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
         $row = DB::table('feedback')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/feedback')->with('msg','删除成功');
        }else{
            return redirect('/admin/feedback')->with('error','删除失败');
        }
    }
}
