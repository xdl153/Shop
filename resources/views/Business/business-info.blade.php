<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<title>店铺管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 店铺管理 <span class="c-gray en">&gt;</span> 店铺信息 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th>店铺名</th>
				<th>店铺类别</th>
				<th>照片</th>
				<th>店铺地址</th>
				<th>收款账号</th>
				<th>配送范围</th>
				<th>电话</th>
				<th>审核信息</th>
				<th>状态</th>
				<th>操作</th>
				
			</tr>
		</thead>
		<tbody>
			@if($info)
			@foreach($info as $in)
			<tr class="text-c">
				<td>{{ $in->name }}</td>
				<td>{{ $in->cname }}</td>
				<td><img src="Shop/{{ $in->photo }}" width="85" height="100"></td>
				<td>{{ $in->address }}</td>
				<td>{{ $in->account }}</td>
				
				<td class="text-l">
					@foreach($address as $addr)
						@foreach($addr as $ad)
							@if($in->id == $ad->bid)
								{{ $ad->name }}
							@endif
						@endforeach
					@endforeach
				</td>
				<td>{{ $in->phone }}</td>
				<td> @if($in->examine == '3') 审核不通过 @elseif($in->examine == '2') 审核通过 @elseif($in->examine == '1') 审核中 @endif</td>
				<td class="td-status">
					@if($in->status == '2')
						<span class="label label-defaunt radius">已停用</span>
					@else
						<span class="label label-success radius">已启用</span>
					@endif
				</td>
				<td class="td-manage">
					@if($in->status == '2')
						<a style="text-decoration:none" onClick="member_start(this,'{{ $in->id }}','{{ $in->id }}')" href="javascript:;" title="启用">
							<i class="Hui-iconfont">&#xe6e1;</i>
						</a>
					@else
						<a style="text-decoration:none" onClick="member_stop(this,'{{ $in->id }}','{{ $in->id }}')" href="javascript:;" title="停用">
							<i class="Hui-iconfont">&#xe631;</i>
						</a>
					@endif
					
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','business-brandupdate?id={{ $in->id }}','4','','510')" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6df;</i></a> 
					@if($in->examine == '3')
					<a style="text-decoration:none" class="ml-5" onClick="member_del(this,'{{ $in->id }}')" href="javascript:;" title="删除">
					<i class="Hui-iconfont">&#xe6e2;</i></a>	
					@endif
				</td>
			</tr>
			@endforeach
			@endif
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
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id,tid){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,'+id+','+tid+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		// layer.msg('已停用!',{icon: 5,time:id});
		$.ajax({
           url:'/business-on',
           type:'post', 
           async:true,
           data:{id:id},
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success:function(data){
                layer.msg('已停用!',{icon: 5,time:id});
           },
           error:function(){
               alert('ajax失败');
           }
        });
	});
}

/*用户-启用*/
function member_start(obj,id,tid){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,'+id+','+tid+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		$.ajax({
           url:'/business-off',
           type:'post', 
           async:true,
           data:{id:id},
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success:function(data){
                layer.msg('已启用!',{icon: 6,time:id});
           },
           error:function(){
               alert('ajax失败');
           }
        });
		
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		$.ajax({
           url:'/business-del',
           type:'post', 
           async:true,
           data:{id:id},
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success:function(data){
                layer.msg('已删除!',{icon:1,time:1000});
           },
           error:function(){
               alert('ajax失败');
           }
        });
		
	});
}
</script> 
</body>
</html>
