<?php if(isset($modelUser->name)){?>
	<p><?php echo $modelUser->name;?>,</p>
<?php }?>

<p>GeoStockPhoto &egrave; la nuova agenzia stock fotografica basata sulla geolocalizzazione dei contenuti.<br>
Una startup nata in italia, con l'appoggio di I3P (Incubatore di Imprese Innovative del Politecnico di Torino),
e con sede operativa a New York City.</p>

<p>
<?php if($modelUser->freeCredits>0){?>
	<br>Vi offriamo <b><?php echo $modelUser->freeCredits?> crediti gratis</b> da poter utilizzare liberamente
	per l'acquisto di qualunque foto desideriate.
<?php }?><br>
<?php echo CHtml::link('Clicca qui per accedere a GeoStockPhoto', Yii::app()->createAbsoluteUrl('user/pilot', array('verCode'=>$modelUser->verCode)));?>
</p>

<p>La piattaforma web &egrave; ancora in versione beta.<br>
Qualunque vostro feedback &egrave; ben gradito.<br>
Cordiali Saluti<br>
GeoStockPhoto team</p>

<p style="font-size: 80%">Il vostro contatto &egrave; stato manualmente raccolto e selezionato dal nostro staff.
Non riceverai ulteriori email da parte nostra.</p>