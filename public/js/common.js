//线条
$(document).ready(function() {
	$('#particles').particleground({
		dotColor: '#e6e6e6',
		lineColor: '#e6e6e6'
	});
});

//动画效果
new WOW().init();

$(function(){
	//lazyload
	$("img.lazy").lazyload({
		placeholder : "images/logo_gray.png",
		effect: "fadeIn"
	});

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

	//筛选
	$("#all,#all01").click(function(){
		$(".list li").fadeIn();
	})
	$("#entertainment,#entertainment01").click(function(){
		$(".list li").hide();
		$(".entertainment").fadeIn();
	})
	$("#market,#market01").click(function(){
		$(".list li").hide();
		$(".market").fadeIn();
	})
	$("#brand,#brand01").click(function(){
		$(".list li").hide();
		$(".brand").fadeIn();
	})

	//弹框
	$(".editbtn01").click(function(){
		$(".popbox").fadeIn(200);
	})
	$(".popbtn").click(function(){
		$(".popbox").hide();
	})

	//留言板
	$(".board > div > textarea").click(function(){
		$(".boardbtn").fadeOut(200);
		$(this).siblings(".boardbtn").fadeIn(200);
	});
	$(".board > div > textarea").blur(function(){
		$(".boardbtn").fadeOut(200);
	})

	$(".boardbtn").click(function(){
		$(this).siblings("p").fadeIn(200);
		$(this).siblings("p").children("span").text($(this).siblings("textarea").attr("value"));
		$(this).siblings("textarea").hide(0,function(){
			$(this).siblings(".boardbtn").fadeOut(200);
		});
	})

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