<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyShop\EcdController;

class RegisterController extends Controller
{   
    
    //短信接口
    const url = "http://www.etuocloud.com/gatetest.action";
    const app_key = 'be8ISLguq1zGDpl4fABYW0rkk9jEkJvE';
    const app_secret = 'a5X6UQ71vxhmCR4TJiOuNhWh8Fn8FbHA3oSwDzn5vUHXUDNVns0HRphkrfV5PrCN';
    const format = 'json';
    
    //返回视图
    public function register()
    {
        return view("Shop.register");
    }
    
    //查询手机号是否注册
    public function demand(Request $request)
    {
        //获取
        $id = $request->input('phone');
        //查询
        $results = \DB::table('user')->where('name',$id)->first();
        //返回
        if($results){
            return 'y';
        }else{
            return 'n';
        }
    }
    
    //发送短信
    public function code(Request $request)
    {
        //初始化
        $ecd = new EcdController(static::url,static::app_key,static::app_secret,static::format);
        //接收客户端手机
        $phone = $request->input('id');
        //随机验证码
        $code = rand(1000,9999);
        //把验证码装入SESSION
        session(['code' => $code]);
        //发送验证码短信
        $ecd->send_sms_code("{$phone}",'1',"{$code}",'');
        //返回ajax
        return 'y';
    }
    
    public function demandcode(Request $request){
        //获取ajax验证码
        $value = $request->input('code');
        //session中的验证码
        $code = session('code');
        
        if($code == $value){
            return 'y';
        }else{
            return 'n';
        }
        
    }
   
}