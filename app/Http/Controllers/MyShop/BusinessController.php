<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    public function FindBusiness(Request $request)
    {
       $id = $request->input('id');
       $user = \DB::table('dealer')->where('name',$id)->first();
       if($user){
           return 'y';
       }else{
           return 'n';
       }
    }
    
    public function FindEmail(Request $request)
    {
       $id = $request->input('id');
       $user = \DB::table('dealer')->where('email',$id)->first();
       if($user){
           return 'y';
       }else{
           return 'n';
       }
    }
    public function FindBusinessPhone(Request $request)
    {
       $userphone = $request->input('userphone');
       $a = \DB::table('dealer')->where('phone',$userphone)->first();
       if($a){
           return 'y';
       }else{
           return 'n';
       }
    }
    public function Submitinfo(Request $request)
    {
        $name = $request->input('id');
        $password = sha1($request->input('password'));
        $username = $request->input('username');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $array = array('name' => $name,"password" => $password,'username' => $username,'phone' => $phone,'examine' => '1','email' => $email);
        $results = \DB::table('dealer')->insert($array);
        if($results){
            return 'y';
        }else{
            return 'n';
        }
    }
}
