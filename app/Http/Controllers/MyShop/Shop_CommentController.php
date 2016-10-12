<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_CommentController extends Controller
{
    public function shop_comment()
	{
		//查询comment表数据条数
		$count = \DB::select('select count(*) as count from comment');
		//查询user comment 两张表数据
		$list = \DB::select('select *,user.id as uid from user,comment where user.id=comment.id');
		// echo "<pre>";
		// var_dump($count);
		// var_dump($list);
		// var_dump($list[0]->name);
		// echo "</pre>";
		//获取到用户name电话的号码
		// $haoma=$list[0]->name;
		//正则匹配
		// $ppp=preg_replace("/(1\d{1,4})\d\d\d\d(\d{3,4})/", "\$1****\$2",$haoma);
		//输出150*****678
		// echo $ppp;
		return view('Shop.shop_comment',["list"=>$list,"count"=>$count]);
		// return view('Shop.shop_comment',["list"=>$list,"count"=>$count]);

	}
}
