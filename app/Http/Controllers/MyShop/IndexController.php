<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页视图
	public function index()
	{	//查询网站配置表
		$list = \DB::table('config')->get()->toArray();
		foreach($list as $p)
		session()->set('system',$p);
		if($p->kg != '1'){
			return view('Shop.4041');
		}
		//若没有GET值默认为北京
		if(!isset($_GET['id']) && empty($_GET['id'])){
			$_GET['id']='1';
		}
		//查询主要城市信息
		$district = \DB::select("select * from district where id=".$_GET['id']);

		//查询已选择城市下的第一个区的id值
		$region = \DB::select("select id from district where upid='{$_GET['id']}'");
		$id = $region['0']->id;
		//查询区下面的最后一级地区第一到第五条
		$town = \DB::select("select * from district where upid='{$id}' limit 0,5");

		return view("index",['district'=>$district,'town'=>$town]);
	}

	public function addseek()
	{	
		$region = \DB::select("select id from district where upid='{$_POST['id']}'");
		foreach($region as $re){
			$list[]=\DB::select("select * from district where upid={$re->id} and name like '%{$_POST['name']}%'");
		}	
		//由于$list查询出来的数据是4维数组，所以用下列遍历成2维数组
		foreach($list as $li){
			foreach($li as $l){
				$info[]=$l;
			}
		}
		return  json_encode($info);	
	}
}
