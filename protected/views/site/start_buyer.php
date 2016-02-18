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

<div class="container margin-top-bottom">
	<div class="well cover_box_customer" style="position:relative; text-align:center; margin-top: 120px; height: 410px">
		<div style="margin-top:120px; color: white">
			<div style="margin-bottom:10px; font-size: 140%">
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				Navigate the <span class="orange">Map</span>
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				Prices from <span class="orange">0.5&#8364;</span>
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<span class="orange">RF</span> and <span class="orange">RM</span> Licenses
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<span class="orange">Pay what you buy</span>
			</div>
			<?php if(Yii::app()->user->isGuest){?>
				<div style="margin-bottom: 10px">
					<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
					 - OR -  
					<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Register for Free</a>
				</div>
				<div>Already registered? <a class="blue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login', array('redirect'=>'site/index2'))?>">Login</a></div>
			<?php }else{?>
				<a class="btn btn-large btn-primary" style="width:200px; margin:5px" href="<?php echo Yii::app()->createAbsoluteUrl('photo/map')?>">Search the map</a>
			<?php }?>
		</div>
		
		<div class="orange" style="text-align: left; position: absolute; bottom:180px; left:10px;">
			<!-- <a class="blue" style="font-size:90%" href="http://www.geostockphoto.com/photo/view/">Photo # by </a> -->
			Sales will open soon.<br>Stay Tuned!
		</div>
	</div>
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