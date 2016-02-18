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


<div id="home-container" class="container" style="margin-bottom:20px; margin-top:30px">
	<div style="width:100%; text-align:center">
		<div class="well home_box"
			onmouseover="removeBackground(this)";
			onmouseout="addBackground(this)"
		>
			<img height=80px src="<?php echo Yii::app()->request->baseUrl; ?>/images/geostockphoto_what_is.png" alt="GeoStockPhoto">
			<p>The new stock photo agency where photographers can sell their photos from all around the world at their conditions!</p>
			<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('photo/submit')?>">Upload your Photos!</a>
		</div>
		<div class="well home_box"
			onmouseover="removeBackground(this)";
			onmouseout="addBackground(this)"
			style="margin-bottom:0px; padding:0px; height:40px"
		>
			<div style="width:23%; float:left; margin-left:20px">
				<img width=40px height=80px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<b><span style="color:blue">GeoTag</span> your Photos</b>
			</div>
			<div style="width:35%; float:left">
				<img width=40px height=80px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<b>Choose <span style="color:blue">Prices</span> and <span style="color:blue">Licenses</span></b>
			</div>
			<div style="width:22%; float:left">
				<img width=40px height=80px src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue-check.png">
				<b>Get <span style="color:blue">High Revenues</span></b>
			</div>
			<div style="width:15%; float:left; margin-top:9px">
				<a href="<?php echo Yii::app()->createAbsoluteUrl('site/howitworks')?>">
					<?php if(Yii::app()->language=='it_it'){?>
						Scopri di pi&ugrave...
					<?php }else{?>
						Learn more...
					<?php }?>
				</a>
			</div>
		</div>
	</div>
</div>


<div id="home-container" class="container" style="margin-top:10px; margin-bottom:0px">
	<div style="width:100%; text-align:center">
		<div class="map_box column3">
			<a href="<?php echo Yii::app()->createUrl('photo/index')?>" style="color:black">
				<div
					class="well home_box"
					onmouseover="removeBackground(this)";
					onmouseout="addBackground(this)"
					style="padding:5px; height:165px;
				">
					<img style="float:left; margin-left:10px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/marker_icon.png">
					<h4>World is a<br>beautiful place.<br>Find it out!</h4>
					Navigate the map<br> and find your spot!
					<div
						style="background:url('<?php echo Yii::app()->request->baseUrl; ?>/images/label-map.jpg') center no-repeat;
							background-size:300px;
							height:40px;
							border-top:1px solid #A5BFDD;
							margin-top:9px"
					>
					</div>
				</div>
			</a>
		</div>
		<div class="column3" style="margin-left:21px">
			<a href="<?php echo Yii::app()->createUrl('user/create')?>" style="color:black">
				<div
					class="well home_box"
					onmouseover="removeBackground(this)";
					onmouseout="addBackground(this)"
					style="padding:5px; height:165px;
				">
					<img style="float:left; margin-left:10px" width=80px height=80px src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_100.jpg">
					<h4>100x100x100<br>1million reasons<br>to join us!</h4>
					Upload at least 100 photos and you will get 100% of revenue for 100 days.
					<p class="gsp-txt-color" style="margin-top:0px; font-size:90%">You have time until GeoStockPhoto<br>sells its first photo: hurry up!</p>
				</div>
			</a>
		</div>
		<div class="column3" style="margin-left:21px">
			<div
				class="well home_box"
				onmouseover="removeBackground(this)";
				onmouseout="addBackground(this)"
				style="height:136px">
				<?php if(Yii::app()->user->isGuest){?>
					<div style="margin-top:15px">
						<div class="buttons well-split">
								<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm.png' alt='' /></a>
						</div>
							<img style="margin-top:20px; margin-bottom:10px" width=200 src='<?php echo Yii::app()->baseUrl; ?>/images/login_bar_small.png'/>
						<br>
						<a style="font-size:150%" href="<?php echo Yii::app()->createAbsoluteUrl('user/create')?>">Register</a>
						&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<a style="font-size:150%" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a>
					</div>
				<?php }else{?>
					<div style="margin-top:5px">
						Hi <b><?php echo Yii::app()->user->username?></b>,<br>
						you may want to go to your...<br>
						<a class="btn btn-big btn-primary" style="margin-top:10px; width:100px" href="<?php echo Yii::app()->createAbsoluteUrl('portfolio/'.Yii::app()->user->username)?>">Portfolio</a><br>
						<a class="btn btn-big btn-primary" style="margin-top:10px; width:100px" href="<?php echo Yii::app()->createAbsoluteUrl('photo/status')?>">Status Photos</a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>



<div id="home-container" class="container" style="margin-top:0px">
	<div style="width:100%; text-align:center">
		<div 
			class="well home_box"
			onmouseover="removeBackground(this)";
			onmouseout="addBackground(this)"
			style="padding-top:10px; padding-bottom:5px; padding-left:0px">
			<?php $this->widget('application.components.widgets.Footer', array('footer_class'=>'footer_home')); ?>
		</div>
	</div>
</div>