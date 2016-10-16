<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use session;

class Member_CollectController extends Controller
{
    //member_collect我的收藏视图路由
	public function member_collect()
	{	
		//获取用户id
		$userid = session('userid');

		//店名 星级 店铺照片 所属类别名

		//查询用户收藏表
		$enshrine = \DB::select("select * from enshrine where uid={$userid}");
		
		//遍历用户收藏的店铺信息、所属类别、派送范围
		foreach($enshrine as $enshr){
			$business[] = \DB::select("select b.id,b.name,b.photo,b.grade,b.cid,
					(select name from category as c where c.id=b.cid) as cname 
					from business as b where b.id={$enshr->bid} ");
			//查询店铺的配送范围
			$address[] = \DB::select("select d.name,a.bid from address as a,district as d where bid={$enshr->bid} and d.id=a.did");
		}
		return view("Shop.member_collect",["business"=>$business,"address"=>$address]);
	}

	//删除收藏
	public function member_delete()
	{
		//获取店铺id
		$id = $_POST['id'];

		//执行删除操作
		\DB::table('enshrine')->where('bid',$id)->delete();
		// echo "111";
	}
}
