
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title>正啊</title>
	<link rel="stylesheet" type="text/css" href="/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/fonts/iconfont.css">
	<link rel="stylesheet" type="text/css" href="/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script src='/js/jquery-1.7.2.min.js'></script>
	<script src="/js/jquery.lazyload.min.js"></script>
	<script src="/js/wow.min.js"></script>
	<script src='/js/jquery.particleground.min.js'></script>
	<script src='/js/common.js'></script>
</head>
<body>
	<div id="particles"></div>
	<div class="wrapper">
		<div class="navbox">
			<a href="/" class="logo">
				<img src="/images/logo.png" id="logo01">
				<img src="/images/logo_a.png" id="logo02">
			</a>
			<ul class="nav">
				<li><a href="/" id="all">最新优惠</a></li>
				<li><a href="/channel1" id="entertainment">吃喝玩乐</a></li>
				<li><a href="/channel2" id="market">超市特价</a></li>
				<li><a href="/channel3" id="brand">抵买品牌</a></li>
			</ul>
		</div>
		<div class="hidenav">
			<div class="hidenav_menu">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<ul class="hidenav_link">
				<li><a href="/" id="all01">最新优惠</a></li>
				<li><a href="/channel1" id="entertainment01">吃喝玩乐</a></li>
				<li><a href="/channel2" id="market01">超市特价</a></li>
				<li><a href="/channel3" id="brand01">抵买品牌</a></li>
			</ul>
			<div class="bl">爆料</div>
			<div class="mask" style="display:none"></div>
		</div>
		<div class="contentbox">
			@yield('content')
			<div class="footer">
				<div>©2016-2017 正啊版权所有<br>粤ICP备16079048号-1</div>
			</div>
			<div class="ewm">
				<b>爆料+被采纳=2元</b>
				<img src="/images/ewm.jpg">
				<p>关注微信公众号<br>zhenga2016</p>
			</div>
		</div>
		@yield('popbox')
	</div>
	<script type="text/javascript">
		$(function(){
			//lazyload
			$("img.lazy").lazyload({
				placeholder : "/images/logo_gray.png",
				effect: "fadeIn"
			});
		})
	</script>
</body>
</html>
