<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-pilot-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'freeCredits'); ?>
		<?php echo $form->textField($model,'freeCredits'); ?>
		<?php echo $form->error($model,'freeCredits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business'); ?>
		<?php echo $form->textField($model,'business',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'business'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msgSent'); ?>
		<?php echo $form->textField($model,'msgSent'); ?>
		<?php echo $form->error($model,'msgSent'); ?>
	</div>


	<?php if(!$model->isNewRecord){?>
		<div class="row">
			<?php echo $form->labelEx($model,'idUser'); ?>
			<?php echo $form->textField($model,'idUser'); ?>
			<?php echo $form->error($model,'idUser'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'verCode'); ?>
			<?php echo $form->textField($model,'verCode',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'verCode'); ?>
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
	<?php }?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->