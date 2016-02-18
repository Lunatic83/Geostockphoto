<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it"
	xmlns:og="http://ogp.me/ns#"
    xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!-- www.GeoStockPhoto.com --!>

<!-- GeoStockPhoto, photo, image, geolocation, microstock, stock --!>

<!-- Un progetto di Marco Cannizzaro e Gaspare Scherma -->

<head>
	<title>GeoStockPhoto</title>
	<meta name="AUTHOR" LANG='en' CONTENT="www.geostockphoto.com">
	<meta name="COPYRIGHT" CONTENT="GeoStockPhoto">
	
	<!-- KEYWORDS & DESCRIPTION -->
	<meta name="keywords" content="geostockphoto, photo, image, stock, microstock,
	map, photgraphy, photographer, travel, rf, rm, royalty-free, right-managed" />
	<meta name="DESCRIPTION" CONTENT="The new Stock Photo agency with geolocation.">
	
	<!-- PLUS SEO -->
	<meta name="google-site-verification" content="wzh6Ev6ZVIo5FeaY_ZHgRuNK7i8Nw8Q9ZJ38RWF22-Y" />
	<meta name="omni_page" content="GeoStockPhoto - Sell and Buy Photos from all over the World" />
	<link rel="canonical" href="http://www.geostockphoto.com/" />
	
	<!-- GRAPHICS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/operative.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.lightbox-0.5.css" />
	<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/icon2.png" type="image/png"/>

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

	<body style="; min-width: 1024px" onload="<?php if(isset(Yii::app()->controller->onloadFunctions)) echo Yii::app()->controller->onloadFunctions; ?>">
		<?php
			$cs=Yii::app()->clientScript;
			//$cs->registerCoreScript('jquery');
			$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utility.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.lightbox-0.5.js', CClientScript::POS_HEAD);
		    $cs->registerScript('helpers',
		        'yii = {
		            urls: {
		                base: '.CJSON::encode(Yii::app()->baseUrl).',
		                index: '.CJSON::encode(Yii::app()->createUrl('photo/index')).',
		                submit: '.CJSON::encode(Yii::app()->createUrl('photo/submit')).',
		                status: '.CJSON::encode(Yii::app()->createUrl('photo/status')).',
		                loc: '.CJSON::encode(Yii::app()->createUrl('photo/index',array('location'=>''))).',
		                showInfoPhoto: '.CJSON::encode(Yii::app()->createUrl('photo/showInfoPhoto')).',
		                showInfoPhotoRequest: '.CJSON::encode(Yii::app()->createUrl('photo/showInfoPhotoRequest')).',
		                showInfoUser: '.CJSON::encode(Yii::app()->createUrl('user/showInfoUser')).',
		                photoTopTen: '.CJSON::encode(Yii::app()->createUrl('photo/topten')).',
		                userTopFive: '.CJSON::encode(Yii::app()->createUrl('user/topfive')).',
		                photoMap: '.CJSON::encode(Yii::app()->createUrl('photo/map')).',
		                photoView: '.CJSON::encode(Yii::app()->createUrl('photo/view')).',
		                updateMap: '.CJSON::encode(Yii::app()->createUrl('photo/updateMapSemp/apiKey/w365zru2')).',
		                updateMapPhotoRequest: '.CJSON::encode(Yii::app()->createUrl('photo/updateMapRequest/apiKey/w365zru2')).',
		                updateMapUser: '.CJSON::encode(Yii::app()->createUrl('user/updateMapSemp/apiKey/w365zru2')).',
		                saveShoppingOptCart: '.CJSON::encode(Yii::app()->createUrl('shopping_cart/ajaxSaveOpt')).',
		                userView: '.CJSON::encode(Yii::app()->createUrl('user/view')).',
		                photoGetPosition: '.CJSON::encode(Yii::app()->createUrl('photo/getPosition')).',
		                photoCrop: '.CJSON::encode(Yii::app()->createUrl('photo/crop')).'
		            }
		        };                                                                                                          
		    ', CClientScript::POS_HEAD);
		?>
		
		<?php if(($this->route!='photo/index')&&
			($this->route!='photo/ondemand')&&
			($this->route!='photo/submit')&&
			($this->route!='photo/view')&&
			($this->route!='user/statistics')&&
			($this->route!='photo/vote')&&
			($this->route!='photo/status')&&
			($this->route!='photo/purchased')&&
			($this->route!='shopping_cart/index')&&
			($this->route!='user/view')&&
			($this->route!='user/map')
			){$class="container";} else {$class="";}?>
			
			
		<div class="container_outer">
		<?php $this->widget('application.components.widgets.Header', array('idPhotoType'=>$this->idPhotoType, 'user'=>$this->user, 'route'=>$this->route)); ?>
		
			<div class="<?php echo $class?>">
				<?php echo $content; ?>
			</div>
			<div class="clearfooter"></div>
		</div>
		
		<?php $this->widget('application.components.widgets.Footer', array('footer_class'=>'footer')); ?>
	</body>
</html>