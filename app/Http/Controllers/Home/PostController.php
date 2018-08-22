<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Match;
use App\Post;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

/*
参赛板块：
1. 选择分类
2. 输入信息
 */

class PostController extends Controller
{
	public function index()
    {
        return view('home/post/index');
    }

    public function add()
    {
        $match = Match::where('id',1)->first();
        if(Carbon::parse('today') == $match->date)
        {
            return back()->with('info','作品提交时间已截止');
        }
        else
        {
    	   return view('/home/post/add');
        }
    }

    public function store(Request $request)
    {
        $post = new Post();
        $data = $request->all();
        $post->school = $data['school'];
        $post->class = $data['class'];
        $post->profession = $data['profession'];
        $post->real_name = $data['real_name'];
        $post->tel = $data['tel'];
        $post->name = $data['name'];
        $post->link = $data['link'];
        $post->user_id = \Auth::id();


        if(isset($data['img'])==false)
        {
            return back()->with('error','请上传图片');
        }
        else
        {
            $post->img = $data['img'];
            if($_FILES['img']['error'][0]==0)
            {
                $post->img = self::uploadFile();
                if($post->save())
                {
                    return redirect('/mine')->with('info','添加成功');
                }
                else
                {
                    return back()->with('error','添加失败');
                }
            }
        }
    }
    public static function uploadFile()
    {
        $names = '';
        for ($i=0;$i<count($_FILES['img']['name']);$i++) {
            $pic = $_FILES['img']['name'][$i];
            $dir = config('app.upload_image_dir');
            $name = trim($dir.rand(1000000,9000000).time().'.'.pathinfo($pic,4),'.');
            $imgs = Input::file('img');
            $imgs[$i] -> move($dir,$name);
            $names .= $name;
        }
        return $names;
    }

}



