<div class="container well margin-top-bottom background_box">
	<div style="margin: 10px; float: right">
		<input type="text" id="address_edit" name="address_edit" style="width:550px; color:grey" onKeyPress="return submitenter(event, codeAddress, this.value)" placeholder="Search location...">
		<div id="map_canvas_small" style="width:560px; height:300px; border:2px solid grey;">
		</div>
	</div>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'group-form',
 		'enableClientValidation' => false,
		'enableAjaxValidation'=>false,
		'action'=>Yii::app()->createUrl('user/savePhotoGroup/idGroup/'.$modelGroup->idGroup),
        'htmlOptions' => array(
        	'enctype' => 'multipart/form-data',
        	//'onSubmit'=>'js: return false;'
		),		
	)); ?>
		<div class="well" style="background: white; width: 300px; min-height: 300px; text-align: center; margin: 10px;">
			<div class="">
				<?php echo "<img src='".$modelGroup->getPhotoUrl()."'/>";?>
			</div>
			<?php echo $form->fileField($modelGroup,'imageProfile', array('size'=>10,'maxlength'=>10, 'style'=>'margin-top: 10px')); ?>
			<?php echo CHtml::submitButton('Upload photo', array('class'=>'btn btn-small btn')); ?>
		</div>
	<?php $this->endWidget(); ?>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'group-form',
	    /*'enableAjaxValidation'=>true,
 		'enableClientValidation' => false,
	    'clientOptions'=> array('validateOnSubmit'=>true,
        	'afterValidate'=>'js:function(){return false}'
        ),*/
		'enableAjaxValidation'=>false,
        'htmlOptions' => array(
        	//'enctype' => 'multipart/form-data',
        	'onSubmit'=>'js: return false;'
		),		
	)); ?>
		<div style='margin: 10px; float: left'>			
			<div>
				<div>
					<?php echo $form->labelEx($modelGroup,'name',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelGroup,'name',array('size'=>32,'maxlength'=>32, 'style'=>'width: 150px')); ?>
				</div>
				<div>
					<?php echo $form->labelEx($modelGroup,'town',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelGroup,'town',array('size'=>32,'maxlength'=>30, 'style'=>'width: 150px')); ?>
				</div>
				<div>
					<?php echo $form->labelEx($modelGroup,'country',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelGroup,'country',array('size'=>32,'maxlength'=>30, 'style'=>'width: 150px')); ?>
				</div>
			</div>
			
			<?php echo $form->hiddenField($modelGroup,'lat'); ?>
			<?php echo $form->hiddenField($modelGroup,'lng'); ?>
			
		</div>
			
		<div style='float: right; margin-right: 10px'>
			<div>
				<?php echo $form->labelEx($modelGroup,'description',array('class'=>'label-form-row')); ?>
				<?php echo $form->textArea($modelGroup,'description',array('rows'=>5, 'maxlength'=>256, 'style'=>'width: 430px; resize:none')); ?>
			</div>
		</div>
		
		<?php if(isset($modelGroup->photographer)){?>
			<div class="well">
				Biography
				<div style="margin: 10px 10px 0 0">
					<?php echo $form->textArea($modelGroup->photographer,'CVSummary',array('rows'=>10, 'maxlength'=>1800, 'style'=>'resize:none; width: 100%')); ?>
				</div>
			</div>
		<?php }?>
	
		<div style="clear: both">
			<div class="btn-group" style='text-align: center; margin-bottom: 10px'>
				<?php echo CHtml::ajaxSubmitButton(
					"Save",
					array('user/ajaxSaveModify_group/idGroup/'.$modelGroup->idGroup),
					array('beforeSend' => "js:function(){
							document.getElementById('msg_success').style.display='none';
							document.getElementById('msg_error').style.display='none';
						}",
						'complete'=>"js: function(xhr){
							submitted(xhr, 'null', 'msg_error', 'msg_success');
						}"
					),
					array('class'=>'btn btn-big btn-primary')
				);?>
	 			<a class="btn btn-big" href="<?php echo Yii::app()->createAbsoluteUrl('/groups')."/".$modelGroup->name?>">View</a>
			</div>
	 		
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
			<div id="msg_success" class="alert in alert-success" style="display:none">Form has been saved.</div>
		</div>
	<?php $this->endWidget(); ?>			
</div>