<script type="text/javascript">
	function confirmAccountDelete(){
		if(confirm('Do you want to delete your account? Are your sure? You will lost all your data!')){
			window.location = "<?php echo Yii::app()->createAbsoluteUrl('/user/remove/id/'.Yii::app()->user->id); ?>"
		}
		return false;
	}
	var redirect =  "<?php echo Yii::app()->createAbsoluteUrl('/user/remove/id/'.Yii::app()->user->id); ?>";
</script>

<?php echo $this->renderPartial('_formModify',
	array('modelUser'=>$modelUser,
		'modelProductPp'=>$modelProductPp,
        'shoppingOptMan'=>$shoppingOptMan,
        'shoppingOptManRm'=>$shoppingOptManRm,
        'personalContactsManager'=>$personalContactsManager,
        'personalStatisticsThreshold'=>$personalStatisticsThreshold,
        'personalInfoThreshold'=>$personalInfoThreshold,
		'personalContactsThreshold'=>$personalContactsThreshold,
	)
);?>
	
<div style="float: right; margin-bottom: 20px; font-size: 80%">
	<?php echo CHtml::link('Delete your profile', '', array('style'=>'cursor: pointer', 'onClick'=>'tstDeleteUser(redirect);'));?>
</div>