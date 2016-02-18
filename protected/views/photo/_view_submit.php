<div class="view" id="view<?php echo $data->idProduct?>">
	<?php if($index==0) $border="border:3px solid #FFC345;"; else $border="";?>
	<div class="view_inner" <?php if($data->photoPrePost->ratio>1) echo "style='margin-top:".(60-60/$data->photoPrePost->ratio)."px'"?>>
		<?php
			$img = "<img class='photo' src='".$data->getUrl(120)."' style='".$border."' alt='' id=".$data->idProduct.">";
			$fuction = "editSelectionJson('".Yii::app()->createUrl('photo/editSelectionJson')."', ".
				$data->idProduct.", ".$index.")";
			echo CHtml::link(
			  $img,
			  '',
			  array('onclick' => $fuction, 'style'=>'cursor: pointer')
			);
		?>
	</div>
</div>