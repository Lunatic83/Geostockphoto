<p>Hi <b><?php echo $modelUser->username; ?></b></p>

<p>Welcome on <b>GeoStockPhoto</b>.</p>
<p><?php echo CHtml::link('Activate your account by clicking here',  Yii::app()->createAbsoluteUrl('user/verification/idUser/'.$modelUser->idUser.'/vc/'.$modelUser->verificationCode.''));  ?>. </p>

<p>Best Regards<br>
GeoStockPhoto team</p>