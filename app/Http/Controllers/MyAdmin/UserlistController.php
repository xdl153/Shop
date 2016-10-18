<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserlistController extends Controller
{
    //
	public function article()
	{
		$list = \DB::table('user')->get();
		// dd($list);
    		return view("Admin.article-list",['list'=>$list]);

	}
}
