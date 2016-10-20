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
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <!-- kefuQQ -->
                <style type="text/css">
                * { padding: 0; margin: 0; font-size: 12px; }
                    body{height:2000px;} 
                ul { list-style: none; }
                a { text-decoration: none; }
                </style>
                <link rel="stylesheet" href="Shop/css/kefu.css">   
                <script src="Shop/js/jquery.js"></script>
                <!-- kefu QQ-->
                <script src="Shop/js/jquery-1.8.3.min.js"></script>
		<link rel="icon" type="image/png" href="images/favicon.ico"/>
		
		<script type="text/javascript">
			
			(function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
		</script>
		
		<link rel="stylesheet" href="{{ asset('Shop/css/common.css') }}"/>
		
		<link rel="stylesheet" href="{{ asset('Shop/css/user_center.css') }}"/>

		<!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
		<!--[if lt IE 9]>
		<script src="{{ asset('Shop/js/respond.js') }}"></script>
		<script>
			var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
			 var i= e.length;while (i--){document.createElement(e[i])}
		</script>
		<![endif]-->
		<title>个人中心 - 订单管理</title>
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
                                                window.location.href="/shop_list?id="+hiddenid+"";
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
			
				
		<section>
			<div class="user-center-main-box common-width clearfix">
				<aside class="fl">
                     <ul>
                        <li>
                            <a href="/member_index?id={{ $_GET['id'] }}" rel="nofollow">账号管理</a>
                        </li>
                        <li class="active">
                            <a href="/member_order?id={{ $_GET['id'] }}" rel="nofollow">我的订单</a>
                        </li>
                        <li >
                            <a href="/member_collect?id={{ $_GET['id'] }}" rel="nofollow">我的收藏</a>
                        </li>
                        <li>
                            <a href="/member_addr?id={{ $_GET['id'] }}"  rel="nofollow">地址管理</a>
                        </li>
                    </ul>

				</aside>
				<article class="fl user-center-main">
					<header>历史订单</header>
					
		<section class="user-center-body order" id="orderBody">
        @if(isset($list))
            @if(session("userid"))
            @foreach($list as $l)
            <div class="order-list ">
                 <div class="order-hd">
                     <i>订单编号：</i><span id='bianhao'>{{ $l->number }}</span><i>创建时间：</i>{{ $l->data  }}　　 
                 </div>   
                 <div class="order-bd clearfix">
                    <div class="fl restaurant-msg">
                         <div>
                             <img src="{{ asset('/Shop') }}{{ $l->photo }}" alt="" class="fl" height="43" width="43">
                             <i class="fl">{{ $l->name }}</i>
                         </div>
                         <p class="clearfix">
                            <i class="fl"></i>
                            <span class="fl">餐厅电话：{{ $l->phone }}</span>
                        </p>
                    </div>
                     <div class="fl order-type padding-margin">
                         <p>订单类型：{{ ($l->type)==1?"餐到付款":"" }}</p>
                         <p>订单状态：{{ ($l->express)==2?"送货成功":"在路上" }}</p>
                     </div>
                     <div class="fl order-total padding-margin">
                         <p>订单金额</p>
                         <p><i>￥{{ $l->money }}</i></p>
                     </div>
                     <div class="order-operate fl padding-margin">
                        <p>
                            <a href="javascript:;" oid="{{ $l->bid }}" data-name="{{ $l->name }}" success-review="" class="btn btn-order success-review">评论</a>　<i  class="btn btn-order success-review cs">删除</i>
                        </p>
                        <p>
                            <a href="javascript:" id='did' order-number="" orderid="11982902" class="btn_a see-details">查看详情<i></i></a>
                        </p>
                     </div>
                 </div>
                 <div class="order-details clearfix">
                    <div ng-show="orderStatus['11982902']" class="order-loading" id="hid">
                        <span ng-show="orderStatus['11982902_error']" class="order-hide ng-hide">访问出错，请重新加载！</span>
                    </div>
                    <div class="" id="tid">
                        <div class="order-menu-info fl">
                            <div class="order-menu-inner">
                                <div class="cart-thead clearfix">
                                    <div class="goods-name">商品</div>
                                    <div class="goods-count">份数</div>
                                    <div class="goods-price">单价</div>
                                    <div class="goods-subtotal">小计</div>
                                </div>
                                
                                <div class="cart-body">
                                    @foreach($str as $st)
                                        @foreach($st as $s)
                                        @if($s->oid == $l->id)
                                    <div class="cart-item clearfix ng-scope">
                                        <div class="goods-name ellipsis ng-binding" >{{ $s->cname }}</div>
                                        <div class="goods-count ellipsis ng-binding">{{ $s->num }}</div>
                                        <div class="goods-price ng-binding" >￥{{ $s->Price }}</div>
                                        <div class="goods-subtotal ng-binding" >￥{{ $s->Price*$s->num }}</div>     
                                        <div class="accessory-item">
                                            <!-- ngRepeat: option in menu_item.options -->
                                        </div>
                                    </div>
                                        @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="cart-footer clearfix">
                                    <div class="order-adress fl">
                                        <!-- ngIf: order['11982902'].preorder_time -->
                                        <div><label for="">送餐电话：</label><span class="ng-binding">{{ $l->sphone }}</span></div>
                                        <div class="clearfix">
                                            <label for="" class="fl">送餐地址：</label>
                                            <p class="fl ng-binding" >{{ $l->address }}</p>
                                        </div>
                                        <!-- ngIf: order['11982902'].comment -->
                                    </div>
                                    <div class="total fr">
                                        <p>配送费：<span ng-bind="order['11982902'].delivery_fee|currency:'￥'" class="ng-binding"></span></p>
                                        <!-- ngIf: order['11982902'].coupon_amount -->
                                        <!-- ngIf: order['11982902'].red_packet_amount -->
                                        <!-- <p>活动优惠：<span ng-bind="order['11982902'].total_remit_amount|currency:'￥'"></span></p> -->
                                        <p class="order-total">实付金额：{{ $l->money }}<span ng-bind="order['11982902'].order_total|currency:'￥'" class="ng-binding"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="order-logistics fl">
                            <!-- ngRepeat: workflow in order['11982902'].status_workflow --> 
                        </ul>
                    </div>
                 </div>
            </div>
            @endforeach
            @endif
        @else
        
        @endif
    </section>
			
	
			 
			<page show="4" total="1"></page>
		</section>


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
		
		<dh-dialog type="review" header="写评论 攒人品" height="540" show="showReview" ng-init="timeSelectedIndex=0">
			<div class="review-body" ng-controller="reviewCtrl">
				<h2 ng-bind="restaurantName"></h2>
				<ul>
					<li class="clearfix">
						<label><span class="red">*</span>总体评价：</label>
						<ul class="review-star big-star">
							<li class="star1" ng-class="{active:reviewObj.totalReview==1}" bigStarIndex="0"></li>
							<li class="star2" ng-class="{active:reviewObj.totalReview==2}" bigStarIndex="1"></li>
							<li class="star3" ng-class="{active:reviewObj.totalReview==3}" bigStarIndex="2"></li>
							<li class="star4" ng-class="{active:reviewObj.totalReview==4}" bigStarIndex="3"></li>
							<li class="star5" ng-class="{active:reviewObj.totalReview==5}" bigStarIndex="4"></li>
						</ul>
						<span ng-if="isReviewError" class="review-error fl">请选择总体评价！</span>
						<span class="fr zk-btn" ng-click="expand()">
							<span ng-bind="expandText"></span>
							<i class="icon" ng-class="{'arrows-s-up':isShow,'arrows-s-down':!isShow}"></i>
						</span>
					</li>
					<li class="clearfix" ng-show="isShow">
						<label >口味：</label>
						<ul class="review-star small-star" reviewType="tasteReview">
							<li class="star11" ng-class="{active:reviewObj.tasteReview==1}" bigStarIndex="0"></li>
							<li class="star22" ng-class="{active:reviewObj.tasteReview==2}" bigStarIndex="1"></li>
							<li class="star33" ng-class="{active:reviewObj.tasteReview==3}" bigStarIndex="2"></li>
							<li class="star44" ng-class="{active:reviewObj.tasteReview==4}" bigStarIndex="3"></li>
							<li class="star55" ng-class="{active:reviewObj.tasteReview==5}" bigStarIndex="4"></li>
						</ul>
					</li>
					<li class="clearfix" ng-show="isShow">
						<label>服务：</label>
						<ul class="review-star small-star" reviewType="serveReview">
							<li class="star11" ng-class="{active:reviewObj.serveReview==1}" bigStarIndex="0"></li>
							<li class="star22" ng-class="{active:reviewObj.serveReview==2}" bigStarIndex="1"></li>
							<li class="star33" ng-class="{active:reviewObj.serveReview==3}" bigStarIndex="2"></li>
							<li class="star44" ng-class="{active:reviewObj.serveReview==4}" bigStarIndex="3"></li>
							<li class="star55" ng-class="{active:reviewObj.serveReview==5}" bigStarIndex="4"></li>
						</ul>
					</li>
					<li class="clearfix" ng-show="isShow">
						<label>速度：</label>
						<ul class="review-star small-star" reviewType="speedReview">
							<li class="star11" ng-class="{active:reviewObj.speedReview==1}" bigStarIndex="0"></li>
							<li class="star22" ng-class="{active:reviewObj.speedReview==2}" bigStarIndex="1"></li>
							<li class="star33" ng-class="{active:reviewObj.speedReview==3}" bigStarIndex="2"></li>
							<li class="star44" ng-class="{active:reviewObj.speedReview==4}" bigStarIndex="3"></li>
							<li class="star55" ng-class="{active:reviewObj.speedReview==5}" bigStarIndex="4"></li>
						</ul>
					</li>
					<li class="clearfix">
						<label>评价：</label>
						<div class="fl">
							<textarea ng-model="reviewText" maxlength="150" name="" id="" cols="40" rows="8"></textarea>
						</div>
					</li>
					<li class="clearfix lh34">
						<label><span class="red">*</span>送餐时间：</label>
						<div class="fl">
							<dh-select data="datas" selectedindex="timeSelectedIndex" change="timeIndexChange(index)"></dh-select>
						</div>
						<span ng-if="isTimeError" class="time-error">请选择送餐时间！</span>
					</li>
				</ul>
				<p class="songGift">评论有礼</p>
				<div class="tc">
					<button class="btn btn-success" ng-click="submitReview()">确认</button>
					<button class="btn btn-cancel" ng-click="cancelReview()">取消</button>
				</div>
				<div ng-if="showBig" class="show-big" ng-style="bigStyle">
					<p ng-bind="reviewData.num"></p>
					<p ng-bind="reviewData.des" class="review-des"></p>
				</div>
				<div ng-show="showSmall" class="show-samll" id="show-samll" ng-style="samllStyle">
					<p ng-bind="reviewSmallData"></p>
				</div>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" index="1001" header="超人小提示" show="reviewError">
			<div class="alert-box error">
				<p ng-bind="reviewErrorMsg"></p>
			</div>
			 <div class="errorBtn">
				<button class="btn btn-success small-btn" ng-click="reviewErrorClose()">确认</button>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" index="1001" header="超人小提示" show="refundRight">
			<div class="alert-box error font12">
				<p>抱歉，您暂时无法进行在线投诉。<br />您可以拨打超人免费热线进行投诉与维权。<br />4001-517-577</p>
			</div>
			 <div class="errorBtn">
				<button class="btn btn-success small-btn" ng-click="refundRightClose()">确认</button>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" index="1002" type="alert" header="" show="refundFuc">
			<div class="alert-box refundFuc">
				<p>申请已提交，请耐心等候！</p>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" type="alert" header="" show="giftReview" feeedbackclass="giftReview">
			<div class="">
				<p ng-bind="giftReviewMsg"></p>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" type="contact" header="联系餐厅" show="showContact ">
			<div class="contact-body">
				<p ng-bind="phones" class="p10"></p>
				<p ng-bind="orderOids"></p>
				<div class="tc">
					<button class="btn btn-success" ng-click="closeContact()">关闭</button>
				</div>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" type="contact" header="超人小提示" show="reviewtip ">
			<div class="reviewtip-body">
				<p class="p10">您点的外卖是否已经送达？</p>
				<div class="tc">
					<button class="btn btn-cancel" ng-click="closeTip()">未送到</button>
					<button class="btn btn-success" ng-click="toReview()">已送到</button>
				</div>
			</div>
		</dh-dialog>
		<dh-dialog class="disnone" index="1001" header="退款申请" show="refundApply" height="512">
			<div class="refund-apply" ng-controller="refundCtrl">
			   <p class="c999" style="padding-bottom:10px;">您正在对订单 [[ num ]] 发起了退款申请：</p>
			   <div class="form-group row form-group-refund">
				   <label><span class="red">*</span>联系方式：</label><input type="text" ng-model="refundForm.phone" placeholder="请输入您的手机号" maxlength="11" ng-class="{error:refundForm.phoneMessage}"/>
					<span class="vaildate-error col-8 w80" ng-if="refundForm.phoneMessage">
						<span ng-bind="refundForm.phoneMessage"></span>
					</span>
			   </div>
			   <div class="form-group row form-group-refund">
				   <label><span class="red">*</span>退款金额：</label><select name="" id="" ng-model="refundForm.refundMoney" ng-options="m.name for m in refundMoneyData" ng-class="{error:refundForm.refundMoneyMessage}" ng-change="refundMoneyChange()">
				   </select>
					<span class="vaildate-error col-8 w80" ng-if="refundForm.refundMoneyMessage">
						<span ng-bind="refundForm.refundMoneyMessage"></span>
					</span>
				   <p ng-if="refundForm.refundMoney.id == 2" class="refundForm-money">
						<label for="">&nbsp;</label><input type="text" ng-model="refundForm.money" placeholder="请输入退款金额" ng-class="{error:refundForm.moneyMessage}"/>
					</p>
					<span class="vaildate-error col-8 w80" ng-if="refundForm.moneyMessage">
						<span ng-bind="refundForm.moneyMessage"></span>
					</span>
			   </div>
			   <div class="form-group row form-group-refund">
					<label><span class="red">*</span>退款理由：</label><select name="" id="reason" ng-model="refundForm.reason" ng-options="m.name for m in reasonData" ng-class="{error:refundForm.reasonDataMessage}" ng-change="refundReasonChange()">
				   </select>
				   <span class="vaildate-error col-8 w80" ng-if="refundForm.reasonDataMessage">
						<span ng-bind="refundForm.reasonDataMessage"></span>
					</span>
				   <div ng-if="refundForm.reason.id == 4">
					   <textarea name="" id=""  rows="3" ng-class="{error:refundForm.otherReasonMessage}" maxlength="50" ng-model="refundForm.otherReason" placeholder="请输入退款理由"></textarea>
				   </div>
					<span class="vaildate-error col-8 w80" ng-if="refundForm.otherReasonMessage">
						<span ng-bind="refundForm.otherReasonMessage"></span>
					</span>
			   </div>
			   <div>
				   <label>上传凭证：<span>（只支持JPG、PNG、GIF、大小不超过5M）</span></label>
				   <div class="form-group row relative">
					   <div class="fl">
						   <p class="filed-box">
								<input type="file" common-file data='formData' success="fileSuccess(data)" error='fileError(data)' id="imgInp" accept="image/*" />
							</p>
						   <div class="show-img">
								<i ng-show="refundForm.imgRemove" ng-click="removeImg()"></i>
								<p ng-hide="refundForm.imgRemove"><span>+</span>本地浏览</p>
								<img ng-src="[[ refundForm.imgSrc ]]" ng-show="refundForm.imgRemove" alt="" width="86" height="86" id="blah" />
							</div>
					   </div>
					   <p class="IE_tips" ng-if="IETips"><span>您的浏览器不支持图片预览</span>，<br />请下载<a href="http://www.google.cn/intl/zh-CN/chrome/browser/" target="_blank">chrome</a>或者<a href="http://www.firefox.com.cn/" target="_blank">firefox</a>查看预览,<br />或者提交成功后退款详情里面查看图片</p>
				   </div>
			   </div>
			   <p class="upimgError" ng-if="refundForm.upimgError"><span ng-bind="refundForm.upimgError"></span></p>
			   <div class="tc">
					<button class="btn btn-success small-btn" ng-click="refundApplyOk()" ng-disabled="refundSubmit" id="submit">确认</button>
					<button class="btn btn-cancel small-btn" ng-click="refundApplyCancel()">取消</button>
				</div>
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
		
		<script type="text/javascript">
			var token = 'u8wA1RHnkO8OfIWaX5Uxg3u5Og9X718nFVOQTFXg:WsqxKsgpRoNjeOqH4m8Uo80w3TM=:eyJtaW1lTGltaXQiOiJpbWFnZS9qcGVnO2ltYWdlL3BuZyIsInNjb3BlIjoiZGhjLXJlZnVuZCIsImRlYWRsaW5lIjoxNDMwNjIwMDM3LCJmc2l6ZUxpbWl0Ijo1MjQyODgwfQ==';
			var orderRefund = "/account/order/0/refund/create/";
			var static = "/static/";
		</script>
		<script src="{{ asset('Shop/js/jquery-1.8.1.js') }}"></script>
		<script src="{{ asset('Shop/js/jquery.uploadify.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('Shop/js/angular.min.js') }}"></script>
		<script src="{{ asset('Shop/js/common.js') }}"></script>
		
		 
		<script src="{{ asset('Shop/js/service.js') }}"></script>
		
		<script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
		<!--[if lt IE 9]><script src="js/fix.js"></script><![endif]-->
		
		
		<script>
			var reviewUrl = "/comment",favoriteUrl = "/ajax/restaurant/0/favorite/";
		</script>
		<script src="{{ asset('Shop/js/user_center.js') }}"></script>
		

		<script>angular.bootstrap(document, ["app"]);</script>
                <!-- QQ客服 -->
		<div id="box-kefu">
                    <div class="kefu-close"></div>
                    <div class="kefu-open">
                        <div>
                        <ul>
                            <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1531555719&site=qq&menu=yes" target="_blank"><i class="qq"></i>在线客服</a></li>
                            <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1030985069&site=qq&menu=yes" target="_blank"><i class="qq"></i>在线客服</a></li>
                            <!--<li><a href="http://www.97zzw.com/plus/guestbook.php#liuyan" target="_blank"><i class="txt"></i>咨询留言</a></li>-->
                        </ul>
                        </div>
                        <a href="javascript:;" class="close">关闭</a>
                    </div>
                </div>
                <!-- -->
                <script type='text/javascript'>
                    $('.cs').click(function(){
                        var bh = $('#bianhao').html();
//                        alert(bh);
                            $.ajax({
                                url:'/order_delete',
                                type:'post',
                                async:true,
                                data:{bh:bh},
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(data){
                                    if(data == 'y'){
                                        //Ajax请求成功返回“Y” 页面跳转/order
                                            window.location.reload();
                                    }else{
                                        alert('订单尚未完成,无法删除');
                                    }
                                },
                                error:function(){
                                    alert('失败');
                                }
                            })
                    })
                </script>
                <script>var online= new Array();</script>
                <script src="http://webpresence.qq.com/getonline?Type=1&645481746:1712816412:645481746:"></script>
                <script>
                (function($){
                    for (var i=0; i<online.length; i++) {
                        if (online[i]) jQuery("#box-kefu .qq").eq(i).addClass("online");
                    }
                    var _open = $("#box-kefu").find(".kefu-open"),
                        _close = $("#box-kefu").find(".kefu-close");
                    _open.find("a").hover(function(){
                        $(this).stop(true,true).animate({paddingLeft:20},200).find("i").stop(true,true).animate({left:75},200);
                    },function(){
                        $(this).stop(true,true).animate({paddingLeft:35},200).find("i").stop(true,true).animate({left:10},200);
                    });


                    _open.find(".close").click(function(){
                        _open.animate({width:148},200,function(){
                            _open.animate({width:0},200,function(){
                                _close.animate({width:34},200);

                            });
                        });
                    });
                    _close.click(function(){
                        _close.animate({width:44},200,function(){
                            _close.animate({width:0},200,function(){
                                _open.animate({width:138},200);
                            });
                        });
                    });
                })(jQuery)
                </script>
	</body>
</html>
