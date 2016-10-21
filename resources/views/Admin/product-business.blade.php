<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
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
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>商家列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商家管理 <span class="c-gray en">&gt;</span> 商家列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!--29行到34行是显示条数和检索-->
	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">

		</form>
	</div>

		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">ID</th>
					<th>店铺名</th>
					<th>店铺照片</th>
					<th width="100">所属商家</th>
					<th width="100">商家电话</th>
					<th width="100">店铺审核状态</th>
					
					<th>操作</th>
				</tr>
			</thead>
			@foreach($business as $p)
			<tbody>
				<tr class="text-c">
					<td width="25"><input type="checkbox" name="" value=""></td>
					<td>{{ $p->id }}</td>
					<td>{{ $p->name }}</td>
					<td><img src="Shop/{{$p->photo}}" width="80" height="100"></td>
					<td>{{ $p->dname }}</td>
					<td>{{ $p->dphone }}</td>
					<td>@if($p->examine == 1) 审核中 @elseif($p->examine == 2) 审核通过 @else 审核不通过 @endif </td>
					<td>
						<a style="text-decoration:none" class="ml-5 tj"  href="javascript:fun({{ $p->id }});" title="通过审核">
                           <i class="Hui-iconfont">&#xe6e1;</i>
                        </a>
                        <a style="text-decoration:none" class="ml-5 tj"  href="javascript:fun1({{ $p->id }});" title="审核不通过">
                            <i class="Hui-iconfont">&#xe6dd;</i>
                        </a>
                    </td>
				</tr>
			</tbody>
			@endforeach
		</table>
	</div>
</div>
<script src="Shop/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/layer/2.1/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/My97DatePicker/WdatePicker.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui/js/H-ui.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui.admin/js/H-ui.admin.js') }}"></script> 
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
	]
});
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
function fun(id)
{
	$.ajax({
       url:'/product-brandBusinesson',
       type:'post', 
       async:true,
       data:{id:id},
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       success:function(data){

            window.location.reload();
       	
       },
       error:function(){

           alert('ajax失败');
       }
    });
}
function fun1(id)
{
	$.ajax({
       url:'/product-brandBusinessoff',
       type:'post', 
       async:true,
       data:{id:id},
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       success:function(data){
      
            window.location.reload();
      	
       },
       error:function(){
           alert('ajax失败');
       }
    });
}
</script>
</body>
</html>