<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DealerlistController extends Controller
{
    //商家列表
    public function product_brand()
    {
    	//查询所有商家
    	$dealer = \DB::select("select *,(select count(*) from business as b where d.id=b.did) as count from dealer as d");
    	// dd($dealer);
    	return view("Admin.product-brand",["dealer"=>$dealer]);
    }

    public function product_branBusiness()
    {
    	//获取商家ID
    	$id = $_GET['id'];
    	//查询店铺信息
    	$business = \DB::select("select b.id,b.name,b.photo,b.money,b.examine,b.grade,b.shopopen,b.shopon,(select count(*) from orderform as o where o.bid=b.id and o.express=2) as count from business as b where b.did={$id}");
    	return view("Admin.product_branBusiness",['business'=>$business]);
    }

    //店铺审核不通过
    public function product_branBusinessoff()
    {
        //获取商家ID
        $id=$_POST['id'];

        \DB::table('business')->where('id',$id)->update(['examine'=>'3']);

        $ar = \DB::select("select email,username from dealer where id={$id}");
        echo $ar;
        $username = $ar->username;
            $email = $ar->email;
            $data = [
                'email' => $email,
                'name' => $username,
                'title' => '您好,超人外卖商家入驻审核结果'
                ];
    
                $re = Mail::send('Admin.failemail', ['user' => env('MAIL_USERNAME')], function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])->subject($data['title']);
                });
            
    }

    //店铺审核通过
    public function product_branBusinesson()
    {
        //获取商家ID
        $id=$_POST['id'];

        \DB::table('business')->where('id',$id)->update(['examine'=>'2']);

        $ar = \DB::select("select email,username from dealer where id={$id}");

        $username = $ar->username;
            $email = $ar->email;
            $data = [
                'email' => $email,
                'name' => $username,
                'title' => '您好,超人外卖商家入驻审核结果'
                ];

                $re = Mail::send('Admin.email', ['user' => env('MAIL_USERNAME')], function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])->subject($data['title']);
                });
            
    }
}
