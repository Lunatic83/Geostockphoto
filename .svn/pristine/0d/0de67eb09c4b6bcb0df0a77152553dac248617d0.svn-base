<!DOCTYPE html> 
<html> 
	<head> 
		<title>GeoStockPhoto</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
<!--				<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" />-->
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
					 
<script>
	$(document).bind("mobileinit", function(){
	  $.extend(  $.mobile , {
	    ajaxEnabled: false
	  });
	});
</script>					 
					 
					 
					 
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
<!--		<script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js"></script>-->
		
	</head>
	
	<body onload="initializeMapSmallMobile(null,null, 2)"> 
	
	
		<!-- Start of first page -->
		<div data-role="page" data-theme="a">
	
			<div data-role="header" style="text-align: center">
				
					<img src="<?php echo Yii::app()->baseUrl?>/images/geostockphoto_01_white.png" width="200" height="30"  alt="logo">
					<?php if(!Yii::app()->user->isGuest){
					 	echo Yii::app()->user->name;
						
					}
					?>
					
			</div><!-- /header -->
		
		
			<div data-role="content">	
				<?php echo $content; ?>
			</div><!-- /content -->
			


			
	
		<!--<div data-role="footer" style="text-align: center">	
				
			</div>--><!-- /footer -->
			
		
		</div><!-- /page -->
	</body>
</html>

