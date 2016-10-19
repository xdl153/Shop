<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_orderController extends Controller
{
    //和他点一样的视图路由
    public function shop_order(Request $request){
//        获取店铺id
        $bid = $request->only('bid');
        foreach($bid as $v){
            $id = $v;
        }
        //查询店铺表 business 
        $bus = \DB::select('select name,photo,grade from business where id = '.$id);
        //查询订单表 所有在这店铺买过东西的用户
        $list = \DB::select('select u.name,ord.uid,ord.id,ord.data from orderform as ord,user as u where express=2 and ord.uid = u.id and bid ='.$id);
//        dd($list);
        foreach($list as $v){
            $dtl[] = \DB::select('select * from details where oid='.$v->id);
        }

//        dd($dtl);
        //返回视图
	return view('Shop.shop_order',['bus'=>$bus,'dtl'=>$dtl,'list'=>$list]);
    }
}
