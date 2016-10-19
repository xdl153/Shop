<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="description" content=" 上海[半价菜][送可乐]樱花日本料理大家都在吃什么- 好吃的菜，宋园路地铁站附近餐厅， [半价菜][送可乐]樱花日本料理外卖，外送电话，叫外卖上外卖超人。" />
    <meta name="viewport" content="user-scalable=no">
    
    <meta name="google-site-verification" content="BstJA3X9z6f9HcvoN9AZTwaKo_9Abj_j7dVBPfy640s" />
    <meta name="baidu-site-verification" content="IYCrtVH0i1" />
    <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
    <link rel="icon" type="image/png" href="{{ asset('Shop/images/favicon.ico') }}/>
    
    <script type="text/javascript">
        
        (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
    </script>
    
    <link rel="stylesheet" href="{{ asset('Shop/css/common.css') }}"/>
    
    <link rel="stylesheet" href="{{ asset('Shop/css/menuPage.css') }}"/>

    <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset('Shop/js/respond.js') }}"></script>
    <script>
        var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
         var i= e.length;while (i--){document.createElement(e[i])}
    </script>
    <![endif]-->
    <title>店铺 大家都在点</title>
</head>
<body class="day " ng-controller="bodyCtrl"  day-or-night>
    <section class="common-back" id="wrapBackground">
        
            <header id="header">
                    <div class="common-width clearfix">
                        <h1 class="fl">
                            <a class="logo base-logo" href="/">外卖超人</a>
                        </h1>

                            <ul id="member" class="member" login-box>
                                    <li><a href="shop_list?id={{ $_GET['id'] }}" class="index">首页</a></li>
                                    <li class="login-register">
                                    @if(empty(session("username")))
                                        <a href="/login?id={{ $_GET['id'] }}&status=1"  class="login"  >登录</a>
                                        <span class="cg">/</span><a href="/login?id={{ $_GET['id'] }}&status=2"  class="register">注册</a></li>
                                    @else
                                        <li class="userName">
                                                <a href="/member_index?id={{ $_GET['id'] }}" draw-user>{{ session("username") }}<em></em></a>
                                                <div>
                                                    <p><a href="/member_index?id={{ $_GET['id'] }}" >账号管理</a></p>
                                                    <p><a href="/member_addr?id={{ $_GET['id'] }}" >地址管理</a></p>
                                                    <p class="no-bo"><a  href="#" onclick="exit()">退出</a></p>
                                                </div>
                                        </li>
                                            <li><a href="/member_order?id={{ $_GET['id'] }}" class="order-center" >查看订单</a></li>
                                            <li class=""><a href="/member_collect?id={{ $_GET['id'] }}" >我的收藏</a></li>
                                            <li class=""><a  href="#" onclick="exit()">退出</a></li>
                                    @endif					
                                            <input type="hidden" value="{{ $_GET['id'] }}" id="hidden">
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
                <img src="{{ asset('Shop/images/wx.png') }}" alt="扫描二维码" />
                <em ng-click="qrCodeStatus=true">X</em>
            </div>
        
            <div ng-controller="colorAction">
                <div class="dayColor_two"></div>
                <div class="dayColor_one"></div>
                <div class="dayColor_three" ng-class="{dayColor_threeActive:threeActive}"></div>
            </div>
        
            
    <section class="menupage-main common-width" ng-init="city_name='上海'">
@foreach($bus as $b)
    <header class="nav clearfix">
        <div class="fl clearfix nav-des">
            <img src="{{ asset('Shop') }}{{ $b->photo }}" alt="{{ $b->name }}" class="fl" />
            <div class="fl nav-des-text">
                <h2 class="ellipsis" title="[半价菜][送可乐]樱花日本料理">{{ $b->name }}</h2>
                <div class="clearfix">
                    <div class="fl nav-review">
                        <div style="width:{{ $b->grade }}.00px;"></div>
                    </div>
                    <!--<p class="nav-review-x">5星</p>-->
                </div>
            </div>
        </div>
        <div class="fr clearfix nav-right">

            <div class="fl nav-right-blast line-right">
                <p>30<span style="font-size:12px;color:#999;">元</span></p>
                <span>起送</span>
            </div>

            <div class="fl nav-right-blast">
                <p>37<span style="font-size:12px;color:#999;">分钟</span></p>
                <span>送餐时间</span>
            </div>
            <div class="fl nav-right-collect line-left">

                    <div class="collect not-collect" title="收藏餐厅" data-rid="1592"></div>
                    <div class="collect-success">收藏成功</div>
                    <div id="review-text">未收藏</div>

            </div>
        </div>
    </header>
    @endforeach
<ul class="clearfix menu-nav-list" scroll-position-static="160">
    <li class="no-line "><a href="{{ URL('/shop_intro') }}?bid={{ $_GET['bid'] }}&id={{ $_GET['id'] }}">餐厅介绍</a></li>
    <li><a href="{{ URL('/shop_detail') }}?bid={{ $_GET['bid'] }}&id={{ $_GET['id'] }}">菜单</a></li>
    <li ><a href="{{ URL('/shop_comment') }}?bid={{ $_GET['bid'] }}&id={{ $_GET['id'] }}">评论</a></li>
	<!--<li  class="active"><a href="{{ URL('/shop_order') }}?bid={{ $_GET['bid'] }}&id={{ $_GET['id'] }}" id='point-tab'>大家都在点</a></li>-->
    
</ul>
        <section class="main-box clearfix">
            <div class="main fl">
                <div class="inner-main">
                    <ul class="flow-box clearfix" flow-box>
                        @foreach($list as $lis)
                            <li>
                                <div class="order-title">
                                    <span class="fr">{{ $lis->data }}</span>
                                    <i class="person-sex"></i>
                                    <b>{{ $lis->name }}</b>
                                </div>
                                <div class="order-body">
                                    @foreach($dtl as $dt)
                                    @foreach($dt as $d)
                                    @if($d->oid == $lis->id)
                                    <div class="order-body-item" order-item itemnum='1' accessorykey="{{ $d->id }}">
                                        <div class="clearfix">
                                            <span class="ellipsis name">{{ $d->cname }}</span>
                                            <span class="num">{{ $d->num }}</span>
                                            
                                            <span class="price">￥{{ $d->Price }}</span>
                                            <a href="javascript:">我也来一份</a>
                                            
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    <!--<div class="order-body-item" order-item itemnum='2' accessorykey="3734626">
                                        <div class="clearfix">
                                            <span class="ellipsis name">寿喜锅</span>
                                            <span class="num">1</span>
                                            
                                            <span class="price">￥21.00</span>
                                            <a href="javascript:">我也来一份</a>
                                            
                                        </div>
                                        
                                    </div>-->
                                    
                                    
                                </div>
                                <div class="order-footer">
                                    合计：￥<span ng-bind="allPrice['3734626']|number:2"></span><a href="javascript:" class="dis" ng-class="{eatingBtn:[[orderObj['3734626'].length>0]]}" order-id orderId="3734626">和他吃一样</a>
                                </div>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>
            <aside class="fl">
                <article class="cart" scroll-position-static="160" top="42">
                    <div class="menu-cart">
                        <header>
                            <!-- <h4 class="ellipsis w100p" title="[半价菜][送可乐]樱花日本料理">[半价菜][送可乐]樱花日本料理</h4> -->
                            <h5>
                                购物车
                                <i class="icon trash-can-icon fr " ng-click="clearCart()"></i>
                            </h5>
                        </header>
                        <section>
                            <div class="inner-cart empty" ng-class="{empty:isEmpty}">
                                <div class="cart-thead clearfix">
                                    <div class="goods-name fs16">商品名</div>
                                    <div class="goods-count fs16">份数</div>
                                    <div class="goods-price fs16">单价</div>
                                    <div class="goods-subtotal fs16">小计</div>
                                </div>
                                <div class="cart-item-list select-none">
                                    <div class="disnone" ng-class="{disnone:isEmpty}">
                                        <div class="cart-item cart-data clearfix" ng-repeat="obj in cartDatas">
                                            <div class="goods-name ellipsis" ng-bind="obj.name"></div>
                                            <div class="goods-count clearfix ellipsis">
                                                <span class="goods-sub icon sub-icon fl" sub-goods="[[$index]]"></span>
                                                <span class="goods-nums fl" ng-bind="obj.quantity"></span>
                                                <span class="goods-add icon add-icon fl" ng-click="addGoodsNum($index)"></span>
                                            </div>
                                            <div class="goods-price">￥<span ng-bind="obj.price|number:2"></span></div>
                                            <div class="goods-subtotal">￥<span ng-bind="(obj.quantity * obj.price)|number:2"></span></div>

                                            <div class="accessory-item" ng-class="{firstitem:$first}" ng-repeat="item in obj.options">
                                                <div class="cart-item clearfix">
                                                    <div class="goods-name ellipsis" ng-bind="item.name"></div>
                                                    <div class="goods-count fs20">
                                                       <span class="goods-sub fl"></span>
                                                       <span class="goods-nums fl" ng-bind="item.quantity"></span>
                                                    </div>
                                                    <div class="goods-price">￥<span ng-bind="item.price|number:2"></span></div>
                                                    <div class="goods-subtotal">￥<span ng-bind="(item.price * item.quantity)|number:2"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--附加物-->
                                        <div class="cart-item cart-item-addendum cart-data clearfix" ng-repeat="addition in additions">
                                            <div class="goods-name ellipsis" ng-bind="addition.name"></div>
                                            <div class="goods-count clearfix ellipsis">
                                                <span class="goods-nums fl" ng-bind="addition.quantity"></span>
                                            </div>
                                            <div class="goods-price">￥<span ng-bind="addition.price|number:2"></span></div>
                                            <div class="goods-subtotal">￥<span ng-bind="(addition.price * addition.quantity)|number:2"></span></div>
                                        </div>
                                        <!--附加物-->
                                    </div>
                                    <div class="cart-item-empty">暂无商品，请在左边的菜单上点单</div>
                                </div>
                                <div id="cart-item-list"></div>
                                <div class="total clearfix disnone" ng-class="{disnone:isEmpty}">
                                    <div class="fl">配送费：￥<span ng-bind="deliveryCost|number:2"></span></div>
                                    <div class="fr">合计：￥<span ng-bind="total|number:2"></span></div>
                                </div>
                                <div class="checkout">
                                    <button class="checkout btn" ng-disabled="isPlaceOrder" ng-click="createOrder()" ng-bind="createOrderBtnName">立即下单</button>
                                </div>
                            </div>
                        </section>
                    </div>
                </article>
            </aside>
        </section>
        <span id="element" style="position:absolute;display:none" class="badge">&nbsp;</span>
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
    
    <dh-dialog class="disnone" height="420" type="search-address" header="" show="searchAddress">
    <div class="search-address-dialog" ng-controller="searchAddressCtrl">
        
        <div class="search-box">
            <h2>请输入用餐地址，校验是否在配送范围</h2>
            <autocomplete-box keyword="keyword" city="city_name" callback="selectedResult(text)"></autocomplete-box>
        </div>
        <section class="street-error" ng-class="{disblock:isNotFindStreet}">
            <p>很抱歉，我们很难找到您的地址。</p>
            <p>请您检查地址拼写/格式是否正确， 或者联系我们客服获得帮助：4001-517-577</p>
        </section>
        <div class="search-address-footer">
            <ul class="clearfix">
                <li><i class="search-address-img second"></i><span>填写地址、搜索餐厅</span></li>
                <li class="arrow"><i class="icon search-address-arrow-icon"></i></li>
                <li><i class="search-address-img"></i><span>订购美食</span></li>
                <li class="arrow"><i class="icon search-address-arrow-icon"></i></li>
                <li><i class="search-address-img third"></i><span>享受美食</span></li>
            </ul>
        </div>
    </div>
</dh-dialog>

<dh-dialog class="disnone" height="550" index="1001" type="street" header="请选择最靠近你的地址" show="addressShow">
    <ul class="select-street">
        <li ng-repeat="item in shreets" ng-click="resultClick(item)">
            <i class="icon address-yellow"></i>
            <div class="shreets-item">
                <h4 ng-bind="item.name"></h4>
                <h5 ng-bind="item.address"></h5>
            </div>
        </li>
    </ul>
    <div class="street-commet">
        <p>以上列出地址都不正确么？</p>
        <p>请您检查地址拼写/格式是否正确和 <a href="javascript:void(0)" class="link" ng-click="resetStreet()">重新输入您的地址</a>。</p>
    </div>
</dh-dialog>
    
<dh-dialog class="disnone" type='login' height="500" header="登录" show="loginShow" >
    <form class="login-form" novalidate name="loginForm" ng-controller="loginCtrl">
        <div class="form-group">
            <label for="">手机号码</label>
            <div>
                <input type="text" ng-model="user.username" ng-class="{error:user.usernameMessage}" ng-focus="user.usernameMessage=''" maxlength="11" placeholder="请输入你的手机号码" />
                <span class="vaildate-error" ng-if="user.usernameMessage">
                    <span ng-bind="user.usernameMessage"></span>
                </span>
                <span class="vaildate-error" ng-if="user.isLogined">
                    该手机号码尚未注册！<a href="javascript:;" ng-click="locationRegister()" class="link">立即注册</a>
                </span>
            </div>
        </div>
        <div class="form-group mb10">
            <label for="">登录密码</label>
            <div>
                <input type="password" onpaste="return false" ng-model="user.password" ng-focus="user.passwordMessage=''"  ng-class="{error:user.passwordMessage}" maxlength="10" placeholder="请输入登录密码" />
                <span class="vaildate-error" ng-if="user.passwordMessage">
                    <span ng-bind="user.passwordMessage"></span>
                </span>
            </div>
        </div>
        <div ng-init="showCaptcha=0" ng-if="showCaptcha" class="form-group inline clearfix mb10">
            <div class="fl w50p">
                <input type="text" ng-model="user.captcha" ng-focus="user.captchaMessage=''"  ng-class="{error:user.captchaMessage}" placeholder="请输入验证码">
                <span class="vaildate-error" ng-if="user.captchaMessage">
                    <span ng-bind="user.captchaMessage"></span>
                </span>
            </div>
            <label class="fr">
                <dh-captcha change="captchaChange" src="/captcha/"></dh-captcha>
            </label>
        </div>
        <div class="clearfix mb10">
            <dh-checkbox model="user.rememberme" title="记住我" class="fl"></dh-checkbox>
            <a href="/account/password/reset_via_mobile/" target="_blank" class="fs12 fr link">忘记密码</a>
        </div>
        <button class="big-btn btn-green btn mb10" ng-click="loginVaildate()" ng-disabled="loginBtnDisabled" ng-bind="loginBtn"></button>
        <div class="clearfix">
            <span class="fr fs12">
                没有账号?
                <a href="javascript:void(0)" ng-click="locationRegister()" class="link">立即注册</a>
            </span>
        </div>
    </form>
</dh-dialog>
<dh-dialog class="disnone" type='register' height="500" header="注册" show="registerShow" >
    <form ng-controller="registerCtrl" class="register-form" name="registerForm">
        <div class="form-group mb10">
            <label for="">手机号码</label>
            <div>
                <input type="text" ng-class="{error:user.usernameMessage}" maxlength="11" placeholder="请输入您的手机号码" ng-model="user.username"/>
                <span class="vaildate-error" ng-if="user.usernameMessage">
                    <span ng-bind="user.usernameMessage"></span>
                </span>
                <span class="vaildate-error" ng-if="user.isRegistered">
                    该手机号码已经注册！<a href="javascript:;" ng-click="locationLogin()" class="link">立即登录</a>
                </span>
            </div>
        </div>



        <div class="form-group captcha-wrap">
            <div class="clearfix captcha-box">
                <div class="fl form-group captcha-item">
                    <div class="fl w50p">
                        <input type="text" ng-class="{error:user.captchaMessage}" ng-focus="user.captchaMessage=''" placeholder="请输入验证码" ng-model="user.captcha" />
                        <span class="vaildate-error" ng-if="user.captchaMessage">
                            <span ng-bind="user.captchaMessage"></span>
                        </span>
                    </div>
                    <button class="fs12 fr w40p btn btn-pink" ng-click="getCaptcha()" ng-disabled="captchaDisabled" ng-bind="captchaVal"></button>
                </div>
                <div class="fl form-group captcha-item">
                    <div class="fl w50p">
                        <input type="text" ng-model="user.imgCaptcha" maxlength="4" ng-disabled="imgCaptchaIsDisabled" ng-class="{error:user.imgCaptchaMessage}" placeholder="请输入验证码">
                        <span class="vaildate-error" ng-if="user.imgCaptchaMessage">
                            <span ng-bind="user.imgCaptchaMessage"></span>
                        </span>
                    </div>
                    <label class="fr">
                        <dh-captcha style="width:119px;height:34px;" change="captchaImgChange" src="/captcha/"></dh-captcha>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group mb10">
            <label for="">登录密码</label>
            <div><input type="password" ng-class="{error:user.passwordMessage}" ng-focus="user.passwordMessage=''"  maxlength="10" onpaste="return false" placeholder="输入登录密码 6-10个字符" ng-model="user.password" />
                <span class="vaildate-error" ng-if="user.passwordMessage">
                    <span ng-bind="user.passwordMessage"></span>
                </span>
            </div>
        </div>
        <div class="form-group mb10">
            <div><input type="password" ng-class="{error:user.password2Message}" ng-focus="user.password2Message=''" maxlength="10" onpaste="return false" placeholder="输入登录密码 6-10个字符" ng-model="user.password2"/>
                <span class="vaildate-error" ng-if="user.password2Message">
                    <span ng-bind="user.password2Message"></span>
                </span>
            </div>
        </div>
        <div class="clearfix mb10">
            <dh-checkbox model="user.remember" title="我同意外卖超人" class="fl"></dh-checkbox>
            <a href="/terms-and-conditions/" target="_blank" class="fs12 fl link"> " 注册条款 "</a>
        </div>
        <button ng-disabled="!user.remember || registerBtnDisabled" ng-click="registerVaildate()" class="big-btn btn-green btn mb10" ng-bind="registerBtn"></button>
    </form>
</dh-dialog>
<script>
    var common_sms_code = '/ajax/common_sms_code/';
    var ajax_customer_user_register_start = '/ajax/customer_user_register_start/';
    var common_validate_sms_code = '/ajax/common_validate_sms_code/';
    var ajax_customer_user_register_register = '/ajax/customer_user_register_register/';
</script>

    <dh-dialog type="search-address" hideclose="1" class="disnone" header="" show="notInRange">
        <div class="not-in-range">
            <p>此餐厅不在配送范围内，我们将展示您</p>
            <p class="fs20 link">附近可配送的全部餐厅。</p>
        </div>
    </dh-dialog>
    <dh-dialog class="disnone" type="alert" index="1001" header="" show="createOrderError">
        <div class="alert-box error">
           <p style="padding-right:20px;">
                <span ng-bind="createOrderErrorMsg"></span><a href="javascript:" title="清空购物车" class="clearShopingCart" ng-show="clearShopCart" ng-click="clearShopingCart()">清空购物车</a>
            </p>
        </div>
    </dh-dialog>
    <dh-dialog class="disnone" type="alert" index="1001" header="" show="showErrorMsg">
        <div class="alert-box" ng-class="errorIcon">
            <p ng-bind="errorMsg"></p>
        </div>
    </dh-dialog>
    <dh-dialog class="disnone" type="alert" index="1002" header="" show="restaurantRest">
        <div class="alert-box warning">
            <p>该餐厅休息中，暂不支持下单。</p>
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
    
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.2&key=ad067aee8be63cdc8baaff2672b3c545"></script>
    <script src="{{ asset('Shop/js/service.js') }}"></script>
    <script src="{{ asset('Shop/js/jquery-1.8.3.min.js') }}"></script>
    <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
    <!--[if lt IE 9]><script src="{{ asset('Shop/js/fix.js') }}"></script><![endif]-->
    
    
    <script>

        var data = [
    @foreach($list as $lis)
    {
    "order_total": 47.00,
    "submitted_at": "{{ $lis->data }}",
    "order_id": "{{ $lis->id }}",
    "items": [{
        "status": true,
        "name": "\u65e5\u5f0f\u6cb9\u6dcb\u9e21",
        "sectionId": 25299,
        "menu_price": 26.00,
        "id": 558862,
        "key": "25299-558862",
        "additions": [],
        "options": [],
        "quantity": 1
    },
    @endforeach
    ],
    "customer_phone": "152****8487",
    "delivery_fee": "0.00",
    "total_additions": []
}],
orderObj = accessoryObj = {},
otherObj = {};
        if(data){
            //order list
            for(var i = 0 , len = data.length; i < len; i++){
                var sectionObj = data[i] , key = '',order=sectionObj.order_id;
                accessoryObj[order]=sectionObj.items;
            }
        }

        if(data){
            for(var i = 0 , len = data.length; i < len; i++){
                var sectionObj = data[i] , key = '',order=sectionObj.order_id;
                for(var j = 0 , itemLen = sectionObj.items.length; j < itemLen; j++){
                    var menuItemObj = sectionObj.items[j];
                    key = menuItemObj.key;
                    otherObj[key] = menuItemObj;
                }
            }
        }
        var restaurantId='1592';
        var restaurantInRange = true;
        var grid_locationId =  602341 ;
        var inRange = true;
        var can_process_order = true;
        var create_order_url = "/mobile/ajax/create_order/";
        var checkout_url = "/checkout/0/";
        var restaurant_list_url = "/restaurants/0/";
        var favoriteUrl = "/ajax/restaurant/0/favorite/";
        var delivery = {minimum_order_quantity:'30',free_delivery_treshold:'0',delivery_fee:'0' }
    </script>
    <script src="{{ asset('Shop/js/other_eating.js') }}"></script>
    <script src="{{ asset('Shop/js/favorite.js') }}"></script>

    
    <script>angular.bootstrap(document, ["app"]);</script>

    <!-- Baidu Analytics -->

<!-- End Baidu Tracking Code -->




</body>
</html>
