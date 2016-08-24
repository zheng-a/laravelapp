@extends('layouts.master')

@section('content')
	<ul class="list">
		@foreach ($products as $product)
		<li class="wow fadeIn market">
			<a href="content.html" class="list_img"><img class="lazy" data-original={{$product->imageurl}} src={{$product->imageurl}} style="display: inline;"></a>
			<div class="list_content">
				<div class="sale_type">
					<i class="arrowmask"></i>
					<span>{{$product->discount}}</span>
					<div class="sale_tips">
						<b><i class="iconfont">&#xe60b;</i>{{$product->discount}}</b>
						<b><i class="iconfont">&#xe60f;</i>{{$product->startat}}~{{$product->endat}}</b>
					</div>
				</div>
				<h1 class="sale_title">
					<a href="content.html" class="ellipsis">{{$product->title}}</a>
					<div class="sale_head"><img src="images/head01.jpg">{{$product->member_id}}</div>
				</h1>
			</div>
		</li>
		@endforeach
	</ul>

@endsection