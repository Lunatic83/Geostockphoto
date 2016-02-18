<div class="margin-top-bottom container well background_box" style="text-align: center">
	<h1 class="darkblue">Buy GeoStockPhoto Credits</h1>
	<p>Select the amount of credits you want to buy and then click <b>Pay with PayPal</b> to continue</p>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'buyCredits-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>false,
		'htmlOptions'=>array(),
		
	)); ?>
		<div class="row form-inline"  style="text-align: left; margin-left: 330px;">
			<?php				 
			//TODO al momento il prezzo mostrato all'utente è dentro la description e non attraverso l'amount, 
			//pensare ad un metodo per poter visualizzare la descrizione con il prezzo concatenato.
			$modelConfBuyCredits->idCreditsPacket=10;	//setto per selezionare una opzione ed evitare che vada in errore per mancata selezione.								 
			echo $form->radioButtonList($modelConfBuyCredits,'idCreditsPacket',
				 CHtml::listData($confBuyCredits,'idCreditsPacket','packetDescription'),
				 array('separator'=>'<br>'));									 
			?>
		</div>
		
		<input src="https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif" type="image"  value="submit" id="submitBtn" style="margin-top: 20px;">
		
		<script> 
		var dg1 = new PAYPAL.apps.DGFlow({ 
			// the HTML ID of the form submit button which calls setEC 
			trigger: "submitBtn" 
		});
		</script>   
	<?php $this->endWidget(); ?>

</div>