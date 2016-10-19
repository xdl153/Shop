<!DOCTYPE HTML>
<html>
<head>
<style>
.snake{
	color:blue;
	font-size:20px;
	font-weight:bold;
	position:absolute;
}
</style>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui/css/H-ui.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/css/H-ui.admin.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/lib/Hui-iconfont/1.0.7/iconfont.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/lib/icheck/icheck.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/skin/default/skin.css') }}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/css/style.css') }}" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>外卖超人后台管理系统--后台首页桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎登录外卖超人管理员后台<span class="f-14">v2.4</span>后台系统！</p>
	<div id='did' style='color:red;margin-left:650px;margin-top:-50px;width:500px;height:50px;background:#ccc;font-size:30px;line-height:50px;'></div>
	<p>地址：{{ session('adminuser')->address }}</p>

	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">管理员信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">登录名</th>
				<td><span id="lbServerName"></span>{{ session('adminuser')->name }}</td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td>{{ session('adminuser')->email }}</td>
			</tr>

			<tr>
				<td>手机号</td>
				<td>{{ session('adminuser')->phone }}</td>
			</tr>
		</tbody>
	</table>
</div>


<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015 H-ui.admin v2.3 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="{{ asset('Admin/lib/jquery/1.9.1/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui/js/H-ui.js') }}"></script> 
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>

<!--特效文字-->
<script>
// (function(){
// 	// 1.准备
// 	var msg = '超级管理员';
// 	var str = '';
// 	// 2.循环把每个字放到标签内
// 	for(var i = 0; i < msg.length; i++){
// 		str += '<span id="snake'+ i +'" class="snake">';
// 			str += msg[i];
// 		str += '</span>';
// 	}
// 	document.write(str);

// 	window.onmousemove = function(events){
// 		// 
// 		document.title = 'X:' + events.clientX + 'Y:' + events.clientY;

// 		var i = 0;
// 		var timer = setInterval(function(){
// 			if( i >= msg.length - 1){
// 				clearInterval(timer);
// 			}

// 			// 找对象，
// 			var span = document.getElementById('snake'+i);
// 			span.style.left = events.clientX + i * 30 + 20 + 'px';
// 			span.style.top  = events.clientY + 'px';
// 			i++;
// 		},30);
// 	}
// })();
// </script>
<!--获取时间戳-->
<script type="text/javascript">
//获取div对象
var did = document.getElementById('did');

//定时调用输出时间
setInterval(function(){
	//获取当前时间作为对象，如果你放到外面，只能获取new那一刻的时间
	var date = new Date();

	var y = date.getFullYear();		//获取4位数的年份
	var m = date.getMonth()+1;		//获取月份（0-11）
	var d = date.getDate();			//获取天数

	var h = date.getHours();		//获取时
	var i = date.getMinutes();		//获取分
	var s = date.getSeconds();		//获取秒

	s = (s<10)?'0'+s:s;

	var info = y+'-'+m+'-'+d+' '+h+':'+i+':'+s;
	did.innerHTML = '当前系统时间：'+info;
},1000);
// document.write(date.getTime());	//获取时间戳
</script>
</body>
</html>