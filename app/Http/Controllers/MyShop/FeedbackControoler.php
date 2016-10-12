<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedbackControoler extends Controller
{
    //保存用户反馈
	public function store(Request $request)
	{
		$time=$request->server('REQUEST_TIME');
		$date3=date('Y-m-d H:i:s',$time);
		$uid = $request->input('uid');
		$phone = $request->input('phone');
		$content = $request->input('content');
		$m =\DB::table('feedback')->insert(array('uid' =>$uid,'phone'=>$phone,'content'=>$content,'data'=>$date3));
		if($m>0){
			return back();
			// echo "11";
		}else{
			// echo "00";
			return back();
		}
		
	}
}
