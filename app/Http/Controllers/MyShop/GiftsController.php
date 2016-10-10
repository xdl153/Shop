<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GiftsController extends Controller
{
    //gifts氪星礼品站视图路由
	public function gifts()
	{
		return view("Shop.gifts");
	}
}
