<script type="text/javascript">
	function takePicture() {
		window.location = 'container://CameraManager/takePicture/';
	}
</SCRIPT>

<?php if(Yii::app()->user->isGuest){?>
	
	<p>Welcome to GeoStokPhoto Breaking News Application</p>
	<p><?php echo CHtml::link('Login',
		Yii::app()->createUrl('/mobile/login'),
		array( "data-transition"=>"fade",  "data-role"=>"button","rel"=>"external")
	);?></p>

<?php }else{?>
	
	<p><?php echo CHtml::link('Take a photo',
		Yii::app()->createUrl('/mobile/takePhoto'),
		array( "data-transition"=>"fade",  "data-role"=>"button", "rel"=>"external")
	);?></p>
	
	<p><?php echo CHtml::link('Upload a photo',
		Yii::app()->createUrl('/mobile/uploadPhoto'),
		array( "data-transition"=>"fade",  "data-role"=>"button","rel"=>"external")
	);?></p>
	
	<p><?php echo CHtml::link(
		  'Take a photo TEST',
		  '#',
		  array("style"=>"display:none",
		  	"data-transition"=>"fade",
		  	"data-role"=>"button",
		  	"rel"=>"external",
		  	'onclick' => 'takePicture()'
		  )
	);?></p>
	
<?php }?>
