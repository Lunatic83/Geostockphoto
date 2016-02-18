<script type="text/javascript" charset="utf-8">
	function closeEmbeddedFlow() {
		top.location.href='<?php //echo Yii::app()->createAbsoluteUrl('paypal/buyCreditsSelect'); ?>';
	}
	function closeIframe(){
		var div = window.parent.document.getElementById("PPDGFrame");
		div.parentNode.removeChild(div);
		var iframe = window.parent.document.getElementsByName('PPDGFrame')[0];
		iframe.parentNode.removeChild(iframe);
	}
</script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iframePaypal.css" />

<div class="background_box well" style="background: white; border:3px solid #08c; padding: 20px; text-align: center">
	<h2 class="darkblue">Transaction <span style="color: red">failure</span>:<br>payment not completed.</h2>
	<p>Your account has not been charged.</p>
	<p>Please retry again or contact us <br> <a href="mailto:info@geostockphoto.com">info@geostockphoto.com</a></p>
	<input onclick="closeIframe()" class="btn btn-primary" name="yt0" type="button" value="Close window"> 
</div>