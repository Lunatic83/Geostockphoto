<?php if(isset($modelUser->name)){?>
	<p><?php echo $modelUser->name;?>,</p>
<?php }?>

<p>GeoStockPhoto is a stock photo site with photos from all around the world.
Search the map for high-quality photographs in your area of interest, and select the size and licensing options that meet your needs.
<?php if($modelUser->freeCredits>0){?>
	<br>To get you started, here's <b><?php echo $modelUser->freeCredits?> free credits</b> 
	that can be used towards the purchase of any photo you want. 
<?php }?><br>
<?php echo CHtml::link('Click here to join GeoStockPhoto', Yii::app()->createAbsoluteUrl('user/pilot', array('verCode'=>$modelUser->verCode)));?>
</p>

<p>Any feedback is very appreciated.<br>
Best Regards<br>
GeoStockPhoto team</p>