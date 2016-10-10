<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyShop\EcdController;

class RegisterController extends Controller
{   
    //接口配置
    const url = "http://www.etuocloud.com/gatetest.action";
    const app_key = 'be8ISLguq1zGDpl4fABYW0rkk9jEkJvE';
    const app_secret = 'a5X6UQ71vxhmCR4TJiOuNhWh8Fn8FbHA3oSwDzn5vUHXUDNVns0HRphkrfV5PrCN';
    const format = 'json';
    
    public function register()
    {
        return view("Shop.register");
    }
    
    public function code(Request $request)
    {
        //初始化
        $ecd = new EcdController(static::url,static::app_key,static::app_secret,static::format);
        //接收客户端手机
        $phone = $request->input('id');
        //随机验证码
        $code = rand(1000,9999);
        //把验证码装入SESSION
        session()->flash('code',$code);
        //发送验证码短信
        $ecd->send_sms_code("{$phone}",'1',"{$code}",'');
        //返回ajax
        return 'y';
    }
}