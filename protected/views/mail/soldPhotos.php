<p>Hi <b><?php echo $modelUser->username; ?></b></p>

<p>Congratulations! Some of your photos have been sold on GeoStockPhoto.</p>

<?php for($i=0; $i<$photos['cnt']; $i++){
	echo "[".$photos['photos'][$i]['modelProductPp']->idProduct."] ".
		CHtml::link($photos['photos'][$i]['modelProductPp']->title, Yii::app()->createAbsoluteUrl('photo/view').'/'.$photos['photos'][$i]['modelProductPp']->idProduct.'/'.$photos['photos'][$i]['modelProductPp']->urlTitle).
		" <br>";
}?>

<p>Best Regards<br>
GeoStockPhoto team</p>