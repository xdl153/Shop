<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
        <link rel="stylesheet" type="text/css" href="{{ asset('Shop/css/reset.css') }}" />
        <link rel="stylesheet" href="{{ asset('Shop/css/common.css') }}"/>

        <link rel="stylesheet" href="{{ asset('Shop/css/forget_passwd.css') }}"/>

        <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/frontPage-ie8-fix.css" /><![endif]-->
        <!--[if lte IE 10]><script>document.createElement('footer');document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');</script><![endif]-->
        <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
        <title>密码设置成功</title>
        <script type="text/javascript">

            (function(document, screen) {
                if (screen.width < 760) {
                    document.location.href="/mobile/";
                }
            }(document, screen));
        </script>
    </head>
    <body onload="test();">

        <header id="header" class="">
            <div class="common-width">

                    <section class="clearfix">
                        <h1 class="logo" title="外卖超人">
                            <a href="index.html"></a>
                        </h1>
                        <span class="page-name"> | 找回密码</span>
                    </section>


            </div>
        </header>

        <section class="main">
            <div class="common-width">

                <div class="main-inner">
                    <div class="passwd-nav-box">
                        <ol class="passwd-nav">
                            <li class="first ">
                                <span><i>1</i><em>身份验证</em></span>
                            </li>
                            <li class="middle ">
                                <span><i>2</i><em>重设登录密码</em></span>
                            </li>
                            <li class="last done">
                                <span><i>3</i><em>完成</em></span>
                            </li>
                        </ol>
                    </div>

                    <div class="fill-data-box end-step" id="endStepPhone">
                        <div class="fill-data clearfix">
                            <div class="log-success"></div>
                            <div class="log-content">
                                <p style="font-size: 30px">新密码设置成功！请牢记您的密码</p>
                                <p>正在登录还有<span id="sj" style="color:red;font-size: 40px"></span><span style="color: red;font-size: 30px">秒</span>跳转到首页请稍等！</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        <div style="height:180px;">
        </div>
        </section>
        <footer id="footer">
            <div class="footer-first gray">
                <div class="company-info clearfix fs14 gray">
                    <a href="/about_us/" target="_blank"  rel="nofollow">关于我们</a>
                    <a href="/help/" target="_blank"  rel="nofollow">帮助中心</a>
                    <a href="/terms-and-conditions/" target="_blank"  rel="nofollow">法律声明</a>
                    <a href="/jobs/" target="_blank"  rel="nofollow">人才招聘</a>
                    <a href="/contact/" class="last" target="_blank"  rel="nofollow">联系我们</a>
                    <a href="/restaurant/list/shanghai/1/" class="last" target="_blank" style="display:none">上海餐厅导航</a>
                </div>
            </div>
            <div class="footer-last">
                <a target="_blank" class="foot-logo-1 base-logo" href="index.html"></a>
                <div class="tc fs14 light-gray mb10">
                  ©2014 waimaichaoren.com All Rights Reserved - 沪ICP备11019908号
                </div>
            </div>
        </footer>


        <script type="text/javascript" src="{{ asset('Shop/js/jquery-1.7.2.min.js') }}"></script>

        <script>
            var mobile_validate_url = '/ajax/common_validate_sms_code/',
                email_validate_url = '',
                finish_send_mail_url = '',
                password_reset_url = '/account/password/reset_page/',

                password_timeout_url = '/account/password/request_timeout/',
                reset_password_url = '/ajax/password_reset_via_mobile_reset/',
                password_reset_done = '/account/password/reset_done/',

                captcha_url = '/captcha/',

                ajax_password_reset_via_mobile_start = '/ajax/password_reset_via_mobile_start/',
                common_sms_code = '/ajax/common_sms_code/'
        </script>
        <script src="{{ asset('Shop/js/forget_passwd.js') }}"></script>
        <script src="{{ asset('Shop/js/jquery-1.8.3.min.js') }}"></script>
        <script>
            var countdown = 6;
            function test(){
                if(countdown !== 0){
                    $("#sj").html(countdown);
                    countdown--;
                }
                setTimeout(function(){
                    test();
                },1000)
                if(countdown == 0){
                    location.href = "/";
                }
            }

        </script>
        <!-- Baidu Analytics -->

    <!-- End Baidu Tracking Code -->

    </body>
</html>