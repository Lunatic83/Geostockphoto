<div class="container-central-form" style='margin-left: 100px; margin-right: 100px; text-align: center'>
<div class="well background_box">
	<h3 class="darkblue">Crea un tuo Gruppo su GeoStockPhoto</h3>
	
	<div>
		<div class="alert in alert-success" style="width: 490px; float: left; margin-top: 15px; margin-bottom: 0px">
			<b>Cos'&egrave GeoStockPhoto?</b>
			E' l'esclusivo marketplace per fotografie georeferenziate che consente ai suoi iscritti di stabilire i prezzi e fissare le licenze di vendita.
			GeoStockPhoto, inoltre, &egrave l'unico marketplace dove i fotografi possono guadagnare fino all'85% su ogni foto venduta.
		</div>
		<div style="width: 150px; float: right">
			<img src="<?php echo Yii::app()->baseUrl?>/images/geotag_notext.jpg"/>
		</div>
	</div>
	
	<div>
		<div style="width: 150px; float: left; margin-top: 15px">
			<img src="<?php echo Yii::app()->baseUrl?>/images/community.jpg"/>
		</div>
		<div class="alert in alert-success" style="width: 490px; float: right; margin-top: 15px">
			<!-- <b>Cos'&egrave un Gruppo su GeoStockPhoto?</b> -->
			Sei responsabile di un <b>Gruppo</b> o un'associazione di fotografi?<br> Portalo su GeoStockPhoto: il guadagno &egrave doppio!<br>
			Potrai aumentare la <b>visibilit&agrave</b> del gruppo e dei suoi membri,<br>
			e ricevere una <b>percentuale extra dalle vendite</b> dei tuoi associati.
		</div>
	</div>
	
	<div style="clear: both; margin-bottom: 20px; margin-top: 40px">
		Guarda la pagina del nostro gruppo:<br>
		<?php echo CHtml::link('GeoStockPhoto Group', Yii::app()->createUrl('/groups')."/GeoStockPhoto")?>
	</div>
	
	<div style="clear: both; margin-bottom: 20px">
		Inoltre potrai scegliere se creare un gruppo ad accesso <b>libero</b> (per tutti gli utenti di GeoStockPhoto),
		oppure renderlo ad accesso <b>riservato</b> (solo gli utenti che deciderai tu potranno farne parte).<br>
		Ricorda per&ograve che la pagina del gruppo &egrave sempre visibile a tutti.
	</div>
	
	<div style="margin-bottom: 20px">
		Le <b>commissioni</b> sulle vendite assegnate all'amministratore del gruppo vengono calcolate come percentuale del guadagno netto
		che GeoStockPhoto ne ricava da ogni vendita. Queste hanno una durata di 5 anni da quando l'utente &egrave entrato a far parte del gruppo.
		<a name="commissions" class="anchor">&nbsp;</a>
		<table class="table table-bordered table-striped table-condensed" style="width:700px; margin-top: 10px">
			<thead>
				<tr>
					<td></td>
					<td><b>1&deg; anno</b></td>
					<td><b>2&deg; anno</b></td>
					<td><b>3&deg; anno</b></td>
					<td><b>4&deg; anno</b></td>
					<td><b>5&deg; anno</b></td>
				</tr>
			</thead>
			<tr>
				<td style="text-align: center"><b>Commissione</b></td>
				<td style="text-align: center">10%</td>
				<td style="text-align: center">8%</td>
				<td style="text-align: center">6%</td>
				<td style="text-align: center">4%</td>
				<td style="text-align: center">2%</td>
			</tr>
		</table>
	</div>
	
	<div style="clear: both; margin-bottom: 20px">
		Per maggiori informazioni si rimanda ai
		<?php echo CHtml::link('Termini e Condizioni', Yii::app()->createUrl('/group-terms'));?>.<br>
		Per qualunque altra necessit&agrave, non esitate a contattarci al nostro indirizzo email <?php echo CHtml::mailto("info@geostockphoto.com"); ?>
	</div>
	
	<?php if(Yii::app()->user->isGuest){?>
		<div style="margin-bottom: 20px">
			Richiedi subito la creazione di un <b>Gruppo</b> su GeoStockPhoto!
			<div style="margin: 5px">
				<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
				 - O -  
				<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Registrati gratis</a>
			</div>
			<div>Gi&agrave registrato? <a class="darkblue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a></div>
		</div>
	<?php }else{?>
		<div style="margin-bottom: 20px">
			Compila il seguente form per richiedere la <b>creazione di un nuovo Gruppo</b> su GeoStockPhoto.<br>
			Un addetto del nostro staff ti contatter&agrave al pi&ugrave presto.
		</div>
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'group-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
		        'onSubmit'=>'js: return false;'
		    )
		)); ?>
		<div style="clear: both">
			<div>
				Nome del gruppo
				<div>
					<?php echo $form->textField($modelGroup,'name',array('size'=>32,'maxlength'=>32)); ?>
				</div>		
			</div>
		
			<div class="control-group">
				<div>Accesso</div>
				<select style="width: 120px" name='ConfGroups[isReserved]'>
				  <option value="0">Pubblico</option>
				  <option value="1">Riservato</option>
				</select>
			</div>
		
			<div style="text-align:center">
				<div>	
					<?php echo "Accetta ".CHtml::link('Termini e Condizioni', Yii::app()->createUrl('/group-terms'));?>
					<?php echo $form->checkBox($modelGroup,'acceptTerms',array('style'=>'margin-top:0px')); ?>
				</div>
			</div>
			
			<div class="buttons" style="text-align: center">
				<?php
					//echo CHtml::submitButton('Invio',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0'));
					echo CHtml::ajaxSubmitButton(
						"Invio",
						array('user/ajaxCreateGroup'),
						array('beforeSend' => "js:function(){
								document.getElementById('msg_success').style.display='none';
								document.getElementById('msg_error').style.display='none';
							}",
							'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
						),
						array('class'=>'btn btn-primary', 'style'=>'margin: 15px 5px 0 0')
					);
					//echo CHtml::resetButton('Cancel',array('class'=>'btn', 'style'=>'margin: 15px 0 0 5px')); ?>
			</div>
		</div>
		<br>
		<div id="msg_error" class="alert in alert-error" style="display: none"></div>
		<div id="msg_success" class="alert in alert-success" style="display: none">
			La tua richiesta &egrave stata inviata.<br>
			Un addetto del nostro staff ti contatter&agrave presto.
		</div>
		<?php $this->endWidget();
	}?>

</div><!-- form -->
</div>