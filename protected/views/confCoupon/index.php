<?php
$this->breadcrumbs=array(
	'Conf Coupons',
);

$this->menu=array(
	array('label'=>'Create ConfCoupon', 'url'=>array('create')),
	array('label'=>'Manage ConfCoupon', 'url'=>array('admin')),
);
?>

<h1>Conf Coupons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
