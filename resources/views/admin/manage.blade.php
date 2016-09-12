@extends('layouts.manage')
@section('content')
	<div class="ma_right">
		<div class="ma_content">
			<table class="ma_table">
				<tr>
					<th>ID</th>
					<th>栏目</th>
					<th>标题</th>
					<th>优惠</th>
					<th>限期</th>
					<th>是否过期</th>
					<th>分享者</th>
					<!--th>留言数</th-->
					<th>阅读量</th>
				</tr>
				@foreach ($products as $product)
				<tr>
					<td>{{$product->id}}<div class="ma_control"><a href="/admin/product/edit/{{$product->id}}" target="_parent" class="ma_edit">编辑</a><a href="/admin/product/destroy/{{$product->id}}" class="ma_del">删除</a></div></td>
					<td>{{$product->channel}}</td>
					<td><a href="content.html" target="_blank">{{$product->title}}</a></td>
					<td>{{$product->discount}}</td>
					<td>{{$product->startat}}~{{$product->endat}}</td>
					<td><input type="checkbox" class="ma_checkbox"></td>
					<td>{{$product->member_id}}</td>
					<!--td>21</td-->
					<td>{{$product->views}}</td>
				</tr>
				@endforeach
			</table>
			<div class="page">
<!-- 				<a href="">最前</a>
				<a href="" class="iconfont">&#xe600;</a>
				<div>
					<a href="" class="selected">1</a>
					<a href="">2</a>
					<a href="">3</a>
					<span>...</span>
					<a href="">21</a>
				</div>
				<a href="" class="iconfont">&#xe604;</a>
				<a href="">最后</a> -->
				{!! $products->links() !!}
			</div>
		</div>
	</div>
	<script src='/js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript">
		$(function(){
			//模拟删除对话框
			$(".ma_del").click(function(){
				alert("确认删除吗")
			})

			//左侧导航切换效果
			$(".ma_nav a").click(function(){
				$(this).siblings().removeClass("selected");
				$(this).addClass("selected");
			})

			//过期信息背景色改变
			$(".ma_checkbox:checked").parent("td").parent("tr").addClass("guoqi");
			$(".ma_checkbox").click(function(){
				if($(this).is(":checked")){
					$(this).parent("td").parent("tr").addClass("guoqi");
				}else{
					$(this).parent("td").parent("tr").removeClass("guoqi");
				}
			})
		})
	</script>
@endsection
