
<div class="container margin-top-bottom">
	<div class="well background_box" style="text-align: center">
		<h1>Mandaci le tue foto</h1>
		<h4 class="orange">A tutto il resto pensiamo noi.</h4>
		Caricare le tue foto su GeoStockPhoto &egrave gi&agrave molto semplice, ma vogliamo esagerare!
		<br><br>
		Hai <b style="color: darkblue">migliaia di foto</b>?<br>
		Hai una <b style="color: darkblue">connessione internet lenta</b>?<br>
		Non hai tempo per aggiungere la <b style="color: darkblue">categoria alle tue foto</b>?<br>
		I metadati non contengono le <b style="color: darkblue">coordinate GPS</b>?<br>
		<!-- Niente paura! L'unica cosa che devi fare &egrave <br> -->
		<b>Mandaci le tue foto nel supporto fisico che preferisci.<br>
		Noi penseremo a</b>:
		<div style="margin-bottom: 60px">
			<img style="margin: 10px" src="<?php echo Yii::app()->baseUrl?>/images/upload.jpg"/>
			<img style="margin: 10px" src="<?php echo Yii::app()->baseUrl?>/images/edit_photo_en.jpg"/>
			<img style="margin: 10px" src="<?php echo Yii::app()->baseUrl?>/images/geotag2.jpg"/><br>
			<div style="width: 170px; float: left; margin-left: 195px">Caricare le tue foto<br>su GeoStockPhoto.</div>
			<div style="width: 170px; float: left">Inserire la categoria<br>(opzionale).</div>
			<div style="width: 170px; float: left">Inserire le coordinate<br>(opzionale).</div>
		</div>
		Potrai cos&igrave iniziare a <b style="font-size: 170%">vendere le tue foto su GeoStockPhoto</b> senza muovere un dito!
		
		<?php if(Yii::app()->user->isGuest){?>
			<div style="margin-top: 5px">
				Vuoi saperne di pi&ugrave?
			</div>
			<div style="margin: 5px">
				<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
				 - O -  
				<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Registrati gratis</a>
			</div>
			<div>Gi&agrave registrato? <a class="darkblue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a></div>
		<?php }else{
			$this->renderPartial('_youdonothing_form', array('modelYoudonothing'=>$modelYoudonothing));
		}?>
		<hr>
		<h4 class="orange">Dettagli e prezzi</h4>
		<div style="text-align: justify">
			<i>Mandaci le tue foto</i> &egrave un servizio pay-per-photo. Questo vuol dire che il suo costo dipende dalla quantit&agrave di foto inviate e dal tipo di servizio richiesto. L'utente pu&ograve scegliere fra tre diverse opzioni:
			
			<div style="margin: 10px">
			1. <b>Caricamento</b>: GeoStockPhoto effettua una rapida scrematura delle foto e seleziona quelle che pi&ugrave si addicono al sito. Le foto verranno quindi caricate sul sito, pronte per le modifiche e la sottomissione.
			</div>
			<div style="margin: 10px">
			2. <b>Inserimento della categoria</b> (facoltativo - obbligatorio qualora l'utente scelga anche l'inserimento della posizione geografica):
				GeoStockPhoto provvede ad assegnare una categoria a ciascuna foto (ad esempio, animali, edifici, paesaggi, eccetera). Questa informazione - l'unica non contenuta nei metadati delle immagini - &egrave necessaria per passare alla fase della sottomissione e, quindi, alla vendita delle foto.
			</div>
			<div style="margin: 10px">
			3. <b>Inserimento della posizione geografica</b> (facoltativo): GeoStockPhoto aggiunge ad ogni foto le coordinate GPS nel caso in cui l'informazione non sia gi&agrave contenuta nei metadati. Non possiamo garantire che l'operazione sia svolta con successo e precisione per tutte le foto, e comunque occorre che siano accompagnate da titolo descrittivo tale da aiutare nel determinare la posizione corretta.
			</div>
			
			Nella tabella sono riportati i costi per ogni servizio:
			<table class="table table-bordered table-striped" style="width: 650px; margin-top: 10px; margin-left: 125px">
				<thead>
					<tr>
						<td width='180px'></td>
						<td style="text-align: right">Caricamento</td>
						<td style="text-align: right">Inserimento della categoria</td>
						<td style="text-align: right">Inserimento della posizione geografica</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Prezzo (dollari americani per foto)</td>
						<td style="text-align: right">0.01</td>
						<td style="text-align: right">0.01</td>
						<td style="text-align: right">0.10</td>
					</tr>
				</tbody>
			</table>
			All'utente sar&agrave addebitato anche il costo per la spedizione del supporto dati (se richiesto). Questo costo varia in base alle tariffe postali in vigore verso l'indirizzo dell'utente, il quale sar&agrave avvisato via email della ricezione e dell'invio del supporto.<br>
			Le operazioni effettuate sulle immagini non garantiscono l'accettazione automatica delle stesse. Tutte le foto, infatti, prima di essere pubblicate e messe in vendita devono superare la fase di valutazione, durante la quale alcune potrebbero essere rifiutate.
		</div>
		<hr>
		<h4 class="orange">Offerta lancio</h4>
		Per inaugurare il servizio, GeoStockPhoto permette ai suoi utenti di pagare solo il 50% del costo totale del servizio.<br>
		Il restante verr&agrave detratto dalle vendite dell'autore su GeoStockPhoto.
		<?php if(Yii::app()->user->isGuest){?>
			<div style="margin-top: 5px">
				Se vuoi partecipare...
			</div>
			<div style="margin: 5px">
				<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
				 - O -  
				<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Registrati gratis</a>
			</div>
			<div>Gi&agrave registrato? <a class="darkblue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a></div>
		<?php }?>
	</div>
</div>