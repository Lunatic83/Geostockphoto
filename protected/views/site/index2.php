<div class="index_top_container">
	<div class="container" style="padding-top: 15px; height: 100%">
		<div style="width: 33%; height: 100%; text-align: center; float: left">
			<h3 class="index_title">The Stock agency<br>for Geotagged Photos</h3>
			<div class="index_box_call well">
				<h5>DESIGNER</h5>
				<hr style="margin: 0 0 15px 0">
				Search all photos that you need on our map,
				purchase a license that suits you and pay only what you buy.<br>
				<a href="#bottom">Learn more...</a>
			</div>
			<div class="index_box_call well">
				<h5>PHOTOGRAPHER</h5>
				<hr style="margin: 0 0 15px 0">
				Upload your photos on our map, choose the license and the sale prices, and earn up to 85%.<br>
				<a href="#bottom">Learn more...</a>
			</div>
			<!-- <div class="alert in alert-error" style="padding: 10px 0 10px 0; margin: 0 10px 0 10px">Sales will open soon. Stay tuned.</div> -->
		</div>
		<div style="width: 145px; height: 100%; margin: 40px 0 0 20px; float: left">
			<div class="well index_info" id="map_canvas_small" style="width: 145px; height: 145px; padding: 0; margin-bottom: 10px">
				Loading map...
			</div>
			<div class="well index_info" style="width: 135px; padding: 5px; margin-bottom: 10px">
				<?php echo $modelProduct->title?>
			</div>
			<div class="well index_info" style="width: 135px; padding: 5px">
				Starting from<br>
				<div class="index_price">0,50 $</div>
				<!-- <div style="text-align: center">
					<a class="btn btn-warning btn-large" style="margin-top: 10px" href="">Buy Now</a>
				</div>
				<div class="alert in alert-error" style="padding: 10px; text-align: center">
					Sales will open soon. Stay tuned.
				</div> -->
			</div>
			<!-- <div class="alert in alert-error" style="padding: 10px; text-align: center">
				Sales will open soon. Stay tuned.
			</div> -->
		</div>
		<div style="width: 440px; height: 100%; margin: 40px 0 0 20px; float: left">
			<div class="well index_info" style="padding: 5px 5px 3px 5px; margin-bottom: 15px">
				<img alt="" src="<?php echo $modelProduct->idProduct0->getUrl(430)?>">
				<div style="text-align: right; margin: 3px 5px 0 0">by <?php echo $modelProduct->idUser0->username?></div>
			</div>
			<!-- <div style="text-align: center">
				<a class="btn" href="<?php //echo Yii::app()->createUrl('photo/map')?>">Explore the World</a>
			</div> -->
			<div style="float: left; width: 35%; text-align: center">
				<div style="height: 40px; margin-top: 5px">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_money.svg">
				</div>
				<div style="margin-top: 5px">Competitive prices and wages up to 85%</div>
			</div>
			<div style="float: left; width: 32%; text-align: center">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_map.svg">
				<div style="margin-top: 5px">Only geo-tagged photographs</div>
			</div>
			<div style="float: left; width: 33%; text-align: center">
				<div style="height: 40px; margin-top: 5px">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_rm_rf.svg">
				</div>
				<div style="margin-top: 5px">Choose the license that best suits you</div>
			</div>
		</div>
	</div>
</div>

<div class="index_middle_container alert in alert-error">
	Sales will open soon. Stay tuned.
</div>

<div class="index_bottom_container">
	<a id="bottom"> </a>
	<div class="container" style="padding-top: 20px; height: 100%">
		<div class="index_outer_desc">
			<?php if(Yii::app()->user->isGuest)
				$this->renderPartial('_create_user', array('fbLoginUrl'=>$fbLoginUrl, 'modelUser'=>$modelUser));
			else{?>
				<div
					class="well home_box"
					onmouseover="removeBackground(this)";
					onmouseout="addBackground(this)"
					style="padding:5px
				">
					<img style="float:left; margin-left:10px" width=80px height=80px src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_100.jpg">
					<h4>100x100x100<br>1million reasons<br>to join us!</h4>
					Upload at least 100 photos and you will get 100% of revenue for 100 days.
							<a class="btn btn-large btn-primary" style="width:200px; margin:5px" href="<?php echo Yii::app()->createAbsoluteUrl('photo/submit')?>">Upload your Photos</a>
					<p class="gsp-txt-color" style="margin-top:0px; font-size:90%">You have time until GeoStockPhoto<br>sells its first photo: hurry up!</p>
				</div>
			<?php }?>
		</div>
		<div class="index_outer_desc">
			<h5>PHOTOGRAPHER</h5>
			<div class="index_inner_desc">
				<div class="index_img_desc">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_registratore_cassa.svg">
				</div>
				<div class="index_text_desc">
					Protect your photos with the Right Managed licenses or increase your sales with Royalty Free licenses. <br>
					The choice is yours.
				</div>
			</div>
			<div class="index_inner_desc">
				<div class="index_img_desc">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_percentuale.svg">
				</div>
				<div class="index_text_desc">
					Get fair compensation from your sales. From 50% to 85% based on the number and quality of
					your photos plus your total earnings.
				</div>
			</div>
			<div class="index_inner_desc">
				<div class="index_img_desc">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_graph.svg">
				</div>
				<div class="index_text_desc">
					Enter in an open market. Customize your personal page and let
					designers from around the world find you.
				</div>
			</div>
		</div>
		<div class="index_outer_desc">
			<h5>DESIGNER</h5>
			<div class="index_inner_desc">
				<div class="index_img_desc">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_world.svg">
				</div>
				<div class="index_text_desc">
					Buy only geotagged photos to reduce search times and to
					be sure that you buy what you are looking for.
				</div>
			</div>
			<div class="index_inner_desc">
				<div class="index_img_desc">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_dollar.svg">
				</div>
				<div class="index_text_desc">
					You pay what you buy, without package deals or monthly subscriptions.
				</div>
			</div>
			<div class="index_inner_desc">
				<div class="index_img_desc">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/index_carrello.svg">
				</div>
				<div class="index_text_desc">
					Sure to find the photo that is right for you. Buy quality photos at the conditions that
					you prefer.
				</div>
			</div>
		</div>
	</div>
</div>