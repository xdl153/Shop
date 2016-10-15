<?php

namespace App\Http\Controllers\MyShop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyShop\EcdController;

class PasswordController extends Controller
{
    //上线短信接口
    const url = "http://www.etuocloud.com/gateway.action";
    //测试接口
    //const url = "http://www.etuocloud.com/gatetest.action";
    const app_key = 'bfQLeUFGf7Mvmpu2H4w4UmS1b07LPTpB';
    const app_secret = 'HYFFvYgDqQ3ZmJ1vVTwEaNpGGHpGcQjMlC881tTDnog1ihOsC5aYPnOtm6nRVo8l';
    const format = 'json';

    //找回密码视图
    public function FindPassword()
    {
        return view("Shop.pwd_forget");
    }
    public function ResetPassword()
    {
        return view("Shop.pwd_reset");
    }
    public function SuccessFind()
    {
        return view("Shop.pwd_success");
    }
    public function FindPhone(Request $request)
    {
       $Phone = $request->input('id');
       $results = \DB::table('user')->where('name',$Phone)->first();
       if($results){
           return 'y';
       }else{
           return 'n';
       }
    }
    
    //发送验证码
    public function FindCode(Request $request)
    {
        //初始化
        $ecd = new EcdController(static::url,static::app_key,static::app_secret,static::format);
        //接收客户端手机
        $phone = $request->input('id');
        //随机验证码
        $code = rand(1000,9999);
        //把验证码装入SESSION
        session(['findcode' => $code]);
        session(['phoneid' => $phone]);
        //发送验证码短信
        $ecd->send_sms_code("{$phone}",'1',"{$code}",'');
        //返回ajax
        return 'y';
    }
    
    //判断验证码返回ajax
    public function DemandFindCode(Request $request){
        //获取ajax验证码
        $value = $request->input('code');
        $phone = $request->input("phone");
        //session中的验证码
        $code = session('findcode');
        $phoneid = session("phoneid");
        //判断ajax传来的数据和session中是否一样
        if($code == $value && $phone == $phoneid){
            return 'y';
        }else{
            return 'n';
        }
    }
    public function DoResetPassword(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');
        session()->forget('findcode');
        $results = \DB::table('user')->where('name',$id)->update(['password' => $password]);
        $ob = \DB::table('user')->where("name",$id)->first();
        session()->set("userid",$ob->id);
        session()->set("username",$ob->name);
        return 'y';
    }
}
