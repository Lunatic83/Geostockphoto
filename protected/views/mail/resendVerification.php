<h3>Hi <?php echo $modelUser->username; ?></h3>

<p>Now you can activate your account and start to use GeoStockPhoto <?php echo CHtml::link('Activate',  Yii::app()->createAbsoluteUrl('user/verification/idUser/'.$modelUser->idUser.'/vc/'.$modelUser->verificationCode.''));  ?> </p>
<br>
<p>Best Regards</p>
<p>GeoStockPhoto team</p>