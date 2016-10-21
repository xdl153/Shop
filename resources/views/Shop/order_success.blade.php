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
        <link rel="icon" type="image/png" href="images/favicon.ico"/>

        <script type="text/javascript">

            (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
        </script>

        <link rel="stylesheet" href="{{ asset('Shop/css/common.css') }}"/>

        <link rel="stylesheet" href="{{ asset('Shop/css/confirm.css') }}"/>

        <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
        <!--[if lt IE 9]>
        <script src="{{ asset('Shop/js/respond.js') }}') }}"></script>
        <script>
            var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
             var i= e.length;while (i--){document.createElement(e[i])}
        </script>
        <![endif]-->
        <title>下订单成功</title>
    </head>
    <body class="day " ng-controller="bodyCtrl"  day-or-night>
        <section class="common-back" id="wrapBackground">

                <header id="header">
                    <div class="common-width clearfix">
                        <h1 class="fl">
                            <a class="logo base-logo" href="/">外卖超人</a>
                        </h1>
                    </div>
                </header>

            <div id="main-box">
                 <!--二维码-->
                <div class="qrCode-frame" ng-hide="qrCodeStatus">
                    <img src="{{ asset('Shop/images/wx.png') }}" alt="扫描二维码" />
                    <em ng-click="qrCodeStatus=true">X</em>
                </div>

                <div ng-controller="colorAction">
                    <div class="dayColor_two"></div>
                    <div class="dayColor_one"></div>
                    <div class="dayColor_three" ng-class="{dayColor_threeActive:threeActive}"></div>
                </div>


            <section class="confirm-main common-width clearfix">
            <div class="confirm-content fl">
                <div class="content">
                    <h3>订单已成功提交</h3>
                    @if(session('username'))
                    <p><h4>请保持手机{{ session('username') }}畅通，稍后超人客服或餐厅会与您联系。</h4></p>
                    @else
                    <p>请保持手机畅通，稍后超人客服或餐厅会与您联系。</p>
                    @endif
                    <p>感谢使用外卖超人。</p>
                    <h4><a href="/" class="order">回到首页</a></h4>
                </div>
            </div>
            <div class="app_download fl">
                <h4>下载外卖超人手机App</h4>
                <p>用手机扫描下方二维码</p>
                <p><img src="{{ asset('Shop/images/confirm_code.png') }}" alt="App二维码" class="code-img"/></p>
                <p>或电脑直接下载</p>
                <div class="down-btn">
                    <a href="/marketing/imessage/" target="_blank" class="ios" title="iOS下载">iOS下载</a>
                    <a href="/marketing/android/andriud.apk" target="_blank" class="Android" title="Android下载">Android下载</a>
                </div>
                <p>也可以从各大应用市场搜索下载外卖超人</p>
                <div class="chaoren-weixin">
                    <img src="{{ asset('Shop/images/confirm_code_small.png') }}" class="code-img"/>
                    <p>关注外卖超人微信公共账号微信也可以订外卖</p>
                </div>
            </div>
        </section>

        <!--one tip-->


            <div class="common-layer" id="layer-tip"></div>
            <div id="gift-tip" class="gift-tip">
                <em ng-click="closeTip()"></em>
                <div>
                    您获得了饮料果汁一瓶！
                    <!--<p>您可以查看<a href="/account/gift/center/">氪星礼品站</a></p>-->
                </div>
            </div>



            </div>
        </section>

            <footer id="footer">
            <div class="footer-first gray">
                <div class="company-info clearfix fs14 gray">
                    <a href="/about_us/" target="_blank"  rel="nofollow">关于我们</a>
                    <a href="/help/" target="_blank"  rel="nofollow">帮助中心</a>
                    <a href="/terms-and-conditions/" target="_blank"  rel="nofollow">法律声明</a>
                    <a href="/jobs/" target="_blank"  rel="nofollow">人才招聘</a>
                    <a href="/contact/" target="_blank"  rel="nofollow">联系我们</a>
                    <a href="javascript:;" user-feedback ng-click="userFeedback=true" class="last" rel="nofollow">意见反馈</a>
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

         <ul class="site-fixed">
            <li class="scroll-top"><img src="{{ asset('Shop/images/scroll_top1.png') }}" alt=""/> </li>
            <li class="scorll-feekback" ng-click="userFeedback=true">
                <img src="{{ asset('Shop/images/scorll_feekback.png') }}" alt=""/>
                <div>意见反馈</div>
            </li>
            <li class="scroll-wx">
                <img src="{{ asset('Shop/images/scroll_wx.png') }}" alt=""/>
                 <div><img src="{{ asset('Shop/images/wx.png') }}" alt=""/></div>
            </li>
        </ul>

        <script type="text/javascript" src="{{ asset('Shop/js/angular.min.js') }}"></script>
        <script src="{{ asset('Shop/js/common.js') }}"></script>


        <script src="{{ asset('Shop/js/service.js') }}"></script>

        <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
        <!--[if lt IE 9]><script src="{{ asset('Shop/js/fix.js') }}"></script><![endif]-->


    <script src="{{ asset('Shop/js/confirm.js') }}"></script>


        <script>angular.bootstrap(document, ["app"]);</script>

        <!-- Baidu Analytics -->


    </body>
</html>
