<div id="photo-line-container" style="display:none">	
<?php
	if(count($topten)>0){
		echo "<ul style='margin-left:0px'><li>";
		if($offset_pre>=0){
			$img = "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-left-small.png'>";
			$url=Yii::app()->createUrl('photo/topten').'/idPhotoType/'.$idPhotoType.'/offset/'.$offset_pre.'/orderBy/'.$orderBy.'/showPage/'.$showPage;
			//Se cerco foto di un utente, di sicuro non ho i parametri della mappa
			if($user!=""){
				$url=$url."/user/".$user;
				$function = "ajaxFuncGenFade('".$url."', 'photo-line')";
			}else{
				$function = "ajaxFuncGenFade('".$url."', 'photo-line', getZoomAndParams)";
			}
			echo CHtml::link(
				  $img,
				  '',
				  array('onclick' => $function, 'style'=>'cursor: pointer;')
			)."</li>";
		}else 
			echo "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-left-small-grey.png'></li>";
			
		echo "<li style='margin:0px'><img style='border:0px;' src='".Yii::app()->baseUrl."/images/150px.png'></li>";
		for($i=0; $i<count($topten); $i++){
			$img = "<IMG SRC='".$topten[$i]->idProduct0->getUrl(120)."' alt='".$topten[$i]->title."'/>";
			if($showPage){
				$link = CHtml::link($img, Yii::app()->createUrl('photo/view').'/'.$topten[$i]->idProduct.'/'.$topten[$i]->idProduct0->urlTitle);
			}else{
				$function = 'ajaxFunctionProductInfo(\''.Yii::app()->createUrl('photo/showInfoPhoto').'/id/'.$topten[$i]->idProduct.'\','.$topten[$i]->idProduct.','.$topten[$i]->photo->lat.','.$topten[$i]->photo->lng.',\''.$topten[$i]->idProduct0->getUrl('circle').'\')';
				$link = CHtml::link($img, '', array('onclick' => $function, 'style'=>'cursor: pointer;'));
			}
			
			echo "<li style='width: 124px'>".$link."</li>";
		}
		
		echo "<li>";
		if(isset($offset_next) & $offset_next>0){
			$img = "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-right-small.png'>";
			$url=Yii::app()->createUrl('photo/topten').'/idPhotoType/'.$idPhotoType.'/offset/'.$offset_next.'/orderBy/'.$orderBy.'/showPage/'.$showPage;
			if($user!=""){
				$url=$url."/user/".$user;
				$function = "ajaxFuncGenFade('".$url."', 'photo-line')";
			}else
				$function = "ajaxFuncGenFade('".$url."', 'photo-line', getZoomAndParams)";
			echo CHtml::link(
				  $img,
				  '',
				  array('onclick' => $function, 'style'=>'cursor: pointer;')
			)."</li>";
		}else 
			echo "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-right-small-grey.png'></li>";
		echo "</li></ul>";
	}
	?>
</div>