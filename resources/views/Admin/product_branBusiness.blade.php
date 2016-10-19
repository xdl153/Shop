<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">	
		(function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
	</script>
	<link rel="stylesheet" href="{{ asset('Shop/css/common.css') }}"/>
	<link rel="stylesheet" href="{{ asset('Shop/css/restaurant.css') }}"/>
	<script src="Shop/js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<content>
	<div style="margin-left: auto;margin-right: auto;padding-left:50px;padding-top:20px;padding-bottom:20px;">
	@foreach($business as $busi)
	<ul class="clearfix transform-style" id="ye-restaurant1">
		<li data-index="1" class="restaurant-item fl c_a c_all p_all p_356 p_352 p_42  p_online fee 1" data-price='' data-count="" data-title="">
			<div class="img-box fl">
				<a href="javascript:">
					<img src="Shop/{{ $busi->photo }}"  width="82px" height="82px">
				</a>
			</div>
			<article class="restaurant-introduce fl">
				<h3 class="ellipsis">{{ $busi->name }}</h3>
				<dl class="clearfix">
						<dt class="fl ellipsis">已售单{{ $busi->count }}</dt>
					<dd class="small-star fl">
						<div class="small-star score" style="width:{{ $busi->grade }}px"></div>
					</dd>
				</dl>
				<p>起送价：{{ $busi->money }}</p>
				<div class="restaurant-state">
				<p class="fl"></p>
					<span><i class="status-icon"></i></span>
						 <span><img src="http://dhcactivity.dhero.cn/Fg-4kUvXVpR1DRR0O3VFr73KHEQr?imageView2/1/w/15/h/15/" alt="" /></span>
					
						 <span><img src="http://dhcactivity.dhero.cn/Flswo958RM8GgqlKACT4tY5kr5K7?imageView2/1/w/15/h/15/" alt="" /></span>
					
						 <span><img src="http://dhcactivity.dhero.cn/FjnSIEuUzJvV6j-ifPq7zevJSt30?imageView2/1/w/15/h/15/" alt="" /></span>
			</div>
			</article>
			<div class="tooltip restaurant-info">
				<script type="text/template">
					<h3 class="ellipsis"></h3>
						<h4 class="ellipsis">营业时间 [{{ $busi->shopopen }}-{{ $busi->shopon }}]</h4>
					<ul>
						<li><i class="status-icon"></i><span>餐厅不支持在线支付</span></li>
						<li><img src="http://dhcactivity.dhero.cn/Fg-4kUvXVpR1DRR0O3VFr73KHEQr?imageView2/1/w/15/h/15/" alt="" /><span>每单赠送价值15元进口果汁1瓶！</span></li>
						<li><img src="http://dhcactivity.dhero.cn/Flswo958RM8GgqlKACT4tY5kr5K7?imageView2/1/w/15/h/15/" alt="" /><span>活动菜品立减6元，多点多减！</span></li>
						<li><img src="http://dhcactivity.dhero.cn/FjnSIEuUzJvV6j-ifPq7zevJSt30?imageView2/1/w/15/h/15/" alt="" /><span>该餐厅已通过认证</span></li>
					</ul>
				</script>
			</div>
		</li>
		<div style="font-size:14px;padding-left:300px;padding-top:30px;">状态：审核中 </div>
		<div style="font-size:14px;padding-left:300px;padding-top:10px;">操作：审核通过</div>
	</ul>
	@endforeach
	</div>
</content>

</body>
</html>