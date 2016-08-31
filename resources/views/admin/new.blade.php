@extends('layouts.manage')

@section('content')
<div class="ma_right">
<div class="mainbox">
	<div class="centerbox">
		<form method="POST" action="/admin/product/save" class="form-horizontal" enctype="multipart/form-data" role="form">
			{!! csrf_field() !!}
			<h2>文章内容</h2>
			<div class="editbox">
				<h2>标题</h2>
				<div><input name = "title" type="text" placeholder="如：扬名广场大风车3折超划算啊" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>封面图</h2>
				<p>建议按照16:9的比例，即手机横屏状态下拍摄的照片，大小不超过2M</p>
				<div><input name = "file" type="file"></div>
			</div>
			<div class="editbox">
				<h2>位置</h2>
				<p>建议填写具体地址+商铺名称</p>
				<div><input name = "address" type="text" placeholder="如：前山诚丰广场5楼comebuy" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>亮点</h2>
				<p>输入标签内容</p>
				<div><input name = "discount" type="text" placeholder="如：买一送一、全场七折" class="inputtext"></div>
			</div>
			<div class="editbox">
				<h2>优惠时段</h2>
				<div><input name = "startat" type="date" placeholder="开始时间" class="inputtext inputtext01"><span>&nbsp;-&nbsp;</span><input name = "endat" type="date" placeholder="结束时间" class="inputtext inputtext01"></div>
			</div>
			<div class="editbox">
				<h2>频道</h2>
				<div>
					<label><input type="radio" name="nav">&nbsp;吃喝玩乐</label>&nbsp;&nbsp;
					<label><input type="radio" name="nav">&nbsp;超市特价</label>&nbsp;&nbsp;
					<label><input type="radio" name="nav">&nbsp;抵买品牌</label>
				</div>
			</div>
			<div class="editbox">
				<h2>正文</h2>
				<div><textarea name = "description" style="width:100%; height:300px;"></textarea></div>
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
				<div><input type="text" placeholder="如：丧心病狂地" class="inputtext inputtext01">&nbsp;&nbsp;发布于2016年8月1日</div>
			</div-->
			<input type="submit" value="发 布" class="editbtn01">
		</form>
	</div>
</div>
</div>
@endsection