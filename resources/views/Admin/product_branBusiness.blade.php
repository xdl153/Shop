<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
		<div style="font-size:14px;padding-left:300px;padding-top:30px;">状态：
			@if($busi->examine == 1)
				审核中
			@elseif($busi->examine == 2)
				已通过审核
			@else
				审核不通过
			@endif
		</div>
		<div style="font-size:14px;padding-left:300px;padding-top:10px;">操作：
			@if($busi->examine == 1)
				<a href='javascript:' onclick='fun({{ $busi->id }})'>通过审核</a>
                                <a href='javascript:' onclick='fun1({{ $busi->id }})'>审核不通过</a>
			@elseif($busi->examine == 2)
				<a href='javascript:' onclick='fun1({{ $busi->id }})'>审核不通过</a>
			@else
				<a href='javascript:' onclick='fun({{ $busi->id }})'>通过审核</a>
			@endif
		</div>
	</ul>
	@endforeach
	</div>
</content>

</body>
<script type="text/javascript">
	function fun(id)
	{
		$.ajax({
           url:'/product-brandBusinesson',
           type:'post', 
           async:true,
           data:{id:id},
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success:function(data){

                window.location.reload();
           	
           },
           error:function(){

               alert('ajax失败');
           }
        });
	}
	function fun1(id)
	{
		$.ajax({
           url:'/product-brandBusinessoff',
           type:'post', 
           async:true,
           data:{id:id},
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success:function(data){
          
                window.location.reload();
          	
           },
           error:function(){
               alert('ajax失败');
           }
        });
	}
</script>
</html>