<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCoupon'); ?>
		<?php echo $form->textField($model,'idCoupon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expiration_datetime'); ?>
		<?php echo $form->textField($model,'expiration_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insert_timestamp'); ?>
		<?php echo $form->textField($model,'insert_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_timestamp'); ?>
		<?php echo $form->textField($model,'update_timestamp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->