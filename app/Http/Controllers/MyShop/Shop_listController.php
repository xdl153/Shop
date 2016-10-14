<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_listController extends Controller
{
    //商品列表Shop_list
	public function shop_list()
	{		
			

			
			if(isset($_GET['cname'])){
				$list=\DB::select("select * from address where did={$_GET['id']} ");
				return json_encode($list);
				//dd($_GET);
			}
			//查询该地址的店铺ID
			$list=\DB::select("select * from address where did={$_GET['id']}");
			//判断改地址内是否有配送的店铺
			if(!$list){
				return back()->with('msc','1');
			}

			//获取地址ID值
			$bid = $list['0']->bid;

			//查询配送范围内的店铺
			$info = \DB::select("
					select b.*,c.name as cname,
					(select count(*) from orderform as o where o.bid={$bid} and o.express=2) as count
					from business as b,category as c where b.id={$bid} and c.id=b.cid");
			//dd($info);
			
			//获取当前时间戳
			$date=strtotime(date('y-m-d H:i:s',time()));

			//遍历判断当前时间是否为营业时间
			foreach($info as $in){
				//获取店铺营业时间戳
				$stropen=strtotime($in->shopopen);

				//获取店铺休息时间戳
				$stron=strtotime($in->shopon);

				//判断是否在营业时间内
				if($stropen < $date && $stron > $date){
					$business = $info;
				}else{
					$business=array();
				}
			}
			
			//查询所有类别
			$category = \DB::select("select * from category");
            return view("Shop.shop_list",["business"=>$business,"category"=>$category]);
	}
}
