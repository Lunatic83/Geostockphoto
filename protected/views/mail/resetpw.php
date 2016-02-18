<h3>Hi <?php echo $modelUser->username; ?></h3>

<p>If you want to reset your password click <?php echo CHtml::link('Reset Password',  Yii::app()->createAbsoluteUrl('user/resetpwdo/idUser/'.$modelUser->idUser.'/vc/'.$modelUser->verificationCode.''));  ?> </p>
<p>Your username: <?php echo $modelUser->username; ?></p>
<p>Best Regards</p>
<p>GeoStockPhoto team</p>