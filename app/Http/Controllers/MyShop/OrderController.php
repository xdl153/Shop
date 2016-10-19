<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller {

    //ajax带值存session
    public function creade_order(Request $request) {
        //拿取并存入session
        $cai = $request->only('menu_items_data');
        $money = $request->only('menu_items_total');
        session(['cai'=>$cai]);
        session(['count'=>$money]);
//      //返回视图
        return response()->json(['status'=>'ok']);
    }
    
    //订单视图
    public function order(Request $request) {
//         拿取session中用户userid
        $uid = $request->session()->get('userid');
        $bbid = $request->only('bid');
//        dd($bid);
        foreach ($bbid as $v ){ $bid=$v; }
        session(['bid'=>$bid]);
//        //拿取当前地址id
        $did = $request->only('id');
        //查询数据库
        foreach($did as $v){
            $ddid = $v;
        }
        $diz = \DB::select('select name from district where id='.$ddid);
        foreach($diz as $v){
            foreach($v as $a){
                $dizhi = $a;
            }
        }
        session(['dizhi'=>$dizhi]);
//        dd($dizhi);
        //查询数据库
        $site = \DB::table('site')->where('uid', $uid)->get();
        //拿去session里的cai名 数据
        $cai = $request->session()->get('cai');
        //拿取session里的合计
        $money = $request->session()->get('count');
//        把json转为数组
        $dds=  json_decode($cai['menu_items_data'],true);
        //返回视图
         return view('Shop.order', ['site' => $site,'dds'=>$dds,'mo'=>$money]);
    }

    //用户添加收货地址
    public function add(Request $request) {
//        dd($request);
        $uid = $request->session()->get('userid');
        $names = $request->only('customer_name');
        $phones = $request->only('customer_phone');
        $adds = $request->only('delivery_address');
        foreach($names as $v){
            $name = $v;
        }
        foreach($phones as $v){
            $phone = $v;
        }
        foreach($adds as $v){
            $add = $v;
        }
            $s=strlen($add);
//            dd($add);
//          dd($s);
      switch ($s){
            case $s <= 18:
//          截取字符串 前2位
            $selectadd = mb_substr($add,0,2);
            //使用查询语句 查询id 条件为 截取的字符串
            $uupid = \DB::select('select id from district where name like '."'%$selectadd%' and upid = 0");
            foreach($uupid as $v ){
                foreach($v as $a){
                    $upid = $a;
                }
            }
//       
//          dd($upid);
            //截取字符串 前3位的后2位
            $selectadds = mb_substr($add,3,2);
            $ids = \DB::select('select id from district where name like '."'%$selectadds%' and upid = ".$upid);
            foreach($ids as $v){
                foreach($v as $z){
                    //$id 为 省市级后面 条件 upid为 省级id 
                    $id = $z;
                }
            }
            $m = \DB::insert('insert into site (uid,did,name,phone,address) values(?,?,?,?,?)',[$uid,$id,$name,$phone,$add]);
               //返回视图json格式

            return response()->json(['status'=>'ok']);
            break;
            case $s > 25:
//                    截取字符串 前2位
                $selectadd = mb_substr($add,0,2);
                //使用查询语句 查询id 条件为 截取的字符串
                $uupid = \DB::select('select id from district where name like '."'%$selectadd%' and upid = 0");
                foreach($uupid as $v ){
                    foreach($v as $a){
                        $upid = $a;
                    }
                }
    //       
//              dd($upid);
                //截取字符串 前3位的后2位
                $selectadds = mb_substr($add,3,2);
                $ids = \DB::select('select id from district where name like '."'%$selectadds%' and upid = ".$upid);
                foreach($ids as $v){
                    foreach($v as $z){
                        $id = $z;
                    }
                }
//                dd($id);
                
                //截取字符串 前位的后2位
                $selectaddss = mb_substr($add,6,2);
//                dd($selectaddss);
                $idss = \DB::select('select id from district where name like '."'%$selectaddss%' and upid = ".$id);
                foreach($idss as $v){
                    foreach($v as $z){
                        $idz = $z;
                    }
                }
//                $dizhi = \DB::table('site')->where('uid',$uid)->insert();
               $m = \DB::insert('insert into site (uid,did,name,phone,address) values(?,?,?,?,?)',[$uid,$idz,$name,$phone,$add]);
               //返回视图json格式
                    return response()->json(['status'=>'ok']);
               break;
      }    
    }
    
    //修改地址方法
    public function update(Request $request) {
        $ids = $request->only('id');
        $names = $request->only('customer_name');
        $phones = $request->only('customer_phone');
        $addresss = $request->only('delivery_address');
        foreach ($ids as $v) {
            $id = $v;
        }
        foreach ($names as $v) {
            $name = $v;
        }
        foreach ($phones as $v) {
            $phone = $v;
        }
        foreach ($addresss as $v) {
            $address = $v;
        }
        $m = \DB::table('site')->where('id', $id)->update(['name' => $name, 'phone' => $phone, 'address' => $address]);
        return response()->json(['status'=>'ok']);
    }
    
    //删除地址
    public function destroy(Request $request){
        $id=$request->only('id');
        $m = \DB::table('site')->where('id',$id)->delete();
        return response()->json(['status'=>'ok']);
    }
    
    
    public function tijiao(Request $request){
        return response()->json(['status'=>'ok']);
    }
    
    //订单
    public function shdz(Request $request){
        //订单id *
        $orderid = $request->only('order_id');
        foreach($orderid as $v){ $order=$v; }
        //uid *
        $uid = $request->session()->get('userid');
//        bid*
        $bid = $request->session()->get('bid');
        //价钱*
        $moneys = $request->session()->get('count');
        foreach($moneys as $v){ $money=$v; }
        //创建订单的时间*
        $time=$request->server('REQUEST_TIME');
        $date3=date('Y-m-d h:i:s',$time);
        //送餐时间*
        $timsj = $request->only('preorder_time');
        foreach($timsj as $v){ $tm = $v; }
        //备注*
        $ment = $request->only('comment');
        foreach($ment as $v){ $mt=$v; }
        $ls = \DB::insert('insert into orderform (uid,bid,number,money,data,Delivery,content) values(?,?,?,?,?,?,?)',[$uid,$bid,$order,$money,$date3,$tm,$mt]);
        $sel= \DB::select('select Max(id) as id from orderform where number='."'$order'");
//        dd($sel);
        foreach($sel as $v){
            foreach($v as $a){
                $oid = $a;
            }
        }
        session(['oid'=>$oid]);
        return response()->json(['failed_code'=>'7006']);
    }
    
    public function ord(Request $request){
        //uid *
        $uid = $request->session()->get('userid');
        //bid *
        $bid = $request->session()->get('bid');
        //oid *
        $oid = $request->session()->get('oid');
        //cai
        $cai = $request->session()->get('cai');
//      把json转为数组
        $dds = json_decode($cai['menu_items_data'],true);
        foreach($dds as $v){
//            unset($k['opts']);
//            unset($k['adds']);
//           var_dump($v);
            $ds=array_filter($v);
            $ls = \DB::insert('insert into details (oid,cname,num,price,uid) values (?,?,?,?,?)',[$oid,$v['name'],$v['q'],$v['p'],$uid]);
        }
//        
        return "y";
//         return response()->json(['status'=>'ok']);
    }
}
