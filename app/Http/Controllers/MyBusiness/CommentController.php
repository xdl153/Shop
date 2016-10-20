<?php


namespace App\Http\Controllers\MyBusiness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::select("SELECT `comment`.`data`, 
	`comment`.content, 
	`comment`.grade, 
	`comment`.bid, 
	`comment`.uid, 
	business.id, 
	business.`name`, 
	dealer.id
FROM `comment`, business, dealer
WHERE `comment`.bid = business.id AND business.did = dealer.id AND dealer.id = {$id}");
        return view("Business.comment-info",['list'=>$data]);
    }
}