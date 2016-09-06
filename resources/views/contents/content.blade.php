@extends('layouts.master')

@section('content')

<div class="mainbox">
	<div class="centerbox">
		<div class="yhid">
			编号No.{{$product->id}}
			<span title="阅读量"><i class="iconfont">&#xe61a;</i>{{$views}}</span>
		</div>
		<h1 class="yhtitle">{{$product->title}}</h1>
		<div class="sale_type">
			<span>{{$product->discount}}</span>
			<div class="sale_tips">
				<b><i class="iconfont">&#xe60b;</i>{{$product->address}}</b>
				<b><i class="iconfont">&#xe60f;</i>{{$product->startat}} 至 {{$product->endat}}</b>
			</div>
		</div>
		<div class="detailbox">
			<img src={{$product->imageurl}}>
			<br><br>
			{!!$product->description!!}
		</div>
		<hr class="hr">
		<dl class="writter">
			<dt><img src="/images/head01.jpg">{{$product->member_id}}</dt>
			<dd>发布于2016年7月1日</dd>
		</dl>
		<!--hr class="hr">
		<div class="boardbox">
			<h2>留言板</h2>
			<div class="board">
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
				<div>
					<textarea placeholder="空位"></textarea>
					<input type="submit" value="发布" class="boardbtn">
					<p><span></span></p>
				</div>
			</div>
		</div-->
	</div>
</div>

@endsection