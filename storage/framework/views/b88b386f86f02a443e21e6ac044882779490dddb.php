<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <meta name="description" content="" />
        <meta name="viewport" content="user-scalable=no">

        <meta name="google-site-verification" content="BstJA3X9z6f9HcvoN9AZTwaKo_9Abj_j7dVBPfy640s" />
        <meta name="baidu-site-verification" content="IYCrtVH0i1" />
        <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <script src="Shop/js/jquery-1.8.3.min.js"></script>
        <link rel="icon" type="image/png" href="images/favicon.ico"/>

        <script type="text/javascript">

            (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
        </script>

        <link rel="stylesheet" href="<?php echo e(asset('Shop/css/common.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('Shop/css/zeroModal.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('Shop/css/user_center.css')); ?>"/>

        <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
        <!--[if lt IE 9]>
        <script src="<?php echo e(asset('Shop/js/respond.js')); ?>"></script>
        <script>
            var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
             var i= e.length;while (i--){document.createElement(e[i])}
        </script>
        <![endif]-->
        <title>个人中心 - 地址管理</title>
    </head>
    <style type="text/css">
        .hide_box{
            border-radius:4px;
            width:482px;
            height:297px;
            color:#fff;
            color:#444;
            background:#FFFFFF;
            box-shadow:1px 2px 2px #555;
            display:none;}
        .hide_box h4{
                height:47px;
                line-height:47px;
                overflow:hidden;
                color:#000000;
                padding:0 10px;
                border-bottom:1px solid #E5E5E5;
                font-size:18px;
            }
        .hide_box  a{
            width:20px;
            line-height:30px;
            _line-height:15px;
            height:47px;
            font-family:arial;
            overflow:hidden;
            display:block;
            background:#fff;
            color:#c77405;
            float:right;
            text-align:center;
            text-decoration:none;
            margin-top:7px;
            font-size:18px;
            font-weight:normal;
            border-radius:2px;
            _font-size:12px;
        }
        .hide_box p{padding:30px 10px;font-size:13px;border:1px solid #ccc;}
    </style> 
    <body class="day " ng-controller="bodyCtrl"  day-or-night>
        <section class="common-back" id="wrapBackground">

                <header id="header">
                    <div class="common-width clearfix">
                        <h1 class="fl">
                            <a class="logo base-logo" href="/">外卖超人</a>
                        </h1>
                            <ul id="member" class="member" login-box>
                                <li><a href="shop_list?id=<?php echo e($_GET['id']); ?>" class="index">首页</a></li>
                                <li class="login-register">
                                    <?php if(empty(session("username"))): ?>
                                        <a href="/login?id=<?php echo e($_GET['id']); ?>&status=1"  class="login"  >登录</a>
                                        <span class="cg">/</span><a href="/login?id=<?php echo e($_GET['id']); ?>&status=2"  class="register">注册</a></li>
                                    <?php else: ?>
                                        <li class="userName">
                                            <a href="/member_index?id=<?php echo e($_GET['id']); ?>" draw-user><?php echo e(session("username")); ?><em></em></a>
                                            <div>
                                                <p><a href="/member_index?id=<?php echo e($_GET['id']); ?>" >账号管理</a></p>
                                                <p><a href="/member_addr?id=<?php echo e($_GET['id']); ?>" >地址管理</a></p>
                                                <p class="no-bo"><a  href="#" onclick="exit()">退出</a></p>
                                            </div>
                                        </li>
                                            <li><a href="/member_order?id=<?php echo e($_GET['id']); ?>" class="order-center" >查看订单</a></li>
                                            <li class=""><a href="/member_collect?id=<?php echo e($_GET['id']); ?>" >我的收藏</a></li>
                                            <li class=""><a  href="#" onclick="exit()">退出</a></li>
                                    <?php endif; ?>

                                <input type="hidden" value="<?php echo e($_GET['id']); ?>" id="hidden">
                                <script type="text/javascript">
                                    var id= jQuery("#hidden").val();
                                    function exit(){
                                        var hiddenid = jQuery('#hidden').val();
                                        jQuery.ajax({
                                           url:'/logout',
                                           type:'post', 
                                           async:true,
                                           headers: {
                                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                           },
                                           success:function(a){
                                            if( a === 'y'){
                                                window.location.href="/shop_list?id="+id+"";
                                            }else{
                                                alert('退出失败');
                                            }
                                           },
                                           error:function(){
                                               alert('ajax失败');
                                           }
                                        });
                                    };
                                </script>
                            </ul>
                    </div>
                </header>

            <div id="main-box">
                 <!--二维码-->
                <div class="qrCode-frame" ng-hide="qrCodeStatus">
                    <img src="<?php echo e(asset('Shop/images/wx.png')); ?>" alt="扫描二维码" />
                    <em ng-click="qrCodeStatus=true">X</em>
                </div>

                <div ng-controller="colorAction">
                    <div class="dayColor_two"></div>
                    <div class="dayColor_one"></div>
                    <div class="dayColor_three" ng-class="{dayColor_threeActive:threeActive}"></div>
                </div>


        <section>
            <div class="user-center-main-box common-width clearfix">
                <aside class="fl">
                    
                   <ul>
                        <li>
                            <a href="/member_index?id=<?php echo e($_GET['id']); ?>" rel="nofollow">账号管理</a>
                        </li>
                        <li>
                            <a href="/member_order?id=<?php echo e($_GET['id']); ?>" rel="nofollow">我的订单</a>
                        </li>
                        <li >
                            <a href="/member_collect?id=<?php echo e($_GET['id']); ?>" rel="nofollow">我的收藏</a>
                        </li>
                        <li  class="active">
                            <a href="/member_addr?id=<?php echo e($_GET['id']); ?>"  rel="nofollow">地址管理</a>
                        </li>
                    </ul>
                </aside>
                <article class="fl user-center-main">
                    <header>地址管理</header>

        <section class="user-address-main">
            <header>
                <h2>已保存地址</h2>
            </header>
            <article class="mb10">
                <table id="tabname">
                    <colgroup>
                        <col width="100px">
                        <col width="145px">
                        <col width="407px">
                        <col width="85px">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>收单人</th>
                            <th>手机号码</th>
                            <th>送餐地址</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $site; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr name="trname" id="tr<?php echo e($si->id); ?>">
                            <td name="td<?php echo e($si->id); ?>1"><?php echo e($si->name); ?></td>
                            <td name="td<?php echo e($si->id); ?>2"><?php echo e($si->phone); ?></td>
                            <td name="td<?php echo e($si->id); ?>3"><?php echo e($si->address); ?></td>
                            <input type="hidden" value="<?php echo e($si->id); ?>" name="hidden<?php echo e($si->id); ?>">
                            <td>
                                <a href="javascript:;" onclick="fun(<?php echo e($si->id); ?>)" ng-click="editUserAddress($index)">修改</a>
                                <a href="javascript:;" onclick="dd(<?php echo e($si->id); ?>)">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
                <div class="hide_box" id="testBox" style="height:400px;"> 
                    <h4><a href="javascript:void(0)" id='times' title="关闭窗口">&times;</a>修改地址</h4>
                    <div style="padding-left:60px;padding-top:30px;width:600px;">
                        
                            <div class="form-group mb10 row">
                                <label class="col-2">收单人：</label>
                                <div class="col-4">
                                    <input type="text"  id="inp1" maxlength="10" >
                                </div>
                                 <span style="display:none;padding-top:10px;padding-left:330px;" id="names2">
                                    <span class="vaildate-error">称呼不能为空</span>
                                </span>
                            </div>
                            <div class="form-group mb10 row">
                                <label class="col-2">手机号码：</label>
                                <div class="col-4">
                                    <input type="text" id="inp2" maxlength="11" required  name="input2">
                                </div>
                                <span style="display:none;padding-top:10px;padding-left:330px;" id="phone1">
                                    <span class="vaildate-error">格式不正确</span>
                                </span>
                            </div>
                            <div class="form-group mb30 row">
                                <label class="col-2">原有地址：</label>
                                <div class="col-4">
                                    <input type="hidden" value='' name="">
                                    <input type="text" readonly="readonly" required id="inp3">
                                </div>
                            </div>
             
                                <div class="col-8" style="padding-bottom:20px;">
                                    <select  name='sele1' style="width:100px;" id="bid">
                                        <option value='-1'>--请选择--</option>
                                    </select>
                                </div>
                            <div style="padding-bottom:20px;">
                                <div id="div2" style="display:none;width:50px;padding-top:30px" >
                                        <input type="text" required name="address1" size="50" placeholder="详细地址，如武定西路1189号606室">
                                </div>
                            </div>
                            <div class="form-group mb30 row">
                                <label class="col-2"></label>
                                <div class="col-8">
                                <button class="btn btn-success normal-btn" onclick='sc()'>
                                            修改送餐地址
                                </button>
                                </div>
                            </div>
                        
                    </div>
                </div>

            </article>
            <article ng-show="userAddressList.length < 8">
                <header class="mb10">
                    <h2>新增地址</h2><strong>(最多只能保存 8 个有效地址)</strong>
                </header>
                <section class="add-address-box">
                        <div class="form-group mb10 row">
                            <label class="col-2">收单人：</label>
                            <div class="col-6">
                                <input type="text" required maxlength="10" name="name"
                                    placeholder="如何称呼">
                            </div>
                        <span style="display:none;" id="names1">
                            <span class="vaildate-error">称呼不能为空</span>
                        </span>
                           
                        
                        </div>
                        <div class="form-group mb10 row">
                            <label class="col-2">手机号码：</label>
                            <div class="col-6">
                                <input type="text" maxlength="11" required mobile name="contact"
                                    placeholder="138xxxxxxxx">
                            </div>
                        <span style="display:none;" id="phone">
                            <span class="vaildate-error">手机号码格式不正确</span>
                        </span>
                        </div>
                        <div class="form-group mb30 row">
                            <label class="col-2">送餐地址：</label>
                            <select name='sele' style="width:100px;" id="cid">
                                    <option value='-1'>--请选择--</option>
                            </select>

                            <div id="div1"style="display:none;width:400px;padding-left:100px;padding-top:10px" >
                                <input type="text" required name="address" size="20" placeholder="详细地址，如武定西路1189号606室">
                            </div>
                             
                        </div>
                       <span style="display:none;padding-left:428px;" id="addr1">
                            <span class="vaildate-error">请填写正确地址</span>
                        </span>
                        <div class="form-group mb30 row">
                            <label class="col-2"></label>
                            <div class="col-8">
                                <button onclick="int()" class="btn btn-success normal-btn">
                                    保存送餐地址
                                </button>
                            </div>
                        </div>
                </section>
            </article>
        </section>
                <script src="Shop/js/easydialog.min.js"></script>
                <script src="Shop/js/zeroModal.js"></script>
                <!-- 城市级联 -->
                <script type="text/javascript">
                    jQuery.ajax({
                        url:'/member_addrlist',               //请求地址
                        type:'post',                //请求方式
                        async:true,                 //是否异步
                        data:{upid:0},          //发送的数据
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        dataType:'json',            //响应的数据类型
                        success:function(data){     //成功回调函数
                            console.log(data);
                            for (var i = 0; i < data.length; i++) {
                                jQuery('#cid').append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                            };
                        },
                        error:function(){
                            alert('ajax请求失败1'); //失败回调
                        }
                    });

                    jQuery("select[name=sele]").live('change',function(){
                        jQuery(this).nextAll("select").remove();
                        var ob = jQuery(this);

                        jQuery.ajax({
                            url:'/member_addrlist',               //请求地址
                            type:'post',                //请求方式
                            async:true,                 //是否异步
                            headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            },
                            data:{upid:(jQuery(this).val())},    //发送的数据
                            dataType:'json',            //响应的数据类型
                            success:function(data){     //成功回调函数
                                // console.log(data);
                                if(data.length>0){
                                    var select = jQuery("<select name='sele' style='width:100px;'><option value='-1'>--请选择--</option></select>")
                                    for (var i = 0; i < data.length; i++) {
                                        jQuery(select).append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                                    };
                                    ob.after(select);
                                }else{
                                    
                                    var sele = jQuery("select[name=sele]:last").val();
                                    
                                    if(sele > 1){
                                        jQuery("#div1").css('display','block');
                                    }else{
                                        jQuery("#div1").css('display','none');
                                        jQuery("#div1 > input").val('');
                                    }
                                }

                            },
                            error:function(){
                                alert('ajax请求失败');  //失败回调
                            }
                        });
                    });
                </script>
                 <script type="text/javascript">
                    jQuery.ajax({
                        url:'/member_addrlist',               //请求地址
                        type:'post',                //请求方式
                        async:true,                 //是否异步
                        data:{upid:0},          //发送的数据
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        dataType:'json',            //响应的数据类型
                        success:function(data){     //成功回调函数
                            console.log(data);
                            for (var i = 0; i < data.length; i++) {
                                jQuery('#bid').append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                            };
                        },
                        error:function(){
                            alert('ajax请求失败1'); //失败回调
                        }
                    });
                    var dids = '';
                    jQuery("select[name=sele1]").live('change',function(){
                        jQuery(this).nextAll("select").remove();
                        var ob = jQuery(this);

                        jQuery.ajax({
                            url:'/member_addrlist',               //请求地址
                            type:'post',                //请求方式
                            async:true,                 //是否异步
                            headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            },
                            data:{upid:(jQuery(this).val())},    //发送的数据
                            dataType:'json',            //响应的数据类型
                            success:function(data){     //成功回调函数
                                // console.log(data);
                                if(data.length>0){
                                    var select = jQuery("<select name='sele1' style='width:100px;'><option value='-1'>--请选择--</option></select>")
                                    for (var i = 0; i < data.length; i++) {
                                        jQuery(select).append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                                    };
                                    ob.after(select);
                                }else{
                                    
                                    dids = jQuery("select[name=sele1]:last").val();

                                    var sele = jQuery("select[name=sele1]:last").val();
                                    if(sele > 1){
                                        jQuery("#div2").css('display','block');
                                    }else{
                                        jQuery("#div2").css('display','none');
                                        jQuery("#div2 > input").val('');

                                    }
                                }

                            },
                            error:function(){
                                alert('ajax请求失败');  //失败回调
                            }
                        });
                    });
                </script>
                <script type="text/javascript">
                    //增加
                    function int(){
                        var name = jQuery("input[name=name]").val();
                        var contact = jQuery("input[name=contact]").val();
                        var addr = jQuery("input[name=address]").val();
                        var num = jQuery("#tabname tr").length;
                       
                        if(num < 9){
                        if(!name){
                            jQuery("#names1").css('display','block');
                        }else{
                            jQuery("#names1").css('display','none');
                        }

                        if(contact && /^1[3|4|5|8]\d{9}$/.test(contact)){
                            jQuery("#phone").css('display','none');
                            var phone = contact;
                        } else{
                            jQuery("#phone").css('display','block');
                        }
                        if(!addr){
                            jQuery("#addr1").css('display','block');
                        }else{
                            jQuery("#addr1").css('display','none');
                        }

                        var addreinfo = '';

                        //获取select的text值
                        jQuery("select[name=sele]").each(function()
                           {
                                addreinfo += jQuery(this).children("option:selected").text();
                           });
                           
                        if(name && addr && phone){
                            addreinfo += addr;
                            var sele = jQuery("select[name=sele]:last").val();

                           jQuery.ajax({
                                url:'/member_addradd',               //请求地址
                                type:'post',                //请求方式
                                async:true,                 //是否异步
                                data:{name:name,phone:phone,address:addreinfo,did:sele},          //发送的数据
                                headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                },
                                            //响应的数据类型
                                success:function(data){     //成功回调函数
                                    // alert(data);
                                    jQuery("#tabname tbody").prepend("<tr name='trname' id=tr"+data+"><td name=td"+data+"1>"+name+"</td><td name=td"+data+"2>"+contact+"</td><td name=td"+data+"3>"+addreinfo+"</td><td><a href='javascript:;' onclick='fun("+data+")' ng-click='editUserAddress($index)'>修改</a><a href='javascript:;' onclick='dd("+data+")'>删除</a></td></tr>");
                                   
                                    jQuery("input[name=name]").val('');
                                    jQuery("input[name=contact]").val('');
                                    jQuery("input[name=address]").val('');
                                    jQuery("#cid").val('-1');
                                    jQuery("#cid").nextAll("select[name=sele]").remove();
                                    jQuery("#div1").css('display','none');
                                    var top = jQuery('#tabname').offset().top;
                                    jQuery(window).scrollTop(top);
                                },
                                error:function(){
                                    alert('ajax请求失败1'); //失败回调
                                }
                            });
                        }
                    }else{
                        alert('最多只能有8个地址');
                    }
                }
                    //删除
                    function dd(id){
                        zeroModal.confirm("确定要删除吗？", function() {
                            jQuery.ajax({
                                //请求地址
                                url:"/member_addrdelete",
                                //请求方式
                                type:'post',
                                //是否异步
                                async:true,
                                //发送的数据
                                data:{id:id}, 
                                headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(){
                                    jQuery("tr[id=tr"+id+"]").remove();
                                }
                            });
                        });
                    }

                    var sid = '';
                    //修改
                    function fun(id){    
                        easyDialog.open({
                            container : 'testBox',
                            fixed : false
                        });
                        var name1 = jQuery("td[name=td"+id+"1]").text();
                        var name2 = jQuery("td[name=td"+id+"2]").text();
                        var name3 = jQuery("td[name=td"+id+"3]").text();
                        jQuery("#inp1").val(name1);
                        jQuery("#inp2").val(name2);
                        jQuery("#inp3").val(name3);
                        sid=id;
                    };
                    function sc(){
                        var name = jQuery("#inp1").val();
                        var phone = jQuery("#inp2").val();
                        if(name){
                            jQuery("#names2").css('display','none');
                        }else{
                            jQuery("#names2").css('display','block');
                        }

                        if(phone && /^1[3|4|5|8]\d{9}$/.test(phone)){
                            jQuery("#phone1").css('display','none');
                            var phones = phone;
                        } else{
                            jQuery("#phone1").css('display','block');
                        }

                         var address = jQuery("input[name=address1]").val();
                         dids;
                         var addreinfo1 = '';
                         if(address){
                             jQuery("select[name=sele1]").each(function()
                            {
                                addreinfo1 += jQuery(this).children("option:selected").text();
                            });
                                addreinfo1 += address;
                                jQuery("td[name=td"+sid+"3]").text(addreinfo1);
                        }
                        if(name && phones){
                           
                             jQuery.ajax({
                                //请求地址
                                url:"/member_addrupdate",
                                //请求方式
                                type:'post',
                                //是否异步
                                async:true,
                                //发送的数据
                               
                                    data:{name:name,phone:phones,id:sid,address:addreinfo1,did:dids}, 
                             
                                headers:{
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(){
                                    jQuery("#phone1").css('display','none');
                                    jQuery("#names2").css('display','none');

                                    // alert(addreinfo1);
                                    jQuery("td[name=td"+sid+"1]").text(name);
                                    jQuery("td[name=td"+sid+"2]").text(phone);

                                    jQuery('#times').trigger("click");
                                    alert('修改成功');
                                    // $('testBox').getElementsByTagName('button')[0].onclick = function(){
                                    //     easyDialog.close();
                                    // }
                                }
                            });
                        }
                    }
                    var $ = function(){
                        return document.getElementById(arguments[0]);
                    };

                     $('testBox').getElementsByTagName('a')[0].onclick = function(){
                        easyDialog.close();
                    }
                    
                </script>

                </article>
            </div>
        </section>

            </div>
        </section>

            <footer id="footer">
            <div class="footer-first gray">
                <div class="company-info clearfix fs14 gray">
                    <a href="about.html" target="_blank"  rel="nofollow">关于我们</a>
                    <a href="help.html" target="_blank"  rel="nofollow">帮助中心</a>
                    <a href="javascript:;" target="_blank"  rel="nofollow">法律声明</a>
                    <a href="jobs.html" target="_blank"  rel="nofollow">人才招聘</a>
                    <a href="contact.html" target="_blank"  rel="nofollow">联系我们</a>
                    <a href="javascript:;" user-feedback ng-click="userFeedback=true" class="last" rel="nofollow">意见反馈</a>
                    <a href="javascript:;" class="last" target="_blank" style="display:none">上海餐厅导航</a>
                </div>
            </div>
            <div class="footer-last">
                <a target="_blank" class="foot-logo-1 base-logo" href="index.html"></a>
                <div class="tc fs14 light-gray mb10">
                  ©2014 waimaichaoren.com All Rights Reserved - 沪ICP备11019908号
                </div>
            </div>
        </footer>


        <dh-dialog class="disnone" height="500" feeedbackclass="userFeedback" type="user-feedback" header="意见反馈" show="userFeedback">
            <div ng-controller="feedbackCtrl">
                <form novalidate="true" name="feedbackForm" class="inline">
                    <div class="form-group row mb10">
                        <label class="col-3">联系方式：</label>
                        <div class="col-8">
                            <input type="text" maxlength="20" name="userContact" required ng-focus="userContactFocus()" ng-class="{error:feedback.phoneMessage}" placeholder="请输入您的手机号码" ng-model="feedback.userContact"/>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="clo-8 col-offset-3" ng-if="feedback.phoneMessage">
                            <span class="vaildate-error">联系方式不能为空</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 vt">反馈信息：</label>
                        <div class="col-8">
                            <textarea name="feedbackMessage"  placeholder="可以说说您对外卖超人的意见" ng-focus="feedbacFocus()" required ng-class="{error:feedback.feedbackMessageTip}" ng-model="feedback.feedbackMessage" maxlength="300" cols="25" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="clo-8 col-offset-3" ng-if="feedback.feedbackMessageTip">
                            <span class="vaildate-error">反馈信息不能为空</span>
                        </div>
                    </div>
                    <div class="tc">
                        <button class="btn normal-btn btn-success" ng-click="feedbackSubmit()">确认</button>
                        <button class="btn normal-btn btn-cancel" ng-click="feedbackCancel()">取消</button>
                    </div>
                </form>
            </div>
            <div class="common-dialog-footer">
                咨询加QQ群：337212031
            </div>
        </dh-dialog>

        <dh-dialog class="disnone" type="alert" index="1001" header="" show="errorShow">
            <div class="alert-box error">
                <p ng-bind="errorMsg"></p>
            </div>
        </dh-dialog>
        <dh-dialog class="disnone" type="alert" index="1002" header="" show="confirm">
            <div class="alert-box warning">
                <p ng-bind="confirmMsg" class="mb10"></p>
                <div>
                    <button class="btn btn-success small-btn" ng-click="submitConfirm()">确认</button>
                    <button class="btn btn-cancel small-btn" ng-click="cancelConfirm()">取消</button>
                </div>
            </div>
        </dh-dialog>
        <dh-dialog class="disnone" header="修改地址" width="420" show="showEditUserAddress">
            <div ng-controller="userAddressCtrl">
                <form novalidate="true" name="editUserAddressForm" class="address-from">
                <div class="form-group row mb20">
                    <label class="require col-3">收单人：</label>
                    <div class="col-8">
                        <input type="text" required maxlength="10"
                               ng-class="{error:editUserAddressForm.submit && editUserAddressForm.name.$invalid}" name="name"
                               placeholder="您的称呼" ng-model="editUserAddress.customer_name">
                    </div>
                    <div class="col-8 col-offset-3" ng-if="editUserAddressForm.submit && editUserAddressForm.name.$invalid">
                        <span class="vaildate-error">称呼不能为空</span>
                    </div>
                </div>
                <div class="form-group row mb20">
                    <label class="require col-3">手机号码：</label>
                    <div class="col-8">
                        <input type="text" maxlength="11" required mobile
                               ng-class="{error:editUserAddressForm.submit && editUserAddressForm.contact.$invalid}" name="contact"
                               placeholder="您的联系方式" ng-model="editUserAddress.customer_phone">
                    </div>
                    <div class="col-8 col-offset-3" ng-if="editUserAddressForm.submit && editUserAddressForm.contact.$error.required">
                        <span class="vaildate-error">联系方式不能为空</span>
                    </div>
                    <div class="col-8 col-offset-3" ng-if="editUserAddressForm.submit && !editUserAddressForm.contact.$error.required && editUserAddressForm.contact.$error.mobile">
                        <span class="vaildate-error">请输入正确的11位手机号码</span>
                    </div>
                </div>
                <div class="form-group row mb30">
                    <label class="require col-3">送餐地址：</label>
                    <div class="col-8">
                        <input type="text" required
                               name="address"
                               placeholder="详细地址，如武定西路1189号606室" >
                    </div>
                    <div class="col-8 col-offset-3" ng-if="editUserAddressForm.submit && editUserAddressForm.address.$invalid">
                        <span class="vaildate-error">送餐地址不能为空</span>
                    </div>
                </div>
                <div class="form-group tc">
                    <button class="btn btn-success normal-btn" ng-click="submitUserAddress()">确认</button>
                    <button class="btn btn-cancel normal-btn" ng-click="cancelUserAddress()">取消</button>
                </div>
            </form>
            </div>
        </dh-dialog>

         <ul class="site-fixed">
            <li class="scroll-top"><img src="<?php echo e(asset('Shop/images/scroll_top1.png')); ?>" alt=""/> </li>
            <li class="scorll-feekback" ng-click="userFeedback=true">
                <img src="<?php echo e(asset('Shop/images/scorll_feekback.png')); ?>" alt=""/>
                <div>意见反馈</div>
            </li>
            <li class="scroll-wx">
                <img src="<?php echo e(asset('Shop/images/scroll_wx.png')); ?>" alt=""/>
                 <div><img src="<?php echo e(asset('Shop/images/wx.png')); ?>" alt=""/></div>
            </li>
        </ul>

        <script type="text/javascript" src="<?php echo e(asset('Shop/js/angular.min.js')); ?>"></script>
        <script src="<?php echo e(asset('Shop/js/common.js')); ?>"></script>


        <script src="<?php echo e(asset('Shop/js/service.js')); ?>"></script>

        <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
        <!--[if lt IE 9]><script src="<?php echo e(asset('Shop/js/fix.js')); ?>"></script><![endif]-->



        <script src="<?php echo e(asset('Shop/js/user_center_address.js')); ?>"></script>


        <script>angular.bootstrap(document, ["app"]);</script>

        <!-- Baidu Analytics -->


    </body>
</html>
