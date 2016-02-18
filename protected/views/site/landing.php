<script type="text/javascript">
	function make_blank(field){
		var test = field.value;
		if(test=="E-mail address"){
			field.value ="";
			field.style.color="black";
			madeblank=true;
		}
	}
	var madeblank=false;
	window.onclick=function() {
		if(!madeblank){
			if(document.getElementById("LandingPage_email").value==""){
				document.getElementById("LandingPage_email").value="E-mail address";
				document.getElementById("LandingPage_email").style.color="grey";
			}
		}else
			madeblank=false;
	}
</script>

<div id="container">
<h1 style="display:none">GeoStockPhoto is the new stock and microstock photography web agency
  with the innovative geolocalization of the photos. You can find excellent
  images from all the world and breaking news photos in royalty-free and
  right-managed licenses. Photographers are free to decide licenses and
  prices of their photos and they are paid for what they deserve: up to
  85% of the photo's price anaytime the photo is sold.</h1>
<div id="header">
<h2><a href="http://www.GeoStockPhoto.com" style="float:left;"> <img src="<?php echo Yii::app()->baseUrl?>/images/geostockphoto.jpg" width="470" height="80" alt="GeoStockPhoto"/></a></h2>
<div align="right">
	<?php
	 echo CHtml::link("<IMG SRC='".Yii::app()->baseUrl."/images/landing/theme/Italy-.png' alt='ITA'/>",
	 	Yii::app()->createUrl('it'));
	?>
	<br><br><br><br><br>
</div>
<div id="containerslider">
	<div id="example"> <img src="<?php echo Yii::app()->baseUrl?>/images/landing/new-ribbon.png" width="87" height="87" alt="New Ribbon" id="ribbon">
		<div id="slides">
			<div class="slides_container">
		    	<img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ing-01.jpg" width="570" height="270" alt="Slide 1">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ing-02.jpg" width="570" height="270" alt="Slide 2">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ing-03.jpg" width="570" height="270" alt="Slide 3">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ing-04.jpg" width="570" height="270" alt="Slide 4">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ing-05.jpg" width="570" height="270" alt="Slide 5">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ing-06.jpg" width="570" height="270" alt="Slide 6">
			</div>
			<a href="#" class="prev">
				<img src="<?php echo Yii::app()->baseUrl?>/images/landing/theme/arrow-prev.png" width="24" height="43" alt="Arrow Prev">
			</a>
			<a href="#" class="next">
				<img src="<?php echo Yii::app()->baseUrl?>/images/landing/theme/arrow-next.png" width="24" height="43" alt="Arrow Next">
			</a>
		</div>
		<img src="<?php echo Yii::app()->baseUrl?>/images/landing/theme/FRAME_1.png" width="739" height="341" alt="Example Frame" id="frame">
	</div>
</div>
<div id="boxNL" align="center">
	If you want to be one of our first users, just send us your e-mail.<br>
	We will contact you as soon as GeoStockPhoto is online<!-- and give you a <b>welcome gift</b>-->.<br><br>
<div style="width:600px; margin:0 auto;">
  <div class="form" align="center">
    <?php
	$form=$this->beginWidget('CActiveForm', array(
				'id'=>'landing-page',
				'enableAjaxValidation'=>true,
	    		'enableClientValidation'=>true,
			));
	?>
		
		<?php echo $form->errorSummary($model); ?>
		
		<div class="row">
			<?php echo $form->dropDownList($model,'isPhotographer',
					array('1'=>'Photographer', '2'=>'Buyer')
					); ?>
			<?php echo $form->error($model,'isPhotographer'); ?>
			<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>32, 'value'=>'E-mail address', 'style'=>'color:grey', 'onClick'=>"make_blank(this)")); ?>
			<?php echo $form->error($model,'email'); ?>
		
			<?php
			echo CHtml::ajaxSubmitButton(
				"Send",
				Yii::app()->createUrl('site/saveLanding', array('lang'=>'en')),
				array('update' => '#msg')
			);
			?>
		</div>
			
	<?php $this->endWidget(); ?>
  </div>
<div id="msg"></div>
</div>
<br><hr>
<table style="vertical-align:middle">
	<tr style="vertical-align:middle">
		<td>
			<IMG SRC='<?php echo Yii::app()->baseUrl?>/images/new.jpg'/>
		</td>
		<td style="vertical-align:middle; font-size:150%">
			Are you a <b>photographer</b>?<br>
			Take part in<br>
			<?php
			 echo CHtml::link("<span style='font-size:130%; color:#06C'><b>PHOTOnHOMEPAGE</b></span>",
			 	Yii::app()->createUrl('photonhomepage/en'));
			?>
		</td>
	</tr>
</table>
<hr>
<div id="boxnet">
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
    <div class="box_link">
	     <a class="sn_fb allineati" href="https://www.facebook.com/GeoStockPhoto" target="_blank">Facebook</a>
	     <a class="sn_tw allineati" href="https://twitter.com/#!/GeoStockPhoto" target="_blank">Twitter</a>
	</div>
	<div class="fb-like" data-href="https://www.facebook.com/GeoStockPhoto" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="lucida grande">
	</div>
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.GeoStockPhoto.com" data-text="Sell and buy photos from all the world!" data-via="GeoStockPhoto">Tweet</a>

	<script>
		!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0];
			if(!d.getElementById(id)){
				js=d.createElement(s);
				js.id=id;
				js.src="//platform.twitter.com/widgets.js";
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document,"script","twitter-wjs");
	</script>
</div>
<br>
<p>&copy; 2012 <a href="http://GeoStockPhoto.com">GeoStockPhoto.com</a>. All rights reserved.</p>
<p>Email: <a href="info@geostockphoto.com">info@geostockphoto.com</a></p>
</div>
</div>
</div>