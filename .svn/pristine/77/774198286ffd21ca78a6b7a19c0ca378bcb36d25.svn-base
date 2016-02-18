<div class="container well gsp-txt-color background_box" style="text-align: center; margin-top: 100px; background:white">
	<h3>Promotions</h3>
	<?php if($promotionExist){ ?>
		<img style="max-height:250px; max-width:250px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $promotion; ?>.jpg" alt="GeoStockPhoto">
		<br><br>
		<?php if($promotionOwner){ ?>
			<p>Hi, this is the report page for the <b><?php echo $promotion ?></b> promotion.</p>
			<p>There are <b><?php echo $countUsers?></b> user(s) and a total amount of <b><?php echo $countPhotos?></b> photo(s) approved.</p>
		<?php }else{
			if(!$promotionAlreadyActive){ ?>
				<p>Congratulations! The <b><?php echo $promotion ?></b> promotion is now active for your GeoStockPhoto account.</p>
			<?php }else{ ?>
				<p>The <b><?php echo $promotion ?></b> promotion is already active in your account.</p>
			<?php } ?>
			<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('photo/submit')?>">Upload your Photos!</a>
		<?php }?>
	<?php }else{ ?>
		<p>Sorry! The <b><?php echo $promotion ?></b> promotion is not available.</p>
		<p>Check if the promotion link is correct.</p>
	<?php } ?>
</div>