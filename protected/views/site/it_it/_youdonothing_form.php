<div style="margin-top: 10px">
	<hr>
	<h4 class="orange">Inviaci la tua richiesta</h4>
	<?php if(!isset($modelYoudonothing->idUser)){?>
		Compila il seguente form (campi con <span class="required">*</span> sono obbligatori).<br>
		Ti invieremo un'email con il nostro responso entro poche ore.
	
		<?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'youdonothing-form',
			'enableAjaxValidation'=>true,
			'htmlOptions'=>array(
		        'style'=>'margin-top: 20px'
		    )
		));
		?>
			<div style="margin-bottom: 10px">
				Quante foto hai nel tuo portfolio? <span class="required">*</span>
					<?php echo $form->textField($modelYoudonothing,'nPhotos',array('maxlength'=>5, 'class'=>'span1', 'style'=>'margin-left: 10px')); ?><br>
				Link al tuo Portfolio #1: <span class="required">*</span>
					<?php echo $form->textField($modelYoudonothing,'link1',array('maxlength'=>128, 'class'=>'span4', 'style'=>'margin-left: 10px')); ?><br>
				Link al tuo Portfolio #2:
					<?php echo $form->textField($modelYoudonothing,'link2',array('maxlength'=>128, 'class'=>'span4', 'style'=>'margin-left: 10px')); ?><br>
				Vuoi che inseriamo per te:&nbsp;&nbsp;&nbsp;
					Categoria <?php echo $form->checkBox($modelYoudonothing,'flagCategory',array('style'=>'margin-top:0px')); ?>&nbsp;&nbsp;&nbsp;
					Posizione <?php echo $form->checkBox($modelYoudonothing,'flagPosition',array('style'=>'margin-top:0px')); ?><br>
				Supporto (es. HD esterno, DVD...) <span class="required">*</span>
					<?php echo $form->textField($modelYoudonothing,'device',array('maxlength'=>15, 'class'=>'span3', 'style'=>'margin-left: 10px; margin-top: 10px')); ?><br>
				Vuoi che ti rispediamo indietro il tuo dispositivo?
					<?php echo $form->checkBox($modelYoudonothing,'flagSendBackDevice',array('style'=>'margin-left: 10px; margin-top:0px')); ?><br>
				Costo massimo (in US dollars) che non vuoi superare
					<?php echo $form->textField($modelYoudonothing,'upperBound',array('maxlength'=>5, 'class'=>'span1', 'style'=>'margin-left: 10px; margin-top: 10px')); ?><br>
				Accetta i <?php echo CHtml::link('Termini e Condizioni', Yii::app()->createUrl('/youdonothing-terms'));?>
					<?php echo $form->checkBox($modelYoudonothing,'acceptTerms',array('style'=>'margin-top:0px')); ?>
			</div>
			<?php
				echo CHtml::ajaxSubmitButton(
					"Invio",
					array('site/sentYoudonothing'),
					array('beforeSend' => "js:function(){document.getElementById('msg_error').style.display='none';}",
						'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('site/youdonothing')."', 'msg_error', 'null')}"
					),
					array('class'=>'btn btn-primary btn-small')
				);
			?>
			<br><br>
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
			
		<?php $this->endWidget(); ?>
	<?php }elseif(!isset($modelYoudonothing->confCode)){?>
		Ci hai gi&agrave inviato la tua richiesta.<br>
		<b style="color: red">Ti invieremo presto la nostra risposta via email.</b>
	<?php }elseif($modelYoudonothing->confCode=='00000000'){?>
		Ci dispiace informarti che la tua richiesta &egrave stata rifiutata.
	<?php }else{?>
		La tua richiesta &egrave stata approvata!<br>
		Ti abbiamo inviato un'email con tutti i dettagli riguardo i prezzi e le procedure.<br>
		Quando ci invii le tue foto, non dimenticare di inserire anche un foglio su cui devi scrivere <br>il tuo nome utente ed il seguente codice di attivazione
		<b><?php echo $modelYoudonothing->confCode?></b>.
	<?php }?>
</div>