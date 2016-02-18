<?php
$this->breadcrumbs=array(
	'User Pilots'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UserPilot', 'url'=>array('index')),
	array('label'=>'Create UserPilot', 'url'=>array('create')),
	array('label'=>'Update UserPilot', 'url'=>array('update', 'id'=>$model->idUserPilot)),
	array('label'=>'Delete UserPilot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUserPilot),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserPilot', 'url'=>array('admin')),
);
?>

<h1>View UserPilot #<?php echo $model->idUserPilot; ?></h1>

<h5 style='float: right;'>
<a href="<?php echo CController::createUrl('userpilot/create')?>">Create a new record</a>
</h5>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idUserPilot',
		'idUser',
		'name',
		'url',
		'freeCredits',
		'contact',
		'msgSent',
		'language',
		'state',
		'business',
		'verCode',
		'insert_timestamp',
		'update_timestamp',
	),
)); ?>

<div class="alert in alert-success">
Link for the registration is (send this to the pilot user):<br>
<b><?php echo Yii::app()->createAbsoluteUrl('user/pilot', array('verCode'=>$model->verCode))?></b>
</div>
