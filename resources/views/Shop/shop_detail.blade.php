<!DOCTYPE html>

<html  >
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <meta name="description" content="叫上海[半价菜][送可乐]樱花日本料理外卖上外卖超人,全球领先订餐平台，提供宋园路地铁站
    网上订餐,  [半价菜][送可乐]樱花日本料理外卖菜单, [半价菜][送可乐]樱花日本料理每日特价。马上登陆外卖超人，轻松三步即刻享受周边美食！" />
        <meta name="viewport" content="user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="BstJA3X9z6f9HcvoN9AZTwaKo_9Abj_j7dVBPfy640s" />
        <meta name="baidu-site-verification" content="IYCrtVH0i1" />
        <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
        <link rel="icon" type="image/png" href="images/favicon.ico"/>

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
        <title>店铺商品</title>
    </head>
    <body class="day " ng-controller="bodyCtrl"  day-or-night id="mian">
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

    <header class="nav clearfix">
        @foreach($bs as $b)
        <div class="fl clearfix nav-des">
            <img src="{{ asset('Shop') }}{{ $b->photo }}" alt="{{ $b->name }}" class="fl" />
            <div class="fl nav-des-text">
                <h2 class="ellipsis" title="{{ $b->name }}">{{ $b->name }}</h2>
                <div class="clearfix">
                    <div class="fl nav-review">
                        <div style="width:{{ $b->grade }}.00px;"></div>
                    </div>
                    <p class="nav-review-x"></p>
                </div>
            </div>
        </div>
        @endforeach
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
    <ul class="clearfix menu-nav-list" scroll-position-static="160">
        <li class="no-line "><a href="{{ URL('/shop_intro') }}">餐厅介绍</a></li>
        <li class="active"><a href="{{ URL('/shop_detail') }}">菜单</a></li>
        <li ><a href="{{ URL('/shop_comment') }}">评论</a></li>
            <li ><a href="{{ URL('/shop_order') }}" id='point-tab'>大家都在点</a></li>

    </ul>

            <section class="main-box clearfix" lazy-img-load>
                <div class="main fl">
                    <div class="inner-main">
                        <nav class="menu-nav link fs12 clearfix" scroll-position-static="130">
                            <ul class="fl" menutoggle>
                                <li data-toggle="section-all" class="active">
                                    <a href="javascript:void(0);">显示全部</a>
                                </li>
                                @foreach($coun as $c)
                                    <li data-toggle="section-10">
                                        <a href="javascript:void(0);">店主推荐({{ $c->c }})</a>
                                    </li>
                                @endforeach    
                                    
                                    <li data-toggle="section-25311">
                                        <a href="javascript:void(0);">饮料(12)</a>
                                    </li>

                                    <!--<li data-toggle="section-189417">
                                        <a href="javascript:void(0);">份份减6元活动专区(8)</a>
                                    </li>

                                    <li data-toggle="section-25305">
                                        <a href="javascript:void(0);">冷面系列(9)</a>
                                    </li>

                                    <li data-toggle="section-25301">
                                        <a href="javascript:void(0);">【八五折便当区】(23)</a>
                                    </li>

                                    <li data-toggle="section-25300">
                                        <a href="javascript:void(0);">一品料理(22)</a>
                                    </li>

                                    <li data-toggle="section-25302">
                                        <a href="javascript:void(0);">盖浇饭系列(9)</a>
                                    </li>

                                    <li data-toggle="section-122476">
                                        <a href="javascript:void(0);">日式沾沾面类(3)</a>
                                    </li>

                                    <li data-toggle="section-168983">
                                        <a href="javascript:void(0);">寿喜锅系列(6)</a>
                                    </li>

                                    <li data-toggle="section-168984">
                                        <a href="javascript:void(0);">寿喜锅套餐系列(4)</a>
                                    </li>

                                    <li data-toggle="section-168980">
                                        <a href="javascript:void(0);">刺身系列(3)</a>
                                    </li>

                                    <li data-toggle="section-25308">
                                        <a href="javascript:void(0);">特色煎饺(3)</a>
                                    </li>

                                    <li data-toggle="section-25299">
                                        <a href="javascript:void(0);">特色油淋鸡/布丁(2)</a>
                                    </li>

                                    <li data-toggle="section-25304">
                                        <a href="javascript:void(0);">蔬菜色拉系列(5)</a>
                                    </li>

                                    <li data-toggle="section-25306">
                                        <a href="javascript:void(0);">炒面系列(1)</a>
                                    </li>

                                    <li data-toggle="section-25307">
                                        <a href="javascript:void(0);">烤物系列(5)</a>
                                    </li>

                                    <li data-toggle="section-25310">
                                        <a href="javascript:void(0);">米饭(2)</a>
                                    </li>

                                    <li data-toggle="section-56459">
                                        <a href="javascript:void(0);">酒水(3)</a>
                                    </li>-->

                            </ul>
                            <i class="icon expand-icon fr" toogle-nav-menu="39"></i>
                        </nav>
                        <nav class="list-order-nav clearfix" id="list-order-nav">
                            <ul class="fl">
                                <li>菜单排序：</li>
                                <li><a href="javascript:void(0);" class="sort-default active">默认排序</a></li>
                                <li class="split-line">|</li>
                                <li><a href="javascript:void(0);" class="sort-sale descend">销量<i class="order-icon"></i></a></li>
                                <li class="split-line">|</li>
                                <li><a href="javascript:void(0);" class="sort-price">价格<i class="order-icon"></i></a></li>
                                <li class="split-line">|</li>
                            </ul>
                        </nav>
                        <div id="menu-main" class="menu-main">
                        
                        <!-- 店主推荐 -->
                        <article class="collapse section-10">
                            <header accordion>
                                <h3 class="ellipsis">店主推荐 </h3>
								
                                <span ng-if="sectionCount['']" ng-class="{disinbl:sectionCount['']}"
                                      class="badge disnone" ng-bind="sectionCount['']"></span>
                                <i class="icon shrink-icon position"></i>
                            </header>
                             <section>
							
                                <ul class="clearfix menu-group menu-group-img menu-first-load">
									
				@foreach($menu as $m)
                                        <li title="{{ $m->name }}" class="menu-item hasImg" accessorykey="{{ $m->bid }}-{{ $m->id }}" data-sale="8" data-price="{{ $m->price }}">
                                           
                                            <div class="menu-item-img">  
                                                <img data-src="" src="{{ asset('Shop/') }}{{ $m->images }}"  width="202" height="202" /> 
                                                
                                            </div>
                                            <div class="meun-item-name"><span class="ellipsis">{{ $m->name }}</span></div>
                                            <p class="ellipsis meun-item-des"></p>
                                            <div class="meun-item-sale clearfix">
                                                <span class="last"></span> 
                                                <span class="price">{{ $m->price }}</span>
                                                <span ng-if="menuItemCount['{{ $m->bid }}-{{ $m->id }}" ng-class="{disinbl:menuItemCount['{{ $m->bid }}-{{ $m->id }}']}"
                                                      class="badge disnone" ng-bind="menuItemCount['{{ $m->bid }}-{{ $m->id }}']"></span>
                                                <span class="fr">已售{{ $m->num }}份</span>

                                            </div>

                                        </li>
				@endforeach
									

                                    </ul>
								
                                    <ul class="clearfix menu-group">

                                    </ul>
                            </section>
                        </article>
                        <!-- 饮料 -->
                        <article class="collapse section-25311">
                            <header accordion>
                                <h3 class="ellipsis" title="饮料">
                                    饮料

                                </h3>
                                <span ng-if="sectionCount['25311']" ng-class="{disinbl:sectionCount['25311']}"
                                      class="badge disnone" ng-bind="sectionCount['25311']"></span>
                                <i class="icon shrink-icon position"></i>
                            </header>
                            <section>

                                <ul class="clearfix menu-group menu-group-img menu-first-load">


                                        <li title="黑乌龙茶   (瓶)" class="menu-item hasImg" accessorykey="25311-559200" data-sale="24" data-price="8.00">
                                            <div class="menu-item-img"> 
                                                <img data-src="http://dhcmenuitem.dhero.cn/142581155250225208035157993436?imageView2/1/w/202/h/202/" src="http://dhcrestaurantlogo.dhero.cn/0" width="202" height="202" />   
                                            </div>
                                            <div class="meun-item-name"><span class="ellipsis">黑乌龙茶   </span></div>
                                            <p class="ellipsis meun-item-des">瓶</p>
                                            <div class="meun-item-sale clearfix">
                                                <span class="last"></span>
                                                <span class="price">￥8.00</span>
                                                <span ng-if="menuItemCount['25311-559200']" ng-class="{disinbl:menuItemCount['25311-559200']}"
                                                      class="badge disnone" ng-bind="menuItemCount['25311-559200']"></span>
                                                <span class="fr">已售24份</span>

                                            </div>

                                        </li>



                                        <li title="雪碧 (罐)" class="menu-item hasImg" accessorykey="25311-559203" data-sale="7" data-price="6.00">
                                            <div class="menu-item-img"> 
                                                <img data-src="http://dhcmenuitem.dhero.cn/142581157141205054806708358228?imageView2/1/w/202/h/202/" src="http://dhcrestaurantlogo.dhero.cn/0" width="202" height="202" />   
                                            </div>
                                            <div class="meun-item-name"><span class="ellipsis">雪碧 </span></div>
                                            <p class="ellipsis meun-item-des">罐</p>
                                            <div class="meun-item-sale clearfix">
                                                <span class="last"></span>
                                                <span class="price">￥6.00</span>
                                                <span ng-if="menuItemCount['25311-559203']" ng-class="{disinbl:menuItemCount['25311-559203']}"
                                                      class="badge disnone" ng-bind="menuItemCount['25311-559203']"></span>
                                                <span class="fr">已售7份</span>

                                            </div>

                                        </li>

                                </ul>

                                <ul class="clearfix menu-group">

                                </ul>
                            </section>
                        </article>
                            
                            
                                    
                        </div>
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
                              

                        <article class="restaurant-notice">
                            <header>
                                餐厅活动
                            </header>
                            <section>
                                <ul>


                                        <li><i class="status-icon"></i><span>餐厅支持在线支付</span></li>



                                        <li><img src="http://dhcactivity.dhero.cn/Fg-4kUvXVpR1DRR0O3VFr73KHEQr?imageView2/1/w/15/h/15/" alt="" /><span>每单赠送价值15元进口果汁1瓶！</span></li>

                                        <li><img src="http://dhcactivity.dhero.cn/Flswo958RM8GgqlKACT4tY5kr5K7?imageView2/1/w/15/h/15/" alt="" /><span>活动菜品立减6元，多点多减！</span></li>

                                        <li><img src="http://dhcactivity.dhero.cn/FjnSIEuUzJvV6j-ifPq7zevJSt30?imageView2/1/w/15/h/15/" alt="" /><span>该餐厅已通过认证</span></li>


                                </ul>
                            </section>
                        </article>

                    </article>
                </aside>
            </section>
            <span id="element" style="position:absolute;display:none" class="badge">1</span>
            <!--one tip-->
            <!-- <div class="common-layer" id="layer-tip"></div>
            <div id="point-tip" class="point-tip" ng-controller="tipController">
                <div class="point-tab">大家都在点</div>
                <em></em>
                <div class="point-main">
                    <i></i>
                    <p>看看大家都在点啥</p>
                    <button ng-click="closeTip()">知道了</button>
                </div>
            </div> -->
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
        <dh-dialog type="accessory" class="disnone" header="[[accessoryTitle]]" show="accessoryShow">
            <div class="tab">
                <div class="tab-nav clearfix">
                    <div class="fl">
                        <i class="icon tab-left-icon"></i>
                    </div>
                    <nav class="fl">
                        <ul class="accessory-nav clearfix" id="accessory-nav">
                            <li ng-class="{star:options.mandatory,active:curIndex==$index}" ng-init="init($index,options.mandatory)"
                                ng-click="changeAccessoryContent($index,options.mandatory)" ng-repeat="options in optionSets">
                                <span>
                                    <span ng-bind="options.name"></span>
                                    <span class="select-accessory-count">(<span ng-bind="selectTabCount[$index]"></span>)</span>
                                </span>
                            </li>
                        </ul>
                    </nav>
                    <div class="fr">
                        <i class="icon tab-right-icon"></i>
                    </div>
                </div>
                <div class="tab-content">
                    <ul class="accessory-main clearfix" ng-click="handleContentClick($event)">
                        <li ng-repeat="item in current_options.options" ng-class="{clearboth:$index%4==0}" ng-init="setCatchData(item);autoSelect()">
                            <div ng-if="current_options.mandatory">
                                <dh-radio model="optional[curIndex]" title="[[item.name]]" value="item.id" id="checked"></dh-radio>
                            </div>
                            <div ng-if="!current_options.mandatory">
                                <dh-checkbox model="optional[curIndex+'-'+$index]" title="[[item.name]]" value="item.id"></dh-checkbox>
                            </div>
                            <span class="accessory-price">￥[[item.price|number:2]]</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="checked-accessory">已选辅料( [[selectedAccessory.length]] )</div>
            <ul class="accessory-checked clearfix">
                <li ng-repeat="option in selectedAccessory" ng-class="{clearboth:$index%4==0}">

                    <div class="accessory-mandatory" ng-bind="option.name"></div>
                    <span class="accessory-price">￥<span ng-bind="option.price|number:2"></span></span>
                </li>
            </ul>
            <div class="accessory-total">
                <div class="food-price"><span ng-bind="footItemName"></span>：￥<span ng-bind="footItemPrice|number:2"></span></div>
                <div class="accessory-price">已选辅料价格：￥<span ng-bind="selectedAccessoryPrice|number:2"></span></div>
                <div class="subtotal">小计：￥<span ng-bind="subtotal|number:2"></span></div>
                <div class="add-cart">
                    <button class="btn" ng-disabled="isDisabledPut" ng-click="putCart()">
                        <i class="icon cart-icon2"></i>
                        放到购物车
                    </button>
                </div>
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
        <script src="{{ asset('Shop/js/jquery-1.8.3.min.js') }}"></script>



        <script src="{{ asset('Shop/js/service.js') }}"></script>

        <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
        <!--[if lt IE 9]><script src="js/fix.js"></script><![endif]-->


        <script type="text/javascript">
			var sections = [
			@foreach($menu as $m)
			{
					"description": null,
					"image": null,
					"recommended": true,
					"id": {{ $m->bid }},
					"menu_items": [{
						"qiniu_url": "",
						"additions": [],
						"name": "{{ $m->name }}",
						"optionsets": [],
						"ordercount": 8,
						"position": 0,
						"price": {{ $m->price }},
						"id": {{ $m->id }},
						"description": ""
				}],
					"name": "\u5e97\u4e3b\u63a8\u8350"
			},
			@endforeach
			],
			
				accessoryObj = {},
				orderObj = [],
				other_order = {};
				if(sections){
					for(var i = 0 , len = sections.length; i < len; i++){
						var sectionObj = sections[i] , key = '';
						for(var j = 0 , itemLen = sectionObj.menu_items.length; j < itemLen; j++){
							var menuItemObj = sectionObj.menu_items[j];
							key = sectionObj.id + '-' + menuItemObj.id;
							menuItemObj.key = key;
							menuItemObj.sectionId = sectionObj.id;
							accessoryObj[key] = menuItemObj;
						}
					}
				}

				if(other_order&&other_order.items){
					//order data
					for(var j=0;j<other_order.items.length;j++){
						if(other_order.items[j].status==true){
							orderObj.push(other_order.items[j]);
						}
					}   
				}
				//餐厅的id
				var restaurantId='1592';
				//餐厅范围
				var restaurantInRange = true;
				//网格_位置ID 
				var grid_locationId =  602341 ;
				//在范围
				var inRange = true;
				//可以_过程_秩序 
				var can_process_order = true;
				//创建订单url
				var create_order_url = "/create_order";
				//结帐的url
				var checkout_url = "/order?bid=1&id=786";
				//餐厅列表url
				var restaurant_list_url = "/restaurants/0/";
				//最喜欢的网址
				var favoriteUrl = "/ajax/restaurant/0/favorite/";
				//var交付= {最低_订单_数量:“150”,免费_交付_阈值:0,交付_费用:' 0 ' }
				var delivery = {minimum_order_quantity:'150',free_delivery_treshold:'0',delivery_fee:'0' }
	   </script>
        <script src="{{ asset('Shop/js/menupage.js') }}"></script>
        <script src="{{ asset('Shop/js/favorite.js') }}"></script>
          <!--<script type="text/javascript">
            //立即下单点击事件
            $("#buts").bind("click",function(){
                //获取 合计 、 配送费的值给个变量
                var hj = $('.hj').html();
                var pei = $('.pei').html();
                //计算 id=sss 下面的div 有多少个
                var count = $("#sss>div").length;
//                alert(count);
                //定义一个 菜名、份数、单价、小计、的空数组来装他们的值
                var cname = [];var fenshu = [];var danjia = [];var xiaoji = []; var d=[];
                //for循环出菜名、份数、单价、小计
                for(i=0;i<count;i++){
                    var cai = $(".cai").eq(i).html();
                    var fen = $(".fen").eq(i).html();
                    var jia = $(".jia").eq(i).html();
                    var xj = $(".xj").eq(i).html();
                   
//                    var hj = $(".hj").eq(i).html();
//                    var pei = $(".pei").eq(i).html();
                    //将上面循环出的菜名、份数、单价、小计装入 之前创建的空数组
                    cname[i]=cai; fenshu[i]=fen; danjia[i]=jia; xiaoji[i]=xj;
//                    d[i]=[cname,fenshu,danjia,xiaoji];
                      //弹出菜名、份数、单价、小计
//                    alert(cai);alert(fen);alert(jia);alert(xj);alert(hj);alert(pei);
//                       console.log(d);
                }
                //输出到控制台
//                console.log(cname,fenshu,danjia,xiaoji,hj,pei);

                $.ajax({
                        url:'/creade_order',
                        type:'post',
                        async:true,
                        data:{cname:cname,fenshu:fenshu,danjia:danjia,xiaoji:xiaoji,hj:hj,pei:pei},
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            if(data == 'y'){
                                //Ajax请求成功返回“Y” 页面跳转/order
                                  window.location.href="/order?bid={{ $_GET['bid'] }}&id={{ $_GET['id'] }}";
                            }
                        },
                        error:function(){
                            alert('失败');
                        }
                    })
            });
        </script>-->

        <script>angular.bootstrap(document, ["app"]);</script>
         
        <!-- Baidu Analytics -->


        

    </body>
</html>
