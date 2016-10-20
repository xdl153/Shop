<?php

namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentinfoController extends Controller
{
    //评论列表信息
    public function Commentinfo()
    {
    	return view("Business.comment-info");
    }
}
