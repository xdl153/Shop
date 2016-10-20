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
    	$MyId = session('businessuserid')->id;
    	
    	//查询商家信息
    	$info = \DB::select("select b.*,c.name as cname,
            (select count(*) from orderform as o where b.id=o.bid and o.express=2) as count 
            from 
            business as b,
            category as c 
            where did={$MyId} and c.id=b.cid");
        // 店铺配送范围
    	foreach($info as $in){
            $address[] = \DB::select("select * from address as a,district as d where bid={$in->id} and d.id=a.did");
        }
        if(!$info){
            $info = '';
            $address = '';
        }
        // dd($address);
    	return view("/Business.business-info",["info"=>$info,"address"=>$address]);
    }

    //关闭店铺
    public function Business_on()
    {
    	//获取店铺ID
    	$id = $_POST['id'];

    	//修改数据表关闭该店铺
    	\DB::table("business")->where('id',$id)->update(["status"=>"2"]);
    }

    //开启店铺
    public function Business_off()
    {
    	//获取店铺ID
    	$id = $_POST['id'];

    	//修改数据表开启该店铺
    	\DB::table("business")->where('id',$id)->update(["status"=>"1"]);
    }

     //删除店铺
    public function Business_del()
    {
        //获取店铺ID
        $id = $_POST['id'];

        //修改数据表开启该店铺
        \DB::table("business")->where('id',$id)->delete();
        \DB::table("comment")->where('bid',$id)->delete();
        \DB::table("menu")->where('bid',$id)->delete();
        \DB::table("address")->where('bid',$id)->delete();
        \DB::table("orderform")->where('bid',$id)->delete();
        \DB::table("enshrine")->where('bid',$id)->delete();
    }
}
