<a href="http://www.geostockphoto.com"><img src="http://www.geostockphoto.com/images/geostockphoto_250.jpg" width="250" /></a>

<h3>Hi and thank you for sending us your photo!</h3>

<p><a href="<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl?>/contest_thumb<?php echo $modelLanding->contest->fileName?>.jpg" >Click here to see your photo.</a></p>

<?php if($modelLanding->isVerified!='1'){ ?>
<p>The launch date is coming but if you want to be sure to catch the chance...<br>
<b><?php echo CHtml::link('click here to confirm your subscription.', 
			Yii::app()->createAbsoluteUrl('site/verification/email/'.$modelLanding->email.'/vc/'.$modelLanding->verificationCode.''));?></b><br>
You will receive a notification with a welcome gift.</p>
<?php } ?>

<p>In the meanwhile, come to see our <a href="http://www.facebook.com/GeoStockPhoto">Facebook</a> and <a href="https://twitter.com/#!/GeoStockPhoto">Twitter</a> pages.<br>
See you soon!<br>
GeoStockPhoto Team</p>
<br>
<?php if($modelLanding->isPhotographer=='1'){?>
	<!--<p style='font-size:85%'>Ehi, are you a <b>professional photographer</b>? Send to <a href="mailto:info@geostockphoto.com">info@geostockphoto.com</a>
		a link with your portfolio and you may receive one more gift.</p>-->
<?php }?>