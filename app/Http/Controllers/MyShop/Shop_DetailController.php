<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_DetailController extends Controller
{
    //shop_detail商品细节
	public function shop_detail()
	{
		return view("Shop.shop_detail");
	}
}
