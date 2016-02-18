<?php
if(isset($data->photoPrePost->lat) && isset($data->photoPrePost->lng)){
	$lat=$data->photoPrePost->lat;
	$lng=$data->photoPrePost->lng;
}else{
	$lat='null';
	$lng='null';
}
?>

<div class="view" id="view<?php echo $data->idProduct?>">
	<?php if($index==0) $border="border:3px solid #FFC345;"; else $border="";?>
	<div class="view_inner" <?php if($data->photoPrePost->ratio>1) echo "style='margin-top:".(60-60/$data->photoPrePost->ratio)."px'"?>>
		<?php
			$img = "<img class='photo' src='".$data->getUrl(120)."' style='".$border."' alt='' id='id".$data->idProduct."'>";
			$function = 'ajaxFunctionProductInfo(
				\''.Yii::app()->createUrl('photo/showInfoPhoto').'/id/'.$data->idProduct.'\','.
				$data->idProduct.','.
				$data->photoPrePost->lat.','.
				$data->photoPrePost->lng.',
				\'null\'); moveAndSelect('.$data->idProduct.');';
			echo CHtml::link(
				  $img,
				  '',
				  array('onclick' => $function, 'style'=>'cursor: pointer')
			);
		?>
	</div>
</div>