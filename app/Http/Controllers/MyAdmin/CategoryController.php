<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //分类列表
    public function category_list()
    {
    	//查询所有分类
    	$category = \DB::table('category')->get();
    	return view('Admin.category-list',['category'=>$category]);
    }

    //删除分类
    public function category_del()
    {
    	//获取分类ID
    	$id = $_POST['id'];

    	//执行删除分类
    	\DB::table('category')->where('id',$id)->delete();
    }

    //修改分类
    public function category_upd()
    {
    	//获取分类ID
    	$id = $_GET['id'];

    	//查询该分类
    	$category = \DB::table('category')->where('id',$id)->get();

    	//返回视图
    	return view('Admin.category-upd',['category'=>$category]);

    }

    //确认修改
    public function category_upda()
    {	
    	$id = $_POST['id'];
    	$name = $_POST['name'];

    	\DB::table('category')->where('id',$id)->update(['name'=>$name]);
    }

    //添加分类
    public function category_add()
    {
    	return view('Admin.category-add');
    }

    //执行添加
    public function category_addr()
    {
    	//获取类名
    	$name = $_POST['name'];
    	
    	\DB::table('category')->insert(['name'=>$name]);

    	return view('Admin.category-add');
    }
}
