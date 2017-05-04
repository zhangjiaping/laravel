<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use DB;

class LoginController extends Controller
{
    public function index()
    {
    	return view('Admin.login');
    }
    
    public function dologin(Request $request)
    {
        //获取session中的验证码内容
        $mycode = session('mycode');
        //判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('mycode')){
            return back()->with('msg','登录失败：验证码不正确');
        }
        //获取用户登录的用户名
        $name = $request->input('name');
        //通过用户名查询数据库有没有这个用户
        $ob = DB::table('admin')->where('name',$name)->first();
        //如果查出用户，则验证密码
        if($ob){
            if($request->input('pass') == $ob->pass){
                //如果密码一致，将用户信息从到session里面
                session(['adminuser' => $ob]);
                //跳转到后台首页
                return redirect('/admin/admin');
            }else{
                //如果密码不一致，提示密码不正确
                return back()->with('msg','登录失败：密码不正确');
            }
        }else{
            //如果查不出用户，提示用户名不正确
            return back()->with('msg','登录失败：用户名不正确');
        }
    }

    public function captch($tmp)
    {
        //生成验证码图片的builder对象，
        $builder = new CaptchaBuilder;
        //设置验证码的宽高字体
        $builder->build(200,44,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);
        //告诉浏览器，这是一张图片并生成图片
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function over()
    {
        session()->forget('adminuser');
        return redirect('admin/login');
    }

    public function checkuser(Request $request)
    {
        $name = $request->input('name');
        $ob = DB::table('admin')->where('name',$name)->first();
        if($ob){
            return redirect('/admin/resetpass/'.$name);
        }else{
            //如果密码不一致，提示密码不正确
            return back()->with('msg','修改失败：用户名不正确');
        }
    }

    public function resetpass($name)
    {
        return view('Admin.pass',['name' => $name]);
    }

    public function doreset(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $name = $data['name'];
        $row = DB::table('admin')->where('name',$name)->update($data);
        if($row > 0){
            return redirect('/admin/login')->with('msg','修改成功');
        }else{
            return redirect('/admin/login')->with('msg','修改失败');
        }
    }
}
