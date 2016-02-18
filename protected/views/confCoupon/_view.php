<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCoupon')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCoupon), array('view', 'id'=>$data->idCoupon)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expiration_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->expiration_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insert_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->insert_timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->update_timestamp); ?>
	<br />


</div>