<!DOCTYPE html>
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
        <title>菜单列表</title>
    </head>
    <body>
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 菜单管理 <span class="c-gray en">&gt;</span> 菜单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">

                <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>@foreach($co as $c){{ $c->count }}@endforeach</strong> 条</span> </div>
                <div class="mt-20">
                        <table class="table table-border table-bordered table-bg table-sort">
                                <thead>
                                        <tr class="text-c">
                                                <th width="25"><input type="checkbox" name="" value=""></th>
                                                <!--<th width="70">销量</th>-->
                                                <th width="150">菜品名</th>
                                                <th width="120">所属店铺</th>
                                                <!--<th>分类</th>-->
                                                <th width="100">图片</th>
                                                <th width="50">单价</th>
                                                <th width="50">状态</th>
                                                <th width="100">操作</th>
                                        </tr>
                                </thead>

                                <tbody>
                                    @foreach($list as $l)
                                        <tr class="text-c yic" id="{{ $l->mid }}" >

                                                <td><input name="" type="checkbox" value=""></td>
<!--                                                <td>12</td>-->
                                                <td>{{ $l->mname }}</td>
                                                <td>{{ $l->bname }}</td>
                                                <!--<td></td>-->
                                                <td><img src="{{ asset('Shop') }}{{ $l->images }}" style="width:35px;height:35px;"></td>
                                                <td>{{ $l->price }}</td>
                                                <td class="zt" name="a{{ $l->mid }}">{{ $l->recommend }}</td>
                                                <td class="f-14 product-brand-manage">
                                                    <a style="text-decoration:none" class="ml-5 tj"  href="javascript:fun({{ $l->mid }});" title="推荐">
                                                        <i class="Hui-iconfont">&#xe6dc;</i>
                                                    </a> 
                                                   <a title="编辑" href="javascript:;" onclick="member_edit('编辑','/menu-brand_update?id={{ $l->mid }}','4','','510')" class="ml-5" style="text-decoration:none">
                                                        <i class="Hui-iconfont">&#xe6df;</i></a>
                                                    </a> 
                                                    <a style="text-decoration:none" class="ml-5 sc"  href="javascript:del({{ $l->mid }});" title="删除">
                                                        <i class="Hui-iconfont">&#xe6e2;</i>
                                                    </a>
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
            function fun(id){
                var rmd = $("td[name=a"+id+"]").html();
//                alert(rmd);
                    $.ajax({
                        url:'/tuijian',
                        type:'post',
                        async:true,
                        data:{id:id,rmd:rmd},
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            if(data =='y'){
                                location.reload();
                            }
                        },
                        error:function(){
                            alert('失败');
                        }
                    })
            }
            function del(id){
                $.ajax({
                        url:'/del',
                        type:'post',
                        async:true,
                        data:{id:id},
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            if(data =='y'){
                                location.reload();
                            }
                        },
                        error:function(){
                            alert('失败');
                        }
                    })
            }
        </script>
        <script type="text/javascript">
        $('.table-sort').dataTable({
                "aaSorting": [[ 1, "desc" ]],//默认第几个排序
                "bStateSave": true,//状态保存
                "aoColumnDefs": [
                  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
                ]
        });
        function member_edit(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        </script>
    </body>
</html>