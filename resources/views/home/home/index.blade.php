<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<title>首页</title>
	<link rel="stylesheet" href="/homes/css/home.css">
	<link rel="stylesheet" href="/homes/css/reset.css">
	<link rel="stylesheet" href="/homes/css/lightbox.css">
	<link rel="stylesheet" href="/homes/css/foot.css">
	<script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/??flexible_css.js,flexible.js"></script>
	<script src="/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>
	<!--head-->
	<div id="head">
		<img src="/homes/image/banner.png">

		<div class="company">
			<li class="top">
				<span>主办方：</span>
				<p>北京野海互创技术有限公司</p>
			</li>
			<li class="bottom">
				<span>承办方：</span>
				<p>千寻百味、野海互创、顺天食、                                              风鸽天下、渝上城全景食府</p>
			</li>
		</div>

		<div class="concent">
			@foreach($messages as $message)
			<li>
				<h1>{{$message['title']}}</h1>
				<p class="main">{{$message['content']}}</p>
			</li>
			@endforeach
			<hr>
		</div>
	</div>

	<div id="main">
		<div class="time">
			<h1>距活动结束还有：</h1>
			<p id="time">{{$carbon}}</p>
		</div>
		<div class="list">
			<div class="serach">
				<input type="text" placeholder="请输入搜索编号">
				<span>搜索</span>
			</div>
			<ul>
				@foreach($posts as $post)
				<li>
					<span class="num">{{$post['id']}}</span>
					<div id="addd">
						<a class="example-image-link" href="{{$post['img']}}" data-lightbox="example-1" data-title="描述信息">
							<img class="example-image" src="{{$post['img']}}" alt="image-1" />
						</a>
					</div>
					
					<div class="rank">
						<span class="left">
							<span>
								<p>{{$post['votes_count']}}</p>
								<p>当前票</p>
							</span>
							<span>
								<p>{{$post['ranking']}}</p>
								<p>排名</p>
							</span>
						</span>
						@if($post->vote(\Auth::id())->exists())
						<span class="right" style=" background: #ea806b ">投票</span>
						@else
						<a href="posts/{{$post->id}}/vote" type="button"><span class="right" id="vote">投票</span></a>
						@endif
					</div>
				</li>
				@endforeach
			</ul>
			<div style="height: 1.5rem"></div>
		</div>
	</div>
	@include('home.layout.footer')
<script>
	var time = function() { 
		var date = new Date()
		var time = document.querySelector('#time')
		
		var day =  date.getDate()
		var hour = date.getHours()
		var min = date.getMinutes()
		var sec = date.getSeconds()

		days = 33 - day
		hours = 24 - hour
		mins = 60 - min
		secs = 60 - sec
		
		time.innerHTML = days + '天&nbsp' + hours + '小时&nbsp' + mins + '分&nbsp' + secs + '秒&nbsp&nbsp&nbsp&nbsp'		
	
		if(days == 0 && hours == 0 && mins==0 && secs==0){
		time.innerHTML = '时间已截止'
		}
	}



	setInterval(function() {
		time()
	}, 200)
</script>
</script>
</body>
</html>