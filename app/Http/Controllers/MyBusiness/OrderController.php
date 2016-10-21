<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //所有订单
    public function index(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::select("SELECT orderform.number, 
	details.cname, 
	orderform.content, 
	orderform.`data`, 
	site.address, 
	site.phone, 
	site.`name`, 
	orderform.uid, 
	orderform.id, 
	details.Price,
        orderform.express,
        details.num
FROM orderform, site, details , dealer , business
WHERE site.uid = orderform.uid and details.uid =  site.uid  and details.oid = orderform.id and orderform.bid = business.id and business.did = dealer.id and dealer.id = {$id} ");
        return view("Business.orderform-list",['list'=>$data]);
    }
    
    //未完成订单
    public function wwcdd(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::select("SELECT orderform.number, 
	details.cname, 
	orderform.content, 
	orderform.`data`, 
	site.address, 
	site.phone, 
	site.`name`, 
	orderform.uid, 
	orderform.id, 
	details.Price,
        orderform.express,
        details.num
        FROM orderform, site, details , dealer ,business
        WHERE site.uid = orderform.uid and details.uid =  site.uid  and details.oid = orderform.id and orderform.bid = business.id and business.did = dealer.id and dealer.id = {$id} and orderform.express = 1");
        return view("Business.orderform-unfinished",['list'=>$data]);
    }
    
    public function ywcdd(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::select("SELECT orderform.number, 
	details.cname, 
	orderform.content, 
	orderform.`data`, 
	site.address, 
	site.phone, 
	site.`name`, 
	orderform.uid, 
	orderform.id, 
	details.Price,
        orderform.express,
        details.num
        FROM orderform, site, details , dealer , business
        WHERE site.uid = orderform.uid and details.uid =  site.uid  and details.oid = orderform.id and orderform.bid = business.id and business.did = dealer.id and dealer.id = {$id} and orderform.express = 2");
        return view("Business.orderform-accomplish",['list'=>$data]);
    }

    public function Orderoperation(Request $request)
    {
        $id = $request->input('id');
        $zt = $request->input('zt');
        $caoz = \DB::table('orderform')->where('id',$id)->update(['express' => $zt]);
        return 'y';
    }
    
    public function Orderodelete(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::table('orderform')->where('id',$id)->where('express',2)->delete();
        if($data){
            return 'y';
        }else{
            return 'n';
        }
    }
}

