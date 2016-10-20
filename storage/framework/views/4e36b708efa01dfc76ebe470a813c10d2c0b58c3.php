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

        <link rel="stylesheet" href="<?php echo e(asset('Shop/css/user_center.css')); ?>"/>

        <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
        <!--[if lt IE 9]>
        <script src="<?php echo e(asset('Shop/js/respond.js')); ?>"></script>
        <script>
            var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
             var i= e.length;while (i--){document.createElement(e[i])}
        </script>
        <![endif]-->
        <title>个人中心 - 我的收藏</title>
    </head>
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
    
                                    function exit(){
                                        var hiddenid = $('#hidden').val();
                                        $.ajax({
                                           url:'/logout',
                                           type:'post', 
                                           async:true,
                                           headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                           },
                                           success:function(a){
                                            if( a === 'y'){
                                                location.reload();
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
                        <li class="active">
                            <a href="/member_collect?id=<?php echo e($_GET['id']); ?>" rel="nofollow">我的收藏</a>
                        </li>
                        <li>
                            <a href="/member_addr?id=<?php echo e($_GET['id']); ?>"  rel="nofollow">地址管理</a>
                        </li>
                    </ul>
                </aside>
                <article class="fl user-center-main">
                    <header>收藏的餐厅</header>


            <ul class="favorite clearfix transform-style">
                    
                  
                    <?php if($business['0']): ?>
                    <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($in->status == 1 && $in->examine == 2): ?>
                    <li class="restaurant-item fl trans" name="li<?php echo e($in->id); ?>">
                        <div class="img-box fl">
                            <a href="shop_detail?id=<?php echo e($_GET['id']); ?>&bid=<?php echo e($in->id); ?>"><img src="Shop/<?php echo e($in->photo); ?>" width="82px" height="82px"></a>
                        </div>
                        <article class="restaurant-introduce fl">
                            <h3 class="ellipsis"><a href="/shanghai/ji-xiang-hun-tun-gao-an-lu-dian/menu/"><?php echo e($in->name); ?></a></h3>
                            <dl class="clearfix">
                                <dt class="fl"><?php echo e($in->cname); ?></dt>
                                <dd class="r-small-star fl">
                                    <div class="r-small-star score" style="width:<?php echo e($in->grade); ?>px"></div>
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                 <dt class="fl">派送范围：</dt>
                                <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php $__currentLoopData = $add; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                
                                    <?php if($ad->bid == $in->id): ?>
                                    <dt class="fl"><?php echo e($ad->name); ?></dt>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </dl>
                        </article>
                        <div class="close-favorite" >
                            <input type="hidden" value="<?php echo e($in->id); ?>">
                            <a href="javascript:_confirm1(<?php echo e($in->id); ?>)">&times;</a>
                        </div>
                    </li>
                        <?php else: ?>
                        <li class="restaurant-item fl trans" name="li<?php echo e($in->id); ?>" style="background-color:#CDCDCD;">
                        <div class="img-box fl">
                            <a href="javascript:"><img src="Shop/<?php echo e($in->photo); ?>" width="82px" height="82px"></a>
                        </div>
                        <article class="restaurant-introduce fl">
                            <h3 class="ellipsis"><a href="/shanghai/ji-xiang-hun-tun-gao-an-lu-dian/menu/"><?php echo e($in->name); ?></a></h3>
                            <dl class="clearfix">
                                <dt class="fl"><?php echo e($in->cname); ?></dt>
                                <dd class="r-small-star fl">
                                    <div class="r-small-star score" style="width:<?php echo e($in->grade); ?>px"></div>
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                 <dt class="fl">派送范围：</dt>
                                <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php $__currentLoopData = $add; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                
                                    <?php if($ad->bid == $in->id): ?>
                                    <dt class="fl"><?php echo e($ad->name); ?></dt>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </dl>
                        </article>
                        <div class="close-favorite" >
                            <input type="hidden" value="<?php echo e($in->id); ?>">
                            <a href="javascript:_confirm1(<?php echo e($in->id); ?>)">&times;</a>
                        </div>
                    </li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
            </ul>
            <page show="5" total="1"></page>
            <script type="text/javascript">
                function _confirm1(id) {     
                   $.ajax({
                        url:'/member_collect',
                        type:'post',
                        async:true,
                        data:{id:id},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            $("li[name=li"+id+"]").remove();
                        },
                        error:function(){
                            alert('失败');
                        }
                    })
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

        <!--<script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
        [if lt IE 9]><script src="js/fix.js"></script><![endif]-->


        <script>
            var reviewUrl = "/mobile/ajax/order_review/",favoriteUrl = "/ajax/restaurant/0/favorite/";
        </script>
        <script src="<?php echo e(asset('Shop/js/user_center.js')); ?>"></script>


        <script>angular.bootstrap(document, ["app"]);</script>

        <!-- Baidu Analytics -->



    </body>
</html>
