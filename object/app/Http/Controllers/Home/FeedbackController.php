<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;

class FeedbackController extends Controller
{
    //问题反馈控制器
    public function index()
    {
          //判断网站开关是否打开
        $con=DB::table('config')->first();
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();
    	// dd(1111);
    	return view('Home.feedback',['type' =>$type,'goods' => $goods,'con'=>$con]);
    }
    //记录
    public function zhuce(Request $request)
    {
        if(empty(session('user')->username)){
            return redirect('/home/home')->with('msg','登录之后才可以发表反馈！');
        }
    	 //获取session中的验证码内容
        $mycode = session('mycode');
        // 判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('checkcode')){
            return back()->with('msg','提交问题失败：验证码不正确');
        }
    	$this->validate($request, [
                'content' => 'required',
                'tel' => 'required',
                'tel' => 'max:11',
            ],$this->messages());
    	$data=$request->except('_token','checkcode');
    	if($data['name']==0){
           return back()->with('msg','提交问题失败：请您选择问题类型');
        }elseif($data['name']==1){
    		$data['name']='功能意见';
    	}elseif($data['name']==2){
    		$data['name']='界面意见';
    	}elseif($data['name']==3){
    		$data['name']='性能问题';
    	}elseif($data['name']==4){
    		$data['name']='网络问题';
    	}elseif($data['name']==5){
    		$data['name']='新的需求';
    	}elseif($data['name']==6){
    		$data['name']='其他问题';
    	}
    	// dd($data);
            $id=DB::table('feedback')->insertGetId($data);
            if($id>0)
            {
                return redirect('/home/feedback')->with('msg','恭喜您提交成功！');
            }
    }
     public function messages()
     {
        return [
            'content.required' => '内容必须填写！',
            'tel.required' => '关键字必须填写！',
            'tel.max' => '手机号不能超过11位！',
        ];
     }

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


}
