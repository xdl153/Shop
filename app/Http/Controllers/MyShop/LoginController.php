<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        return view("Shop.login");
    }
    
    public function dologin(Request $request)
    {
        $name = $request->input('name');
        $password = sha1($request->input('password'));
        $ob = \DB::table('user')->where("name",$name)->first();
        if($ob){
            if($ob->password == $password){
            //查询到的用户信息写入session
            session()->set("userid",$ob->id);
            session()->set("username",$ob->name);
            return 'y';
            }
        }else{
            return 'n';
        }

    }
}
