<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class XitongweihuController extends Controller
{
    //系统维护界面
    public function index()
    {
 
    	return view('/Home/xitongweihu');
    }
}
