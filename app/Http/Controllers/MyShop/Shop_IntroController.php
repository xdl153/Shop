<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_IntroController extends Controller
{
    //shop_intro餐厅介绍
	public function shop_intro(Request $request)
	{
    //      获取店铺id
            $bid = $request->only('bid');
            foreach($bid as $v){
                $id = $v;
            }
            //查询店铺表 business 
            $bus = \DB::select('select name,photo,grade from business where id = '.$id);
//            dd($bus);
		return view("Shop.Shop_intro",['bus'=>$bus]);
	}
}
