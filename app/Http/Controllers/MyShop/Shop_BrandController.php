<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_BrandController extends Controller
{
    //shop_brand品牌视图
	public function shop_brand()
	{
		return view("Shop.shop_brand");
	}
}
