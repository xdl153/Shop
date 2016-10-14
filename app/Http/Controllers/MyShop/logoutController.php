<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class logoutController extends Controller
{
    //清空登录session
    public function logout()
    {
    	session()->forget("username");
        session()->forget("userid");
        return 'y';
    }
}
