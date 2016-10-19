<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessaddController extends Controller
{
    //添加店铺视图
	public function Business_brand()
	{
		return view('/Business.business-brand');
	}

	//店铺类别
	public function Business_category()
	{
		//查询所有类别
		$category = \DB::table('category')->get();

		echo json_encode($category);
	}
	public function Business_brandadd(Request $request)
	{
		//获取商家ID
		$MyId = session('adminuser')->id;
		$name = $_POST['username'];
		// $category = $_POST['category'];
		$cid = $_POST['category'];
		$shopopen = $_POST['shopopen'];
		$shopon = $_POST['shopon'];
		$money = $_POST['money'];
		$address = $_POST['address'];
		$account = $_POST['account'];
		$sele = $_POST['sele'];
		$phone = $_POST['phone'];
		$file = $request->file('file');
		// dd($_POST);
		if($file->isValid()){
	    		$ext = $file->getClientOriginalExtension();//获取后缀
	    		$filename = time().rand(1000,9999).".".$ext;//新文件名
	    		$file->move("Shop/images/",$filename);
	    		$photo = "/images/".$filename;
	    	}

	    $bid = \DB::table('business')->insertGetId(['name'=>"{$name}",'cid'=>$cid,'did'=>$MyId,'shopopen'=>"{$shopopen}",'shopon'=>"{$shopon}",
	    'money'=>$money,'address'=>"{$address}",'account'=>"{$account}",'phone'=>$phone,'photo'=>"{$photo}",'image'=>$photo]);	
		// dd($bid);
		if($sele > 1){
			\DB::table('address')->insert(['bid'=>$bid,'did'=>$sele]);
		}
		return view("/Business.business-brand");
		// dd($_bid);
	}
}
