<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;//使用自定义的model类
use Gregwar\Captcha\CaptchaBuilder;//使用验证码的类
use Session;
class LoginController extends Controller
{
    //登录表单
    public function login()
    {
    	return view("Admin.login");

    } 
	//执行登录 
    public function dologin(Request $request)
    {
    	//获得表单提交的用户和密码
    		$name = $request->input('name');
    		$password = $request->input('password');
                        if($password  == ''  && $name == ''){
                            return back()->with("msg","请输入用户或密码");
                        }
    		$ob = \DB::table('useradmin')->where("name",$name)->first();
                  //判断管理员是否开启
                  if($ob->status != '1'){
                          return back()->with("msg","您的帐号已被关闭");
                  }
    		if($ob)
                        {
    			//判断密码是否正确
    			if($ob->password==$password)
                                   {
			               //判断验证码是否正确
		                          $mycode = session()->get("code");
                                                  $mycodes=$request->input('code');
                                                  if(empty($mycodes))
                                                  {
                                                     return back()->with("msg","验证码不能为空");
                                                  }
                        		  elseif($mycode!=$request->input('code'))
                                                  {
                        			return back()->with("msg","验证码错误");
                        		}
                                                else
                                                {
                                                    //写入session
                                                    session()->set("adminuser",$ob);
                                                    //10 跳转到后台首页
                                                    return redirect("Admin/index");
                                                 }
    			        }
    		         }
                        else
                        {
    			return back()->with("msg","帐号或密码错误");
    		}
    }
	//获取验证码
	function captcha(){
	    $builder = new CaptchaBuilder;
	    $builder->build(130,32);
            //获取验证码的内容
                $phrase = $builder->getPhrase();
            //把内容存入session
                session()->flash('code',$phrase);
	    return response($builder->output())->header('Content-type','image/jpeg');
	}
	//执行退出
	public function logout()
	{
		//忘记session
		session()->forget("adminuser");
		//重定向
		return redirect("Admin/login");
	}
}
