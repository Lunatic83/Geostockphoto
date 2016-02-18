<script type="text/javascript">	
	function uploaderStatusChanged( uploader ) {
	    // Here we check if the status is 0 which means that the uploading of all files
	    // finished, if it's 0 then alert that the upload process is completed.
	    if( uploader.getStatus() == 0 ){
	        window.location = "<?php echo $this->createUrl('photo/submit', array('display'=>'uploadSuccess')); ?>";
	    }//else{
	    	//window.location = "<?php //echo $this->createUrl('photo/submit', array('displayUploadError'=>'')); ?>";
	    //}
	}
</script>

<div style="margin-top: 10px">
<?php
$this->widget('ext.jumploader.jumploaderwidget', array(
	'width'=>273,
	'height'=>500,
	'maxUploadSize' => '900MB',
	'maxFileSize' => '30MB',
	'maxFiles' => '30',
	'allowedExtensions' => array('jpg', 'jpeg'),
	'uploadUrlAction' => $this->createUrl('photo/xUpload'),
	'appletOptions' => array(
		'vc_uploadViewRetryActionVisible' => true,
		'vc_uploadViewFilesSummaryBarVisible' => false,
		'vc_uploadViewPasteActionVisible' => false,
		'ac_fireUploaderStatusChanged' => true,
		'vc_uploadListViewName' => '_compact',
		'vc_useThumbs' => false,
		'vc_mainViewLogoEnabled' => false, //a pagamento
		'uc_directoriesEnabled' => true,
		'vc_uploadViewStartUploadButtonText' => 'Start upload',
		'vc_uploadViewStartUploadButtonImageUrl' => Yii::app()->baseUrl.'/images/media_play_green.png',
		'vc_uploadViewStopUploadButtonText' => 'Stop upload',
		'vc_uploadViewStopUploadButtonImageUrl' => Yii::app()->baseUrl.'/images/media_stop_red.png',
		'vc_guiProperties' => 'uploadFileList_compact.fixedCellWidth=240;
			uploadFileNameRenderer_compact.width=240;
			fileSizeRenderer_compact.width=30;
			fileSizeRenderer_compact.anchor=E;
			fileSizeRenderer_compact.horizontalSpace=5;
			transferProgressRenderer_compact.width=360; 
			fileStatusRenderer_compact.anchor=E; 
			fileStatusRenderer_compact.horizontalSpace=44'
	)
));
?>
</div>