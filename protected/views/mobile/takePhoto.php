


<?php if(Yii::app()->user->isGuest){
		 	?>
		 		<p>Wellcome to Geostokphoto Breaking News Application</p>		
		 		<p><?php echo CHtml::link('Login', Yii::app()->createUrl('/mobile/login'), array( "data-transition"=>"fade",  "data-role"=>"button"));?></p>
		 	<?php			
		}else{
			?>
				<p>Which way do you want upload photo?</p>		
		 		<p><?php echo CHtml::link('Take a photo', Yii::app()->createUrl('/mobile/takePhoto'), array( "data-transition"=>"fade",  "data-role"=>"button"));?></p>
		 		<p><?php echo CHtml::link('Upload a photo', Yii::app()->createUrl('/mobile/uploadPhoto'), array( "data-transition"=>"fade",  "data-role"=>"button"));?></p>
		 	<?php
		}
?>
