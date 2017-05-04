<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Intervention\Image\ImageManagerStatic as Image;

class LbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ob = DB::table('dalunbo');
        $list = $ob->paginate(5);
        return view('Admin.Lb.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Lb.add');
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
        $pics = DB::table('dalunbo')->get();

        if(count($pics) > 4){
            return redirect('admin/lb')->with('error','图片已经有五张了，不能再添加了');
        }

         $this->validate($request, [
            'pic' => 'required',
        ],$this->messages());
        // dd($request->input('pic'));
        if($request->hasFile('pic')){
            // 判断上传的文件是否有效
            if($request->file('pic')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('pic');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
            }
            // 图片缩放
            $img = Image::make('./admin/upload/'.$picname);
            $img->resize(1226, 460, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $pic = $img->save('./admin/upload/s_'.$picname);
            $pic = $pic->basename;
            $data = $request->except('_token','_method');
            $data['pic'] = $pic;
        }
        // dd($data);
        $id = DB::table('dalunbo')->insertGetId($data);
        if($id>0){
            return redirect('admin/lb')->with('msg','添加成功');
        }

    }

    public  function messages()
    {
        return [
            'pic.required' => '请上传图片',
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
        $pics = DB::table('dalunbo')->get();

        if(count($pics) < 4){
            return redirect('admin/lb')->with('error','图片只有三张了，不能再删除了');
        }

         $row = DB::table('dalunbo')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/lb')->with('msg','删除成功');
        }else{
            return redirect('admin/lb')->with('error','删除失败');
        }
    }

    public function yuantu($id)
    {
        // dd(1111);
        $list = DB::table('dalunbo')->where('id',$id)->first();
        // dd($list);
        return view('Admin.Lb.yuantu',['list'=>$list]);
    }
}
