<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_IntroController extends Controller
{
    //shop_intro餐厅介绍
	public function shop_intro()
	{
		return view("Shop.shop_intro");
	}
}
