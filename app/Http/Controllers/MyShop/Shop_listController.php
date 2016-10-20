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
			
			//查询该地址的店铺ID
			$list=\DB::select("select * from address as a,business as b,dealer as d where d.id=b.did and d.examine=2 and b.id=a.bid and b.status=1 and b.examine=2 and a.did={$_GET['id']}");
			//判断改地址内是否有配送的店铺
			if(!$list){
				return back()->with('msc','1');
			}
			//查询配送范围内的店铺
			$info = \DB::select("
					select b.*,c.name as cname,
					(select count(*) from orderform as o where o.bid=b.id and o.express=2) as count
					from business as b,category as c,address as a where a.did={$_GET['id']}  and b.status=1 and a.bid=b.id and b.examine=2 and c.id=b.cid");
			// dd($info);
			if($info){
			//获取当前时间戳
			$date=strtotime(date('y-m-d H:i:s',time()));
			$t=0;
			//$business[]=$info;
			//遍历判断当前时间是否为营业时间
			foreach($info as $key=>$in){
				//获取店铺营业时间戳
				$stropen=strtotime($in->shopopen);

				//获取店铺休息时间戳
				$stron=strtotime($in->shopon);
				foreach($in as $a=>$i){

					//判断是否在营业时间内
					if($stropen < $date && $stron > $date){
						$business[$t][$a]=$i;
						$business[$t]['tabsAction']='1';
					}else{
						$business[$t][$a]=$i;
						$business[$t]['tabsAction']='2';
					}

				}
				$t++;
			}
				//查询该地址内所有的店铺数量与地址名
				$district = \DB::select("select name,(select count(*) from address where did={$_GET['id']}) as count from district where id={$_GET['id']}");
				//查询所有类别
				$category = \DB::select("select * from category");
	            return view("Shop.shop_list",["business"=>$business,"category"=>$category,"district"=>$district]);
			}else{
				return redirect("/index");
			}
	}
}
