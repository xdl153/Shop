<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Menu_listController extends Controller
{
    //menu-list菜单列表
    public function menu_list(Request $request){
        
        $did=$request->session()->get('userid')->id;
        $list = \DB::select('SELECT bu.name AS bname,bu.photo AS bphoto,m.name AS mname,m.images,m.price,m.recommend,cg.name AS cgname,m.id AS mid FROM business AS bu,menu AS m,category AS cg WHERE m.cid=cg.id AND m.bid=bu.id AND bu.did='.$did);
        $co = \DB::select('SELECT count(*) as count FROM business AS bu,menu AS m,category AS cg WHERE m.cid=cg.id AND m.bid=bu.id AND bu.did='.$did);
//        dd($list);
        return view("/Business.menu-list",['list'=>$list,'co'=>$co]);
    }
    
    //设置推荐
    public function tuijian(Request $request){
        $data = $request->only('id','rmd');
        if($data['rmd'] == "1"){
            $m = \DB::update('UPDATE menu SET recommend = 2 WHERE id='.$data['id']);
            return "y";
        }else{
            $m = \DB::update('UPDATE menu SET recommend = 1 WHERE id='.$data['id']);
             return "y";
        }

    }
    //删除
    public function del(Request $request){
        $data = $request->only('id');
//        dd($data["id"]);
        $m = \DB::table('menu')->where('id',$data['id'])->delete();
        return 'y';
    }


    //menu-brand--添加菜品
    public function menu_add(Request $request){
        $did=$request->session()->get('userid')->id;
        $caip = \DB::select('select * from category');
        $bus = \DB::select('select id,name from business where did='.$did);
        return view("/Business.menu-brand",['caip'=>$caip,'bus'=>$bus]);
    }
    //添加菜品
    public function addcai(Request $request){
           $file = $request->file('file');
//           dd($request);
		if($file->isValid()){
	    		$ext = $file->getClientOriginalExtension();//获取后缀
	    		$filename = time().rand(1000,9999).".".$ext;//新文件名
	    		$file->move("Shop/images/",$filename);
	    		$photo = "/images/".$filename;
	    	}
//            dd($photo);
        $data = $request->only('cp','dp','cname','price','beizhu');
        $m = \DB::table('menu')->insert([ ['cid' => "{$data['cp']}",'bid' =>"{$data['dp']}",'name' =>"{$data['cname']}",'images' =>"{$photo}",'price' =>"{$data['price']}",'caipin' =>"{$data['beizhu']}"] ]);
        
        return $this->menu_list($request);
    }
    
    //修改视图
    public function xiugai(Request $request){
        $id = $request->only('id');
//        dd($id['id']);
        $did = $request->session()->get('userid')->id;
        $caip = \DB::select('select * from category');
        $bus = \DB::select('select id,name from business where did='.$did);
        $sel = \DB::select('select * from menu where id='.$id['id']);
        return view("/Business.menu-brand_update",['caip'=>$caip,'bus'=>$bus,'sel'=>$sel]);
    }
    
    //执行修改
    public function edit(Request $request){
        $id = $request->only('id');
        foreach($id as $v){
            $i = $v;
        }
//        dd($i);
            $file = $request->file('file');
    //           dd($request);
                    if($file->isValid()){
                            $ext = $file->getClientOriginalExtension();//获取后缀
                            $filename = time().rand(1000,9999).".".$ext;//新文件名
                            $file->move("Shop/images/",$filename);
                            $photo = "/images/".$filename;
                            \DB::table('menu')->where('id',$i)->update(['images'=>$photo]);
                    }
            $dp = $request->only('dp');
            $cname = $request->only('cname');
            $price = $request->only('price');
            $beizhu = $request->only('beizhu');
            foreach($dp as $v){ $bid=$v; }
            foreach($cname as $v){ $name=$v; }
            foreach($price as $v){ $p=$v; }
            foreach($beizhu as $v){ $bz=$v; }
            
//            $m = \DB::update('update set menu bid='."$bid".',name='.$name.',images='.$photo.',price='.$p.',caipin='."'$bz'".' where id='.$i);
            $mm = \DB::table("menu")->where('id',$i)->update(['bid'=>$bid,'name'=>$name,'price'=>$p,'caipin'=>$bz]);
            
            return "修改成功";
    }
    
    //menu-cance回收站
//    public function ment_cance(){
//        return view("/Business.menu-cance");
//    }
}
