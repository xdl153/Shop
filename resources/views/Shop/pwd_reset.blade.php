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
        <title>密码重置</title>
        <script type="text/javascript">

            (function(document, screen) {
                if (screen.width < 760) {
                    document.location.href="/mobile/";
                }
            }(document, screen));
        </script>
    </head>
        <section class="main">
            <div class="common-width">

                <div class="main-inner">
                    <div class="passwd-nav-box">
                        <ol class="passwd-nav">
                            <li class="first ">
                                <span><i>1</i><em>身份验证</em></span>
                            </li>
                            <li class="middle done">
                                <span><i>2</i><em>重设登录密码</em></span>
                            </li>
                            <li class="last ">
                                <span><i>3</i><em>完成</em></span>
                            </li>
                        </ol>
                    </div>

                    
                        <div class="fill-data-box" id="passStep">
                            <div class="fill-data">
                                <div class="title txt-center"><span id="spanhaoma"></span></div>
                                <div class="form-group w275">
                                    <input type="password" maxlength="10" id="pass1"placeholder="请输入6-10位的新密码" value=""/>
                                </div>
                                <div class="form-error-message"></div>
                                <div class="form-group w275">
                                    <input type="password" maxlength="10" id="pass2" placeholder="请再次输入新密码"/>
                                </div>
                                <div class="form-error-message"></div>
                                <div>
                                    <button id="xgmima" class="form-btn" id="confirm">确认</button>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            
        <div style="height:180px;">
        </div>
        </section>
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

        <!-- Baidu Analytics -->

    <!-- End Baidu Tracking Code -->


    </body>
</html>