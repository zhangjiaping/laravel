<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;

class LoginConstroller extends Controller
{
    //
    public function index()
    {
    	return view('Home.login');
    }

    public function doindex()
    {
    	return view('Home.regist');
    }
    //验证码
     public function captch($tmp)
    {
         //生成验证码图片的builder对象，
        $builder = new CaptchaBuilder;
        // 设置验证码的宽高字体
        $builder->build(200,44,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);

        //告诉浏览器，这是一张图片
        // header('content-type:image/jpeg');
        //生成图片
        // $builder->output();die;

        return response($builder->output())->header('Content-type','image/jpeg');
    }
    //用户注册添加
    public function zhuce(Request $request)
    {

        // 输入框中的和数组库中的不能一样
        $zhanghao=$request->input('username');
        $chongfu=DB::table('user')->where('username',$zhanghao)->get();
        // dd($chongfu);
        foreach ($chongfu as $v) {
            // dd($v);
            // dd($v);
            $shishi=$v;
        }
        if(!empty($shishi)){
            return back()->with('msg','注册失败：用户名不能重复请您重新换一个吧！');
        }



        $zhanghao=$request->input('username');
        //密码
        $mima=$request->input('pass');
        //如果账号和密码相同那么会提示账号和密码相同不安全
         if($zhanghao==$mima){
             return back()->with('msg','注册失败：用户名跟密码不能相同！');
         }
         // 获取session中的验证码内容
        $mycode = session('mycode');
        // 判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('checkcode')){
            return back()->with('msg','注册失败：验证码不正确');
        }
        //把前台传过来的多选框赋给一个变量$dianji
         $dianji=$request->input('dianji');
         // dd($dianji);
         //判断是否已经勾选上我已同意选项
            if($dianji!='on'){
                return back()->with('msg','注册失败：请选择我已阅读并同意');
                exit;
            }
        // $ob['logo'] = $picname;
        $data=$request->except('_token','checkcode','dianji');
        //把输入框中的值经过md5加密之后赋给一个$data['pass']
        $username=$request->input('username');

         $data['pass']=md5($request->input('pass'));

         // dd($data);
        // exit;
         //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);
          $row=DB::table('user')->insertGetId($data);
       if($row>0)
       {
            return redirect('/home/login')->with('msg','恭喜您注册成功！');
       }else{
        return redirect('/home/dologin');
       }

    }
    //用户登录
    public function denglv(Request $request)
    {
        $username=$request->input('username');
        $pass=$request->input('pass');

        if($username==""){
             return back()->with('msg','登录失败：用户名不能为空！');
        }elseif($pass==""){
            return back()->with('msg','登录失败：密码不能为空！');
        }

        $ob = DB::table('user')->where('username',$username)->first();
        // dd($ob);

        if($ob){
            if($ob->pass == md5($request->input('pass'))){
                session(['user'=>$ob]);
                // dd($ob);
                //这里是登录首页的地方
                return redirect('/home/home');
            }else{
                return back()->with('msg','登录失败：密码不正确');
            }
        }else{
            return back()->with('msg','登录失败：用户名不正确');
        }
    }



    //前台退出功能执行功能
    public function tuichu(Request $request)
    {   
        $request->session()->flush();
         return redirect('/home/home')->with('msg','恭喜您退出成功！');
    }





}
