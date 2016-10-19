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
                $data = \DB::table('orderform')->get();
                $dd= json_encode($data);
                if(empty($dd)){
                    return view('Shop.member_order');
                }else{
                    //查询 orderform、business、user、site标
                    $list = \DB::table('orderform as odf')
                            ->join('business as bs','bs.id','=','odf.bid')
                            ->join('user','user.id','=','odf.uid')
                            ->join('site as st','st.uid','=',"user.id")
                            ->select('odf.bid','odf.number','odf.id','odf.type','odf.state','odf.express','odf.money','odf.data','odf.Delivery','bs.name','bs.photo','bs.phone','st.name as sname','st.phone as sphone','st.address')
                            ->where('odf.uid','=',"$uid")
                            ->get();
//                    $dl= json_encode($list);
                    if($list){
                        $str = '';
                    }
                    foreach($list as $v){
                         $str[]= \DB::select('select * from details where oid ='.$v->id);
                    }
//                    dd($list);
                    return view("Shop.member_order",['list'=>$list,'str'=>$str]);
               
            }
        }
        
//    comment评论
        public function comment(Request $request){
            $uid = $request->session()->get('userid');
            $data = $request->only('delivery_time');
            foreach($data as $v){
                $dat = $v;
            }
            $bid = $request->only('order_id');
            foreach($bid as $v){
                $id = $v;
            }
            $content = $request->only('review_text');
            foreach($content as $v){
                $cont = $v;
            }
            $total_star = $request->only('total_star');
            foreach($total_star as $v){
                $grade = $v;
            }
//            
            $m = \DB::insert('insert into comment (uid,bid,data,content,grade) values(?,?,?,?,?)',[$uid,$id,$dat,$cont,$grade]);
//            $comment= $request->only('delivery_time','order_id','review_text','total_star');
//            $m = \DB::insert('insert into comment (uid,bid,data,content,grade) values(?,?)',[$uid,$comment]);
            return response()->json(['status'=>'ok']);
        }
        
        //用户查看订单删除
        public function order_delete(Request $request){
            $bh = $request->only('bh');
            foreach($bh as $v){
                $number = $v;
            }
            //查询订单
            $list = \DB::select('select id,express from orderform where number='."'$number'");
            foreach($list as $v){
            }
            //判断只有用户收到货才能删除
            if($v->express == 2){
                $del = \DB::delete('delete from details where oid='.$v->id);
                $dele = \DB::delete('delete from orderform where id='.$v->id);
                return "y";
            }else{
                return "n";
            }

//            
            
        }
}
