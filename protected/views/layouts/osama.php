<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<title>Geostockphoto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="">

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/osama/style.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/osama/plugins.min.css">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script> -->
	<script>window.Modernizr || document.write('<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/osama/modernizr.min.js"><\/script>');</script>

	<!-- Le fav and touch icons
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="./apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="./apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="./apple-touch-icon-72x72-precomposed.png">
	 -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/osama/favicon.ico">
</head>
<body class="loading" onload="<?php if(isset(Yii::app()->controller->onloadFunctions)) echo Yii::app()->controller->onloadFunctions; ?>">
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
                showInfoPhoto: '.CJSON::encode(Yii::app()->createUrl('photo/showInfoPhotoNew')).',
                showInfoPhotoRequest: '.CJSON::encode(Yii::app()->createUrl('photo/showInfoPhotoRequest')).',
                showInfoUser: '.CJSON::encode(Yii::app()->createUrl('user/showInfoUser')).',
                photoList: '.CJSON::encode(Yii::app()->createUrl('photo/list')).',
                userTopFive: '.CJSON::encode(Yii::app()->createUrl('user/topfive')).',
                photoMap: '.CJSON::encode(Yii::app()->createUrl('photo/map')).',
                photoView: '.CJSON::encode(Yii::app()->createUrl('photo/view')).',
                updateMap: '.CJSON::encode(Yii::app()->createUrl('photo/updateMapNew/apiKey/w365zru2')).',
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
	
<header class="header">
<?php $this->widget('application.components.widgets.HeaderOsama');?>
<?php //$this->widget('application.components.widgets.Folders');?>
</header>

<?php echo $content; ?>

<!-- === VOTE === -->
<!-- .lightbox -->
<div id="lightbox" class="lightbox">
	<div class="img-box">
		<div class="img-box-wrap">
		<div class="img-box-block">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/osama/photos/vote-photo-1.jpg" class="vote-image" id="vote-image">
			<div class="img-controls">
				<p>Is there somthing wrong?</p>
				<div class="checkboxes">
					<form id="vote-form" action="" method="post">
						<label><input checked type="checkbox" name="controls" value="Compositions"> Compositions</label>
						<label><input checked type="checkbox" name="controls" value="Noise"> Noise</label>
						<label><input checked type="checkbox" name="controls" value="Focus"> Focus</label>
						<label><input type="checkbox" name="controls" value="Lighting"> Lighting</label>
						<label><input type="checkbox" name="controls" value="Trademark"> Trademark</label>
						<label><input type="checkbox" name="controls" value="Information"> Information</label>
						<label><input type="checkbox" name="controls" value="Position"> Position</label>
						<label><input type="checkbox" name="controls" value="Dust/Sensor spots"> Dust/Sensor spots</label>
						<label><input type="checkbox" name="controls" value="CA/Fringing"> CA/Fringing</label>
						<label><input type="checkbox" name="controls" value="Overfiltered/Overprocessed"> Overfiltered/Overprocessed</label>
					</form>
				</div>
				<div id="vote-stars" class="vote-stars">
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star selected" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
					<a class="vote-star" href="javascript:void(0);"></a>
				</div>
				<div class="cb"></div>
				<div class="btn-group">
					<a href="javascript:void(0);" id="vote-photo" class="vote-btn color-green">Vote</a>
					<a href="javascript:void(0);" id="skip-photo" class="vote-btn">Skip</a>
				</div>
			</div>
		</div> <!-- .img-box-block -->
		</div> <!-- .img-box-wrap -->
	</div> <!-- .img-box -->
</div> <!-- .lightbox -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- <script>window.jQuery || document.write('<script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/osama/jquery.min.js"><\/script>');</script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script> -->
<!-- <script>
if (typeof jQuery.migrateWarnings == 'undefined') { // or typeof jQuery.fn.live == 'undefined'
	document.write('<script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/osama/jquery-migrate-1.2.1.min.js"><\/script>');
}
</script> -->
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="./js/selectivizr-min.js"></script>
<![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/osama/plugins.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/osama/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
</script> -->
	
</body>
</html>