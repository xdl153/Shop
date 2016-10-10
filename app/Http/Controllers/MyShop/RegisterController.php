<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //Register登录视图
	public function register()
	{
		return view("Shop.register");
	}
}
