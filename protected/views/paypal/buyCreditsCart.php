<div class="container well gsp-txt-color" style="text-align: center; margin-top: 100px; background:white">
	<h3>Buy credits</h3>
	<p>In order to buy your cart</p>
	<p>you need to buy <?php echo $modelConfBuyCredits->shoppingCartCreditsAmount ?> credits</p>
	<?php $cents="";
		
		$amount_str= $modelConfBuyCredits->shoppingCartCreditsAmount;
		$search = strpos($amount_str,'.');
		if($search == false){
			$cents=".00";  
		}
		//DA COMPLETARE IN CASO SI ALTRE CURRENCY
	?>
	<p>equals to <?php echo $modelConfBuyCredits->shoppingCartCreditsAmount.$cents ?> $</p>

	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'buyCredits-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>false,
	)); ?>
		<div class="row prepend-6 span-4">
			<?php echo $form->textField($modelConfBuyCredits,'shoppingCartCreditsAmount', array('size'=>4, 'id'=>'shoppingCartAmount', 'readOnly'=>'true', 'style'=>'border:none; background:white; font-weight: bold; display:none;')); ?>
		</div>
		<div class="row prepend-6 span-4">
			<input src="https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif" type="image"  value="submit" id="submitBtn" style='margin-left: 370px; margin-top:30px;'>
		</div>
	<script> 
	var dg1 = new PAYPAL.apps.DGFlow({ 
										// the HTML ID of the form submit button which calls setEC 
										trigger: "submitBtn" 
									});
	</script>   
	<?php $this->endWidget(); ?>
</div>