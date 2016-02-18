<?php
if(isset($data->idProduct0->photoPrePost->lat) && isset($data->idProduct0->photoPrePost->lng)){
	$lat=$data->idProduct0->photoPrePost->lat;
	$lng=$data->idProduct0->photoPrePost->lng;
}else{
	$lat='null';
	$lng='null';
}
?>

<div class="view" id="view<?php echo $data->idProduct?>" style="height: 165px">
	<?php if($index==0) $border="border:3px solid #FFC345;"; else $border="";?>
	<div class="view_inner" <?php if($data->idProduct0->photoPrePost->ratio>1) echo "style='margin-top:".(60-60/$data->idProduct0->photoPrePost->ratio)."px'"?>>
		<?php
			$img = "<img class='photo' src='".$data->idProduct0->getUrl(120)."' style='".$border."' alt='' id='id".$data->idTransactionPhoto."'>";
			$function = 'ajaxFunctionProductInfo(
				\''.Yii::app()->createUrl('photo/showInfoPhoto').'/id/'.$data->idProduct.'\','.
				$data->idProduct.','.
				$data->idProduct0->photoPrePost->lat.','.
				$data->idProduct0->photoPrePost->lng.',
				\'null\'); moveAndSelect('.$data->idTransactionPhoto.');';
			echo CHtml::link(
				  $img,
				  '',
				  array('onclick' => $function, 'style'=>'cursor: pointer')
			);
			
			$size_pre = 0;
			$licenseType=$data->idProduct0->transactionPhotos[0]->licenseType;
			$codeLicense="RM";
			$urlLicense=Yii::app()->createUrl('photo/license', array(
				'type'=>'license-right-managed',
				'idTransactionPhoto'=>$data->idTransactionPhoto
			));
			if($licenseType=='RF'){
				$transactions=$data->transactionPhotoRfs;
				// Check if this is extended
				$codeLicense=$transactions->idLicense0->name;
				if($codeLicense=="RFs")
					$urlLicense=Yii::app()->createUrl('photo/license', array(
						'type'=>'license-royalty-free-standard',
						'idTransactionPhoto'=>$data->idTransactionPhoto
					));
				else
					$urlLicense=Yii::app()->createUrl('photo/license', array(
						'type'=>'license-royalty-free-extended',
						'idTransactionPhoto'=>$data->idTransactionPhoto
					));
			}else if($licenseType=='RM')
				$transactions=$data->transactionPhotoRms;
			if($transactions->insert_timestamp>$timeWindow){
				$size = $transactions->idSize;
				echo CHtml::link("Download", "#",
					array("target"=>"_blank",
						"submit"=>Yii::app()->createUrl('photo/download',
							array('id'=>$data->idProduct,
								'idSize'=>$size,
								'licenseType'=>$licenseType
							)
						)
					)
				)."<br>";
			}
			echo CHtml::link("License ".$codeLicense." ".$transactions->idSize0->code, "#",
				array("target"=>"_blank",
					"submit"=>$urlLicense/*,
						array('id'=>$data->idProduct,
							'idSize'=>$size,
							'licenseType'=>$licenseType
						)
					)*/
				)
			);
			//echo "<br>".$transactions->insert_timestamp."<br>".$timeWindow;
		?>
	</div>
</div>