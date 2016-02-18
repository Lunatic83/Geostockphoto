<?php
$displayShopping='';
$displayShoppingRF='';
$displayShoppingRM='';
if($model->shoppingPhotoType->licenseType=="diff"){
	echo "<span style='color:red'>Type of License is different between selected photos.</span>";
	$displayShopping='none';
}else if($model->shoppingPhotoType->licenseType=="RF"){
	$displayShoppingRM='none';
}else if($model->shoppingPhotoType->licenseType=="RM"){
	$displayShoppingRF='none';
}
?>
<div>
	<?php echo $form->label($modelShoppingType, $fieldShoppingType, array('style'=>'float:left; margin-top:3px; margin-left: 20px')); ?>
	<?php echo $form->dropDownList($modelShoppingType, $fieldShoppingType,
		CHtml::listData($licenseType, 'licenseType', 'licenseType'),
		array('empty'=>'--please select--', 'onchange'=>"selectionType()", 'style'=>'float:left; width:150px; margin-left:15px')
	); ?>
	<?php if($save){?>
		<div style="float: right; margin-right: 290px;">
			<?php
			if($displayShopping!='none' and ($displayShoppingRF!='none' or $displayShoppingRM!='none')){
				echo CHtml::ajaxSubmitButton(
					"Save these as your personal sale options",
					array('user/ajaxSaveShoppingUserDefault'),
					array(
						'beforeSend' => "js:function(){
							document.getElementById('msg_success').style.display='none';
							document.getElementById('msg_error').style.display='none';
						}",
						'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
					),
					array('class'=>'btn btn-big')
				);
			}?>
		</div>
	<?php }?>
</div>
				
<div id="shopping" style="display:<?php echo $displayShopping?>" >
	<div id="shoppingRF" style="display:<?php echo $displayShoppingRF?>" >
		<?php
		if($model->shoppingPhotoType->shoppingOptPhotos=="diff")
			echo "<span style='color:red'>License details are different between selected photos.</span>";
		?>
		<table id="shoppingOpts">
		    <thead>
		        <tr>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'idSize'); ?>Size</td>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'idLicense'); ?>License</td>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'price'); ?>Credits</td>
	            	<td><?php echo CHtml::link('', '', array('style'=>'cursor: pointer', 'onClick'=>'addShoppingOpt($(this), \''.get_class($modelShoppingType).'\')', 'class'=>'icon-plus'));?></td>
	            	<span style="color: transparent">.<span>
		        </tr>
		    </thead>
		    <tbody>
		    <?php
	    	if(isset($shoppingOptMan->items['n1'])){
			    foreach($shoppingOptMan->items as $id=>$modelShoppingOpt):
			    	$this->render('_formShoppingOpt', array('id'=>$id, 'model'=>$modelShoppingOpt, 'form'=>$form, 'sizes'=>$sizes, 'licenses'=>$licenses));
			    endforeach;
			}
		    ?>
		    </tbody>
		</table>
		<?php $this->render('shoppingOptJs', array('shoppingOpt'=>$shoppingOptMan, 'form'=>$form, 'sizes'=>$sizes, 'licenses'=>$licenses));?>
	</div>  <!-- END shopping RF -->
						
	<div id="shoppingRM" style="display:<?php echo $displayShoppingRM?>" >
		<?php
		if($model->shoppingPhotoType->shoppingOptPhotosRm=="diff")
			echo "<span style='color:red'>Licens details are different between selected photos.</span>";
		?>
		<table id="shoppingOpts" style="text-align: center;">
		    <thead>
		        <tr>
		            <td style="width:100px"><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'idSize'); ?>Size</td>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'price'); ?>Industry</td>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'price'); ?>Use</td>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'price'); ?>Duration</td>
		            <td><?php //echo $form->labelEx($shoppingOptMan->items['n1'],'price'); ?>Credits</td>
		            <td><?php echo CHtml::link('', '', array('style'=>'cursor: pointer', 'onClick'=>'addShoppingOptRm($(this), \''.get_class($modelShoppingType).'\')', 'class'=>'icon-plus'));?></td>
		            <span style="color: transparent">.<span>
		        </tr>
		    </thead>
		    <tbody>
		    <?php
	    	if(isset($shoppingOptManRm->items['n1'])){
			    foreach($shoppingOptManRm->items as $id=>$modelShoppingOpt):
			    	$this->render('_formShoppingOptRm', array(
		    			'id'=>$id,
		    			'model'=>$modelShoppingOpt,
		    			'modelDetails'=>$modelShoppingOpt->idRMdetails0,
		    			'form'=>$form,
		    			'sizesRM'=>$sizesRM,
		    			'durationRm'=>$durationRm,
		    			'licensesRM'=>$licensesRM));
			    endforeach;
			}
		    ?>
		    </tbody>
		</table>
		
		<div class='alert in alert-warning' style='text-align: center'>
			Any RM license comes with the original file of the photo.<br>
			Duration can be increased up to 3 years while purchasing the license.
		</div>
		<?php $this->render('shoppingOptRmJs', array(
			'shoppingOptRm'=>$shoppingOptManRm,
			'form'=>$form,
			'sizesRM'=>$sizesRM,
			'durationRm'=>$durationRm,
			'licensesRM'=>$licensesRM
		));?>
	</div>  <!-- END shopping RM -->
</div>  <!-- END shopping -->