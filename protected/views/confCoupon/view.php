<?php
$this->breadcrumbs=array(
	'Conf Coupons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfCoupon', 'url'=>array('index')),
	array('label'=>'Create ConfCoupon', 'url'=>array('create')),
	array('label'=>'Update ConfCoupon', 'url'=>array('update', 'id'=>$model->idCoupon)),
	array('label'=>'Delete ConfCoupon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCoupon),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfCoupon', 'url'=>array('admin')),
);
?>

<h1>View ConfCoupon #<?php echo $model->idCoupon; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCoupon',
		'name',
		'code',
		'discount',
		'expiration_datetime',
		'insert_timestamp',
		'update_timestamp',
	),
)); ?>
