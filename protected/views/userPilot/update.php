<?php
$this->breadcrumbs=array(
	'User Pilots'=>array('index'),
	$model->name=>array('view','id'=>$model->idUserPilot),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserPilot', 'url'=>array('index')),
	array('label'=>'Create UserPilot', 'url'=>array('create')),
	array('label'=>'View UserPilot', 'url'=>array('view', 'id'=>$model->idUserPilot)),
	array('label'=>'Manage UserPilot', 'url'=>array('admin')),
);
?>

<h1>Update UserPilot <?php echo $model->idUserPilot; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>