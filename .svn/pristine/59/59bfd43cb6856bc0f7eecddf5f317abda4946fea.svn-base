<script type="text/javascript">
	function make_blank(field){
		var test = field.value;
		if(test=="Indirizzo e-mail"){
			field.value ="";
			field.style.color="black";
			madeblank=true;
		}
	}
	var madeblank=false;
	window.onclick=function() {
		if(!madeblank){
			if(document.getElementById("LandingPage_email").value==""){
				document.getElementById("LandingPage_email").value="Indirizzo e-mail";
				document.getElementById("LandingPage_email").style.color="grey";
			}
		}else
			madeblank=false;
	}
</script>

<div id="container">
<h1 style="display:none">GeoStockPhoto è la nuova agenzia di stock photografica con l'innovativa geolocalizzazione delle foto.
	Potete trovare ottime immagini da tutto il mondo e le fotografie delle ultime ore in licenze royalty-free e right-managed.
	I fotografi sono liberi di decidere le licenze, i prezzi delle loro foto e
	vengono pagati per quello che meritano: fino all'85% del prezzo di ogni loro foto venduta.</h1>
<div id="header">
<h2><a href="http://www.GeoStockPhoto.com" style="float:left;"> <img src="<?php echo Yii::app()->baseUrl?>/images/geostockphoto.jpg" width="470" height="80" alt="GeoStockPhoto"/></a></h2>
<div align="right">
	<?php
	 echo CHtml::link("<IMG SRC='".Yii::app()->baseUrl."/images/landing/theme/United_Kingdom-.png' alt='ITA'/>",
	 	Yii::app()->createUrl('en'));
	?>
	<br><br><br><br><br>
</div>
<div id="containerslider">
	<div id="example"> <img src="<?php echo Yii::app()->baseUrl?>/images/landing/new-ribbon.png" width="87" height="87" alt="New Ribbon" id="ribbon">
		<div id="slides">
			<div class="slides_container">
		    	<img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ita-01.jpg" width="570" height="270" alt="Slide 1">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ita-02.jpg" width="570" height="270" alt="Slide 2">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ita-03.jpg" width="570" height="270" alt="Slide 3">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ita-04.jpg" width="570" height="270" alt="Slide 4">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ita-05.jpg" width="570" height="270" alt="Slide 5">
			    <img src="<?php echo Yii::app()->baseUrl?>/images/landing/SLIDE-ita-06.jpg" width="570" height="270" alt="Slide 6">
			</div>
			<a href="#" class="prev">
				<img src="<?php echo Yii::app()->baseUrl?>/images/landing/theme/arrow-prev.png" width="24" height="43" alt="Arrow Prev">
			</a>
			<a href="#" class="next">
				<img src="<?php echo Yii::app()->baseUrl?>/images/landing/theme/arrow-next.png" width="24" height="43" alt="Arrow Next">
			</a>
		</div>
		<img src="<?php echo Yii::app()->baseUrl?>/images/landing/theme/FRAME_1.png" width="739" height="341" alt="Example Frame" id="frame">
	</div>
</div>
<div id="boxNL" align="center">
	Se vuoi essere tra i primi nostri utenti, inviaci il tuo indirizzo email.<br>
	Ti contatteremo non appena GeoStockPhoto sarà online<!-- con un <b>regalo di benvenuto</b>-->.<br><br>
<div style="width:600px; margin:0 auto;">
  <div class="form" id='form'>
 
<?php
$form=$this->beginWidget('CActiveForm', array(
			'id'=>'landing-page',
			'enableAjaxValidation'=>true,
    		//'enableClientValidation'=>true,
    		'clientOptions' => array(
    			'validateOnSubmit'=>true)
		));
?>
	
	<div class="row">
		<?php echo $form->dropDownList($model,'isPhotographer',
				array('1'=>'Fotografo', '2'=>'Acquirente')
				); ?>
		<?php echo $form->error($model,'isPhotographer'); ?>

		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>32, 'value'=>'Indirizzo e-mail', 'style'=>'color:grey', 'onClick'=>"make_blank(this)")); ?>

		<?php
		echo CHtml::ajaxSubmitButton(
			"Invio",
			Yii::app()->createUrl('site/saveLanding', array('lang'=>'it')),
			array('update' => '#msg')
		);
		?>
		<?php echo $form->error($model,'email'); ?>
	</div>
		
<?php $this->endWidget(); ?>	

</div>	
<div id="msg"></div>
</div>
<br><hr>
<table style="vertical-align:middle">
	<tr style="vertical-align:middle">
		<td>
			<IMG SRC='<?php echo Yii::app()->baseUrl?>/images/new.jpg'/>
		</td>
		<td style="vertical-align:middle; font-size:150%">
			Sei un <b>fotografo</b>?<br>
			Partecipa a<br>
			<?php
			 echo CHtml::link("<span style='font-size:130%; color:#06C'><b>PHOTOnHOMEPAGE</b></span>",
			 	Yii::app()->createUrl('photonhomepage/it'));
			?>
		</td>
	</tr>
</table>
<hr>
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
	<div class="fb-like" data-href="https://www.facebook.com/GeoStockPhoto" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="lucida grande">
	</div>
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.GeoStockPhoto.com" data-text="Vendi e compra foto da tutto il mondo!" data-via="GeoStockPhoto">Tweet</a>

	<script>
		!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0];
			if(!d.getElementById(id)){
				js=d.createElement(s);
				js.id=id;
				js.src="//platform.twitter.com/widgets.js";
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document,"script","twitter-wjs");
	</script>
</div>

<br>
<p>&copy; 2012 <a href="http://GeoStockPhoto.com">GeoStockPhoto.com</a>. All rights reserved.</p>
<p>Email: <a href="info@geostockphoto.com">info@geostockphoto.com</a></p>
</div>
</div>
</div>