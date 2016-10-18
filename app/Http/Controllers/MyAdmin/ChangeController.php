<?php

namespace App\Http\Controllers\MyAdmin;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChangeController extends Controller
{
	//修改密码视图
	// public function change_password()
	// {
	// 	return view('Admin.change-password');
	// }
	//执行修改密码
	public function update(Request $request)
	{
		return 'y';
	}

	//用户反馈列表
	public function picture_list()
	{
		$li = \DB::table('feedback')->get();
		return view("Admin.picture-list",['li'=>$li]);
	}

	//商家列表
	public function product_brand()
	{
            $product = \DB::table('business')->get();
            return view("Admin.product-brand",['product'=>$product]);
	}
        //加载商家审核视图
        public function BusinessAudit_list()  
        {
            $info = \DB::table('dealer')->get();
            return view("Admin.BusinessAudit",['list'=>$info]);
        }
        public function jsonfh()
        {
            $info = \DB::table('dealer')->get();
            //$list = array[]
            return response()->json([''=>$info]);
            //return response()->json(array('msg'=> $msg), 200);
        }
        //操作商家审核
        public function operationBusiness(Request $request)
        {
            $id = $request->input('id');
            $zt = $request->input('aa');
            $aa = \DB::table('dealer')->where('id',$id)->get();
            foreach($aa as $k => $v){
                $ar = $v;
            }
            $username = $ar->username;
            $email = $ar->email;
            $data = [
                'email' => $email,
                'name' => $username,
                'title' => '您好,超人外卖商家入驻审核结果'
                ];
            if($zt == '2'){
                $re = Mail::send('Admin.email', ['user' => env('MAIL_USERNAME')], function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])->subject($data['title']);
                });
            }
            if($zt == '3'){
                $re = Mail::send('Admin.failemail', ['user' => env('MAIL_USERNAME')], function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])->subject($data['title']);
                });
            }
            

            $user = \DB::table('dealer')->where('id',$id)->update(['examine' => $zt]);
            return 'y';
        }
	//评论列表
	public function product_list()
	{
		$product_list = \DB::table('comment')->get();
		return view("Admin.product-list",['product_list'=>$product_list]);
	}

	//订单列表
	public function product_category_cation()
	{
		$product_category_cation = \DB::table('orderform')->get();
		return view("Admin.product-category-cation",['product_category_cation'=>$product_category_cation]);
	}

	//菜品列表
	public function product_category_reviewed()
	{
		$product_category_reviewed = \DB::table('menu')->get();
		return view("Admin.product-category-reviewed",['product_category_reviewed'=>$product_category_reviewed]);
	}

	//管理员列表
	public function admin_list()
	{
		$admin_list = \DB::table('useradmin')->get();
		return view("Admin.admin-list",['admin_list'=>$admin_list]);
	}


    //执行添加
		public function add(Request $request)
		{
       	 	//获取要添加的信息
        		$name = $request->input("name");
        		$password = $request->input("password");
        		$passwd = $request->input("passwd");
       		//获取指定的部分数据
	        	$data = $request->only("name","password");
	        	// dd($data);
	        	//判断是否输入用户名和密码
	        	if($data["name"]==null){
	        		echo '<b style="font-size:35px;color:red;">骚年不输用户名也想添加？右上角exit<b>';
	        	}elseif($data["password"]==null)
	        	{
	        		echo '<b style="font-size:35px;color:pink;">把密码填上再添加亲！右上角exit<b>';
	        	}
	        	else{
	        		$id = \DB::table("user")->insertGetId($data);
	        		if($id>0){
	        			echo '<b style="font-size:50px;color:blue;">添加成功！！<b>';
	        		}else{
	             return back()->with("err","添加失败!");
	       	 	}
	        	}
		}

		// public function change_password(Request $r)
		// {
		// 	//执行删除
	 //        if(\DB::table("user")->where("pid",$id)->count()>0){
	 //            echo '成功';
	 //        }
	 //        \DB::table("type")->where("id",$id)->delete();
	 //        return redirect('admin/type');
		// }
                

}
