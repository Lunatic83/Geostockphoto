<?php if(isset($modelUser->name)){?>
	<p><?php echo $modelUser->name;?>,</p>
<?php }?>

<p>Your company has been selected by our staff to have access in preview
to our large database of photos from all over the world.
<?php if($modelUser->freeCredits>0){?>
	<br>We offer you <b><?php echo $modelUser->freeCredits?> free credits</b> that can be freely used 
	to purchase any photo you want.
<?php }?><br>
<?php echo CHtml::link('Click here to activate sales on GeoStockPhoto', Yii::app()->createAbsoluteUrl('user/pilot', array('verCode'=>$modelUser->verCode)));?>
</p>

<p>GeoStockPhoto is the new stock photo agency based on geolocation.<br>
A startup born in Italy, with the support of I3P (Incubatore di Imprese Innovative del Politecnico di Torino),
and headquarter in New York City.</p>

<p>The web platform is still in beta.<br>
Any feedback is very appreciated.<br>
Best Regards<br>
GeoStockPhoto team</p>

<p style="font-size: 80%">Your contact has been manually collected and selected by our staff.
You will not receive any further email from us.</p>