<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<title>参赛</title>
	<link rel="stylesheet" href="/homes/css/layout.css">
	<link rel="stylesheet" href="/homes/css/reset.css">
	<link rel="stylesheet" href="/homes/css/foot.css">
	<script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/??flexible_css.js,flexible.js"></script>
</head>
<body>
	<div id="layout_main">
		<ul class="name">
			<a href="/posts/add">
			<li>
				 <p>插画</p>
				<img src="/homes/image/y.png">
			</li>
			</a>

			<a href="/posts/add">
			<li>
				<p>多格漫画</p>
				<img src="/homes/image/y.png">
			</li>
			</a>

			<a href="/posts/add">
			<li>
				<p>游戏原画</p>
				<img src="/homes/image/y.png">
			</li>
			</a>

			<a href="/posts/add">
			<li>
				<p>动画短片</p>
				<img src="/homes/image/y.png">
			</li>
			</a>
		</ul>

		<div class="ad">
			<img src="/homes/image/ad.png">
		</div>
	</div>
	@include('home.layout.footer')

<script>
	var list = document.querySelector('#layout_main')
	var lists = list.getElementsByTagName('li')
	var imgs = list.getElementsByTagName('img')
	var len = lists.length

	

	list = function() {
		for(var i = 0; i < len; i++) {
		
			lists[i].index = i
			lists[i].onclick = function() {

				for(var i = 0; i < len; i++) {
					imgs[i].src = '/homes/image/y.png'
				}

				imgs[this.index].src = '/homes/image/yed.png'
			}
		}
	}

	list()
</script>
</body>
</html>