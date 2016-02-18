<div style="background-color: #FFCCCC; border: 1px solid #FF3333; color: grey; padding: 0px 0px 0px 10px; ">
	<?php
		if(isset($formValidation['title']))
			 echo "<p>".$formValidation['title']."</p>";
		
		if(isset($formValidation['image']))
			echo "<p>".$formValidation['image']."</p>";
					
		if(isset($formValidation['idCategory1']))
			echo "<p>".$formValidation['idCategory1']."</p>";
		
		if(isset($formValidation['coordinate']))
			echo "<p>".$formValidation['coordinate']."</p>"; 
	?>
</div>

<p><?php echo CHtml::link('Please, try again!', Yii::app()->createUrl('/mobile/uploadPhoto'), array( "data-transition"=>"fade",  "data-role"=>"button","rel"=>"external"));?></p>

	