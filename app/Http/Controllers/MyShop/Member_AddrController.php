<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Member_AddrController extends Controller
{
    //member_Addr地址管理视图路由
	public function member_addr()
	{
		return view("Shop.member_addr");
	}
}
