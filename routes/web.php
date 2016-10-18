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


//商家注册

//查询客户端输入的用户名是否存在
Route::post("Business","MyShop\BusinessController@FindBusiness");
//查询客户端输入的手机号码是否存在
Route::post("FindBusinessPhone","MyShop\BusinessController@FindBusinessPhone");
//查询客户端输入的邮箱是否存在
Route::post("FindEmail","MyShop\BusinessController@FindEmail");
//提交商家信息
Route::post("Submitinfo","MyShop\BusinessController@Submitinfo");
//商家注册完

//用户找回密码开始
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
//用户找回密码完

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
	Route::get("/member_collect","MyShop\Member_CollectController@member_collect");
	/*Route::get("/member_collect",function(){
		return view("Shop.member_collect");
	});*/
//member_collect删除收藏路由
	Route::post("/member_collect","MyShop\Member_CollectController@member_delete");

//member_collectinsert添加收藏路由
	Route::post("/member_collectinsert","MyShop\Member_CollectController@member_collectinsert");

//member_Addr地址管理视图路由
	Route::get("/member_addr","MyShop\Member_AddrController@member_addr");

//删除收货地址路由
	Route::post("/member_addrdelete","MyShop\Member_AddrController@member_addrdelete");

//遍历所有地址路由
	Route::post("/member_addrlist","MyShop\Member_AddrController@member_addrlist");	

//增加收货地址路由
	Route::post("/member_addradd","MyShop\Member_AddrController@member_addradd");

//修改收货地址路由
	Route::post("/member_addrupdate","MyShop\Member_AddrController@member_addrupdate");

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
Route::post("/create_order","MyShop\OrderController@creade_order");
Route::get("/order","MyShop\OrderController@order");
//添加送货地址
Route::post("/add","MyShop\OrderController@add");
//修改送货地址
Route::post('/update','MyShop\OrderController@update');
//删除送货地址
Route::delete('/del',"MyShop\OrderController@destroy");
//提交订单
Route::post('/tijiao',"MyShop\OrderController@tijiao");
//送货地址
Route::post("/songhuodizhi","MyShop\OrderController@shdz");
Route::post("/ord","MyShop\OrderController@ord");


//order_success下订单成功页面视图路由
	Route::get("/order_success",function(){
		return view("Shop.order_success");
	});



//后台***********************项目
// 登录表单 
	Route::get("Admin/login","MyAdmin\LoginController@login");

// 执行登录 
	Route::post("Admin/login","MyAdmin\LoginController@dologin");

// 验证码
	Route::get("Admin/captcha/{tmp?}","MyAdmin\LoginController@captcha");

//后台界面 需要登录才能访问的内容 
Route::group(["prefix"=>"Admin","middleware"=>"myauth"],function(){

//网站后台首页
	Route::get("index","MyAdmin\IndexController@index");

//执行退出 
	Route::get("logout","MyAdmin\LoginController@logout");

//后台桌面
	Route::get("welcome","MyAdmin\WelcomeController@welcomes");
	});

// 查看信息页面
	Route::get("Admin/member-show",function(){
		return view("Admin.member-show");
	});


// 用户列表
	Route::get("article_list","MyAdmin\UserlistController@article");

 //用户反馈列表
	Route::get("picture-list","MyAdmin\ChangeController@picture_list");
        Route::get("picturelistdelete","MyAdmin\ChangeController@picturelistdelete");
// 执行修改页面
	// Route::get("change-password","MyAdmin\ChangeController@change_password");
	Route::post("change-password","MyAdmin\ChangeController@update");

// 添加用户页面
 	Route::get("/article-add",function(){return view("/Admin.article-add");});

 // 执行添加
 	Route::post("Admin/article-add","MyAdmin\ChangeController@add");

//member-del停用的用户
 	Route::get("/member-del",function(){return view("/Admin.member-del");});

// 商家列表
 	Route::get("product-brand","MyAdmin\ChangeController@product_brand");
        //加载商家审核视图
        Route::get("BusinessAudit_list","MyAdmin\ChangeController@BusinessAudit_list");
        //审核商家
        Route::post("operationBusiness","MyAdmin\ChangeController@operationBusiness");
        Route::post("jsonfh","MyAdmin\ChangeController@jsonfh");
        Route::get('/email','MyShop\EmailController@index');
//评论列表
 	Route::get("product-list","MyAdmin\ChangeController@product_list");

//订单列表
 	Route::get("product-category-cation","MyAdmin\ChangeController@product_category_cation");

//菜品列表
 	Route::get("product-category-reviewed","MyAdmin\ChangeController@product_category_reviewed");

//管理员列表
 	Route::get("admin-list","MyAdmin\ChangeController@admin_list");

 //admin-add添加管理员
   	Route::get("/admin-add",function(){
 		return view("/Admin.admin-add");
 	}); 

//system-base系统设置
   	Route::get("/system-base",function(){
 		return view("/Admin.system-base");
 	});

//system-log系统日志
   	Route::get("/system-log",function(){
 		return view("/Admin.system-log");
 	});





//商家后台***********************项目


// 登录表单 
	Route::get("Business/login","MyBusiness\LoginController@login_s");
// 执行登录 
	Route::post("Business/login","MyBusiness\LoginController@dologin_s");
// 验证码
	Route::get("Business/captcha/{tmp?}","MyBusiness\LoginController@captcha_s");


Route::group(["prefix"=>"Business","middleware"=>"mybusi"],function(){
//网站后台首页
	Route::get("busi","MyBusiness\BusinessController@index_s");

//后台桌面
	Route::get("welcome","MyBusiness\BusinessController@welcome");

//执行退出 
	Route::get("logout","MyBusiness\LoginController@logout_s");

	});

//修改密码
 	Route::get("dealer-password","MyBusiness\ChangepasswordController@dealer_password");
 	Route::post("dealer-password","MyBusiness\ChangepasswordController@update");
//修改手机号
 	Route::get("dealer-phone","MyBusiness\ChangepasswordController@dealer_phone");
 	Route::post("dealer-phone","MyBusiness\ChangepasswordController@updatephone");
//店铺信息
 	Route::get("business-info","MyBusiness\ChangepasswordController@business_info");
//添加店铺视图
 	Route::get("business-brand","MyBusiness\ChangepasswordController@business_brand");
//添加店铺
 	Route::post("business-brand","MyBusiness\ChangepasswordController@business_brand_add");
//执行文件上传 
	// Route::post("business-brand","MyBusiness\ChangepasswordController@uploadfile");
//menu-brand添加菜品
 	Route::get("/menu-brand",function(){
 		return view("/Business.menu-brand");
 	});

//menu-list菜单列表
 	Route::get("/menu-list",function(){
 		return view("/Business.menu-list");
 	});

//menu-cance回收站
 	Route::get("/menu-cance",function(){
 		return view("/Business.menu-cance");
 	});

//orderform-list订单列表
 	Route::get("/orderform-list",function(){
 		return view("/Business.orderform-list");
 	});

//orderform-accomplish已完成的订单
 	Route::get("/orderform-accomplish",function(){
 		return view("/Business.orderform-accomplish");
 	});

//orderform-unfinished已完成的订单
 	Route::get("/orderform-unfinished",function(){
 		return view("/Business.orderform-unfinished");
 	});

//comment-info反馈列表
 	Route::get("/comment-info",function(){
 		return view("/Business.comment-info");
 	});
