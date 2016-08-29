
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title>正啊 - 内容编辑</title>
	<link rel="stylesheet" type="text/css" href="/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/fonts/iconfont.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div id="particles"></div>
	<div class="wrapper">
		<div class="navbox">
			<a href="index.html" class="logo">
				<img src="/images/logo.png" id="logo01">
				<img src="/images/logo_a.png" id="logo02">
			</a>
			<ul class="nav">
				<li><a href="index.html" id="all">最新优惠</a></li>
				<li><a href="index.html" id="entertainment">吃喝玩乐</a></li>
				<li><a href="index.html" id="market">超市特价</a></li>
				<li><a href="index.html" id="brand">抵买品牌</a></li>
			</ul>
		</div>
		<div class="hidenav">
			<div class="hidenav_menu">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<ul class="hidenav_link">
				<li><a href="index.html" id="all01">最新优惠</a></li>
				<li><a href="index.html" id="entertainment01">吃喝玩乐</a></li>
				<li><a href="index.html" id="market01">超市特价</a></li>
				<li><a href="index.html" id="brand01">抵买品牌</a></li>
			</ul>
			<div class="bl">爆料</div>
			<div class="mask" style="display:none"></div>
		</div>
		<div class="contentbox">
			@yield('content')
			<div class="footer">
				<div>©2016-2017 正啊版权所有<br>网站备案/许可证号:粤ICP备xxxxx号-1</div>
			</div>
			<div class="ewm">
				<b>爆料+被采纳=2元</b>
				<img src="/images/ewm.jpg">
				<p>关注微信公众号<br>zhenga2016</p>
			</div>
		</div>
		@yield('popbox')
	</div>
	<script src='/js/jquery-1.7.2.min.js'></script>
	<script src='/js/jquery.lazyload.min.js'></script>
	<script src='/js/jquery.particleground.min.js'></script>
	<script>
	//线条
	$(document).ready(function() {
		$('#particles').particleground({
			dotColor: '#e6e6e6',
			lineColor: '#e6e6e6'
		});
	});

	$(function(){
		//移动端菜单
		$(".hidenav_menu").click(function(){
			if ($(".hidenav_menu").hasClass("active")){
				$(".hidenav_link").slideUp(100);
				$(".mask").fadeOut(100);
				$(".hidenav_menu").removeClass("active");
			}else{
				$(".mask").fadeIn(100);
				$(".hidenav_link").slideDown(100);
				$(".hidenav_menu").addClass("active");
			}
		})
		$(".mask").click(function(){
			$(".hidenav_link").slideUp(100);
			$(".mask").fadeOut(100);
			$(".hidenav_menu").removeClass("active");
		})

		//爆料按钮
		$(".bl").toggle(function(){
			$(".ewm").show();
		},function(){
			$(".ewm").hide();
		})

		//导航
		$(".nav li").click(function(){
			$(".nav li").children("a").removeClass("selected");
			$(this).children("a").addClass("selected");
			$(document).scrollTop(1).scrollTop(-1);
		})
		$(".hidenav_link li").click(function(){
			$(".hidenav_link li").children("a").removeClass("selected");
			$(this).children("a").addClass("selected");
			$(document).scrollTop(1).scrollTop(-1);
			$(".hidenav_link").slideUp(100);
			$(".mask").fadeOut(100);
			$(".hidenav_menu").removeClass("active");
		})

		//弹框
		$(".editbtn01").click(function(){
			$(".popbox").fadeIn(200);
		})
		$(".popbtn").click(function(){
			$(".popbox").hide();
		})
	})
	</script>
</body>
</html>
