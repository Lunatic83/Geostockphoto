
<a href="http://www.geostockphoto.com"><img src="http://www.geostockphoto.com/images/geostockphoto_250.jpg" width="250" /></a>

<h3>Ciao e benvenuto in GeoStockPhoto!</h3>


<p>Manca ancora poco al lancio ma per non fartelo scappare...<br>
<b><?php echo CHtml::link('clicca qui per confermare la tua iscrizione.', 
			Yii::app()->createAbsoluteUrl('site/verification/email/'.$modelLanding->email.'/vc/'.$modelLanding->verificationCode.''));?></b><br>
Riceverai un avviso con un regalo di benvenuto.</p>

<p>Nell'attesa vieni a trovarci nelle nostre pagine <a href="http://www.facebook.com/GeoStockPhoto">Facebook</a> e <a href="https://twitter.com/#!/GeoStockPhoto">Twitter</a>.<br>
A presto!<br>
Lo staff di GeoStockPhoto</p>
<br>
<?php if($modelLanding->isPhotographer=='1'){?>
	<!--<p style='font-size:85%'>Ehi, sei un <b>fotografo professionista</b>? Mandaci all'indirizzo <a href="mailto:info@geostockphoto.com">info@geostockphoto.com</a> un link tramite il quale possiamo vedere il tuo portfolio e se lo riterremo interessante riceverai un ulteriore regalo.<br> 
	Se invece sei un acquirente, ti consigliamo di rifare la registrazione con quel ruolo così riceverai un regalo più appropriato.</p>-->
<?php }?>