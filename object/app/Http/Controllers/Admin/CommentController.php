<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where='';
        //实例化操作表
        $ob=DB::table('comment');
        //判断是否有搜索条件
        if($request->has('content')){
            //获取搜索条件ss
            $content=$request->input('content');
            //添加到将要携到分页中的数组中
            $where['content']=$content;
            //给查询添加where条件
            $ob->where('content','like',"%{$content}%");
        }

        //执行分页查新
        $list=$ob->paginate(1);
        return view('Admin.Comment.index',['list'=>$list,'where'=>$where]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Comment.add');
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
        $this->validate($request,[
            'classify' =>'required',
            'content' =>'required',
            'gid'=>'required',
            'uid'=>'required',
            ],$this->messages());
        $data=$request->except('_token');
        $id=DB::table('comment')->insertGetId($data);
        if($id>0){
            return redirect('/admin/comment')->with('msg','添加成功');
        }
    }
    public function messages()
    {
        return [
            'classify.required' =>'评论分类必须填写！',
            'content.required' =>'评论内容必须填写！',
            'gid.required'=>'商品ID必须填写！',
            'uid.required'=>'用户ID必须填写！',
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
        $data=DB::table('comment')->where('id',$id)->first();
        return view('Admin.Comment.edit',['ob'=>$data]);
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
        $ob=$request->except('_token','_method');
        $row=DB::table('comment')->where('id',$id)->update($ob);
        if($row>0){
            return redirect('/admin/comment')->with('msg','修改成功');
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
        $row = DB::table('comment')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/comment')->with('msg','删除成功');
        }else{
            return redirect('/admin/comment')->with('msg','删除失败');
        }
    }
}
