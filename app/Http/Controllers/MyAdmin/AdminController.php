<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class AdminController extends Controller
{
	//管理员列表
	public function admin_list()
	{
		$admin_list = \DB::table('useradmin')->get();
		return view("Admin.admin-list",['admin_list'=>$admin_list]);
	}
	//添加管理员视图
	public function admin_add()
	{
		return view("Admin.admin-add");
	}
	//执行添加管理员
	public function add(Request $request)
	{	//获取值
		$name = $request->input('name');
		$password = $request->input('password');
		$password2 = $request->input('password2');
		$phone = $request->input('phone');
		$email = $request->input('email');
		$address = $request->input('address');
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
	        	elseif(\DB::table('useradmin')->where('name',$name)->first())	  //判断帐号是否存在
	        	{
	        		return back()->with("msg","帐号已存在");
	        	}
	        	else
	        	{	//添加帐号进数据库
	    			$list = \DB::table('useradmin')->insert(['name'=>$name,'password'=>$password,'phone'=>$phone,'email'=>$email,'address'=>$address]);
	        		if($list>0){
					return back()->with("msg","添加成功返回页面刷新！");
	        		}else{
	            		return back()->with("msg","人品太差撸一下再来！");
	       	 	}
	        	}
	}
	//执行删除管理员
	public function delete(Request $request)
	{
		$id = $request->input('id');
		$del = \DB::delete('delete from useradmin where id='.$id);
		return back()->with("msg","删除成功！！");
	}
	//修改管理员页面
	public function admin_edit(Request $request)
	{
		//获取值把id传给edit
		$sql = $request->input('id');
		$sql = \DB::table('useradmin')->where('id',$sql)->first();
		return view('Admin.admin-edit',['sql'=>$sql]);
	}
	//执行修改
	public function edit(Request $request)
	{
		//获取值
		$id = $request->input('id');
		$name = $request->input('name');
		$password = $request->input('password');
		$password2 = $request->input('password2');
		$phone = $request->input('phone');
		$email = $request->input('email');
		$address = $request->input('address');
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
	        	// elseif(!\DB::table('useradmin')->where('name',$name)->first())	  //判断帐号是否存在
	        	// {
	        	// 	return back()->with("msg","帐号不存在");
	        	// }
	        	else
	        	{	//修改数据库的数据
				$list = \DB::table('useradmin')->where('id', $id)->update(['name'=>$name,'password'=>$password,'phone'=>$phone,'email'=>$email,'address'=>$address]);
	        		if($list>0){
					return back()->with("msg","修改成功返回页面刷新！");
	        		}else{
	            		return back()->with("msg","人品太差！");
	       	 	}
	        	}
	}




}
