<div id="photo-line-container" style="display:none">
<?php
	if(count($topten)>0){
		echo "<ul style='margin-left:0px'><li>";
		if($offset_pre>=0){
			$img = "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-left-small.png'>";
			$url=Yii::app()->createUrl('user/topFive').'/offset/'.$offset_pre.'/orderBy/'.$orderBy;
			$function = "ajaxFuncGenFade('".$url."', 'photo-line', getParamsMap)";
			echo CHtml::link(
				  $img,
				  '',
				  array('onclick' => $function, 'style'=>'cursor: pointer;')
			)."</li>";
		}else 
			echo "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-left-small-grey.png'></li>";
			
		echo "<li style='margin:0px'><img style='border:0px;' src='".Yii::app()->baseUrl."/images/150px.png'></li>";
		for($i=0; $i<count($topten); $i++){
			$img = "<IMG class='top_ten' SRC='".$topten[$i]->getPhotoUrl(120)."' alt=''/>";
			//$function = 'ajaxFunctionProductInfo(\''.Yii::app()->createUrl('user/showInfoUser').'/id/'.$topten[$i]->idUser.'\','.$topten[$i]->lat.','.$topten[$i]->lng.', \'map_canvas_small\')';
			$function = 'ajaxFunctionProductInfo(\''.Yii::app()->createUrl('user/showInfoUser').'/id/'.$topten[$i]->idUser.'\','.$topten[$i]->idUser.','.$topten[$i]->lat.','.$topten[$i]->lng.',\''.$topten[$i]->getPhotoUrl('circle').'\')';
			$link = CHtml::link($img, '', array('onclick' => $function, 'style'=>'cursor: pointer;'));
			echo "<li style='width: 124px'>".$link."</li>";
			/*echo "<li style='width: 124px'>".CHtml::link(
				  $img,
				  //Yii::app()->createUrl('user/view').'/username/'.$topten[$i]->username
				  '',
				  array('onclick' => $function, 'style'=>'cursor: pointer;')
			)."</li>";*/
		}
		
		echo "<li>";
		if(isset($offset_next) & $offset_next>0){
			$img = "<IMG style='border:0' SRC='".Yii::app()->baseUrl."/images/arrow-right-small.png'>";
			$url=Yii::app()->createUrl('user/topFive').'/offset/'.$offset_next.'/orderBy/'.$orderBy;
			$function = "ajaxFuncGenFade('".$url."', 'photo-line', getParamsMap)";
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