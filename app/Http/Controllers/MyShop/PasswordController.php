<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
        //找回密码视图
    public function FindPassword()
    {
        return view("Shop.pwd_forget");
    }
    public function ResetPassword()
    {
        return view("Shop.pwd_reset");
    }
    public function SuccessFind()
    {
        return view("Shop.pwd_success");
    }
    
}
