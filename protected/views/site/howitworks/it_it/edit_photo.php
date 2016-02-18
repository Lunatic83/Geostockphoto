<div class="sub-title">Metadati EXIF e IPTC</div>
<div class="text">
	Durante l'upload delle fotografie, i metadati EXIF e IPTC vengono letti e memorizzati per velocizzare la successiva procedura di sottomissione,
	tramite la compilazione automatica di: titolo, keywords, posizione geografica e tutte le informazioni relative allo scatto (iso, apertura, tempo di esposizione e data).
	Sarà possibile modificare ogni campo, ad esclusione delle informazioni relative allo scatto, prima di portare a termine la sottomissione.

</div>
<br/>

<div class="sub-title">Selezione singola e multipla delle foto</div>
<div class="text">
	In <b>GeoStockPhoto</b> è possibile modificare i campi di più foto contemporaneamente. La selezione delle foto da editare avviene nella pagina
	<a href="<?php echo Yii::app()->createUrl('photo/submit')?>">Upload</a>.
	Di default è attiva la selezione singola per cui, cliccando su una foto, solamente quella foto è selezionata.
	Con un checkbox presente in alto alla pagina è possibile passare alla 
	selezione multipla per cui, cliccando sulle singole foto presenti nella pagina, queste vengono selezionate 
	(se non lo erano già) o, viceversa, deselezionate (se erano state precedentemente selezionate).
	Inoltre, tramite due pulsanti ("Select All" e "Deselect All") è possibile selezionare 
	o deselezionare tutte le foto presenti nella pagina.
	Come risultato di ogni selezione, il box laterale destro viene aggiornato con le informazioni comuni a tutte le foto selezionate.
</div>
<br/>

<!-- <div class="sub-title">High-Quality (HQ) o Breaking News (BN)</div>
<div class="text">
	<b>GeoStockPhoto</b> accetta e vende due tipi di fotografie:
	<ul>
		<li><b>High-Quality (HQ)</b>: fotografie di alta qualità che devono superare il sistema di valutazione prima di poter essere messe in vendita;
		<li><b>Breaking News (BN)</b>: foto di rilevanza giornalistica scattate nelle precedenti 24 ore alla sottomissione.
	</ul>
	Il processo di upload e sottomissione è identico per le due tipologie di fotografie, basta solo impostare il campo "tipo di foto" con una delle due opzioni.
</div>
<br/> -->

<div class="sub-title">Campi obbligatori e prezzi di vendita</div>
<div class="text">
	Il box laterale destro della pagina <a href="<?php echo Yii::app()->createUrl('photo/submit')?>">Upload</a> presenta un form con dei campi da compilare obbligatoriamente per poter 
	sottomettere le fotografie. I campi sono: titolo, <!-- tipo di foto (High-Quality o Breaking-News),  -->categoria e posizione geografica (selezionabile tramite mappa).
	Tra questi campi, l'unico che non viene letto dai metadati delle fotografie &egrave la categoria che dovrai selezionare tu 
	tramite un menù a tendina.<br>
	Potrai intervenire sulle foto selezionate tramite 3 pulsanti, per: <b>salvare</b> le informazioni inserite; <b>sottomettere</b> le foto al processo di valutazione;
	<!-- <b>eliminare</b> definitivamente le foto e le relative informazioni;  --><b>aggiungere/modificare dettagli e prezzi/licenze di vendita</b> o
	eliminare definitivamente la foto.
	Se effettui la sottomissione delle fotografie senza aggiungere o modificare dettagli, i prezzi/licenze di vendita saranno quelli stabiliti da <b>GeoStockPhoto</b> riportati nella seguente tabella:
	<br><br>
	<table class="table table-bordered table-striped table-condensed" style="width:80%">
		<tr>
			<td><b>Dimensione</b></td>
			<td><b>Risoluzione</b></td>
			<td><b>Licenza</b></td>
			<td><b>Prezzo</b></td>
		</tr>
		<!-- <tr>
			<td>XS</td>
			<td>300 x 200; 10.6cm x 6.9cm (@ 72dpi)</td>
			<td>RF Standard</td>
			<td>$0.5</td>
		</tr> -->
		<tr>
			<td>XS</td>
			<td>430 x 287; 15.2cm x 10.1cm (@ 72dpi)</td>
			<td>RF Standard</td>
			<td>1</td>
		</tr>
		<tr>
			<td>S</td>
			<td>1000 x 667; 8.5cm x 5.6cm (@ 300dpi)</td>
			<td>RF Standard</td>
			<td>3</td>
		</tr>
		<tr>
			<td>M</td>
			<td>3000 x 2000; 25.4cm x 16.9cm (@ 300dpi)</td>
			<td>RF Standard</td>
			<td>5</td>
		</tr>
		<tr>
			<td>L</td>
			<td>6000 x 4000; 50.8cm x 33.9cm (@ 300dpi)</td>
			<td>RF Standard</td>
			<td>7</td>
		</tr>
		<tr>
			<td>XL</td>
			<td>15000x10000; 127cm x 84.7cm (@ 300dpi)</td>
			<td>RF Standard</td>
			<td>9</td>
		</tr>
		<tr>
			<td>Original</td>
			<td>Dimensione originale della foto</td>
			<td>RF Extended</td>
			<td>20</td>
		</tr>
	</table>
	Le licenze e i prezzi di vendita stabiliti da <b>GeoStockPhoto</b> sono competitivi e puntano ad ottenere il massimo profitto per i fotografi. Pertanto, si consiglia a tutti gli utenti non professionisti 
	e non particolarmente esigenti di non modificarne i valori.  
</div>
<br/>

<div class="sub-title">Aggiungi/modifica dettagli e licenze/prezzi di vendita</div>
<div class="text">
	Dopo aver selezionato una o più foto nella pagina <a href="<?php echo Yii::app()->createUrl('photo/submit')?>">Upload</a>,
	è possibile andare nella pagina "Edit" cliccando sul relativo pulsante presente nel box laterale destro.
	In questa pagina sar&agrave; possibile aggiungere informazioni aggiuntive e non obbligatorie al fine della sottomissione (descrizione, seconda categoria, keywords), 
	modificare la posizione tramite una mappa di dimensioni maggiori, e modificare/eliminare/aggiungere una o più opzioni di vendita.
	Le seguenti tabelle mostrano i tipi di licenza messe a disposizione da <b>GeoStockPhoto</b>.
	<br><br>
	<table class="table table-bordered table-striped table-condensed">
		<tr>
			<td colspan="2"><b>Licenza</b></td>
			<td width="50%"><b>Utilizzo</b></td>
			<td><b>Durata</b></td>
		</tr>
		<tr>
			<td rowspan="2">Royalty-Free (RF)</td>
			<td>Standard (RFs)</td>
			<td>Abilita l'utente che la acquisisce ad utilizzare il file senza limiti di distribuzione e di numero di copie stampate, per: Siti web, blog, newsletter, web banner e illustrazioni,
				Articoli di stampa, pubblicazioni, libri, anche in copertina
				Pubblicità e promozione, brochure, cataloghi, pubblicazioni, documenti commerciali e professionali, packaging
				Presentazioni slide e video, illustrazione in produzioni TV, film, documentari
				Pannelli decorativi, incluse stampe delle immagini per utilizzo privato.</td>
			<td rowspan="2">Nessun limite</td>
		</tr>
		<tr>
			<td>Extended (RFe)</td>
			<td>Abilita chi la acquista per prodotti derivati destinati alla rivendita (cartoline, poster, canvas, abbigliamento, arredi, template...), oltre a quelli già coperti dalla licenza
				Royalty-Free Standard.</td>
		</tr>
		<tr>
			<td colspan="2">Right-Managed (RM)</td>
			<td>Abilita l'utente che la acquisisce ad utilizzare il file per un singolo e specifico utilizzo con le limitazioni indicate nella licenza (vedi tabella seguente).</td>
			<td>Da 3 mesi a 3 anni</td>
		</tr>
	</table>
	La seguente tabella elenca tutte le opzioni che definiscono l'utilizzo delle licenze Right-Managed (RM).
	Ogni licenza RM viene venduta con il file in formato originale. La durata di default delle licenze RM &eacute; di 3 mesi ma pu&ograve;
	essere estesa fino a 3 anni con il seguente aumento di prezzo: x1.2 per 6 mesi, x1.5 per 1 anno, x1.7 per 3 anni.
	<br><br>
	<table class="table table-bordered table-striped table-condensed" style="width:450px">
		<tr>
			<td><b>Settore</b></td>
			<td style="width: 500px"><b>Utilizzo</b></td>
			<td><b>Crediti</b></td>
		</tr>
		<tr>
			<td rowspan='7'>Pubblicit&agrave;</td>
			<td>Pagina Web</td>
			<td>100</td>
		</tr>
		<tr>
			<td>CD-ROM</td>
			<td>170</td>
		</tr>
		<tr>
			<td>Televisione</td>
			<td>2000</td>
		</tr>
		<tr>
			<td>Tabellone pubblicitario</td>
			<td>3750</td>
		</tr>
		<tr>
			<td>Giornale/Rivista</td>
			<td>3000</td>
		</tr>
		<tr>
			<td>Punto vendita</td>
			<td>3500</td>
		</tr>
		<tr>
			<td>Pubblicit&agrave; diretta via posta</td>
			<td>780</td>
		</tr>
		<tr>
			<td rowspan='6'>Editoria</td>
			<td>Copertina libro</td>
			<td>600</td>
		</tr>
		<tr>
			<td>Interno libro</td>
			<td>170</td>
		</tr>
		<tr>
			<td>Giornale</td>
			<td>500</td>
		</tr>
		<tr>
			<td>Copertina rivista</td>
			<td>800</td>
		</tr>
		<tr>
			<td>Interno rivista</td>
			<td>450</td>
		</tr>
		<tr>
			<td>Televisione</td>
			<td>350</td>
		</tr>
		<tr>
			<td rowspan='2'>Aziendale</td>
			<td>Stampa interna</td>
			<td>350</td>
		</tr>
		<tr>
			<td>Digitale interno</td>
			<td>500</td>
		</tr>
		<tr>
			<td rowspan='7'>Beni di consumo</td>
			<td>Copertina calendario</td>
			<td>700</td>
		</tr>
		<tr>
			<td>Interno calendario</td>
			<td>500</td>
		</tr>
		<tr>
			<td>Poster</td>
			<td>1150</td>
		</tr>
		<tr>
			<td>Puzzle</td>
			<td>700</td>
		</tr>
		<tr>
			<td>Cartoline</td>
			<td>400</td>
		</tr>
		<tr>
			<td>Cartoline elettroniche</td>
			<td>450</td>
		</tr>
		<tr>
			<td>Confezioni</td>
			<td>450</td>
		</tr>
	</table>
	<br>
</div>