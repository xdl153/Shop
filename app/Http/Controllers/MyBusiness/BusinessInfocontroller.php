<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessInfocontroller extends Controller
{
    //店铺信息
    public function Business_info()
    {
    	//获取用户ID
    	$MyId = session('adminuser')->id;
    	
    	//查询商家信息
    	$info = \DB::select("select * from business where did={$MyId}");
        //店铺配送范围
    	// foreach($info as $in){
     //        $address[] = \DB::select("select * from address where bid={$in->id}");
     //        foreach($address as)
     //        $district [] = \
     //    }
    	return view("/Business.business-info",["info"=>$info]);
    }

    //关闭店铺
    public function Business_on()
    {
    	//获取店铺ID
    	$id = $_POST['id'];

    	//修改数据表关闭该店铺
    	\DB::table("business")->where('id',$id)->update(["examine"=>"3"]);
    }

    //开启店铺
    public function Business_off()
    {
    	//获取店铺ID
    	$id = $_POST['id'];

    	//修改数据表开启该店铺
    	\DB::table("business")->where('id',$id)->update(["examine"=>'2']);
    }
}
