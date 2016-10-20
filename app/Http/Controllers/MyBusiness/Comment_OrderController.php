<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Comment_OrderController extends Controller
{
    //
    public function userpl(Request $request){
//        dd($request);
//        $did = $request->session()->get('userid')->id;
//        dd($did);
         return view("Business.comment-info");
    }
}
