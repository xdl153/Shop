<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_listController extends Controller
{
    //商品列表Shop_list
	public function shop_list()
	{
		return view("Shop.shop_list");
	}
}
