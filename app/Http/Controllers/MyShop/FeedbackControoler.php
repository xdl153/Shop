<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class FeedbackControoler extends Controller
{
    //保存用户反馈
	public function store(Request $request)
	{
            //判断用户uid是否存在,否返回请先登录
            if(!empty($uid = $request->input('uid'))){
                //取得时间
		$time=$request->server('REQUEST_TIME');
		$date3=date('Y-m-d',$time);
//                dd($request);
		$uid = $request->input('uid');
		$phone = $request->input('phone');
		$content = $request->input('content');
		$m =\DB::table('feedback')->insert(array('uid' =>$uid,'phone'=>$phone,'content'=>"$content",'data'=>"$date3"));
                if($m>0){
                        return back()->with("msg","反馈成功");
		}else{
			return back()->with("msg","请您输入正确反馈的号码");
		}
            }else{
                    return back()->with("msg","请您先登录");
            }
	}
}
