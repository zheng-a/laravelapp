<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title>正啊 - 建设中</title>
	<link rel="stylesheet" type="text/css" href="/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/css/swiper-3.3.1.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="swiper-container buildbg">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="background-image:url(/images/build01.jpg)"></div>
			<div class="swiper-slide" style="background-image:url(/images/build02.jpg)"></div>
			<div class="swiper-slide" style="background-image:url(/images/build03.jpg)"></div>
		</div>
	</div>
	<video autoplay="autoplay" loop="loop" class="buildvideo">
		<source src="/images/build.mp4" type="video/mp4"></video>
	</video>
	<div class="buildmask"></div>
	<img src="/images/build.png" class="buildimg">
	<script src='/js/jquery-1.7.2.min.js'></script>
	<script src='/js/swiper-3.3.1.min.js'></script>
	<script> 
		var build = new Swiper('.buildbg', {
			autoplay: 5000,
			loop: true,
			effect : 'fade',
		})
	</script>
</body>
</html>
