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


<div style="border-bottom: #A5BFDD 1px solid; position:fixed; top:0; width:100%; min-width:1400px;
	background:url('<?php echo Yii::app()->request->baseUrl; ?>/images/transparent.png')
">
	<div style="color:white; font-size:130%; text-align:center">
		<?php //$this->widget('application.components.widgets.Header', array('idPhotoType'=>$this->idPhotoType, 'user'=>$this->user,'route'=>$this->route)); ?>
		<img style="margin-top:10px; margin-bottom:10px" src='<?php echo Yii::app()->baseUrl?>/images/geostockphoto_logo_big.png'  alt='logo'>
		
		<!-- <div class="buttons well-split" style="float:left; margin-left:50px; padding-top: 13px">
			<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
		</div>
		<div style="float:left; margin-left:20px; padding-top: 20px">
			or
		</div>
		<div style="float:left; margin-left:20px; padding-top: 13px">
			<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create')?>">Register for Free</a>
		</div>
		<div style="float:left; margin-left:50px; padding-top: 20px; font-size:90%">
			Already registered? <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a>
		</div>
		<div style="padding-top:15px">
			<div style="float:left; margin-left:20px">
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<span class="orange">GeoTag</span> your Photos
			</div>
			<div style="float:left; margin-left:20px">
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				Choose <span class="orange">Prices</span> and <span class="orange">Licenses</span>
			</div>
			<div style="float:left; margin-left:20px">
				<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				Get <span class="orange">High Revenues</span> (up to 85%)
			</div>
			<div style="float:left; margin-top:3px; margin-left:20px">
				<a href="<?php echo Yii::app()->createAbsoluteUrl('site/howitworks')?>">
					<?php if(Yii::app()->language=='it_it'){?>
						Scopri di pi&ugrave...
					<?php }else{?>
						Learn more...
					<?php }?>
				</a>
			</div>
		</div> -->
	</div>
</div>


<div id="home-container" class="" style="margin-top:10px; margin-bottom:0px">
	<div style="width:100%; text-align:center; margin-top:130px">
		<div style="float:right">
			<div style="width:300px; float: right; margin-right: 50px">
				<div
					class="well home_box"
					onmouseover="removeBackground(this)";
					onmouseout="addBackground(this)"
					style="padding:5px">
					<?php if(Yii::app()->user->isGuest){?>
						<div style="margin-top:10px">
							<div class="buttons well-split">
								<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
							</div>
								<img style="margin-top:20px; margin-bottom:15px" width=200 src='<?php echo Yii::app()->baseUrl; ?>/images/login_bar_small.png'/>
							<br>
							<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create')?>">Register for Free</a>
							<br><br>Already registered? <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a>
						</div>
					<?php }else{?>
						<div style="margin-top:5px">
							<img style="float:left; margin-left:20px; margin-top:-5px" width=70px height=70px src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_100.png">
							<h4>100x100x100<br>1million reasons<br>to upload now!</h4>
							Upload at least 100 photos and you will get 100% of revenue for 100 days.
							<a class="btn btn-large btn-primary" style="width:200px; margin:5px" href="<?php echo Yii::app()->createAbsoluteUrl('photo/submit')?>">Upload your Photos</a>
							<p style="margin:0px; font-size:90%">You have time until GeoStockPhoto<br>sells its first photo: hurry up!</p>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
		<div style="text-align:left; float:left; margin-top:10px; margin-left: 30px">
			<?php if(Yii::app()->user->isGuest){
				$url=Yii::app()->createAbsoluteUrl('user/create');
			}else{
				$url=Yii::app()->createAbsoluteUrl('photo/submit');
			}?>
			<a style="color:white" href="<?php echo $url?>">
				<p style="font-size:250%">We are looking for your Photos</p>
				<p style="font-size:150%; margin-top:20px; margin-bottom:0px">Enjoy selling them with gratification!</p>
			</a>
				
				
			<div style="padding-top:15px; font-size: 120%">
				<div style="color: white">
					<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
					<span class="orange">GeoTag</span>
				</div>
				<div style="color: white">
					<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
					Choose <span class="orange">Prices</span> and <span class="orange">Licenses</span>
				</div>
				<div style="color: white">
					<img width=30px height=60px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
					Get <span class="orange">High Revenues</span> (up to 85%)
				</div>
				<div style="float:left; margin-top:3px; margin-left:35px; font-size: 130%">
					<a href="<?php echo Yii::app()->createAbsoluteUrl('site/howitworks')?>">
						Learn more...
					</a>
				</div>
			</div>
		
		
		</div>
	</div>
</div>

<div style="color: white; position: absolute; bottom:100px; left:30px;">
	<h3 class="orange" style="margin: 0px">You do Nothing</h3><h5 style="margin: 0px">We do everything else</h5>
	<a class="blue" href="<?php echo Yii::app()->createAbsoluteUrl('site/youdonothing')?>">Learn more...</a>
</div>

<div style="position:fixed; bottom:80px; right:10px;">
	<a class="blue" style="font-size:90%" href="http://www.geostockphoto.com/photo/view/794/Civetta_delle_nevi">Photo #794 by theos682</a>
</div>

<div style="border-top: #A5BFDD 1px solid; position:fixed; bottom:0; width:100%; background-color: black">
	<div style="color:white">
		<?php $this->widget('application.components.widgets.Footer', array('footer_class'=>'footer_home')); ?>
	</div>
</div>