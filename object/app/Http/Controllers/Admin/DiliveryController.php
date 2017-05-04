<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DiliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
          // 保存搜索条件
        $where ='';
        //实例化操作表
        $ob=DB::table('dilivery');
        //判断是否有搜索条件
         if($request->has('expressage')){
            //获取搜索的条件
            $expressage=$request->input('expressage');
            //添加到将要携到分页中的数组中
            $where['expressage']=$expressage;
            //给查询添加where条件
            $ob->where('expressage','like',"%{$expressage}%");
        }
        //执行分页查询
        $list=$ob->paginate(1);
        return view('Admin.Dilivery.index',['list'=>$list,'where'=>$where]);
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
         return view('Admin.Dilivery.add');
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
                'expressage' => 'required',
                'uname' => 'required',
                'Tel' => 'required',
            ],$this->messages());
            $data=$request->except('_token');
            $id=DB::table('dilivery')->insertGetId($data);
            if($id>0)
            {
                return redirect('/admin/dilivery')->with('msg','添加成功');
            }
    }
     public function messages()
         {
            return [
                'expressage.required' => '快递公司名！',
                'uname.required' => '快递员的名字必须填写！',
                'Tel.required' => '快递员的手机号必须填写！',
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
        $data=DB::table('dilivery')->where('id',$id)->first();
        return view('Admin.Dilivery.edit',['ob'=>$data]);
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
         // dd($ob);
       $row=DB::table('dilivery')->where('id',$id)->update($ob);
        if($row>0){
            return redirect('/admin/dilivery')->with('msg','修改成功');
        }else{
            return redirect('/admin/dilivery')->with('error','修改失败');
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
          $row = DB::table('dilivery')->where('id',$id)->delete();
        if($row>0){
            return redirect('/admin/dilivery')->with('msg','删除成功');
        }else{
            return redirect('/admin/dilivery')->with('error','删除失败');
        }
    }
}
