<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Member_IndexController extends Controller
{
    //member_index账号管理视图路由
	public function member_index()
	{
		return view("Shop.member_index");
	}
}
