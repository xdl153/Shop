<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class WelcomeController extends Controller
{
    //桌面视图
	public function index()
	{
		return view('Admin.welcome');
	}
	//连接数据库
	public function welcomes()
	{
		$list = \DB::table('user')->get();
		// dd($list);
    		return view("Admin.welcome",['list'=>$list]);
	}
}
