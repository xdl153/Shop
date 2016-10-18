<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class Member_OrderController extends Controller
{
    //member_order查看订单视图路由
	public function member_order(Request $request)
	{
//            dd($request);
            //获取session中uid
            $uid=$request->session()->get('userid');
//            dd($uid);
            //查询 orderform、business、user、site标
            $list = \DB::table('orderform as odf')
                    ->join('business as bs','bs.id','=','odf.bid')
                    ->join('user','user.id','=','odf.uid')
                    ->join('site as st','st.uid','=',"user.id")
                    ->select('odf.id','odf.number','odf.id','odf.type','odf.state','odf.express','odf.money','odf.data','odf.Delivery','bs.name','bs.photo','bs.phone','st.name as sname','st.phone as sphone','st.address')
                    ->where('odf.uid','=',"$uid")
                    ->get();
//            dd($list);
            foreach($list as $v){
                $str[]= \DB::select('select * from details where oid ='.$v->id);
            }
//            
//            dd($str);
            return view("Shop.member_order",['list'=>$list,'str'=>$str]);
        }
        
        
}
