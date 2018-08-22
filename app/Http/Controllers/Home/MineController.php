<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Post;

/*
	个人参赛作品排名
	票数
 */

class MineController extends Controller
{
	public function index()
    {
    	$posts = Post::where('user_id',\Auth::id())->orderBy('created_at', 'desc')->get();
        return view('home/mine/index',compact('posts'));
    }
}