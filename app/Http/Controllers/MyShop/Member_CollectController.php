<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Member_CollectController extends Controller
{
    //member_collect我的收藏视图路由
	public function member_collect()
	{
		return view("Shop.member_collect");
	}
}
