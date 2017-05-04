<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class CommentController extends Controller
{
    //发帖回帖控制器
    //这里是显示你所查的内容
    public function index(Request $request,$id,$gid)
    {
        $name=$id;

        $gid=$gid;
        $con=DB::table('config')->first();
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();
    	//这个是取的发表评论表
    	$list=DB::table('comment')->get(); 

        //这个写的是回帖的数据
        $rlist=DB::table('replay')->get();
    	//取user表中的数据
    	$ob=DB::table('user')->get();
    
    	// dd($rlist);
    	return view('Home.comment',['list'=>$list,'ob'=>$ob,'rlist'=>$rlist,'type' =>$type,'goods' => $goods,'con'=>$con,'name'=>$name,'gid'=>$gid]);
    }
    //这里是执行回帖的功能
    public function doreplay(Request $request)
    {
        //判断用户是否登录如果没有登录则提示
         if(empty(session('user')->username)){
            return redirect('/home/home')->with('msg','登录之后才可以回帖！');
        }

        $time = Carbon::now('PRC')->toDateTimeString();
         $name=$request->input('name');
        // dd($name);
        $gid=$request->input('gid');
        if(empty(session('user')->username)){
            return redirect('/home/home')->with('msg','登录之后才可以回复评论哦！');
        }

        $data=$request->except('_token','name','gid');
        $data['rtime']=$time;
        // dd($data);
        $id=DB::table('replay')->insertGetId($data);
        if($id>0)
        {
            return redirect("/home/comment/$name/$gid")->with('msg','恭喜您回复成功');
        }
    }
    //这里是添加标题的地方
    public function tianjia(Request $request)
    {
        //登录之后才可以发帖
        if(empty(session('user')->username)){
            return redirect('/home/home')->with('msg','登录之后才可以发贴！');
        }
        $time = Carbon::now('PRC')->toDateTimeString();
        $data=$request->except('_token','name');
        $name=$request->input('name');
        $data['time']=$time;
        $gid=$data['gid'];
        $uid=$data['uid'];
        $id=DB::table('comment')->insertGetId($data);
        if($id>0)
        {
            return redirect("/home/comment/$name/$gid")->with('msg','添加标题成功');
        }


    }

}
