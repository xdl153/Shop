<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Shop_DetailController extends Controller
{
    
//    shop_detail商品细节
	public function shop_detail(Request $request)
	{   
                //获取店铺ID
		$m=$request->only('bid');
                //遍历拿取店铺ID
                foreach($m as $value){
                      $bid=$value;
                }
		//查询菜单 菜名，图片，菜的价格，bid，店铺有多少个菜
		$menu = \DB::select('select bid,id,name,price,num,images from menu where recommend = 1 and bid='.$bid);
                $bs= \DB::select('select grade,name,photo from business where id='.$bid);
                $coun=\DB::select('select count(bid) as c from menu where bid='.$bid);
//                dd($menu);

        //查询用户是否已收藏该店铺
        //判断用户是否已登录
        if(session('userid')){
            //获取用户id
            $userid = session('userid');

            //查询用户收藏表
            //$enshrine = \DB::table('enshrine')->where('uid',$userid)->where('bid',$bid)->get();
            $enshrine = \DB::select("select * from enshrine where uid={$userid} and bid={$bid}");
        }else{
            $enshrine = '';
        }
                //返回视图
                session()->forget("cai");
                session()->forget("dizhi");
                session()->forget("count");
                session()->forget("oid");
                session()->forget("bid");
                return view("Shop.shop_detail",['menu'=>$menu,'bs'=>$bs,'coun'=>$coun,'enshrine'=>$enshrine]);
                
	}

   //收藏店铺
    public function shop_detailinsert()
    {
        //获取用户ID
        $userid = session('userid');

        //获取店铺ID
        $bid = $_POST['bid'];

        //用户收藏表插入数据
        \DB::table('enshrine')->insert(['uid'=>$userid,'bid'=>$bid]);
    }

    //取消收藏店铺
    public function shop_detaildelete(){
        //获取用户ID
        $userid = session('userid');

        //获取店铺ID
        $bid = $_POST['bid'];

        \DB::table("enshrine")->where(['uid'=>$userid,'bid'=>$bid])->delete();
        // echo 1;
    }
}
