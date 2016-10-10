<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Member_OrderController extends Controller
{
    //member_order查看订单视图路由
	public function member_order()
	{
		return view("Shop.member_order");
	}
}
