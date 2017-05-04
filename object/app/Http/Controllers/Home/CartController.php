<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gid = '';
        if(!empty(session('user'))){
            $data = DB::table('cart')->where('uid',session('user')->id)->get();
            if(count($data) > 0){
                $type = $data[0]->gid;
                $types = DB::table('goods')->where('id',$type)->first();
                $goods = DB::table('goods')->where('type',$types->type)->limit(10)->get();
            }else{
                $goods = DB::table('goods')->where('id','>',28)->limit(10)->get();
            }  
        }else{
            $data = '';
            $goods = DB::table('goods')->limit(10)->get();
        }
        return view('Home.shopcar',['list' => $data,'goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $str = '';
        $str = ltrim($request->input('id')[0],',');
        $id[] = explode(',',$str);
        $cid = $id;
        session(['cid' => $cid]);
        return redirect('/home/checkout');
        
    }

    public function gnum(Request $request,$id)
    {
        $data = $request->only('gnum','total');
        DB::table('cart')->where('id',$id)->update($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $stock = $request->input('stock');
        DB::table('goods')->where('id',$id)->update(['stock' => $stock]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        DB::table('cart')->where('id',$id)->delete();
        return redirect('/home/carts')->with('msg','删除成功');
    }

     public function add($id)
    {
        if(!empty(session('user'))){
            $goods = DB::table('goods')->where('id',$id)->select('name','pic','stock','price')->first();
            $data['gname'] = $goods->name;
            $data['gid'] = $id;
            $data['gpic'] = $goods->pic;
            $data['stock'] = $goods->stock;
            $data['price'] = $goods->price;
            $data['uid'] = session('user')->id;
            $data['total'] = $goods->price;
            DB::table('cart')->insertGetId($data);
            return redirect('home/carts');
        }else{
            return redirect('home/carts');
        }
    } 
}
