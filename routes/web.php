<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//前台***********************项目
//Index首页视图路由
Route::get("/","MyShop\IndexController@index");
// Route::get("/",function(){
    // return view("index");
// });
//Index首页用户手动输入ajax路由
Route::post("/addseek","MyShop\IndexController@addseek");	

//登录

//Login登录视图路由
Route::get("/login","MyShop\LoginController@login");
//登录
Route::post("/dologin","MyShop\LoginController@dologin");


//登录完
//退出清除session
Route::post("/logout","MyShop\logoutController@logout");

//退出完
//注册

//注册视图
Route::get("/register","MyShop\RegisterController@register");
//查询手机号码
Route::post("/demand","MyShop\RegisterController@demand");
//注册验证码
Route::post("/code","MyShop\RegisterController@code");
//判断验证码
Route::post("/demandcode","MyShop\RegisterController@demandcode");
//注册用户名
Route::post("/enroll","MyShop\RegisterController@enroll");
 
//注册完
//用户修改密码
//ajax查询当前用户输入的密码是否与数据库中一致
Route::post("findpassword","MyShop\ModifyPasswordController@findpassword");

//执行修改密码
Route::post("Modifypass","MyShop\ModifyPasswordController@Modifypass");
//用户修改密码完
//Shop_list商品列表视图路由
Route::get("/shop_list","MyShop\Shop_listController@shop_list");
	// Route::get("/shop_list",function(){
	// 	return view("Shop.shop_list");
	// });
	
//About关于我们视图路由
// Route::get("/about","MyShop\AboutController@about");
	Route::get("/about",function(){
		return view("Shop.about");
	});

//member_order查看订单视图路由
 Route::get("/member_order{id?}","MyShop\Member_OrderController@member_order");
	Route::get("/member_order{id?}",function(){
		return view("Shop.member_order");
	});
	
//member_index账号管理视图路由
// Route::get("/member_index","MyShop\Member_IndexController@member_index");
	Route::get("/member_index",function(){
		return view("Shop.member_index");
	});

//member_collect我的收藏视图路由
// Route::get("/member_collect","MyShop\Member_CollectController@member_collect");
	Route::get("/member_collect",function(){
		return view("Shop.member_collect");
	});

//member_Addr地址管理视图路由
// Route::get("/member_addr","MyShop\Member_AddrController@member_addr");
	Route::get("/member_addr",function(){
		return view("Shop.member_addr");
	});

//gifts氪星礼品站视图路由
// Route::get("/gifts","MyShop\GiftsController@gifts");
	Route::get("/gifts",function(){
		return view("Shop.gifts");
	});

//shop_brand商品品牌(店铺)视图路由
// Route::get("/shop_brand","MyShop\Shop_BrandController@shop_brand");
	Route::get("/shop_brand",function(){
		return view("Shop.shop_brand");
	});

//shop_detail商品细节(餐厅菜单)视图路由
 Route::get("/shop_detail","MyShop\Shop_DetailController@shop_detail");
//	Route::get("/shop_detail",function(){
//		return view("Shop.shop_detail");
//	});

//shop_intro餐厅介绍视图路由
// Route::get("/shop_intro","MyShop\Shop_IntroController@shop_intro");
	Route::get("/shop_intro",function(){
		return view("Shop.shop_intro");
	});

//shop_comment餐厅评论视图路由
 Route::get("/shop_comment","MyShop\Shop_CommentController@shop_comment");
//	Route::get("/shop_comment",function(){
//		return view("Shop.shop_comment");
//	});
 
//shop_order大家都在点页面视图路由
	Route::get("/shop_order",function(){
		return view("Shop.shop_order");
	});

//feedback用户反馈
Route::post("/feedback","MyShop\FeedbackControoler@store");

        
//help帮助中心视图路由
	Route::get("/help",function(){
		return view("Shop.help");
	});
        
//jobs人才招聘视图路由
	Route::get("/jobs",function(){
		return view("Shop.jobs");
	});
        
//contact联系我们视图路由
	Route::get("/contact",function(){
		return view("Shop.contact");
	});
        
//order下订单(送餐信息)页面视图路由
Route::post("/creade_order","MyShop\OrderController@creade_order");
Route::get("/order","MyShop\OrderController@order");
//	Route::get("/order",function(){
//		return view("Shop.order");
//	});


//order_success下订单成功页面视图路由
	Route::get("/order_success",function(){
		return view("Shop.order_success");
	});

//找回密码开始
Route::get("/FindPassword","MyShop\PasswordController@FindPassword");
//判断手机号码是否存在
Route::post("/FindPhone","MyShop\PasswordController@FindPhone");
//找回密码验证码
Route::post("/FindCode","MyShop\PasswordController@FindCode");
//判断验证码是否正确
Route::post("/DemandFindCode","MyShop\PasswordController@DemandFindCode");
//加载修改密码
Route::get("/ResetPassword","MyShop\PasswordController@ResetPassword");
//修改密码
Route::post("/DoResetPassword","MyShop\PasswordController@DoResetPassword");
Route::get("/SuccessFind","MyShop\PasswordController@SuccessFind");
//找回密码完
//后台***********************项目
