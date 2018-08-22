<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Post;
use App\Message;
use App\Match;

/*
	主页：
	包括赛事信息
	活动时间
	图片
	票数
	排名
	投票
 */

class HomeController extends Controller
{
	public function index()
	{
		$match = Match::where('id',1)->first();
		$carbon = Carbon::parse($match->date)->toDateTimeString();
		self::mySort();
		$posts = Post::all();
		$messages = Message::all();
		return view('home/home/index',['posts'=>$posts,'messages'=>$messages,'carbon'=>$carbon]);
	}

	//投票
	public function vote(Post $post)
	{
		$match = Match::where('id',1)->first();
		if(Carbon::parse('today') == $match->date)
		{
			return back()->with('info','评选时间已截止');
		}
		else
		{
			$vote = new \App\Vote;
			$vote->user_id = \Auth::id();
			$post->votes()->save($vote);
			$post->votes_count++;
			$post->save();
			return back();
		}
	}

	//作品名次排序函数
	public static function mySort()
	{
		$posts = DB::table('posts')->orderBy('votes_count', 'desc')->get();
		for($i=0; $i<count($posts);$i++)
		{
			$post = Post::where('id',$posts[$i]->id)->first();
			$post->ranking = $i+1;
			$post->save();
		}
	}

}
