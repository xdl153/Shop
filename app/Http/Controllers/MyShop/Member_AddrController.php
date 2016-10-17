<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Member_AddrController extends Controller
{
    //member_Addr地址管理视图路由
	public function member_addr()
	{	//获取用户id
		$id = session('userid');
		
		//查询收件地址信息
		$site = \DB::select("select * from site where uid={$id}");
		//dd($site);
		return view("Shop.member_addr",["site"=>$site]);
	}

	//删除地址
	public function member_addrdelete()
	{
		//获取地址id
		$id = $_POST['id'];

		//执行删除
		\DB::table('site')->where('id',$id)->delete();
	}

	public function member_addrlist()
	{
		//获取ajaxchuan传过来的值
		$upid = $_POST['upid'];

		//查询地址表
		// $district = \DB::table('district')->where('upid',$upid)->get();
		$district = \DB::select("select * from district where upid={$upid}");

		echo json_encode($district);
		// echo '1';
	}

	//增加收货地址
	public function member_addradd()
	{	
		//获取收货地址信息
		$uid = session('userid');
		$did =  $_POST['did'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		//向数据库库插入内容
		$tb = \DB::table('site')->insertGetId(['uid'=>$uid,'did'=>$did,'name'=>$name,'phone'=>$phone,'address'=>$address]);
		echo $tb;
	}

	//修改收货地址
	public function member_addrupdate()
	{
		//接收值
		$id = $_POST['id'];
		$did = $_POST['did'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		if($address){
			\DB::table('site')->where('id',$id)->update(['name'=>$name,'phone'=>$phone,'did'=>$did,'address'=>$address]);
		}else{
			\DB::table('site')->where('id',$id)->update(['name'=>$name,'phone'=>$phone]);
		}
		
	}
}
