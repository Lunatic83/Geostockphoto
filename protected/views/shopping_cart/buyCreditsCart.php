<div class="alert" style="margin-bottom: 0px">
	<a class="close icon-remove-sign" data-dismiss="alert"></a>
	<?php $cents="";
		$amount_str= $modelConfBuyCredits->shoppingCartCreditsAmount;
		$search = strpos($amount_str,'.');
		if($search == false){
			$cents=".00";  
		}
		//DA COMPLETARE IN CASO SI ALTRE CURRENCY
	?>
	
	<p>You need to buy <span id="creditsToBuy"><?php echo $modelConfBuyCredits->shoppingCartCreditsAmount ?></span> credits = 
		<b><span id="euroToPay">&#36;<?php echo $modelConfBuyCredits->shoppingCartCreditsAmount.$cents ?></span></b></p>
	
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'buyCredits-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>false,
		'action'=>Yii::app()->createUrl('paypal/buyCreditsCart'),
		'htmlOptions'=>array("style"=>'margin-bottom: 0px')
	)); ?>
	
		<?php echo $form->textField($modelConfBuyCredits,'shoppingCartCreditsAmount', array('id'=>'shoppingCartAmount', 'style'=>'display: none;')); ?>
		<input src="https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif" type="image"  value="submit" id="submitBtn">
	
		<script> 
			var dg1 = new PAYPAL.apps.DGFlow({ 
				// the HTML ID of the form submit button which calls setEC 
				trigger: "submitBtn" 
			});
		</script>
	<?php $this->endWidget(); ?>
</div>