<script type="text/javascript">
function make_blank(field){
	var test = field.value;
	if(test=="E-mail address"){
		field.value ="";
		field.style.color="black";
		madeblank=true;
	}
}
var madeblank=false;
window.onclick=function() {
	if(!madeblank){
		if(document.getElementById("LandingPage_email").value==""){
			document.getElementById("LandingPage_email").value="E-mail address";
			document.getElementById("LandingPage_email").style.color="grey";
		}
	}else
		madeblank=false;
}
</script>

<div id="brace"></div>
	<div class="start-block">
		<div class="twilight">
<div id="container">
<h1 style="display:none">GeoStockPhoto is the new stock and microstock photography web agency
  with the innovative geolocalization of the photos. You can find excellent
  images from all the world and breaking news photos in royalty-free and
  right-managed licenses. Photographers are free to decide licenses and
  prices of their photos and they are paid for what they deserve: up to
  85% of the photo's price anaytime the photo is sold.</h1>
<div id="header">
<div id="boxNL" align="center">
	<br>
	<div align="right" style="margin-right:30px">
		<?php
		 echo CHtml::link("<IMG style='border:0px' SRC='".Yii::app()->baseUrl."/images/landing/theme/United_Kingdom-.png' alt='EN'/>",
		 	Yii::app()->createUrl('photonhomepage/en'));
		?>
	</div>
	<h2><a href="http://www.GeoStockPhoto.com" style='border:0px'> <img style='border:0px' src="<?php echo Yii::app()->baseUrl?>/images/logo.png" alt="GeoStockPhoto"/></a></h2>
	<h1>PHOTOnHOMEPAGE</h1>
	Inviaci la tua foto migliore (min 4MP).<br>
	Potrebbe essere selezionata e visualizzata nella <b>homepage di GeoStockPhoto</b> che sta per essere lanciata!!!<br><br>
<div style="width:600px; margin:0 auto;">
  <div class="form" align="center">
    <?php
	$form=$this->beginWidget('CActiveForm', array(
				'id'=>'contest',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
			));
	?>
		
		<?php echo $form->errorSummary($model); ?>
		
		<!--<INPUT TYPE=FILE NAME="file"><br><br>-->
		<div class="row">
			<?php echo $form->fileField($model,'image'); ?>
			<?php echo $form->error($model,'image'); ?>
		</div></br>
		<div class="row">
			<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>32, 'value'=>'E-mail address', 'style'=>'color:grey', 'onClick'=>"make_blank(this)")); ?>
			<?php echo $form->error($model,'email'); ?>

			<?php
			echo CHtml::submitButton('Upload', array('submit'=>Yii::app()->createUrl('site/saveContest', array('lang'=>'it'))));
			/*echo CHtml::ajaxSubmitButton(
				"Invio",
				Yii::app()->createUrl('site/saveContest', array('lang'=>'it')),
				array('update' => '#msg')
			);*/
			?>
		</div>
			
	<?php $this->endWidget(); ?>
  </div>
  <div id="msg"><br></div>
  <div style="color:grey; font-size:85%">
  	Puoi sottometere una sola foto di cui devi essere autore.
	Assicurati di essere titolare di, o di avere ottenuto tutte le necessarie
	autorizzazioni dai titolari di, tutti i diritti relativi alla foto che sottometti.
	Gli autori delle foto selezionate saranno contattati privatamente e informati
	riguardo la privacy policy ed i termini e condizioni di utilizzo della foto.
	Sottomettendo la foto accetti che questa potrebbe, a nostra discrezione,
	essere postata (protetta dal watermark) sulla nostra pagina Facebook insieme
	al tuo nome in qualità di autore della stessa, indipendentemente dalla
	(e prima della)	selezione finale.
  </div>
  <br>
<div id="social">
<div id="boxnet">
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
    <div class="box_link">
	     <a class="sn_fb allineati" href="https://www.facebook.com/GeoStockPhoto" target="_blank">Facebook</a>
	     <a class="sn_tw allineati" href="https://twitter.com/#!/GeoStockPhoto" target="_blank">Twitter</a>
	</div>
	<script type="text/javascript">
		function social(id, url){
			var js,fjs=document.getElementsByTagName("script")[0];
			if(!document.getElementById(id)){
				js=document.createElement("script");
				js.id=id;
				js.src=url;
				fjs.parentNode.insertBefore(js,fjs);
			}
		}
		social("twitter-wjs", "//platform.twitter.com/widgets.js");
		social('facebook-jssdk', "//connect.facebook.net/it_IT/all.js#xfbml=1");
	</script>
	
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.GeoStockPhoto.com" data-text="Sell and buy photos from all the world!" data-via="GeoStockPhoto">Tweet</a>
	<div style="margin:3px 0px 0px 0px" class="fb-like" data-href="https://www.facebook.com/GeoStockPhoto" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="lucida grande">
    </div>
</div>
</div>
</div>
<br>
<p>&copy; 2012 <b><a href="http://GeoStockPhoto.com">GeoStockPhoto.com</a></b>. All rights reserved.</p><br>
</div>
</div>
</div>

</div>
</div>