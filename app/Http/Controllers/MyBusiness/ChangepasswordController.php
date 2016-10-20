<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class ChangepasswordController extends Controller
{
    //更改密码视图
	public function dealer_password(Request $request)
	{
		$sql= session('adminuser')->id;
		$sql = \DB::table('dealer')->where('id',$sql)->first();
		return view('Business.dealer-password',['sql'=>$sql]);
	}

	//执行更改密码
	public function update_password(Request $request)
	{
		$id = $request->input('id');
		$password = $request->input('password');
		$password2 = $request->input('password2');
		if($password == '' and $password2 == ''){
			return back()->with("msg","密码不能为空");
		}
		if($password === $password2){
			$list = \DB::table('dealer')->where('id', $id)->update(['password'=>$password,]);
			return back()->with("msg","修改成功返回刷新");
			// dd($list);
		}else{
			return back()->with("msg","请输入一致密码");
	}

	}

	//更改手机号视图
	public function dealer_phone(Request $request)
	{	
		$sql= session('adminuser')->id;
		$sql = \DB::table('dealer')->where('id',$sql)->first();
		return view('Business.dealer-phone',['sql'=>$sql]);
	}
	//执行修改手机号
	public function update_phone(Request $request)
	{
		$id = $request->input('id');
		$phone = $request->input('phone');
		$phone2 = $request->input('phone2');
		if($phone == '' and $phone2 == ''){
			return back()->with("msg","手机号不能为空");
		}
		if($phone === $phone2){
			$list = \DB::table('dealer')->where('id', $id)->update(['phone'=>$phone,]);
			return back()->with("msg","修改成功返回刷新");
			// dd($list);
		}else{
			return back()->with("msg","请输入一致的手机号码");
	}
	
	}
}
