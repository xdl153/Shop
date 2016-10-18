<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="{{ asset('Admin/favicon.ico') }}" >
<LINK rel="Shortcut Icon" href="{{ asset('Admin/favicon.ico') }}" />
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
<!--/meta 作为公共模版分离出去-->

<title>添加用户</title>

</head>
<body>
<article class="page-container">
	<form action="{{ URL('Admin/article-add') }}" method="post" class="form form-horizontal" id="form-member-add">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入用户名" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="请输入密码" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
		<div style="font-size:50px;margin-left:200px;color:red;">欢迎注册啊</div>
		<div style="font-size:35px;margin-left:200px;color:yellow;">注册就送妹子</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="{{ asset('Admin/lib/jquery/1.9.1/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/layer/2.1/layer.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/icheck/jquery.icheck.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/jquery.validation/1.14.0/validate-methods.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/jquery.validation/1.14.0/messages_zh.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui/js/H-ui.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui.admin/js/H-ui.admin.js') }}"></script> 
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>