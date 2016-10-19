<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

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
    	$business = \DB::select("select b.name,b.photo,b.money,b.examine,b.grade,b.shopopen,b.shopon,(select count(*) from orderform as o where o.bid=b.id and o.express=2) as count from business as b where b.did={$id}");
    	return view("Admin.product_branBusiness",['business'=>$business]);
    }
}
