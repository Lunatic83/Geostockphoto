
<div class="container margin-top-bottom">
	<div class="well background_box" style="text-align: center">
		<h1>You do Nothing!</h1>
		<h4 class="orange">We do everything else.</h4>
		We have made every effort to simplify the process of uploading photos. But now we want to go overboard!
		<br><br>
		You have <b style="color: darkblue">thousands of photos</b>?<br>
		You have a <b style="color: darkblue">slow internet connection</b>?<br>
		You do not want to waste your time <b style="color: darkblue">categorizing your photos</b>?<br>
		You do not have the <b style="color: darkblue">gps coordinates</b> in your metadata?<br>
		<!-- Don't panic! The only thing you have to do is just <br> -->
		<b>Send us your photos in any physical storage device you prefer and we will...</b>.
		<div style="margin-bottom: 60px">
			<img style="margin: 10px" src="<?php echo Yii::app()->baseUrl?>/images/upload.jpg"/>
			<img style="margin: 10px" src="<?php echo Yii::app()->baseUrl?>/images/edit_photo_en.jpg"/>
			<img style="margin: 10px" src="<?php echo Yii::app()->baseUrl?>/images/geotag2.jpg"/><br>
			<div style="width: 170px; float: left; margin-left: 195px">Upload your photos<br>on GeoStockPhoto.</div>
			<div style="width: 170px; float: left">Edit the category<br>(optional).</div>
			<div style="width: 170px; float: left">Edit the coordinates<br>(optional).</div>
		</div>
		You will be ready to <b style="font-size: 170%">sell your photos on GeoStockPhoto</b> without lifting a finger!
		<?php if(Yii::app()->user->isGuest){?>
			<div style="margin-top: 5px">
				Do you want to know more?
			</div>
			<div style="margin: 5px">
				<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
				 - OR -  
				<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Register for Free</a>
			</div>
			<div>Already registered? <a class="darkblue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a></div>
		<?php }else{
			$this->renderPartial('_youdonothing_form', array('modelYoudonothing'=>$modelYoudonothing));
		}?>
		<hr>
		<h4 class="orange">Details and Prices</h4>
		<div style="text-align: justify">
			<i>You Do Nothing</i> is a pay-per-photo service. This means that you will be charged on the basis of how many photos
			you send us and what you want us to do with them. There are three operations we can do for you:
			
			<div style="margin: 10px">
			1. <b>Upload</b>: we quickly skim the photos and select those that may be of interest to GeoStockPhoto.
				We take care of uploading them to our website, ready to be edited and submitted.
			</div>
			<div style="margin: 10px">
			2. <b>Edit Category</b> (optional - required if you also request us to edit the position):
				we insert one of our category (e.g. landscape, buildings, animals, etc.)
				to each of your photos.	This information is the only one which is not read from the metadata of your files;
				and this process is mandatory in order to submit and sell your photos on GeoStockPhoto.
			</div>
			<div style="margin: 10px">
			3. <b>Edit Position</b> (optional): we insert the geographical position (i.e. gps coordinates) to your photos
				that do not already have this information on their metadata. We do not guarantee that we can do it for all of your photos
				(but only for those where the subject and title - which should be in the metadata - can
				help us in determining their position).
			</div>
			
			The following table shows you the price for each service that you can request:
			<table class="table table-bordered table-striped" style="width: 500px; margin-top: 10px; margin-left: 200px">
				<thead>
					<tr>
						<td width='180px'></td>
						<td style="text-align: right">Upload</td>
						<td style="text-align: right">Edit Category</td>
						<td style="text-align: right">Edit Position</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Price (US dollars per photo)</td>
						<td style="text-align: right">0.01</td>
						<td style="text-align: right">0.01</td>
						<td style="text-align: right">0.10</td>
					</tr>
				</tbody>
			</table>
			If you want us to send your storage device back to you, you will be also charged for the shipping costs, which depend on your location.
			We will email you an estimated shipping cost shortly after we receive your request.<br>
			You should also consider that after this process, all photos still have to be evaluated and they may be
			rejected.
		</div>
		<hr>
		<h4 class="orange">Special offer</h4>
		You pay only 50% after we have completed our work.<br>
		The remaining 50% will be deducted from your sales on GeoStockPhoto.
		<?php if(Yii::app()->user->isGuest){?>
			<div style="margin-top: 5px">
				If you want to partecipate...
			</div>
			<div style="margin: 5px">
				<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
				 - OR -  
				<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Register for Free</a>
			</div>
			<div>Already registered? <a class="darkblue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a></div>
		<?php }?>
	</div>
</div>