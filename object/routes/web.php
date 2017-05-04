<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'Home\HomeController@index');
// Home\HomeController
// 后台路由群组
// 张佳平后台
Route::group(['prefix' => 'admin','middleware' => 'login'],function(){
	// 后台主页
	Route::resource('/admin','Admin\AdminController');
	// 后台管理员管理
	Route::resource('/admins','Admin\AdminsController');
	Route::resource('/adminsadd','Admin\AdminsController');
	// 后台退出
	Route::get('/over','Admin\LoginController@over');
	// 后台商品管理
	Route::resource('/goods','Admin\GoodsController');
	Route::get('/ajax/get','Admin\GoodsController@doget');
	Route::post('/ajax/post','Admin\GoodsController@dopost');
	// 后台商品列别管理
	Route::resource('/type','Admin\TypeController');
	Route::get('/typeSon/{id}','Admin\TypeController@createSon');
	Route::post('/storeSon','Admin\TypeController@storeSon');
	// 后台轮播管理
	Route::resource('/lb','Admin\LbController');
	Route::get('/yuantu/{id}','Admin\LbController@yuantu');
	// 后台商品收藏管理
	Route::resource('/love','Admin\LoveController');
// 魏东亮 后台
	//网站配置
	Route::resource('/config','Admin\ConfigController');
	//公告
	Route::resource('/notice','Admin\NoticeController');
	//配送方式
	Route::resource('/dilivery','Admin\DiliveryController');
	//地址管理
	Route::get('/address','Admin\AddressController@index');
	// 后台管理员管理
	Route::resource('/admins','Admin\AdminsController');
	Route::resource('/adminsadd','Admin\AdminsController');
	//后台问题反馈
	Route::resource('/feedback','Admin\FeedbackController');
	//发表评论
	Route::resource('/comment','Admin\CommentController');
	//评论回复
	Route::resource('/replay','Admin\ReplayController');
// 杜陆加后台
	//用户退出
	Route::get('/over','Admin\LoginController@over');
	//用户管理
	Route::resource('/user','Admin\UserController');
	//链接管理
	Route::resource('/links','Admin\LinksController');
	//订单管理
	Route::resource('/order','Admin\OrderController');
	Route::get('/select','Admin\OrderController@select');
	//支付管理
	Route::resource('/pay','Admin\PayController');	
});
// 东亮
	Route::get('/upload','upload\UploadController@index');
	Route::post('/doupload','upload\UploadController@doupload');
// 路加
	Route::get('/ajaxdemo','AjaxController@index');
	Route::get('/ajaxdemo/get','AjaxController@doget');
	Route::post('/ajaxdemo/post','AjaxController@dopost');
	//登录
	Route::get('admin/login','Admin\LoginController@index');
	Route::post('admin/dologin','Admin\LoginController@dologin');
	Route::post('admin/checkuser','Admin\LoginController@checkuser');
	Route::get('admin/resetpass/{name}','Admin\LoginController@resetpass');
	Route::post('admin/doreset','Admin\LoginController@doreset');
	//验证码
	Route::get('Admin/captch/{tmp}','Admin\LoginController@captch');
// 前台路由群组
// 张佳平前台
Route::group(['prefix' => 'home'],function(){
	// 主页
	Route::resource('/home','Home\HomeController');
	// 商品详情
	Route::get('/xiangqing/{id}','Home\HomeController@xiangqing');
	// 城市联动
	Route::get('/city/get','Home\HomeController@doget');
	Route::post('/city/post','Home\HomeController@dopost');
	// 个人信息页面
	Route::get('/uinfos/{t?}','Home\HomeController@uinfo');
	// 添加个人信息
	Route::post('/doadd','Home\HomeController@doadd');
	// 上传照片
	Route::post('/doupdate','Home\HomeController@doupdate');
	// 修改密码
	Route::post('/dochange','Home\HomeController@dochange');
	// 前台个人中心验证码
	Route::get('/captchs/{tmp}','Home\HomeController@captch');
	// 商品收藏
	Route::get('/addlove','Home\HomeController@addlove');
	Route::get('/removelove','Home\HomeController@removelove');
	// 商品收藏
	Route::get('/lovelist/{uid}','Home\HomeController@lovelist');
	Route::get('/dellove','Home\HomeController@dellove');
// 魏东亮 前台
	// 消息公告
	Route::get('/xiaoxi','Home\XiaoxiController@index');
	//前台登录
	Route::get('/login','Home\LoginConstroller@index');
	//前台注册
	Route::get('/dologin','Home\LoginConstroller@doindex');
	// 路由
	Route::get('/username','Home\LoginConstroller@username');
	// 前台注册为了测试的时候用
	//验证码
	Route::get('/captch/{tmp}','Home\LoginConstroller@captch');
	//执行添加注册
	Route::post('/zhuce','Home\LoginConstroller@zhuce');
	//验证是否登录
	Route::post('/denglv','Home\LoginConstroller@denglv');
	//用户退出
	Route::get('/tuichu','Home\LoginConstroller@tuichu');
	//列表的主页
	Route::get('/liebiao/{t}','Home\CategoryController@index');
	// 列表的分类
	Route::get('/liebiaofl/{id}','Home\CategoryController@fenlei');
	//新品分类
	Route::get('/xinpin/{t}','Home\CategoryController@xinpin');
	//列表的价格
	Route::get('/jiage/{t}','Home\CategoryController@jiage');
	//列表的搜索
	Route::post('/sousu','Home\CategoryController@shishi');
	// 问题反馈
	Route::get('/feedback','Home\FeedbackController@index');
	Route::post('/zhucewt','Home\FeedbackController@zhuce');
	// 评论管理
	//发评论
	Route::get('/comment/{t}/{d}','Home\CommentController@index');
	Route::post('/commentt','Home\CommentController@doreplay');
	//个人中心里的消息通知
	Route::get('/xiaoxi','Home\XiaoxiController@index');
	//系统维护界面
	Route::get('/xitongweihu','Home\XitongweihuController@index');
	// 评论管理
	//发评论
	Route::get('/comment/{t}/{d}','Home\CommentController@index');
	Route::post('/commentt','Home\CommentController@doreplay');
	//发评论的标题
	Route::post('/fatie','Home\CommentController@tianjia');
	// xitongweihu
// 杜陆加前台
		//前台个人中心
	Route::resource('/userinfo','Home\UcenterController');
	Route::get('/pay/{id?}','Home\UcenterController@pay');
	//前台我的订单
	Route::get('/ordersearch','Home\UcenterController@ordersearch');
	//前台删除订单
	Route::post('/orderdel/{id?}','Home\UcenterController@orderdel');
	//前台订单详情
	Route::get('/orderinfo/{id?}','Home\UcenterController@OrderInfo');
	//前台确认收货
	Route::get('/getorder/{id?}','Home\UcenterController@GetOrder');
	// 前台确认订单
	Route::resource('/checkout','Home\CheckorderController');
	//前台购物车
	Route::resource('/carts','Home\CartController');
	//前台添加商品到购物车
	Route::get('/single/{id?}','Home\CartController@add');
	//前台支付
	Route::resource('/pays','Home\PayController');
	//列表的主页
	//添加商品到购物车
	Route::post('/addgoods','Home\HomeController@AddGoods');
	//将商品数量和小计添加到购物车
	Route::get('/gnum/{id?}','Home\CartController@gnum');
	//前台支付
	Route::resource('/pays','Home\PayController');
});
Route::get('/upload','Upload\UploadController@index');