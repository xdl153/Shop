<!DOCTYPE HTML>
<html>
<head>
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
		<p><a href="/">投资赞助人、</a><a href="/">外卖糗事</a>、<a href="/">男女趣事</a>、<a href="/">高手在民间、</a><br>
			Copyright &copy;2015 H-ui.admin v2.3 All Rights Reserved.<br>
			本后台系统由<a href="/" target="_blank" title="外卖超人">外卖最良心</a>提供外卖大师</p>
			<p><a href="/">友情链接：外卖超人只做最好的</a></p>
		<img src="/Admin/1.png" style="width:100px;">
		<img src="/Admin/2.png" style="width:100px;">
		<img src="/Admin/1.jpg" style="width:50px;">
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
</body>
</html>