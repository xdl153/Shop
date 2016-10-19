<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Order_SuccessController extends Controller
{
    //
    public function success(){
        //清除session
                session()->forget("cai");
                session()->forget("dizhi");
                session()->forget("count");
                session()->forget("oid");
                session()->forget("bid");
        return view('Shop.order_success');
    }
}
