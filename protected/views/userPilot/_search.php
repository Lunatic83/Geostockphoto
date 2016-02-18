<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idUserPilot'); ?>
		<?php echo $form->textField($model,'idUserPilot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUser'); ?>
		<?php echo $form->textField($model,'idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verCode'); ?>
		<?php echo $form->textField($model,'verCode',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'freeCredits'); ?>
		<?php echo $form->textField($model,'freeCredits'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insert_timestamp'); ?>
		<?php echo $form->textField($model,'insert_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_timestamp'); ?>
		<?php echo $form->textField($model,'update_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msgSent'); ?>
		<?php echo $form->textField($model,'msgSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business'); ?>
		<?php echo $form->textField($model,'business',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->