
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title>正啊 - 后台管理</title>
	<link rel="stylesheet" type="text/css" href="/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/fonts/iconfont.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body style="background: #f0f0f0;">
	<div class="ma_top">
		<a target="_blank" href="/" class="ma_logo"><img src="/images/logo_a.png"></a>
		<h1 class="ma_title">管理后台</h1>
		<div class="ma_tool">
			<div class="ma_searchbox">
				<input type="text" placeholder="输入ID" class="ma_searchinput">
				<input type="submit" value="搜索" class="ma_searchbtn">
			</div>
			<div class="ma_loginname">{{Auth::user()->name}}</div>
			<a href="/auth/logout" class="ma_logout">退出登录</a>
		</div>
	</div>
	<div class="ma_left">
		<div class="ma_nav">
			<a href="/admin/manage" class="selected">全部</a>
			<a href="/admin/product/new">新增</a>
		</div>
	</div>
	@yield('content')
</body>
</html>
