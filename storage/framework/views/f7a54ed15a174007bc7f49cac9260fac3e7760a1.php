<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>意见反馈</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论列表 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th>店铺名</th>
                                        <th>用户评论内容</th>
					<th>送餐用时</th>
				</tr>
			</thead>
			<tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr class="text-c">
					<td><?php echo e($info->name); ?></td>
					<td><?php echo e($info->content); ?></td>
					<td class="text-l"><?php echo e($info->data); ?>分钟</td>
				</tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/jquery/1.9.1/jquery.min.js')); ?>"></script>
<script>
    function test(id,zt){
            $.ajax({
                url:'/Orderoperation',
                type:'get',
                async:true,
                data:{id:id,zt:zt},
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data === 'y'){
                        window.location.reload();
                    }
                },
                error:function(){
                    alert('ajax请求失败');
                }
            });
    }
    function deletedd(id){
        if(confirm("确认删除订单吗")){
            $.ajax({
                url:'/Orderodelete',
                type:'get',
                async:true,
                data:{id:id},
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data === 'y'){
                        window.location.reload();
                    }else{
                        alert('不能删除未发货的订单');
                    }
                },
                error:function(){
                    alert('ajax请求失败');
                }
            });
       }
    }
</script>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/layer/2.1/layer.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/laypage/1.2/laypage.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/My97DatePicker/WdatePicker.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/lib/datatables/1.10.0/jquery.dataTables.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/static/h-ui/js/H-ui.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('Admin/static/h-ui.admin/js/H-ui.admin.js')); ?>"></script> 
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,0]}// 制定列不参与排序
	]
});
</script>
</body>
</html>