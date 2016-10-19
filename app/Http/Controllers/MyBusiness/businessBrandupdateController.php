<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class businessBrandupdateController extends Controller
{
    //修改店铺信息
    public function Business_brandupdate()
    {
    	//获取店铺ID
    	$id = $_GET['id'];

    	//查询店铺信息
    	$info = \DB::select("select b.*,c.name as cname from business as b,category as c where b.id={$id} and c.id=b.cid");

    	//查询所有类别
    	$category = \DB::select("select * from category");

    	//查询店铺配送范围
    	$address= \DB::select("select * from address  where bid={$_GET['id']}");
    	// dd($address);
    	//遍历获取地址名
    	foreach($address as $add){
    		$district[] = \DB::select("select * from district where id={$add->did}");
    	}
    	if(!$address){
    		$district = '';
    	}
    	// dd($address);
    	return view("Business.business-brandupdate",["info"=>$info,"category"=>$category,"district"=>$district]);
    	// dd($info);
    }
    //执行修改店铺信息
    public function Business_update(Request $request)
    {
    	$id = $_POST['id'];
    	// dd($request->file('uploadfile'));
    	$file = $request->file('file');
    	if($file){
	    	if($file->isValid()){
	    		$ext = $file->getClientOriginalExtension();//获取后缀
	    		$filename = time().rand(1000,9999).".".$ext;//新文件名
	    		$file->move("Shop/images/",$filename);
	    		$photo = "/images/".$filename;

	    		//把图片路径写入数据库
	    		\DB::table('business')->where('id',$id)->update(['photo'=>$photo]);
	    	}
    	}
    	
    	$name = $_POST['username'];
    	$category = $_POST['category'];
    	$shopopen = $_POST['shopopen'];
    	$shopon = $_POST['shopon'];
    	$money = $_POST['money'];
    	$address = $_POST['address'];
    	$account = $_POST['account'];
    	// $address = $_POST['city'];
    	$did = $_POST['sele'];
    	$phone = $_POST['phone'];
    	// dd($_POST);
    	//执行修改店铺信息
    	\DB::table('business')->where('id',$id)->update(
    		['name'=>$name,'shopopen'=>$shopopen,
			'shopon'=>$shopon,'money'=>$money,'address'=>$address,'account'=>$account,
			'phone'=>$phone]);
    	if($did > 1){
    		\DB::table('address')->insert(['did'=>$did,'bid'=>$id]);
    	}

    	// return redirect("/business-info");
    }

    //删除收货地址
    public function Business_districtdel()
    {
    	//获取店铺id、地址id
    	$bid = $_POST['bid'];
    	$did = $_POST['did'];

    	//执行配送地址表删除
    	\DB::table("address")->where('bid',$bid)->where('did',$did)->delete();
    }

    //城市级联
    public function Business_districtadd()
    {
    	//获取ajaxchuan传过来的值
		$upid = $_POST['upid'];

		//查询地址表
		$district1 = \DB::select("select * from district where upid={$upid}");

		echo json_encode($district1);
    }
}
