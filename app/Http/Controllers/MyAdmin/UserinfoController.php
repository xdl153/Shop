<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserinfoController extends Controller
{
    //
	public function index()
	{
    		return view("Admin.member-show");
	}
}
