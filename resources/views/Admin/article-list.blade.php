<!DOCTYPE HTML>
<html>
<head>
<style>
.snake{
	color:green;
	font-size:20px;
	font-weight:bold;
	position:absolute;
}
</style>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{ asset('Admin/lib/html5.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/respond.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/PIE_IE678.js') }}"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui/css/H-ui.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/css/H-ui.admin.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/lib/Hui-iconfont/1.0.7/iconfont.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/lib/icheck/icheck.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/skin/default/skin.css') }}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/css/style.css') }}" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>用户列表</title>
</head>
<body>
<font id='myfont' size='7'></font>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span> 用户列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="member_add('添加用户','{{ URL('/article-add') }}','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></div>
	<div class="mt-20">

	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list as $article)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td id="userid">{{ $article->id }}</td>
				<td>{{ $article->name }}</td>
				<td class="td-manage">
				<a style="text-decoration:none" class="ml-5" href="javascript:test({{ $article->id }})" onClick="change_password('修改密码','change-password?id={{ $article->id }}','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> 
				<a class="ml-5" style="text-decoration:none" href="del?id={{ $article->id }}">删除</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
<script type="text/javascript" src="{{ asset('Admin/lib/jquery/1.9.1/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/layer/2.1/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/laypage/1.2/laypage.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/My97DatePicker/WdatePicker.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui/js/H-ui.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui.admin/js/H-ui.admin.js') }}"></script> 

<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  // {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});

/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,w,h){
	layer_show(title,url,w,h);	
}
</script> 
          @if(session("msg"))
               <span style="color:red;font-size:20px;margin-left:300px;">{{session("msg")}}</span>
          @endif
</body>
</html>
