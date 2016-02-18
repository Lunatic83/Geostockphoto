<script type="text/javascript" charset="utf-8">
	function closeEmbeddedFlow() {
		top.location.href='<?php echo Yii::app()->createAbsoluteUrl('shopping_cart/index'); ?>';
	}
	
	function closeIframe(amount){
		//checkNCredits(amount);
		var div = window.parent.document.getElementById("PPDGFrame");
		div.parentNode.removeChild(div);
		var iframe = window.parent.document.getElementsByName('PPDGFrame')[0];
		iframe.parentNode.removeChild(iframe);
	}

	// Non funziona perchè l'ifram è in https (c'è da vedere poi se funziona anche quando il nostro SC sarà in https)
	function checkNCredits(amount){
		var field_tot_elem = document.getElementById("totPrice");
		var totValue = parseFloat(field_tot_elem.value);
		var myCredits = document.getElementById('myCredits').value;
		myCredits+=amount;
		document.getElementById('myCredits').value=myCredits;
		diff=totValue-myCredits;
		if(diff<=0){
			document.getElementById('buttonBuy').style.display="";
			document.getElementById('buy_credits').style.display="none";
		}else{
			document.getElementById('buy_credits').style.display="";
			document.getElementById('creditsToBuy').innerText=diff;
			document.getElementById('euroToPay').innerText=diff;
			document.getElementById('shoppingCartAmount').value=diff;
			document.getElementById('buttonBuy').style.display="none";
		}
	}
</script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iframePaypal.css" />

<div class="background_box well" style="background: white; border:3px solid #08c; padding: 20px; text-align: center">
	<h2 class="darkblue">Transaction <span style="color: green">success</span>:<br>payment completed.</h2>
	<p>Your total credit amount<br> has been increased by <?php echo $amount?></p>
	
	<div class="btn-group">
		<!-- <input onclick="closeIframe(<?php echo $amount?>)" class="btn btn-primary" name="yt0" type="button" value="Close window"> -->
		<input onclick="closeEmbeddedFlow()" class="btn btn-primary" name="yt0" type="button" value="Go back to Shopping Cart">
	</div>
</div>
