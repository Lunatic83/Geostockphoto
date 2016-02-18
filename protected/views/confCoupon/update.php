<?php
$this->breadcrumbs=array(
	'Conf Coupons'=>array('index'),
	$model->name=>array('view','id'=>$model->idCoupon),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfCoupon', 'url'=>array('index')),
	array('label'=>'Create ConfCoupon', 'url'=>array('create')),
	array('label'=>'View ConfCoupon', 'url'=>array('view', 'id'=>$model->idCoupon)),
	array('label'=>'Manage ConfCoupon', 'url'=>array('admin')),
);
?>

<h1>Update ConfCoupon <?php echo $model->idCoupon; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>