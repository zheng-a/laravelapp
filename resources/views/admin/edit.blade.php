@extends('layouts.manage')

@section('content')
<div class="ma_right">
<div class="mainbox">
	<div class="centerbox">
		<form method="POST" action="/admin/product/update/{{$product->id}}" class="form-horizontal" enctype="multipart/form-data" role="form">
			{!! csrf_field() !!}
			<h2>文章内容</h2>
			<div class="editbox">
				<h2>标题</h2>
				<div><input name = "title" type="text" value="{{$product->title}}" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>封面图</h2>
				<p>建议按照16:9的比例，即手机横屏状态下拍摄的照片，大小不超过2M</p>
				<div><input name = "file" type="file"></div>
			</div>
			<div class="editbox">
				<h2>位置</h2>
				<p>建议填写具体地址+商铺名称</p>
				<div><input name = "address" type="text" value="{{$product->address}}" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>亮点</h2>
				<p>输入标签内容</p>
				<div><input name = "discount" type="text" value="{{$product->discount}}" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>优惠时段</h2>
				<div><input name = "startat" type="date" value="{{$product->startat}}" class="inputtext inputtext01"><span>&nbsp;-&nbsp;</span><input name = "endat" type="date" value="{{$product->endat}}" class="inputtext inputtext01"></div>
			</div>
			<div class="editbox">
				<h2>频道</h2>
				<div>
					<label><input type="radio" name="channel" value="吃喝玩乐" @if ($product->channel=="吃喝玩乐") checked="checked" @endif>&nbsp;吃喝玩乐</label>&nbsp;&nbsp;
					<label><input type="radio" name="channel" value="超市特价"@if ($product->channel=="超市特价") checked="checked" @endif>&nbsp;超市特价</label>&nbsp;&nbsp;
					<label><input type="radio" name="channel" value="抵买品牌"@if ($product->channel=="抵买品牌") checked="checked" @endif>&nbsp;抵买品牌</label>
				</div>
			</div>
			<div class="editbox">
				<h2>正文</h2>
				<!-- <div>
					<textarea name = "description" style="width:100%; height:300px;"></textarea>
				</div> -->
				@include('UEditor::head')
				<script id="container" name="content" type="text/plain">{!!$product->description!!}</script>
				<script type="text/javascript">
				    var ue = UE.getEditor('container');
				</script>
			</div>
			<hr class="hr">
			<!--h2>分享者信息</h2>
			<div class="editbox">
				<h2>昵称</h2>
				<div><input name = "member_id" type="text" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>头像</h2>
				<p>建议按照1:1的比例，大小不超过100k</p>
				<div><input type="file"></div>
			</div>
			<div class="editbox">
				<h2>自定义发布状态</h2>
				<div><input type="text" value="如：丧心病狂地" class="inputtext inputtext01">&nbsp;&nbsp;发布于2016年8月1日</div>
			</div-->
			<input type="submit" value="更 新" class="editbtn01">
		</form>
	</div>
</div>
</div>
@endsection