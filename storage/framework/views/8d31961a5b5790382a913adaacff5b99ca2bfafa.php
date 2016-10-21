<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<LINK rel="Bookmark" href="<?php echo e(asset('Admin/favicon.ico')); ?>" >
<LINK rel="Shortcut Icon" href="<?php echo e(asset('Admin/favicon.ico')); ?>" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/html5.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/respond.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/PIE_IE678.js')); ?>"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Admin/static/h-ui/css/H-ui.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Admin/static/h-ui.admin/css/H-ui.admin.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Admin/lib/Hui-iconfont/1.0.7/iconfont.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Admin/lib/icheck/icheck.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Admin/static/h-ui.admin/skin/default/skin.css')); ?>" id="skin" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Admin/static/h-ui.admin/css/style.css')); ?>" />

<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>修改店铺信息 - H-ui.admin v2.3</title>
<meta name="keywords" content="H-ui.admin v2.3,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<form action="" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<input type="hidden" name='id' value="<?php echo e($in->id); ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>店铺名</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->name); ?>" placeholder="" id="username" name="username">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属类别</label>
			<div class="formControls col-xs-4 col-sm-3"> 
			<span class="select-box">
			<select class="select" size="1" name="category">
					<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($ca->id); ?>" <?php if($in->cname == $ca->name): ?> selected <?php endif; ?> ><?php echo e($ca->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</select>
			</span>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>营业时间</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->shopopen); ?>" placeholder=""  name="shopopen">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>休息时间</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->shopon); ?>" placeholder=""  name="shopon">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>起送价</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->money); ?>" placeholder=""  name="money">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>店铺地址</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->address); ?>" placeholder=""  name="address">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>收款账号</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->account); ?>" name="account">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>店铺照片</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="uploadfile" value="<?php echo e($in->photo); ?>" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 店铺照片</a>
				<input type="file" name="file" multiple  class="input-file">
				</span> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>配送范围</label>
				<?php if($district): ?>
				<?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<?php $__currentLoopData = $dis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $di): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<div style="padding-bottom:10px;" name="addre<?php echo e($di->id); ?>" class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
							<input class="input-text upload-url" type="text" name="uploadfile" value="<?php echo e($di->name); ?>" style="width:200px">
							<a href="javascript:void();" onclick="del(<?php echo e($di->id); ?>,<?php echo e($in->id); ?>)" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe6a6;</i> 删除地址</a>
							<!-- <input type="file" name="file" multiple  class="input-file"> -->
						</span> 
					</div>
					
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
		</div>		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>添加配送范围</label>
			<div class="formControls col-xs-2 col-sm-2" name='div1'> 
			<span class="select-box">
			<select id="cid" class="select"  name="sele">
				<option value='-1'>--请选择--</option>		
			</select>
			</span>

			</div>
		</div>
		
			
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话</label>
			<div class="formControls col-xs-4 col-sm-3">
				<input type="text" class="input-text" value="<?php echo e($in->phone); ?>" placeholder="常用电话号码" name="phone">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" onclick="fun()" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
			</div>
		</div>
	</form>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</article>

<!--_footer 作为公共模版分离出去--> 
<script src="Shop/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/layer/2.1/layer.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/icheck/jquery.icheck.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/jquery.validation/1.14.0/jquery.validate.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/jquery.validation/1.14.0/validate-methods.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/jquery.validation/1.14.0/messages_zh.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/static/h-ui/js/H-ui.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/static/h-ui.admin/js/H-ui.admin.js')); ?>"></script> 
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
			
			return true;
			
			var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});

//删除地址
function del(did,bid){
	$.ajax({
        url:'/business-districtdel',               //请求地址
        type:'post',                //请求方式
        async:true,                 //是否异步
        data:{did:did,bid:bid},          //发送的数据
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                //响应的数据类型
        success:function(data){     //成功回调函数
          $("div[name=addre"+did+"]").remove();
          // alert(data);
        },
        error:function(){
            alert('ajax请求失败1'); //失败回调
        }
    });
	
}
//添加配送地址城市级联
$.ajax({
    url:'/business-districtadd',               //请求地址
    type:'post',                //请求方式
    async:true,                 //是否异步
    data:{upid:0},          //发送的数据
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'json',            //响应的数据类型
    success:function(data){     //成功回调函数
    	console.log(data);
        for (var i = 0; i < data.length; i++) {
            $('#cid').append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
        };
    },
    error:function(){
        alert('ajax请求失败1'); //失败回调
    }
});
$("select[name=sele]").live('change',function(){
	$(this).nextAll("select").remove();
	var ob = $(this);

	$.ajax({
	    url:'/business-districtadd',               //请求地址
	    type:'post',                //请求方式
	    async:true,                 //是否异步
	    data:{upid:($(this).val())},    //发送的数据
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    dataType:'json',            //响应的数据类型
	    success:function(data){     //成功回调函数
	        console.log(data);
	        if(data.length>0){
	            var select = $("<select name='sele' class='select'><option value='-1'>--请选择--</option></select>")
	            for (var i = 0; i < data.length; i++) {
	                $(select).append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
	            };
	            ob.after(select);
	        }else{
	        	//写入店铺配送表
	        	did = $("select[name=sele]:last").val();
	        	dc = $("select[name=sele]:last option:selected").text();
	        }
	    },
	    error:function(){
	        alert('ajax请求失败');  //失败回调

	    }
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>