<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //About:关于我们的视图
	public function about()
	{
		return view("Shop.about");
	}
}
