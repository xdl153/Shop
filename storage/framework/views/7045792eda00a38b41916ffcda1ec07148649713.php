<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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

<title>添加用户 - H-ui.admin v2.3</title>
</head>
<body>
<article class="page-container">
	<form action="<?php echo e(URL('/menu-brand_update')); ?>" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <?php $__currentLoopData = $sel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($s->id); ?>" />
         
<!--		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改菜系</label>
			<div class="formControls col-xs-4 col-sm-3"> <span class="select-box">    
				<select class="select" size="1" name="cp">
					<option value="-1" selected>请选泽菜系</option>
                                    <?php $__currentLoopData = $caip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($cai->id); ?>"><?php echo e($cai->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</select>
				</span> 
			</div>
		</div>-->
                <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改店铺</label>
			<div class="formControls col-xs-4 col-sm-3"> <span class="select-box">
				<select class="select" size="1" name="dp">
					<option value="-1" selected>请选泽店铺</option>
                                        <?php $__currentLoopData = $bus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($b->id); ?>"><?php echo e($b->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</select>
				</span> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改名称</label>
			<div class="formControls col-xs-4 col-sm-3"> <span class="select-box">
                                <input type="text" class="select" size="1" value="<?php echo e($s->name); ?>" name="cname" placeholder="请修改您需要的菜名">
				</span> 
			</div>
		</div>
                <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改金额</label>
			<div class="formControls col-xs-4 col-sm-3"> <span class="select-box">
                                <input type="text" class="select" size="1" value="<?php echo e($s->price); ?>" name="price"  placeholder="请修改金额">
				</span> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改图片</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="uploadfile" value="" style="width:200px">
				<a href="javascript:void();"  class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 菜品照片</a>
				<input type="file" name="file" value="<?php echo e($s->images); ?>"  multiple  class="input-file">
				</span> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改介绍</label>
			<div class="formControls col-xs-5 col-sm-5">
				<textarea name="beizhu" cols="" rows="" class="textarea"  placeholder="请您修改菜品" onKeyUp="textarealength(this,100)"><?php echo e($s->caipin); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
                                <!--<input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">-->
			</div>
		</div>
	</form>
</article>
<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/jquery/1.9.1/jquery.min.js')); ?>"></script> 
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
	
//	$("#form-member-add").validate({
//		rules:{
//			username:{
//				required:true,
//				minlength:2,
//				maxlength:16
//			},
//			sex:{
//				required:true,
//			},
//			mobile:{
//				required:true,
//				isMobile:true,
//			},
//			email:{
//				required:true,
//				email:true,
//			},
//			uploadfile:{
//				required:true,
//			},
//			
//		},
//		onkeyup:false,
//		focusCleanup:true,
//		success:"valid",
//		submitHandler:function(form){
//			//$(form).ajaxSubmit();
//			var index = parent.layer.getFrameIndex(window.name);
//			//parent.$('.btn-refresh').click();
//			parent.layer.close(index);
//		}
//	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>