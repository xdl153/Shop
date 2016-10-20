<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    //系统设置视图
	public function system_base()
	{
		return view('Admin.system-base');
	}
	//执行系统设置
	public function system_up(Request $request)
	{
		$name = $request->input('name');
		$kg1 = $request->input('kg1');
		$kg2 = $request->input('kg2');
		$file = $request->input('file');
		$banquan = $request->input('banquan');
		$beianhao = $request->input('beianhao');
		dd($request);
	}
}
