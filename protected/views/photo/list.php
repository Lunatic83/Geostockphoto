<?php
	if(count($topten)>0){
		for($i=0; $i<count($topten); $i++){
			if($topten[$i]->idProduct0->photoPrePost->ratio>1){
				$marginTop=60-60/$topten[$i]->idProduct0->photoPrePost->ratio;
				$marginLeft=0;
			}else{
				$marginTop=0;
				$marginLeft=(int)(60-60*$topten[$i]->idProduct0->photoPrePost->ratio);
			}
			$function = 'ajaxFunctionProductInfo(\''.Yii::app()->createUrl('photo/showInfoPhotoNew').'/id/'.$topten[$i]->idProduct.'\','.$topten[$i]->idProduct.','.$topten[$i]->photo->lat.','.$topten[$i]->photo->lng.',\''.$topten[$i]->idProduct0->getUrl('circle').'\')';
			$img = "<IMG SRC='".$topten[$i]->idProduct0->getUrl(120)."' alt='".$topten[$i]->title."' style='margin:".$marginTop."px 0 ".$marginTop."px 0'/>";?>
			<li class="item">
				<a style="margin: 0 <?php echo $marginLeft?>px 0 <?php echo $marginLeft?>px; cursor: pointer" onclick="<?php echo $function?>" rel="nofollow">
					<?php echo $img?>
				</a>
			</li>
		<?php }
	}
?>