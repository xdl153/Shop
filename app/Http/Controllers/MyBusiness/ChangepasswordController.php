<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChangepasswordController extends Controller
{
    //更改密码
	public function dealer_password(Request $request)
	{
		// dd($request);
		$password = $request->input('password');
		$password2 = $request->input('password');
		$list = \DB::table('user')->where('password','=',$password)->get();
		return view('Business.dealer-password');
	}
}
