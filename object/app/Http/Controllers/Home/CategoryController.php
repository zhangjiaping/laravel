<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    //前台列表控制器
    public function index(Request $request,$id){
        $name="";
        // dd($request->input('name'));
        $con=DB::table('config')->first();
        // 商品分类
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();

        // 所有商品
        $goods = DB::table('goods')->get();

        //实例化操作表
        $lunbo=DB::table('lunbo')->get();
       
       if($request->has('name')){
            //获取搜索的条件
            $name=$request->input('name');
            $list=DB::table('goods')->where('name','like',"%{$name}%")->get();
        }else{
            $list=DB::table('goods')->where('type',$id)->get();
        }
        
         // dd($list);
        // dd($id);
        return view('Home.like',['tupian'=>$lunbo,'list'=>$list,'type'=>$type,'type'=>$type,'goods'=>$goods,'fid'=>$id,'con'=>$con,'name'=>$name]);
    }



    public function fenlei(Request $request,$id)
    {

        // 商品分类
        $typee = DB::table('type')->whereNotIn('name',['手机'])->get();

        $con=DB::table('config')->first();
        // 商品分类
        $typee = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();

        $b=[];
        $lunbo=DB::table('lunbo')->get();
    	$type='';
    	// dd($id);
    	 $type=DB::table('type')->get();
    	$a=DB::table('type')->where('id',$id)->first();
    	// dd($a);
    	$upid=$a->upid;
    	if($upid==0){
    		$b=DB::table('type')->where('upid',$id)->get();
    		// dd($b);
    	}
    	$data = array();
    	foreach ($b as $v) {
    		$data[]=$v->id;	
    	}
    	$d = DB::table('goods')->whereIn('type',$data)->get();	

  		return view('Home.like',['tupian'=>$lunbo,'list'=>$d,'type'=>$type,'type'=>$type,'goods'=>$goods,'con'=>$con,'fid'=>$id]);
    }
    //这里是按销量排序的
    public function xinpin($id)
    {
        $name="";
        $con=DB::table('config')->first();
        // 商品分类
        $typee = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();
        $where ='';
        $lunbo=DB::table('lunbo')->get();
    	 $type=DB::table('type')->get();
    	 // dd($type);
         if(is_numeric($id)) {
        	$aa=DB::table('goods')->where('type',$id);
            $a=$aa->orderBy('hot','desc')->get();
              }else{
                $name=$id;
                $aa=DB::table('goods')->where('name','like',"%{$id}%");
                $a=$aa->orderBy('hot','desc')->get();
             }
    	// dd($a);
  		return view('Home.like',['tupian'=>$lunbo,'list'=>$a,'type'=>$type,'where'=>$where,'type'=>$type,'goods'=>$goods,'fid'=>$id,'con'=>$con,'name'=>$name]);
    }
    //这里是按价钱排序的
    public function jiage($id)
    {
        $name="";
        // dd($id);
        $con=DB::table('config')->first();
        // 商品分类
        $typee = DB::table('type')->whereNotIn('name',['手机'])->get();
        // 所有商品
        $goods = DB::table('goods')->get();
         //保存搜索条件
        $where ='';
        $lunbo=DB::table('lunbo')->get();
    	$type=DB::table('type')->get();
        if(is_numeric($id)) {
    	   $a=DB::table('goods')
                        ->where('type',$id)
                        ->orderBy('price','asc')
                        ->get();
        }else{
            // dd($id);
            $name=$id;
            $a=DB::table('goods')
                ->where('name','like',"%{$id}%")
                ->orderBy('price','asc')
                ->get();

        }
        //  $aa=DB::table('goods')->where('type',$id);
        // $a=$aa->orderBy('price','desc')->get();
    	// dd($a);
  		return view('Home.like',['tupian'=>$lunbo,'list'=>$a,'type'=>$type,'where'=>$where,'type'=>$type,'goods'=>$goods,'fid'=>$id,'con'=>$con,'name'=>$name]);
    }

    //搜索表单
    public function shishi(Request $request,$id)
    {
        dd($id);
            $con=DB::table('config')->first();
            // 商品分类
            $type = DB::table('type')->whereNotIn('name',['手机'])->get();





            // index没有传过来
            // 缺fid有它就行





            // 所有商品
            $goods = DB::table('goods')->get();


            //实例化操作表
            $lunbo=DB::table('lunbo')->get();
            $list=DB::table('goods')->get();
            
           if($request->has('name')){
                //获取搜索的条件
                $name=$request->input('name');
                $list=DB::table('goods')->where('name','like',"%{$name}%")->get();

            }
            foreach ($list as $v) {
                $id=$v;
            }
            $id=$id->id;
            $list=DB::table('goods')->where('type',$id)->get();
        // dd($id);
        return view('Home.likesous',['tupian'=>$lunbo,'list'=>$list,'type'=>$type,'type'=>$type,'goods'=>$goods,'con'=>$con,'id'=>$id]);
    }
    
}
