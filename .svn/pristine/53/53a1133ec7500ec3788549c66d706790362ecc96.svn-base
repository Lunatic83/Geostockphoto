<div class="container-central-form gsp-txt-color" style='margin-left: 200px; margin-right: 200px;'>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true,),
	'htmlOptions' => array('class'=>'well background_box'),
)); ?>

	<div class="buttons well-split" style="text-align:center;">
			<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm.png' alt='' /></a>
	</div>
	<br><br>
		<img src='<?php echo Yii::app()->baseUrl; ?>/images/login_bar.png' alt='' />
	<br><br>
	
	<h3>Create GeoStockPhoto Account</h3>

<div style="margin-top:30px;">
	<div class="control-group">
		<?php echo $form->label($modelUser,'username',array('class'=>'control-label span2', 'style'=>'float:left;margin-top: 5px;')); ?>
		<div class="controls">
			<?php echo $form->textField($modelUser,'username',array('size'=>32,'maxlength'=>32)); ?>
		</div>
			<span class="help-inline " style="margin-bottom: 10px;"><?php echo $form->error($modelUser,'username',array('style'=>'color: red')); ?></span>		
	</div>

	<div class="control-group">
		<?php echo $form->label($modelUser,'clearpassword',array('class'=>'control-label span2','style'=>'float:left;margin-top: 5px;')); ?>
		<div class="controls">
			<?php echo $form->passwordField($modelUser,'clearpassword',array('size'=>32)); ?>
		</div>
			<span class="help-inline " style="margin-bottom: 10px;"><?php echo $form->error($modelUser,'clearpassword',array('style'=>'color: red')); ?></span>		
	</div>

    <div class="control-group">
    	<?php echo $form->label($modelUser,'clearpassword_repeat',array('class'=>'control-label span2','style'=>'float:left;margin-top: 5px;')); ?>
    	<div class="controls">
    		<?php echo $form->passwordField($modelUser,'clearpassword_repeat',array('size'=>32)); ?>
    	</div>
    		<span class="help-inline " style="margin-bottom: 10px;"><?php echo $form->error($modelUser,'clearpassword_repeat',array('style'=>'color: red')); ?></span>
    </div>

	<div class="control-group">
    	<?php echo $form->label($modelUser,'email',array('class'=>'control-label span2','style'=>'float:left;margin-top: 5px;')); ?>
    	<div class="controls">
    	<?php echo $form->textField($modelUser,'email',array('size'=>32,'maxlength'=>255)); ?>
    	</div>
    		<span class="help-inline" style="margin-bottom: 10px;"><?php echo $form->error($modelUser,'email',array('style'=>'color: red')); ?></span>
    </div>

	<div class="control-group">
    	<?php echo $form->label($modelUser,'email_repeat',array('email class'=>'control-label span2','style'=>'float:left;margin-top: 5px;')); ?>
    	<div class="controls">
    	<?php echo $form->textField($modelUser,'email_repeat',array('size'=>32,'maxlength'=>255)); ?>
    	</div>
    		<span class="help-inline " style="margin-bottom: 10px;"><?php echo $form->error($modelUser,'email_repeat',array('style'=>'color: red')); ?></span>
    </div>
    
    <div class="control-group">
    	<label class="control-label span2" style="float:left;margin-top: 5px;" for="Coupon">Coupon</label><div class="controls">
    	<input size="32" maxlength="8" name="Coupon" id="Coupon" type="text" value="<?php echo $coupon?>"></div>
    </div>
    
    <?php if($modelUser->idUserPanoramio!=null){?>
    	<div class="well" style="text-align: center; padding-bottom: 30px">
    		<p>My Panoramio ID</p>
    		<?php echo $form->textField($modelUser, 'idUserPanoramio', array('placeholder'=>"Panoramio ID User", 'maxlength'=>8, 'class'=>'span2', 'style'=>'text-align: center')); ?><br>
			<div style="text-align: justify; font-size: 85%; line-height: 135%">
			<?php if(Yii::app()->language=='it_it'){?>
				Barrando questa casella nella tua qualit&agrave di Utente Panoramio: (i) autorizzi GeoStockPhoto a creare una copia, per tuo conto,
				delle tue foto caricate su Panoramio e a caricare, per tuo conto, tale copia sul sito web di GeoStockPhoto allo scopo di usufruire
				dei servizi di GeoStockPhoto; (ii) dichiari che l'ID "My Panoramio ID" che hai fornito a GeoStockPhoto &egrave il tuo ID Panoramio personale;
				e (iii) ti assumi ogni e qualsivoglia responsabilit&agrave che possa sorgere con riferimento all'eventuale violazione di quanto previsto al punto (ii) da parte tua.
				<br><span style="font-size: 120%; line-height: 180%; float: right"><b>Accetto</b>
			<?php }else{?>
				By ticking this box you, in your capacity as Panoramio User: (i) authorize GeoStockPhoto to create a copy, on your behalf,
				of all your photos uploaded on Panoramio and to upload such copy, on your behalf, on GeoStockPhoto's website for the purpose
				of enjoying GeoStockPhoto's  services; (ii) declare that the "My Panoramio ID" you provided to GeoStockPhoto is your personal Panoramio ID;
				and (iii) assume any and all liabilities which may arise in connection with your possible infringement of point (ii).
				<br><span style="font-size: 120%; line-height: 180%"><b>Accept</b>
			<?php }?>
			<?php echo $form->checkBox($modelUser, 'acceptTermsPanoramio', array('style'=>'margin:0 0 3px 5px')); ?></span></div>
			<?php echo $form->error($modelUser, 'acceptTermsPanoramio', array('style'=>'color: red')); ?>
			
			<div style="text-align: justify; font-size: 85%; line-height: 135%; margin-top: 30px">
			<?php if(Yii::app()->language=='it_it'){?>
				Barrando questa casella autorizzi GeoStockPhoto ad inserire la categoria ad ogni tua foto copiata da Panoramio.
				Il <b>costo di questo servizio</b>, pari a 0.01 Credits per foto, ti verr&agrave scalato dai tuoi crediti su GeoStockPhoto.
				Si ricorda che questa operazione non garantiscono l'accettazione automatica delle foto.
				Queste, infatti, prima di essere pubblicate e messe in vendita devono superare la fase di valutazione,
				durante la quale alcune potrebbero essere rifiutate.
				<br><span style="font-size: 120%; line-height: 180%; float: right"><b>Accetto</b>
			<?php }else{?>
				By ticking this box you authorize GeoStockPhoto to insert the category to all your photos copied from Panoramio.
				The <b>cost of this service</b>, equal to 0.01 Credits per photo, will be deducted from your credits on GeoStockPhoto.
				You should also consider that after this process, all photos still have to be evaluated and they may be rejected.
				<br><span style="font-size: 120%; line-height: 180%"><b>Accept</b>
			<?php }?>
			<?php echo $form->checkBox($modelUser, 'acceptAddCategory', array('style'=>'margin:0 0 3px 5px')); ?></span></div>
			<?php echo $form->error($modelUser, 'acceptAddCategory', array('style'=>'color: red')); ?>
    	</div>
    <?php }?>

	<div style="text-align:center">
		<div>	
			<?php echo "Accept ".CHtml::link('Terms and Conditions', Yii::app()->createUrl('/general-terms'));?>
			<?php echo $form->checkBox($modelUser,'acceptTerms',array('style'=>'margin-top:0px')); ?>
		</div>
		<?php echo $form->error($modelUser,'acceptTerms',array('style'=>'color: red')); ?>
		<div>
			Newsletter <?php echo $form->checkBox($modelUser,'mailingList',array('style'=>'margin-top:0px')); ?>
		</div>
	</div>

	<div style="text-align:center; margin-top: 20px">
		<?php $this->widget('CCaptcha', array(
	    	'buttonLabel' => "Refresh captcha",'id'=>'idCaptcha'
	    )); ?>
	    <div class="captcha"><?php echo CHtml::activeTextField( $modelUser,'verifyCodeCaptcha', array('class'=>'captcha')); ?></div>
	        
		<?php echo $form->error($modelUser,'verifyCodeCaptcha', array('style'=>'color: red')); ?>
	</div>


	<div style="text-align:center">
		<div>	
			<?php echo CHtml::link('Resend your activation email', Yii::app()->createUrl('user/resendVerification'));?>
		</div>
	</div>

	
	<div class="buttons offset2">
		<?php echo CHtml::submitButton('Create',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0')); ?>
		<?php echo CHtml::resetButton('Cancel',array('class'=>'btn btn-primary pull-4','style'=>'margin: 15px 0 5px 0')); ?>
	</div>
</div>	

	
<?php $this->endWidget(); ?>

</div><!-- form -->