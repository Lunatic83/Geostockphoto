<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-coupon-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expiration_datetime'); ?>
		<?php echo $form->textField($model,'expiration_datetime'); ?>
		<?php echo $form->error($model,'expiration_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'insert_timestamp'); ?>
		<?php echo $form->textField($model,'insert_timestamp'); ?>
		<?php echo $form->error($model,'insert_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_timestamp'); ?>
		<?php echo $form->textField($model,'update_timestamp'); ?>
		<?php echo $form->error($model,'update_timestamp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->