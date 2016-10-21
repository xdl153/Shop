<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class SystemController extends Controller
{
    //系统设置视图
	public function system_base()
	{
		$reg = \DB::table('config')->get();
		 return view('Admin.system-base',['reg'=>$reg]);
	
	}
	//执行系统设置
	public function system_up(Request $request)
	{
		$name = $request->input('name');
		$kg = $request->input('kg');
		$banquan = $request->input('banquan');
		$beianhao = $request->input('beianhao');
		if($name == ''){
            	return back()->with("msg","标题不能为空");
		}
		if($kg == ''){
            	return back()->with("msg","必须选择开启或关闭");
		}
		if($banquan == ''){
            	return back()->with("msg","版权信息不能为空");
		}
		if($beianhao == ''){
            	return back()->with("msg","备案号信息不能为空");
		}
		$waimai = \DB::table('config')->update(['name' =>$name,'kg'=>$kg,'banquan'=>$banquan,'beianhao'=>$beianhao]);
		if($waimai){
			$www = \DB::table('config')->get();
		}
            return back()->with("msg","设置成功");
	}
}
