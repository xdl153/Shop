<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_CommentController extends Controller
{
    //shop_comment餐厅评论
	public function shop_comment()
	{
		return view("Shop.shop_comment");
	}
}
