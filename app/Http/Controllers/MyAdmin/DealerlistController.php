<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DealerlistController extends Controller
{
    //商家列表
    public function product_brand()
    {
    	//查询所有商家
    	$dealer = \DB::select("select *,(select count(*) from business as b where d.id=b.did) as count from dealer as d");
    	// dd($dealer);
    	return view("Admin.product-brand",["dealer"=>$dealer]);
    }

    public function product_branBusiness()
    {
    	//获取商家ID
    	$id = $_GET['id'];
    	//查询店铺信息
    	$business = \DB::select("select b.id,b.name,b.photo,b.money,b.examine,b.grade,b.shopopen,b.shopon,(select count(*) from orderform as o where o.bid=b.id and o.express=2) as count from business as b where b.did={$id}");
    	return view("Admin.product_branBusiness",['business'=>$business]);
    }

    //店铺审核不通过
    public function product_branBusinessoff()
    {
        //获取商家ID
        $id=$_POST['id'];

        \DB::table('business')->where('id',$id)->update(['examine'=>'3']);
            
    }

    //店铺审核通过
    public function product_branBusinesson()
    {
        //获取商家ID
        $id=$_POST['id'];
        //$name = $_POST['name'];
        \DB::table('business')->where('id',$id)->update(['examine'=>'2']);

            
    }

    //店铺审核
    public function product_business()
    {
        //查询待审核店铺

        // $business = \DB::table("business")->where('examine','1')->get();
        $business = \DB::select("select b.*,d.name as dname,d.phone as dphone from business as b,dealer as d where b.examine = 1 and d.id = b.did");

        return view('Admin.product-business',['business'=>$business]);
    }
    //已审核店铺
    public function product_businesson()
    {
        //查询待审核店铺

        // $business = \DB::table("business")->where('examine','1')->get();
        $business = \DB::select("select b.*,d.name as dname,d.phone as dphone from business as b,dealer as d where b.examine = 2 and d.id = b.did");

        return view('Admin.product-businesson',['business'=>$business]);
    }
      //审核不通过店铺
    public function product_businessoff()
    {
        //查询待审核店铺

        // $business = \DB::table("business")->where('examine','1')->get();
        $business = \DB::select("select b.*,d.name as dname,d.phone as dphone from business as b,dealer as d where b.examine = 3 and d.id = b.did");

        return view('Admin.product-businessoff',['business'=>$business]);
    }
}
