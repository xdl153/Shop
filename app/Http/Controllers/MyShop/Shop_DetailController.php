<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_DetailController extends Controller
{
    
//    shop_detail商品细节
	public function shop_detail(Request $request)
	{   
                //获取店铺ID
		$m=$request->only('bid');
                //遍历拿取店铺ID
                foreach($m as $value){
                      $bid=$value;
                }
		//查询菜单 菜名，图片，菜的价格，bid，店铺有多少个菜
		$menu = \DB::select('select bid,id,name,price,num,images from menu where bid='.$bid);
                $bs= \DB::select('select grade,name,photo from business where id='.$bid);
                $coun=\DB::select('select count(bid) as c from menu where bid='.$bid);
//                dd($menu);
                //返回视图
                session()->forget("cai");
                session()->forget("count");
                return view("Shop.shop_detail",['menu'=>$menu,'bs'=>$bs,'coun'=>$coun]);
                
	}
   
}
