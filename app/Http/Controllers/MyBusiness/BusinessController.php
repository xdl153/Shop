<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    //商家后台首页视图
	public function index_s()
	{
    		return view("Business.busi");
	}
    //桌面视图
	public function welcome()
	{
		// $list = \DB::table('user')->get();
		// // dd($list);
    		return view("/Business.welcome",['list'=>$list]);
	}
}
