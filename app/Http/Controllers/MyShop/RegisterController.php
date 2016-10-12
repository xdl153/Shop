<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyShop\EcdController;

class RegisterController extends Controller
{   
    
    //短信接口
    const url = "http://www.etuocloud.com/gateway.action";
    //const url = "http://www.etuocloud.com/gatetest.action";
    const app_key = 'bfQLeUFGf7Mvmpu2H4w4UmS1b07LPTpB';
    const app_secret = 'HYFFvYgDqQ3ZmJ1vVTwEaNpGGHpGcQjMlC881tTDnog1ihOsC5aYPnOtm6nRVo8l';
    const format = 'json';
    
    //发送短信返回ajax
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
    
    //判断验证码返回ajax
    public function demandcode(Request $request){
        //获取ajax验证码
        $value = $request->input('code');
        //session中的验证码
        $code = session('code');
        
        //判断ajax传来的数据和session中是否一样
        if($code == $value){
            return 'y';
        }else{
            return 'n';
        }
    }
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
    
    //注册
    public function enroll(Request $request)
    {
        $user =  $request->input('user');
        $pwd = $request->input('pwd');
        $array = array('name' => $user,"password" => $pwd);
        //查询
        $results = \DB::table('user')->insert($array);
        if($results >0){
            return 'y';
        }else{
            return 'n';
        }
    }
}
       