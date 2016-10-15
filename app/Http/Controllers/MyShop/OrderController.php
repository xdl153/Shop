<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function creade_order(Request $request)
    {
//        $cai = $request->only('cai');   
//        $fen = $request->only('fen'); 
//        $hj = $request->only('hj'); 
//        $jia = $request->only('jia'); 
//        $xj = $request->only('xj'); 
//        session(['cai'=>$cai]);
//        session(['fen'=>$fen]);
//        session(['hj'=>$hj]);
//        session(['jia'=>$jia]);
//        session(['xj'=>$xj]);
        $data=$request->only('cai','fen','hj','jia','xj');
        session(['data'=>$data]);
        return 'y';
    }
    
    public function order(Request $request)
    {
//        dd($request);
       return view('Shop.order');
        
    }

}
