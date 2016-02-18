
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploadmobile-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
	<?php echo $form->errorSummary($modelPhotoMobile); ?>

	<div class="row">
		<?php echo $form->labelEx($modelPhotoMobile,'title'); ?>
		<?php echo $form->textField($modelPhotoMobile,'title'); ?>
		<?php echo $form->error($modelPhotoMobile,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelPhotoMobile,'Photo'); ?>
		<?php echo $form->fileField($modelPhotoMobile,'image'); ?>
		
	</div>
	
		<?php echo $form->labelEx($modelPhotoMobile,'Category'); ?>
		<?php echo $form->dropDownList($modelPhotoMobile,'idCategory1',
				CHtml::listData($categories,'idCategory','name'),
				array('empty'=>'Select',)
				); ?>
		<?php echo $form->error($modelPhotoMobile,'idCategory1'); ?>

	
	
	<div class="row" style='display:none'>
		<?php echo $form->labelEx($modelPhotoMobile,'lat'); ?>
		<?php echo $form->textField($modelPhotoMobile,'lat',array('size'=>15,'maxlength'=>10)); ?>
		<?php echo $form->error($modelPhotoMobile,'lat'); ?>
	</div>
	
	<div class="row" style='display:none'>
		<?php echo $form->labelEx($modelPhotoMobile,'lng'); ?>
		<?php echo $form->textField($modelPhotoMobile,'lng',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($modelPhotoMobile,'lng'); ?>
	</div>	
	
	
	<input type="text" size="50" id="address_edit" name="address_edit" style="color:grey" onClick="make_blank(this)" onKeyPress="return submitenter(event, codeAddressMobile, this.value)" value="Search location...">
	<div id="map_canvas" style="width:100%; height:170px; border:2px solid;">
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array( "data-transition"=>"fade")); ?>
	</div>

<?php $this->endWidget(); ?>


