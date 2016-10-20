<?php

namespace App\Http\Controllers\MyAdmin;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class ChangeController extends Controller
{
	//获取用户名
	public function update(Request $request)
	{
		$id = $request->input('id');
		$password = $request->input('newpassword');
		$password2 = $request->input('newpassword2');
		$sql = \DB::table('user')->where('id',$id)->first();
		return view('Admin.change-password',['sql'=>$sql]);
	}
	//执行修改密码
	public function change_password(Request $request)
	{
		$id = $request->input('id');
		$password = $request->input('newpassword');
		$password2 = $request->input('newpassword2');
			if($password == '' && $password2 == '')
			{
				return back()->with("msg","密码不能为空");
			}
			if($password === $password2){
					$pass = \DB::update('update user set password='."'$password'".'where id='.$id);
					if($pass > 0){
						echo '<h1 style="color:red">修改成功<h1>';
					}
			}else{
				return back()->with("msg","两次输入密码请一致");
			}
	}

	//执行删除用户
	public function delete(Request $request)
	{
		$id = $request->input('id');
		$del = \DB::delete('delete from user where id='.$id);
		return back()->with("msg","删除成功");
	}
	//添加页面视图
	public function add()
	{
		return view('Admin.article-add');
	}
    //执行添加
		public function article_add(Request $request)
		{
       	 	//获取要添加的信息
        		$name = $request->input("name");
        		$password = $request->input("password");
        		$password2 = $request->input("password2");
	        	//判断是否输入帐号
	        	if($name==null){
				return back()->with("msg","帐号不能为空");
	        	}elseif($password==null || $password2==null)	        	//判断是否输入密码
	        	{
				return back()->with("msg","密码不能为空");
	        	}
	        	elseif($password!=$password2)	        					//判断输入密码是否一致
	        	{
	        		return back()->with("msg","密码不一致");
	        	}
	        	elseif(\DB::table('user')->where('name',$name)->first())	  //判断帐号是否存在
	        	{
	        		return back()->with("msg","帐号已存在");
	        	}
	        	else
	        	{	//添加帐号进数据库
	        		$id = \DB::table("user")->insert(['name'=>$name,'password'=>$password]);
	        		if($id>0){
					return back()->with("msg","添加成功！");
	        		}else{
	            		return back()->with("msg","添加失败！");
	       	 	}
	        	}
		}

	//用户反馈列表
	public function picture_list()
	{
		$li = \DB::table('feedback')->get();
		return view("Admin.picture-list",['li'=>$li]);
	}
        
        public function picturelistdelete(Request $request)
        {
            $id = $request->input('id');
            $data = \DB::table("feedback")->where("id",$id)->delete();
            return 'y';
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


}
