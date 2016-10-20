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
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]--><title>用户查看</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
  <dl style="margin-left:80px; color:#fff">
    <dt><span class="f-18"></span> <span class="pl-10 f-12"></span></dt>
    <dd class="pt-10 f-12" style="margin-left:0"></dd>
  </dl>
<div class="pd-20">
  <table class="table" style="margin-left:-400px;margin-top:100px;">
    <tbody>
      <tr>
        <th class="text-r" style="font-size:20px;">帐号：</th>
        <td style="font-size:20px;color:red;">{{ session('adminuser')->name }}</td>
      </tr>
      <tr>
        <th class="text-r" style="font-size:20px;">邮箱：</th>
        <td style="color:pink">{{ session('adminuser')->email }}</td>
      </tr>
      <tr>
        <th class="text-r" style="font-size:20px;">地址：</th>
        <td style="color:blue">{{ session('adminuser')->address }}</td>
      </tr>
      <tr>
        <th class="text-r" style="font-size:20px;">电话：</th>
        <td style="color:yellow">{{ session('adminuser')->phone }}</td>
      </tr>
      <div><a style="font-size:50px;color:#cccc;" href="{{ URL('Admin/index') }}">Home</a></div>
          <img src="/Admin/1.png" style="width:200px;">
          <img src="/Admin/1.jpg" style="width:200px;">
    </tbody>
  </table>
</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>