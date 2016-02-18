<h3>Hi <?php echo $modelUser->username; ?></h3>

<p>This email gives you notify that you changed your:</p>
<?php if($changeEmail){?>
	<p></p>
	<p>Email and you have reactivate your account click <?php echo CHtml::link('Activate',  Yii::app()->createAbsoluteUrl('user/verification/idUser/'.$modelUser->idUser.'/vc/'.$modelUser->verificationCode.''));  ?> </p>
<?php }?>
<?php if($changePassword){?>
	<p></p>
	<p>Password</p>
<?php }?>

<p>If this is not right please ask a queston to <?php echo CHtml::mailto('support@geostockphoto.com','support@geostockphoto.com')?> </p>
<p>Best Regards</p>
<p>GeoStockPhoto team</p>