<script type="text/javascript">
	function removeBackground (div) {
		//div.style.background = "white";
		addBorder(div);
	}
	function addBackground (div) {
		//div.style.background = "none";
		//div.style.backgroundImage = "url('<?php echo Yii::app()->request->baseUrl; ?>/images/transparent_2.png')";
		removeBorder(div);
	}
	function addBorder (div) {
		div.style.border = "1px solid #777777";
	}
	function removeBorder (div) {
		div.style.border = "1px solid #AAAAAA";
	}
</script>

<div class="container margin-top-bottom" style="margin-bottom: 0">
	<div class="well cover_box" style="position:relative; text-align:center; margin-top: 120px; height: 410px">
		<div style="margin-top:120px; color: white">
			<div style="margin-bottom:10px; font-size: 140%">
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<span class="orange">GeoTag</span>
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				Choose <span class="orange">Prices</span> and <span class="orange">Licenses</span>
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				Get <span class="orange">High Revenues</span> (up to 85%)
			</div>
			<?php if(Yii::app()->user->isGuest){?>
				<div style="margin-bottom: 10px">
					<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
					 - OR -  
					<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Register for Free</a>
				</div>
				<div>Already registered? <a class="blue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login', array('redirect'=>'site/index2'))?>">Login</a></div>
			<?php }else{?>
				<a class="btn btn-large btn-primary" style="width:200px; margin:5px" href="<?php echo Yii::app()->createAbsoluteUrl('photo/submit')?>">Upload your Photos</a>
			<?php }?>
		</div>
		
		<div style="color: white; position: absolute; bottom:90px; left:710px;">
			<h3 class="orange" style="margin: 0px">You do Nothing</h3><h5 style="margin: 0px">We do everything else</h5>
			<a class="blue" href="<?php echo Yii::app()->createAbsoluteUrl('site/youdonothing')?>">Learn more...</a>
		</div>
		
		<div class="orange" style="text-align: left; position: absolute; bottom:5px; left:10px;">
			<!-- <a class="blue" style="font-size:90%" href="http://www.geostockphoto.com/photo/view/">Photo # by </a> -->
			Sales will open soon.<br>Stay Tuned!
		</div>
	</div>
</div>

<div style="width: 100%; background-color: black; text-align: center">
	<a name="how-it-works" class="anchor">&nbsp;</a>
	<h1 style="margin-top: 0"><a href="#how-it-works">How it works</a></h1>
	
	<iframe width="660" height="610" frameborder="0" scrolling="no" src="http://www.voicemap.io/vms/player/64CHA"></iframe>
</div>

<div style="padding:0px; text-align:center; margin-bottom: 20px">
	<h1 id="map" style="color: white; margin-top: 20px">
		<!-- <a href="#map"> -->Thousands of photos have already been uploaded...<!-- </a> -->
	</h1>
	
	<hr style="border-color: black; margin-bottom: 0px">
	
	<div class="map_canvas" id="map_canvas" style="height:500px">
	<!-- </div>
	<a style="margin: 30px" class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create')?>">GeoTag your Photos</a>
	
	<div class="alert in alert-block alert-info">
		<h5>From 1 to 5 stars.<br>How would you rate your skills?</h5>
		<div style="display: none">
			<input name="rate" id="rate" type="text" value=0>
		</div>
		<img style="cursor: pointer;" onMouseOver="changeImgIndex(1)" onMouseOut="changeImg_mouseOutIndex()" onClick="doneHome(1)" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="stella1">
		<img style="cursor: pointer;" onMouseOver="changeImgIndex(2)" onMouseOut="changeImg_mouseOutIndex()" onClick="doneHome(2)" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="stella2">
		<img style="cursor: pointer;" onMouseOver="changeImgIndex(3)" onMouseOut="changeImg_mouseOutIndex()" onClick="doneHome(3)" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="stella3">
		<img style="cursor: pointer;" onMouseOver="changeImgIndex(4)" onMouseOut="changeImg_mouseOutIndex()" onClick="doneHome(4)" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="stella4">
		<img style="cursor: pointer;" onMouseOver="changeImgIndex(5)" onMouseOut="changeImg_mouseOutIndex()" onClick="doneHome(5)" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="stella5">
		<br>
		<a id="button_rate" style="margin: 20px" class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create')?>">Earn up to 85%</a>
	</div>
	
	<div style="padding: 20px">
		<?php
		/*$form2=$this->beginWidget('CActiveForm', array(
			'id'=>'photo-form-remove',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
		        'onSubmit'=>'js: return false;'
		    )
			
		));
			$modelProductPp->shoppingPhotoType->licenseType="RF";
			$modelProductPp->shoppingPhotoType->shoppingOptPhotos="";
			$modelProductPp->shoppingPhotoType->shoppingOptPhotosRm="";
			
			$this->widget('application.components.widgets.ModifyShoppingOptions',
				array('form'=>$form2,
					'modelProductPp'=>$modelProductPp,
					'shoppingOptMan'=>$shoppingOptMan,
		            'shoppingOptManRm'=>$shoppingOptManRm,
					'modelShoppingType'=>$modelUser,
					'fieldShoppingType'=>'preferredLicenseType',
					'save'=>false
				)
			);
		$this->endWidget(); */?>
		<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create')?>">Sell at Your Price</a>
	</div> -->
	
</div>