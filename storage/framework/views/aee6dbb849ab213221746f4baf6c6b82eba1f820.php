    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <title>登录 | 外卖超人</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta dynamic-meta name="keywords" content="外卖—网上订餐_外卖_外卖超人订餐官网">
    <meta name="description" content="上海外卖超人专业品质外卖网，饿了么，饿了定外卖就上外卖超人。覆盖全市各大热门商圈,为您实时提供周边外卖网上订餐服务.中餐,快餐,西餐,茶点,各色料理,助您本地美食全搜罗!" />
    <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('Shop/static/css/reset.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('Shop/static/css/common.css')); ?>"/>
    <script src="<?php echo e(asset('Shop/js/jquery-1.8.3.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('Shop/static/css/login.css')); ?>"/>
    

    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="<?php echo e(asset('Shop/static/css/frontPage-ie8-fix.css')); ?>" /><![endif]-->
    <!--[if lte IE 10]><script>document.createElement('footer');document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');</script><![endif]-->
    <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
    <script type="text/javascript">
        
        (function(document, screen) {
            if (screen.width < 760) {
                document.location.href="/mobile/";
            }
        }(document, screen));
    </script>
</head>
<body>

<header id="header" class="">
    <div class="common-width">
        
        <section class="clearfix">
            <h1 class="logo" title="外卖超人">
                <a href="http://waimaichaoren.com/">外卖超人</a>
            </h1>
            <span class="page-name">登录 | 注册</span>
        </section>
        
        
    </div>
</header>

<section class="main">
    <div class="common-width">
    <div class="main-inner">
        
            <div class="login-register">
                <div class="login_tab" id="loginTab">
                   
                    <?php if($_GET['status'] == '1'): ?>
                        <span id="dlaa" class="login-btn active">登录</span><span id="zcaa" class="register-btn ''">注册</span>
                    <?php else: ?>
                        <span class="login-btn ">登录</span><span class="register-btn active">注册</span>
                    <?php endif; ?>
                </div>

                <div class="log-box hide show " id="loginPageBox" <?php if($_GET['status'] == '1'): ?>
                        style="display: block;"
                    <?php else: ?>
                        style="display: none;"
                    <?php endif; ?> >
                    <div class="login-header"></div>
                    <div class="form-group w275">
                        <label for="lPhone">手机号码</label>
                        <span class="fs12 fr">没有注册 ？ <a href="<?php echo e(URL('/login?id=786&status=2')); ?>" class="yo">立即注册</a></span>
                        <input id="lPhone" maxlength="11" type="text" class="form-text" placeholder="输入您的手机号码"/></label>
                    </div>
                    <div class="form-error-message"></div>
                    <div class="form-group w275">
                        <label  for="lPass" >登录密码</label>
                        <input id="lPass" maxlength="10" type="password" class="form-text" onpaste="return false" placeholder="请输入登录密码"/>
                    </div>
                    <div class="form-error-message"></div>
                        
                        <div class="form-group captcha clearfix">
                        
                        <input id="lCaptcha" type="text" class="form-text" placeholder="请输入验证码"/>
                        <span><img class="captchaImg" _src="/captcha/" src="/captcha/" alt="验证码"/></span>
                        </div>
                        <div class="form-error-message"></div>
                        <div class="form-group checkbox clearfix">
                            <label class="fl fs12">
                                <i id="lRemember" class="lRemember"></i><span>记住我</span>
                            </label>
                            <!--<label class="fl fs12">-->
                                <!--<input id="lRemember" type="checkbox" value="true"> 记住我-->
                            <!--</label>-->
                            <span class="fr fs12"><a class="yo" target="_black" href="">忘记密码</a></span>
                        </div>
                        <div>
                            <button id="dldl" onclick="login();" class="form-btn">登录</button>
                        </div>
                        <div class="code-box clearfix">
                            <img src="<?php echo e(asset('Shop/static/img/downLodNew.png')); ?>" style="width: 262px;height: 93px;margin-left: 15px;" />
                        </div>
                    </div>

                <div class="log-box hide ''" id="registerPageBox" <?php if($_GET['status'] == '1'): ?>
                        style="display: none;"
                    <?php else: ?>
                        style="display: block;"
                    <?php endif; ?> >
                    <div class="form-group w275">
                        <label for="">手机号码</label>
                        <input type="text" id="aaa" maxlength="11" class="form-text" placeholder="请输入你的手机号码" />
                    </div>
                    <div class="form-error-message"></div>

                    <div class="captcha-wrap">
                        <div class="captcha-box" id="captchaBox" style="margin-left: -300px">
                            <div class="captcha-item">
                                <div class="form-group captcha clearfix">
                                    <input type="text" id="rCaptcha" class="form-text" placeholder="短信验证码"/>
                                    <input type="button" id="getCaptcha"  class="captcha-btn" value="获取验证码"/>
                                </div>
                                <div class="form-error-message"></div>
                            </div>
                            <div class="captcha-item">
                                <div class="form-group captcha clearfix">
                                    <input type="text" id='abc' style="width: 140px;" maxlength="4" class="form-text" placeholder="输入验证码"/><button id="yzmyzm" style="width: 130px;margin: 0;height: 43px;background: #7fc11c;font-size: 16px;border: none;color: white;cursor: pointer;border-radius: 2px;font-family: "Microsoft YaHei";">获取验证码</button>
                                </div>
                                <div class="form-error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group w275">
                        <label for="">登录密码</label>
                        <input type="password"  id="pwd1" maxlength="10" class="form-text" onpaste="return false" placeholder="输入登录密码 6-10个字符和数字"/>
                    </div>
                    <div class="form-error-message"></div>
                    <div class="form-group w275">
                        <input type="password" id="pwd2" maxlength="10" class="form-text" onpaste="return false" placeholder="输入登录密码 6-10个字符和数字"/>
                    </div>
                    <div class="form-error-message"></div>

                    <div class="checkbox form-group clearfix mb5">
                        <i id="rAgree" class="loginChecked"></i>
                        <!--<input type="checkbox" checked="checked" id="rAgree" value="true">-->
                        <label for="rAgree" class="fs12">我同意外卖超人</label>
                        <span class="fs12"><a class="yo" target="_blank" href="http://waimaichaoren.com/terms-and-conditions/">"注册条款"</a></span>
                    </div>
                    <div class="form-error-message"></div>
                    <div>
                        <button class="form-btn"  id="button">确认注册</button>
                    </div>
                    
                </div>
            </div>
        
    </div>

    </div>
</section>
<footer id="footer">
    <div class="footer-first gray">
        <div class="company-info clearfix fs14 gray">
            <a href="http://waimaichaoren.com/about_us/" target="_blank"  rel="nofollow">关于我们</a>
            <a href="http://waimaichaoren.com/help/" target="_blank"  rel="nofollow">帮助中心</a>
            <a href="http://waimaichaoren.com/terms-and-conditions/" target="_blank"  rel="nofollow">法律声明</a>
            <a href="http://waimaichaoren.com/jobs/" target="_blank"  rel="nofollow">人才招聘</a>
            <a href="http://waimaichaoren.com/contact/" target="_blank"  rel="nofollow">联系我们</a>
            <a href="http://waimaichaoren.com/link/" class="last" target="_blank"  rel="nofollow">友情链接</a>
            <a href="/restaurant/list/shanghai/1/" class="last" target="_blank" style="display:none">上海餐厅导航</a>
        </div>
    </div>
    
<div class="friendly_link">
	<div class="friendly_link_center clearfix">
	    <label><a href="/link/" target="_blank">友情链接：</a></label>
	    <ul>
            
                <li class="ellipsis"><a href= "http://www.xinshishen.com/" target="_blank" title="心食神"> 心食神</a></li>
            
                <li class="ellipsis"><a href= "http://www.fancai.com/mingdian/" target="_blank" title="饭菜网"> 饭菜网</a></li>
            
                <li class="ellipsis"><a href= "http://www.wines-info.com/link/" target="_blank" title="中国葡萄酒资讯网"> 中国葡萄酒资讯网</a></li>
            
                <li class="ellipsis"><a href= "http://123.sogou.com/" target="_blank" title="搜狗导航"> 搜狗导航</a></li>
            
                <li class="ellipsis"><a href= "http://hao.360.cn/" target="_blank" title="360导航"> 360导航</a></li>
            
                <li class="ellipsis"><a href= "http://se.360.cn/" target="_blank" title="360安全浏览器"> 360安全浏览器</a></li>
            
                <li class="ellipsis"><a href= "http://www.meichubang.com" target="_blank" title="美厨邦菜谱"> 美厨邦菜谱</a></li>
            
                <li class="ellipsis"><a href= "http://www.cncn.com/meishi/" target="_blank" title="欣欣美食"> 欣欣美食</a></li>
            
                <li class="ellipsis"><a href= "http://www.hua.com/" target="_blank" title="中国鲜花礼品网"> 中国鲜花礼品网</a></li>
            
                <li class="ellipsis"><a href= "http://www.chihao.com/" target="_blank" title="吃好网"> 吃好网</a></li>
            
                <li class="ellipsis"><a href= "http://www.yeslicake.com/" target="_blank" title="伊莎莉卡烘培网"> 伊莎莉卡烘培网</a></li>
            
                <li class="ellipsis"><a href= "http://www.ddmeishi.com/" target="_blank" title="家常菜做法大全"> 家常菜做法大全</a></li>
            
	    </ul>
	</div>
</div>

    <div class="footer-last">
        <div class="tc fs14 light-gray mb10 copyright">
            ©2014 waimaichaoren.com All Rights Reserved - 沪ICP备11019908号
        </div>
        <div class="tc h37">
            <a href="https://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&entyId=dov73ne26zbqq0ilalaocad1abxr7hlamp" target="_blank"><img src="<?php echo e(asset('Shop/static/desktop/img/ft_1.png')); ?>" alt=""></a>
        </div>
    </div>
</footer>
<input type="hidden" id="hidden" value=<?php echo e($_GET['id']); ?>>

<script type="text/javascript" src="<?php echo e(asset('Shop/static/js/jquery-1.7.2.min.js')); ?>"></script>
   
    <script>

    //    登陆
    var domain = 'http://waimaichaoren.com/';
    //    注册
    var ajax_customer_user_register_start = '/ajax/customer_user_register_start/';
    var common_sms_code = '/ajax/common_sms_code/';
    var common_validate_sms_code = '/ajax/common_validate_sms_code/';
    var ajax_customer_user_register_register = '/ajax/customer_user_register_register/';
    var userVaildate = '/ajax/user_login/';
    </script>
<script type="text/javascript" src="<?php echo e(asset('Shop/static/js/module/loginVaildate.js')); ?>"></script>

<!-- Baidu Analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "<?php echo e(asset('Shop/static/js/bd.js')); ?>' type='text/javascript'%3E%3C/script%3E"));
</script>
<!-- End Baidu Tracking Code -->

<!-- Baidu Remarketing code -->
<script type="text/javascript">
<!--
(function (d) {
window.bd_cpro_rtid="rHDzrHT";
var s = d.createElement("script");s.type = "text/javascript";s.async = true;s.src = location.protocol + "//cpro.baidu.com/cpro/ui/rt.js";
var s0 = d.getElementsByTagName("script")[0];s0.parentNode.insertBefore(s, s0);
})(document);
//-->
</script>
<!-- 登录 -->
<script src="<?php echo e(asset('Shop/js/jquery-1.8.3.min.js')); ?>"></script>
<script>
    var hiddenid = $('#hidden').val();
    $("#yzmyzm").html("获取验证码");
    $("#yzmyzm").click(function(){
        
        var sj = $("#aaa").val();
        if(sj == ''){
            $("#yzmyzm").html("请输入手机号码");
        }else{
            if(!(/^1[34578]\d{9}$/.test(sj))){
                    $("#yzmyzm").html("请输入正确的手机号码");
            }else{
                $.ajax({
                    url:'/code',
                    type:'post',
                    async:true,
                    data:{id:sj},
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                            if(data === 'y'){
                                $("#yzmyzm").html("验证码已发送");
                                $("#yzmyzm").attr("disabled", true);
                             
                            }
                    },
                    error:function(){
                            alert('失败');
                    }
                })
            }
        }
    });

  

$("#button").click(function(){
    var code = $("#abc").val();
    var pass1 = $('#pwd1').val();
    var pass2 = $('#pwd2').val();
    var sj = $('#aaa').val();
    if(sj !== ''){
        $.ajax({
            url:'/demandcode',
            type:'post',
            async:true,
            data:{code:code},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(a){
                    if(a === 'y'){
                        if(pass1 !== '' && pass2 !== ''){
                            if(pass1 === pass2){
                                $.ajax({
                                    url:'/enroll',
                                    type:'post',
                                    async:true,
                                    data:{user:sj,pwd :pass2},
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success:function(b){
                                        if( b === 'y'){
                                            location.href = "/login?id="+hiddenid+"&status=1";
                                        }
                                    },
                                    error:function(){
                                            alert('ajax失败');
                                    }
                                });
                            }else{
                                $("#button").html("两次密码输入不一致");
                            }
                        }else{
                            $("#button").html("请输入密码");
                        }
                    }else{
                        $("#button").html("验证码错误");
                    }
            },
            error:function(){
                    alert('ajax失败');
            }
        })
    }else{
        $("#button").html("请输入手机号码");
    }
});
</script>
<script>

    function login(){
         var name = $("#lPhone").val();
         var password = $("#lPass").val();
         $.ajax({
            url:'/dologin',
            type:'post',
            async:true,
            data:{name:name,password:password},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(a){
                if( a === 'y'){
                $("#dldl").html("正在登录请稍等");
                //获取地址ID值
                    
                    var hiddenid = $('#hidden').val();

                    //跳转到店铺列表
                    location.href = "/shop_list?id="+hiddenid+"";

                }else{
                    $("#dldl").html("账号密码错误");
                }
            },
            error:function(){
                alert('ajax失败');
            }
     });
   }
</script>
<!-- 登录 -->

</body>
</html>
