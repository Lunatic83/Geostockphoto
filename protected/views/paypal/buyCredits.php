<h1>Buy Geostockphoto Credits</h1>


	<?php		//Display totals to user and request a "confirm" 
		echo "<h1>Confirm your payment</h1><table border='1'>"; 
		echo "<tr><td colspan='5'>Confirm Your Purchase</td></tr>"; 
		echo "<tr><td colspan='3'>Total:</td><td colspan='2'>" . $total . "</td></tr>"; 
		echo "</table>"; 
		echo "<form action='' method='post'><input type='submit' name='confirm' value='Confirm' /></form>"; 
		
		
		?>			


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'buyCredits-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'htmlOptions'=>array(),
	
)); ?>

	
	
	<div class="row">
		
		<?php 
		echo CHtml::radioButtonList('conf_buy_credits','',CHtml::listData($confBuyCredits,'idCreditsPacket','description'),array('separator'=>'<br>'));
		?>
	</div>


	<div class="row prepend-6 span-4">
		<?php echo CHtml::submitButton('Save',array('style'=>'margin-left: 40px;')); ?>
	</div>

		

<?php $this->endWidget(); ?>