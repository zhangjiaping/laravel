<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

use DB;

class GoodsController extends Controller
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
        $ob = DB::table('goods');
        if($request->has('type')){
            $type = $request->input('type');
            $where['type'] = $type;
            $ob->where('type',$type);
        }
        if($request->has('name')){
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        $list = $ob->paginate(5);
        $type = DB::table('type')->get();
        return view('Admin.Goods.index',['list'=>$list,'where'=>$where,'type'=>$type]);
    }
    public function doget(Request $request)
    {
        // dd(111);
        $list = DB::table('type')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }

    public function dopost(Request $request)
    {
        $list = DB::table('type')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type = DB::table('type')->get();
        // dd($type);
        return view('Admin.Goods.add',['type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'body' => 'required',
            'prices'=>'required',
            'bb'=>'required',
        ],$this->messages());
        $data = $request->except('_token');
        // dd($data);
        $id = DB::table('goods')->insertGetId($data);
        if($id>0){
            return redirect('admin/goods')->with('msg','添加成功');
        }

    }

    public function messages()
    {
        return [
            'name.required' => '请填写商品名称',
            'price.required'  => '请填写商品价格',
            'price.numeric'  => '请填写商品数值',
            'stock.required' => '请填写商品库存',
            'stock.integer' => '商品库存为整数',
            'body.required' => '请填写商品参数',
            'bb.required' => '请填写商品版本',
            'prices.required' => '请填写各版本价格',
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
        $type = DB::table('type')->get();
        $data = DB::table('goods')->where('id',$id)->first();
        return view('Admin.Goods.edit',['ob'=>$data,'type'=>$type]);
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
        // dd($request->input('bb'));
        // 图片上传
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
            // // 图片缩放
            // $img = Image::make('./admin/upload/'.$picname);
            // $img->resize(160, 160, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            // $pic = $img->save('./admin/upload/s_'.$picname);
            // $pic = $pic->basename;
            $data = $request->except('_token','_method','oldpicname');
            $data['pic'] = $picname;
        }else{
            $data = $request->except('_token','_method','oldpicname');
            $data['pic'] = $request->input('oldpicname');
        }

         if($request->hasFile('picleft')){
            // 判断上传的文件是否有效
            if($request->file('picleft')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('picleft');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
            }
            // // 图片缩放
            // $img = Image::make('./admin/upload/'.$picname);
            // $img->resize(160, 160, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            // $pic = $img->save('./admin/upload/s_'.$picname);
            // $pic = $pic->basename;
            $data = $request->except('_token','_method','oldpicname');
            $data['picleft'] = $picname;
        }

         if($request->hasFile('picright')){
            // 判断上传的文件是否有效
            if($request->file('picright')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('picright');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
            }
            // // 图片缩放
            // $img = Image::make('./admin/upload/'.$picname);
            // $img->resize(160, 160, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            // $pic = $img->save('./admin/upload/s_'.$picname);
            // $pic = $pic->basename;
            $data = $request->except('_token','_method','oldpicname');
            $data['picright'] = $picname;
        }


        // dd($request->input('controller'));
        $row = DB::table('goods')->where('id',$id)->update($data);

        if($row>0){
            return redirect('admin/goods')->with('msg','修改成功');
        }else{
            return redirect('admin/goods')->with('error','修改失败');
        }
    }

    // public function updatepics(Request $request){
        
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $row = DB::table('goods')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/goods')->with('msg','删除成功');
        }else{
            return redirect('admin/goods')->with('error','删除失败');
        }
    }
}
