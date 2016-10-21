<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
<title>Gracy Profile Responsive Widget Template  :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gracy Profile Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="<?php echo e(asset('Shop/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('Shop/js/easyResponsiveTabs.js')); ?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion           
		width: 'auto', //auto or any width like 600px
		fit: true   // 100% fit in a container
			});
		});
	</script>
	

</head>

<body>
	<div class="main">
	<h1> Gracy Profile Widget </h1>
	
		<div class="container">
			
			<div class="profile">
			  <div class="pro-padding">
				<div class="image">
					<img src="<?php echo e(asset('Shop/images/p6.jpg')); ?>" alt="profile img">
				</div> <!-- image Ends here -->
				
				<h3> Gracy Ipsum </h3>
				<a href="mailto:example@mail.com"> <p> Loremipsum@mail.com </p>	</a>
			  </div>
			</div> <!-- Profile Ends here -->
			
						
			<div class="tab"> 
			
				<div class="sap_tabs">	
		 
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		 
						<ul>
							<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>ABOUT</span></li>
							<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>PHOTOS</span></li>
							<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>CONTACT</span></li>
				  
						</ul>		
						<!---->

<!-- Tab - 1 -->   			<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
								<div class="facts">
									<!--About-->
									<div class="about">
										<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
											Lorem Ipsum has been the industry's standard dummy text.  
										</p>
										<p> simply dummy text of the printing and typesetting industry. 
											Lorem Ipsum has been the industry's standard dummy text.  
										</p>
									</div>
								</div>
							</div>
				

<!-- Tab - 2 -->			<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
								<div class="facts">
									<div class="photo">
										<ul>
											<li>	<img src="<?php echo e(asset(Shop/images/p1.jpg')); ?>" alt="image">	</li>
											<li>	<img src="<?php echo e(asset(Shop/images/p2.jpg')); ?>" alt="image">	</li>
											<li>	<img src="<?php echo e(asset(Shop/images/p3.jpg')); ?>" alt="image">	</li>
											<li>	<img src="<?php echo e(asset(Shop/images/p4.jpg')); ?>" alt="image">	</li>
											<li>	<img src="<?php echo e(asset(Shop/images/p5.jpg')); ?>" alt="image">	</li>
											<li>	<img src="<?php echo e(asset(Shop/images/p6.jpg')); ?>" alt="image">	</li>
										</ul>
									</div>
								</div> 
							</div>

							
<!-- Tab - 3 -->			<div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2">
								<div class="facts">
									<div class="contact">
										<ul>
											<li> Lorem Ipsum  </li>
											<li> 1850-Aarhus </li>
											<li> Smith Street </li>
											<li> Denmark.    </li>
											<li> + 140-256395-452 </li>
										</ul>
									</div>
								</div> 
							</div>
			 	
					</div>	
				</div>
			</div> <!-- tab Ends here -->
			
			
		
		</div> <!-- Container Ends here -->
		
		<div class="clear"> </div>
		
		
		
	</div> <!-- main Ends here -->
	
	
		<div class="footer">
			<p>© 2016 Gracy Profile Widget. All Rights Reserved | Template by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
	
</body>
</html>