<?php 
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/shoppingOpt_sel.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
?>

<script type="text/javascript">
	$(function(){
		$('a.lightbox').lightBox();
	})
</script>

<div class="container well margin-top-bottom background_box">
 <div style="margin-bottom: 10px; text-align:center">
 	<a class="btn btn-small" href="<?php echo Yii::app()->createAbsoluteUrl('photo/submit')?>">Back to Upload</a>
 </div>
 
	<div class="alert in alert-block alert-info">
		<?php
		for($i=1; $i<=$selectedPhoto->count; $i++){
			if(isset($selectedPhoto->selection[$i])){
				$modelProductPp=$this->loadModel($selectedPhoto->selection[$i]);
		?>
       		<a class="lightbox" href="<?php echo $modelProductPp->getUrl(430)?>" title="<?php echo $modelProductPp->title?>">
				<IMG class="photo" SRC="<?php echo $selectedPhoto->fileName[$i]?>"  style="margin-bottom:5px"/>
       		</a>
		<?php }}?>
	</div>
	
	<?php
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'photo-form-remove',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
	        'onSubmit'=>'js: return false;'
	    )
		
	));
	?>
			<div style="text-align:center; margin-bottom:10px">
				<?php echo "Accept ".CHtml::link('Terms and Conditions for the Submit', Yii::app()->createUrl('/submit-terms'));?>
				<input id="termsAccepted_top" style="margin-top:0px" value="1" type="checkbox" onclick="duplicate('top');">
			</div>
			
			<div class="btn-group" style="text-align:center">		
				<?php 
					if(!$pending)
						$submitted=1;
					else
						$submitted=0;
					echo CHtml::ajaxSubmitButton(
						"Save",
						array('photo/ajaxSave', 'details'=>true, 'submitted'=>$submitted),
						array('beforeSend' => "js:function(){
								document.getElementById('msg_success').style.display='none';
								document.getElementById('msg_error').style.display='none';
								document.getElementById('msg_success_top').style.display='none';
								document.getElementById('msg_error_top').style.display='none';
							}",
							'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error_top', 'msg_success_top')}"
						),
						array('class'=>'btn btn-primary btn-small')
					);
					if($pending){
						echo CHtml::ajaxSubmitButton(
							"Submit",
							array('photo/submitted'),
							array('beforeSend' => "js:function(){
									document.getElementById('msg_success').style.display='none';
									document.getElementById('msg_error').style.display='none';
									document.getElementById('msg_success_top').style.display='none';
									document.getElementById('msg_error_top').style.display='none';
								}",
								'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('photo/submit', array('display'=>'submitSuccess'))."', 'msg_error_top', 'null')}"
							),
							array('class'=>'btn btn-small btn-primary')
						);
					}
					echo CHtml::submitButton(
						"Delete",
						array('submit'=>CController::createUrl('photo/deleteMultiplePhoto'), 'class'=>'btn btn-small btn-primary', 'onclick'=>'js: tstEditconfirm("delete");' )
					);
				?>
			</div>
			<br>
			<div id="msg_error_top" class="alert in alert-error" style="display:none"></div>
			<div id="msg_success_top" class="alert in alert-success" style="display:none">Form has been saved.</div>
				
		<div style='display:none'>
			<?php echo $form->textField($selectedPhoto,'count',array('size'=>2,'maxlength'=>2)); ?>
		</div>
		<?php for($i=1; $i<=$selectedPhoto->count; $i++){ ?>
			<div style='display:none'>
				<?php echo $form->textField($selectedPhoto,'selection['.$i.']',array('size'=>2,'maxlength'=>2, 'id'=>'SelectedPhoto_image'.$i)); ?>
			</div>
		<?php } ?>
		
	 	<div class="form-left" style="float:left; width:300px">
			<?php echo $form->label($modelProductPp,'title'); ?>
			<?php echo $form->textArea($modelProductPp,'title',array('rows'=>2, 'maxlength'=>128, 'class'=>'span4', 'style'=>'resize:none')); ?>
		
			<?php echo $form->label($modelProductPp,'description'); ?>
			<?php echo $form->textArea($modelProductPp,'description',array('rows'=>2, 'maxlength'=>128, 'class'=>'span4', 'style'=>'resize:none')); ?>
		
			<div style="display:none">
				<?php //echo $form->label($modelProductPp->photoPrePost,'idPhotoType'); ?>
				<?php echo $form->dropDownList($modelProductPp->photoPrePost,'idPhotoType',
						CHtml::listData($photoType,'idPhotoType','name'),
						array('empty'=>'--please select--', 'onchange'=>"changeCategories(2)")
						); ?>
				<?php //echo $form->error($modelProductPp->photoPrePost,'idPhotoType'); ?>
			</div>
	
			<div id="categories" <?php if($modelProductPp->photoPrePost->idPhotoType!=1) echo "style='display:none'" ?> >
				<?php echo $form->labelEx($modelProductPp->photoPrePost,'idCategory1', array('style'=>'float:left; margin-top:3px')); ?>
				<?php echo $form->dropDownList($modelProductPp->photoPrePost,'idCategory1',
						CHtml::listData($categories,'idCategory','name'),
						array('empty'=>'--please select--', 'style'=>'width:206px; margin-left:15px')
				); ?>
			</div>
			<div id="categoriesBN" <?php //if($modelProductPp->photoPrePost->idPhotoType!=2) echo "style='display:none'" ?> >
				<?php /*echo $form->labelEx($modelProductPp->photoPrePost,'idCategory1BN');
				echo $form->dropDownList($modelProductPp->photoPrePost,'idCategory1BN',
						CHtml::listData($categoriesBN,'idCategory','name'),
						array('empty'=>'--please select--',)
						); 
				echo $form->error($modelProductPp->photoPrePost,'idCategory1BN');*/ ?>
			</div>
	
			<div id="categories2" <?php if($modelProductPp->photoPrePost->idPhotoType!=1) echo "style='display:none'" ?> >
				<?php echo $form->labelEx($modelProductPp->photoPrePost,'idCategory2', array('style'=>'float:left; margin-top:3px')); ?>
				<?php echo $form->dropDownList($modelProductPp->photoPrePost,'idCategory2',
						CHtml::listData($categories,'idCategory','name'),
						array('empty'=>'--please select--', 'style'=>'width:206px; margin-left:15px')
						); ?>
			</div>
			<div id="categoriesBN2" <?php //if($modelProductPp->photoPrePost->idPhotoType!=2) echo "style='display:none'" ?> >
				<?php /*echo $form->labelEx($modelProductPp->photoPrePost,'idCategory2BN');
				echo $form->dropDownList($modelProductPp->photoPrePost,'idCategory2BN',
						CHtml::listData($categoriesBN,'idCategory','name'),
						array('empty'=>'--please select--',)
						); 
				echo $form->error($modelProductPp->photoPrePost,'idCategory2BN');*/ ?>
			</div>
			
			<?php echo $form->labelEx($modelProductPp->photoPrePost,'shootingDate', array('style'=>'float:left; margin-top:3px')); ?>
			<?php
			if(isset($modelProductPp->photoPrePost->shootingDate) && $modelProductPp->photoPrePost->shootingDate!='')
				$modelProductPp->photoPrePost->shootingDate=
					Yii::app()->dateFormatter->format('dd/MM/yyyy HH:mm:ss', $modelProductPp->photoPrePost->shootingDate);
					/*Yii::app()->dateFormatter->formatDateTime(
			            $modelProductPp->photoPrePost->shootingDate, 
			            'short','short'
					).' @ '.
					Yii::app()->dateFormatter->formatDateTime(
			            $modelProductPpProduct->photoPrePost->shootingDate, 
			            null,'short'
					)*/;
			Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			    $this->widget('CJuiDateTimePicker',array(
			        'model'=>$modelProductPp->photoPrePost, //Model object
			        'attribute'=>'shootingDate', //attribute name
			        'mode'=>'datetime', //use "time","date" or "datetime" (default)
			        'options'=>array(//'separator'=>' @ ',
				        'dateFormat'=>'dd/mm/yy',
			    		'timeFormat'=>'hh:mm:ss',
			    		'addSliderAccess'=>true,
			    		'showAnim' =>'slide'
			    	), // jquery plugin options
				    'language' => 'en_us',
			    	'htmlOptions'=>array(
				        'style'=>'width:174px; margin-left:15px'
				    ),
				    //'minDate' => 0
				)
			);?>
		
			<?php
			/*Yii::import('ext.jqAutocomplete');
			$json_options = array(
				'script'=> $this->createUrl('photo/autoCompleteKeyword',array('json'=>'true','limit'=>6)) . '/input/',
				'varName'=>'',
				'shownoresults'=>true,
				'maxresults'=>6,
				//'callback'=>'js:function(obj){ $(\'#json_info\').html(\'you have selected: \'+obj.id + \' \' + obj.value + \' (\' + obj.info + \')\'); }'	
			);
			jqAutocomplete::addAutocomplete('#test_json',$json_options);*/?>
		
		
			<span class="ac_holder">
				<?php echo "Keywords <span class='gsp-txt-color'>(separated by \";\") (max:10)</span>"; ?>
				<?php echo $form->textArea($modelProductPp,'keywordsCSV',array('rows'=>2, 'maxlength'=>128, 'id'=>"test_json", 'class'=>'span4', 'style'=>'resize:none')); ?>
			</span>
	
			<div style='display:none'>
				<?php //echo $form->labelEx($modelProductPp->photoPrePost,'lat'); ?>
				<?php echo $form->textField($modelProductPp->photoPrePost,'lat',array('size'=>15,'maxlength'=>10)); ?>
			</div>
			
			<div style='display:none'>
				<?php //echo $form->labelEx($modelProductPp->photoPrePost,'lng'); ?>
				<?php echo $form->textField($modelProductPp->photoPrePost,'lng',array('size'=>10,'maxlength'=>10)); ?>
			</div>	
		</div>
		
		<div style="float:right; width:620">
			<input type="text" id="address_edit" name="address_edit" style="width:545px; color:grey" onKeyPress="return submitenter(event, codeAddress, this.value)" placeholder="Search location...">
			<a style="margin-bottom: 10px" class="btn" onClick="js: codeAddress(document.getElementById('address_edit').value)">GO!</a>
			<div id="map_canvas_small" style="width:616px; height:350px; border:2px solid;">
			</div>
		</div>

		<div style="float:left; margin-top:30px">
			<div class="alert in alert-block alert-info">
				<?php $this->widget('application.components.widgets.ModifyShoppingOptions',
					array('form'=>$form,
						'modelProductPp'=>$modelProductPp,
						'shoppingOptMan'=>$shoppingOptMan,
			            'shoppingOptManRm'=>$shoppingOptManRm,
						'maxSize'=>$modelProductPp->photoPrePost->maxSize,
						'modelShoppingType'=>$modelProductPp->shoppingPhotoType,
						'fieldShoppingType'=>'licenseType'
					)
				);?>
			</div>
			
			<div style="text-align:center; margin-bottom:10px">
				<?php echo "Accept ".CHtml::link('Terms and Conditions for the Submit', Yii::app()->createUrl('/submit-terms'));?>
				<?php echo $form->checkBox($modelProductPp,'termsAccepted',array('style'=>'margin-top:0px', 'id'=>'termsAccepted',  'onclick'=>"duplicate()")); ?>
			</div>
			
			<div class="btn-group" style="text-align:center">		
				<?php 
					if(!$pending)
						$submitted=1;
					else
						$submitted=0;
					echo CHtml::ajaxSubmitButton(
						"Save",
						array('photo/ajaxSave', 'details'=>true, 'submitted'=>$submitted),
						array('beforeSend' => "js:function(){
								document.getElementById('msg_success').style.display='none';
								document.getElementById('msg_error').style.display='none';
								document.getElementById('msg_success_top').style.display='none';
								document.getElementById('msg_error_top').style.display='none';
							}",
							'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
						),
						array('class'=>'btn btn-primary btn-small')
					);
					if($pending){
						echo CHtml::ajaxSubmitButton(
							"Submit",
							array('photo/submitted'),
							array('beforeSend' => "js:function(){
									document.getElementById('msg_success').style.display='none';
									document.getElementById('msg_error').style.display='none';
									document.getElementById('msg_success_top').style.display='none';
									document.getElementById('msg_error_top').style.display='none';
								}",
								'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('photo/submit', array('display'=>'submitSuccess'))."', 'msg_error', 'null')}"
							),
							array('class'=>'btn btn-small btn-primary' )
						);
					}
					echo CHtml::submitButton(
						"Delete",
						array('submit'=>CController::createUrl('photo/deleteMultiplePhoto'), 'class'=>'btn btn-small btn-primary', 'onclick'=>'js: tstEditconfirm("delete");' )
					);
				?>
			</div>
			<br>
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
			<div id="msg_success" class="alert in alert-success" style="display:none">Form has been saved.</div>
		</div>
			
	<?php $this->endWidget(); ?>
	
</div>