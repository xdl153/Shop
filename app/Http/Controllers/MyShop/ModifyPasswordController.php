<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class ModifyPasswordController extends Controller
{
    public function findpassword(Request $request){
        $id = $request->input('id');
        $password = sha1($request->input('password'));
        $user = \DB::table('user')->where('name',$id)->where('password',$password)->first();
        if($user){
            return 'y';
        }else{
            return 'n';
        }
    }
    public function Modifypass(Request $request)
    {
        $id = $request->input('id');
        $password = sha1($request->input('password'));
        $results = \DB::table('user')->where('name',$id)->update(['password' => $password]);
        if($results){
            return 'y';
        }else{
            return 'n';
        }
    }
}