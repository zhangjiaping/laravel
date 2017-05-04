<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Gregwar\Captcha\CaptchaBuilder;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 前台首页
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // 判断网站开关是否打开
        $con = DB::table('config')->first();
        if($con->state!=1){
           return redirect('/home/xitongweihu')->with('msg','不好意思,本网站正在进行维护升级！');
        }
        // View::share('con', $con);
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();
        // 查询明星单品商品
        $star = DB::table('goods')->where('controller',1)->get();
        //智能硬件
        $hard = DB::table('goods')->where('type',9)->get();
        // 搭配
        $dp = DB::table('goods')->where('type',10)->get();
        // 配件
        $pj = DB::table('goods')->where('type',11)->get();
        // 轮播
        $lb = DB::table('dalunbo')->get();
        // dd($star);
        return view('Home.index',['star' => $star,'hard' => $hard,'dp' => $dp,'pj' => $pj,'type' =>$type,'goods' => $goods,'lb' => $lb,'con'=>$con]);
    }

    /**
    *  商品详情
    */
    public function xiangqing($id)
    {
        $con=DB::table('config')->first();
        // 所有商品
        $goods = DB::table('goods')->get();
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 商品信息
        $good = DB::table('goods')->where('id',$id)->first();


        $good->bb = explode(',',$good->bb);

        $good->ps = explode(',',$good->prices);
        // // 版本
        // $bb = explode(',',$good->bb);
        // // 价格
        // $prices = explode(',',$good->prices);

        return view('Home.xiangqing',['type' => $type,'goods' => $goods,'good' => $good,'con'=>$con]);
    }
    // 详情页城市联动
    public function doget(Request $request)
    {
        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }

    public function dopost(Request $request)
    {
        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }
    // 个人信息页面
    public function uinfo(Request $request,$t=0)
    {
        $list = DB::table('user')->where('id',session('user')->id)->first();
        return view('Home.uinfos',['list' => $list],['t' => $t]);
    }
    // 添加或修改个人信息
    public function doadd(Request $request)
    {
        $row = DB::table('user')->where('id',$request->input('id'))->update($request->except('_token'));
        if($row>0){
            return redirect('home/uinfos')->with('msg','编辑成功');
        }else{
            return redirect('home/uinfos')->with('error','编辑失败');
        }
    }
    // 上传头像
    public function doupdate(Request $request)
    {
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
            $data = $request->except('_token','_method','oldpicname');
            $data['pic'] = $picname;
        }else{
            $data = $request->except('_token','_method','oldpicname');
            $data['pic'] = $request->input('oldpicname');
        }
        // dd($request->input('controller'));
        $row = DB::table('user')->where('id',$request->input('id'))->update($data);
        if($row>0){
            return redirect('home/uinfos');
        }else{
            return redirect('home/uinfos');
        }
    }
    // 修改密码
    public function dochange(Request $request)
    {
        $mycode = session('mycode');
        // dd($request->input('mycode'));
        if($mycode != $request->input('mycode')){
            return back()->with('msg','1');
        }
        // $list = DB::table('user')->where('id',$request->input('id'))->first();
        $list = DB::table('user')->where('id',session('user')->id)->first();
        if(md5($request->input('pass')) == $list->pass){
            $data['pass'] = md5($request->input('newpass'));
            $row = DB::table('user')->where('id',$request->input('id'))->update($data);
        }else{
            return back()->with('msg','2');
        }

        if($row>0){
            return redirect('home/uinfos')->with('msg','3');
        }else{
            return redirect('home/uinfos')->with('msg','4');
        }
    }
    // 个人信息页面验证码
     public function captch($tmp)
    {
        $builder = new CaptchaBuilder;
        $builder->build(200,44,null);
        $data = $builder->getPhrase();
        session()->flash('mycode',$data);
        return response($builder->output())->header('Content-type','image/jpeg');
    }
    // 添加收藏
    public function addlove(Request $request)
    {
        DB::table('love')->insertGetId($request->except('_token'));   
    }
    // 删除收藏
    public function removelove(Request $request)
    {
        DB::table('love')->where([['uid',$request->input('uid')],['gid',$request->input('gid')],])->delete();   
    }

     //将商品添加到购物车
    public function AddGoods(Request $request)
    {
        $goods = $request->except('_token');
        // dd($goods);
        $data = DB::table('cart')->insert($goods);
        return redirect('/home/carts');
    }

    // 商品收藏
    public function lovelist($uid)
    {
        $lovelist = DB::table('love')->where('uid',$uid)->get();
        return view('Home.love',['lovelist'=>$lovelist]);
    }

    // 删除收藏商品
    public function dellove(Request $request)
    {
        DB::table('love')->where('id',$request->id)->delete();
    }
}
