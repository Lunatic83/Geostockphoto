<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//IT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it"
	xmlns:og="http://ogp.me/ns#"
    xmlns:fb="https://www.facebook.com/2008/fbml"
    style="height:100%">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!-- www.GeoStockPhoto.com --!>

<!-- GeoStockPhoto, photo, image, geolocation, microstock, stock --!>

<!-- Un progetto di Marco Cannizzaro e Gaspare Scherma -->

<head>
	<title>GeoStockPhoto - Sell and buy photos from all the world</title>
	<meta name="AUTHOR" LANG='it' CONTENT="www.geostockphoto.com">
	<meta name="COPYRIGHT" CONTENT="GeoStockPhoto - Sell and buy photos from all the world">
	
	<!-- KEYWORDS & DESCRIPTION -->
	<meta name="keywords" content="geostockphoto, photo, image, geolocation, stock, microstock, world,
	map, photgraphy, photographer, license, e-commerce, high-quality,
	professional, breaking news, geo, travel, rf, rm, royalty-free, right-managed" />
	<meta name="DESCRIPTION" CONTENT="GeoStockPhoto is the new stock and microstock photography web agency
	with the innovative geolocalization of the photos. You can find photos from all the world in royalty-free and
	right-managed licenses. Photographers are free to decide licenses and
	prices of their photos and they are paid for what they deserve: up to
	85% of the photo's price anaytime the photo is sold.">
	
	<!-- PLUS SEO -->
	<meta name="google-site-verification" content="wzh6Ev6ZVIo5FeaY_ZHgRuNK7i8Nw8Q9ZJ38RWF22-Y" />
	<meta name="omni_page" content="GeoStockPhoto - Sell and Buy Photos from all the World" />
	<link rel="canonical" href="http://www.geostockphoto.com/" />
	
	<!-- FACEBOOK IMAGE PREVIEW -->
	<meta property="og:image" content="http://www.geostockphoto.com/images/GeoStockPhotoICO.jpg" />
	<meta property="og:url" content="http://www.geostockphoto.com" />
	<meta property="og:title" content="GeoStockPhoto - Sell and Buy Photos from all the World" />
	
	<!-- GRAPHICS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/operative.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.lightbox-0.5.css" />
	<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>

	<!-- SMOKE JS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/smoke/smoke.css" media="screen" />
	<link id="theme" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/smoke/themes/dark.css"  media="screen" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/smoke/smoke.min.js"/></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/smoke/gsp-smoke.js"/></script>
		
	<!-- GOOGLE ANALYTICS -->
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-28703609-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	
	<script type='text/javascript'>
		(function (d, t) {
		  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
		  bh.type = 'text/javascript';
		  bh.src = '//www.bugherd.com/sidebarv2.js?apikey=kzucmoovooz6igos3sgciw';
		  s.parentNode.insertBefore(bh, s);
		  })(document, 'script');
	</script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

	<body onload="<?php if(isset(Yii::app()->controller->onloadFunctions)) echo Yii::app()->controller->onloadFunctions; ?>">
		<?php
			$cs=Yii::app()->clientScript;
		    $cs->registerScript('helpers',
		        'yii = {
		            urls: {
		                base: '.CJSON::encode(Yii::app()->baseUrl).',
		                photoView: '.CJSON::encode(Yii::app()->createUrl('photo/view')).',
		                updateMap: '.CJSON::encode(Yii::app()->createUrl('photo/updateMapSemp/apiKey/w365zru2')).'
		            }                                                                                                       
		        };                                                                                                          
		    ', CClientScript::POS_HEAD);
		?>

	<div class="navbar-fixed-top" style="border-bottom: #A5BFDD 1px solid; position:fixed; top:0; width:100%; min-width:1400px;
		background-color: black">
		<div style="font-size:130%; text-align:center">
			<a href="<?php echo Yii::app()->createUrl('site/startPhotographer')?>">
				<img style="margin-top:10px; margin-bottom:10px" src='<?php echo Yii::app()->baseUrl?>/images/geostockphoto_logo_big.png'  alt='logo_geostockphoto'>
			</a>
		</div>
	</div>
	<div class="container" style="margin-top: 120px">
		<?php echo $content; ?>
	</div>
	
	<?php $this->widget('application.components.widgets.Footer', array('footer_class'=>'footer')); ?>
	</body>
</html>